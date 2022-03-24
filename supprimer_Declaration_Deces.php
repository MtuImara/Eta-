<?php
require_once 'connection.php';
require_once 'controler_deces.php';
?>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
               
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="app-search d-none d-md-block d-lg-block" action="accueil_Admin.php?page=supprimer_Declaration_Deces" method="POST">
                                            <h3 class="box-title m-b-0">Suppression d'une Déclaration de Décès</h3>
                                            <input type="text" class="form-control" placeholder="Entrer  CNI du Défunt..." name="recherche">
                                            <button type="submit" class="btn btn-info waves-effect" name="validerR">Rechercher</button> 
                                        
                                    
                            </form>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <tr>
                                                <th>Nom et Prénom du Défunt</th>
                                                
                                                <th>CNI du Défunt</th>
                                                <th>Date de Décès</th>
                                                <th>Zone </th>
                                                <th>Nom et Prénom du premier déclarant</th>
                                                <th>Nom et Prénom du deuxième déclarant</th>

                                                <th class="text-nowrap" style="width: 2%; height:6px;">Action</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                    $fonction = afficherDeclarationDeces();
                                                            if (isset($_POST['validerR'])) 
                                                            {
                                                                if (!empty($_POST['recherche'])) 
                                                                {
                                                                    $id = $_POST['recherche'];
                                                                    $fonction = rechercheDeclaDeces($id);
                                                                }
                                                            }
                                                                $i=0;
                                                              foreach ($fonction as $data) 
                                                              {
                                                                $i++;
                                                ?>
                                            <tr>
                                                <td><?php echo $data->nom_demandeur.'    '.$data->prenom_demandeur ?></td>
                                                
                                                <td><?php echo $data->cni_defunt ?></td>
                                                <td><?php echo $data->date_deces  ?></td>
                                                <td><?php echo $data->nom_zone.' - '.$data->commune.' - '.$data->province ?></td>
                                                <td>
                                                    <?php
                                                    foreach(afficherDeclarationDecesDeclarant1($data->cni_declarant1) as $data1) 
                                                    {
                                                        echo $data1->nom_demandeur.'    '.$data1->prenom_demandeur.'  - '.$data->cni_declarant1;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach (afficherDeclarationDecesDeclarant2($data->cni_declarant2) as $data2) 
                                                    {
                                                        echo $data2->nom_demandeur.'    '.$data2->prenom_demandeur.'  - '.$data->cni_declarant2;
                                                    }
                                                    ?>
                                                        
                                                </td>
                                                <td>



                                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="modal" data-target="#add-contact <?=$i?>" > <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Supprimer"> <i class="ti-trash"></i> </a> </button>



                                                </td>




                                                <div id="add-contact <?=$i?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                
                                                                <h4 class="modal-title" id="myModalLabel">Voulez-vous vraiment supprimer?</h4> 
                                                            </div>
                                                            
                                                            <div class="modal-body">
                                                                <form class="form-horizontal form-material" action="" method="POST">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12 m-b-20">
                                                                            <input type="text" class="form-control" hidden="true" value="<?php echo $data->id_declaration_deces ?>" name="id_declaration_deces"> 
                                                                        </div>
                                                                        
                                                                        
                                                                        
                                                                    

                                                                        <div class="modal-footer">
                                                                            <button type="submit"  class="btn btn-danger waves-effect" name="supprimer">Supprimer</button>
                                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>







                                            </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        
                        
                        
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme working">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

<?php
    //suppression
    if (isset($_POST['supprimer'])) 
    {
        if (supprimerDeclarationDeces($_POST['id_declaration_deces']) > 0) 
        {
            echo "bien";
        }
        else echo "non";

    }

?>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>