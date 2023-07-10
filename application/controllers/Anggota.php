<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Anggota';
        $data['anggota'] = $this->model_anggota->get_anggota();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('anggota/index');
        $this->load->view('templates/footer', $data);

    }

    public function tambah_anggota()
    {
        $data['title'] = 'Tambah Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('anggota/tambah_anggota');
        $this->load->view('templates/footer', $data);

    }

    public function proses_tambah_anggota()
    {

        $this->form_validation->set_rules(
            'nama_anggota',
            'Nama_anggota',
            'required|alpha',
            [
                'required' => 'Nama anggota harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );
        $this->form_validation->set_rules(
            'prodi_anggota',
            'Prodi_anggota',
            'required|alpha',
            [
                'required' => 'Prodi anggota harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );
        $this->form_validation->set_rules(
            'hp_anggota',
            'Hp_anggota',
            'required|trim|integer',
            [
                'required' => 'No HP harus disi',
                'integer' => 'Input No HP berupa angka'
            ]

        );

        $nama_anggota = $this->input->post('nama_anggota');
        $prodi_anggota = $this->input->post('prodi_anggota');
        $hp_anggota = $this->input->post('hp_anggota');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Anggota';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('anggota/tambah_anggota');
            $this->load->view('templates/footer', $data);
        } else {
            $this->model_anggota->proses_tambah_anggota($nama_anggota, $prodi_anggota, $hp_anggota);
            $this->session->set_flashdata('tambah_success', '<div class="alert alert-success" role="alert">Tambah Anggota Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');

            redirect('anggota');
        }


    }

    public function edit_anggota()
    {
        $id_anggota = $this->uri->segment(3);
        $result = $this->model_anggota->get_anggota_id($id_anggota);

        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_anggota' => $i['id_anggota'],
                'nama_anggota' => $i['nama_anggota'],
                'prodi_anggota' => $i['prodi_anggota'],
                'hp_anggota' => $i['hp_anggota']

            );
        }

        $data['title'] = 'Edit Anggota';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('anggota/edit_anggota');
        $this->load->view('templates/footer', $data);

    }
    public function proses_edit_anggota()
    {
        $id_anggota = $this->input->post('id_anggota');
        $nama_anggota = $this->input->post('nama_anggota');
        $prodi_anggota = $this->input->post('prodi_anggota');
        $hp_anggota = $this->input->post('hp_anggota');


        $this->form_validation->set_rules(
            'nama_anggota',
            'Nama_anggota',
            'required|trim|alpha',
            [
                'required' => 'Nama anggota harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );
        $this->form_validation->set_rules(
            'prodi_anggota',
            'Prodi_anggota',
            'required|trim|alpha',
            [
                'required' => 'Prodi anggota harus disi',
                'alpha' => 'Input hanya berupa huruf'
            ]

        );
        $this->form_validation->set_rules(
            'hp_anggota',
            'Hp_anggota',
            'required|trim|integer',
            [
                'required' => 'No HP harus disi',
                'integer' => 'Input No HP berupa angka'
            ]

        );


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('edit_failed', '<div class="alert alert-danger" role="alert">Input tidak boleh kosong & data berupa huruf , <b>kecuali NO HP</b><button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');

            redirect('anggota/edit_anggota/' . $id_anggota);
        } else {
            $this->model_anggota->proses_edit_anggota($id_anggota, $nama_anggota, $prodi_anggota, $hp_anggota);
            $this->session->set_flashdata('edit_success', '<div class="alert alert-success" role="alert">Edit anggota Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');

            redirect('anggota');
        }
    }

    public function hapus_anggota()
    {
        $id_anggota = $this->uri->segment(3);
        $this->model_anggota->hapus_anggota($id_anggota);
        $this->session->set_flashdata('delete_success', '<div class="alert alert-success" role="alert">Delete Success<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('anggota');
    }
}
?>