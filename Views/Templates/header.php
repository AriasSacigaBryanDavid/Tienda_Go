<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Panel de Administración</title>
        <link href="<?php echo base_url; ?>Assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet" crossorigin="anonymous"/>
        <link href="<?php echo base_url; ?>Assets/css/temas.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed card-header-d">
        <nav class="sb-topnav navbar navbar-expand navbar-dark card-header-d">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Tienda GO</a>
           
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Perfil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo base_url;?>Usuarios/salir">Cerrar Sessión</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu card-header-d">
                        <!-- <div class="form-floating mb-3" align="center">
                            <img src="Assets/img/logo.png" width="100" >
                        </div> -->
                        <div class="nav">
                            <!-- menu de Administración-->
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdministracion" aria-expanded="false" aria-controls="collapseAdministracion">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list text-success fa-2x"></i></div>
                                Administración
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-success"></i></div>
                            </a>
                            <div class="collapse" id="collapseAdministracion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Usuarios">Usuarios</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Administracion/almacenes">Almacenes</a>
                                </nav>
                            </div>
                            
                            <!-- menu de configuración-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseConfiguracion" aria-expanded="false" aria-controls="collapseConfiguracion">
                                <div class="sb-nav-link-icon"><i class="fas fa-tools text-success fa-2x"></i></div>
                                Configuración
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-success"></i></div>
                            </a>
                            <div class="collapse" id="collapseConfiguracion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Cajas"> Cajas</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Administracion">Configuración</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Administracion/cargos">Cargos</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Administracion/identidades">Identidades</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Administracion/documentos">Documentos</a>
                                </nav>
                            </div>
                            <!-- menu de contactos -->
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseContactos" aria-expanded="false" aria-controls="collapseContactos">
                                <div class="sb-nav-link-icon"><i class="fas fa-users text-success fa-2x"></i></div>
                                Contactos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-success"></i></div>
                            </a>
                            <div class="collapse" id="collapseContactos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>Contactos">Proveedores</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Contactos/clientes">Clientes</a>
                                </nav>
                            </div>
                            <!-- menu de Productos -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProductos" aria-expanded="false" aria-controls="collapseProductos">
                                <div class="sb-nav-link-icon"><i class="fas fa-store text-success fa-2x"></i></div>
                                Productos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-success"></i></div>
                            </a>
                            <div class="collapse" id="collapseProductos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url;?>Medidas"><i class="fas fa-ruler-vertical"></i> Medidas</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Categorias"><i class="fas fa-poll-h"></i>Categorias</a>
                                    <a class="nav-link" href="<?php echo base_url;?>Productos"><i class="fas fa-folder"></i>Productos</a>
                                </nav>
                            </div>
                            <!-- menu de compras-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCompras" aria-expanded="false" aria-controls="collapseCompras">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart text-success fa-2x"></i></div>
                                Compras
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-success"></i></div>
                            </a>
                            <div class="collapse" id="collapseCompras" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>Compras"><i class="fas fa-shopping-cart mr-2"></i> Nueva compra</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Compras/historial"><i class="fas fa-history mr-2 "></i> historial compra</a>
                                </nav>
                            </div>
                            <!-- menu de Ventas-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVentas" aria-expanded="false" aria-controls="collapseVentas">
                                <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart text-success fa-2x"></i></div>
                                Ventas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-success"></i></div>
                            </a>
                            <div class="collapse" id="collapseVentas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>Compras/ventas"><i class="fas fa-shopping-cart mr-2"></i> Nueva Venta</a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Compras/historial_ventas"><i class="fas fa-history mr-2 "></i> Historial Ventas</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado como:</div>
                        Tienda Go
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">
                        
                        
                
