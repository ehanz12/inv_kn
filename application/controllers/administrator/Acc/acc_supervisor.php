<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class acc_supervisor extends CI_Controller
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
        $data['result'] = $this->M_ppb_tf->get()->result_array();
        $this->template->load('template', 'content/administrator/acc/acc_supervisor', $data);
    }
}