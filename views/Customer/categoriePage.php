
<?php
require('../../controllers/Customer/showInformationAction.php');
require('../../controllers/Customer/showCustomerCategorieAction.php');
include('head.php'); ?>
<link rel="stylesheet" href="../assets/css/style_dash.css">
</head>
<body>
<div class="container">
    <?php include('aside.php'); ?>

    <!-- --------------------FIN DU ASIDE----------------------------------- -->
    <main>
        <h1>Vos catégories</h1>

        <div class="date" id="hour">

        </div>

        <!-- ------------------------------------------------------------------------- -->
        <div class="recent-orders">
            <div class="card-group">
            <div class="card">
<!--                *****************************************-->
                <div class="card-image" style="background: url('../assets/img/eparne.jpg'); background-size: contain;"></div>
                <div class="card-text">
                    <h2>Compte epargne</h2>
                    <br>
                    <p></p>
                </div>
                <div class="card-stats">
                    <div class="stat">
                        <div class="value"><?= $categorieEpargneInformation['soldeCategorie'] ?><sup>fcfa</sup></div>
                        <div class="type">solde</div>
                    </div>
                    <div class="stat border">
                        <div class="value"><?php if(isset($categorieEpargneSumWithdrawalInformation['sommeRetrait'])){
                                echo $categorieEpargneSumWithdrawalInformation['sommeRetrait'];
                            }else{
                                echo 0;
                            } ?></div>
                        <div class="type">Retrait total</div>
                    </div>
                    <div class="stat">
                        <div class="value"><?php if(isset($categorieEpargneSumDepositInformation['sommeDepot'])){
                                echo $categorieEpargneSumDepositInformation['sommeDepot'];
                            }else{
                                echo 0;
                            } ?></div>
                        <div class="type">depot total</div>
                    </div>
                </div>

            </div>

            <div class="card">
                <!--                *****************************************-->
                <div class="card-image" style="background: url('../assets/img/assurance-commerciale-1.jpg'); background-size: contain;"></div>
                <div class="card-text">
                    <h2>Compte assurance</h2>
                    <br>
                    <p></p>
                </div>
                <div class="card-stats">
                    <div class="stat">
                        <div class="value"><?= $categorieAssuranceInformation['soldeCategorie'] ?><sup>fcfa</sup></div>
                        <div class="type">solde</div>
                    </div>
                    <div class="stat border">
                        <div class="value"><?php if(isset($categorieAssuranceSumWithdrawalInformation['sommeRetrait'])){
                                echo $categorieAssuranceSumWithdrawalInformation['sommeRetrait'];
                            }else{
                                echo 0;
                            } ?></div>
                        <div class="type">retrait total</div>
                    </div>
                    <div class="stat">
                        <div class="value"><?php if(isset($categorieAssuranceSumDepositInformation['sommeDepot'])){
                                echo $categorieAssuranceSumDepositInformation['sommeDepot'];
                            }else{
                                echo 0;
                            } ?></div>
                        <div class="type">depot total</div>
                    </div>
                </div>

            </div>

            <div class="card">
                <!-- *****************************************-->
                <div class="card-image" style="background: url('../assets/img/landing2.jpg'); background-size: contain;"></div>
                <div class="card-text">
                    <h2>Compte alimentaire</h2>
                    <br>
                    <p></p>
                </div>
                <div class="card-stats">
                    <div class="stat">
                        <div class="value"><?= $categorieAlimentaireInformation['soldeCategorie'] ?><sup>fcfa</sup></div>
                        <div class="type">solde</div>
                    </div>
                    <div class="stat border">
                        <div class="value"><?php if(isset($categorieAlimentaireSumWithdrawalInformation['sommeRetrait'])){
                            echo $categorieAlimentaireSumWithdrawalInformation['sommeRetrait'];
                            }else{
                            echo 0;
                            } ?></div>
                        <div class="type">Retrait total</div>
                    </div>
                    <div class="stat">
                        <div class="value"><?php if(isset($categorieAlimentaireSumDepositInformation['sommeDepot'])){
                            echo $categorieAlimentaireSumDepositInformation['sommeDepot'];
                            }else{
                            echo 0;
                            } ?></div>
                        <div class="type">depot total</div>
                    </div>
                </div>

            </div>
            </div>
            <style>
                .card-group{
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr;
                    grid-gap: 19rem;
                }
                .right{
                    height: auto;
                    z-index: -1;
                }
                .recent-orders >.card-group> .card {
                    display: grid;
                    padding: 0;
                    height: 0;
                    width: 0;
                    grid-template-columns: 250px;
                    grid-template-rows: 210px 100px 80px;
                    grid-template-areas: "image" "text" "stats";

                    border-radius: 18px;
                    box-shadow: 5px 5px 15px var(--color-dark);
                    text-align: center;
                    transition: 0.5s ease;
                    cursor: pointer;
                }
                .recent-orders > .card-group>.card >.card-image {
                    grid-area: image;
                }
                .recent-orders> .card-group> .card >.card-text {
                    grid-area: text;
                }
                .recent-orders> .card-group> .card >.card-stats {
                    grid-area: stats;
                }
                .recent-orders>.card-group> .card >.card-image {
                    grid-area: image;
                    border-top-left-radius: 15px;
                    border-top-right-radius: 15px;
                    background-size: cover;
                }
                .card-text {
                    grid-area: text;
                    margin: 25px;
                    padding-bottom: 20px;
                }
                .card-text p {
                    color: var(--color-light);
                    font-size:15px;
                    font-weight: 300;
                }
                .card-text h2 {

                    font-size:28px;
                }
                .card-stats {
                    grid-area: stats;
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr;
                    grid-template-rows: 1fr;

                    border-bottom-left-radius: 15px;
                    border-bottom-right-radius: 15px;
                    background: var(--color-primary);
                }
                .card-stats .stat {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;

                    color: white;
                    padding:10px;
                }
                .card:hover {
                    transform: scale(1.15);
                    box-shadow: 5px 5px 15px rgba(0,0,0,0.6);
                }
                .card:hover .card-stats{
                    background: var(--color-danger);
                }

                main{
                    width: 94% !important;
                    margin: 2rem 0 0 8.8rem;
                }

            </style>

        </div>
    </main>
    <!-- *******************************FIN DU MAIN ************************************* -->
    <?php include('profile_box.php') ?>

        <!-- *****************************FIN DU TOP************************************** -->
    </div>

<?php include ('foot.php'); ?>