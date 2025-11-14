<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class acc_manager extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_ppb/M_ppb_tf');
        $this->load->model('M_ppb/M_ppb');
        $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
    }
    private function convertDate($date)
    {
        // Pastikan format tanggal valid sebelum diproses
        $dateParts = explode('/', $date);
        if (count($dateParts) == 3) {
            return $dateParts[2] . "-" . $dateParts[1] . "-" . $dateParts[0];
        } else {
            log_message('error', 'Tanggal tidak valid: ' . $date);
            return null; // atau set nilai default
        }
    }

    public function index()
    {
        $data['result'] = $this->M_ppb_tf->get_manager()->result_array();
        $this->template->load('template', 'content/administrator/acc/acc_manager', $data);
    }

    public function update()
    {
        $data['no_ppb'] = $this->input->post('no_ppb', TRUE);
        $respon = $this->M_ppb_tf->approval_manager($data['no_ppb']);
       
        if ($respon) {
            // Redirect setelah berhasil
            header('location:'.base_url('administrator/acc/acc_manager').'?alert=success&msg=Selamat anda berhasil acc Barang');
        } else {
            // Redirect jika gagal
            header('location:'.base_url('administrator/acc/acc_manager').'?alert=error&msg=Maaf anda gagal acc Barang');
        }
    }

    public function delete($no_ppb)
    {
        $respon = $this->M_ppb_tf->delete_manager($no_ppb);
        if ($respon) {
            // Redirect setelah berhasil
            header('location:'.base_url('administrator/acc/acc_manager').'?alert=success&msg=Selamat anda berhasil menghapus data PPB');
        } else {
            // Redirect jika gagal
            header('location:'.base_url('administrator/acc/acc_manager').'?alert=error&msg=Maaf anda gagal menghapus data PPB');
        }
    }

}