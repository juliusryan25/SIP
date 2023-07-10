<div class="col-lg-7 rounded mx-auto bg-white m-2">
    <div class="row ">
    <div class="col-lg-12 mt-2">
            <?= $this->session->flashdata('edit_failed'); ?>
           
        </div>
        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
        <div class="col-lg-12 ">
            <div class="text-center">
                <h1 class="h4 mb-4 text-primary mt-4">Edit Anggota</h1>
                <!-- <?= $this->session->flashdata('message'); ?> -->
            </div>
        </div>
        <div class="col-lg-12 ">
            <div class="p-3">
                <form class="user" method="post" action="<?= base_url(); ?>anggota/proses_edit_anggota"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control w-100 " value="<?php echo $nama_anggota; ?>" id="nama_anggota" placeholder="Nama anggota"
                            name="nama_anggota">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-100 " value="<?php echo $prodi_anggota; ?>" id="prodi_anggota" placeholder="Prodi anggota"
                            name="prodi_anggota">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-100 " value="<?php echo $hp_anggota; ?>" id="hp_anggota" placeholder="No HP"
                            name="hp_anggota">
                    </div>
            </div>
        </div>

        <input type="hidden" class="form-control w-100 " value="<?php echo $id_anggota; ?>" id="Judul_anggota" required placeholder="Judul anggota"
                            name="id_anggota">
        <button type="submit" class="btn btn-success btn-user btn-block w-75 mb-4 mx-auto">
            Save
        </button>
        </form>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        $("#txtEditor").Editor();
        // $("#txtEditor").html("I am a <b>bold</b> text.");

    });

</script>