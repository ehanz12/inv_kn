<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_purchasing_ppb extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get_filter_brng()
    {
        $sql = "SELECT DISTINCT id_prc_master_barang, id_prc_ppb FROM tb_prc_ppb ORDER BY id_prc_ppb ASC";
        return $this->db->query($sql)->result_array();
    }

    public function get_master_barang()
    {
        $sql = "SELECT * FROM tb_prc_master_barang ORDER BY nama_barang ASC";
        return $this->db->query($sql)->result_array();
    } 

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_prc_ppb_tf 
        SET
            no_ppb_accounting= '$data[no_ppb_accounting]', 
            id_accounting_ppb_tf = '$data[id_accounting_ppb_tf]', 
            departement = '$data[departement]', 
            form_ppb = '$data[form_ppb]', 
            jenis_ppb = '$data[jenis_ppb]', 
            tgl_ppb = '$data[tgl_ppb]', 
            tgl_pakai = '$data[tgl_pakai]', 
            ket = '$data[ket]', 
            nama_admin = '$data[nama_admin]', 
            nama_spv = '$data[nama_spv]', 
            nama_manager = '$data[nama_manager]', 
            nama_direktur = '$data[nama_direktur]', 
            updated_at = NOW(), 
            updated_by = '$id_user' 
        WHERE no_ppb_accounting= '$data[no_ppb_accounting]'";

        log_message('debug', 'Query update: ' . $this->db->last_query());
        
        return $this->db->query($sql);
    }

    public function add($data)
{
    $id_user = $this->id_user();
    $sql = "
    INSERT INTO tb_prc_dpb (no_ppb_accounting, tgl_diterima, no_dpb, no_jj_dpb, no_rb, prc_admin, created_at, created_by, updated_at, updated_by, is_deleted)
    VALUES ('$data[no_ppb_accounting]', '$data[tgl_diterima]', '$data[no_dpb]', '$data[no_jj_dpb]', '$data[no_rb]', '$data[prc_admin]', NOW(), '$id_user', '0000-00-00', '', '0')";

    return $this->db->query($sql);
}

    public function add_permintaan_barang($data)
{
    $id_user = $this->id_user();
    $sql = "
    INSERT INTO tb_prc_ppb(id_prc_master_barang, no_ppb_accounting, jumlah, created_at, created_by, updated_at, updated_by, is_deleted) 
    VALUES ('$data[id_prc_master_barang]', '$data[no_ppb_accounting]', '$data[jumlah]', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')
    ";
    return $this->db->query($sql);
}



    public function get_barang_detail($kode_barang)
    {
        $this->db->select('nama_barang, spek, unit, jumlah');
        $this->db->from('tb_prc_master_barang');
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->get()->row_array();
    }

    public function get($tgl=null, $tgl2=null)
    {
        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND tgl_ppb >= '$tgl' AND  tgl_ppb <= '$tgl2'";
        } else if ($tgl == null && $tgl2 == null) {
            $where[] = "";
        } else {
            return array();
        }

        $where = implode(" ", $where);
        $sql = " 
            SELECT a.*
            FROM tb_prc_ppb_tf a 
            WHERE a.is_deleted = 0 
                AND a.acc_spv = 'Approved'
                AND a.acc_manager = 'Approved'
                AND a.acc_pm = 'Approved'
                $where
            ORDER BY a.id_prc_ppb_tf ASC
        ";
    
        return $this->db->query($sql);
    }
    public function cek_kode_barang($kode_barang)
    {
        $this->db->select('COUNT(*) AS count_sj');
        $this->db->from('tb_prc_master_barang');     
        $this->db->where('kode_barang', $kode_barang);
        return $this->db->get();
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql1 = "
            DELETE FROM tb_prc_ppb_tf 
            WHERE no_ppb='$data[no_ppb]'
        ";
        $sql = "
           DELETE FROM tb_prc_ppb
            WHERE no_ppb='$data[no_ppb]'
        ";
        $this->db->query($sql);
        return $this->db->query($sql1);
    }

    public function data_ppb_barang($no_ppb_accounting)
    {
        $sql = "
            SELECT a.*, b.nama_barang, b.kode_barang, b.spek, b.satuan, c.nama_supplier, d.status
            FROM tb_prc_ppb a
            LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
            LEFT JOIN tb_prc_master_supplier c ON b.id_prc_master_supplier = c.id_prc_master_supplier
            LEFT JOIN tb_prc_ppb_tf d ON a.no_ppb = a.no_ppb
            WHERE a.no_ppb = '$no_ppb_accounting' ORDER BY a.id_prc_ppb ASC";
        return $this->db->query($sql); 
    }
    public function ambil_label($no_ppb_accounting)
    {
        $sql = "   
        SELECT a.*,b.nama_barang, b.spek, b.satuan, c.ket, c.nama_spv, c.nama_manager, 
        c.nama_pm, c.tgl_pakai, c.no_ppb_accounting, c.nama_admin, c.jenis_ppb, c.form_ppb
        FROM tb_prc_ppb a
        LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
        LEFT JOIN tb_prc_ppb_tf c ON a.no_ppb_accounting = c.no_ppb_accounting
        WHERE a.is_deleted = 0 AND a.no_ppb_accounting = '$no_ppb_accounting' ORDER BY a.id_prc_ppb ASC";
        return $this->db->query($sql);
    }

    public function approve($no_ppb_accounting, $approval_level)
{
    $data = [$approval_level => 'Approved'];

    $this->db->where('no_ppb_accounting', $no_ppb_accounting);
    return $this->db->update('tb_prc_ppb_tf', $data);
}

public function update_status($no_ppb_accounting, $status)
{
    $this->db->where('no_ppb_accounting', $no_ppb_accounting);
    // $this->db->update('tb_prc_ppb_tf', ['status' => $status]);
    return $this->db->update('tb_prc_ppb_tf', ['status' => 'selesai']);
    
}

public function cek_status()
    {
        $sql = "
            SELECT COUNT(status) as tot_status FROM `tb_prc_ppb_tf` WHERE status = 'proses' AND is_deleted = 0";
        return $this->db->query($sql);
    }

}
?>