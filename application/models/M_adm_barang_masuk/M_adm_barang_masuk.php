<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_barang_masuk extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function id_user(){
        return $this->session->userdata("id_user");
    }

    // Fungsi utama untuk mendapatkan data barang masuk HANYA yang memiliki no_batch
    public function get($no_dpb = null, $tgl_mulai = null, $tgl_selesai = null)
{
    $this->db->distinct(); // <-- FIX UTAMA | cegah duplikat tanpa GROUP BY

    $this->db->select('
        a.*,
        b.id_prc_dpb_tf,
        b.no_sjl,
        b.tgl_dpb,
        c.id_prc_dpb,
        c.jenis_bayar, 
        d.id_prc_rh,
        e.id_prc_ppb,
        f.id_prc_master_barang,
        f.no_budget,
        g.nama_barang, 
        g.id_prc_master_supplier,
        g.kode_barang,
        g.spek, 
        g.satuan,
        h.nama_supplier
    ');

    // TABEL UTAMA
    $this->db->from('tb_adm_dpb a');

    // JOIN BENAR
    $this->db->join('tb_prc_dpb_tf b', 'b.id_prc_dpb_tf = b.id_prc_dpb_tf', 'left');
    $this->db->join('tb_prc_dpb c', 'a.id_prc_dpb_tf = c.id_prc_dpb_tf', 'left');
    $this->db->join('tb_prc_rb d', 'c.id_prc_rb = d.id_prc_rb', 'left');
    $this->db->join('tb_prc_rh e', 'd.id_prc_rh = e.id_prc_rh', 'left');
    $this->db->join('tb_prc_ppb f', 'e.id_prc_ppb = f.id_prc_ppb', 'left');
    $this->db->join('tb_prc_master_barang g', 'f.id_prc_master_barang = g.id_prc_master_barang', 'left');
    $this->db->join('tb_prc_master_supplier h', 'g.id_prc_master_supplier = h.id_prc_master_supplier', 'left');

    // FILTER WAJIB
    $this->db->where('a.no_batch IS NOT NULL');
    $this->db->where('a.no_batch !=', '');
    $this->db->where('a.is_deleted', 0);
    $this->db->where('b.is_deleted', 0);

    // FILTER OPTIONAL
    if (!empty($no_dpb)) {
        $this->db->like('b.no_dpb', $no_dpb);
    }

    if (!empty($tgl_mulai)) {
        $tgl_mulai_db = date('Y-m-d', strtotime($tgl_mulai));
        $this->db->where('b.tgl_dpb >=', $tgl_mulai_db);
    }

    if (!empty($tgl_selesai)) {
        $tgl_selesai_db = date('Y-m-d', strtotime($tgl_selesai));
        $this->db->where('b.tgl_dpb <=', $tgl_selesai_db);
    }

    // NO GROUP BY → MENCEGAH ERROR 1055
    $this->db->order_by('a.created_at', 'DESC');

    return $this->db->get();
}


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
            b.jml_diterima,
            b.created_at,
            b.created_by
        ');
        
        $this->db->from('tb_adm_dpb b');
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
            a.no_dpb,
            COUNT(*) as total_record,
            MIN(b.tgl_dpb) as tanggal_awal,
            MAX(b.tgl_dpb) as tanggal_akhir
        ');
        
        $this->db->from('tb_adm_dpb b');
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
            a.id_prc_dpb_tf,
            a.no_dpb,
            b.tgl_dpb,
            a.no_sjl,
            a.prc_admin,
            b.no_batch,
            b.jml_diterima,
            b.created_at,
            b.created_by
        ');
        
        $this->db->from('tb_adm_dpb b');
        $this->db->join('tb_prc_dpb_tf a', 'a.id_prc_dpb_tf = b.id_prc_dpb_tf', 'left');
        
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
        $this->db->select('DISTINCT(a.no_dpb), b.tgl_dpb', false);
        $this->db->from('tb_adm_dpb b');
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

    public function delete($data)
    {
        $this->db->where('id_prc_dpb_tf', $data['id_prc_dpb_tf']);
        return $this->db->update('tb_prc_dpb_tf', ['is_deleted' => 1]);
    }
}