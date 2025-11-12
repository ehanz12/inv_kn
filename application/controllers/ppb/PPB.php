<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class PPB extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_ppb/M_ppb_tf');
        $this->load->model('M_ppb/M_ppb');
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

    public function add()
    {
        // Ambil data dari form
        $data['id_prc_ppb_tf'] = $this->input->post('id_prc_ppb_tf', TRUE);
        $data['id_prc_master_barang'] = $this->input->post('id_prc_master_barang', TRUE);
        $data['no_ppb'] = $this->input->post('no_ppb', TRUE);
        $data['departement'] = $this->input->post('departement', TRUE);
        $data['form_ppb'] = $this->input->post('form_ppb', TRUE);
        $data['jenis_ppb'] = $this->input->post('jenis_ppb', TRUE);
        // Tanggal PPB, pastikan valid
        $tgl_ppb = $this->input->post('tgl_ppb', TRUE);
        if (!empty($tgl_ppb)) {
            $data['tgl_ppb'] = $this->convertDate($tgl_ppb);
        } else {
            $data['tgl_ppb'] = null; // atau set nilai default lainnya
        }

        $data['tgl_pakai'] = $this->convertDate($this->input->post('tgl_pakai', TRUE));
        $data['ket'] = $this->input->post('ket', TRUE);
        $data['nama_admin'] = $this->input->post('nama_admin', TRUE);
        $data['id_prc_master_barang'] = $this->input->post('id_prc_master_barang', TRUE);
        $data['jumlah_ppb'] = $this->input->post('jumlah', TRUE);
        $respon = $this->M_ppb_tf->add($data);
        if ($respon) {
            // Proses data barang
            if (is_array($data['jumlah_ppb']) && count($data['jumlah_ppb']) > 0) {
                for ($i = 0; $i < count($data['jumlah_ppb']); $i++) {
                    $d['no_ppb'] = $data['no_ppb'];
                    $d['id_prc_master_barang'] = $data['id_prc_master_barang'][$i];
                    $d['jumlah_ppb'] = $data['jumlah_ppb'][$i];

                    $this->M_ppb->add_permintaan_barang($d);
                    // $this->M_accounting_ppb->update_status_ppb($data['id_accounting_ppb'], "Approved");
                }
            } else {
                log_message('error', 'Jumlah barang tidak valid atau kosong');
            }
            // Ambil URL sebelumnya
            $referrer = $this->agent->referrer();
            // Tambahkan query string alert dan msg
            $alert  = 'success';
            $msg    = urlencode('Selamat anda berhasil menambah Permintaan Barang');

            // Cek kalau referrer ada isinya
            if ($referrer) {
                redirect($referrer . '?alert=' . $alert . '&msg=' . $msg);
            } else {
                // fallback kalau referrer kosong (langsung arahkan ke halaman default)
                redirect('accounting/accounting_ppb?alert=' . $alert . '&msg=' . $msg);
            }
        } else {
            redirect('accounting/accounting_ppb?alert=error&msg=Maaf anda gagal menambah Permintaan Barang Melting');
        }
    }

    public function update()
    {
        // Ambil data umum PPB
        $no_ppb        = $this->input->post('no_ppb', TRUE);
        $departement   = $this->input->post('departement', TRUE);
        $form_ppb      = $this->input->post('form_ppb', TRUE);
        $jenis_ppb     = $this->input->post('jenis_ppb', TRUE);
        $tgl_ppb       = $this->input->post('tgl_ppb', TRUE);
        $tgl_pakai     = $this->input->post('tgl_pakai', TRUE);
        $ket           = $this->input->post('ket', TRUE);
        $nama_admin    = $this->input->post('nama_admin', TRUE);

        // Data barang (array)
        $kode_barang   = $this->input->post('kode_barang', TRUE);
        $id_prc_master_barang = $this->input->post('id_prc_master_barang', TRUE);
        $jumlah   = $this->input->post('jumlah', TRUE);

        // Update header PPB
        $data_update = [
            'departement'     => $departement,
            'jenis_form_ppb'  => $form_ppb,
            'jenis_ppb'       => $jenis_ppb,
            'tgl_ppb'         => !empty($tgl_ppb) ? $this->convertDate($tgl_ppb) : null,
            'tgl_pakai'       => !empty($tgl_pakai) ? $this->convertDate($tgl_pakai) : null,
            'ket'             => $ket,
            'id_user'      => $this->session->userdata("id_user"),
        ];

        // Update data utama (header PPB)
        $this->M_ppb_tf->update_ppb($no_ppb, $data_update);

        // Hapus semua barang lama biar gak dobel
        $this->M_ppb->delete_barang_ppb($no_ppb);

        // Insert ulang data barang baru
        if (is_array($kode_barang) && count($kode_barang) > 0) {
            for ($i = 0; $i < count($kode_barang); $i++) {
                $data_barang = [
                    'no_ppb'            => $no_ppb,
                    'id_prc_master_barang' => $id_prc_master_barang[$i],
                    'jumlah_ppb'        => $jumlah[$i],
                ];
                $this->M_ppb->add_permintaan_barang($data_barang);
            }
        }

        // Redirect dinamis (kembali ke halaman sebelumnya)
        $referrer = $this->agent->referrer();
        $alert = 'success';
        $msg   = urlencode('Berhasil memperbarui data PPB.');

        if ($referrer) {
            redirect($referrer . '?alert=' . $alert . '&msg=' . $msg);
        } else {
            redirect('accounting/accounting_ppb?alert=' . $alert . '&msg=' . $msg);
        }
    }


    public function data_ppb_barang()
    {
        $no_ppb = $this->input->post('no_ppb', TRUE);

        $result = $this->M_ppb->data_ppb_barang($no_ppb)->result_array();

        echo json_encode($result);
    }

    public function cek_no_ppb()
    {
        $no_ppb = $this->input->post('no_ppb', TRUE);
        $row = $this->M_ppb_tf->cek_no_ppb($no_ppb)->row_array();

        if ($row['count_sj'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function delete($id)
    {
        $data['no_ppb'] = $id;
        $respon = $this->M_ppb_tf->delete($data);

        if ($respon) {
            // Redirect setelah berhasil
            $referrer = $this->agent->referrer();
            // Tambahkan query string alert dan msg
            $alert  = 'success';
            $msg    = urlencode('Selamat anda berhasil menambah Permintaan Barang');

            // Cek kalau referrer ada isinya
            if ($referrer) {
                redirect($referrer . '?alert=' . $alert . '&msg=' . $msg);
            } else {
                // fallback kalau referrer kosong (langsung arahkan ke halaman default)
                redirect('accounting/accounting_ppb?alert=' . $alert . '&msg=' . $msg);
            }
        } else {
            // Redirect jika gagal
            $this->session->set_flashdata('error', 'Maaf, Anda gagal menghapus barang.');
            $this->agent->referrer();
        }
    }

    public function cetak($no_ppb) {
       // 1️⃣ Load library Dompdf
    
    // 2️⃣ Konfigurasi dasar Dompdf
    $options = new Dompdf\Options();
    $options->set('isHtml5ParserEnabled', true);
    // $options->set('isRemoteEnabled', true); // biar bisa load gambar/logo
    $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 80);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');
    $dompdf = new Dompdf\Dompdf($options);

    // 3️⃣ Ambil data dari model
     

    $data['ppb'] = $this->M_ppb->get_ppb($no_ppb);
    $data['barang'] = $this->M_ppb->data_ppb_barang($no_ppb)->result_array();

    // 4️⃣ Render tampilan HTML ke string
    $html = $this->load->view('content/gudang_bahanbaku/ppb/pdf/page_ppb', $data, TRUE);

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
    $dompdf->stream("PPB.pdf", array("Attachment" => false));
}

}
