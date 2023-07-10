<style>
    .side-active{
       
        background: #002B5B;
        border-radius: 50px 0px 0px 50px;
        margin-left: 5px;
        padding-left: -10px;
       
    }

</style>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand bg-primary text-white d-flex text-center justify-content-center align-items-center mb-4"  href="index.html">
        <div class="sidebar-brand-icon ">
        <i class="fa-solid fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3 mt-2">
            <H2>SIP</H2>
        </div>
    </a>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0"> -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item " id="nav-dashboard-aktif" >
        <a class="nav-link" onclick="aktifkan_dashboard()" href="<?= base_url() ?>dashboard">
        <i class="fa-solid fa-fw fa-house"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item" id="nav-anggota-aktif">
        <a class="nav-link" href="<?= base_url() ?>anggota">
        <i class="fa-solid fa-fw fa-user "></i>
            <span>Anggota</span></a>
    </li>
    <li class="nav-item " id="nav-buku-aktif">
        <a class="nav-link" href="<?= base_url() ?>buku">
        <i class="fa-solid fa-fw fa-book"></i>
            <span>Buku</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item" id="nav-peminjaman-aktif">
        <a class="nav-link" href="<?= base_url() ?>peminjaman">
        <i class="fa-solid fa-book-bookmark"></i>
            <span>Peminjaman</span></a>
    </li>



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-4">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->

<script>
    var title = '<?= $title ?>';
    console.log(title);
    if (title == "Dashboard") {
        $('#nav-dashboard-aktif').toggleClass('active');
        $('#nav-dashboard-aktif').toggleClass('side-active');
    }
    else  if (title == "Anggota" | title == "Tambah Anggota" | title == "Edit Anggota" ) {
        $('#nav-anggota-aktif').toggleClass('active');
        $('#nav-anggota-aktif').toggleClass('side-active');
    }
    else  if (title == "Buku") {
        $('#nav-buku-aktif').toggleClass('active');
        $('#nav-buku-aktif').toggleClass('side-active');
    }
    else  if (title == "Peminjaman") {
        $('#nav-peminjaman-aktif').toggleClass('active');
        $('#nav-peminjaman-aktif').toggleClass('side-active');
    }


</script>