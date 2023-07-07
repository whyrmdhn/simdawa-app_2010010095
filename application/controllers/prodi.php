<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProdiModel');
    }

    function index()
    {
        $data['title'] = "Dashboard | SIMDAWA_APP";
        $data['prodi'] = $this->ProdiModel->get_prodi();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('prodi/prodi_read', $data);
        $this->load->view('home_view');
        $this->load->view('template/footer');
    }

    function tambah()
    {
        if (isset($_POST['create'])) {
            $this->ProdiModel->insert_prodi();
            redirect('prodi');
        } else {
            $data['title'] = "Tambah Data Prodi Beasisawa | SIMADAWA-APP";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('prodi/prodi_create');
            $this->load->view('template/footer');
        }
    }

    function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->ProdiModel->update_prodi();
            redirect('prodi');
        } else {
            $data['title'] = "Perbaharui Data Prodi Beasisawa | SIMADAWA-APP";
            $data['prodi'] = $this->ProdiModel->get_prodi_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('prodi/prodi_update', $data);
            $this->load->view('template/footer');
        }
    }

    function hapus($id)
    {
        if (isset($id)) {
            $this->ProdiModel->delete_prodi($id);
            redirect('prodi');
        }
    }
}
