<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master_stok extends CI_Model {

    private $table = 'tb_mkt_master_stok';

    // ====================== GET ALL ======================
    public function get_all() {
        try {
            return $this->db->where('is_deleted', 0)
                            ->order_by('tahun_stok', 'DESC')
                            ->order_by('stok_bulan', 'DESC')
                            ->get($this->table)
                            ->result();
        } catch (Exception $e) {
            log_message('error', 'Error in get_all: ' . $e->getMessage());
            return [];
        }
    }

    // ====================== GET BY ID ======================
    public function get_by_id($id) {
        try {
            return $this->db->get_where($this->table, ['id_master_stok_size' => $id])->row();
        } catch (Exception $e) {
            log_message('error', 'Error in get_by_id: ' . $e->getMessage());
            return false;
        }
    }

    // ====================== INSERT ======================
    public function insert($data) {
    try {
        return $this->db->insert($this->table, $data);
    } catch (Exception $e) {
        log_message('error', 'Error in insert: ' . $e->getMessage());
        return false;
    }
}

public function update($id, $data) {
    try {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = $this->session->userdata('id_user') ?? 1;
        return $this->db->where('id_master_stok_size', $id)
                        ->update($this->table, $data);
    } catch (Exception $e) {
        log_message('error', 'Error in update: ' . $e->getMessage());
        return false;
    }
}

public function delete($id) {
    try {
        $data = [
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->session->userdata('id_user') ?? 1
        ];
        return $this->db->where('id_master_stok_size', $id)
                        ->update($this->table, $data);
    } catch (Exception $e) {
        log_message('error', 'Error in delete: ' . $e->getMessage());
        return false;
    }
}

    // ====================== DUPLICATE CHECK ======================
    public function check_duplicate($stok_bulan, $tahun_stok, $id = null) {
        try {
            $this->db->where('stok_bulan', $stok_bulan)
                     ->where('tahun_stok', $tahun_stok)
                     ->where('is_deleted', 0);

            if ($id) {
                $this->db->where('id_master_stok_size !=', $id);
            }

            return $this->db->get($this->table)->num_rows() > 0;
        } catch (Exception $e) {
            log_message('error', 'Error in check_duplicate: ' . $e->getMessage());
            return false;
        }
    }
}
