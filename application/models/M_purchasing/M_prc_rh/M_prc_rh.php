<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_prc_rh extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function get()
    {
        $sql = "SELECT a.*, b.no_ppb, b.no_budget, c.no_rb FROM tb_prc_rh a
        LEFT JOIN tb_prc_ppb b ON a.id_prc_ppb = b.id_prc_ppb
        LEFT JOIN tb_prc_rb c ON a.id_prc_rh = c.id_prc_rh
        WHERE a.is_deleted = 0
        ORDER BY a.id_prc_rh ASC";
        return $this->db->query($sql);
    }

    public function get_detail_barang_rb($no_rb)
    {
        $sql = "SELECT a.*, a.id_prc_rh, b.*,c.id_prc_master_barang, c.no_budget,d.nama_barang, d.satuan, d.kode_barang, e.nama_supplier 
        FROM tb_prc_rb a 
        LEFT JOIN tb_prc_rh b ON a.id_prc_rh = b.id_prc_rh 
        LEFT JOIN tb_prc_ppb c ON b.id_prc_ppb = c.id_prc_ppb 
        LEFT JOIN tb_prc_master_barang d ON c.id_prc_master_barang = d.id_prc_master_barang 
        LEFT JOIN tb_prc_master_supplier e ON d.id_prc_master_supplier = e.id_prc_master_supplier
        WHERE a.is_deleted = 0 AND a.no_rb = '$no_rb'
        ORDER BY a.id_prc_rb ASC";
        return $this->db->query($sql);
    }

    public function res_barang()
    {
        $sql = "SELECT a.*, b.nama_barang, b.kode_barang, b.spek FROM tb_prc_rh a
        LEFT JOIN tb_prc_ppb c ON a.id_prc_ppb = c.id_prc_ppb
        LEFT JOIN tb_prc_master_barang b ON c.id_prc_master_barang = b.id_prc_master_barang
        WHERE a.is_deleted = 0 AND c.is_deleted = 0 AND b.is_deleted = 0
        AND NOT EXISTS (
            SELECT 1 
            FROM tb_prc_rb d
            WHERE d.id_prc_rh = a.id_prc_rh AND d.is_deleted = 0
        )
        ORDER BY a.id_prc_rh ASC";
        return $this->db->query($sql);
    }

    public function get_detail_barang($id_prc_rh)
    {
        $sql = "SELECT a.*, b.nama_barang, b.satuan, b.kode_barang, b.spek FROM tb_prc_rh a
        LEFT JOIN tb_prc_ppb c ON a.id_prc_ppb = c.id_prc_ppb
        LEFT JOIN tb_prc_master_barang b ON c.id_prc_master_barang = b.id_prc_master_barang
        WHERE a.is_deleted = 0 AND c.is_deleted = 0 AND b.is_deleted = 0 AND a.id_prc_rh = '$id_prc_rh'
        ORDER BY a.id_prc_rh ASC";
        return $this->db->query($sql);
    }

    public function get_ppb()
    {
        $sql = "
        SELECT a.jenis_ppb, a.jenis_form_ppb, a.no_ppb, a.jenis_ppb FROM tb_prc_ppb_tf a
        WHERE a.is_deleted = 0 AND a.jenis_ppb = 'Budget' AND a.acc_spv = 'Approved' AND a.acc_manager = 'Approved'
        AND a.acc_pm= 'Approved' AND a.acc_direktur = 'Approved'
        AND NOT EXISTS (
            SELECT 1 
            FROM tb_prc_ppb c
            JOIN tb_prc_rh d ON d.id_prc_ppb = c.id_prc_ppb
            WHERE c.no_ppb = a.no_ppb
        )
        ORDER BY a.id_prc_ppb_tf ASC
        ";
        return $this->db->query($sql);
    }

    public function get_ppb_2()
    {
                $sql = "
                SELECT 
            a.id_prc_ppb_tf,
            a.jenis_ppb,
            a.jenis_form_ppb,
            a.no_ppb
        FROM tb_prc_ppb_tf a
        WHERE 
            a.is_deleted = 0 
            AND a.jenis_ppb = 'Non-Budget' 
            AND a.acc_spv = 'Approved'
            AND a.acc_manager = 'Approved'
            AND a.acc_pm = 'Approved'
            AND a.acc_direktur = 'Approved'

            -- PPB yang BELUM masuk di tb_prc_rh
            AND NOT EXISTS (
                SELECT 1 
                FROM tb_prc_ppb c
                JOIN tb_prc_rh d ON d.id_prc_ppb = c.id_prc_ppb
                WHERE c.no_ppb = a.no_ppb
            )
        ORDER BY a.id_prc_ppb_tf ASC;
        ";
        return $this->db->query($sql);
    }

    public function data_ppb_barang($no_ppb=null, $id_prc_ppb=null)
    {
        if ($no_ppb == null) {
            $where[] = "";
        } else {
            $where[] = "AND a.no_ppb = '$no_ppb'";
        }

        if ($id_prc_ppb == null) {
            $where[] = "";
        } else {
            $where[] = "AND a.id_prc_ppb = '$id_prc_ppb'";
        }

        $where = implode(" ", $where);


        $sql = "SELECT 
            a.id_prc_ppb,
            b.kode_barang,
            b.nama_barang,
            b.spek,
            b.satuan,
            a.no_budget,
            a.jumlah_ppb,
            c.harga_rh,
            c.total_rh
        FROM tb_prc_ppb a
        LEFT JOIN tb_prc_master_barang b
            ON a.id_prc_master_barang = b.id_prc_master_barang
        LEFT JOIN tb_prc_rh c ON a.id_prc_ppb = c.id_prc_ppb
        WHERE a.is_deleted = 0 $where
        ORDER BY a.id_prc_ppb ASC
    ";
    return $this->db->query($sql)->result_array();
    }

    public function add($data)
    {
        $sql = "INSERT INTO tb_prc_rh
        (tgl_rh, id_prc_ppb, harga_rh, total_rh, jumlah_rh, created_at, created_by)
        VALUES
        (
            '" . $data['tgl_rh'] . "',
            '" . $data['id_prc_ppb'] . "',
            '" . $data['harga_rh'] . "',
            '" . $data['total_rh'] . "',
            '" . $data['jumlah_rh'] . "',
            NOW(),
            '" . $this->id_user() . "'
        )";
        return $this->db->query($sql);
    }
    public function add_2($data)
    {
        $sql = "INSERT INTO tb_prc_rh
        (tgl_rh, id_prc_ppb, harga_rh, total_rh, jumlah_rh, created_at, created_by)
        VALUES
        (
            '" . $data['tgl_rh'] . "',
            '" . $data['id_prc_ppb'] . "',
            '" . $data['harga_rh'] . "',
            '" . $data['total_rh'] . "',
            '" . $data['jumlah_rh'] . "',
            NOW(),
            '" . $this->id_user() . "'
        )";
        $this->db->query($sql);
        $sql2 = "UPDATE tb_prc_ppb
        SET no_budget = '" . $data['no_budget'] . "'
        WHERE id_prc_ppb = '" . $data['id_prc_ppb'] . "'";
        $this->db->query($sql2);
        return TRUE;
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql1 = "
        UPDATE tb_prc_rh
        SET
        harga_rh = '$data[harga_rh]',
        jumlah_rh = '$data[jumlah_rh]',
        total_rh = '$data[total_rh]',
        tgl_rh = '$data[tgl_rh]',
        updated_at = NOW(),
        updated_by = '$id_user'
        WHERE id_prc_rh = '$data[id_prc_rh]'
        ";
        $this->db->query($sql1);

        $sql = "
        UPDATE tb_prc_ppb
        SET no_budget = '$data[no_budget]',
        updated_at = NOW(),
        updated_by = '$id_user'
        WHERE id_prc_ppb = '$data[id_prc_ppb]'
        ";

        return $this->db->query($sql);
    }
}
?>