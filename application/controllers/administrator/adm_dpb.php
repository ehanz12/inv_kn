<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adm_dpb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dpb/M_adm_dpb');
        $this->load->model('M_purchasing/M_prc_dpb/M_prc_dpb');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $data['result'] = $this->M_adm_dpb->get()->result_array();

        $data['res_rb'] = $this->M_adm_dpb->get_rb()->result_array();
        $data['res_kode'] = $this->M_prc_dpb->get()->result_array();
        $data['generate_no_dpb'] = $this->M_adm_dpb->generate_no_dpb();
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;

        $this->template->load('template', 'content/administrator/dpb/adm_dpb_data', $data);
    }

    public function get_dpb_detail()
    {
        $no_dpb = $this->input->post('no_dpb', TRUE);
        
        if (empty($no_dpb)) {
            echo json_encode([
                'success' => false,
                'message' => 'No DPB tidak boleh kosong'
            ]);
            return;
        }
        
        // Gunakan method yang diperbaiki
        $result = $this->M_adm_dpb->get_dpb_detail_with_relations($no_dpb);
        
        
        // Debug log
        error_log("DPB Detail Query for: " . $no_dpb);
        error_log("Result count: " . count($result));
        
        // Format response untuk AJAX
        if (!empty($result)) {
            echo json_encode([
                'success' => true,
                'data' => $result,
                'count' => count($result)
            ]);
        } else {
            // Cek apakah DPB exists tapi tidak ada detail barang
            $dpb_exists = $this->M_adm_dpb->check_dpb_exists($no_dpb);
            if ($dpb_exists) {
                echo json_encode([
                    'success' => true,
                    'data' => [],
                    'message' => 'DPB ditemukan tetapi tidak ada detail barang'
                ]);
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Data DPB tidak ditemukan'
                ]);
            }
        }
    }

    public function get_by_no_rb()
    {
        $no_rb = $this->input->post('no_rb', TRUE);
        $result = $this->M_adm_dpb->data_no_budget($no_rb);
        echo json_encode($result);
    }

    public function add()
    {
        $data['no_dpb'] = $this->input->post('no_dpb', TRUE);
        $data['tgl_dpb'] = $this->input->post('tgl_dpb', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['jml_diterima'] = $this->input->post('no_batch', TRUE);
        $data['id_user'] = $this->session->userdata('id_user', );
        
        // Ambil data dari DPB yang dipilih
        $dpb_detail = $this->M_adm_dpb->get_dpb_detail_with_relations($data['no_dpb']);
        
        if (!empty($dpb_detail)) {
            $data['tgl_dpb'] = $dpb_detail[0]['tgl_dpb'];
            $data['jenis_bayar'] = $dpb_detail[0]['jenis_bayar'];
            $data['no_sjl'] = $dpb_detail[0]['no_sjl'];
            
            // Simpan data
            $result = $this->M_adm_dpb->add($data);
            
            if ($result) {
                header('location:' . base_url('administrator/adm_dpb') . '?alert=success&msg=Selamat anda berhasil menambahkan Data DPB');
            } else {
                header('location:' . base_url('administrator/adm_dpb') . '?alert=error&msg=Maaf anda gagal menambahkan Data DPB');
            }
        } else {
            header('location:' . base_url('administrator/adm_dpb') . '?alert=error&msg=Data DPB tidak ditemukan');
        }
    }

    public function delete($id_adm_dpb)
    {
        $respon = $this->M_adm_dpb->delete($id_adm_dpb);
        if($respon) {
             header('location:' . base_url('administrator/adm_dpb') . '?alert=success&msg=Selamat anda berhasil menghapus Data DPB');
        }else {
            header('location:' . base_url('administrator/adm_dpb') . '?alert=error&msg=Maaf anda gagal menghapus Data DPB');
        }
    }
}
?>