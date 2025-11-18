<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class Purchasing_rb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_purchasing/M_purchasing_ppb/M_purchasing_ppb');
        $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
        $this->load->model('M_purchasing/M_prc_dpb/M_prc_dpb');
        $this->load->model('M_purchasing/M_prc_rh/M_prc_rh');
        $this->load->model('M_purchasing/M_prc_rb/M_prc_rb');
        $this->load->library('form_validation');
    }

    public function convertDate($date)
{
    if (!$date || $date == "" || $date == "0000-00-00") {
        return null;
    }

    // Format dari datepicker biasanya dd/mm/yyyy
    $exp = explode("/", $date);

    if (count($exp) == 3) {
        return $exp[2] . "-" . $exp[1] . "-" . $exp[0];
    }

    // Kalau format sudah yyyy-mm-dd langsung return
    return $date;
}

    
    

    public function index($id=null)
    {
        $data['result'] = $this->M_prc_rb->get()->result_array();
        $data['generate_no_rb'] = $this->M_prc_rb->generate_no_rb();
        $data['res_barang_rh'] = $this->M_prc_rh->res_barang()->result_array();
        $this->template->load('template', 'content/purchasing/purchasing_rb/purchasing_rb_data', $data);
    }
    public function get_barang()
    {
        $no_ppb = $this->input->post('no_ppb', TRUE);

        $result = $this->M_prc_rh->data_ppb_barang($no_ppb);

        echo json_encode($result);
    }

    public function add()
    {
            $data['tgl_rb']     = $this->convertDate($this->input->post('tgl_rb', TRUE));
            $data['id_prc_rh']  = $this->input->post('id_prc_rh', TRUE);
            $data['no_rb']      = $this->input->post('no_rb', TRUE);
            $respon = $this->M_prc_rb->add_2();
            if ($respon) {
                if (is_array($data['id_prc_rh'])) {

                    for ($i = 0; $i < count($data['id_prc_rh']); $i++) {

                        // BERSIHKAN FORMAT RUPIAH
                        $data_rh = [
                            'id_prc_rh'  => $data['id_prc_rh'][$i],
                            'no_rb'   => $data['no_rb'],
                            'created_at'  => date('Y-m-d H:i:s'),
                            'created_by'  => $this->session->userdata('id_user'),
                            'is_deleted'  => 0
                        ];

                        $this->M_prc_rb->add($data_rh);
                    }
                }
                header('location:' . base_url('purchasing/purchasing_rb/purchasing_rb') . '?alert=success&msg=Selamat anda berhasil menambah rencana belanja');
        } else {
            header('location:' . base_url('purchasing/purchasing_rh') . '?alert=success&msg=Maaf anda gagal menambah rencana belanja');
        }

    }

    public function get_barang_rh()
    {
        $id = $this->input->post('id_prc_rh');
        $data = $this->M_prc_rh->get_detail_barang($id)->row_array();
        echo json_encode($data);
    }
    public function get_barang_rb()
    {
        $no_rb = $this->input->post('no_rb');
        $respon = $this->M_prc_rh->get_detail_barang_rb($no_rb)->result_array();
        echo json_encode($respon);
    }

    public function delete($no_rb)
    {
        $no_rb = str_replace('--', '/', $no_rb);

        $this->db->where('no_rb', $no_rb);
        $this->db->delete('tb_prc_rb_tf');

        $this->db->where('no_rb', $no_rb);
        $this->db->delete('tb_prc_rb');

        header('location:' . base_url('purchasing/purchasing_rb/purchasing_rb') . '?alert=success&msg=Selamat anda berhasil menghapus data Rencana Belanja');
    }

    public function update()
{
    $data['tgl_rb'] = $this->convertDate($this->input->post('tgl_rb'));
    $data['no_rb']  = $this->input->post('no_rb');
    $data['id_prc_rh'] = $this->input->post('id_prc_rh');

    // Update header RB
    $this->M_prc_rb->update($data);

    // Hapus semua barang RB lama
    $this->M_prc_rb->delete_barang($data['no_rb']);

    // Insert ulang semua barang
    if (!empty($data['id_prc_rh'])) {

        foreach ($data['id_prc_rh'] as $id_rh) {

            $insert = [
                'id_prc_rh'  => $id_rh,
                'no_rb'      => $data['no_rb'],
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => $this->session->userdata('id_user'),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata('id_user'),
                'is_deleted' => 0
            ];

            $this->M_prc_rb->update_barang($insert);
        }
                header('location:' . base_url('purchasing/purchasing_rb/purchasing_rb') . '?alert=success&msg=Selamat anda berhasil mengupdate rencana belanja');
        } else {
            header('location:' . base_url('purchasing/purchasing_rh') . '?alert=success&msg=Maaf anda gagal mengupdate rencana belanja');
        }
    }

    public function print_rb($no_rb)
    {
          // 1️⃣ Load library Dompdf
    
    // 2️⃣ Konfigurasi dasar Dompdf
    $options = new Dompdf\Options();
    $options->set('isHtml5ParserEnabled', true);
    // $options->set('isRemoteEnabled', true); // biar bisa load gambar/logo
    $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 90);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');
    $dompdf = new Dompdf\Dompdf($options);

    // 3️⃣ Ambil data dari model
     

    $data['rb'] = $this->M_prc_rb->get_rb($no_rb);
    $data['barang'] = $this->M_prc_rb->data_print_rb($no_rb)->result_array();

    // 4️⃣ Render tampilan HTML ke string
    $html = $this->load->view('content/purchasing/purchasing_rb/pdf/page_rb', $data, TRUE);

    // 5️⃣ Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // 6️⃣ Set ukuran dan orientasi halaman (P = Portrait)
    $dompdf->setPaper('A4', 'landscape');

    // 7️⃣ Render ke PDF
    $dompdf->render();

    // 8️⃣ Tambah nomor halaman (footer seperti mPDF)
    // $canvas = $dompdf->getCanvas();
    // $font = $dompdf->getFontMetrics()->get_font("Helvetica", "normal");
    // $canvas->page_text(520, 820, "Halaman {PAGE_NUM}", $font, 9, array(0, 0, 0));

    // 9️⃣ Output PDF ke browser
    $dompdf->stream("Rencana_Belanja.pdf", array("Attachment" => false));
    }

 
}

?>