<?php
use Dompdf\Options;
use Dompdf\Dompdf;

defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; 

class adm_barang_masuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_adm_barang_masuk/M_adm_barang_masuk');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function index()
    {
        $no_dpb = $this->input->get('no_dbb');
        
        $tgl_mulai = $this->input->get('tgl_mulai');
        $tgl_selesai = $this->input->get('tgl_selesai');

        // Simpan filter di session untuk cetak
        $this->session->set_userdata('filter_laporan', [
            'no_dpb' => $no_dpb,
            
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai
        ]);

        // Ambil data dari tabel tb_prc_dpb_tf
        $result = $this->M_adm_barang_masuk->get($no_dpb, $tgl_mulai, $tgl_selesai);
        
        // Pastikan $result adalah array
        if (is_object($result)) {
            $data['result'] = $result->result_array();
        } else {
            $data['result'] = $result;
        }

        $data['no_dpb'] = $no_dpb;
       
        $data['tgl_mulai'] = $tgl_mulai;
        $data['tgl_selesai'] = $tgl_selesai;

        $this->template->load('template', 'content/administrator/adm_barang_masuk_data', $data);
    }

    public function get_rincian_dpb()
    {
        $no_dpb = $this->input->post('no_dpb');
       
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_selesai = $this->input->post('tgl_selesai');

        // Ambil data dari model
        $result = $this->M_adm_barang_masuk->get_rincian_dpb_by_no($no_dpb,  $tgl_mulai, $tgl_selesai);

        if ($result && $result->num_rows() > 0) {
            $data = $result->result_array();
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    // Tambahkan di controller adm_barang_masuk
public function get_no_dpb_list()
{
    $this->db->select('DISTINCT(no_dpb), tgl_dpb', false);
    $this->db->from('tb_prc_dpb_tf');
    $this->db->where('is_deleted', 0);
    $this->db->order_by('no_dpb', 'ASC');
    $query = $this->db->get();
    
    $result = [];
    if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) {
            $result[] = [
                'no_dpb' => $row['no_dpb'],
                'tgl_dpb' => $row['tgl_dpb']
            ];
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($result);
}

    public function delete($id_prc_dpb_tf)
    {
        $data['id_prc_dpb_tf'] = str_replace('--', '/', $id_prc_dpb_tf);
        $respon = $this->M_adm_barang_masuk->delete($data);

        if ($respon) {
            header('location:' . base_url('administrator/adm_barang_masuk') . '?alert=success&msg=Selamat anda berhasil menghapus data DPB');
        } else {
            header('location:' . base_url('administrator/adm_barang_masuk') . '?alert=success&msg=Maaf anda gagal menghapus data DPB');
        }
    }

    public function pdf_laporan_surat()
    {   
        if (ob_get_length()) ob_end_clean();

        try {
            // Ambil filter dari session
            $filter = $this->session->userdata('filter_laporan') ?? [];
            
            $options = new \Dompdf\Options();
            $options->set('isRemoteEnabled', false);
            $options->set('isFontSubsettingEnabled', false);
            $options->set('defaultFont', 'Helvetica');
            $options->set('enable_font_subsetting', true);
            $options->set('dpi', 180);
            $options->set('chroot', FCPATH);
            $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
            $options->set('tempDir', FCPATH . 'application/cache/dompdf/');

            $dompdf = new \Dompdf\Dompdf($options);

            // Ambil data dengan filter
            $data['filter'] = $filter;
            $data['detail'] = $this->M_adm_barang_masuk->data_dpb_detail($filter)->result_array();
            
            // Ambil data summary untuk header
            $summary = $this->M_adm_barang_masuk->get_dpb_grouped(
                $filter['no_dpb'] ?? null, 

                $filter['tgl_mulai'] ?? null, 
                $filter['tgl_selesai'] ?? null
            );
            
            if (is_object($summary)) {
                $data['summary'] = $summary->result_array();
            } else {
                $data['summary'] = $summary;
            }

            $html = $this->load->view('laporan/dpb/page_laporan_dpb', $data, TRUE);
            $dompdf->loadHtml($html, 'UTF-8');
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            
            $filename = "Laporan_DPB_" . date('Y-m-d_H-i-s') . ".pdf";
            $dompdf->stream($filename, ["Attachment" => false]);
        } 
        catch (Exception $e) {
            log_message('error', 'PDF Laporan DPB gagal dibuat: ' . $e->getMessage());
            echo 'Terjadi kesalahan saat membuat PDF. Coba lagi nanti.';
        }
    }

    // Export PDF dengan parameter filter
    public function export_pdf()
    {
        $no_dpb = $this->input->get('no_dpb');
      
        $tgl_mulai = $this->input->get('tgl_mulai');
        $tgl_selesai = $this->input->get('tgl_selesai');

        // Set filter untuk PDF
        $this->session->set_userdata('filter_laporan', [
            'no_dpb' => $no_dpb,
            
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai
        ]);

        redirect('administrator/adm_barang_masuk/pdf_laporan_surat');
    }
}