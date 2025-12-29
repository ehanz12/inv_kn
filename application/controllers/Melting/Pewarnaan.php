<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pewarnaan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_melting/M_pewarnaan');
		$this->load->model('M_users/M_users');
		$this->load->model('M_melting/M_masak_gelatin');
		$this->load->model('M_Marketing/M_tambah_schedule');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_pewarnaan->get()->result_array();
		$data['res_cr'] = $this->M_tambah_schedule->get_cr()->result_array();
		$data['res_batch'] = $this->M_masak_gelatin->get_batch()->result_array();
		$data['res_frm'] = $this->M_users->get_frm()->result_array();
		$data['generate_no_urut'] = $this->M_pewarnaan->generate_no_urut();
		$this->template->load('template', 'content/melting/proses/pewarnaan/pewarnaan_data', $data);
		// print_r($data);

	}

	public function get_by_batch()
    {
		$batch_masak = $this->input->post('batch_masak');
        $result = $this->M_masak_gelatin->get_gel_by_batch_masak($batch_masak)->result_array();
        echo json_encode($result);
    }

	public function add()
	{
		$data['cek_warna'] = $this->input->post('cek_warna', TRUE);
		if ($data['cek_warna'] === "Ada") {
			$data['cek_warna'] = "Ada";
		} else {
			$data['cek_warna'] = "Tidak Ada";
		}
		$data['id_mkt_schedule'] = $this->input->post('id_mkt_schedule', TRUE);
		$data['batch_masak'] = $this->input->post('batch_gel', TRUE);
		$data['mlt_shift'] = $this->input->post('mlt-shift', TRUE);
		$data['no_urut'] = $this->input->post('no_urut', TRUE);
		$data['tgl_tf_mw'] = $this->convertDate($this->input->post('tgl_tf_mw', TRUE));
		$data['tgl_buat_lrt'] = $this->convertDate($this->input->post('tgl_buat_lrt', TRUE));
		$data['no_fid'] = $this->input->post('no_fid', TRUE);
		$data['jml_larut_awal'] = $this->input->post('jml_larut_awal', TRUE);
		$data['jml_cutting'] = $this->input->post('jml_cutting', TRUE);
		$data['jml_cake'] = $this->input->post('jml_cake', TRUE);
		$data['jam_pw'] = $this->input->post('jam_pw', TRUE);
		$data['vac1'] = $this->input->post('vac1', TRUE);
		$data['vac2'] = $this->input->post('vac2', TRUE);
		$data['visco'] = $this->input->post('visco_cps', TRUE);
		$data['tekanan'] = $this->input->post('tekanan', TRUE);
		$data['cek_warna'] = $this->input->post('cek_warna', TRUE);
		$data['id_user'] = $this->input->post('id_user', TRUE);
		$data['batch_cutting'] = $this->input->post('batch_cutting', TRUE);
		$data['batch_cake'] = $this->input->post('batch_cake', TRUE);
		$data['batch_ti02'] = $this->input->post('batch_ti02', TRUE);
		$data['batch_r1'] = $this->input->post('batch_r1', TRUE);
		$data['batch_r3'] = $this->input->post('batch_r3', TRUE);
		$data['batch_y5'] = $this->input->post('batch_y5', TRUE);
		$data['batch_b1'] = $this->input->post('batch_b1', TRUE);
		$data['batch_b1'] = $this->input->post('batch_b1', TRUE);
		$data['batch_y10'] = $this->input->post('batch_y10', TRUE);
		$data['silver'] = $this->input->post('silver', TRUE);
		$data['bpn'] = $this->input->post('bpn', TRUE);
		$data['r_40'] = $this->input->post('r_40', TRUE);
		$data['r_102'] = $this->input->post('r_102', TRUE);
		$data['ior'] = $this->input->post('ior', TRUE);
		$data['ioy'] = $this->input->post('ioy', TRUE);
		$data['p_blue'] = $this->input->post('p_blue', TRUE);
		$data['p_green'] = $this->input->post('p_green', TRUE);
		$data['gold'] = $this->input->post('gold', TRUE);
		$data['y6'] = $this->input->post('y6', TRUE);
		$data['op1'] = $this->input->post('op1', TRUE);
		$data['op2'] = $this->input->post('op2', TRUE);
		$data['spv'] = $this->input->post('spv', TRUE);

		$respon = $this->M_pewarnaan->add($data);


		if ($respon) {
			header('location:' . base_url('melting/Pewarnaan') . '?alert=success&msg=Selamat anda berhasil menambah Pewarnaan');
		} else {
			header('location:' . base_url('melting/Pewarnaan') . '?alert=error&msg=Maaf anda gagal menambah Pewarnaan');
		}
	}

	public function update()
	{
		$data['cek_warna'] = $this->input->post('cek_warna', TRUE);
		if ($data['cek_warna'] === "Ada") {
			$data['cek_warna'] = "Ada";
		} else {
			$data['cek_warna'] = "Tidak Ada";
		}
		$data['id_pewarna'] = $this->input->post('id_pewarna', TRUE);
		$data['id_mkt_schedule'] = $this->input->post('id_mkt_schedule', TRUE);
		$data['batch_masak'] = $this->input->post('batch_masak', TRUE);
		$data['mlt_shift'] = $this->input->post('mlt-shift', TRUE);
		$data['no_urut'] = $this->input->post('no_urut', TRUE);
		$data['tgl_tf_mw'] = $this->convertDate($this->input->post('tgl_tf_mw', TRUE));
		$data['tgl_buat_lrt'] = $this->convertDate($this->input->post('tgl_buat_lrt', TRUE));
		$data['no_fid'] = $this->input->post('no_fid', TRUE);
		$data['jml_larut_awal'] = $this->input->post('jml_larut_awal', TRUE);
		$data['jml_cutting'] = $this->input->post('jml_cutting', TRUE);
		$data['jml_cake'] = $this->input->post('jml_cake', TRUE);
		$data['jam_pw'] = $this->input->post('jam_pw', TRUE);
		$data['vac1'] = $this->input->post('vac1', TRUE);
		$data['vac2'] = $this->input->post('vac2', TRUE);
		$data['visco'] = $this->input->post('visco', TRUE);
		$data['tekanan'] = $this->input->post('tekanan', TRUE);
		$data['cek_warna'] = $this->input->post('cek_warna', TRUE);
		$data['id_user'] = $this->input->post('id_user', TRUE);
		$data['batch_cutting'] = $this->input->post('batch_cutting', TRUE);
		$data['batch_cake'] = $this->input->post('batch_cake', TRUE);
		$data['batch_ti02'] = $this->input->post('batch_ti02', TRUE);
		$data['batch_r1'] = $this->input->post('batch_r1', TRUE);
		$data['batch_r3'] = $this->input->post('batch_r3', TRUE);
		$data['batch_y5'] = $this->input->post('batch_y5', TRUE);
		$data['batch_b1'] = $this->input->post('batch_b1', TRUE);
		$data['batch_b1'] = $this->input->post('batch_b1', TRUE);
		$data['batch_y10'] = $this->input->post('batch_y10', TRUE);
		$data['silver'] = $this->input->post('silver', TRUE);
		$data['bpn'] = $this->input->post('bpn', TRUE);
		$data['r_40'] = $this->input->post('r_40', TRUE);
		$data['r_102'] = $this->input->post('r_102', TRUE);
		$data['ior'] = $this->input->post('ior', TRUE);
		$data['ioy'] = $this->input->post('ioy', TRUE);
		$data['p_blue'] = $this->input->post('p_blue', TRUE);
		$data['p_green'] = $this->input->post('p_green', TRUE);
		$data['gold'] = $this->input->post('gold', TRUE);
		$data['y6'] = $this->input->post('y6', TRUE);
		$data['op1'] = $this->input->post('op1', TRUE);
		$data['op2'] = $this->input->post('op2', TRUE);
		$data['spv'] = $this->input->post('spv', TRUE);

		$respon = $this->M_pewarnaan->update($data);


		if ($respon) {
			header('location:' . base_url('melting/Pewarnaan') . '?alert=success&msg=Selamat anda berhasil menambah Pewarnaan');
		} else {
			header('location:' . base_url('melting/Pewarnaan') . '?alert=error&msg=Maaf anda gagal menambah Pewarnaan');
		}
	}
	public function delete($id_pewarna)
	{
		$respon = $this->M_pewarnaan->delete($id_pewarna);

		if ($respon) {
			header('location:' . base_url('melting/Pewarnaan') . '?alert=success&msg=Selamat anda berhasil menghapus Pewarnaan');
		} else {
			header('location:' . base_url('melting/Pewarnaan') . '?alert=error&msg=Maaf anda gagal menghapus Pewarnaan');
		}
	}	
	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	// public function cek_kode_barang(){
    //     $kode_barang = $this->input->post('kode_barang',TRUE);

    //     $row = $this->M_barang->cek_kode_barang($kode_barang)->row_array();
    //     if ($row['count_sj']==0) {
    //         echo "false";
    //     }else{
    //         echo "true";
    //     }
    // }
}
