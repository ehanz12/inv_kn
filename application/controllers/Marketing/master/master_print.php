<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_print extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_marketing/M_master_print');
    }

    public function index()
    {
        $data['result'] = $this->M_master_print->get()->result_array();
        $this->template->load('template', 'content/marketing/master_print/master_print_data', $data);
    }

    public function add()
    {
        $data = [
            'kode_print' => $this->input->post('kode_print', TRUE),
            'id_master_customer' => $this->input->post('id_master_customer', TRUE),
            'logo_print' => $this->input->post('logo_print', TRUE),
            'id_user' => $this->session->userdata('id_user'),
        ];

        $respon = $this->M_master_print->add($data);

        if ($respon) {
            redirect('Marketing/master/Master_print?alert=success&msg=Selamat anda berhasil menambah Master Print');
        } else {
            redirect('Marketing/master/Master_print?alert=error&msg=Maaf anda gagal menambah Master Print');
        }
    }

    public function update()
    {
        $data['id_master_print'] = $this->input->post('id_master_print', TRUE);
        $data['kode_print'] = $this->input->post('kode_print', TRUE);
        $data['id_master_customer'] = $this->input->post('id_master_customer', TRUE);
        $data['logo_print'] = $this->input->post('logo_print', TRUE);
        
        $respon = $this->M_master_print->update($data);
        
        if ($respon) {
            redirect('Marketing/master/Master_print?alert=success&msg=Selamat anda berhasil meng-update Master Print');
        } else {
            redirect('Marketing/master/Master_print?alert=error&msg=Maaf anda gagal meng-update Master Print');
        }
    }

    public function delete($id_master_print)
    {
        $data['id_master_print'] = $id_master_print;
        $respon = $this->M_master_print->delete($data);

        if ($respon) {
            redirect('Marketing/master/Master_print?alert=success&msg=Selamat anda berhasil menghapus Master Print');
        } else {
            redirect('Marketing/master/Master_print?alert=error&msg=Maaf anda gagal menghapus Master Print');
        }
    }

    public function cek_kode_print()
    {
        $kode_print = $this->input->post('kode_print', TRUE);

        $row = $this->M_master_print->cek_kode_print($kode_print)->row_array();
        if ($row['count_sj'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function cek_kode_print_edit()
    {
        $kode_print = $this->input->post('kode_print', TRUE);
        $id_master_print = $this->input->post('id_master_print', TRUE);

        // Query untuk cek kode print selain id yang sedang diedit
        $sql = "SELECT COUNT(*) as count_sj FROM tb_mkt_master_print 
                WHERE kode_print = '$kode_print' 
                AND id_master_print != '$id_master_print' 
                AND is_deleted = 0";
        
        $row = $this->db->query($sql)->row_array();
        if ($row['count_sj'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }
}