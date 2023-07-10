<?php
class model_peminjaman extends CI_Model
{
    public function get_peminjaman()
    {

        $result = $this->db->select('peminjaman.id_pinjam,anggota.nama_anggota,buku.judul_buku,peminjaman.jml_pinjam,peminjaman.tgl_pinjam,peminjaman.tgl_kembali,peminjaman.lama_pinjam,peminjaman.denda')
            ->from('peminjaman')
            ->where('tgl_kembali', '0000-00-00')
            ->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota')
            ->join('buku', 'peminjaman.id_buku = buku.id_buku')
            ->get();

        return $result;

    }

    public function get_peminjaman_today()
    {
        $result = $this->db->query(("SELECT * FROM peminjaman WHERE DATE(tgl_pinjam) = CURDATE();"));
        return $result;
    }

    public function get_pengembalian_today()
    {
        $result = $this->db->query(("SELECT * FROM peminjaman WHERE DATE(tgl_kembali) = CURDATE();"));
        return $result;
    }

    public function get_peminjaman_selesai()
    {
        $result = $this->db->get_where('peminjaman', array('status' => 'Selesai'));
        return $result;
    }

    public function get_history_peminjaman()
    {

        $result = $this->db->select('peminjaman.id_pinjam,anggota.nama_anggota,buku.judul_buku,peminjaman.jml_pinjam,peminjaman.tgl_pinjam,peminjaman.tgl_kembali,peminjaman.lama_pinjam,peminjaman.denda')
            ->from('peminjaman')
            ->where('status', 'Selesai')
            ->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota')
            ->join('buku', 'peminjaman.id_buku = buku.id_buku')
            ->get();

        return $result;

    }

    public function get_pinjam_id($id_pinjam)
    {

        $result = $this->db->select('peminjaman.id_pinjam,anggota.nama_anggota,buku.judul_buku,peminjaman.jml_pinjam,peminjaman.tgl_pinjam,peminjaman.tgl_kembali,peminjaman.lama_pinjam,peminjaman.denda')
            ->from('peminjaman')
            ->where(array('id_pinjam' => $id_pinjam))
            ->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota')
            ->join('buku', 'peminjaman.id_buku = buku.id_buku')
            ->get();

        return $result;

    }

    public function proses_peminjaman($id_anggota, $id_buku, $jumlah_pinjam, $tanggal_pinjam)
    {
        $data = [

            'id_anggota' => $id_anggota,
            'id_buku' => $id_buku,
            'jml_pinjam' => $jumlah_pinjam,
            'tgl_pinjam' => $tanggal_pinjam,

        ];
        $this->db->insert('peminjaman', $data);
    }

    public function proses_batal_pinjam_buku($id_pinjam)
    {
        $this->db->where('id_pinjam', $id_pinjam);
        $this->db->delete('peminjaman');
    }

    public function proses_pengembalian($id_pinjam, $tanggal_pengembalian, $lama_pinjam, $denda)
    {
        $data = array(
            'tgl_kembali' => $tanggal_pengembalian,
            'lama_pinjam' => $lama_pinjam,
            'denda' => $denda,
            'status' => 'Selesai'

        );

        $this->db->where('id_pinjam', $id_pinjam);
        $this->db->update('peminjaman', $data);

    }
} ?>