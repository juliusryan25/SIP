<?php

class model_anggota extends CI_Model
{
    public function proses_tambah_anggota($nama_anggota, $prodi_anggota, $hp_anggota)
    {
        $data = [

            'nama_anggota' => $nama_anggota,
            'prodi_anggota' => $prodi_anggota,
            'hp_anggota' => $hp_anggota,


        ];
        $this->db->insert('anggota', $data);
    }

    public function proses_edit_anggota($id_anggota, $nama_anggota, $prodi_anggota, $hp_anggota)
    {
        $data = array(
            'nama_anggota' => $nama_anggota,
            'prodi_anggota' => $prodi_anggota,
            'hp_anggota' => $hp_anggota,

        );

        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);

    }
    public function get_anggota()
    {
        $result = $this->db->query("SELECT * FROM anggota;");
        return $result;
    }
    public function get_anggota_id($id_anggota)
    {
        $result = $this->db->get_where('anggota', array('id_anggota' => $id_anggota));
        return $result;
    }

    public function hapus_anggota($id_anggota)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->delete('anggota');
    }
    
}
?>