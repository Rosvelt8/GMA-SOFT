<?php
require('../../controllers/Admin/ShowAdminInformationAction.php');
require('../../controllers/Admin/addNewUserAction.php');
include ('head.php');
?>

    <div class="container">
       <?php include('aside.php'); ?>

        <!-- --------------------FIN DU ASIDE----------------------------------- -->
        <main>
            <h1>Tableau de bord</h1>

            <div class="date" id="hour">

            </div>

            <div class="insights">
                <div class="sales">
                    <i class="fa fa-bar-chart"></i>
                    <div class="middle">
                        <div class="left">
                            <h3>Chiffre d'affaire</h3>
                            <h1>250</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- """""""""""""""""""""""""""""""""""""""""""""""""""""" -->

                <div class="expenses">
                    <i class="fa fa-bar-chart"></i>
                    <div class="middle">
                        <div class="left">
                            <h3>nombre de client</h3>
                            <h1>0</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- '''''''''''''''''''''''''''''''''''''''''''''''''''''''''' -->

                <div class="income">
                    <i class="fa fa-bar-chart"></i>
                    <div class="middle">
                        <div class="left">
                            <h3>Depot Total</h3>
                            <h1>0</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>0</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ---------------------------------------------------------- -->
            </div>
            <!-- ------------------------------------------------------------------------- -->
            <div class="recent-orders">
                <h2>transactions recentes</h2>
<!--                <form action="">-->
<!--                    <label for="categorie">Categorie</label>-->
<!--                        <select id="categorie" name="filtre" id="">-->
<!--                            <option value="">bonjour</option>-->
<!--                            <option value="">bonjour</option>-->
<!--                            <option value="">bonjour</option>-->
<!--                        </select>-->
<!---->
<!--                </form>-->
                <table>
                    <thead>
                        <tr>
                            <th>identifiant</th>
                            <th>Categorie du compte</th>
                            <th>type de transaction</th>
                            <th>Montant</th>
                            <th>date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CLT01</td>
                            <td>epargne</td>
                            <td class="warning">dépot</td>
                            <td>12000</td>
                            <td>12/10/2022</td>

                        </tr>

                    </tbody>
                </table>
                <a href="">Voir Plus</a>
            </div>
        </main>
        <!-- *******************************FIN DU MAIN ************************************* -->
        <?php include('profile_box.php'); ?>

            <!-- *****************************FIN DU TOP************************************** -->

        <?php include('recentMessageBox.php'); ?>
            <!-- ***************************FIN MODIFICATIONS RECENTES*********************************************** -->
            
            <div class="sales-analytics">
                <h2>Operations en cours</h2>


                <div class="item add-product">
                    <div>
                        <i class="fa fa-plus-circle"></i><h3><a href="#AjouterClient">ajouter quelque chose</a></h3>
                    </div>
                </div>
                <?php include('modalConnexion.php');?>

            </div>
        </div>
    </div>
<?php include ('foot.php'); ?>