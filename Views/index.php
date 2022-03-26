<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iniciar Sessión</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/temas.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="fondo-a">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card card-header-a shadow-lg border-0 rounded-lg mt-5">
                                    <!-- <div class="card-header text-center">
                                        <h3 class="font-weight-light my-4">Iniciar Sessión</h3>
                                        <img src="Assets/img/logo.png" class="img-fluid rounded" alt="logo" width="200" >
                                    
                                    </div> -->
                                    <div class="card-body">
                                        <div class="text-center mb-2">
                                            <img src="Assets/img/logo.png" class="img-fluid rounded mb-4" alt="logo" width="200">
                                            <h3 class="font-weight-light text-white">Iniciar Sesión</h3>
                                        </div>
                                        <!-- Casilla para ingresar datos-->
                                        <form id="frmLogin">
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="usuario" name="usuario" type="text" placeholder="Ingrese usuario" />
                                                <label for="usuario"><i class="fas fa-user"></i> Usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="contrasena" name="contrasena" type="password" placeholder="Ingrese contraseña" />
                                                <label for="contrasena"><i class="fas fa-key"></i> Contraseña</label>
                                            </div>
                                            <div class="alert alert-danger text-center d-none" id="alerta" role="alert">
                                               
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-b text-white" type="submit" onclick="frmLogin(event);">Login</button>
                                            
                                            </div>
                                        </form>
                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Tienda Go</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script>
            const base_url="<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/login.js"></script>
    </body>
</html>

