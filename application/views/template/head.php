<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?=base_url("assets/css/bootstrap.min.css");?>" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <title>Login</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-auto bg-light sticky-top">
                <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                    <a href="<?=base_url("home")?>" class="d-block p-3 link-dark text-decoration-none" title=""
                        data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                        <i class="bi-bootstrap fs-1"></i>
                    </a>
                    <ul
                        class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center justify-content-between w-100 px-3 align-items-center">
                        <?php if(@$_SESSION["level"]=="admin"): ?>
                        <li>
                            <a href="<?=base_url("home/user")?>" class="nav-link py-3 px-2" title=""
                                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                                <i class="bi-file-earmark-person fs-1"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url("home/kategori")?>" class="nav-link py-3 px-2" title=""
                                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                                <i class="bi-list-check fs-1"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url("home/produk")?>" class="nav-link py-3 px-2" title=""
                                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                                <i class="bi-basket3 fs-1"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(@$_SESSION["level"]=="kasir"): ?>
                        <li>
                            <a href="<?=base_url("user/transaksi")?>" class="nav-link py-3 px-2" title=""
                                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Products">
                                <i class="bi-basket3 fs-1"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?=base_url("home/logout")?>" class="nav-link py-3 px-2" title=""
                                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                                <i class="bi-power fs-1"></i>
                            </a>
                        </li>
                    </ul>
                    <!--<div class="dropdown">
                        <a href="#"
                            class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle"
                            id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-person-circle h2"></i>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                        </ul>
                    </div>-->
                </div>
            </div>
