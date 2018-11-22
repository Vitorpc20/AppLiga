<?php 
$ranking = $this->session->flashdata('ranking');
?>

<?php 
$cursos = $this->session->flashdata('cursos');
?>

<!doctype html>
<html class="no-js" lang="en">

<!-- Form de Ranking -->

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
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
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
                                <a href="<?php echo site_url('Index');?>" aria-expanded="true"><i class="ti-dashboard"></i><span>Bem-Vindo Liga</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url ('CadastraCampeonato')?>" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span> Cadastro campeonato </span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url ('CadastraCurso')?>" aria-expanded="true"><i class="ti-pie-chart"></i><span>Cursos</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url ('CadastraJogador')?>" aria-expanded="true"><i class="ti-slice"></i><span>Jogadores</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url ('CadastraPartida')?>" aria-expanded="true"><i class="fa fa-table"></i><span>Partidas</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url ('CadastraRanking')?>" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i><span>Ranking</span></a>
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
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
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
                            <h4 class="page-title pull-left">Ranking</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url('Index');?>">Home</a></li>
                                <li><span>Formulário de ranking</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                             <img class="avatar user-thumb" src="<?php echo base_url ('assets/images/author/fotoLiga.jpeg')?>" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Administrador <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- Textual inputs start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Atualizar Ranking</h4>

                                        <form class="form-group" method="POST" action="<?php echo site_url('CadastraRanking/atualiza');?>">
                                            <div class="col-sm-3 my-1">
                                                <label class="col-form-label" >Curso</label>
                                                <select class="form-control" name="curso">
                                                     <option></option>
                                                    <?php 
                                                        foreach($cursos AS $value):
                                                    ?>
                                                    <option><?php echo $value['nome'] ?></option>

                                                    <?php endforeach; ?>
                                                </select>

                                                <label for="example-text-input" class="col-form-label">Pontuação</label>
                                                <input class="form-control" type="text" name="pontuacao" id="pontuacao">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" id="botao_cadastrar_campeonato">Atualizar</button> 
                                        </form>
                                        <?php 
                                            if(isset($mensagem_cadastro)) echo "<html><div class='alert alert-success' role='alert'>".$mensagem_cadastro."</div></html>"; 
                                            if(isset($mensagem_erro)) echo "<html><div class='alert alert-danger' role='alert'>".$mensagem_erro."</div></html>"; 
                                        ?>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Ranking Geral</h4>
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table text-center">
                                                    <thead class="text-uppercase bg-primary">
                                                        <tr class="text-white">
                                                            <th scope="col">Posição</th>
                                                            <th scope="col">Curso</th>
                                                            <th scope="col">Pontuação Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $i = 0;
                                                            foreach($ranking AS $value):
                                                            $i++;
                                                         ?>

                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo $value['curso'] ?></td>
                                                            <td><?php echo $value['pontuacao'] ?></td>
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
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">

            </div>
            <div id="settings" class="tab-pane fade">

            </div>
        </div>
    </div>
    <!-- offset area end -->
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
</body>

</html>
