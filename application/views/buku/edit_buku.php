<div class="col-lg-7 rounded mx-auto bg-white m-2">
    <div class="row ">
    <div class="col-lg-12 mt-2">
            <?= $this->session->flashdata('edit_failed'); ?>
           
        </div>
        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
        <div class="col-lg-12 ">
            <div class="text-center">
                <h1 class="h4 mb-4 text-primary mt-4">Edit Buku</h1>
                <!-- <?= $this->session->flashdata('message'); ?> -->
            </div>
        </div>
        <div class="col-lg-12 ">
            <div class="p-3">
                <form class="user" method="post" action="<?= base_url(); ?>buku/proses_edit_buku"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control w-100 " value="<?php echo $judul_buku; ?>" id="Judul_buku" placeholder="Judul Buku"
                            name="judul_buku">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-100 " value="<?php echo $pengarang_buku; ?>" id="Pengarang_buku" placeholder="Pengarang Buku"
                            name="pengarang_buku">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control w-100 " value="<?php echo $penerbit_buku; ?>" id="Penerbit_buku" placeholder="Penerbit Buku"
                            name="penerbit_buku">
                    </div>
            </div>
        </div>

        <input type="hidden" class="form-control w-100 " value="<?php echo $id_buku; ?>" id="Judul_buku" required placeholder="Judul Buku"
                            name="id_buku">
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