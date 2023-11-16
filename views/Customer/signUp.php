<?php require('../../controllers/Customer/signUpAction.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>inscrivez-vous</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style_login.css">
    <link rel="stylesheet" href="../assets/icon/all.min.css">
    <link rel="stylesheet" href="../assets/icon/fontawesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<img class="wave" src="../assets/img/wave.png">
<div class="container">
    <div class="img">
        <img src="../assets/img/bg.svg" alt="">

    </div>
    <div class="login-content">
        <form method="POST" enctype="multipart/form-data">
            <div id="img" style="border-radius: 50%; overflow: hidden;"></div>

            <div class="input">
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-address-image"></i>
                    </div>
                    <div class="div">
                        <h5>Entrez une photo de profil</h5>
                        <input type="file" name="userProfile" class="input" onchange="getImagePreview(event)">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>votre nom</h5>
                        <input type="text" name="userName" class="input">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-contact-card"></i>
                    </div>
                    <div class="div">
                        <h5>votre code CNI</h5>
                        <input type="number" name="userCniCode" class="input">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>votre mot de passe</h5>
                        <input type="password" name="userPassword" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock-open"></i>
                    </div>
                    <div class="div">
                        <h5>Cofirmez le mot de passe</h5>
                        <input type="password" name="userPasswordReset" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="div">
                        <h5>votre Numéro de telephone</h5>
                        <input type="number" name="userPhoneNumber" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-male"></i>
                    </div>
                    <div class="div">
                        <h5>votre profession</h5>
                        <input type="text" name="userProfession" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="div">
                        <h5>Votre lieu d'activité</h5>
                        <input type="text" name="userPlaceActivity" class="input">
                    </div>
                </div>
                <div class="alert"><?php if(isset($errorMessage)){
                        echo $errorMessage; } ?></div>
                <input type="submit" name="validate" class="btn" value="inscription">
            </div>
        </form>
        <style>
            .container{
                width: 80%;
                overflow-y: scroll;

            }
        </style>
    </div>
</div>
<script type="text/javascript" src="../assets/js/main_login.js"></script>
<script>
    function getImagePreview(event){
        var image= URL.createObjectURL(event.target.files[0]);
        var imagediv= document.getElementById('img');
        var newimg= document.createElement('img');
        imagediv.innerHTML='';
        newimg.src= image;
        imagediv.appendChild(newimg);
    }

</script>
</body>
</html>

<!--<!doctype html>-->
<!--<html lang="fr">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Inscrivez-vous</title>-->
<!--    <style>-->
<!--        :root {-->
<!--            --primary-color: aqua;-->
<!--        }-->
<!--        *, ::before, ::after{-->
<!--            box-sizing: border-box;-->
<!--        }-->
<!--        body{-->
<!--            font-family: 'segeo UI', Tahoma, Geneva;-->
<!--            margin: 0;-->
<!--            display: grid;-->
<!--            place-items: center;-->
<!--            min-height: 100vh;-->
<!--        }-->
<!---->
<!--        input{-->
<!--            display: block;-->
<!--            width: 100%;-->
<!--            padding: 0.75rem;-->
<!--            border: 1px solid #ccc;-->
<!--            border-radius: 0.25rem;-->
<!---->
<!--        }-->
<!--        label{-->
<!--            display: block;-->
<!--            margin-bottom: 0.5rem;-->
<!--          }-->
<!--        }-->
<!--        .form{-->
<!--            width: clamp(320px, 30%, 430px);-->
<!--            margin: 0 auto;-->
<!--            border: 3px solid black;-->
<!--            border-radius: 0.35rem;-->
<!--            padding: 1.5rem;-->
<!--        }-->
<!--        .width-50{-->
<!--            width: 50%;-->
<!--        }-->
<!--        .ml-auto{-->
<!--            margin-left: auto;-->
<!--        }-->
<!---->
<!--        .input-group{-->
<!--            margin: 2rem 0;-->
<!--        }-->
<!--        .btn{-->
<!--            padding: 0.75rem;-->
<!--            display: block;-->
<!--            text-decoration: none;-->
<!--            background: var(--primary-color);-->
<!--            color: #f3f3f3;-->
<!--            text-align: center;-->
<!--            cursor: pointer;-->
<!--            border-radius: 0.25rem;-->
<!--        }-->
<!--        .btn:hover{-->
<!--            box-shadow: 0 0 0 2px #ffff, 0 0 0 3px var(--primary-color);-->
<!--        }-->
<!--        .text-center{-->
<!--            text-align: center;-->
<!--        }-->
<!--        .btns-group{-->
<!--            display: grid;-->
<!--            grid-template-columns: repeat(2, 1fr);-->
<!--            gap: 1.5rem;-->
<!--        }-->
<!--    </style>-->
<!--</head>-->
<!--<body>-->
<!--<form action="" class="form">-->
<!--    <h1 class="text-center">Formulaire d'inscription</h1>-->
<!--    <div class="form-step form-step-active">-->
<!--        <div class="input-group">-->
<!--            <label for="username">nom</label>-->
<!--            <input type="text" id="username">-->
<!--        </div>-->
<!--        <div class="input-group">-->
<!--            <label for="position">position</label>-->
<!--            <input type="text" id="position">-->
<!--        </div>-->
<!--        <div class="">-->
<!--            <a href="#" class="btn btn-next width-50 ml-auto">Next</a>-->
<!--        </div>-->
<!--        <div class="form-step form-step-active">-->
<!--            <div class="input-group">-->
<!--                <label for="phone">Telephone</label>-->
<!--                <input type="text" id="phone">-->
<!--            </div>-->
<!--            <div class="input-group">-->
<!--                <label for="email">Email</label>-->
<!--                <input type="text" id="email">-->
<!--            </div>-->
<!--            <div class="btns-group">-->
<!--                <a href="#" class="btn btn-prev">Previous</a>-->
<!--                <a href="#" class="btn btn-next">Next</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</form>-->
<!--</body>-->
<!--</html>-->