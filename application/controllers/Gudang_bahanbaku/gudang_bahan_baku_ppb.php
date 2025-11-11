<?php
defined('BASEPATH') or exit('No direct script access allowed');

class gudang_bahan_baku_ppb extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_ppb/M_ppb_tf', 'M_ppb');
        $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
    }

    // private function convertDate($date)
    // {
    //     return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    // }

    public function index()
    {
        $data['result'] = $this->M_ppb->get()->result_array();
        $data['res_barang'] = $this->M_prc_ppb_masterbarang->get_master_barang();
        $this->template->load('template', 'content/gudang_bahanbaku/ppb/ppb_data', $data);
    }
}