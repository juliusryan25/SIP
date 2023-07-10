<div class="col-lg-7 rounded mx-auto bg-white m-2">
    <div class="row ">
        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
        <div class="col-lg-12 ">
            <div class="text-center">
                <h1 class="h4 mb-4 text-primary mt-4">Pinjam Buku</h1>
                <!-- <?= $this->session->flashdata('message'); ?> -->
            </div>
        </div>
        <div class="col-lg-12 ">
            <div class="p-3">
                <form class="user" method="post" action="<?= base_url(); ?>peminjaman/proses_pinjam_buku"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <select class="form-control" required style="border-radius: 7p Anggotax;height: 40px;"
                            name="id_anggota" id="id_anggota">
                            <option value="" selected disabled>Nama Anggota</option>
                            <?php foreach ($anggota as $row) { ?>
                                <option value="<?php echo $row->id_anggota; ?>"><?php echo $row->nama_anggota; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" required style="border-radius: 7p Anggotax;height: 40px;"
                            name="id_buku" id="id_buku">
                            <option value="" selected disabled>Judul Buku</option>
                            <?php foreach ($buku as $row) { ?>
                                <option value="<?php echo $row->id_buku; ?>"><?php echo $row->judul_buku; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" required class="form-control w-100 " min="1" id="jumlah_pinjam"
                            placeholder="Jumlah Pinjam" name="jumlah_pinjam">
                        <?= form_error('jumlah_pinjam', '<small class="text-danger pl-3" >', '</small> ') ?>

                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" readonly id="tanggal_pinjam" name="tanggal_pinjam" />
                        <small class="ml-2">Tanggal Otomatis</small>
                    </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-user btn-block w-75 mb-4 mx-auto">
            Save
        </button>
        </form>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;
        $("#tanggal_pinjam").attr("value", today);

    });

</script>