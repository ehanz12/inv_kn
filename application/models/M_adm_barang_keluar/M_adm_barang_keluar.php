<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_adm_barang_keluar extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()
    {
        return $this->session->userdata("id_user");
    }

    public function insert_barang_keluar($data)
    {
        return $this->db->insert('tb_adm_barang_keluar', $data);
    }

    // 2. insert transaksi melting
    public function insert_trans_melting($data)
    {
        return $this->db->insert('tb_mlt_melting_masuk', $data);
    }

    // 4. update status permintaan
    public function update_status_permintaan($no_urut, $status)
    {
        return $this->db->where('no_urut', $no_urut)
                        ->update('tb_mlt_permintaan_barang_tf', [
                            'status' => $status
                        ]);
    }

    public function get_by_no_urut($no_urut) {
        $sql = "
        SELECT a.id_mlt_permintaan_barang, a.id_adm_bm, a.no_urut ,a.is_deleted, a.id_prc_master_barang,a.jml_permintaan, b.satuan ,b.nama_barang,b.id_prc_master_supplier,c.no_batch, d.nama_supplier  FROM tb_mlt_permintaan_barang a 
        LEFT JOIN tb_prc_master_barang b ON a.id_prc_master_barang = b.id_prc_master_barang
        LEFT JOIN tb_adm_barang_masuk c ON a.id_adm_bm = c.id_adm_bm
        LEFT JOIN tb_prc_master_supplier d ON b.id_prc_master_supplier = d.id_prc_master_supplier
        WHERE a.is_deleted = 0 AND a.no_urut='$no_urut'
        ";

        return $this->db->query($sql)->result_array();
    }

    // 6. PROSES UTAMA (1 pintu)
    public function proses_persetujuan($no_urut, $tgl_rilis)
    {
        $id_user = $this->id_user();
        $permintaan = $this->get_by_no_urut($no_urut);

        foreach ($permintaan as $item) {

            // insert barang keluar
            $this->insert_barang_keluar([
                'id_adm_bm' => $item['id_adm_bm'],
                'id_prc_master_barang' => $item['id_prc_master_barang'],
                'no_batch' => $item['no_batch'],
                'jml_bk' => $item['jml_permintaan'],
                'tgl_bk' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $id_user, 
                'is_deleted' => 0
            ]);

            // insert transaksi melting
            $this->insert_trans_melting([
                'id_adm_bm' => $item['id_adm_bm'],
                'tgl_masuk' =>date('Y-m-d H:i:s') ,
                'jml_masuk' => $item['jml_permintaan'],
                'id_prc_master_barang' => $item['id_prc_master_barang'],
                'id_mlt_permintaan_barang' => $item['id_mlt_permintaan_barang'],
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $id_user,
                'is_deleted' => 0
            ]);
        }

        // update status permintaan
        return $this->update_status_permintaan($no_urut, "Disetujui");
    }

}
