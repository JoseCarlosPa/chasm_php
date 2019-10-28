<?php
require_once ('_bd_connections.php');
session_start();
$_GET['id'] = htmlentities($_GET['id']);
$result = informacionProducto($_GET['id'] );
$row = mysqli_fetch_assoc($result);

echo'
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISTEMA CHASM</title>

    <!-- Custom fonts for this template-->
    <link href="../htmls/admin/resources/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <!-- Custom styles for this template-->
    <link href="../htmls/admin/resources/css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-text mx-3"><img src ="../imgs/home/Logo.png" height="100%" width="100%"></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Bienvenido</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Sistema
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">

            <a class="nav-link" href="../admin.php">
                <i class="fas fa-fw fa-sticky-note"></i>
                <span>Productos</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">

            <a class="nav-link" href="../usuarios.php">
                <i class="fas fa-fw fa-cubes"></i>
                <span>clases</span></a>
        </li>


        <!--Divider -->


        <hr class="sidebar-divider d-none d-md-block">
        <div class="sidebar-heading">
            Usuarios
        </div>
        <li class="nav-item">

            <a class="nav-link" href="../usuarios.php">
                <i class="fas fa-fw fa-user-friends"></i>
                <span>Usuarios</span></a>
        </li>

        <!-- Divider -->


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">

                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We\'ve noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <!-- Nav Item - Messages -->


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$_SESSION["usuario"].'</span>

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar de la sesion
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content --------------------------------------------------------------->
            <div class="container-fluid">
            <form method="post" action="modificar_producto.php?id='.$row['id_productos'].'">
                <h2>Producto No:'.$row['id_productos'].' 
                <div class ="row">
                <div class ="col-sm-6">
               
                <div class ="row">
                    <div class ="col-sm-12">
                        <img src ="#">
                        <br>
                        <input style ="font-size: 50%"name="uploadedfile" type="file" />
                    </div>  
                </div>
                <br>
                <div class ="row">
                    <div class ="col-sm-6">
                        <div class ="row">
                            <div class ="col-sm-6">
                                <h3>Producto</h3>
                            </div>
                            <div class ="col-sm-6">
                                <input style ="font-size: 70%;"name ="nombre" value="'.$row['nombrep'].'">
                            </div>
                         </div>
                    </div>  
                </div>
                <div class ="row">
                    <div class ="col-sm-6">
                        <div class ="row">
                            <div class ="col-sm-6">
                                <h3>Descripcion</h3>
                            </div>
                            <div class ="col-sm-6">
                                <input style ="font-size: 70%;"name ="nombre" value="'.$row['descripcion'].'">
                            </div>
                         </div>
                    </div>  
                </div>
                <div class ="row">
                    <div class ="col-sm-6">
                        <div class ="row">
                            <div class ="col-sm-6">
                                <h3>Categoria</h3>
                            </div>
                            <div class ="col-sm-6">
                                <input style ="font-size: 70%;"name ="clase" value="'.$row['id_clase'].'">
                            </div>
                         </div>
                    </div>  
                </div>
                <div class ="row">
                    <div class ="col-sm-6">
                        <div class ="row">
                            <div class ="col-sm-6">
                                <h3>Precio Publico</h3>
                            </div>
                            <div class ="col-sm-6">
                                <input style ="font-size: 70%;"name ="precio" value="'.$row['precio'].'">
                            </div>
                         </div>
                    </div>  
                </div>
                <div class ="row">
                    <div class ="col-sm-6">
                        <div class ="row">
                            <div class ="col-sm-6">
                                <h3>Precio usuarios</h3>
                            </div>
                            <div class ="col-sm-6">
                                <input style ="font-size: 70%;"name ="precio_p" placeholder="'.$row['precio_p'].'">
                            </div>
                         </div>
                    </div>  
                </div>
                <div class ="row">
                    
                    <div class ="col-sm-3">
                       <button class ="btn btn-secondary">Descartar</button>
                    </div>
                    <div class ="col-sm-3">
                       <button class ="btn btn-primary" type="submit" name ="submite">Guardar</button>
                    </div>
                </div>
            </form>
            </div>
            <div class ="col-sm-6">
                <div class ="row">
                    <div class ="col-sm-3">
                    <a href ="_eliminar_producto.php?id='.$row['id_productos'].'">Eliminar</a>
                        
                    </div>
                </div>
            </div>
            </div>
           
            </div>
            <!-- /.container-fluid ---------------------------------------------------------------->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; CHASM</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Presiona "Salir" para cerrar tu sesion.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="_logout.php">Salir</a>
            </div>
        </div>
    </div>
</div>



</body>
<!-- Bootstrap core JavaScript-->

<script>

    $(document).ready(function () {
        $(\'#dtBasicExample\').DataTable();
        $(\'.dataTables_length\').addClass(\'bs-select\');
    });

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="htmls/admin/resources/vendor/jquery/jquery.min.js"></script>
<script src="htmls/admin/resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<!-- Core plugin JavaScript-->
<script src="htmls/admin/resources/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../htmls/admin/resources/js/sb-admin-2.min.js"></script>





</html>




';


?>