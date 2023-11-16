<aside>
    <div class="top">
        <div class="logo">
            <img src="../assets/img/GMA.png" alt="">
            <h2>GMA-<span class="danger">SOFT</span></h2>
        </div>
        <div class="close" id="close-btn">
            <i class="fa fa-close"></i>
        </div>
    </div>

    <div class="sidebar close">
        <a href="index.php" class="<?php if($page=="dashboard"){
            echo "active";
        } ?>">
            <i class="fa fa-dashboard"></i>
            <h3>Tableau de bord</h3>
        </a>
        <a href="client.php" class="<?php if($page=="operation"){
            echo "active";
        } ?>">
            <i class="fa fa-tasks"></i>
            <h3>operations</h3>
        </a>
        <a href="client.php" class="<?php if($page=="operation" && $st=="1"){
            echo "active";
        } ?>">
            <i class="fa fa-tasks"></i>
            <h3>Clients</h3>
        </a>
        <a href="#" class="<?php if($page=="operation" && $st=="2"){
            echo "active";
        } ?>">
            <i class="fa fa-tasks"></i>
            <h3>Catégories</h3>
            <i class="fa fa-chevron-down"></i>
        </a>
        <a href="#" class="<?php if($page=="message"){
            echo "active";
        } ?>">
            <i class="fa fa-message"></i>
            <h3>Messages</h3>
            <span class="message-count">26</span>
        </a>
        <a href="#" class="<?php if($page=="parametre"){
            echo "active";
        } ?>">
            <i class="fa fa-wrench"></i>
            <h3>parametres</h3>
        </a>
        <a href="#" class="<?php if($page=="about"){
            echo "active";
        } ?>">
            <i class="fa fa-users"></i>
            <h3>a propos de nous</h3>
        </a>
        <a href="#" class="<?php if($page=="faq"){
            echo "active";
        } ?>">
            <i class="fa fa-question-circle"></i>
            <h3>FAQ</h3>
        </a><a href="../../controllers/Admin/logOutAction.php">
            <i class="fa fa-sign-out"></i>
            <h3>Déconnecter</h3>
        </a>
    </div>
</aside>
