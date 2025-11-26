<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_adm_barang_masuk extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    // public function get2()
    // {
    //     $sql = "
    //     a.id_adm_dpb,
    //     a.no_batch,
    //     a.id_prc_dpb_tf,
    //     a.created_at,
    //     b.no_sjl,
    //     b.tgl_dpb,
    //     c.jenis_bayar,
    //     f.no_budget,
    //     g.nama_barang,
    //     g.kode_barang,
    //     g.spek,
    //     g.satuan,
    //     h.nama_supplier
    //     FROM tb_adm_dpb a
    //     LEFT JOIN";
    // }
    public function get($id_prc_master_barang = null, $tgl_mulai = null, $tgl_selesai = null)
{
    $sql = "
        SELECT
            x.id_prc_master_barang,
            x.no_batch,
            
            x.created_at,
            b.nama_barang,
            b.kode_barang,
            b.spek,
            b.satuan,
            c.jml_bm,
            c.no_dpb,
            d.no_sjl,
            d.tgl_dpb,
            e.jenis_bayar,
            f.spek,
            s.nama_supplier
        FROM (
            SELECT
                id_prc_master_barang,
                no_batch,
                MIN(created_at) AS created_at
            FROM tb_adm_barang_masuk
            WHERE is_deleted = 0
              AND no_batch IS NOT NULL
              AND no_batch != ''
            GROUP BY id_prc_master_barang, no_batch
        ) x
        LEFT JOIN tb_prc_master_barang b
            ON b.id_prc_master_barang = x.id_prc_master_barang
        LEFT JOIN tb_adm_barang_masuk c
            ON c.id_prc_master_barang = x.id_prc_master_barang
        LEFT JOIN tb_prc_dpb_tf d
            ON c.no_dpb = d.no_dpb
        LEFT JOIN tb_prc_dpb e
            ON c.id_prc_dpb = e.id_prc_dpb
        LEFT JOIN tb_prc_master_barang f
            ON x.id_prc_master_barang = f.id_prc_master_barang
        LEFT JOIN tb_prc_master_supplier s
            ON s.id_prc_master_supplier = b.id_prc_master_supplier
       
        WHERE 1=1
    ";

    if (!empty($id_prc_master_barang)) {
        $sql .= " AND x.id_prc_master_barang = " . $this->db->escape($id_prc_master_barang);
    }

    if (!empty($tgl_mulai)) {
        $sql .= " AND x.created_at >= " . $this->db->escape(date('Y-m-d', strtotime($tgl_mulai)));
    }

    if (!empty($tgl_selesai)) {
        $sql .= " AND x.created_at <= " . $this->db->escape(date('Y-m-d', strtotime($tgl_selesai)));
    }

    $sql .= " ORDER BY x.created_at DESC";

    return $this->db->query($sql);
}

    // Fungsi utama untuk mendapatkan data barang masuk HANYA yang memiliki no_batch
    public function get2($no_dpb = null, $tgl_mulai = null, $tgl_selesai = null)
    {
        // SUBQUERY UTAMA → Ambil hanya 1 baris per batch
        $sub = "
        SELECT 
            MIN(id_adm_bm) AS id_adm_bm,
            no_batch,
            MIN(jml_bm) AS jml_bm,
            MIN(id_prc_master_barang) AS id_prc_master_barang,
            MIN(created_at) AS created_at
        FROM tb_adm_barang_masuk
        WHERE is_deleted = 0
        AND no_batch IS NOT NULL
        AND no_batch != ''
        GROUP BY no_batch
    ";

        // SUBQUERY AMBIL BARANG
        $sub_barang = "
        SELECT 
            a.no_batch,
            MIN(g.nama_barang) AS nama_barang,
            MIN(g.kode_barang) AS kode_barang,
            MIN(g.spek) AS spek,
            MIN(g.satuan) AS satuan
        FROM tb_adm_barang_masuk a
        LEFT JOIN tb_prc_dpb c ON a.no_dpb = c.no_dpb
        LEFT JOIN tb_prc_rb d ON c.id_prc_rb = d.id_prc_rb
        LEFT JOIN tb_prc_rh e ON d.id_prc_rh = e.id_prc_rh
        LEFT JOIN tb_prc_ppb f ON e.id_prc_ppb = f.id_prc_ppb
        LEFT JOIN tb_prc_master_barang g ON a.id_prc_master_barang = g.id_prc_master_barang
        WHERE a.is_deleted = 0
        GROUP BY a.no_batch
    ";

        $this->db->select("
        x.no_batch,
        x.jml_bm,
        b.tgl_dpb,
        sb.nama_barang,
        sb.kode_barang,
        sb.spek,
        sb.satuan,
        h.nama_supplier
    ");

        // FIX: jangan pakai (subquery) lagi
        $this->db->from("$sub x", null, false);

        // JOIN utama
        $this->db->join('tb_prc_dpb_tf b', 'x.no_dpb = b.no_dpb', 'left');
        $this->db->join('tb_prc_dpb c', 'x.no_dpb = c.no_dpb', 'left');
        $this->db->join('tb_prc_rb d', 'c.id_prc_rb = d.id_prc_rb', 'left');
        $this->db->join('tb_prc_rh e', 'd.id_prc_rh = e.id_prc_rh', 'left');
        $this->db->join('tb_prc_ppb f', 'e.id_prc_ppb = f.id_prc_ppb', 'left');

        $this->db->join('tb_prc_master_barang g', 'f.id_prc_master_barang = g.id_prc_master_barang', 'left');
        $this->db->join('tb_prc_master_supplier h', 'g.id_prc_master_supplier = h.id_prc_master_supplier', 'left');

        // JOIN barang unik
        $this->db->join("($sub_barang) sb", "sb.no_batch = x.no_batch", "left");

        // FILTER
        if (!empty($tgl_mulai)) {
            $this->db->where('b.tgl_dpb >=', date('Y-m-d', strtotime($tgl_mulai)));
        }

        if (!empty($tgl_selesai)) {
            $this->db->where('b.tgl_dpb <=', date('Y-m-d', strtotime($tgl_selesai)));
        }

        if (!empty($no_dpb)) {
            $this->db->like('b.no_dpb', $no_dpb);
        }

        $this->db->order_by('x.created_at', 'DESC');

        return $this->db->get();
    }


    public function add($data)
{
    return $this->db->insert('tb_adm_barang_masuk', $data);
}


    // Tambahkan function ini di model




    // Fungsi untuk mendapatkan rincian DPB berdasarkan no_batch
    public function get_rincian_dpb_by_no($no_dpb = null, $tgl_mulai = null, $tgl_selesai = null)
    {
        $this->db->select('
            a.id_prc_dpb_tf,
            a.no_dpb,
            b.tgl_dpb,
            a.no_sjl,
            a.prc_admin,
            b.no_batch,
            b.jml_bm,
            b.created_at,
            b.created_by
        ');

        $this->db->from('tb_adm_barang_masuk b');
        $this->db->join('tb_prc_dpb_tf a', 'a.id_prc_dpb_tf = b.id_prc_dpb_tf', 'left');

        $this->db->where('b.no_batch IS NOT NULL');
        $this->db->where('b.no_batch !=', '');
        $this->db->where('b.is_deleted', 0);
        $this->db->where('a.is_deleted', 0);

        if (!empty($no_dpb)) {
            $this->db->where('a.no_dpb', $no_dpb);
        }

        if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
            $this->db->where('DATE(b.tgl_dpb) >=', $tgl_mulai);
            $this->db->where('DATE(b.tgl_dpb) <=', $tgl_selesai);
        }

        $this->db->order_by('b.tgl_dpb', 'ASC');

        return $this->db->get();
    }

    // Fungsi untuk mendapatkan data DPB yang dikelompokkan (dengan no_batch)
    public function get_dpb_grouped($no_dpb = null, $tgl_mulai = null, $tgl_selesai = null)
    {
        $this->db->select('
            b.no_dpb,
            COUNT(*) as total_record,
            MIN(b.tgl_dpb) as tanggal_awal,
            MAX(b.tgl_dpb) as tanggal_akhir
        ');

        $this->db->from('tb_adm_barang_masuk b');
        $this->db->join('tb_prc_dpb_tf a', 'a.id_prc_dpb_tf = b.id_prc_dpb_tf', 'left');

        $this->db->where('b.no_batch IS NOT NULL');
        $this->db->where('b.no_batch !=', '');
        $this->db->where('b.is_deleted', 0);
        $this->db->where('a.is_deleted', 0);

        if (!empty($no_dpb)) {
            $this->db->where('a.no_dpb', $no_dpb);
        }

        if (!empty($tgl_mulai)) {
            $tgl_mulai_db = date('Y-m-d', strtotime($tgl_mulai));
            $this->db->where('b.tgl_dpb >=', $tgl_mulai_db);
        }

        if (!empty($tgl_selesai)) {
            $tgl_selesai_db = date('Y-m-d', strtotime($tgl_selesai));
            $this->db->where('b.tgl_dpb <=', $tgl_selesai_db);
        }

        $this->db->group_by('a.no_dpb');
        $this->db->order_by('tanggal_awal', 'ASC');

        return $this->db->get();
    }

    // Fungsi untuk data detail DPB (dengan no_batch)
    public function data_dpb_detail($filter = [])
    {
        $this->db->select('
            
            b.no_dpb,
            b.tgl_dpb,
            a.no_sjl,
            a.prc_admin,
            b.no_batch,
            b.jml_bm,
            b.created_at,
            b.created_by
        ');

        $this->db->from('tb_adm_barang_masuk b');
        $this->db->join('tb_prc_dpb_tf a', 'a.no_dpb = b.no_dpb', 'left');

        $this->db->where('b.no_batch IS NOT NULL');
        $this->db->where('b.no_batch !=', '');
        $this->db->where('b.is_deleted', 0);
        $this->db->where('a.is_deleted', 0);

        if (!empty($filter['no_dpb'])) {
            $this->db->where('a.no_dpb', $filter['no_dpb']);
        }

        if (!empty($filter['tgl_mulai'])) {
            $tgl_mulai_db = date('Y-m-d', strtotime($filter['tgl_mulai']));
            $this->db->where('b.tgl_dpb >=', $tgl_mulai_db);
        }

        if (!empty($filter['tgl_selesai'])) {
            $tgl_selesai_db = date('Y-m-d', strtotime($filter['tgl_selesai']));
            $this->db->where('b.tgl_dpb <=', $tgl_selesai_db);
        }

        $this->db->order_by('b.tgl_dpb ASC, a.no_dpb ASC');

        return $this->db->get();
    }

    // Fungsi untuk mendapatkan list No. DPB untuk autocomplete (hanya yang memiliki no_batch)
    public function get_no_dpb_list()
    {
        $this->db->select('DISTINCT(a.no_dpb), b.tgl_bm', false);
        $this->db->from('tb_adm_barang_masuk b');
        $this->db->join('tb_prc_dpb_tf a', 'a.id_prc_dpb_tf = b.id_prc_dpb_tf', 'left');
        $this->db->where('b.no_batch IS NOT NULL');
        $this->db->where('b.no_batch !=', '');
        $this->db->where('b.is_deleted', 0);
        $this->db->where('a.is_deleted', 0);
        $this->db->order_by('a.no_dpb', 'ASC');
        $query = $this->db->get();

        $result = [];
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $result[] = [
                    'no_dpb' => $row['no_dpb'],
                    'tgl_dpb' => $row['tgl_dpb']
                ];
            }
        }

        return $result;
    }

    public function get_by_kode_ts($kode_ts) {
        if ($kode_ts == "Bahan Pembantu") {
            $kode_ts;
        }


        $sql = "
            SELECT a.no_batch, a.is_deleted, a.id_prc_master_barang,a.jml_bm, b.kode_barang , b.satuan ,b.nama_barang, b.jenis_barang FROM tb_adm_barang_masuk a 
            LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
            WHERE a.is_deleted = 0 AND b.jenis_barang='$kode_ts'
        ";

        return $this->db->query($sql)->result_array();
    }


    public function delete($data)
    {
        $this->db->where('id_prc_dpb_tf', $data['id_prc_dpb_tf']);
        return $this->db->update('tb_prc_dpb_tf', ['is_deleted' => 1]);
    }
}
