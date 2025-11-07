<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_stock extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_marketing/M_master_stok');
    }

    public function index()
    {
        $data['result'] = $this->M_master_stok->get()->result_array();
        $this->template->load('template', 'content/marketing/stock_size/master_stock_size_data', $data);
    }

    public function add()
    {

        $stok_bulan = $this->input->post('stok_bulan', TRUE);
        $tahun_stok = $this->input->post('tahun_stok', TRUE);

        if(empty($tahun_stok) || $tahun_stok < 2020 || $tahun_stok > 2030) {
        redirect('Marketing/master/Master_stock?alert=error&msg=Tahun tidak valid');
        return;
    }

        $data = [
            'stok_bulan' => $stok_bulan,
            'tahun_stok' => $tahun_stok,
            'id_user' => $this->session->userdata('id_user'),
        ];

        $respon = $this->M_master_stok->add($data);

        if ($respon) {
            redirect('Marketing/master/Master_stock?alert=success&msg=Selamat anda berhasil menambah Stock Size');
        } else {
            redirect('Marketing/master/Master_stock?alert=error&msg=Maaf anda gagal menambah Stock Size');
        }
    }

    public function update()
    {
        $data['id_master_stok_size'] = $this->input->post('id_master_stok_size', TRUE);
        $data['stok_bulan'] = $this->input->post('stok_bulan', TRUE);
        $data['tahun_stok'] = $this->input->post('tahun_stok', TRUE);
        
        $respon = $this->M_master_stok->update($data);
        
        if ($respon) {
            redirect('Marketing/master/Master_stock?alert=success&msg=Selamat anda berhasil meng-update Stock Size');
        } else {
            redirect('Marketing/master/Master_stock?alert=error&msg=Maaf anda gagal meng-update Stock Size');
        }
    }

    public function delete($id_master_stok_size)
    {
        $data['id_master_stok_size'] = $id_master_stok_size;
        $respon = $this->M_master_stok->delete($data);

        if ($respon) {
            redirect('Marketing/master/Master_stock?alert=success&msg=Selamat anda berhasil menghapus Stock Size');
        } else {
            redirect('Marketing/master/Master_stock?alert=error&msg=Maaf anda gagal menghapus Stock Size');
        }
    }
}