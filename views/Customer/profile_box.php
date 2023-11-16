<div class="right">
    <div class="top">
        <button class="top-button" id="menu-btn">
            <i class="fa fa-navicon"></i>
        </button>
        <div class="theme-toggler">
            <i class="fas fa-sun active"></i>
            <i class="fas fa-moon"></i>
        </div>
        <div class="profile">
            <div class="info">
                <p>Salut <b><?php if($_SESSION['auth']){ echo $getInformation['name'];} ?></b></p>
                <span class="text-muted">Client</span>
            </div>
            <div class="profile-photo">
                <img src="../assets/img/customer/<?= $getInformation['profilepicture'] ?>" alt="">
            </div>
        </div>
    </div>