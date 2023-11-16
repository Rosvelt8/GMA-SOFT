<?php
require('../../controllers/Customer/showInformationAction.php');
require('../../controllers/Customer/showCustomerCategorieAction.php');
require('../../controllers/Customer/showRecentsTransactionAction.php');
include('head.php'); ?>
    <link rel="stylesheet" href="../assets/css/style_dash.css">
</head>
<body>
    <div class="container">
       <?php include('aside.php'); ?>

        <!-- --------------------FIN DU ASIDE----------------------------------- -->
        <main>
            <h1>Tableau de bord</h1>

            <div class="date" id="hour">

            </div>

            <?php include('bannerBox.php'); ?>
            <!-- ------------------------------------------------------------------------- -->
            <div class="recent-orders">
                <h2>transactions recentes</h2><br>
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
                    <?php foreach($getDepositTransactions as $DepositTransaction){ ?>
                        <tr>
                            <td>CLT0<?= $getInformation['id_customer'] ?></td>
                            <td><?= $DepositTransaction['nomCategorie'] ?></td>
                            <td class="warning">dépot</td>
                            <td><?= $DepositTransaction['montant'] ?></td>
                            <td><?= $DepositTransaction['dateDepot'] ?></td>
                        </tr>
                    <?php } ?>
                    <?php foreach($getWithdrawalTransactions as $WithdrawalTransaction){ ?>

                        <tr>
                            <td>CLT0<?= $getInformation['id_customer'] ?></td>
                            <td><?= $WithdrawalTransaction['nomCategorie'] ?></td>
                            <td class="primary">retrait</td>
                            <td><?= $WithdrawalTransaction['montant'] ?></td>
                            <td><?= $WithdrawalTransaction['dateRetrait'] ?></td>
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

            <div class="recent-updates">
                <h2>Messages récents</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="../assets/img/landing1.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>GMA HELPER</b> Merci de toujours nous faire confiance. vous ne serez pas déçu</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***************************FIN MODIFICATIONS RECENTES*********************************************** -->
            
            <div class="sales-analytics">

                <div class="item add-product">
                    <a href="depositForm.php">
                        <div>
                            <i class="fa fa-plus-circle"></i>
                            <h3>Effectuer un dépot</h3>
                        </div>
                    </a>
                </div> <div class="item add-product" style="border-color: var(--color-danger);">
                    <a href="withdrawalFormPage.php">
                        <div>
                            <i class="fa fa-plus-circle"></i>
                            <h3>Effectuer un retrait</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
<?php include ('foot.php'); ?>