<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permintaan_barang_gudang extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_melting/M_permintaan_barang_melting');
        $this->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $this->load->model('M_melting/M_transaksi_melting');
        $this->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->load->model('M_adm_barang_keluar/M_adm_barang_keluar');
        $this->load->model('M_users/M_users');
    }
    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }
    public function index()
    {
        $data['result'] = $this->M_permintaan_barang_gudang->get()->result_array();

        $this->template->load('template', 'content/gudang_bahanbaku/permintaan_barang_gudang/permintaan_barang_gudang_data', $data);
    }

    public function disetujui()
    {
        $no_urut = $this->input->post('no_urut', TRUE);
        $tgl_rilis        = $this->convertDate($this->input->post('tgl_setuju', TRUE));


        $proses = $this->M_adm_barang_keluar->proses_persetujuan($no_urut, $tgl_rilis);

        if ($proses) {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=success&msg=Selamat anda berhasil Menyetujui Permintaan Barang Gudang');
        } else {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=error&msg=Maaf anda gagal Menyetujui Permintaan Barang Gudang');
        }
    }


    public function disetujui2()
    {
        $no_transfer_slip = $this->input->post('no_transfer_slip', TRUE);
        $tgl_rilis = $this->convertDate($this->input->post('tgl_rilis', TRUE));
        // $data['id_barang_masuk'] = $this->input->post('id_barang_masuk', TRUE);
        // $data['qty'] = $this->input->post('qty', TRUE);
        // var_dump($data);
        // die;
        $data = $this->M_permintaan_barang_gudang->data_permintaan_barang($no_transfer_slip)->result_array();
        foreach ($data as $k => $value) {
            $per_barang = array('id_barang_masuk' => $value['id_barang_masuk'], 'qty' => $value['qty']);
            $this->M_barang_masuk->update_stok($per_barang);
            $id_mm = $this->M_permintaan_barang_gudang->add_approv($data[$k], $tgl_rilis);
            $id_barang_keluar = $this->M_permintaan_barang_gudang->add_approv2($data[$k], $tgl_rilis);
            $this->M_transaksi_melting->trans_masuk(array('id_mm' => $id_mm, 'qty' => $value['qty']));
        }
        $this->M_permintaan_barang_gudang->disetujui($no_transfer_slip, $tgl_rilis);
        $respon = $this->M_permintaan_barang_gudang->update_status_ts($no_transfer_slip, "DiSetujui");


        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=success&msg=Selamat anda berhasil Menyetujui Permintaan Barang Gudang');
        } else {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=error&msg=Maaf anda gagal Menyetujui Permintaan Barang Gudang');
        }
    }

    public function ditolak()
    {
        $data['no_urut'] = $this->input->post('no_urut', TRUE);
        $data['tgl_tdksetuju'] = $this->convertDate($this->input->post('tgl_tdksetuju', TRUE));
        $respon = $this->M_permintaan_barang_gudang->ditolak($data);

        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=success&msg=Selamat anda berhasil Menolak Permintaan Barang Gudang');
        } else {
            header('location:' . base_url('gudang_bahanbaku/Permintaan_barang_gudang') . '?alert=error&msg=Maaf anda gagal Menolak Permintaan Barang Gudang');
        }
    }

    public function delete($no_transfer_slip)
    {
        $data['no_transfer_slip'] = str_replace('--', '/', $no_transfer_slip);
        $respon = $this->M_permintaan_barang_gudang->delete($data);

        if ($respon) {
            header('location:' . base_url('gudang_bahanbaku/permintaan_barang_gudang') . '?alert=success&msg=Selamat anda berhasil menghapus Permintaan Barang Masuk Gudang');
        } else {
            header('location:' . base_url('gudang_bahanbaku/permintaan_barang_gudang') . '?alert=error&msg=Maaf anda gagal menghapus Permintaan Barang Masuk Gudang');
        }
    }
    public function pdf_trasnfer_slip($no_sj = null)
    {
        $no_transfer_slip = str_replace("--", "/", $no_sj);
        $mpdf = new \Mpdf\Mpdf();

        $data['row'] = $this->M_permintaan_barang_gudang->ambil_transfer_slip($no_transfer_slip)->row_array();
        $data['detail'] = $this->M_permintaan_barang_gudang->data_permintaan_barang_keluar($no_transfer_slip)->result_array();

        $d = $this->load->view('laporan/permintaan_barang_gudang/page_surat_jalan', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }
}
