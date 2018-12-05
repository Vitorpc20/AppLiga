<?php 
$jogadores = $this->session->flashdata('jogadores');

$campeonato = $this->session->userdata('campeonato');

$cursos = $this->session->flashdata('cursos');
?>

<!doctype html>
<html class="no-js" lang="en">

<!-- Form de Cadastro de Jogadores -->

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
                                <a href="<?php echo site_url('Index/campeonatos');?>" aria-expanded="true"><i class="ti-dashboard"></i><span><< Mais Campeonatos</span></a>
                            </li>
                            <?php foreach ($campeonato as $value): ?>
                                <li>
                                    <a href="<?php echo site_url() . '/CadastraCurso/curso_campeonato/' . rawurlencode($value['cod_campeonato']); ?>" aria-expanded="true"><i class="ti-pie-chart"></i><span>Cursos Participantes</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() . '/CadastraJogador/Index/' . rawurlencode($value['cod_campeonato']); ?>" aria-expanded="true"><i class="ti-slice"></i><span>Cadastro de Jogadores</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url() . '/CadastraPartida/Index/' . rawurlencode($value['cod_campeonato']); ?>" aria-expanded="true"><i class="fa fa-table"></i><span>Cadastro e gerência de Partidas</span></a> 
                                </li>
                                <li>
                                    <a href="<?php echo site_url() . '/CadastraRanking/Index/' . rawurlencode($value['cod_campeonato']); ?>" aria-expanded="true"><i class="fa fa-exclamation-triangle"></i><span>Ranking</span></a>
                                </li>
                            <?php endforeach ?>
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
                            <h4 class="page-title pull-left">Jogadores</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="<?php echo site_url('Index');?>">Home</a></li>
                                <li><a href="<?php echo site_url('Index/campeonatos');?>">Campeonatos</a></li>
                                <li><span><?php foreach ($campeonato as $value): ?>
                                    <?php echo $value['nome'] ?> <?php echo $value['ano'] ?>
                                <?php endforeach ?> - Cadastro de Jogador</span></li>
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
                                        <h4 class="header-title">Cadastrar jogadores</h4>
                                        <?php foreach($campeonato AS $value): ?>
                                        <form class="form-group" method="POST" action="<?php echo site_url() . '/cadastraJogador/cadastra/' . $value['cod_campeonato']; ?>">
                                        <?php endforeach; ?>
                                            <label for="example-text-input" class="col-form-label">Nome</label>
                                            <input class="form-control" type="text" name="nome_jogador" id="nome_jogador">
        
                                            <label class="col-form-label">Curso</label>
                                                <select class="form-control" name="curso_jogador">
                                                    <option selected="true" disabled="disabled">Selecionar curso</option>
                                                    <?php 
                                                        foreach($cursos AS $value):
                                                    ?>
                                                    <option><?php echo $value['curso'] ?></option>

                                                    <?php endforeach; ?>
                                                </select>

                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Cadastrar</button> 
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
                                        <h4 class="header-title">Jogadores</h4>
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-center">
                                                    <thead class="text-uppercase bg-primary">
                                                        <tr class="text-white">
                                                            <th scope="col">Nome</th>
                                                            <th scope="col">Curso</th>
                                                            <th scope="col">Editar/Excluir</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            foreach($jogadores AS $value):
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $value['nome'] ?></th>
                                                            <td><?php echo $value['curso'] ?></td>
                                                            <td>
                                                            <ul class="d-flex justify-content-center">
                                                                <li class="mr-3"><a data-toggle="modal" data-target="#<?php echo $value['cod_jogador'] ?>" class="text-secondary"><i style="cursor:pointer" class="fa fa-edit"></i></a></li>
                                                                <?php foreach($campeonato AS $value2): ?>
                                                                <li><a href="<?php echo site_url() . '/CadastraJogador/remove/' . $value['cod_jogador'] . '/' . $value2['cod_campeonato']; ?>" class="text-danger"><i style="cursor:pointer" class="ti-trash"></i></a></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade" id="<?php echo $value['cod_jogador'] ?>">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Atualizar jogador</h5>
                                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-group" method="POST" action="<?php echo site_url() . '/cadastraJogador/atualizar/' . $value['cod_jogador']; ?>">
                                                                            <label for="example-text-input" class="col-form-label">Nome</label>
                                                                            <input class="form-control" type="text" name="nome_jogador" value="<?php echo $value['nome'] ?>" id="nome_jogador">
                                                                            <label class="col-form-label">Curso</label>
                                                                                <select class="form-control" name="curso_jogador" id="curso_jogador">
                                                                                    <option><?php echo $value['curso'] ?></option>
                                                                                    <?php 
                                                                                        foreach($cursos AS $value):
                                                                                    ?>
                                                                                    <option><?php echo $value['curso'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
