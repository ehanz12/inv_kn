<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang_masuk_melting extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function get($name = null)
    {
        if ($name) {
            $where = "AND c.jenis_barang = '$name' OR c.nama_barang = '$name'";
        }
        $sql = "
            SELECT a.*,b.no_batch,b.no_dpb, c.nama_barang,c.satuan,c.jenis_barang,d.nama_supplier, e.no_urut, f.no_sjl FROM tb_mlt_melting_masuk a
            LEFT JOIN tb_adm_barang_masuk b ON a.id_adm_bm = b.id_adm_bm
            LEFT JOIN tb_prc_master_barang c ON a.id_prc_master_barang = c.id_prc_master_barang
            LEFT JOIN tb_prc_master_supplier d ON c.id_prc_master_supplier = d.id_prc_master_supplier
            LEFT JOIN tb_mlt_permintaan_barang e ON a.id_mlt_permintaan_barang = e.id_mlt_permintaan_barang
            LEFT JOIN tb_prc_dpb_tf f ON b.no_dpb = f.no_dpb
            WHERE a.is_deleted = 0 $where ORDER BY a.tgl_masuk ASC";
        return $this->db->query($sql);
    }


    public function get_barang()
    {
        // $kode_user = $this->kode_user();
        $sql = "
        SELECT  
    a.*,
    c.nama_barang,
    c.jenis_barang,
    (a.jml_masuk - IFNULL(d.total_keluar, 0)) AS stok,
    e.no_urut
FROM tb_mlt_melting_masuk a
LEFT JOIN tb_adm_barang_masuk b 
    ON a.id_adm_bm = b.id_adm_bm
LEFT JOIN tb_prc_master_barang c 
    ON a.id_prc_master_barang = c.id_prc_master_barang
LEFT JOIN tb_mlt_permintaan_barang e 
    ON a.id_mlt_permintaan_barang = e.id_mlt_permintaan_barang
LEFT JOIN (
    SELECT 
        id_mm,
        SUM(qty) AS total_keluar
    FROM tb_mlt_melting_keluar
    WHERE is_deleted = 0
    GROUP BY id_mm
) d ON a.id_mm = d.id_mm
WHERE 
    a.is_deleted = 0
    AND (c.jenis_barang = 'Bahan Pembantu' 
         OR c.jenis_barang = 'Bahan Tambahan')
ORDER BY a.tgl_masuk ASC
        ";
        return $this->db->query($sql);
    }

    public function get_bahan()
    {
        $sql = "
            SELECT a.*,c.nama_barang,c.jenis_gel, d.stok FROM tb_mlt_melting_masuk a
            LEFT JOIN tb_gbb_barang_masuk b ON a.id_barang_masuk = b.id_barang_masuk
            LEFT JOIN tb_prc_barang c ON a.id_barang = c.id_barang
            LEFT JOIN (
                SELECT id_mm, SUM(CASE WHEN status = 'masuk' THEN qty ELSE 0 END) - SUM(CASE WHEN status = 'keluar' THEN qty ELSE 0 END) as stok
                FROM tb_mlt_transaksi_melting
                GROUP BY id_mm  
            ) d ON a.id_mm = d.id_mm
            WHERE a.is_deleted = 0 AND 
            c.jenis_bahan = 'Bahan Baku' 
            OR c.nama_barang = 'Natrium Benzoat' 
            OR c.nama_barang = 'Methyl Paraben' 
            OR c.nama_barang = 'Sodium Launil Sulfat' 
            ORDER BY a.tgl ASC";
        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_gbb_barang_masuk` 
            SET `no_batch`='$data[no_batch]',`no_surat_jalan`='$data[no_surat_jalan]',`tgl`='$data[tgl]',`nama_operator`='$data[nama_operator]',`dok_pendukung`='$data[dok_pendukung]',`jenis_kemasan`='$data[jenis_kemasan]',`jml_kemasan`='$data[jml_kemasan]',`tutup`='$data[tutup]',`wadah`='$data[wadah]',`label`='$data[label]',`qty`='$data[qty]',`exp`='$data[exp]',`mfg`='$data[mfg]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        DELETE FROM `tb_gbb_barang_masuk`
         WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
    }


    public function jml_barang_masuk($data)
    {
        // $kode_user = $this->kode_user();
        $sql = "
            SELECT sum(qty) tot_barang_masuk FROM `tb_gbb_barang_masuk`
            WHERE id_barang = '$data[id_barang]' AND  is_deleted = 0";
        return $this->db->query($sql);
    }
    public function cek_surat_jalan($no_surat_jalan)
    {
        $sql = "
            SELECT COUNT(a.no_surat_jalan) count_sj FROM tb_lab_pemeriksaan_bahan a
            WHERE a.no_surat_jalan = '$no_surat_jalan' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function cek_no_batch($no_batch)
    {
        $sql = "
            SELECT COUNT(a.no_surat_jalan) count_sj FROM tb_lab_pemeriksaan_bahan a
            WHERE a.no_batch = '$no_batch' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
