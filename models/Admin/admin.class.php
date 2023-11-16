<?php
class Admin
{
    private $id_account;
    private $pseudo;
    private $password;
    private $name;
    private $photo;
    private $statut;
    public $errorMessage;
    public $cniCode;
    public $profession;
    public $placeActivity;
    public $phoneNumber;
    public $startDate;

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
    public $bdd;

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getIdAccount()
    {
        return $this->id_account;
    }

    /**
     * @param mixed $id_account
     */
    public function setIdAccount($id_account)
    {
        $this->id_account = $id_account;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function Connection($pseudo, $password)
    {
//    -----------------recuperation de l'instance de PDO------------------------------------------------
        global $bdd;
        global $errorMessage;
//        ------------requete de verification du client dans la base de donnée----------------------------
        $verifyConnection = $bdd->prepare('SELECT * FROM admin WHERE login= ?');
        $verifyConnection->execute(array($pseudo));
        if ($verifyConnection->rowCount() > 0) {
            $userConnected = $verifyConnection->fetch();
            if ($pseudo == $userConnected['login']) {
//        ----------------attribution des données du client aux variables SESSION[]-----------------------------
                session_start();
                $_SESSION['id'] = $userConnected['id_admin'];
                $_SESSION['login'] = $userConnected['login'];
                $_SESSION['mdp'] = $userConnected['password'];
                $_SESSION['auth'] = true;
                return true;
            }else{
                $errorMessage= "nom et mot de passe incorrect";
                $this->errorMessage=$errorMessage;
                return false;
            }
        }else {
            $errorMessage= "vous n'avez pas de compte créez en un";
            $this->errorMessage=$errorMessage;
            return false;

        }

        }

    public function ShowAllInformation($id){
        global $bdd;
        $seeInformation = $bdd -> prepare('SELECT * FROM admin WHERE id_admin= ?');
        $seeInformation -> execute(array($id));
        return $allInformation= $seeInformation->fetch();
    }

    public function ShowRecentsTransaction(){
        global $bdd;
        $RecentsTransaction=$bdd->prepare('SELECT DISTINCT * FROM payment, withdrawal ORDER BY date DESC');
        $RecentsTransaction->execute();
        return $customerTransaction= $RecentsTransaction->fetchAll();
    }

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
    }
    public function getIdCustomer($cniCode){
        global $bdd;
        $getCustomerId= $bdd->prepare('SELECT id_customer FROM customer WHERE cnicode = ?');
        $getCustomerId->execute(array($cniCode));
        $resGetCustomerId=$getCustomerId->fetch();
        $customerId=$resGetCustomerId['id_customer'];
        return $customerId;
    }
    public function showAllUsers(){
        global $bdd;

            $allUser= $bdd->prepare("SELECT DISTINCT * FROM customer");
            $allUser->execute();
            return $eachUser=$allUser->fetchAll();

    }
    public function showAllUserInformation($idCustomer){
        global $bdd;

        $UserInformation= $bdd->prepare("SELECT * FROM customer WHERE id_customer = ?");
        $UserInformation->execute(array($idCustomer));
        return $eachUser=$UserInformation->fetch();

    }
    public function editCustomer($profilePicture, $name, $cniCode, $profession, $placeActivity, $phoneNumber, $password,$idCustomer){
        global $bdd;
        $editCustomer= $bdd->prepare('UPDATE customer SET profilepicture= ?, name=?, cnicode= ?, profession= ?, placeactivity=?, phonenumber= ?, password=? WHERE id_customer= ?');
        $editCustomer->execute(array($profilePicture, $name, $cniCode, $profession, $placeActivity, $phoneNumber, $password, $idCustomer));
    }
    public function showCustomerCategorie($categorieName, $idCustomer){
        global $bdd;
        $categorieInfos=$bdd->prepare('SELECT Cu.name, Ca.name, Ca.solde 
                                                FROM categorie Ca, customer Cu 
                                                WHERE Cu.id_customer= Ca.id_customer 
                                                AND Ca.id_customer=? AND Ca.name=?');
        $categorieInfos->execute(array($idCustomer, $categorieName));
    }

    public function showCustomerWithdrawalByCategorie($idCustomer, $categorieName){
        global $bdd;
        $withdrawalEpargne =$bdd->prepare('SELECT SUM(amount)
                                                FROM withdrawal, customer , categorie
                                                WHERE withdrawal.id_customer=customer.id_customer 
                                                AND categorie.id_customer=customer.id_customer
                                                AND customer.id_customer=? 
                                                AND categorie.name=?');
        $withdrawalEpargne->execute(array($idCustomer, $categorieName));
    }


    public function CountPaymentByCategorie($categorieName){
        global $bdd;
        $countPayement=$bdd->prepare('SELECT COUNT(payment.id_withdrawal)
                                               FROM payment, categorie
                                               WHERE payment.id_categorie=categorie.id_categorie
                                               AND categorie.name=?');
        $countPayement->execute(array($categorieName));
    }
    public function CountWithdrawalByCategorie($categorieName){
        global $bdd;
        $countWithdrawal=$bdd->prepare('SELECT COUNT(withdrawal.id_withdrawal)
                                               FROM withdrawal, categorie
                                               WHERE withdrawal.id_categorie=categorie.id_categorie
                                               AND categorie.name=?');
        $countWithdrawal->execute(array($categorieName));
    }
    public function totalWinsByCategorie($categorieName){
        global $bdd;
        $totalWins=$bdd->prepare('SELECT SUM(withdrawal.wins)
                                                FROM withdrawal, categorie
                                                WHERE withdrawal.id_categorie=categorie.id_categorie
                                                AND categorie.name=?;');
        $totalWins->execute(array($categorieName));
    }
    public function showCategorieAmount($categorieName){
        global $bdd;
        $categorieAmount=$bdd->prepare('SELECT  name, solde 
                                                FROM categorie 
                                                WHERE Ca.name= ?');
        $categorieAmount->execute(array($categorieName));
    }
    public function banishCustomer($idCustomer){
        global $bdd;
        $banishCustomer=$bdd->prepare('DELETE FROM customer WHERE id = ?');
        $banishCustomer->execute(array($idCustomer));
    }
    public function showALlMessageByUser($idCustomer){
        global $bdd;
        $allMessageByuser= $bdd->prepare('SELECT Q.*, C.*
                                                    FROM questions Q, answers A, customer C
                                                    WHERE Q.id_customer<>A.id_customer 
                                                    AND C.id_customer=Q.id_customer
                                                    AND Q.id_customer= ?');
        $allMessageByuser->execute(array($idCustomer));
    }
    public function showRecentMessage(){
        global $bdd;
        $recentMessage=$bdd->prepare('SELECT Q.*, C.* 
                                                FROM question Q, answer A, customer C 
                                                WHERE Q.id_question<>A.id_question
                                                AND Q.id_customer=C.id_customer
                                                ORDER BY datetime DESC LIMIT 3');
        $recentMessage->execute();
    }
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
    public function addAnsToQuestion($message, $datetime, $idAdmin, $idOfquestion){
        global $bdd;
        $ansToQuestion=$bdd->prepare('INSERT INTO answer (`content`, `datetime`, `id_admin`, `id_question`) VALUES (?, ?,?,?)');
        $ansToQuestion->execute(array($message,$datetime,$idAdmin,$idOfquestion));
    }


}