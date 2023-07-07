<?php
class BeasiswaModel extends CI_Model
{
    private $tabel = "beasiswa";
    public function get_beasiswa()
    {
        $q = "select beasiswa.*, jenis_beasiswa.nama_jenis, jenis_beasiswa.keterangan from beasiswa inner join jenis_beasiswa on beasiswa.jenis_id = jenis_beasiswa.id";
        return $this->db->query($q)->result();
    }

    public function insert_beasiswa()
    {
        $data = [
            'nama_beasiswa' => $this->input->post('nama_beasiswa'),
            'tanggal_mulai' => $this->input->post('tanggal_mulai'),
            'tanggal_selesai' => $this->input->post('tangga;_selesai'),
            'jenis_id' => $this->input->post('jenis_id')
        ];

        $this->db->insert($this->tabel, $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', "Data Beasiswa berhasil ditambahkan");
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', "Data Beasiswa gagal ditambahkan");
            $this->session->set_flashdata('status', false);
        }
    }

    public function get_beasiswa_byid($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row();
    }

    public function update_beasiswa()
    {
        $data = [
            'nama_beasiswa' => $this->input->post('nama_beasiswa'),
            'tanggal_mulai' => $this->input->post('tangga_mulai'),
            'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            'jenis_id' => $this->input->post('jenis_id')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
    }
    function delete_beasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
    }
}
