<?php
defined('BASEPATH') or exit('No direct script access allowed');

class adm_dpb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_dpb/M_adm_dpb');
        $this->load->model('M_purchasing/M_prc_dpb/M_prc_dpb');
        $this->load->model('M_adm_barang_masuk/M_adm_barang_masuk');
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

    // Tambahkan method ini di Controller adm_dpb
public function get_latest_dpb()
{
    // Ambil data DPB terbaru
    $result = $this->M_adm_dpb->get()->result_array();
    
    if (!empty($result)) {
        echo json_encode([
            'success' => true,
            'data' => $result,
            'count' => count($result)
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Tidak ada data DPB yang tersedia'
        ]);
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
    $no_dpb        = $this->input->post('no_dpb', TRUE);
    $tgl_dpb       = $this->input->post('tgl_dpb', TRUE);
    $no_batch      = $this->input->post('no_batch', TRUE);
    $inputTambahan = $this->input->post('input_tambahan', TRUE);
    $id_user       = $this->session->userdata('id_user');

    // AMBIL ID BARANG DARI DPB
    $dpb = $this->M_adm_dpb->get($no_dpb)->row_array();
    $id_prc_master_barang = $dpb['id_prc_master_barang'];  
    $id_prc_dpb = $dpb['id_prc_dpb'];   // <-- INI WAJIB ADA

    foreach ($inputTambahan as $value) {

        // INSERT ke tb_adm_dpb
        $data_adm = [
            'no_dpb'        => $no_dpb,
            'tgl_dpb'       => $tgl_dpb,
            'no_batch'      => $no_batch,
            'jml_diterima'  => $value,
            'id_user'       => $id_user,
            'created_by'    => $id_user
        ];
        $res1 = $this->M_adm_dpb->add($data_adm);

        // INSERT ke tb_adm_barang_masuk
        $data_bm = [
            'id_prc_master_barang' => $id_prc_master_barang, 
            'id_prc_dpb' => $id_prc_dpb,  // sudah aman
            'id_user'    => $id_user,
            'jml_bm'     => $value,
            'created_at' => date('Y-m-d'),
            'created_by' => $id_user,
            'is_deleted' => 0
        ];
        $res2 = $this->M_adm_barang_masuk->add($data_bm);
    }

    header('location:' . base_url('administrator/adm_dpb') . '?alert=success&msg=Berhasil menambahkan Data DPB');
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