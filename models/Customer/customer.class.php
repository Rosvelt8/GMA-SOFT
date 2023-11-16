<?php


class Customer{
    private $id_account;
    private $office;
    private $name;
    private $password;
    private $solde;
    private $cni_code;
    private $delivery_date;
    private $activity;
    private $place_activity;
    private $phone_number;
    private $collector_name;
    private $collector_phone;
    public $bdd;
    public $errorMessage;


    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @param mixed $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }

//    ***********************Connecter un nouvel utilisateur a la base de donnée *****************************************

    public function Connection($name, $password){
//    -----------------recuperation de l'instance de PDO------------------------------------------------
        global $bdd;
        global $errorMessage;

//        ------------requete de verification du client dans la base de donnée----------------------------
        $verifyConnection = $bdd -> prepare('SELECT * FROM customer WHERE name= ?');
        $verifyConnection -> execute(array($name));
        if($verifyConnection->rowCount()>0){
            $userConnected= $verifyConnection->fetch();
            if(password_verify($password,$userConnected['password'])){
//        ----------------attribution des données du client aux variables SESSION[]-----------------------------
                session_start();
                $_SESSION['id']=$userConnected['id_customer'];
                $_SESSION['nom']=$userConnected['name'];
                $_SESSION['statut']= $userConnected['statut'];
                $_SESSION['solde']=$userConnected['solde'];
                $_SESSION['cniCode']=$userConnected['cnicode'];
                $_SESSION['activity']=$userConnected['activity'];
                $_SESSION['placeActivity']=$userConnected['placeactivity'];
                $_SESSION['startdate']=$userConnected['startdate'];
                $_SESSION['motdepasse']=$userConnected['password'];
                $_SESSION['auth']= true;
                return true;
            }
            else{
// ------------------------------Mot de passe incorrect---------------------------------------------------------

                $_SESSION['auth']=false;
                $errorMessage= "nom et mot de passe incorrect";
                $this->errorMessage=$errorMessage;
                return false;
            }
        }else {
//  ------------------------Compte inexistant----------------------------------------------------------------
            $_SESSION['auth']= false;
            $errorMessage= "vous n'avez pas de compte créez en un";
            $this->errorMessage=$errorMessage;
            return false;
        }

    }
    

    public function verifyIfUserCniCodeExist($cniCode){
        global $bdd;
        $verifyConnection = $bdd -> prepare('SELECT * FROM customer WHERE cnicode= ?');
        $verifyConnection -> execute(array($cniCode));
        if($verifyConnection->rowCount()==0){
            return false;
        }

        else{
            return true;
        }
    }

    public function verifyIfPasswordAlreadyExist($userPassword){
        global $bdd;
        $verifyConnection = $bdd -> prepare('SELECT * FROM customer WHERE password= ?');
        $verifyConnection -> execute(array($userPassword));
        if($verifyConnection->rowCount()==0){
            return false;
        }
        else{
            return true;
        }
    }
//----------------------Afficher toutes les information de l'utilisateur----------------------------------------
    public function ShowAllInformation($idCustomer){
        global $bdd;
        $seeInformation = $bdd -> prepare('SELECT * FROM customer WHERE id_customer= ?');
        $seeInformation -> execute(array($idCustomer));
        return $allInformation= $seeInformation->fetch();
    }

    public function getIdCustomer($cniCode){
        global $bdd;
        $seeInformation = $bdd -> prepare('SELECT * FROM `customer` WHERE `cnicode`= ?');
        $seeInformation -> execute(array($cniCode));
        $allInformation= $seeInformation->fetch();
        $id=$allInformation['id_customer'];
        return $id;
    }

    public function showUserWithdrawInformation($idCustomer){
        global $bdd;
        $userWithdrawInformation = $bdd -> prepare('SELECT C.name AS nomCategorie, W.amount AS montant, W.date As dateRetrait 
                                                            FROM withdrawal W, categorie C 
                                                            WHERE  C.id_categorie=W.id_categorie
                                                             AND W.id_customer= ?');
        $userWithdrawInformation -> execute(array($idCustomer));
        $withdrawInformation= $userWithdrawInformation->fetchAll();
        return $withdrawInformation;
    }
    public function showUserDepositInformation($idCustomer){
        global $bdd;
        $userDepositInformation = $bdd -> prepare('SELECT C.name AS nomCategorie, P.amount AS montant, P.date As dateDepot 
                                                            FROM payment P, categorie C 
                                                            WHERE  C.id_categorie=P.id_categorie
                                                             AND P.id_customer= ?');
        $userDepositInformation -> execute(array($idCustomer));
        $depositInformation= $userDepositInformation->fetchAll();
        return $depositInformation;
    }


//    -----------------------Inscription d'un nouvel utilisateur dans la base de donnée----------------------------------------
    public function insertNewCustomer($profilePicture, $name, $cniCode, $profession, $placeActivity, $phoneNumber, $startDate, $password){
        global $bdd;
        $insertNewCustomer= $bdd->prepare("INSERT INTO `customer` (`profilepicture`,`name`, `cnicode`, `profession`,
                                                    `placeactivity`, `phonenumber`, `startdate`, `password`) 
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $insertNewCustomer->execute(array($profilePicture, $name, $cniCode, $profession, $placeActivity, $phoneNumber, $startDate, $password));
        $customerId= $this->getIdCustomer($cniCode);
        $createCollectorCategorieAlimentaire=$bdd->prepare("INSERT INTO `categorie` (`id_categorie`, `name`, `solde`, `id_customer`) 
                                                                VALUES (NULL, 'alimentaire', '0', ?)");
        $createCollectorCategorieAlimentaire->execute(array($customerId));
        $createCollectorCategorieEpargne=$bdd->prepare("INSERT INTO `categorie` (`id_categorie`, `name`, `solde`, `id_customer`) 
                                                                VALUES (NULL, 'epargne', '0', ?);");
        $createCollectorCategorieEpargne->execute(array($customerId));
        $createCollectorCategorieAssurance=$bdd->prepare("INSERT INTO `categorie` (`id_categorie`, `name`, `solde`, `id_customer`) 
                                                                VALUES (NULL, 'assurance', '0', ?);");
        $createCollectorCategorieAssurance->execute(array($customerId));
        return true;
    }

//    -------------------------------------Modification des données de l'utilisateur-----------------------------------------------------

    public function editCustomer($profilePicture, $name, $cniCode, $profession, $placeActivity, $phoneNumber, $password,$idCustomer){
        global $bdd;
        $editCustomer= $bdd->prepare('UPDATE customer 
                                                SET profilepicture= ?, name=?, cnicode= ?, profession= ?, 
                                                placeactivity=?, phonenumber= ?, password=? 
                                                WHERE id_customer= ?');
        $editCustomer->execute(array($profilePicture, $name, $cniCode, $profession, $placeActivity, $phoneNumber, $password, $idCustomer));
        return true;
    }

//    -----------------------------------Affichage des informations des categories de compte de l'utilisateur----------------------------------

    public function showCustomerCategorie($categorieName, $idCustomer){
        global $bdd;
        $categorieInfos=$bdd->prepare('SELECT  Ca.solde AS soldeCategorie
                                                FROM categorie Ca, customer Cu 
                                                WHERE Cu.id_customer= Ca.id_customer 
                                                AND Ca.id_customer=? AND Ca.name=?');
        $categorieInfos->execute(array($idCustomer, $categorieName));
        return $infos= $categorieInfos->fetch();
    }

//    ----------------------------------------Affichage des retrait par catégorie------------------------------------------------------------

    public function showCustomerWithdrawalByCategorie($categorieName, $idCustomer){
        global $bdd;
        $withdrawalEpargne =$bdd->prepare('SELECT SUM(withdrawal.amount) AS sommeRetrait
                                                FROM withdrawal, customer , categorie
                                                WHERE withdrawal.id_customer=customer.id_customer 
                                                AND categorie.id_customer=customer.id_customer
                                                AND customer.id_customer=? 
                                                AND categorie.name=?');
        $withdrawalEpargne->execute(array($idCustomer, $categorieName));
        return $withdrawal=$withdrawalEpargne->fetch();
    }


//    --------------------------------------Affichage des Depot par categorie---------------------------------------------------------------

    public function showCustomerPAymentByCategorie($categorieName, $idCustomer){
        global $bdd;
        $paymentEpargne =$bdd->prepare('SELECT SUM(payment.amount) AS sommeDepot
                                                FROM payment, customer , categorie
                                                WHERE payment.id_customer=customer.id_customer 
                                                AND categorie.id_customer=customer.id_customer
                                                AND customer.id_customer=? 
                                                AND categorie.name=?');
        $paymentEpargne->execute(array($idCustomer, $categorieName));
        return $payment=$paymentEpargne->fetch();
    }


//    -----------------------------------Affichage de tous les messages de l'utilisateur---------------------------------------------------

    public function showALlMessageByUser($idCustomer){
        global $bdd;
        $allMessageByuser= $bdd->prepare('SELECT *
                                                    FROM questions Q, answers A, customer C
                                                    WHERE Q.id_customer<>A.id_customer 
                                                    AND C.id_customer=Q.id_customer
                                                    AND Q.id_customer= ?');
        $allMessageByuser->execute(array($idCustomer));
    }

//    -----------------------------------Affichage des messages et des reponses de l'utilisateur-------------------------------------------

    public function showAnswerAndQuestionByUser($idCustomer){
        global $bdd;
        $answerAndQuestionByUser=$bdd->prepare('SELECT Q.* A.* C.*
                                                        FROM question Q, customer C, answer A., admin Ad
                                                        WHERE Q.id_customer=C.id_customer 
                                                        AND A.id_admin=Ad.id_admin 
                                                        AND A.id_question=Q.id_question
                                                        AND C.id_customer=?');
        $answerAndQuestionByUser->execute(array($idCustomer));
    }

//    --------------------------------------Envoie D'une nouvelle question aux administrateur-------------------------------------------------

    public function addNewQuestion($message, $datetime, $idcustomer){
        global $bdd;
        $newQuesstion=$bdd->prepare('INSERT INTO question (`content`, `datetime`, `id_customer`) VALUES(?, ?, ?)');
        $newQuesstion->execute(array($message, $datetime, $idcustomer));
    }

//    --------------------------------------Effectuer un Dépot dans un compte client--------------------------------------------------------------

    public function makeNewDeposit($idCustomer, $categorieName, $amountTransaction, $dateTime, $paymentMode){
        global $bdd;
        $idCategorie= $this->getIdcategorie($idCustomer, $categorieName);
        $ancienSolde= $this->getLastSoldeCustomer($idCustomer);
        $newDeposit=$bdd->prepare('INSERT INTO payment 
                                            (`amount`, `date`, `paymentmode`,`id_customer`,`id_categorie`) 
                                            VALUES (?, ?,?,?,?)');
        $newDeposit->execute(array($amountTransaction, $dateTime, $paymentMode, $idCustomer, $idCategorie));
        $newSolde= $ancienSolde+$amountTransaction;
        $changeCustomerSolde=$bdd->prepare('UPDATE customer SET solde=?
                                                    WHERE id_customer=?');
        $changeCustomerSolde->execute(array($newSolde, $idCustomer));
        $this->issetNewSoldeCustomerCategorieForDeposit($idCustomer, $idCategorie, $amountTransaction, $ancienSolde);

        return true;

    }
    public function getLastSoldeCustomer($idCustomer){
        global $bdd;
        $lastSoldeCustomer=$bdd->prepare("SELECT solde FROM customer WHERE id_customer=?");
        $lastSoldeCustomer->execute(array($idCustomer));
        $soldeCustomer=$lastSoldeCustomer->fetch();
        return $soldeCustomer['solde'];
    }


//    -----------------------------------------Obtenir le solde de chaque categorie de l'utilisateur-------------------------------------------

    public function getSOldeAllCategorie($idCustomer){
        global $bdd;
        $getTotalSolde=$bdd->prepare('SELECT SUM(Ca.solde) AS sommeSoldeCategorie
                                                FROM categorie Ca, customer Cu
                                                WHERE Ca.id_customer= Cu.id_customer
                                                AND Cu.id_customer=?');
        $getTotalSolde->execute(array($idCustomer));
        $totalSolde=$getTotalSolde->fetch();
        $newSolde=$totalSolde['sommeSoldeCategorie'];
        return $newSolde;
    }


//    -------------------------------------------Ajuste le solde client apres une operation-----------------------------------------------------
    public function issetNewSoldeCustomerCategorieForDeposit($idCustomer, $idCategorie,  $amountTransaction, $ancienSoldeCategorie){
        global $bdd;
//        -------------------------------------Recuperation de l'ancien solde-------------------------------------------------------------------

//        --------------------------------------Modification du solde dans la categorie---------------------------------------------------------

        $nouveauSoldeCategorie= $ancienSoldeCategorie+ $amountTransaction;
        $changeSoldeToCategorie=$bdd->prepare('UPDATE categorie SET solde= ?
                                                        WHERE id_customer= ? AND id_categorie=?');
        $changeSoldeToCategorie->execute(array($nouveauSoldeCategorie, $idCustomer, $idCategorie));
    }

    public function issetNewSoldeCustomerCategorieForWithdrawal($idCustomer, $idCategorie,  $amountTotal, $ancienSoldeCategorie){
        global $bdd;
//        --------------------------------------Modification du solde dans la categorie---------------------------------------------------------
        $nouveauSoldeCategorie= $ancienSoldeCategorie-$amountTotal;
        $changeSoldeToCategorie=$bdd->prepare('UPDATE categorie SET solde= ?
                                                        WHERE id_customer= ? AND id_categorie=?');
        $changeSoldeToCategorie->execute(array($nouveauSoldeCategorie, $idCustomer, $idCategorie));
    }


    public function getLastSoldeCategorie($idCustomer, $categorieName){
        global $bdd;
        $lastSoldeCustomerCategorie=$bdd->prepare('SELECT Ca.solde FROM categorie Ca, customer Cu
                                                  WHERE Ca.id_customer=Cu.id_customer
                                                  AND Cu.id_customer=? AND Ca.name=?');
        $lastSoldeCustomerCategorie->execute(array($idCustomer, $categorieName));
        $lastSolde=$lastSoldeCustomerCategorie->fetch();
        $ancienSoldeCategorie=$lastSolde['solde'];
        return $ancienSoldeCategorie;
}

//    -------------------------------------------Recuperation de l'identifiant de la catégorie-------------------------------------------------

    public function getIdcategorie($idCustomer, $categorieName){
        global $bdd;
        $depositCategorie=$bdd->prepare('SELECT Ca.id_categorie FROM categorie Ca, customer Cu
                                                  WHERE Ca.id_customer=Cu.id_customer
                                                  AND Cu.id_customer=? AND Ca.name=?');
        $depositCategorie->execute(array($idCustomer, $categorieName));
        $categorie=$depositCategorie->fetch();
        $idCategorie=$categorie['id_categorie'];
        return $idCategorie;
    }


    public function getSoldecategorie($idCustomer, $categorieName){
        global $bdd;
        $depositCategorie=$bdd->prepare('SELECT Ca.solde As categorieSolde FROM categorie Ca, customer Cu
                                                  WHERE Ca.id_customer=Cu.id_customer
                                                  AND Cu.id_customer=? AND Ca.name=?');
        $depositCategorie->execute(array($idCustomer, $categorieName));
        $categorie=$depositCategorie->fetch();
        $soldeCategorie=$categorie['categorieSolde'];
        return $soldeCategorie;
    }

//    ------------------------------------------Effectuer un nouveau retrait----------------------------------------------------------------

    public function makeNewWithdrawal($idCustomer, $categorieName, $amountTransaction, $dateTime, $withdrawalMode, $wins){
        global $bdd;
        $idCategorie= $this->getIdcategorie($idCustomer, $categorieName);
        $ancienSolde= $this->getLastSoldeCustomer($idCustomer);
        $totalAmount= $amountTransaction + $wins;
        $newWithdraw=$bdd->prepare('INSERT INTO withdrawal 
                                            (`amount`, `date`, `withdrawalmode`,`id_customer`,`id_categorie`, `wins`) 
                                            VALUES (?,?,?,?,?,?)');
        $newWithdraw->execute(array($amountTransaction, $dateTime, $withdrawalMode, $idCustomer, $idCategorie, $wins));
        $newSolde= $ancienSolde-$totalAmount;
        $changeCustomerSolde=$bdd->prepare('UPDATE customer SET solde=?
                                                    WHERE id_customer=?');
        $changeCustomerSolde->execute(array($newSolde, $idCustomer));
        $this->issetNewSoldeCustomerCategorieForWithdrawal($idCustomer, $idCategorie, $totalAmount, $ancienSolde);
            return true;

    }


    /**
     * @return mixed
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * @return mixed
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @return mixed
     */
    public function getCniCode()
    {
        return $this->cni_code;
    }

    /**
     * @return mixed
     */
    public function getCollectorName()
    {
        return $this->collector_name;
    }

    /**
     * @return mixed
     */
    public function getCollectorPhone()
    {
        return $this->collector_phone;
    }

    /**
     * @return mixed
     */
    public function getDeliveryDate()
    {
        return $this->delivery_date;
    }

    /**
     * @return mixed
     */
    public function getIdAccount()
    {
        return $this->id_account;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @return mixed
     */
    public function getPlaceActivity()
    {
        return $this->place_activity;
    }

    /**
     * @return mixed
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * @param mixed $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }

    /**
     * @param mixed $cni_code
     */
    public function setCniCode($cni_code)
    {
        $this->cni_code = $cni_code;
    }

    /**
     * @param mixed $collector_name
     */
    public function setCollectorName($collector_name)
    {
        $this->collector_name = $collector_name;
    }

    /**
     * @param mixed $collector_phone
     */
    public function setCollectorPhone($collector_phone)
    {
        $this->collector_phone = $collector_phone;
    }

    /**
     * @param mixed $delivery_date
     */
    public function setDeliveryDate($delivery_date)
    {
        $this->delivery_date = $delivery_date;
    }

    /**
     * @param mixed $id_account
     */
    public function setIdAccount($id_account)
    {
        $this->id_account = $id_account;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $office
     */
    public function setOffice($office)
    {
        $this->office = $office;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @param mixed $place_activity
     */
    public function setPlaceActivity($place_activity)
    {
        $this->place_activity = $place_activity;
    }

    /**
     * @param mixed $solde
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;
    }


}

?>