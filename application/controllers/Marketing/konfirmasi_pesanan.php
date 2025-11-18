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
        // Panggil fungsi auto update tanggal kirim terlebih dahulu
        $this->auto_update_delivery_dates();
        
        // Ambil parameter filter
        $nama_customer = $this->input->get('nama_customer');
        $date_from = $this->input->get('date_from');
        $date_until = $this->input->get('date_until');
        
        // Data untuk filter
        $data['res_customer'] = $this->M_konfirmasi_pesanan->get_customers();
        
        // Data untuk kode warna (langsung dari master)
        $data['res_warna_cap'] = $this->M_kode_warna->getcap()->result_array();
        $data['res_warna_body'] = $this->M_kode_warna->getbody()->result_array();
        
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
    
    /**
     * Fungsi untuk auto update tanggal kirim yang sudah lewat
     */
    private function auto_update_delivery_dates() {
        $today = date('Y-m-d');
        
        // Cari data yang tanggal kirimnya sudah lewat dari hari ini
        $this->db->where('tgl_kirim <', $today);
        $this->db->where('is_deleted', 0);
        $overdue_deliveries = $this->db->get('tb_mkt_kp')->result_array();
        
        if (!empty($overdue_deliveries)) {
            foreach ($overdue_deliveries as $delivery) {
                // Update tanggal kirim menjadi hari ini
                $this->db->where('id_mkt_kp', $delivery['id_mkt_kp']);
                $this->db->update('tb_mkt_kp', [
                    'tgl_kirim' => $today,
                    'updated_by' => 'system_auto_update',
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }

    /**
     * Convert date from dd/mm/yyyy to Y-m-d for database
     */
    private function convertDateToDb($date) {
        if (empty($date) || $date == '00/00/0000' || $date == '01/01/1970') {
            return null;
        }
        
        // Split tanggal dd/mm/yyyy
        $parts = explode('/', $date);
        if (count($parts) === 3) {
            // Reformat ke Y-m-d
            return $parts[2] . '-' . $parts[1] . '-' . $parts[0];
        }
        
        return null;
    }

    /**
     * Convert date from Y-m-d to dd/mm/yyyy for display
     */
    private function convertDateToDisplay($date) {
        if (empty($date) || $date == '0000-00-00' || $date == '1970-01-01') {
            return '';
        }
        
        return date('d/m/Y', strtotime($date));
    }

    public function update_delivery_date() {
        // Cek AJAX request
        if (!$this->input->is_ajax_request()) {
            show_404();
        }

        $id_mkt_kp = $this->input->post('id_mkt_kp');
        $tgl_kirim = $this->input->post('tgl_kirim');
        $updated_by = $this->input->post('updated_by');

        // Validasi input
        if (empty($id_mkt_kp) || empty($tgl_kirim)) {
            echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
            return;
        }

        // Format tanggal dari dd/mm/yyyy ke yyyy-mm-dd
        $tgl_kirim_db = $this->convertDateToDb($tgl_kirim);

        // Update database
        $data = [
            'tgl_kirim' => $tgl_kirim_db,
            'updated_by' => $updated_by,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id_mkt_kp', $id_mkt_kp);
        $result = $this->db->update('tb_mkt_kp', $data);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Tanggal kirim berhasil diupdate']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal update tanggal kirim']);
        }
    }

    public function add() {
        if ($_POST) {
            
            // Format angka (hapus titik)
            $jumlah_kp = str_replace('.', '', $this->input->post('jumlah_kp'));
            $harga_kp = str_replace('.', '', $this->input->post('harga_kp'));
            
            $tgl_kp = $this->convertDateToDb($this->input->post('tgl_kp'));
            $tgl_po = $this->input->post('tgl_po') ? $this->convertDateToDb($this->input->post('tgl_po')) : null;
            $tgl_kirim = $this->input->post('tgl_kirim') ? $this->convertDateToDb($this->input->post('tgl_kirim')) : null;
            
            // Validasi tanggal kirim - jika sudah lewat, set ke hari ini
            if ($tgl_kirim && $tgl_kirim < date('Y-m-d')) {
                $tgl_kirim = date('Y-m-d');
            }
            
            $data = array(
                'No_kp' => $this->input->post('no_kp'),
                'Tgl_kp' => $tgl_kp,
                'id_customer' => $this->input->post('id_customer'),
                'spek_kapsul' => $this->input->post('spek_kapsul'),
                'size_machine' => $this->input->post('size_machine'),
                'id_user' => $this->session->userdata('id_user'),
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
                'tgl_po' => $tgl_po,
                'jenis_pack' => $this->input->post('jenis_pack'),
                'Tgl_kirim' => $tgl_kirim,
                'ket_kp' => $this->input->post('ket_kp'),
                'created_by' => $this->session->userdata('id_user'),
                'created_at' => date('Y-m-d H:i:s')
            );
            
            // Insert data konfirmasi pesanan
            if ($this->M_konfirmasi_pesanan->insert($data)) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan');
            }
            redirect('marketing/konfirmasi_pesanan');
        }
    }

   public function update() {
   

    if ($_POST) {
        $id = $this->input->post('id_mkt_kp');
        
        // Validasi ID - PERBAIKAN: Cek apakah ID ada dan bukan string kosong
        if (empty($id) || $id === "" || $id === "0") {
            $this->session->set_flashdata('error', 'ID tidak valid');
            redirect('marketing/konfirmasi_pesanan');
            return;
        }

        $jumlah_kp = str_replace('.', '', $this->input->post('jumlah_kp'));
        $harga_kp = str_replace('.', '', $this->input->post('harga_kp'));

        $tgl_kp = $this->convertDateToDb($this->input->post('tgl_kp'));
        $tgl_po = $this->input->post('tgl_po') ? $this->convertDateToDb($this->input->post('tgl_po')) : null;
        $tgl_kirim = $this->input->post('tgl_kirim') ? $this->convertDateToDb($this->input->post('tgl_kirim')) : null;
        
        // Validasi tanggal kirim - jika sudah lewat, set ke hari ini
        if ($tgl_kirim && $tgl_kirim < date('Y-m-d')) {
            $tgl_kirim = date('Y-m-d');
        }
        
        $data = array(
            'no_kp' => $this->input->post('no_kp'),
            'tgl_kp' => $tgl_kp,
            'id_customer' => $this->input->post('id_customer'),
            'spek_kapsul' => $this->input->post('spek_kapsul'),
            'size_machine' => $this->input->post('size_machine'),
            'id_user' => $this->session->userdata('id_user'),
            'id_master_print' => $this->input->post('id_master_print') ?: null,
            'kode_print' => $this->input->post('kode_print') ?: null,
            'logo_print' => $this->input->post('logo_print') ?: null,
            'id_master_kw_cap' => $this->input->post('id_master_kw_cap') ?: null,
            'kode_warna_cap' => $this->input->post('kode_warna_cap') ?: null, 
            'id_master_kw_body' => $this->input->post('id_master_kw_body') ?: null,
            'kode_warna_body' => $this->input->post('kode_warna_body') ?: null,
            'jumlah_kp' => $jumlah_kp,
            'harga_kp' => $harga_kp,
            'no_po' => $this->input->post('no_po') ?: null,
            'tgl_po' => $tgl_po,
            'jenis_pack' => $this->input->post('jenis_pack') ?: null,
            
            'ket_kp' => $this->input->post('ket_kp') ?: null
        );
        
        // DEBUG: Tampilkan data sebelum update
        echo "<pre style='background: #f0f0f0; padding: 20px; border: 1px solid blue;'>";
        echo "=== DEBUG CONTROLLER UPDATE ===\n";
        echo "ID: " . $id . "\n";
        echo "Data: " . print_r($data, true) . "\n";
        echo "=== END DEBUG ===\n";
        echo "</pre>";
        
        if ($this->M_konfirmasi_pesanan->update($id, $data)) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diupdate');
        }
        redirect('marketing/konfirmasi_pesanan');
    }
}

    public function delete($id) {
    $data = ['id_mkt_kp' => $id];
    if ($this->M_konfirmasi_pesanan->delete($data)) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
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

    public function update_tanggal_kirim() {
        if ($_POST) {
            $id = $this->input->post('id_mkt_kp');
            $tgl_kirim = $this->input->post('tgl_kirim');
            
            // Validasi input
            if (empty($id) || empty($tgl_kirim)) {
                $this->session->set_flashdata('error', 'ID dan Tanggal Kirim harus diisi');
                redirect('marketing/konfirmasi_pesanan');
                return;
            }

            // Convert tanggal dari dd/mm/yyyy ke Y-m-d
            $tgl_kirim_db = $this->convertDateToDb($tgl_kirim);
            
            // Validasi tanggal kirim - jika sudah lewat, set ke hari ini
            if ($tgl_kirim_db && $tgl_kirim_db < date('Y-m-d')) {
                $tgl_kirim_db = date('Y-m-d');
            }
            
            $data = array(
                'tgl_kirim' => $tgl_kirim_db,
                'updated_by' => $this->session->userdata('id_user'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            
            // Update hanya tanggal kirim
            if ($this->M_konfirmasi_pesanan->update_tanggal_kirim($id, $data)) {
                $this->session->set_flashdata('success', 'Tanggal kirim berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Tanggal kirim gagal diupdate');
            }
            redirect('marketing/konfirmasi_pesanan');
        }
    }
    
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