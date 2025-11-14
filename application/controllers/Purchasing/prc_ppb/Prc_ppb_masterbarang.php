<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prc_ppb_masterbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Pastikan nama model yang diload benar sesuai dengan struktur folder
        $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
        $this->load->model('M_purchasing/M_prc_ppb/M_po_supplier/M_prc_master_supplier');
        $this->load->library('form_validation'); // Memuat library form_validation untuk validasi input
    }

    public function index()
{
    // Ambil data filter barang dan master barang
    $data['fil_barang'] = $this->M_prc_ppb_masterbarang->get_filter_brng();
    $data['res_barang'] = $this->M_prc_ppb_masterbarang->get_master_barang();

    // Ambil data barang
    $data['result'] = $this->M_prc_ppb_masterbarang->get()->result_array();
    $data['res_supp'] = $this->M_prc_master_supplier->get()->result_array();

    // Misalnya jika Anda mendapatkan nama barang yang dipilih
    $data['name'] = 'Nama Barang yang Terpilih'; // Setel ini sesuai dengan kebutuhan

    // Memuat view dengan data yang diperlukan
    $this->template->load('template', 'content/purchasing/prc_ppb/prc_ppb_masterbarang', $data);
}

public function update()
    {
        // Validasi input
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenis_barang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('spek', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Menampilkan form kembali jika validasi gagal
            $this->index();
        } else {
            // Mengambil data dari form
            $data['id_prc_master_barang'] = $this->input->post('id_prc_master_barang', TRUE);
            $data['id_prc_master_supplier'] = $this->input->post('id_prc_master_supplier', TRUE);
            $data['tipe_barang'] = $this->input->post('tipe_barang', TRUE);

            // Memperbarui data barang di database
            $respon = $this->M_prc_ppb_masterbarang->update_supplier($data);

            if ($respon) {
                // Redirect setelah berhasil
            header('location:'.base_url('administrator/master_barang').'?alert=success&msg=Selamat anda berhasil Mengupdated Barang');
            } else {
                // Redirect jika gagal
            header('location:'.base_url('administrator/master_barang').'?alert=error&msg=Maaf anda gagal Mengupdated Barang');

            }
        }
    }
}
?>