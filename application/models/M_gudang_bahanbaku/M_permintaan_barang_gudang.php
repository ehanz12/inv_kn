<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_permintaan_barang_gudang extends CI_Model
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
            SELECT a.*, b.nama_operator FROM tb_mlt_permintaan_barang_tf a
            LEFT JOIN tb_user b ON a.id_user = b.id_user
            WHERE a.is_deleted = 0 ORDER BY a.tgl_permintaan ASC";
        return $this->db->query($sql);
    }
    public function data_permintaan_barang($no_transfer_slip)
    {
        $sql = "
            SELECT a.*,c.nama_barang,c.satuan,d.nama_supplier,b.mfg,b.exp FROM tb_gbb_permintaan_barang a
            LEFT JOIN tb_gbb_barang_masuk b ON a.id_barang_masuk = b.id_barang_masuk
            LEFT JOIN tb_prc_barang c ON a.id_barang = c.id_barang
            LEFT JOIN tb_prc_supplier d ON a.id_supplier = d.id_supplier
            LEFT JOIN tb_transfer_slip e ON a.no_urut = e.no_urut
            WHERE a.no_no_urut = '$no_transfer_slip' AND a.is_deleted = 0 AND e.is_deleted = 0 ORDER BY a.no_batch ASC";
        return $this->db->query($sql);
    }
    public function cek_permintaan()
    {
        $sql = "
            SELECT COUNT(status) as tot_status_proses FROM `tb_transfer_slip` WHERE status = 'Proses' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function cek_transfer_slip($no_transfer_slip)
    {
        $sql = "
            SELECT COUNT(a.no_urut) count_sj FROM tb_transfer_slip a
            WHERE a.no_urut = '$no_transfer_slip' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function add_transfer_slip($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_transfer_slip`(`no_transfer_slip`, `tgl`, `nama_operator`, `note`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_transfer_slip]','$data[tgl]','$data[nama_operator]','$data[note]','$data[status]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function add_permintaan_barang($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_gbb_permintaan_barang`(`id_barang_masuk`,`id_barang`,`id_supplier`,`no_batch`, `no_urut`,`tgl`,`qty`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        VALUES ('$data[id_barang_masuk]','$data[id_barang]','$data[id_supplier]','$data[no_batch]','$data[no_urut]','$data[tgl]','$data[qty]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }

    public function add_approv($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // INSERT INTO `tb_melting_masuk`(`id_barang_keluar`, `id_barang_masuk`,`id_barang`,`id_supplier`, `no_batch`,`no_transfer_slip`,`tgl`,`qty`,`stok`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        // VALUES ('$data[id_barang_keluar]','$data[id_barang_masuk]','$data[id_barang]','$data[id_supplier]','$data[no_batch]','$data[no_transfer_slip]','$data[tgl]','$data[qty]','$data[qty]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        // ";
        $post_data = array(
            'id_permintaan_barang' => $data['id_permintaan_barang'],
            'id_barang_masuk' => $data['id_barang_masuk'],
            'id_barang' => $data['id_barang'],
            'id_supplier' => $data['id_supplier'],
            'no_batch' => $data['no_batch'],
            'no_urut' => $data['no_urut'],
            'tgl' => $data['tgl'],
            'qty' => $data['qty'],
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $id_user,
            'updated_at' => '0000-00-00 00:00:00',
            'updated_by' => '',
            'is_deleted' => '0'
        );

        $this->db->insert('tb_mlt_melting_masuk', $post_data);
        return $this->db->insert_id();
        // return $this->db->query($sql);
    }

    public function add_approv2($data, $tgl_rilis)
    {
        $id_user = $this->id_user();
        // $sql = "
        // INSERT INTO `tb_melting_masuk`(`id_barang_keluar`, `id_barang_masuk`,`id_barang`,`id_supplier`, `no_batch`,`no_transfer_slip`,`tgl`,`qty`,`stok`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
        // VALUES ('$data[id_barang_keluar]','$data[id_barang_masuk]','$data[id_barang]','$data[id_supplier]','$data[no_batch]','$data[no_transfer_slip]','$data[tgl]','$data[qty]','$data[qty]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        // ";
        $post_data = array(
            'id_permintaan_barang' => $data['id_permintaan_barang'],
            'id_barang_masuk' => $data['id_barang_masuk'],
            'id_barang' => $data['id_barang'],
            'id_supplier' => $data['id_supplier'],
            'no_batch' => $data['no_batch'],
            'no_transfer_slip' => $data['no_transfer_slip'],
            'tgl' => $data['tgl'],
            'qty' => $data['qty'],
            'tgl_rilis' => $tgl_rilis,
            'created_at' => date("Y-m-d H:i:s"),
            'created_by' => $id_user,
            'updated_at' => '0000-00-00 00:00:00',
            'updated_by' => '',
            'is_deleted' => '0'
        );

        $this->db->insert('tb_gbb_barang_keluar', $post_data);
        return $this->db->insert_id();
        // return $this->db->query($sql);
    }

    public function disetujui($no_transfer_slip, $tgl_rilis)
    {
        $sql = "
        UPDATE `tb_gbb_permintaan_barang`
        SET `tgl_setuju`='$tgl_rilis'
        WHERE `no_urut`='$no_transfer_slip';
        ";
        return $this->db->query($sql);
    }

    public function ditolak($data)
    {
        $sql = "
        UPDATE `tb_mlt_permintaan_barang_tf`
        SET `tgl_tdksetuju`='$data[tgl_tdksetuju]'
        WHERE `no_urut`='$data[no_urut]';
        ";
        return $this->db->query($sql);
    }

   


    

    public function jml_permintaan_barang($id_barang)
    {
        $sql = "
            SELECT sum(qty) tot_permintaan_barang FROM `tb_gbb_permintaan_barang` WHERE id_barang='$id_barang' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function jml_permintaan_barang2($data)
    {
        $sql = "
            SELECT sum(a.qty) tot_permintaan_barang FROM `tb_gbb_permintaan_barang` a 
            LEFT JOIN tb_gbb_barang_masuk b ON a.id_barang_masuk = b.id_barang_masuk 
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function ambil_transfer_slip($no_transfer_slip = null)
    {
        $sql = "
            SELECT a.*,b.nama_operator,b.alamat FROM tb_transfer_slip a
            LEFT JOIN tb_user b ON a.nama_operator = b.nama_operator
            WHERE a.is_deleted = 0 AND a.no_urut = '$no_transfer_slip' ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }
}
