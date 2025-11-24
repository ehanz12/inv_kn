<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchasing_ppb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_purchasing/M_purchasing_ppb/M_purchasing_ppb');
        $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
        $this->load->model('M_purchasing/M_prc_dpb/M_prc_dpb');
        $this->load->library('form_validation');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    
    public function update()
    {
        $data['id_prc_ppb_tf'] = $this->input->post('id_prc_ppb_tf', TRUE);
        $data['no_ppb_accounting'] = $this->input->post('no_ppb_accounting', TRUE);
        $data['tgl_pakai'] = $this->convertDate($this->input->post('tgl_pakai', TRUE));
        $data['tgl_ppb'] = $this->convertDate($this->input->post('tgl_ppb', TRUE));
        $data['departement'] = $this->input->post('departement', TRUE); 
        $data['form_ppb'] = $this->input->post('form_ppb', TRUE);
        $data['jenis_ppb'] = $this->input->post('jenis_ppb', TRUE);
        $data['ket'] = $this->input->post('ket', TRUE);
        $data['nama_admin'] = $this->input->post('nama_admin', TRUE);
        $data['nama_spv'] = $this->input->post('nama_spv', TRUE);
        $data['nama_manager'] = $this->input->post('nama_manager', TRUE);
        $data['nama_pm'] = $this->input->post('nama_pm', TRUE);
        $data['nama_direktur'] = $this->input->post('nama_direktur', TRUE);
        $data['jumlah'] = $this->input->post('jumlah', TRUE);

        log_message('debug', 'Data update: ' . print_r($data, true));
        $respon = $this->M_accounting_ppb->update($data);

        if ($respon) {
            redirect('Purchasing/Purchasing_ppb/Purchasing_ppb?alert=success&msg=Selamat anda berhasil meng-update Barang');
        } else {
            redirect('Purchasing/Purchasing_ppb/urchasing_ppb?alert=error&msg=Maaf anda gagal meng-update Barang');
        }
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['fil_barang'] = $this->M_purchasing_ppb->get_filter_brng();
        $data['res_barang'] = $this->M_purchasing_ppb->get_master_barang();
        $cek_status = $this->M_purchasing_ppb->cek_status()->row_array(0);
        $data['nama_admin'] = $this->session->userdata('nama_admin');
        $data['result'] = $this->M_purchasing_ppb->get($tgl, $tgl2)->result_array();
        $data['pm'] = $this->M_prc_ppb_masterbarang->get()->result_array();
        $data['name'] = 'Nama Barang yang Terpilih';

        $this->template->load('template', 'content/purchasing/purchasing_ppb/purchasing_ppb', $data);
    }


    public function get_barang_detail()
    {
        
        $kode_barang = $this->input->get('kode_barang');

        if (!$kode_barang) {
            echo json_encode(['error' => 'Kode barang tidak valid.']);
            return;
        }

        $data = $this->M_purchasing_ppb->get_barang_detail($kode_barang);
        echo json_encode($data);
    }

    public function delete($no_ppb_accounting)
    {
        $data['no_ppb_accounting'] = str_replace('--', '/', $no_ppb_accounting);
        $respon = $this->M_purchasing_ppb->delete($data);

        if ($respon) {
            header('location:' . base_url('Purchasing/Purchasing_ppb/Purchasing_ppb') . '?alert=success&msg=Selamat anda berhasil menghapus Permintaan Barang Melting');
        } else {
            header('location:' . base_url('Purchasing/Purchasing_ppb/Purchasing_ppb') . '?alert=error&msg=Maaf anda gagal menghapus Permintaan Barang Melting');
        }

    }

    public function data_ppb_barang()
    {
        $no_ppb_accounting = $this->input->post('no_ppb', TRUE);

        $result = $this->M_purchasing_ppb->data_ppb_barang($no_ppb_accounting)->result_array();

        echo json_encode($result);
    }

    public function pdf_cetak($no_ppb_accounting = null)
{
    $no_ppb_accounting = str_replace("--", "/", $no_ppb_accounting);
    $mpdf = new \Mpdf\Mpdf();

    $data['detail'] = $this->M_accounting_ppb->ambil_label($no_ppb_accounting)->result_array();

    $data['jenis_ppb'] = isset($data['detail'][0]['jenis_ppb']) ? $data['detail'][0]['jenis_ppb'] : 'Default Value';
    $data['no_ppb_accounting'] = isset($data['detail'][0]['no_ppb_accounting']) ? $data['detail'][0]['no_ppb_accounting'] : 'Default Value';
    $data['form_ppb'] = isset($data['detail'][0]['form_ppb']) ? $data['detail'][0]['form_ppb'] : 'Default Value';

    $d = $this->load->view('laporan/accounting/page_cetak', $data, TRUE);

    $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
    $mpdf->WriteHTML($d);
    $mpdf->Output();
}

public function approve()
    {
        $no_ppb_accounting = $this->input->post('no_ppb_accounting');
        $approval_level = $this->input->post('approval_level');

        
        if ($no_ppb_accounting && $approval_level) {
            $update = $this->M_purchasing_ppb->approve($no_ppb_accounting, $approval_level);

            if ($update) {
                $this->session->set_flashdata('success', 'Approval berhasil.');
        } else {
                $this->session->set_flashdata('error', 'Approval gagal.');
            }
        } else {
            $this->session->set_flashdata('error', 'Data tidak lengkap.');
        } 

        redirect('Purchasing/Purchasing_ppb/Purchasing_ppb');
    }


}
?>