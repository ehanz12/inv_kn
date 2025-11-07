<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prc_po_supplier extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_purchasing/M_prc_ppb/M_po_supplier/M_prc_master_supplier');

    }

	public function index()
	{
		// $data['row'] = $this->supplier_m->get();
		$result = 
		$data['result'] = $this->M_prc_master_supplier->get()->result_array();

		$this->template->load('template', 'content/purchasing/prc_ppb/po_supplier/prc_po_supplier',$data);

	}

	public function add()
	{
        $data['id_prc_master_supplier'] = $this->input->post('id_prc_po_supplier',TRUE);
        $data['golongan'] = $this->input->post('golongan',TRUE);
		$data['kode_supplier'] = $this->input->post('kode_prc_po_supplier',TRUE);
		$data['nama_supplier'] = $this->input->post('nama_po_supplier',TRUE);
		$data['kontak_supplier'] = $this->input->post('kontak_po_supplier',TRUE);
		$data['negara_supplier'] = $this->input->post('negara_po_supplier',TRUE);
       
        $respon = $this->M_prc_master_supplier->add($data);

        if($respon){
        	header('location:'.base_url('Purchasing/prc_ppb/Po_supplier/Prc_po_supplier').'?alert=success&msg=Selamat anda berhasil menambah supplier');
        }else{
        	header('location:'.base_url('Purchasing/prc_ppb/Po_supplier/Prc_po_supplier').'?alert=success&msg=Maaf anda gagal menambah supplier');
        }
	}
	public function update()
	{
		$data['id_prc_master_supplier'] = $this->input->post('id_prc_master_supplier',TRUE);
		$data['golongan'] = $this->input->post('golongan',TRUE);
		$data['kode_supplier'] = $this->input->post('kode_supplier',TRUE);
        $data['nama_supplier'] = $this->input->post('nama_supplier',TRUE);
		$data['kontak_supplier'] = $this->input->post('kontak_supplier',TRUE);
		$data['negara_supplier'] = $this->input->post('negara_supplier',TRUE);
		
        $respon = $this->M_prc_master_supplier->update($data);
        // echo $respon;
        if($respon){
        	header('location:'.base_url('Purchasing/prc_ppb/Po_supplier/Prc_po_supplier').'?alert=success&msg=Selamat anda berhasil meng-update supplier');
        }else{
        	header('location:'.base_url('Purchasing/prc_ppb/Po_supplier/Prc_po_supplier').'?alert=success&msg=Maaf anda gagal meng-update supplier');
        }
	}
	public function delete($id_prc_master_supplier)
	{
		$data['id_prc_master_supplier'] = $id_prc_master_supplier;
        $respon = $this->M_prc_master_supplier->delete($data);

        if($respon){
        	header('location:'.base_url('Purchasing/prc_ppb/Po_supplier/Prc_po_supplier').'?alert=success&msg=Selamat anda berhasil menghapus supplier');
        }else{
        	header('location:'.base_url('Purchasing/prc_ppb/Po_supplier/Prc_po_supplier').'?alert=success&msg=Maaf anda gagal menghapus supplier');
        }
	} 

	public function cek_kode_supplier()
    {
        $kode_prc_po_supplier = $this->input->post('kode_prc_po_supplier', TRUE);
        $row = $this->M_prc_master_supplier->cek_kode_supplier($kode_prc_po_supplier)->row_array();

        if ($row['count_sj']==0) {
            echo "false";
        } else {
            echo "true";
        }
    }
}
