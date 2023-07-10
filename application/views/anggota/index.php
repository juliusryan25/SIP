<div class="container">
    <div class="row rounded bg-white p-3 shadow" style="margin-bottom: 15%;">
    <div class="col-lg-12">
            <?= $this->session->flashdata('tambah_success'); ?>
            <?= $this->session->flashdata('delete_success'); ?>
            <?= $this->session->flashdata('edit_success'); ?>
        </div>
        <div class="col-lg-10">
            <h3>Data Anggota</h3>
        </div>
        <div class="col-lg-2">
            <a href="<?= base_url() ?>anggota/tambah_anggota" class="btn btn-primary w-100 ">Tambah Anggota</a>
        </div>
        <div class="col-lg-12 mt-3 ">
            <table id="tabel-data" class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Prodi </th>
                        <th scope="col">No telp</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($anggota->result() as $row) {
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
                                <?php echo $row->prodi_anggota; ?>
                            </td>
                            <td scope="col">
                                <?php echo $row->hp_anggota; ?>
                            </td>
                            <td scope="col">
                                <a href="<?= base_url('anggota/edit_anggota/'.$row->id_anggota) ?>" class="btn btn-warning">
                                    <i class="fa-solid fa-fw fa-pen-to-square" style="color: #ffffff;"></i>
                                </a>
                                <a href="<?= base_url('anggota/hapus_anggota/'.$row->id_anggota) ?>" class="btn btn-danger alert_notif ">
                                    <i class="fa-solid fa-fw fa-trash" style="color: #ffffff;"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('.alert_notif').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');
        var getLink = "<?php echo base_url(); ?>";
        Swal.fire({
            title: "Anda Yakin Menghapus Data Anggota?",
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