<?php

class model_buku extends CI_Model
{
    public function proses_tambah_buku($judul_buku, $pengarang_buku, $penerbit_buku)
    {
        $data = [

            'judul_buku' => $judul_buku,
            'pengarang_buku' => $pengarang_buku,
            'penerbit_buku' => $penerbit_buku,


        ];
        $this->db->insert('buku', $data);
    }
    public function get_buku()
    {
        $result = $this->db->query("SELECT * FROM buku;");
        return $result;
    }

    public function get_buku_id($id_buku)
    {
        $result = $this->db->get_where('buku', array('id_buku' => $id_buku));
        return $result;
    }

    public function proses_edit_buku($id_buku, $judul_buku, $pengarang_buku, $penerbit_buku)
    {
        $data = array(
            'judul_buku' => $judul_buku,
            'pengarang_buku' => $pengarang_buku,
            'penerbit_buku' => $penerbit_buku,

        );

        $this->db->where('id_buku', $id_buku);
        $this->db->update('buku', $data);

    }

    public function hapus_buku($id_buku)
    {
        $this->db->where('id_buku', $id_buku);
        $this->db->delete('buku');
    }





} ?>