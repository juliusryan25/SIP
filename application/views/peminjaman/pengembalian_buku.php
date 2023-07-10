<div class="col-lg-5 rounded mx-auto bg-white m-2">
    <div class="row ">
        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
        <div class="col-lg-12 ">
            <div class="text-center">
                <h1 class="h4 mb-4 text-primary mt-4">Pengembalian Buku</h1>
                <!-- <?= $this->session->flashdata('message'); ?> -->
            </div>
        </div>
        <div class="col-lg-12 ">
            <div class="p-3">
                <div class="row">
                    <!-- NAMA ANGGOTA -->
                    <div class="col-lg-4">
                        <label for="">Nama Anggota</label>
                    </div>
                    <div class="col-lg-1">
                        :
                    </div>
                    <div class="col-lg-7">
                        <?php echo $nama_anggota; ?>
                    </div>
                    <!-- JUDUL BUKU -->
                    <div class="col-lg-4">
                        <label for="">Judul Buku</label>
                    </div>
                    <div class="col-lg-1">
                        :
                    </div>
                    <div class="col-lg-7">
                        <?php echo $judul_buku; ?>
                    </div>
                    <!-- JUMLAH PINJAM -->
                    <div class="col-lg-4">
                        <label for="">Jumlah Pinjam</label>
                    </div>
                    <div class="col-lg-1">
                        :
                    </div>
                    <div class="col-lg-7">
                        <?php echo $jml_pinjam; ?>&nbsp;Pcs
                    </div>
                    <!-- TANGGAL PINJAM -->
                    <div class="col-lg-4">
                        <label for="">Tanggal Pinjam</label>
                    </div>
                    <div class="col-lg-1 pt-2">
                        :
                    </div>
                    <div class="col-lg-7">
                        <form class="user" method="post" action="<?= base_url(); ?>peminjaman/proses_pengembalian_buku"
                            enctype="multipart/form-data">
                            <input type="date" class="form-control w-75" value="<?php echo $tgl_pinjam; ?>" readonly
                                id="tanggal_pinjam" name="tanggal_pinjam" />
                    </div>
                    <!-- TANGGAL PENGEMBALIAN -->
                    <div class="col-lg-4">
                        <label for="">Tanggal Pengembalian</label>
                    </div>
                    <div class="col-lg-1 pt-2">
                        :
                    </div>
                    <div class="col-lg-7">
                        <form class="user" method="post" action="<?= base_url(); ?>peminjaman/proses_pengembalian_buku"
                            enctype="multipart/form-data">
                            <input type="date" class="form-control w-75 mt-2" value="<?php echo $tgl_pinjam; ?>"
                                readonly id="tanggal_pengembalian" name="tanggal_pengembalian" />
                    </div>
                    <!-- LAMA PINJAM -->
                    <div class="col-lg-4">
                        <label for="">Lama Pinjam</label>
                    </div>
                    <div class="col-lg-1">
                        :
                    </div>
                    <div class="col-lg-3">
                        <input type="number" id="lama_pinjam" class="form-control w-100" name="lama_pinjam" readonly
                            id="">
                    </div>
                    <div class="col-lg-4 pl-0 pt-2">
                        Hari
                    </div>
                    <!-- DENDA -->
                    <div class="col-lg-4 mt-2">
                        <label for="">Denda</label>
                    </div>
                    <div class="col-lg-1 mt-2">
                        :
                    </div>
                    <div class="col-lg-7 mt-2">
                        <input type="number" id="denda" class="form-control w-75" name="denda" readonly id="">
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id_pinjam" value="<?php echo $id_pinjam ?>" id="id_pinjam">
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
        //Set Tanggal Pengembalian Otomatis
        var date = new Date();

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = year + "-" + month + "-" + day;
        $("#tanggal_pengembalian").attr("value", today);

        // GET TANGGAL
        var getTanggalPinjam = $("#tanggal_pinjam").val();
        var tpinjam = new Date(getTanggalPinjam);
        // var getDatetpinjam = tpinjam.getDate();

        var getTanggalPengembalian = $("#tanggal_pengembalian").val();
        var tpengembalian = new Date(getTanggalPengembalian);
        // var getDatetpengembalian = tpengembalian.getDate();

        tpinjam.setHours(0, 0, 0, 0);
        tpengembalian.setHours(0, 0, 0, 0);


        // var lamaPinjam =Math.abs(getDatetpengembalian - getDatetpinjam);
        // console.log(tpinjam);
        // console.log(tpengembalian);

        // Operasi Lama Pinjam
        var selisih = Math.abs(tpengembalian - tpinjam);
        var hariDalamMillisecond = 1000 * 60 * 60 * 24;
        var lama_pinjam = Math.round(selisih / hariDalamMillisecond)
      

        if (lama_pinjam == 0) {
            $("#lama_pinjam").attr("value", 1);
        } else {
            $("#lama_pinjam").attr("value", lama_pinjam);
        }

        // Operasi Denda
        if (lama_pinjam > 2) {
            var denda = lama_pinjam - 2;
            var hasilDenda = denda * 5000;
            $("#denda").attr("value", hasilDenda); 
        }
        else {
            $("#denda").attr("value", 0);
        }

    });

</script>