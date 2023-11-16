<div class="modal" id="Modifierclient">
    <div class="modal_content">
        <h1>FORMULAIRE DE MODIFICATION DU CLIENT</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div id="preview" style="background-image: url('../assets/img/customer/<?= $user['profilepicture'] ?>');"></div>
            <div class="input-files"><input type="file" class="upload-box" id="upload_file" onchange="getImagePreview(event)" name="userProfilePhoto"></div>
            <div><input type="number" value="<?= $user['cnicode'] ?>" name="usercniCode"></div>
            <div><input type="text" value="<?= $user['name'] ?>" name="userName"></div>
            <div><input type="password" value="<?= $user['password'] ?>" name="userPassword"></div>
            <div><input type="number" value="<?= $user['phonenumber'] ?>" name="userPhoneNumber"></div>
            <div><input type="text" value="<?= $user['profession'] ?>" name="userProfession"></div>
            <div><input type="text" value="<?= $user['placeactivity'] ?>" name="userPlaceActivity"></div>

            <input type="submit" name="modify" value="Modifier">
        </form>
        <script>
            function getImagePreview(event){
                var image= URL.createObjectURL(event.target.files[0]);
                var imagediv= document.getElementById('preview');
                var newimg= document.createElement('img');
                imagediv.innerHTML='';
                newimg.src= image;
                imagediv.appendChild(newimg);
            }

        </script>
        <a href="#" class="modal_close">&times;</a>
    </div>
</div>
<style>
    .sub-item{
        display: none;
        opacity: 1;
    }

    .upload-box{
        font-size: 16px;
        width: 180px;
        background: var(--color-background);
        border-radius: var(--border-radius-3);
        box-shadow: var(--box-shadow);
        outline: none;
    }
    ::-webkit-file-upload-button{
        color: var(--color-dark);
        background: var(--color-primary);
        padding: 3px;
        border: none;
        -moz-border-radius-bottomright: 50%;
        box-shadow: var(--box-shadow);
        outline: none;
    }
    ::-webkit-file-upload-button:hover{
        background: var(--color-background);
    }
    #preview{
        border-radius: 50%;
        height: 25%;
        width: 25%;
        background: #000;
        margin: 0 auto;
    }
    #preview img{
        border-radius: 50%;
        height: border-box;
        width: border-box;

    }

    .modal{
        visibility: hidden;
        opacity: 1;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        background: hsla(160, 82%, 2%, 0.616);
        left: 0;
        display: flex;
        transition: all 3s ease;
        align-items: center;
        justify-content: center;

        transition: all .4s;
    }
    .modal:target{
        visibility: visible;
        opacity: 1;
    }
    .modal:target body{
        opacity: 0.4;
    }
    .modal_content{
        border-radius: var(--border-radius-2);
        position: relative;
        display: grid;
        grid-gap: 2rem;
        width: 500px;
        height: 100%;
        max-width: 98%;
        background: var(--color-background);
        padding: 1.5rem 2rem;
        box-shadow: var(--box-shadow);
    }
    .modal_content div input{
        height: 3rem;
        width: 90%;
        margin-bottom: 8px;
    }
    .modal_close{
        position: absolute;
        top: 10px;
        font-size: 10px;
        right: 10px;
        background: var(--color-danger);
        padding: 20px;
        border-radius: var(--border-radius-3);
        color: white;
        text-decoration: none;

    }
</style>