<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index(){
        $data['title'] = 'Dashboard';
        $getJumlahAnggota = $this->model_anggota->get_anggota();
        $data['jumlah_anggota'] = $getJumlahAnggota->num_rows();

        $getJumlahBuku = $this->model_buku->get_buku();
        $data['jumlah_buku'] = $getJumlahBuku->num_rows();

        $getJumlahPinjamHari = $this->model_peminjaman->get_peminjaman_today();
        $data['pinjam_hari'] = $getJumlahPinjamHari->num_rows();

        $getJumlahPengembalianHari = $this->model_peminjaman->get_pengembalian_today();
        $data['pengembalian_hari'] = $getJumlahPengembalianHari->num_rows();

        $getPeminjamanSelesai = $this->model_peminjaman->get_peminjaman_selesai();
        $data['peminjaman_selesai'] = $getPeminjamanSelesai->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer',$data);

    }

}?>