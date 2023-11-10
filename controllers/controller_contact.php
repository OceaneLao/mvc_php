<?php
//Si le formulaire est validé, on insert dans la table
if( isset($_POST['Submit'])){

//Connect DB
    $db = connectDB();
    //INSERT dans la DB
    $sql = $db->prepare("INSERT INTO form (mail, password, message) VALUES(?,?,?)");
    $sql->execute([
        $_POST['mail'],
        $_POST['password'],
        $_POST['message']
    ]);
}

// --- on charge la vue
include "./views/layout.phtml";