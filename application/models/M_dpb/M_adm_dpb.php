<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_adm_dpb extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get($no_dpb = null, $tgl_mulai = null, $tgl_selesai = null)
    {
        $sub_adm = "
            SELECT 
                id_prc_dpb,
                MIN(no_batch) AS no_batch,
                SUM(jml_bm) AS jml_diterima
            FROM tb_adm_barang_masuk
            WHERE is_deleted = 0
            GROUP BY id_prc_dpb 
        ";

        $this->db->select('
            a.*,
            b.no_sjl,
            b.tgl_dpb,
            e.no_ppb,
            e.jumlah_ppb,
            e.id_prc_ppb,
            f.id_prc_master_barang,
            f.nama_barang,
            f.kode_barang,
            f.spek,
            f.satuan,
            g.no_batch,
            g.jml_diterima,
            (e.jumlah_ppb - COALESCE(g.jml_diterima, 0)) as sisa_ppb
        ');

        $this->db->from('tb_prc_dpb a');
        $this->db->join('tb_prc_dpb_tf b', 'a.no_dpb = b.no_dpb', 'left');
        $this->db->join('tb_prc_rb c', 'a.id_prc_rb = c.id_prc_rb', 'left');
        $this->db->join('tb_prc_rh d', 'c.id_prc_rh = d.id_prc_rh', 'left');
        $this->db->join('tb_prc_ppb e', 'd.id_prc_ppb = e.id_prc_ppb', 'left');
        $this->db->join('tb_prc_master_barang f', 'e.id_prc_master_barang = f.id_prc_master_barang', 'left');
        $this->db->join("($sub_adm) g", "g.id_prc_dpb = a.id_prc_dpb", "left");

        if (!empty($no_dpb)) {
            $this->db->where('a.no_dpb', $no_dpb);
        }

        if (!empty($tgl_mulai)) {
            $this->db->where('b.tgl_dpb >=', date('Y-m-d', strtotime($tgl_mulai)));
        }

        if (!empty($tgl_selesai)) {
            $this->db->where('b.tgl_dpb <=', date('Y-m-d', strtotime($tgl_selesai)));
        }

        $this->db->where('a.is_deleted', 0);
        $this->db->order_by('a.created_at', 'DESC');

        return $this->db->get();
    }

   
public function add_barang_masuk_process()
{
    $data = [
        'id_prc_master_barang' => $this->input->post('id_prc_master_barang'),
        'id_prc_dpb' => $this->input->post('id_prc_dpb'),
        'no_dpb' => $this->input->post('no_dpb'),
        'tgl_bm' => $this->input->post('tgl_bm'),
        'no_batch' => $this->input->post('no_batch'),
        'jml_bm' => $this->input->post('jml_bm')
    ];
    
    // Hanya insert ke tb_adm_barang_masuk
    $result = $this->M_adm_dpb->add_barang_masuk($data);
    
    // JANGAN panggil update_jumlah_ppb!
    // $this->M_adm_dpb->update_jumlah_ppb($id_prc_ppb, $jumlah_diterima);
    
    if ($result) {
        redirect('adm_dpb?alert=success&msg=Barang masuk berhasil disimpan');
    } else {
        redirect('adm_dpb?alert=error&msg=Barang masuk gagal disimpan');
    }
}

    // Method untuk mendapatkan id_prc_ppb dari id_prc_dpb
    public function get_id_prc_ppb_by_dpb($id_prc_dpb)
    {
        $sql = "SELECT e.id_prc_ppb, e.jumlah_ppb
                FROM tb_prc_dpb a
                LEFT JOIN tb_prc_rb c ON a.id_prc_rb = c.id_prc_rb
                LEFT JOIN tb_prc_rh d ON c.id_prc_rh = d.id_prc_rh
                LEFT JOIN tb_prc_ppb e ON d.id_prc_ppb = e.id_prc_ppb
                WHERE a.id_prc_dpb = ?";
        
        return $this->db->query($sql, [$id_prc_dpb])->row_array();
    }

    // Method untuk mendapatkan semua item berdasarkan no_dpb
    public function get_all_items_by_dpb($no_dpb)
    {
        $this->db->select('
            a.*,
            b.no_sjl,
            b.tgl_dpb,
            e.no_ppb,
            e.jumlah_ppb,
            e.id_prc_ppb,
            f.id_prc_master_barang,
            f.nama_barang,
            f.kode_barang,
            f.spek,
            f.satuan,
            g.nama_supplier
        ');

        $this->db->from('tb_prc_dpb a');
        $this->db->join('tb_prc_dpb_tf b', 'a.no_dpb = b.no_dpb', 'left');
        $this->db->join('tb_prc_rb c', 'a.id_prc_rb = c.id_prc_rb', 'left');
        $this->db->join('tb_prc_rh d', 'c.id_prc_rh = d.id_prc_rh', 'left');
        $this->db->join('tb_prc_ppb e', 'd.id_prc_ppb = e.id_prc_ppb', 'left');
        $this->db->join('tb_prc_master_barang f', 'e.id_prc_master_barang = f.id_prc_master_barang', 'left');
        $this->db->join('tb_prc_master_supplier g', 'f.id_prc_master_supplier = g.id_prc_master_supplier', 'left');
        
        $this->db->where('a.no_dpb', $no_dpb);
        $this->db->where('a.is_deleted', 0);
        
        $query = $this->db->get();
        return $query->result_array();
    }

    // Method untuk mendapatkan detail DPB dengan relations
    public function get_dpb_detail_with_relations($no_dpb)
    {
        $sql = "SELECT 
                    a.*,
                    b.no_sjl,
                    b.tgl_dpb,
                    e.no_ppb,
                    e.jumlah_ppb,
                    f.id_prc_master_barang,
                    f.nama_barang,
                    f.kode_barang,
                    f.spek,
                    f.satuan,
                    g.nama_supplier,
                    h.jml_diterima,
                    h.no_batch
                FROM tb_prc_dpb a
                LEFT JOIN tb_prc_dpb_tf b ON a.no_dpb = b.no_dpb
                LEFT JOIN tb_prc_rb c ON a.id_prc_rb = c.id_prc_rb
                LEFT JOIN tb_prc_rh d ON c.id_prc_rh = d.id_prc_rh
                LEFT JOIN tb_prc_ppb e ON d.id_prc_ppb = e.id_prc_ppb
                LEFT JOIN tb_prc_master_barang f ON e.id_prc_master_barang = f.id_prc_master_barang
                LEFT JOIN tb_prc_master_supplier g ON f.id_prc_master_supplier = g.id_prc_master_supplier
                LEFT JOIN tb_adm_barang_masuk h ON a.id_prc_dpb = h.id_prc_dpb AND h.is_deleted = 0
                WHERE a.no_dpb = ? AND a.is_deleted = 0";
        
        return $this->db->query($sql, [$no_dpb])->result_array();
    }

    // Method untuk check DPB exists
    public function check_dpb_exists($no_dpb)
    {
        $sql = "SELECT COUNT(*) as total FROM tb_prc_dpb_tf WHERE no_dpb = ? AND is_deleted = 0";
        $result = $this->db->query($sql, [$no_dpb])->row_array();
        return $result['total'] > 0;
    }

    public function get_rb()
    {
        $sql = "SELECT * FROM tb_prc_rb_tf WHERE is_deleted = 0";
        return $this->db->query($sql);
    }

    public function generate_no_dpb()
    {
        $this->db->select('no_dpb');
        $this->db->from('tb_prc_dpb_tf');
        $this->db->order_by('id_prc_dpb_tf', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $last_no = $query->row()->no_dpb;
            $last_number = (int)$last_no;
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }

        return str_pad($new_number, 4, '0', STR_PAD_LEFT);
    }

    public function data_no_budget($no_rb)
    {
        $sql = "SELECT a.no_rb, a.is_deleted, b.id_prc_rh, b.id_prc_rb, c.id_prc_ppb, c.jumlah_rh, c.harga_rh, c.total_rh, d.no_ppb, e.nama_barang, e.spek, e.satuan 
                FROM tb_prc_rb_tf a
                LEFT JOIN tb_prc_rb b ON a.no_rb = b.no_rb
                LEFT JOIN tb_prc_rh c ON b.id_prc_rh = c.id_prc_rh
                LEFT JOIN tb_prc_ppb d ON c.id_prc_ppb = d.id_prc_ppb
                LEFT JOIN tb_prc_master_barang e ON d.id_prc_master_barang = e.id_prc_master_barang
                WHERE a.is_deleted = 0 AND a.no_rb = ?";
        return $this->db->query($sql, [$no_rb])->result_array();
    }

    public function add_barang_masuk($data)
    {
        $id_user = $this->id_user();
        $sql = "INSERT INTO tb_adm_barang_masuk (id_prc_master_barang, id_prc_dpb, no_dpb, tgl_bm, no_batch, jml_bm, created_at, created_by, is_deleted)
                VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, 0)";
        return $this->db->query($sql, [
            $data['id_prc_master_barang'],
            $data['id_prc_dpb'],
            $data['no_dpb'],
            $data['tgl_bm'],
            $data['no_batch'],
            $data['jml_bm'],
            $id_user
        ]);
    }

    public function delete_recent($id_prc_dpb)
    {
        $sql = "DELETE FROM tb_adm_barang_masuk 
                WHERE id_prc_dpb = ? 
                ORDER BY created_at DESC 
                LIMIT 1";
        return $this->db->query($sql, [$id_prc_dpb]);
    }

    public function delete($id_adm_bm)
    {
        $sql = "UPDATE tb_adm_barang_masuk SET is_deleted = 1 WHERE id_adm_bm = ?";
        return $this->db->query($sql, [$id_adm_bm]);
    }
}
?>  