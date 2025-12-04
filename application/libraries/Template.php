<?php


#[\AllowDynamicProperties]
class Template
{

    var $template_data = array();

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = FALSE)
    {

        $this->CI = &get_instance();
        $this->CI->load->model('M_lab/M_pemeriksaan_bahan');
        $this->CI->load->model('M_gudang_bahanbaku/M_barang_masuk');
        $this->CI->load->model('M_purchasing/M_purchasing_ppb/M_purchasing_ppb');
        $this->CI->load->model('M_gudang_bahanbaku/M_permintaan_barang_gudang');
        $view_data['cek_karantina'] = $this->CI->M_pemeriksaan_bahan->cek_karantina()->result_array()[0]['tot_status_karantina'];
        $view_data['cek_proses'] = $this->CI->M_pemeriksaan_bahan->cek_proses()->result_array()[0]['tot_status_proses'];
        $view_data['cek_status'] = $this->CI->M_purchasing_ppb->cek_status()->result_array()[0]['tot_status'];
        $view_data['cek_spv'] = $this->CI->M_purchasing_ppb->cek_spv()->result_array()[0]['tot_spv'];
        $view_data['cek_manager'] = $this->CI->M_purchasing_ppb->cek_manager()->result_array()[0]['tot_manager'];
        $view_data['cek_pm'] = $this->CI->M_purchasing_ppb->cek_pm()->result_array()[0]['tot_pm'];
        $view_data['cek_direk'] = $this->CI->M_purchasing_ppb->cek_direk()->result_array()[0]['tot_direk'];
        $view_data['cek_permintaan'] = $this->CI->M_permintaan_barang_gudang->cek_permintaan()->result_array()[0]['tot_status_proses'];
        $view_data['jml_notif'] = (int)$view_data['cek_karantina'] + (int)$view_data['cek_proses'];
        $view_data['jml_admin'] = (int)$view_data['cek_spv'] + (int)$view_data['cek_manager'] + + (int)$view_data['cek_pm'] + (int)$view_data['cek_direk'];
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }
}
