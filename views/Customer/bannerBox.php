<div class="insights">
    <div class="sales">
        <i class="fa fa-bar-chart"></i>
        <div class="middle">
            <div class="left">
                <h3>dépôt total</h3>
                <h1><?= $categorieEpargneSumDepositInformation['sommeDepot']+$categorieAlimentaireSumDepositInformation['sommeDepot']+$categorieAssuranceSumDepositInformation['sommeDepot'] ?></h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">

                </div>
            </div>
        </div>
    </div>
    <!-- """""""""""""""""""""""""""""""""""""""""""""""""""""" -->

    <div class="expenses">
        <i class="fa fa-bar-chart"></i>
        <div class="middle">
            <div class="left">
                <h3>solde du compte</h3>
                <h1><?= $getInformation['solde'] ?></h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">

                </div>
            </div>
        </div>
    </div>

    <!-- '''''''''''''''''''''''''''''''''''''''''''''''''''''''''' -->

    <div class="income">
        <i class="fa fa-bar-chart"></i>
        <div class="middle">
            <div class="left">
                <h3>retrait total</h3>
                <h1><?= $categorieEpargneSumWithdrawalInformation['sommeRetrait']+$categorieAlimentaireSumWithdrawalInformation['sommeRetrait']+$categorieAssuranceSumWithdrawalInformation['sommeRetrait'] ?></h1>
            </div>
            <div class="progress">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="number">

                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------- -->
</div>
