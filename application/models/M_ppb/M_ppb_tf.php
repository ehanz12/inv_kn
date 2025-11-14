<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_ppb_tf extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    function departement()
    {
        return $this->session->userdata("departement");
    }

    public function get()
    {

        $sql = "
        SELECT 
            a.id_prc_ppb_tf,
            a.no_ppb,
            a.departement,
            a.jenis_form_ppb,
            a.jenis_ppb,
            a.tgl_ppb,
            a.tgl_pakai,
            a.ket,
            a.acc_spv,
            a.acc_manager,
            a.acc_pm,
            a.acc_direktur,
            a.status,
            a.id_user,
            a.acc_spv,
            a.acc_manager,
            a.acc_pm,
            a.acc_direktur,
            a.is_deleted,
            b.nama_operator AS nama_admin
            FROM tb_prc_ppb_tf a
            LEFT JOIN tb_user b ON a.id_user = b.id_user
            WHERE a.is_deleted = 0 
            ORDER BY a.id_prc_ppb_tf DESC
        ";
        return $this->db->query($sql);
    }
    public function get_spv()
    {
        $departement = $this->session->userdata("departement");
        $sql = "
        SELECT 
            a.id_prc_ppb_tf,
            a.no_ppb,
            a.departement,
            a.jenis_form_ppb,
            a.jenis_ppb,
            a.tgl_ppb,
            a.tgl_pakai,
            a.ket,
            a.acc_spv,
            a.acc_manager,
            a.acc_pm,
            a.acc_direktur,
            a.status,
            a.id_user,
            a.is_deleted,
            b.nama_operator AS nama_admin
            FROM tb_prc_ppb_tf a
            LEFT JOIN tb_user b ON a.id_user = b.id_user
            WHERE a.is_deleted = 0
            ORDER BY a.id_prc_ppb_tf DESC
        ";
        return $this->db->query($sql);
    }
    public function get_manager()
    {
        $departement = $this->session->userdata("departement");
        $sql = "
        SELECT 
            a.id_prc_ppb_tf,
            a.no_ppb,
            a.departement,
            a.jenis_form_ppb,
            a.jenis_ppb,
            a.tgl_ppb,
            a.tgl_pakai,
            a.ket,
            a.acc_spv,
            a.acc_manager,
            a.acc_pm,
            a.acc_direktur,
            a.status,
            a.id_user,
            a.is_deleted,
            b.nama_operator AS nama_admin
            FROM tb_prc_ppb_tf a
            LEFT JOIN tb_user b ON a.id_user = b.id_user
            WHERE a.is_deleted = 0 AND a.acc_spv = 'Approved'
            ORDER BY a.id_prc_ppb_tf DESC
        ";
        return $this->db->query($sql);
    }
    public function get_plant_manager()
    {
        $departement = $this->session->userdata("departement");
        $sql = "
        SELECT 
            a.id_prc_ppb_tf,
            a.no_ppb,
            a.departement,
            a.jenis_form_ppb,
            a.jenis_ppb,
            a.tgl_ppb,
            a.tgl_pakai,
            a.ket,
            a.acc_spv,
            a.acc_manager,
            a.acc_pm,
            a.acc_direktur,
            a.status,
            a.id_user,
            a.is_deleted,
            b.nama_operator AS nama_admin
            FROM tb_prc_ppb_tf a
            LEFT JOIN tb_user b ON a.id_user = b.id_user
            WHERE a.is_deleted = 0 AND a.acc_manager = 'Approved'
            ORDER BY a.id_prc_ppb_tf DESC
        ";
        return $this->db->query($sql);
    }
    public function get_direktur()
    {
        $departement = $this->session->userdata("departement");
        $sql = "
        SELECT 
            a.id_prc_ppb_tf,
            a.no_ppb,
            a.departement,
            a.jenis_form_ppb,
            a.jenis_ppb,
            a.tgl_ppb,
            a.tgl_pakai,
            a.ket,
            a.acc_spv,
            a.acc_manager,
            a.acc_pm,
            a.acc_direktur,
            a.status,
            a.id_user,
            a.is_deleted,
            b.nama_operator AS nama_admin
            FROM tb_prc_ppb_tf a
            LEFT JOIN tb_user b ON a.id_user = b.id_user
            WHERE a.is_deleted = 0 AND a.acc_pm = 'Approved' AND a.jenis_ppb='Non-Budget'
            ORDER BY a.id_prc_ppb_tf DESC
        ";
        return $this->db->query($sql);
    }

    public function cek_no_ppb($no_ppb)
    {
        $sql = "
            SELECT COUNT(a.no_ppb) count_sj FROM tb_prc_ppb_tf a
            WHERE a.no_ppb = '$no_ppb' AND a.is_deleted = 0";

        return $this->db->query($sql);
    }


    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_prc_ppb_tf( 
        no_ppb, departement, jenis_form_ppb,
        jenis_ppb, tgl_ppb,tgl_pakai, ket, id_user,
        created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ('$data[no_ppb]',
        '$data[departement]', 
        '$data[form_ppb]', 
        '$data[jenis_ppb]',
        '$data[tgl_ppb]', 
        '$data[tgl_pakai]',
        '$data[ket]', 
        '$id_user',
        NOW(),'$id_user','0000-00-00','','0')
        ";
        return $this->db->query($sql);
    }

   public function update_ppb($no_ppb, $data)
{
    $this->db->where('no_ppb', $no_ppb);
    return $this->db->update('tb_prc_ppb_tf', $data);
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

    public function approval_spv($no_ppb)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_ppb_tf 
            SET acc_spv = 'Approved', updated_at = NOW(), updated_by = '$id_user'
            WHERE no_ppb = '$no_ppb'
        ";
        return $this->db->query($sql);
    }

    public function delete_spv($no_ppb)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_ppb_tf 
            SET acc_spv = NULL, updated_at = NOW(), updated_by = '$id_user'
            WHERE no_ppb = '$no_ppb'
        ";
        return $this->db->query($sql);
    }

    public function approval_manager($no_ppb)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_ppb_tf 
            SET acc_manager = 'Approved', updated_at = NOW(), updated_by = '$id_user'
            WHERE no_ppb = '$no_ppb'
        ";
        return $this->db->query($sql);
    }

    public function delete_manager($no_ppb)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_ppb_tf 
            SET acc_manager = NULL, updated_at = NOW(), updated_by = '$id_user'
            WHERE no_ppb = '$no_ppb'
        ";
        return $this->db->query($sql);
    }
    
    public function approval_pm($no_ppb)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_ppb_tf 
            SET acc_pm = 'Approved', updated_at = NOW(), updated_by = '$id_user'
            WHERE no_ppb = '$no_ppb'
        ";
        return $this->db->query($sql);
    }

    public function delete_pm($no_ppb)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_ppb_tf 
            SET acc_pm = NULL, updated_at = NOW(), updated_by = '$id_user'
            WHERE no_ppb = '$no_ppb'
        ";
        return $this->db->query($sql);
    }

    public function approval_direktur($no_ppb)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_ppb_tf 
            SET acc_direktur = 'Approved', updated_at = NOW(), updated_by = '$id_user'
            WHERE no_ppb = '$no_ppb'
        ";
        return $this->db->query($sql);
    }

    public function delete_direktur($no_ppb)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_prc_ppb_tf 
            SET acc_direktur = NULL, updated_at = NOW(), updated_by = '$id_user'
            WHERE no_ppb = '$no_ppb'
        ";
        return $this->db->query($sql);
    }

    public function cek_acc_spv()
    {
        $sql = "
            SELECT COUNT(acc_spv) AS count_spv FROM tb_prc_ppb_tf 
            WHERE acc_spv IS NULL AND is_deleted = 0
        ";
        return $this->db->query($sql);
    }
}