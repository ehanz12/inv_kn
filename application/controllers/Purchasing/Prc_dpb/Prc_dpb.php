<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prc_dpb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_purchasing/M_prc_dpb/M_prc_dpb');
        $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
        $this->load->model('M_purchasing/M_purchasing_ppb/M_purchasing_ppb');
        $this->load->library('form_validation');
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
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $status = $this->input->get('status');
        $data['result'] = $this->M_prc_dpb->get($tgl, $tgl2, $status)->result_array();
        $data['res_rb'] = $this->M_prc_dpb->get_rb()->result_array();
        $data['generate_no_dpb'] = $this->M_prc_dpb->generate_no_dpb();
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['status'] = $status;

        $this->template->load('template', 'content/purchasing/prc_dpb/prc_dpb', $data);
    }

    public function get_by_no_rb()
    {
        $no_rb = $this->input->post('no_rb', TRUE);

        $result = $this->M_prc_dpb->data_no_budget($no_rb);

        echo json_encode($result);
    }

    public function add()
    {
        $data['tgl_dpb'] = $this->convertDate($this->input->post('tgl_dpb', TRUE));
        $data['jenis_bayar'] = $this->input->post('jenis_bayar', TRUE);
        $data['jml_beli'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_beli', TRUE));
        $data['jml_ongkir'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_ongkir', TRUE));
        $data['jml_materi'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_materi', TRUE));
        $data['jml_ppn'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_ppn', TRUE));
        $data['jml_disc'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_disc', TRUE));
        $data['no_dpb'] = $this->input->post('no_dpb', TRUE);
        $data['no_sjl'] = $this->input->post('no_sjl', TRUE);
        $data['no_po'] = $this->input->post('no_po', TRUE);
        $data['id_prc_rb'] = $this->input->post('id_prc_rb', TRUE);

        $this->M_prc_dpb->add($data);
        if (is_array($data['id_prc_rb'])) {
            for ($i = 0; $i < count($data['id_prc_rb']); $i++) {
                // BERSIHKAN FORMAT RUPIAH
                $data_rh = [
                    'id_prc_rb'  => $data['id_prc_rb'][$i],
                    'no_dpb'   => $data['no_dpb'],
                    'no_po'   => $data['no_po'][$i],
                    'jml_beli' => $data['jml_beli'][$i],
                    'jml_ongkir' => $data['jml_ongkir'][$i],
                    'jml_ppn' => $data['jml_ppn'][$i],
                    'jml_disc' => $data['jml_disc'][$i],
                    'jml_materi' => $data['jml_materi'][$i],
                    'jenis_bayar' => $data['jenis_bayar'][$i],
                    'created_at'  => date('Y-m-d H:i:s'),
                    'created_by'  => $this->session->userdata('id_user'),
                    'is_deleted'  => 0
                ];
                $this->M_prc_dpb->add_barang($data_rh);
            }
            header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=success&msg=Selamat anda berhasil menambahkan Data DPB');
        } else {
            header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=success&msg=Selamat anda gagal menambahkan Data DPB');
        }
    }

    public function delete($no_dpb)
    {
        $respon = $this->M_prc_dpb->delete($no_dpb);
        if ($respon) {
            header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=success&msg=Selamat anda berhasil menghapus Data DPB');
        } else {
            header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=success&msg=Selamat anda gagal menghapus Data DPB');
        }
    }

    public function get_by_no_dpb()
    {
        $no_dpb = $this->input->post('no_dpb', TRUE);
        $result = $this->M_prc_dpb->data_barang_dpb($no_dpb);

        echo json_encode($result);
    }

    public function update()
    {
        $data['tgl_dpb'] = $this->convertDate($this->input->post('tgl_dpb', TRUE));
        $data['jenis_bayar'] = $this->input->post('jenis_bayar', TRUE);
        $data['jml_beli'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_beli', TRUE));
        $data['jml_ongkir'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_ongkir', TRUE));
        $data['jml_materi'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_materi', TRUE));
        $data['jml_ppn'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_ppn', TRUE));
        $data['jml_disc'] = preg_replace('/[^0-9]/', '', $this->input->post('jml_disc', TRUE));
        $data['no_dpb'] = $this->input->post('no_dpb', TRUE);
        $data['no_sjl'] = $this->input->post('no_sjl', TRUE);
        $data['no_po'] = $this->input->post('no_po', TRUE);
        $data['id_prc_rb'] = $this->input->post('id_prc_rb', TRUE);

        $this->M_prc_dpb->update($data);

        $this->M_prc_dpb->delete_barang($data);

        if (is_array($data['id_prc_rb'])) {
            for ($i = 0; $i < count($data['id_prc_rb']); $i++) {
                // BERSIHKAN FORMAT RUPIAH
                $data_rh = [
                    'id_prc_rb'  => $data['id_prc_rb'][$i],
                    'no_dpb'   => $data['no_dpb'],
                    'no_po'   => $data['no_po'][$i],
                    'jml_beli' => $data['jml_beli'][$i],
                    'jml_ongkir' => $data['jml_ongkir'][$i],
                    'jml_ppn' => $data['jml_ppn'][$i],
                    'jml_disc' => $data['jml_disc'][$i],
                    'jml_materi' => $data['jml_materi'][$i],
                    'jenis_bayar' => $data['jenis_bayar'][$i],
                    'created_at'  => date('Y-m-d H:i:s'),
                    'created_by'  => $this->session->userdata('id_user'),
                    'is_deleted'  => 0
                ];
                $this->M_prc_dpb->add_barang($data_rh);
            }
            header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=success&msg=Selamat anda berhasil mengupdate Data DPB');
        } else {
            header('location:' . base_url('purchasing/prc_dpb/prc_dpb') . '?alert=success&msg=Selamat anda gagal mengupdate Data DPB');
        }
    }
}
