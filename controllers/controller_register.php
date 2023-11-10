<?php
$error='';

if (isset($_POST['Register'])) {
    $email = strip_tags($_POST['mail']); 
    $password = password_hash(strip_tags($_POST['password']), PASSWORD_DEFAULT);

    //1. Est-ce que l'e-mail est valide ?
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        //Connect DB
        $db = connectDB();
        //Select la BDD users où se situe
        $sql = $db->prepare("SELECT * FROM users WHERE mail=?");
        $sql->execute([$email]);
        
        //2. Est-ce que l'e-mail existe dans la BDD ?
        if($sql->rowCount() == 0){
            //insertion 
            $sql = $db->prepare('INSERT INTO users (mail, password) VALUES(?,?)');
            $sql->execute([
            $email,
            $password
            ]);
            $userAdded = true; 
        } else {
            $error = 'Votre e-mail est déjà utilisé. Veuillez réessayer à nouveau.';
        }
    } else {
    $error = 'Votre adresse e-mail est invalide. Veuillez réessayer à nouveau.';
    } 
}

include "./views/layout.phtml";
