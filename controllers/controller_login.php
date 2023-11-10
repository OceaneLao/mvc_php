<?php
$error="";

//Si le formulaire est validé, on est connectés à la BDD
if( isset($_POST['submit'])){
    $email = strip_tags($_POST['mail']);

    //Connect DB
    $db = connectDB();
    //Select la BDD users où se situe l'email
    $sql = $db->prepare("SELECT * FROM users WHERE mail=?");
    $sql->execute([$email]);
    $user = $sql->fetch(PDO::FETCH_ASSOC);

    //Vérifier si l'adresse e-mail existe dans la BDD
    if ($sql->rowCount() == 0){
        $error = "Vous n'avez pas de compte. Veuillez vous inscrire pour vous <a href=\"?page=register\">enregistrer</a>.";
    }

    // Vérifier le mot de passe entré par l'utilisateur lors de son inscription + sécurité
    // password_verify($password,$hash);
    $passVerif = password_verify(strip_tags($_POST['password']), $user['password']);

    if(!$passVerif){
        $error="Login/Mot de passe incorrect(s).";
    }

    if (empty($error)){
        $_SESSION['user'] = $user;
        header("Location:?page=adminlist");
    }
}

// --- on charge la vue
include "./views/layout.phtml";