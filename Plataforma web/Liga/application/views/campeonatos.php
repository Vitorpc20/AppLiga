<?php 
$campeonatos = $this->session->flashdata('campeonatos');
 ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Liga Desportiva - UFSCar Sorocaba</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/png" href="<?php echo base_url ('assets/images/icon/favicon.icos')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/themify-icons.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/metisMenu.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/slicknav.min.css')?>">
    

    <link rel="stylesheet" href="<?php echo base_url ('assets/css/fontawesome/css/all.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/fontawesome/css/all.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/fontawesome/css/fontawesome.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/fontawesome/css/fontawesome.min.css')?>">
   
    <!-- amchart css -->

    <link rel="stylesheet" href="<?php echo base_url ('https://www.amcharts.com/lib/3/plugins/export/export.css')?>" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/typography.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/default-css.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/styles.css')?>">
    <link rel="stylesheet" href="<?php echo base_url ('assets/css/responsive.css')?>">
   
    <!-- modernizr css -->
    <script src="<?php echo base_url ('assets/js/vendor/modernizr-2.8.3.min.js')?>"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="<?php echo site_url('Index');?>"><span>LIGA DESPORTIVA</span></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="<?php echo site_url('Index/');?>" aria-expanded="true"><i class="fa fa-home"></i><span>Bem-Vindo Liga</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url ('Index/campeonatos')?>" aria-expanded="true"><i class="fa fa-trophy"></i><span> Campeonatos </span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url ('CadastraCurso')?>" aria-expanded="true"><i class="fa fa-university"></i><span> Cursos </span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Bem-vindo</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url('Index');?>">Home</a></li>
                                <li><span>Campeonatos</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                             <img class="avatar user-thumb" src="<?php echo base_url ('assets/images/author/fotoLiga.jpeg')?>" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Administrador <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php echo site_url() . '/CadastraCampeonato/Sair/'?>">Sair</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-md-12 col-ml-12">
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Novo campeonato</h4> 
                                        <!-- Button trigger modal -->
                                        <form class="form-group" method="POST" action="<?php echo site_url('CadastraCampeonato/cadastra');?>">
                                            <div class="col-md-6">
                                                <label for="example-text-input" class="col-form-label">Nome</label>
                                                <input class="form-control" type="text" name="nome_campeonato" id="nome_campeonato">
                                
                                                <label for="example-text-input" class="col-form-label">Ano</label>
                                                <input class="form-control" type="text" name="ano_campeonato" id="ano_campeonato">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#modalCadastro">Cadastrar</button>
                                        </form>
                                        
                                        <?php 
                                            if(isset($mensagem_erro)) echo "<html><div class='alert alert-danger' role='alert'>".$mensagem_erro."</div></html>";
                                            if(isset($mensagem_cadastro)) echo "<html><div class='alert alert-success' role='alert'>".$mensagem_cadastro."</div></html>"; 
                                        ?>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Campeonatos Existentes</h4>
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table text-center" id="tabela_campeonatos">
                                                    <thead class="text-uppercase bg-primary">
                                                        <tr class="text-white">
                                                            <th name='nome' id='nome' scope="col">Nome</th>
                                                            <th name='ano' id='ano' scope="col">Ano</th>
                                                            <th scope="col"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            foreach($campeonatos AS $value):
                                                         ?>

                                                         <tr>

                                                            <th><input class="bnt" style="background-color: white; width: 100%; height: 35px; border: none; text-align: center;" type="text" readonly="readonly" id="numero" value="<?php echo $value['nome'] ?>" /></th>
                                                            <th><input class="bnt" style="background-color: white; width: 100%; height: 35px; border: none; text-align: center;" type="text" readonly="readonly" id="numero" value="<?php echo $value['ano'] ?>" /></th>
                                                            <th><a class="btn btn-primary" href="<?php echo site_url() . '/Index/gerencia_campeonato/' . rawurlencode($value['cod_campeonato']); ?>" >Gerenciar</a></th>
                                                        </tr>

                                                        <?php endforeach; ?>
                                                        
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
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Made by 2LVM Enterprise.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="<?php echo base_url ('assets/js/vendor/jquery-2.2.4.min.js')?>"></script>
    <!-- bootstrap 4 js -->
    <script src="<?php echo base_url ('assets/js/popper.min.js')?>"></script>

    <script src="<?php echo base_url ('assets/js/bootstrap.min.js')?>"></script>

    <script src="<?php echo base_url ('assets/js/owl.carousel.min.js')?>"></script>

    <script src="<?php echo base_url ('assets/js/metisMenu.min.js')?>"></script>

    <script src="<?php echo base_url ('assets/js/jquery.slimscroll.min.js')?>"></script>

    <script src="<?php echo base_url ('assets/js/jquery.slicknav.min.js')?>"></script>


    <!-- others plugins -->
    <script src="<?php echo base_url ('assets/js/plugins.js')?>"></script>

    <script src="<?php echo base_url ('assets/js/scripts.js')?>"></script>




    <script type="text/javascript">
            $(document).ready(function(){
                    if  mensagem_erro != ''
                        $('#modalCadastro').modal('show');
                }
            );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
          $("form#login").validate({
            lang: 'pt' 
          });
        });
    </script>
</body>

</html>
