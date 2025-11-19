<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_schedule extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_marketing/M_tambah_schedule');
        $this->load->model('M_marketing/M_customer');
        $this->load->model('M_marketing/M_kode_warna');
        $this->load->model('M_marketing/M_master_print');
        $this->load->model('M_marketing/M_konfirmasi_pesanan');
    }

    public function index()
    {
        $data['result'] = $this->M_tambah_schedule->get()->result_array();
        $data['res_kodewarna_cap'] = $this->M_kode_warna->getcap()->result_array();
        $data['res_kodewarna_body'] = $this->M_kode_warna->getbody()->result_array();
        $data['res_customer'] = $this->M_customer->get()->result_array();
       $data['res_no_kp'] = $this->M_tambah_schedule->get_available_kp();
        
        $this->template->load('template', 'content/marketing/tambah_schedule/schedule_data', $data);
    }

    public function add()
    {
        $data['id_mkt_kp'] = $this->input->post('id_mkt_kp', TRUE);
        $data['id_customer'] = $this->input->post('hidden_id_customer', TRUE);
        $data['id_master_kw_cap'] = $this->input->post('hidden_id_master_kw_cap', TRUE);
        $data['id_master_kw_body'] = $this->input->post('hidden_id_master_kw_body', TRUE);
        
        $data['no_cr'] = $this->input->post('no_cr', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['tgl_sch'] = $this->convertDate($this->input->post('tgl_sch', TRUE));
        $data['size_machine'] = $this->input->post('size_machine', TRUE);
        $data['mesin_prd'] = $this->input->post('mesin_prd', TRUE);
        $data['jumlah_prd'] = $this->input->post('jumlah_prd', TRUE);
        $data['sisa'] = $this->input->post('jumlah_prd', TRUE);
        $data['cek_print'] = $this->input->post('cek_print', TRUE);
        $data['print'] = $this->input->post('print', TRUE);
        $data['tinta'] = $this->input->post('tinta', TRUE);
        $data['jenis_grv'] = $this->input->post('jenis_grv', TRUE);
        $data['jenis_box'] = $this->input->post('jenis_box', TRUE);
        $data['jenis_zak'] = $this->input->post('jenis_zak', TRUE);
        $data['minyak'] = $this->input->post('minyak', TRUE);
        $data['tgl_kirim'] = $this->convertDate($this->input->post('tgl_kirim', TRUE));
        $data['tgl_prd'] = $this->convertDate($this->input->post('tgl_prd', TRUE));
        $data['ket_prd'] = $this->input->post('ket_prd', TRUE);
        
        $respon = $this->M_tambah_schedule->add($data);

        if ($respon['success']) {
            header('location:' . base_url('Marketing/Tambah_schedule') . '?alert=success&msg=' . urlencode($respon['message']));
        } else {
            header('location:' . base_url('Marketing/Tambah_schedule') . '?alert=error&msg=' . urlencode($respon['message']));
        }
    }

    public function update()
{
    $data['id_mkt_schedule'] = $this->input->post('id_mkt_schedule', TRUE);
    $data['id_mkt_kp'] = $this->input->post('id_mkt_kp', TRUE);
    
    // GUNAKAN FIELD HIDDEN - ini yang penting!
    $data['id_customer'] = $this->input->post('hidden_id_customer', TRUE);
    $data['id_master_kw_cap'] = $this->input->post('hidden_id_master_kw_cap', TRUE);
    $data['id_master_kw_body'] = $this->input->post('hidden_id_master_kw_body', TRUE);
    
    // Debug: cek apa yang diterima
    error_log("Update Data: " . print_r([
        'id_customer' => $data['id_customer'],
        'id_master_kw_cap' => $data['id_master_kw_cap'],
        'id_master_kw_body' => $data['id_master_kw_body']
    ], true));
    
    $data['no_cr'] = $this->input->post('no_cr', TRUE);
    $data['no_batch'] = $this->input->post('no_batch', TRUE);
    $data['tgl_sch'] = $this->convertDate($this->input->post('tgl_sch', TRUE));
    $data['size_machine'] = $this->input->post('size_machine', TRUE);
    $data['mesin_prd'] = $this->input->post('mesin_prd', TRUE);
    $data['jumlah_prd'] = $this->input->post('jumlah_prd', TRUE);
    $data['sisa'] = $this->input->post('jumlah_prd', TRUE); // atau sisa jika ada fieldnya
    $data['print'] = $this->input->post('print', TRUE);
    $data['tinta'] = $this->input->post('tinta', TRUE);
    $data['jenis_grv'] = $this->input->post('jenis_grv', TRUE);
    $data['jenis_box'] = $this->input->post('jenis_box', TRUE);
    $data['jenis_zak'] = $this->input->post('jenis_zak', TRUE);
    $data['minyak'] = $this->input->post('minyak', TRUE);
    $data['tgl_kirim'] = $this->convertDate($this->input->post('tgl_kirim', TRUE));
    $data['tgl_prd'] = $this->convertDate($this->input->post('tgl_prd', TRUE));
    $data['ket_prd'] = $this->input->post('ket_prd', TRUE);
    
    $respon = $this->M_tambah_schedule->update($data);
    
    if ($respon['success']) {
        header('location:' . base_url('Marketing/Tambah_schedule') . '?alert=success&msg=' . urlencode($respon['message']));
    } else {
        header('location:' . base_url('Marketing/Tambah_schedule') . '?alert=error&msg=' . urlencode($respon['message']));
    }
}
    public function cek_no_cr()
    {
        $no_cr = $this->input->post('no_cr', TRUE);

        $row = $this->M_tambah_schedule->cek_no_cr($no_cr)->row_array();
        if ($row['count_cr'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    // Fungsi baru untuk validasi no_cr pada edit
    public function cek_no_cr_edit()
    {
        $no_cr = $this->input->post('no_cr', TRUE);
        $id_mkt_schedule = $this->input->post('id_mkt_schedule', TRUE);

        $row = $this->M_tambah_schedule->cek_no_cr_edit($no_cr, $id_mkt_schedule)->row_array();
        if ($row['count_cr'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function delete($id_sch)
    {
        $data['id_mkt_schedule'] = $id_sch;
        $respon = $this->M_tambah_schedule->delete($data);

        if ($respon['success']) {
            header('location:' . base_url('Marketing/Tambah_schedule') . '?alert=success&msg=' . urlencode($respon['message']));
        } else {
            header('location:' . base_url('Marketing/Tambah_schedule') . '?alert=error&msg=' . urlencode($respon['message']));
        }
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    // New function to get KP data by ID
    public function get_kp_by_id()
    {
        $id_mkt_kp = $this->input->post('id_mkt_kp');
        
        try {
            $data = $this->M_tambah_schedule->get_kp_by_id($id_mkt_kp);
            
            if ($data) {
                // Hitung sisa KP yang belum dijadwalkan
                $remaining = $this->M_tambah_schedule->get_remaining_kp($id_mkt_kp);
                $sisa_kp = $remaining['jumlah_kp'] - $remaining['total_scheduled'];
                
                echo json_encode([
                    'success' => true,
                    'data' => $data,
                    'sisa_kp' => $sisa_kp,
                    'total_scheduled' => $remaining['total_scheduled']
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        } catch (Exception $e) {
            error_log("Error in get_kp_data: " . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'Terjadi kesalahan server: ' . $e->getMessage()
            ]);
        }
    }

    // Fungsi untuk mendapatkan sisa KP
    public function get_remaining_kp($id_mkt_kp)
    {
        $remaining = $this->M_tambah_schedule->get_remaining_kp($id_mkt_kp);
        echo json_encode([
            'jumlah_kp' => $remaining['jumlah_kp'],
            'total_scheduled' => $remaining['total_scheduled'],
            'sisa_kp' => $remaining['jumlah_kp'] - $remaining['total_scheduled']
        ]);
    }

     public function get_available_kp_ajax()
    {
        $kp_list = $this->M_tambah_schedule->get_available_kp();
        echo json_encode($kp_list);
    }

    public function get_active_kp_ajax()
    {
        $kp_list = $this->M_tambah_schedule->get_active_kp();
        echo json_encode($kp_list);
    }

    public function get_prints_by_customer() {
        $id_mkt_kp = $this->input->post('id_mkt_kp');
        
        try {
            $prints_data = $this->M_master_print->get_prints_by_kp($id_mkt_kp);
            
            if ($prints_data) {
                echo json_encode([
                    'success' => true,
                    'data' => $prints_data
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Data print tidak ditemukan'
                ]);
            }
        } catch (Exception $e) {
            error_log("Error in get_prints_by_customer: " . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'Terjadi kesalahan server'
            ]);
        }
    }
}