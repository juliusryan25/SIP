<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Buku';
        $data['buku'] = $this->model_buku->get_buku();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/index');
        $this->load->view('templates/footer', $data);


    }
    public function tambah_buku()
    {
        $data['title'] = 'Tambah Buku';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/tambah_buku');
        $this->load->view('templates/footer', $data);

    }
    public function proses_tambah_buku()
    {

        $this->form_validation->set_rules(
            'judul_buku',
            'Judul_buku',
            'required|trim|alpha',
            [
                'required' => 'Judul buku harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );
        $this->form_validation->set_rules(
            'pengarang_buku',
            'Pengarang_buku',
            'required|trim|alpha',
            [
                'required' => 'Pengarang buku harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );
        $this->form_validation->set_rules(
            'penerbit_buku',
            'Penerbit_buku',
            'required|trim|alpha',
            [
                'required' => 'Penerbit buku harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );

        $judul_buku = $this->input->post('judul_buku');
        $pengarang_buku = $this->input->post('pengarang_buku');
        $penerbit_buku = $this->input->post('penerbit_buku');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Buku';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/tambah_buku');
            $this->load->view('templates/footer', $data);
        } else {
            $this->model_buku->proses_tambah_buku($judul_buku, $pengarang_buku, $penerbit_buku);
            $this->session->set_flashdata('tambah_success', '<div class="alert alert-success" role="alert">Tambah Buku Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');

            redirect('buku');
        }


    }
    public function edit_buku()
    {
        $id_buku = $this->uri->segment(3);
        $result = $this->model_buku->get_buku_id($id_buku);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_buku' => $i['id_buku'],
                'judul_buku' => $i['judul_buku'],
                'pengarang_buku' => $i['pengarang_buku'],
                'penerbit_buku' => $i['penerbit_buku']

            );
        }

        $data['title'] = 'Edit Buku';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/edit_buku');
        $this->load->view('templates/footer', $data);

    }
    public function proses_edit_buku()
    {
        $id_buku = $this->input->post('id_buku');
        $judul_buku = $this->input->post('judul_buku');
        $pengarang_buku = $this->input->post('pengarang_buku');
        $penerbit_buku = $this->input->post('penerbit_buku');



        $this->form_validation->set_rules(
            'judul_buku',
            'Judul_buku',
            'required|trim|alpha',
            [
                'required' => 'Judul buku harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );
        $this->form_validation->set_rules(
            'pengarang_buku',
            'Pengarang_buku',
            'required|trim|alpha',
            [
                'required' => 'Pengarang buku harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );
        $this->form_validation->set_rules(
            'penerbit_buku',
            'Penerbit_buku',
            'required|trim|alpha',
            [
                'required' => 'Penerbit buku harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('edit_failed', '<div class="alert alert-danger" role="alert">Input tidak boleh kosong & data berupa huruf<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');

            redirect('buku/edit_buku/' . $id_buku);
        } else {
            $this->model_buku->proses_edit_buku($id_buku, $judul_buku, $pengarang_buku, $penerbit_buku);
            $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Edit Buku Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');

            redirect('buku');
        }
    }
    public function hapus_buku()
    {
        $id_buku = $this->uri->segment(3);
        $this->model_buku->hapus_buku($id_buku);
        $this->session->set_flashdata('delete_success', '<div class="alert alert-success" role="alert">Delete Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('buku');
    }
}
?>