<?php
require('../../controllers/Customer/showInformationAction.php');
include('head.php'); ?>
<link rel="stylesheet" href="../assets/css/style_dash.css">
</head>
<body>
<div class="container">
    <?php include('aside.php'); ?>

    <!-- --------------------FIN DU ASIDE----------------------------------- -->
    <main>
        <h1>Espace client</h1>

        <div class="date" id="hour">

        </div>
        <!-- ------------------------------------------------------------------------- -->
        <div class="recent-orders">
            <div id="app">
                <div class="message-group-received">
                    <div>
                        <img src="../assets/img/landing1.jpg" alt="">
                    </div>
                    <div>
                        <div class="message-received">
                            <div class="message-received-text">
                                Bonjour gars comment tu vas?
                            </div>
                        </div>
                        <div class="message-received">
                            <div class="message-received-text">
                                Bonjour gars comment tu vas?
                            </div>
                        </div>
                        <div class="message-received">
                            <div class="message-received-text">
                                Bonjour gars comment tu vas?
                            </div>
                        </div>
                    </div>
                </div>
                <div class="message-group-sent">
                    <!-- <div>
                        <img src="../assets/img/landing1.jpg" alt="">
                    </div> -->
                    <div>
                        <div class="message-sent">
                            <div class="message-sent-text">
                                Bonjour gars comment tu vas?
                            </div>
                            <div class="message-statut">&#128526;</div>
                        </div>
                        <div class="message-sent">
                            <div class="message-sent-text">
                                Bonjour gars comment tu vas?
                            </div>
                            <div class="message-statut">&#128526;</div>
                        </div>
                        <div class="message-sent">
                            <div class="message-sent-text">
                                Bonjour gars comment tu vas?
                            </div>
                            <div class="message-sent-statut">&#128526;</div>
                        </div>
                    </div>
                </div>
                <div class="box-sender">
                    <form action="" method="post">
                        <input type="text" name="messageContent">
                        <button type="submit"><i class=" fa fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <style>
        .box-sender{
            width: 100%;
            display: flex;
        }
        form{
            width: 100%;
            position relative;

        }
        input{
            width: 90%;
            height: 2rem;
            padding: 8px;
            color: var(--color-dark-variant);
            font-weight: bold;
            font-size: 1rem;
        }
        form button{
            width: 8%;
            height: 2rem;
            text-align: center;

        }
        .box-sender >form >button{
            background: var(--color-danger);
            color: var(--color-light);
        }
    #app{

        margin: 0 auto;
        border-radius: var(--border-radius-1);
        box-shadow: var(--box-shadow);
        border: 3px white;
        background-image: url("../assets/img/chatWall.jpg");
        height: auto;
        vertical-align: bottom;
        overflow-y: scroll;
    }
    .message-group-received{
    display: flex;
    width: 100%;
    margin-bottom: 20px;
    }
    .message-group-received > div:first-child{
    margin-top: auto;
    margin-right: 5px;
    }
    .message-group-received > div:last-child{
    flex-grow: 1;
    }
    .message-group-received > div:first-child >img{
    border-radius: 50%;
    height: 25px;
    width: 25px;
    }
    .message-received{
    max-width: 75%;
        padding: 4px 4px 2px 2px;
    margin: 2px 0;
    display: flex;
    }
    .message-received:first-child > .message-received-text{
    border-top-left-radius: 20%;
    }
    .message-received:last-child > .message-received-text{
    border-bottom-left-radius: 20%;
    }
    .message-received-text{
    padding: 19px;
        line-height: 3px;
    min-height: 20px;
    background-color: #373737;
    border-radius: 4px 20px 20px 4px;
    }
    .message-group-sent{
    width: 100%;
    margin-bottom: 20px;
    text-align: right;
    }
    .message-sent{
    max-width: 75%;
    display: flex;
    margin: 2px 0 2px auto;
    }
    .message-sent-text{
    padding: 10px;
    min-height: 20px;
    background-color: #aa3535;
    border-radius: 4px 20px 20px 4px;
    margin-left: auto;
    min-height: 20px;
    }
    .message-sent:first-child > .message-sent-text{
    border-top-right-radius: 20%;
    }
    .message-sent:last-child > .message-sent-text{
    border-bottom-right-radius: 20%;
    }
    .message-sent-statut{
    width: 25px;
    display: flex;
    margin-left: 5px;
    font-size: 15px;
    }

    </style>
    <!-- *******************************FIN DU MAIN ************************************* -->
    <?php include('profile_box.php'); ?>
    <!-- *****************************FIN DU TOP************************************** -->


    <div class="sales-analytics">

        <div class="item add-product">
            <div>
                <i class="fa fa-plus-circle"></i>
                <h3>Effectuer un dépot</h3>
            </div>
        </div>
    </div>
</div>
<?php include ('foot.php'); ?>
