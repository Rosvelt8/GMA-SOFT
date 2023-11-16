<aside>
    <style>
        ::-webkit-scrollbar{
            width: 5px;
        }
        ::-webkit-scrollbar-thumb{
            background: var(--color-success);
            border-radius: var(--border-radius-3);
        }
        aside h3{
            font-weight: bold;
        }
    </style>
    <div class="top">
        <div class="logo">
            <img src="../assets/img/GMA.png" alt="">
            <h2>GMA-<span class="danger">SOFT</span></h2>
        </div>
        <div class="close" id="close-btn">
            <i class="fa fa-close"></i>
        </div>
    </div>

    <div class="sidebar">
        <a href="index.php">
            <i class="fa fa-dashboard" class="active"></i>
            <h3>Tableau de bord</h3>
        </a>
        <a href="categoriePage.php" class="">
            <i class="fa fa-user"></i>
            <h3>Mes comptes</h3>
        </a>
        <a href="chatpage.php">
            <i class="fa fa-message"></i>
            <h3>Messages</h3>
            <span class="message-count">26</span>
        </a>
        <a href="#">
            <i class="fa fa-wrench"></i>
            <h3>parametres</h3>
        </a>
        <a href="#">
            <i class="fa fa-users"></i>
            <h3>a propos de nous</h3>
        </a>
        <a href="#">
            <i class="fa fa-question-circle"></i>
            <h3>FAQ</h3>
        </a><a href="../../controllers/Customer/logOutAction.php">
            <i class="fa fa-sign-out"></i>
            <h3>Déconnecter</h3>
        </a>
    </div>
</aside>
