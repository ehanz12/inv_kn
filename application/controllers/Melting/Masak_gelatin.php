<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masak_gelatin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('M_melting/M_masak_gelatin');
		$this->load->model('M_marketing/M_print_schedule');
		$this->load->model('M_melting/M_barang_masuk_melting');
		$this->load->model('M_melting/M_barang_keluar_melting');
		$this->load->model('M_melting/M_transaksi_melting');
		$this->load->model('M_lab/M_alat_kalibrasi');
	}

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_masak_gelatin->get()->result_array();
		$data['res_cr'] = $this->M_print_schedule->get_cr();
		$data['res_mm'] = $this->M_barang_masuk_melting->get_barang()->result_array();
		$data['res_mm_bhn'] = $this->M_barang_masuk_melting->get_bahan()->result_array();
		$data['res_alat'] = $this->M_alat_kalibrasi->get()->result_array();
		$data['generate_batch_masak'] = $this->M_masak_gelatin->generate_batch_masak();
		$this->template->load('template', 'content/melting/proses/masak_gel/masak_gel_data', $data);
		// print_r($data);

	}

	public function get_detail_gel()
	{
		$batch_masak = $this->input->post('batch_masak', TRUE);

		$result = $this->M_masak_gelatin->get_detail_gel($batch_masak)->result_array();

		echo json_encode($result);
	}

	public function get_detail_bt()
	{
		$batch_masak = $this->input->post('batch_masak', TRUE);

		$result = $this->M_masak_gelatin->get_detail_bt($batch_masak)->result_array();

		echo json_encode($result);
	}

	private function convertDate($date)
	{
		return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
	}

	public function add()
	{
		$label_bersih = $data['label_bersih'] = $this->input->post('label_bersih', TRUE);
		if ($label_bersih === "Ada") {
			$label_bersih = "Ada";
		} else {
			$label_bersih = "Tidak Ada";
		}

		$data['tgl_masak'] = $this->convertDate($this->input->post('tgl_masak', TRUE));
		$data['shift'] = $this->input->post('shift', TRUE);
		$data['batch_masak'] = $this->input->post('batch_masak', TRUE);
		$data['jml_air'] = $this->input->post('jml_air', TRUE);
		$data['temp_pel'] = $this->input->post('temp_pel', TRUE);
		$data['jam_gel'] = $this->input->post('jam_gel', TRUE);
		$data['jam_bt'] = $this->input->post('jam_bt', TRUE);
		$data['mixing1'] = $this->input->post('mixing1', TRUE);
		$data['mixing2'] = $this->input->post('mixing2', TRUE);
		$data['vac1'] = $this->input->post('vac1', TRUE);
		$data['vac2'] = $this->input->post('vac2', TRUE);
		$data['scala_vac'] = $this->input->post('scala_vac', TRUE);
		$data['visco_cps'] = $this->input->post('visco_cps', TRUE);
		$data['visco_c'] = $this->input->post('visco_c', TRUE);
		$data['suhu_ruang'] = $this->input->post('suhu_ruang', TRUE);
		$data['kel_ruang'] = $this->input->post('kel_ruang', TRUE);
		$data['keb_melter'] = $this->input->post('keb_melter', TRUE);
		$data['label_bersih'] = $this->input->post('label_bersih', TRUE);
		$data['op1'] = $this->input->post('op1', TRUE);
		$data['op2'] = $this->input->post('op2', TRUE);
		$data['supervisor'] = $this->input->post('supervisor', TRUE);
		$bahans = $this->input->post('bahan', TRUE);


		foreach ($bahans as $bahan) {
			$this->M_barang_keluar_melting->trans_keluar(array(
				'id_mm' => $bahan['id_mm'],
				'qty' => $bahan['jml_bahan'],
				'batch_keluar' => $data['batch_masak'],
			));

			$d['batch_masak'] = $data['batch_masak'];
			$d['id_mm'] = $bahan['id_mm'];
			$d['jml_bahan'] = $bahan['jml_bahan'];
			$d['id_prc_master_barang'] = $bahan['id_prc_master_barang'];

			$this->M_masak_gelatin->add($d);
		}
		$respon = $this->M_masak_gelatin->add_tf($data);
		if ($respon) {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=success&msg=Selamat anda berhasil menambah Bahan Masak Gelatin');
		} else {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=error&msg=Maaf anda gagal menambah Bahan Masak Gelatin');
		}
	}

	public function update()
	{
		$data['id_masak_gel'] = $this->input->post('id_masak_gel', TRUE);
		$data['tgl_masak'] = $this->convertDate($this->input->post('tgl_masak', TRUE));
		$data['shift'] = $this->input->post('shift', TRUE);
		$data['batch_masak'] = $this->input->post('batch_masak', TRUE);
		$data['jml_air'] = $this->input->post('jml_air', TRUE);
		$data['temp_pel'] = $this->input->post('temp_pel', TRUE);
		$data['jam_gel'] = $this->input->post('jam_gel', TRUE);
		$data['jam_bt'] = $this->input->post('jam_bt', TRUE);
		$data['mixing1'] = $this->input->post('mixing1', TRUE);
		$data['mixing2'] = $this->input->post('mixing2', TRUE);
		$data['vac1'] = $this->input->post('vac1', TRUE);
		$data['vac2'] = $this->input->post('vac2', TRUE);
		$data['scala_vac'] = $this->input->post('scala_vac', TRUE);
		$data['visco_cps'] = $this->input->post('visco_cps', TRUE);
		$data['visco_c'] = $this->input->post('visco_c', TRUE);
		$data['suhu_ruang'] = $this->input->post('suhu_ruang', TRUE);
		$data['kel_ruang'] = $this->input->post('kel_ruang', TRUE);
		$data['keb_melter'] = $this->input->post('keb_melter', TRUE);
		$data['label_bersih'] = $this->input->post('label_bersih', TRUE) ? 'Ada' : 'Tidak Ada';
		$data['op1'] = $this->input->post('op1', TRUE);
		$data['op2'] = $this->input->post('op2', TRUE);
		$data['supervisor'] = $this->input->post('supervisor', TRUE);
		$bahan_gel = $this->input->post('bahan_gel', TRUE);
		$bahan_bt  = $this->input->post('bahan_bt', TRUE);

		$this->M_barang_keluar_melting->delete_by_batch_masak($data['batch_masak']);
		$this->M_masak_gelatin->delete($data['batch_masak']);

		// ===== GELATIN =====
		if (is_array($bahan_gel) && isset($bahan_gel['id_mm'])) {
			for ($i = 0; $i < count($bahan_gel['id_mm']); $i++) {

				$this->M_barang_keluar_melting->trans_keluar([
					'id_mm' => $bahan_gel['id_mm'][$i],
					'qty' => $bahan_gel['jml_bahan'][$i],
					'batch_keluar' => $data['batch_masak'],
				]);

				$this->M_masak_gelatin->add([
					'batch_masak' => $data['batch_masak'],
					'id_mm' => $bahan_gel['id_mm'][$i],
					'jml_bahan' => $bahan_gel['jml_bahan'][$i],
				]);
			}
		}

		// ===== BAHAN TAMBAHAN =====
		if (is_array($bahan_bt) && isset($bahan_bt['id_mm'])) {
			for ($i = 0; $i < count($bahan_bt['id_mm']); $i++) {

				$this->M_barang_keluar_melting->trans_keluar([
					'id_mm' => $bahan_bt['id_mm'][$i],
					'qty' => $bahan_bt['jml_bahan'][$i],
					'batch_keluar' => $data['batch_masak'],
				]);
				$this->M_masak_gelatin->add([
					'batch_masak' => $data['batch_masak'],
					'id_mm' => $bahan_bt['id_mm'][$i],
					'jml_bahan' => $bahan_bt['jml_bahan'][$i],
				]);
			}
		}


		$respon = $this->M_masak_gelatin->update($data);
		if ($respon) {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=success&msg=Selamat anda berhasil meng-update Bahan Masak Gelatin');
		} else {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=error&msg=Maaf anda gagal meng-update Bahan Masak Gelatin');
		}
	}

	public function delete($batch_masak)
	{
		$batch_masak = str_replace('-', '/', $batch_masak);
		$this->M_masak_gelatin->delete_tf($batch_masak);

		$this->M_barang_keluar_melting->delete_by_batch_masak($batch_masak);
		$respon = $this->M_masak_gelatin->delete($batch_masak);

		if ($respon) {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=success&msg=Selamat anda berhasil menghapus Bahan Masak Gelatin');
		} else {
			header('location:' . base_url('melting/Masak_gelatin') . '?alert=error&msg=Maaf anda gagal menghapus Bahan Masak Gelatin');
		}
	}
}
