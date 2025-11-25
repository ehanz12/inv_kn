<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stok_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // Pastikan nama model yang diload benar sesuai dengan struktur folder
        $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
        $this->load->model('M_purchasing/M_prc_ppb/M_po_supplier/M_prc_master_supplier');
        $this->load->model('M_adm_barang_masuk/M_adm_barang_masuk');
        $this->load->library('form_validation'); // Memuat library form_validation untuk validasi input
    }

    public function index()
{
    // Ambil data filter barang dan master barang
    $data['fil_barang'] = $this->M_prc_ppb_masterbarang->get_filter_brng();
    $data['res_barang'] = $this->M_prc_ppb_masterbarang->get_master_barang();

    // Ambil data barang
    $data['result'] = $this->M_adm_barang_masuk->get()->result_array();
    $data['res_supp'] = $this->M_adm_barang_masuk->get()->result_array();

    // Misalnya jika Anda mendapatkan nama barang yang dipilih
    $data['name'] = 'Nama Barang yang Terpilih'; // Setel ini sesuai dengan kebutuhan

    // Memuat view dengan data yang diperlukan
    $this->template->load('template', 'content/administrator/stok_barang', $data);
}


    public function add()
    {
        // Validasi input
        $this->form_validation->set_rules('id_prc_ppb_supplier', 'id_prc_ppb_supplier', 'required');
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenis_barang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('tipe_barang', 'Tipe Barang', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Menampilkan form kembali jika validasi gagal
            $this->index();
        } else {
            // Mengambil data dari form
            $data['id_prc_ppb_supplier'] = $this->input->post('id_prc_ppb_supplier', TRUE);
            $data['kode_barang'] = $this->input->post('kode_barang', TRUE);
            $data['nama_barang'] = $this->input->post('nama_barang', TRUE);
            $data['jenis_barang'] = $this->input->post('jenis_barang', TRUE);
            $data['tipe_barang'] = $this->input->post('tipe_barang', TRUE);
            $data['spek'] = $this->input->post('spek', TRUE);
            $data['mesh'] = $this->input->post('mesh', TRUE);
            $data['bloom'] = $this->input->post('bloom', TRUE);
            $data['satuan'] = $this->input->post('satuan', TRUE);

            // Menambahkan data barang ke database
            $respon = $this->M_prc_ppb_masterbarang->add($data);

            if ($respon) {
                // Redirect setelah berhasil
                $this->session->set_flashdata('success', 'Selamat, Anda berhasil menambah barang.');
                redirect('purchasing/prc_ppb/prc_ppb_masterbarang');
            } else {
                // Redirect jika gagal
                $this->session->set_flashdata('error', 'Maaf, Anda gagal menambah barang.');
                redirect('purchasing/prc_ppb/prc_ppb_masterbarang');
            }
        }
    }

    public function update()
    {
        // Validasi input
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenis_barang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('tipe_barang', 'Tipe Barang', 'required');
        $this->form_validation->set_rules('spek', 'Spesifikasi', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Menampilkan form kembali jika validasi gagal
            $this->index();
        } else {
            // Mengambil data dari form
            $data['id_prc_master_barang'] = $this->input->post('id_prc_master_barang', TRUE);
            $data['id_prc_master_supplier'] = $this->input->post('id_prc_master_supplier', TRUE);
            $data['kode_barang'] = $this->input->post('kode_barang', TRUE);
            $data['nama_barang'] = $this->input->post('nama_barang', TRUE);
            $data['jenis_barang'] = $this->input->post('jenis_barang', TRUE);
            $data['tipe_barang'] = $this->input->post('tipe_barang', TRUE);
            $data['mesh'] = $this->input->post('mesh', TRUE);
            $data['bloom'] = $this->input->post('bloom', TRUE);
            $data['spek'] = $this->input->post('spek', TRUE);
            $data['satuan'] = $this->input->post('satuan', TRUE);

            // Memperbarui data barang di database
            $respon = $this->M_prc_ppb_masterbarang->update($data);

            if ($respon) {
                // Redirect setelah berhasil
                $this->session->set_flashdata('success', 'Selamat, Anda berhasil meng-update barang.');
                redirect('purchasing/prc_ppb/prc_ppb_masterbarang');
            } else {
                // Redirect jika gagal
                $this->session->set_flashdata('error', 'Maaf, Anda gagal meng-update barang.');
                redirect('purchasing/prc_ppb/prc_ppb_masterbarang');
            }
        }
    }

    public function delete($id_prc_master_barang)
    {
        $data['id_prc_master_barang'] = $id_prc_master_barang;
        $respon = $this->M_prc_ppb_masterbarang->delete($data);

        if ($respon) {
            // Redirect setelah berhasil
            $this->session->set_flashdata('success', 'Selamat, Anda berhasil menghapus barang.');
            redirect('purchasing/prc_ppb/prc_ppb_masterbarang');
        } else {
            // Redirect jika gagal
            $this->session->set_flashdata('error', 'Maaf, Anda gagal menghapus barang.');
            redirect('purchasing/prc_ppb/prc_ppb_masterbarang');
        }
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function cek_kode_barang()
    {
        $kode_barang = $this->input->post('kode_barang', TRUE);
        $row = $this->M_prc_ppb_masterbarang->cek_kode_barang($kode_barang)->row_array();

        if ($row['count_sj']==0) {
            echo "false";
        } else {
            echo "true";
        }
    }

}
?>