<?php
require('../../controllers/Admin/ShowAdminInformationAction.php');
require('../../controllers/Admin/addNewUserAction.php');
require('../../controllers/Admin/showAllUsersAction.php');
require('../../controllers/Admin/userInformationAction.php');
require('../../controllers/Admin/editCustomerAction.php');

$page= "operation";
$st= "1";
include ('head.php');
?>

<div class="container">
    <?php include('aside.php'); ?>

    <!-- --------------------FIN DU ASIDE----------------------------------- -->
    <main>
        <h1>GESTION DES CLIENTS</h1>

        <div class="date" id="hour">

        </div>


        <!-- ------------------------------------------------------------------------- -->
        <div class="recent-orders">
            <h2>Informations clients</h2><br><br>
            <img src="../assets/img/customer/<?=$user["profilepicture"] ?>"  style="width: 40%; height: 50%; border-radius: 50%;">
            <div>nom: <?=$user["name"] ?></div>
            <div>code CNI: <?=$user["cnicode"] ?></div>
            <div> Profession: <?=$user["profession"] ?></div>
            <div>Lieu d'activité: <?=$user["placeactivity"] ?></div>
            <div>Numéro de Telephone : <?=$user["phonenumber"] ?></div>
            <button><a href="#Modifierclient">modifier</a></button>
            <?php require('changeCustomerInfos.php')?>
            <h2>Recentes transactions client</h2>
            <table>
                <thead>
                <tr>
                    <th>identifiant</th>
                    <th>Profil</th>
                    <th>Nom</th>
                    <th>Profession</th>
                    <th>lieu d'activité</th>
                    <th>solde</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($each as $customer){ ?>
                    <tr>

                        <td><a href="customerInformation.php?id=<?=$customer['id_customer'];?>">CLT<?= $customer['id_customer']; ?></a></td>
                        <td><img src="../assets/img/customer/<?=$customer['profilepicture'];?>" style="border-radius: 50%;" height="30" width="10" alt=""></td>
                        <td class="warning"><?=$customer['name']; ?></td>
                        <td><?=$customer['profession']; ?></td>
                        <td><?=$customer['placeactivity']; ?></td>
                        <td class="primary"><?=$customer['solde']; ?></td>

                    </tr>
                <?php } ?>
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

        <div class="item add-product">
            <div>
                <i class="fa fa-plus-circle"></i><h3><a href="#Modifierclient">ajouter quelque chose</a></h3>
            </div>
        </div>
        <?php include('modalConnexion.php');?>

    </div>
</div>
</div>
<?php include ('foot.php'); ?>

