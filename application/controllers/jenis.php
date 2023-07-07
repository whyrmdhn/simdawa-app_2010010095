<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('JenisModel');
    }

    function index()
    {
        $data['title'] = "Dashboard | SIMDAWA_APP";
        $data['jenis'] = $this->JenisModel->get_jenis();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('jenis/jenis_read', $data);
        $this->load->view('home_view');
        $this->load->view('template/footer');
    }

    function tambah()
    {
        if (isset($_POST['create'])) {
            $this->JenisModel->insert_jenis();
            redirect('jenis');
        } else {
            $data['title'] = "Tambah Data Jenis Beasisawa | SIMADAWA-APP";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('jenis/jenis_create');
            $this->load->view('template/footer');
        }
    }

    function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->JenisModel->update_jenis();
            redirect('jenis');
        } else {
            $data['title'] = "Perbaharui Data Jenis Beasisawa | SIMADAWA-APP";
            $data['jenis'] = $this->JenisModel->get_jenis_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('jenis/jenis_update', $data);
            $this->load->view('template/footer');
        }
    }

    function hapus($id)
    {
        if (isset($id)) {
            $this->JenisModel->delete_jenis($id);
            redirect('jenis');
        }
    }
}
