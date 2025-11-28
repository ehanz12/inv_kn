<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pemeriksaan_bahan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
  public function get($id_prc_master_barang = null, $tgl_mulai = null, $tgl_selesai = null)
{
    $sql = "
        SELECT
            x.id_adm_bm,
            x.id_prc_master_barang,
            x.status_barang,
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
            g.jenis_barang,
            s.nama_supplier
        FROM (
            SELECT 
                t1.id_adm_bm,
                t1.id_prc_master_barang,
                t1.status_barang,
                t1.no_batch,
                t1.created_at
            FROM tb_adm_barang_masuk t1
            JOIN (
                SELECT 
                    id_prc_master_barang,
                    no_batch,
                    MIN(created_at) AS created_at
                FROM tb_adm_barang_masuk
                WHERE is_deleted = 0
                  AND no_batch IS NOT NULL
                  AND no_batch != ''
                GROUP BY id_prc_master_barang, no_batch
            ) t2 ON 
                t1.id_prc_master_barang = t2.id_prc_master_barang
                AND t1.no_batch = t2.no_batch
                AND t1.created_at = t2.created_at
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
        LEFT JOIN tb_prc_master_barang g
            ON x.id_prc_master_barang = g.id_prc_master_barang
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


    

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_lab_pemeriksaan_bahan`(`no_batch`,`no_surat_jalan`, `tgl`, `id_barang`, `id_supplier`, `op_gudang`, `dok_pendukung`, `jenis_kemasan`, `jml_kemasan`,`ditolak_kemasan`, `tutup`, `wadah`, `label`, `qty`,`ditolak_qty`,`status`,`exp`, `mfg`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[no_batch]','$data[no_surat_jalan]','$data[tgl]','$data[id_barang]','$data[id_supplier]','$data[nama_operator]','$data[dok_pendukung]','$data[jenis_kemasan]','$data[jml_kemasan]','$data[ditolak_kemasan]','$data[tutup]','$data[wadah]','$data[label]','$data[qty]','$data[ditolak_qty]','Karantina','$data[exp]','$data[mfg]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }

    public function update_status_pb($id_adm_bm, $status)
    {
        $sql = "
        UPDATE `tb_adm_barang_masuk`
        SET `status_barang`='$status'
        WHERE `id_adm_bm`='$id_adm_bm';
        ";
        return $this->db->query($sql);
    }

    public function cek_proses()
    {
        $sql = "
            SELECT COUNT(status) as tot_status_proses FROM `tb_lab_pemeriksaan_bahan` WHERE status = 'Proses' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_lab_pemeriksaan_bahan` 
            SET `id_pb` = '$data[id_pb]',
            `no_batch`='$data[no_batch]',
            `no_surat_jalan`='$data[no_surat_jalan]',
            `tgl`='$data[tgl]',
            `barang`='$data[id_barang]',
            `supplier`='$data[id_supplier]',
            `op_gudang`='$data[nama_operator]',
            `dok_pendukung`='$data[dok_pendukung]',
            `jenis_kemasan`='$data[jenis_kemasan]',
            `jml_kemasan`='$data[jml_kemasan]',
            `ditolak_kemasan`='$data[ditolak_kemasan]',
            `tutup`='$data[tutup]',
            `wadah`='$data[wadah]',
            `label`='$data[label]',
            `qty`='$data[qty]',
            `ditolak_qty`='$data[ditolak_qty]',
            `exp`='$data[exp]',
            `mfg`='$data[mfg]',
            `updated_at`= NOW(),`updated_by`='$id_user' 
            WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujigel`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_pw($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujipewarna`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_pel($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujipel`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_tp($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujitp`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_cls($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujibt_candurinsilverfine`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_ln($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujibt_lecithinadlec`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_mp($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujibt_methylparaben`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_mb($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujibt_natriumbenzoat`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_sls($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujibt_sodiumlaunilsulfat`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }
    public function delete_td($data)
    {
        $id_user = $this->id_user();
        // $sql = "
        // UPDATE `tb_barang_masuk` 
        // SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
        // WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        // ";

        $sql = "
        DELETE FROM `tb_lab_hasil_ujibt_titaniumdioxide`
         WHERE `id_pb`='$data[id_pb]'
        ";
        return $this->db->query($sql);
    }

    public function cek_karantina()
    {
        $sql = "
            SELECT COUNT(status) as tot_status_karantina FROM `tb_lab_pemeriksaan_bahan` WHERE status = 'Karantina' AND is_deleted = 0";
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
            SELECT COUNT(a.no_surat_jalan) count_sj FROM tb_gbb_barang_masuk a
            WHERE a.no_surat_jalan = '$no_surat_jalan' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}
