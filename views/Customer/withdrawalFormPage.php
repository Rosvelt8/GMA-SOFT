<?php
require('../../controllers/Customer/showInformationAction.php');
require('../../controllers/Customer/showCustomerCategorieAction.php');
require('../../controllers/Customer/newWithdrawAction.php');





include('head.php'); ?>
    <link rel="stylesheet" href="../assets/css/style_dash.css">
    <title>Formulaire de Retrait</title>
  </head>
  <style>
      

*,
*::before,
*::after {
  box-sizing: border-box;
}
.statut1{
    height: 6rem;
    background-image: url('../assets/img/mtnmoney.jpeg');
    background-size: contain;
    overflow: hidden;
}
.statut2{
    background-image: url('../assets/img/orangemoney.png');
    background-size: contain;
}
body {
  margin: 0;
  display: grid;
  place-items: center;
  min-height: 100vh;
}
/* Global Stylings */
.input-group label {
   position: relative;
    background-color: var(--color-background);
   

    top: 1rem;
    padding: 0 0.5rem;
    color: white;
    cursor: text;
    transition: top 200ms ease-in, left 200ms ease-in, font-size 200ms ease-in;
    
}

input{
color: var(--color-dark);
  width: 100%;
  background: none;
  padding: 0.75rem;
  border: 1px solid #ccc;
  border-radius: var(--border-radius-1);
}
input:focus{
    border-color: var(--color-danger);
 
}

select{
  width: 100%;
  padding: 0.75rem;
  background: none;
  color: var(--color-danger);
  border: 1px solid #ccc;
  border-radius: var(--border-radius-1);
  appearance:initial;
}
option{
    display: block;
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ccc;
  border-radius: var(--border-radius-1);
}


.width-50 {
  width: 50%;
}

.ml-auto {
  margin-left: auto;
}

.text-center {
  text-align: center;
}

/* Progressbar */
.progressbar {
  position: relative;
  display: flex;
  justify-content: space-between;
  counter-reset: step;
  margin: 2rem 0 4rem;
}

.progressbar::before,
.progress {
  content: "";
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  height: 4px;
  width: 100%;
  background-color: var(--color-danger);
  z-index: -1;
}

.progress {
  background-color: var(--color-danger);
  width: 0%;
  transition: 0.3s;
}

.progress-step {
  width: 2.1875rem;
  height: 2.1875rem;
  background-color: var(--color-danger);
  border-radius: 50%;
  display: flex;
  font-weight: 600;
  justify-content: center;
  align-items: center;
}

.progress-step::before {
  counter-increment: step;
  content: counter(step);
}

.progress-step::after {
  content: attr(data-title);
  position: absolute;
  top: calc(100% + 0.5rem);
  font-size: 0.85rem;
  color: #666;
}

.progress-step-active {
  background-color: var(--color-dark);
  color: black;
}

/* Form */
.form {
  width: clamp(320px, 30%, 430px);
  margin: 0 auto;
  border: 1px solid #ccc;
  border-radius: var(--border-radius-2);
  box-shadow: var(--box-shadow);
  padding: 1.5rem;
}

.form-step {
  display: none;
  transform-origin: top;
  animation: animate 0.5s;
}

.form-step-active {
  display: block;
}

.input-group {
  margin: 2rem 0;
}

@keyframes animate {
  from {
    transform: scale(1, 0);
    opacity: 0;
  }
  to {
    transform: scale(1, 1);
    opacity: 1;
  }
}

/* Button */
.btns-group {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1.5rem;
}

.btn {
  padding: 0.75rem;
  display: block;
  text-decoration: none;
  background-color: var(--color-danger);
  text-align: center;
  font-weight: bolder;
  border-radius: var(--border-radius-1);
  cursor: pointer;
  transition: 0.3s;
}
.statut{
	display: flex;
	height: 100%;
	width: 100%;
	gap: 3px;
}
input[type="radio"]{
	-webkit-appearance: none;
}
.btn:hover {
  box-shadow: 0 0 0 2px #fff, 0 0 0 3px var(--color-danger);
}
.errorOperation{
    height: 50px;
    padding: 7px;
    width: 70%;
    justify-content: center;
    align-items: center;
    align-content: center;
    background: var(--color-danger);
    margin: 0;
}
.errorOperation span{
    position: relative;
    left: 98%;
    bottom: 100%;
    font-size: 1.5rem;
    cursor: pointer;
}
.errorOperation .content{
    text-align: center;
    font-size: medium;
}
  </style>
  <body>
  <?php if(isset($errorMessage)){ ?>
      <div class="errorOperation">
        <div class="content">
            ERREUR : entrez un montant supérieur à
        </div>
        <span>&times;</span>
     </div>
<?php } ?>
    <form action="#" method="POST" class="form">
      <h1 class="text-center">Formulaire de retrait</h1>
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>

        <div
          class="progress-step progress-step-active"
          data-title="Montant"
        ></div>
        <div class="progress-step" data-title="Mode de retrait"></div>
        <div class="progress-step" data-title="confirmation"></div>
   
      </div>

      <!-- Steps -->
      <div class="form-step form-step-active">
        <div class="input-group">
          <label for="username">nom categorie</label>
          <select name="operationCategorie" id="">
              <option value="epargne">Epargne</option>
              <option value="alimentaire">Alimentaire</option>
              <option value="assurance">Assurance</option>
          </select>
        </div>
        <div class="input-group">
          <label for="amount">montant retrait</label>
          <input type="number" name="amountOperation" id="amount" autocomplete="off" />
        </div>
        <div class="">
          <a href="#" class="btn btn-next width-50 ml-auto">suivant</a>
        </div>
      </div>
      <div class="form-step">
        <div class="statut">
            <input type="radio" class="statut1" name="paymentMode" value="admin" id="admin">
            <input type="radio" name="paymentMode" class="statut2" value="client" id="customer">
        </div>
        <div class="input-group">
          <label for="phonenumber">Numéro de tèléphone</label>
          <input type="number" name="phoneNumber" id="phonenumber" autocomplete="off" />
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Precedent</a>
          <a href="#" class="btn btn-next">Suivant</a>
        </div>
      </div>
      
      <div class="form-step">
        <div class="input-group">
          <label for="password">Entrez votre mot de passe pour confirmer</label>
          <input type="password" name="userPassword" id="password" autocomplete="off" />
        </div>
        <div class="input-group">
          
        </div>
        <div class="btns-group">
          <a href="#" class="btn btn-prev">Précedent</a>
          <input type="submit" name="validator" value="Deposer" class="btn" />
        </div>
      </div>
    </form>
    <script>
        const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
    </script>
<?php

include('foot.php'); ?>