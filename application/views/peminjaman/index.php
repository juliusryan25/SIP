<div class="container">
    <div class="row rounded bg-white p-3 shadow" style="margin-bottom: 15%;">
        <div class="col-lg-12">
            <?= $this->session->flashdata('peminjaman_success'); ?>
            <?= $this->session->flashdata('pengembalian_success'); ?>
            <?= $this->session->flashdata('delete_success'); ?>
            <?= $this->session->flashdata('edit_success'); ?>
        </div>

        <div class="col-lg-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Pinjam Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Pengembalian Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">History Peminjaman</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row pt-3">
                        <div class="col-lg-10">
                            <h3>Data Peminjaman</h3>
                        </div>
                        <div class="col-lg-2">
                            <a href="<?= base_url() ?>peminjaman/pinjam_buku" class="btn btn-primary w-100 ">Pinjam
                                Buku</a>
                        </div>
                        <div class="col-lg-12 mt-3 ">
                            <table id="tabel-data" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Jumlah Pinjam</th>
                                        <!-- <th scope="col">Lama Pinjam</th>
                                        <th scope="col">Denda</th> -->
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <input type="date" readonly id="mob-gig-date-gteq" /> -->
                                    <?php
                                    $count = 0;
                                    foreach ($data_pinjam->result() as $row) {
                                        $count++;
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $count; ?>
                                            </th>
                                            <td scope="col">
                                                <?php echo $row->nama_anggota; ?>
                                            </td>
                                            <td scope="col">
                                                <?php echo $row->judul_buku; ?>
                                            </td>

                                            <td scope="col">

                                                <?php echo $row->tgl_pinjam; ?>
                                            </td>
                                            <td scope="col">
                                                <?php echo $row->jml_pinjam; ?>&nbsp;pcs
                                            </td>
                                            <td scope="col">
                                                <?php
                                                if ($row->tgl_kembali == "0000-00-00") { ?>
                                                    <!-- <a href="<?= base_url('') ?>" class="w-100 btn btn-success">
                                                        Pengembalian Buku
                                                    </a> -->
                                                    <a href="<?= base_url('peminjaman/batal_pinjam_buku/' . $row->id_pinjam) ?>"
                                                        class="w-100 btn btn-danger mt-1 alert_notif">
                                                        Batal Pinjam Buku
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('peminjaman/batal_pinjam_buku/' . $row->id_pinjam) ?>"
                                                        class="w-100 btn btn-warning mt-1 alert_notif">
                                                        Cetak
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row pt-3">
                        <div class="col-lg-12">
                            <h3>Data Pengembalian</h3>
                        </div>
                        <div class="col-lg-12 mt-3 ">
                            <table id="tabel-data" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Kembali</th>
                                        <th scope="col">Jumlah Pinjam</th>
                                        <!-- <th scope="col">Lama Pinjam</th>
                                        <th scope="col">Denda</th> -->
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <input type="date" readonly id="mob-gig-date-gteq" /> -->
                                    <?php
                                    $count = 0;
                                    foreach ($data_pinjam->result() as $row) {
                                        $count++;
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $count; ?>
                                            </th>
                                            <td scope="col">
                                                <?php echo $row->nama_anggota; ?>
                                            </td>
                                            <td scope="col">
                                                <?php echo $row->judul_buku; ?>
                                            </td>

                                            <td scope="col">

                                                <?php echo $row->tgl_pinjam; ?>
                                            </td>
                                            <td scope="col">
                                                <?php
                                                if ($row->tgl_kembali == "0000-00-00") {
                                                    echo "<b class='text-danger'>Buku Belum Dikembalikan</b>";
                                                } else {
                                                    echo $row->tgl_kembali;
                                                }
                                                ; ?>
                                                <!-- <input type="date" name="" id="input_d" value="<?php echo $row->tgl_kembali; ?>"> -->
                                            </td>
                                            <td scope="col">
                                                <?php echo $row->jml_pinjam; ?>&nbsp;pcs
                                            </td>
                                            <!-- <td scope="col">
                                                <?php
                                                if ($row->lama_pinjam == 0) {
                                                    echo "<b class='text-danger'>-</b>";
                                                } else {
                                                    echo $row->lama_pinjam;
                                                }
                                                ; ?>
                                            </td>
                                            <td scope="col">
                                                <?php
                                                if ($row->denda == 0) {
                                                    echo "<b class='text-danger'>-</b>";
                                                } else {
                                                    echo $row->denda;
                                                }
                                                ; ?>
                                            </td> -->
                                            <td scope="col">

                                                <?php
                                                if ($row->tgl_kembali == "0000-00-00") { ?>
                                                    <a href="<?= base_url('peminjaman/pengembalian_buku/' . $row->id_pinjam) ?>"
                                                        class="w-100 btn btn-success">
                                                        Pengembalian Buku
                                                    </a>
                                                    <!-- <a href="<?= base_url('peminjaman/batal_pinjam_buku/' . $row->id_pinjam) ?>"
                                                        class="w-100 btn btn-danger mt-1 alert_notif">
                                                        Batal Pinjam Buku
                                                    </a> -->
                                                <?php } else { ?>
                                                    <a href="<?= base_url('peminjaman/batal_pinjam_buku/' . $row->id_pinjam) ?>"
                                                        class="w-100 btn btn-warning mt-1 alert_notif">
                                                        Cetak
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row pt-3">
                        <div class="col-lg-12">
                            <h3>History Peminjaman & Pengembalian Buku</h3>
                        </div>
                        <div class="col-lg-12 mt-3 ">
                            <table id="tabel-data" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col">Judul Buku</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Kembali</th>
                                        <th scope="col">Jumlah Pinjam</th>
                                        <th scope="col">Lama Pinjam</th>
                                        <th scope="col">Denda</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <input type="date" readonly id="mob-gig-date-gteq" /> -->
                                    <?php
                                    $count = 0;
                                    foreach ($data_history_pinjam->result() as $row) {
                                        $count++;
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $count; ?>
                                            </th>
                                            <td scope="col">
                                                <?php echo $row->nama_anggota; ?>
                                            </td>
                                            <td scope="col">
                                                <?php echo $row->judul_buku; ?>
                                            </td>

                                            <td scope="col">

                                                <?php echo $row->tgl_pinjam; ?>
                                            </td>
                                            <td scope="col">
                                                <?php
                                                if ($row->tgl_kembali == "0000-00-00") {
                                                    echo "<b class='text-danger'>Buku Belum Dikembalikan</b>";
                                                } else {
                                                    echo $row->tgl_kembali;
                                                }
                                                ; ?>
                                                <!-- <input type="date" name="" id="input_d" value="<?php echo $row->tgl_kembali; ?>"> -->
                                            </td>
                                            <td scope="col">
                                                <?php echo $row->jml_pinjam; ?>&nbsp;pcs
                                            </td>
                                            <td scope="col">
                                                <?php
                                                if ($row->lama_pinjam == 0) {
                                                    echo "<b class='text-danger'>-</b>";
                                                } else {
                                                    echo $row->lama_pinjam;
                                                }
                                                ; ?>
                                            </td>
                                            <td scope="col">
                                                <?php
                                                if ($row->denda == 0) {
                                                    echo "<b class='text-success'>-</b>";
                                                } else {
                                                    echo "<b class='text-danger'>" . number_format($row->denda) . "</b>";
                                                }
                                                ; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $('.alert_notif').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        var getLink = "<?php echo base_url(); ?>";
        Swal.fire({
            title: "Anda Yakin Membatakan Peminjaman?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonColor: '#3085d6',
            cancelButtonText: "Cancel"

        }).then(result => {
            //jika klik ya maka arahkan ke proses.php
            if (result.value == true) {
                document.location.href = href;
            }
        })
        // return false;
    });
</script>