<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersyaratanModel extends    CI_Model
{
    private $tabel = "persyaratan";
    function get_persyaratan()
    {
        return $this->db->get($this->tabel)->result();
    }
    function insert_persyaratan()
    {
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert($this->tabel, $data);
    }

    function get_persyaratan_byid($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row();
    }
    function update_persyaratan()
    {
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
    }

    function delete_persyaratan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
    }
}
