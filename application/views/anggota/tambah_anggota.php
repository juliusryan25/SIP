<style>
   
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }
</style>

<div class="col-lg-7 rounded mx-auto bg-white m-2">
    <div class="row ">
        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
        <div class="col-lg-12 ">
            <div class="text-center">
                <h1 class="h4 mb-4 text-primary mt-4">Tambah Anggota</h1>
                <!-- <?= $this->session->flashdata('message'); ?> -->
            </div>
        </div>
        <div class="col-lg-12 ">
            <div class="p-3">
                <form class="user" method="post" action="<?= base_url(); ?>anggota/proses_tambah_anggota"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control w-100 " id="nama_anggota"  placeholder="Nama anggota"
                            name="nama_anggota">
                            <?= form_error('nama_anggota', '<small class="text-danger pl-3" >', '</small> ') ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-100 " id="prodi_anggota" placeholder="Prodi anggota"
                            name="prodi_anggota">
                            <?= form_error('prodi_anggota', '<small class="text-danger pl-3" >', '</small> ') ?>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-100 " id="hp_anggota" placeholder="No HP"
                            name="hp_anggota">
                            <?= form_error('hp_anggota', '<small class="text-danger pl-3" >', '</small> ') ?>

                    </div>
            </div>
        </div>


        <button type="submit" class="btn btn-success btn-user btn-block w-75 mb-4 mx-auto">
            Save
        </button>
        </form>
    </div>
</div>
