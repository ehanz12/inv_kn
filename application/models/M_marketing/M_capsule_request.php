<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_capsule_Request extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function get($id = null)
    {
        $sql = "
        SELECT a.*,b.kode_warna_cap,b.warna_cap,c.kode_warna_body,c.warna_body,d.nama_customer,d.kode_customer FROM tb_mkt_capsule_request a
            LEFT JOIN tb_mkt_master_kw_cap b ON a.id_master_kw_cap = b.id_master_kw_cap
            LEFT JOIN tb_mkt_master_kw_body c ON a.id_master_kw_body = c.id_master_kw_body
            LEFT JOIN tb_mkt_customer d ON a.id_customer = d.id_customer
            WHERE a.is_deleted = 0 ORDER BY a.created_at ASC";
        return $this->db->query($sql);
    }

    public function data_mcr($no_mcr)
    {
        $sql = "
        SELECT a.*,b.kode_warna_cap,b.warna_cap,c.kode_warna_body,c.warna_body,d.nama_customer FROM tb_mkt_capsule_request a
            LEFT JOIN tb_mkt_kw_cap b ON a.id_mkt_kw_cap = b.id_mkt_kw_cap
            LEFT JOIN tb_mkt_kw_body c ON a.id_mkt_kw_body = c.id_mkt_kw_body
            LEFT JOIN tb_mkt_customer d ON a.id_customer = d.id_customer
            WHERE a.no_mcr = '$no_mcr' AND a.is_deleted = 0 ORDER BY a.no_mcr ASC";
        return $this->db->query($sql);
    }

    public function get1($id = null)
    {
        $sql = "
            SELECT a.* FROM tb_mkt_m_cr a
            WHERE a.is_deleted = 0 ORDER BY a.tgl_cr ASC";
        return $this->db->query($sql);
    }

    public function add($d)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_mkt_capsule_request`(`id_customer`, `id_mkt_kw_cap`, `id_mkt_kw_body`,`tgl_cr`,`no_mcr`,`no_cr`,`size`,`print`,`tinta`, `gravurol`,`qty_cr`,`jenis_box`,`jenis_zak`,`delivery`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$d[id_customer]','$d[id_mkt_kw_cap]','$d[id_mkt_kw_body]','$d[tgl_cr]','$d[no_mcr]','$d[no_cr]','$d[size]','$d[print]','$d[tinta]','$d[gravurol]','$d[qty_cr]','$d[jenis_box]','$d[jenis_zak]','$d[delivery]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function add_mcr($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_mkt_m_cr`(`tgl_cr`, `no_mcr`, `nama_operator`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[tgl_cr]','$data[no_mcr]','$data[nama_operator]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_mkt_schedulemarketing` 
            SET `id_customer`='$data[id_customer]',
                `id_mkt_kw_cap`='$data[id_mkt_kw_cap]',
                `id_mkt_kw_body`='$data[id_mkt_kw_body]',
                `no_cr`='$data[no_cr]',
                `no_batch`='$data[no_batch]',
                `tgl_sch`='$data[tgl_sch]',
                `size`='$data[size]',
                `mesin`='$data[mesin]',
                `jumlah`='$data[jumlah]',
                `sisa`='$data[sisa]',
                `cek_print`='$data[cek_print]',
                `print`='$data[print]',
                `tinta`='$data[tinta]',
                `jenis_box`='$data[jenis_box]',
                `jenis_zak`='$data[jenis_zak]',
                `tgl_kirim`='$data[tgl_kirim]',
                `keterangan`='$data[keterangan]',
                `tgl_prd`='$data[tgl_prd]',
                `minyak`='$data[minyak]',
                `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_sch`='$data[id_sch]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    public function cek_no_cr($no_cr)
    {
        $sql = "
            SELECT COUNT(a.no_cr) count_cr FROM tb_mkt_schedulemarketing a
            WHERE a.no_cr = '$no_cr' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql1 = "
            DELETE FROM tb_mkt_capsule_request 
            WHERE no_mcr='$data[no_mcr]'
        ";
        $sql = "
           DELETE FROM tb_mkt_m_cr
            WHERE no_mcr='$data[no_mcr]'
        ";
        $this->db->query($sql);
        return $this->db->query($sql1);
    }

    public function delete_cr($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_mkt_capsule_request`
        WHERE `id_cr`='$data[id_cr]'
        ";
        return $this->db->query($sql);
    }
}
