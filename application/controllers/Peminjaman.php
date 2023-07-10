<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Peminjaman';
        $data['data_pinjam'] = $this->model_peminjaman->get_peminjaman();
        $data['data_history_pinjam'] = $this->model_peminjaman->get_history_peminjaman();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer', $data);

    }

    public function pinjam_buku()
    {
        $data['title'] = 'Pinjam Buku';
        $data['anggota'] = $this->db->get_where('anggota', ['nama_anggota'])->result();
        $data['buku'] = $this->db->get_where('buku', ['judul_buku'])->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/pinjam_buku');
        $this->load->view('templates/footer', $data);

    }

    public function proses_pinjam_buku()
    {
        $id_anggota = $this->input->post('id_anggota');
        $id_buku = $this->input->post('id_buku');
        $jumlah_pinjam = $this->input->post('jumlah_pinjam');
        $tanggal_pinjam = $this->input->post('tanggal_pinjam');

        $this->model_peminjaman->proses_peminjaman($id_anggota, $id_buku, $jumlah_pinjam, $tanggal_pinjam);
        $this->session->set_flashdata('peminjaman_success', '<div class="alert alert-success" role="alert">Peminjaman Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');

        redirect('peminjaman');

    }

    public function batal_pinjam_buku()
    {
        $id_pinjam = $this->uri->segment(3);
        $this->model_peminjaman->proses_batal_pinjam_buku($id_pinjam);
        $this->session->set_flashdata('delete_success', '<div class="alert alert-success" role="alert">Membatalkan Peminjaman Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('peminjaman');
    }
    public function pengembalian_buku()
    {
        $id_pinjam = $this->uri->segment(3);
        $result = $this->model_peminjaman->get_pinjam_id($id_pinjam);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_pinjam' => $i['id_pinjam'],
                'nama_anggota' => $i['nama_anggota'],
                'judul_buku' => $i['judul_buku'],
                'tgl_pinjam' => $i['tgl_pinjam'],
                'jml_pinjam' => $i['jml_pinjam']

            );
        }

        $data['title'] = 'Pengembalian Buku';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/pengembalian_buku');
        $this->load->view('templates/footer', $data);

    }

    public function proses_pengembalian_buku()
    {
        $id_pinjam = $this->input->post('id_pinjam');
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $lama_pinjam = $this->input->post('lama_pinjam');
        $denda = $this->input->post('denda');

        $this->model_peminjaman->proses_pengembalian($id_pinjam, $tanggal_pengembalian, $lama_pinjam, $denda);
        $this->session->set_flashdata('pengembalian_success', '<div class="alert alert-success" role="alert">Pengembalian Buku Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');

        redirect('peminjaman');

    }

}
?>