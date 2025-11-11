<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_pesanan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_marketing/M_konfirmasi_pesanan');
        $this->load->model('M_marketing/M_customer');
        $this->load->model('M_marketing/M_kode_warna');
        $this->load->model('M_marketing/M_master_print');
        $this->load->model('M_marketing/M_master_stok');
        $this->load->library('Template');
    }
    
    public function index() {
        // Ambil parameter filter
        $nama_customer = $this->input->get('nama_customer');
        $date_from = $this->input->get('date_from');
        $date_until = $this->input->get('date_until');
        
        // Data untuk filter
        $data['res_customer'] = $this->M_konfirmasi_pesanan->get_customers();
        
        // Data untuk kode warna (langsung dari master)
        $data['res_warna_cap'] = $this->M_kode_warna->getcap()->result_array();
        $data['res_warna_body'] = $this->M_kode_warna->getbody()->result_array();
        $data['res_bulan_stok'] = $this->M_master_stok->get()->result_array();
        // Data untuk tabel
        $data['result'] = $this->M_konfirmasi_pesanan->get_all($nama_customer, $date_from, $date_until);
        
        // Data filter untuk view
        $data['nama_customer'] = $nama_customer;
        $data['tgl'] = $date_from;
        $data['tgl2'] = $date_until;
        
        $data['title'] = 'Konfirmasi Pesanan';
        
        // Load view dengan template
        $this->template->load('template', 'content/marketing/konfirmasi_pesanan/konfirmasi_pesanan_data', $data);
    }
    
    public function add() {
    if ($_POST) {
        // Format angka (hapus titik)
        $jumlah_kp = str_replace('.', '', $this->input->post('jumlah_kp'));
        $harga_kp = str_replace('.', '', $this->input->post('harga_kp'));
        $id_bulan_stok = $this->input->post('id_bulan_stok');
        
        // Validasi stok cukup - PAKAI METHOD YANG SUDAH ADA
        $stok_master_data = $this->M_master_stok->get()->result_array();
        $stok_master = null;
        
        // Cari stok berdasarkan id_bulan_stok
        foreach ($stok_master_data as $stok) {
            if ($stok['id_master_stok_size'] == $id_bulan_stok) {
                $stok_master = $stok;
                break;
            }
        }
        
        if (!$stok_master || $stok_master['stok_master'] < $jumlah_kp) {
            $stok_tersedia = $stok_master ? $stok_master['stok_master'] : 0;
            $this->session->set_flashdata('error', 'Stok tidak mencukupi! Stok tersedia: ' . number_format($stok_tersedia, 0, ',', '.'));
            redirect('marketing/konfirmasi_pesanan');
        }
        
        $data = array(
            'No_kp' => $this->input->post('no_kp'),
            'Tgl_kp' => date('Y-m-d', strtotime($this->input->post('tgl_kp'))),
            'Id_customer' => $this->input->post('id_customer'),
            'id_master_stok_size' => $id_bulan_stok,
            'spek_kapsul' => $this->input->post('spek_kapsul'),
            'id_master_print' => $this->input->post('id_master_print'),
            'kode_print' => $this->input->post('kode_print'),
            'logo_print' => $this->input->post('logo_print'),
            'id_master_kw_cap' => $this->input->post('id_master_kw_cap'),
            'kode_warna_cap' => $this->input->post('kode_warna_cap'),
            'id_master_kw_body' => $this->input->post('id_master_kw_body'),
            'kode_warna_body' => $this->input->post('kode_warna_body'),
            'jumlah_kp' => $jumlah_kp,
            'harga_kp' => $harga_kp,
            'no_po' => $this->input->post('no_po'),
            'tgl_po' => $this->input->post('tgl_po') ? date('Y-m-d', strtotime($this->input->post('tgl_po'))) : null,
            'jenis_pack' => $this->input->post('jenis_pack'),
            'Tgl_kirim' => $this->input->post('tgl_kirim') ? date('Y-m-d', strtotime($this->input->post('tgl_kirim'))) : null,
            'ket_kp' => $this->input->post('ket_kp'),
            'created_by' => $this->session->userdata('nama'),
            'created_at' => date('Y-m-d H:i:s')
        );
        
        // Insert data konfirmasi pesanan
        if ($this->M_konfirmasi_pesanan->insert($data)) {
            // Kurangi stok di master stok size
            $this->M_konfirmasi_pesanan->update_stok_size($id_bulan_stok, $jumlah_kp);
            
            $this->session->set_flashdata('success', 'Data berhasil disimpan dan stok master terupdate');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
        redirect('marketing/konfirmasi_pesanan');
    }
}

public function update() {
    if ($_POST) {
        $id = $this->input->post('id_mkt_kp');
        $id_bulan_stok_baru = $this->input->post('id_bulan_stok');
        
        // Format angka (hapus titik)
        $jumlah_kp_baru = str_replace('.', '', $this->input->post('jumlah_kp'));
        $harga_kp = str_replace('.', '', $this->input->post('harga_kp'));
        
        // Get data lama
        $data_lama = $this->M_konfirmasi_pesanan->get_by_id($id);
        $id_bulan_stok_lama = $data_lama['id_master_stok_size'];
        $jumlah_kp_lama = $data_lama['jumlah_kp'];
        
        // Validasi stok cukup jika ganti bulan stok atau jumlah berubah
        if ($id_bulan_stok_baru != $id_bulan_stok_lama || $jumlah_kp_baru != $jumlah_kp_lama) {
            // PAKAI METHOD YANG SUDAH ADA
            $stok_master_data = $this->M_master_stok->get()->result_array();
            $stok_master = null;
            
            // Cari stok berdasarkan id_bulan_stok_baru
            foreach ($stok_master_data as $stok) {
                if ($stok['id_master_stok_size'] == $id_bulan_stok_baru) {
                    $stok_master = $stok;
                    break;
                }
            }
            
            if (!$stok_master || $stok_master['stok_master'] < $jumlah_kp_baru) {
                $stok_tersedia = $stok_master ? $stok_master['stok_master'] : 0;
                $this->session->set_flashdata('error', 'Stok tidak mencukupi! Stok tersedia: ' . number_format($stok_tersedia, 0, ',', '.'));
                redirect('marketing/konfirmasi_pesanan');
            }
        }
        
        $data = array(
            'No_kp' => $this->input->post('no_kp'),
            'Tgl_kp' => date('Y-m-d', strtotime($this->input->post('tgl_kp'))),
            'Id_customer' => $this->input->post('id_customer'),
            'id_master_stok_size' => $id_bulan_stok_baru,
            'spek_kapsul' => $this->input->post('spek_kapsul'),
            'id_master_print' => $this->input->post('id_master_print'),
            'kode_print' => $this->input->post('kode_print'),
            'logo_print' => $this->input->post('logo_print'),
            'id_master_kw_cap' => $this->input->post('id_master_kw_cap'),
            'kode_warna_cap' => $this->input->post('kode_warna_cap'),
            'id_master_kw_body' => $this->input->post('id_master_kw_body'),
            'kode_warna_body' => $this->input->post('kode_warna_body'),
            'jumlah_kp' => $jumlah_kp_baru,
            'harga_kp' => $harga_kp,
            'no_po' => $this->input->post('no_po'),
            'tgl_po' => $this->input->post('tgl_po') ? date('Y-m-d', strtotime($this->input->post('tgl_po'))) : null,
            'jenis_pack' => $this->input->post('jenis_pack'),
            'Tgl_kirim' => $this->input->post('tgl_kirim') ? date('Y-m-d', strtotime($this->input->post('tgl_kirim'))) : null,
            'ket_kp' => $this->input->post('ket_kp'),
            'updated_by' => $this->session->userdata('nama'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        // Update data konfirmasi pesanan
        if ($this->M_konfirmasi_pesanan->update($id, $data)) {
            // Update stok master
            if ($id_bulan_stok_baru != $id_bulan_stok_lama) {
                // Kembalikan stok lama, kurangi stok baru
                $this->M_konfirmasi_pesanan->restore_stok($id_bulan_stok_lama, $jumlah_kp_lama);
                $this->M_konfirmasi_pesanan->update_stok_size($id_bulan_stok_baru, $jumlah_kp_baru);
            } else if ($jumlah_kp_baru != $jumlah_kp_lama) {
                // Update stok dengan selisih
                $selisih = $jumlah_kp_baru - $jumlah_kp_lama;
                if ($selisih > 0) {
                    $this->M_konfirmasi_pesanan->update_stok_size($id_bulan_stok_baru, $selisih);
                } else {
                    $this->M_konfirmasi_pesanan->restore_stok($id_bulan_stok_baru, abs($selisih));
                }
            }
            
            $this->session->set_flashdata('success', 'Data berhasil diupdate dan stok master terupdate');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diupdate');
        }
        redirect('marketing/konfirmasi_pesanan');
    }
}

// Fungsi get_current_stok juga sesuaikan
public function get_current_stok() {
    $stok_terbaru = $this->M_master_stok->get()->row_array();
    echo json_encode(['stok_master' => $stok_terbaru ? $stok_terbaru['stok_master'] : 0]);
}
    
    public function delete($id) {
        $data = $this->M_konfirmasi_pesanan->get_by_id($id);
        
        if ($this->M_konfirmasi_pesanan->delete($id)) {
            // Kembalikan stok ke master
            $this->M_konfirmasi_pesanan->restore_stok($data['id_master_stok_size'], $data['jumlah_kp']);
            $this->session->set_flashdata('success', 'Data berhasil dihapus dan stok dikembalikan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }
        redirect('marketing/konfirmasi_pesanan');
    }
    
    public function cek_no_kp() {
        $no_kp = $this->input->post('no_kp');
        $cek = $this->M_konfirmasi_pesanan->cek_no_kp($no_kp);
        echo $cek ? "true" : "false";
    }
    
    /**
     * Get stok master saat ini
     */
    // public function get_current_stok() {
    //     $stok_terbaru = $this->M_master_stok->get()->row_array();
    //     echo json_encode(['stok_master' => $stok_terbaru ? $stok_terbaru['stok_master'] : 0]);
    // }
    
    // Fungsi AJAX untuk mendapatkan data kode print berdasarkan customer
    public function get_prints_by_customer() {
        $id_customer = $this->input->post('id_customer');
        
        // Get prints data berdasarkan customer
        $prints_result = $this->M_master_print->get();
        $prints = array();
        
        foreach ($prints_result->result_array() as $print) {
            if ($print['id_master_customer'] == $id_customer) {
                $prints[] = $print;
            }
        }
        
        echo json_encode($prints);
    }
}
?>