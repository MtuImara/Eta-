<?php
    session_start();
    $login= $_SESSION['login'];
    //$photo= $_SESSION['photo'];
    //$nom_demandeur= $_SESSION['nom_demandeur'];
?>
<?php
require_once 'connection.php';
require_once 'controler_User.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-light-icon.png">
    <title>Etat Civil Burundi</title>
    <!-- This page CSS -->
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 31 Page CSS -->
    <link href="dist/css/pages/dashboard3.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="horizontal-nav boxed skin-megna fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label"> Etat Civil Bdi </p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="accueil_Admin.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php //echo 'img/'.$data->photo   ?>" width=40 alt="user" class=""> <span class="hidden-md-down"> <?php echo $login; ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <!-- text-->
                                <a href="index.php" class="dropdown-item"><i class="fa fa-power-off"></i> Deconnexion</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <div id="add-contact1 <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    
                                                    <h4 class="modal-title" id="myModalLabel">Voulez-vous vraiment Modifier ?</h4> 
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <form class="form-horizontal form-material" method="POST">
                                                         <?php
                                                            $i=0;

                                                          foreach (afficherDataLoginUser() as $data) 
                                                          {
                                                            
                                                          $i++;

                                                        ?>
                                                            <div class="form-group">
                                                                <div class="col-md-12 m-b-20">
                                                                    <input type="text" class="form-control" placeholder="Matricule" name="matricule" value="<?php echo $data->matricule ?>"> </div>
                                                                <div class="col-md-12 m-b-20">
                                                                    <input type="text" class="form-control" placeholder="CNI" name="cni" value="<?php echo $data->num_cni ?>"> </div>
                                                                <div class="col-md-12 m-b-20">
                                                                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="login" value="<?php echo $data->login ?>"> </div>
                                                                <div class="col-md-12 m-b-20">
                                                                    <input type="text" class="form-control" placeholder="Mot de passe" name="password" value="<?php echo $data->password ?>"> </div>
                                                               <div class="col-md-12 m-b-20" >
                                                                    <select name="id_fonction" class="custom-select form-control required" id="wlocation2">
                                                        <?php
                                                          foreach (getFonctionUser() as $data1) 
                                                          {
                                                        ?>
                                                        <option value="<?php echo $data1->id_fonction ?>">
                                                            <?php echo $data1->nom_fonction ?>
                                                                
                                                        </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select> </div>
                                                                                <div class="col-md-12 m-b-20">
                                                                                    <select name="id_zone" class="custom-select form-control required" id="wlocation2">
                                                        <?php
                                                          foreach (getZoneUser() as $data2) 
                                                          {
                                                        ?>
                                                        <option value="<?php echo $data2->id_zone ?>">
                                                            <?php echo $data2->nom_zone.' - '.$data2->commune.' - '.$data2->province ?>
                                                                
                                                        </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select> 
                                                </div>
                                                                               
                                            </div>
                                                                        <button type="submit" class="btn btn-info waves-effect" name="modifier">Valider</button>
                                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                                        <?php } ?>
                                                                        </form>
                                                                </div>
                                                                
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap">--- PERSONAL</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-user"></i><span class="hide-menu"> Utilisateur <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="accueil_Admin.php?page=creer_utilisateur">Créer un Utilisateur </a></li>
                                <li><a href="accueil_Admin.php?page=modifier_Utilisateur">Modifier un Utilisateur</a></li>
                                <li><a href="accueil_Admin.php?page=supprimer_Utilisateur">Supprimer un Utilisateur</a></li>
                                <li><a href="accueil_Admin.php?page=afficher_Utilisateur">Visualiser les Utilisateurs</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Naissance</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Déclaration</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="accueil_Admin.php?page=Enregistrer_Declaration_Naissance">Enregistrer</a></li>
                                        <li><a href="accueil_Admin.php?page=modifier_Declaration_Naissance">Modifier</a></li>
                                        <li><a href="accueil_Admin.php?page=supprimer_Declaration_Naissance">Supprimer</a></li>
                                        <li><a href="accueil_Admin.php?page=afficher_Declaration_Naissance">Visualiser</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Naissance</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="accueil_Admin.php?page=Enregistrer_Naissance">Enregistrer</a></li>
                                        <li><a href="accueil_Admin.php?page=Modifier_Naissance">Modifier</a></li>
                                        <li><a href="accueil_Admin.php?page=afficher_Naissance">Visualiser</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>




                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Mariage</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Déclaration</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="accueil_Admin.php?page=enregistrer_Declaration_Mariage">Enregistrer</a></li>
                                        <li><a href="accueil_Admin.php?page=modifier_Declaration_Mariage">Modifier</a></li>
                                        <li><a href="accueil_Admin.php?page=supprimer_Declaration_Mariage">Supprimer</a></li>
                                        <li><a href="accueil_Admin.php?page=afficher_Declaration_Mariage">Visualiser</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Mariage</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="accueil_Admin.php?page=enregistrer_Mariage">Enregistrer</a></li>
                                        <li><a href="accueil_Admin.php?page=modifier_Mariage">Modifier</a></li>
                                        <li><a href="accueil_Admin.php?page=afficher_Mariage">Visualiser</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>



                        <li class="nav-small-cap">--- PERSONAL</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-user"></i><span class="hide-menu"> Divorse <span class="badge badge-pill badge-cyan ml-auto">4</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="accueil_Admin.php?page=enregistrer_Divorce">Enregistrer </a></li>
                                <li><a href="accueil_Admin.php?page=modifier_Divorce">Modifier</a></li>
                                <li><a href="accueil_Admin.php?page=afficher_Divorce">Visualiser</a></li>
                            </ul>
                        </li>



                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Decès</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Déclaration</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="accueil_Admin.php?page=enregistrer_Declaration_Deces">Enregistrer</a></li>
                                        <li><a href="accueil_Admin.php?page=modifier_Declaration_Deces">Modifier</a></li>
                                        <li><a href="accueil_Admin.php?page=supprimer_Declaration_Deces">Supprimer</a></li>
                                        <li><a href="accueil_Admin.php?page=afficher_Declaration_Deces">Visualiser</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Decès</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="accueil_Admin.php?page=enregistrer_Deces">Enregistrer</a></li>
                                        <li><a href="accueil_Admin.php?page=modifier_Deces">Modifier</a></li>
                                        <li><a href="accueil_Admin.php?page=afficher_Deces">Visualiser</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>



                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-note"></i><span class="hide-menu">CNI</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">Demande</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="accueil_Admin.php?page=enregistrer_Demande_CNI">Enregistrer</a></li>
                                        <li><a href="accueil_Admin.php?page=modifier_Demande_CNI">Modifier</a></li>
                                        <li><a href="accueil_Admin.php?page=supprimer_Demande_CNI">Supprimer</a></li>
                                        <li><a href="accueil_Admin.php?page=afficher_Demande_CNI">Visualiser</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><span class="hide-menu">CNI</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="accueil_Admin.php?page=enregistrer_CNI">Enregistrer</a></li>
                                        <li><a href="accueil_Admin.php?page=modifier_CNI">Modifier</a></li>
                                        <li><a href="accueil_Admin.php?page=afficher_CNI">Visualiser</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-align-left"></i><span class="hide-menu">Autres</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="accueil_Admin.php?page=Fonction">Fonction</a></li>
                                <li><a href="accueil_Admin.php?page=zone">Province - Commune - Zone</a></li>                                
                                <li><a href="accueil_Admin.php?page=adresse">Adresse</a></li>
                            </ul>
                        </li>
                        
                        
                        
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <?php

                $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

                include($page.'.php');

            ?>


        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2021 Etat Civil Burundi
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.js"></script>
    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Vector map JavaScript -->
    <!-- Chart JS -->
    <script src="dist/js/dashboard3.js"></script>
</body>

</html>