<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchasing_rh extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_purchasing/M_purchasing_ppb/M_purchasing_ppb');
        $this->load->model('M_purchasing/M_prc_ppb/M_prc_ppb_masterbarang');
        $this->load->model('M_purchasing/M_prc_dpb/M_prc_dpb');
        $this->load->model('M_purchasing/M_prc_rh/M_prc_rh');
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

    
    

    public function index()
    {
        $data['tgl'] = $this->input->get('tgl') ?? null;
        $data['tgl2'] = $this->input->get('tgl2') ?? null;
        $data['fil_barang'] = $this->M_purchasing_ppb->get_filter_brng();
        $data['res_barang'] = $this->M_purchasing_ppb->get_master_barang();
        $data['nama_admin'] = $this->session->userdata('nama_admin');
        $data['result'] = $this->M_prc_rh->get()->result_array();
        $data['res_ppb'] = $this->M_prc_rh->get_ppb()->result_array();
        $data['res_ppb_2'] = $this->M_prc_rh->get_ppb_2()->result_array();
        $data['name'] = 'Nama Barang yang Terpilih';

        $this->template->load('template', 'content/purchasing/purchasing_rh/purchasing_rh_data', $data);
    }
    public function get_barang()
    {
        $no_ppb = $this->input->post('no_ppb', TRUE);
        $id_prc_ppb = $this->input->post('id_prc_ppb', TRUE);

        $result = $this->M_prc_rh->data_ppb_barang($no_ppb, $id_prc_ppb);

        echo json_encode($result);
    }

    public function add()
    {
            $data['tgl_rh']     = $this->convertDate($this->input->post('tgl_rh', TRUE));
            $data['id_prc_ppb'] = $this->input->post('id_prc_ppb', TRUE);
            $data['harga_rh']   = $this->input->post('harga_rh', TRUE);
            $data['total_rh']   = $this->input->post('total_rh', TRUE);
            $data['jumlah_rh']  = $this->input->post('jumlah_rh', TRUE);

            if ($data['tgl_rh'] != null) {
                if (is_array($data['id_prc_ppb'])) {

                    for ($i = 0; $i < count($data['id_prc_ppb']); $i++) {

                        // BERSIHKAN FORMAT RUPIAH
                        $harga = preg_replace('/[^0-9]/', '', $data['harga_rh'][$i]);

                        $data_rh = [
                            'tgl_rh'      => $data['tgl_rh'],
                            'id_prc_ppb'  => $data['id_prc_ppb'][$i],
                            'harga_rh'    => $harga,
                            'total_rh'    => $data['total_rh'][$i],
                            'jumlah_rh'   => $data['jumlah_rh'][$i],
                        ];

                        $this->M_prc_rh->add($data_rh);
                    }
                }
                header('location:' . base_url('purchasing/purchasing_rh/purchasing_rh') . '?alert=success&msg=Selamat anda berhasil menambah rincian harga');
        } else {
            header('location:' . base_url('purchasing/purchasing_rh') . '?alert=success&msg=Maaf anda gagal menambah receiving harian');
        }

    }

    public function add_2()
    {
            $data['tgl_rh']     = $this->convertDate($this->input->post('tgl_rh', TRUE));
            $data['id_prc_ppb'] = $this->input->post('id_prc_ppb', TRUE);
            $data['harga_rh']   = $this->input->post('harga_rh', TRUE);
            $data['total_rh']   = $this->input->post('total_rh', TRUE);
            $data['jumlah_rh']  = $this->input->post('jumlah_rh', TRUE);
            $data['no_budget']  = $this->input->post('no_budget', TRUE);

            if ($data['tgl_rh'] != null) {
                if (is_array($data['id_prc_ppb'])) {

                    for ($i = 0; $i < count($data['id_prc_ppb']); $i++) {

                        // BERSIHKAN FORMAT RUPIAH
                        $harga = preg_replace('/[^0-9]/', '', $data['harga_rh'][$i]);

                        $data_rh = [
                            'tgl_rh'      => $data['tgl_rh'],
                            'id_prc_ppb'  => $data['id_prc_ppb'][$i],
                            'harga_rh'    => $harga,
                            'total_rh'    => $data['total_rh'][$i],
                            'jumlah_rh'   => $data['jumlah_rh'][$i],
                            'no_budget'   => $data['no_budget'][$i],
                        ];

                        $this->M_prc_rh->add_2($data_rh);
                    }
                }
                header('location:' . base_url('purchasing/purchasing_rh/purchasing_rh') . '?alert=success&msg=Selamat anda berhasil menambah rincian harga');
        } else {
            header('location:' . base_url('purchasing/purchasing_rh') . '?alert=success&msg=Maaf anda gagal menambah receiving harian');
        }

    }

    public function delete($id)
    {
        $this->db->where('id_prc_rh', $id);
        $respon = $this->db->delete('tb_prc_rh');
        if ($respon) {
            header('location:' . base_url('purchasing/purchasing_rh/purchasing_rh') . '?alert=success&msg=Selamat anda berhasil menghapus rincian harga');
        }else {
            header('location:' . base_url('purchasing/purchasing_rh/purchasing_rh') . '?alert=error&msg=Maaf anda gagal menghapus rincian harga');
        }
    }

    public function update()
    {
        $data['id_prc_rh'] = $this->input->post('id_prc_rh', TRUE);
        $data['id_prc_ppb'] = $this->input->post('id_prc_ppb', TRUE);
        $data['tgl_rh'] = $this->convertDate($this->input->post('tgl_rh', TRUE));
        $data['harga_rh']  = preg_replace('/[^0-9]/', '', $this->input->post('harga_rh'));
        $data['jumlah_rh'] = preg_replace('/[^0-9]/', '', $this->input->post('jumlah_rh'));
        $data['total_rh']  = preg_replace('/[^0-9]/', '', $this->input->post('total_rh'));
        $data['no_budget'] = $this->input->post('no_budget', TRUE);

        $respon = $this->M_prc_rh->update($data);

        if ($respon) {
            header('location:' . base_url('purchasing/purchasing_rh/purchasing_rh') . '?alert=success&msg=Selamat anda berhasil mengupdate rincian harga');
        }else {
            header('location:' . base_url('purchasing/purchasing_rh/purchasing_rh') . '?alert=error&msg=Maaf anda gagal mengupdate rincian harga');
        }
    }
 
}

?>