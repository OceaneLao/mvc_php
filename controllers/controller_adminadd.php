<?php

// Si le formulaire est validé on insert dans la table
if (isset($_POST['submit'])){

    //TRAITEMENT DU FICHIER POUR GERER L'UPLOAD
    $errors=[];
    $upload_max_filesize = ini_get('upload_max_filesize');
    $fileName= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/','-',$_POST['title'])));

    //On copie le fichier temporaire vers un vrai fichier quelque part dans notre projet
    $tempFile = $_FILES["src"]["tmp_name"];

    //Checker si le fichier image est une image ou non
    //On peut récupérer des infos sur le fichier temporaire
    //Avec getimagesize()
    $checkFile = getimagesize($tempFile);
    $fileSize = $_FILES["src"]["size"];

    // Si le fichier est trop gros
    if ($fileSize > $upload_max_filesize){
        $errors[] = "Le format de ce fichier est trop gros.";
    }

    // Si le fichier n'est pas une image
    if ($checkFile){ 
        // Avec explode(string separator, string string)
        $extension = explode("/",$checkFile["mime"]);
        //On précise le nom du fichier basé sur un timestamp
        $newFile = "./uploads/".$fileName.".".$extension[1];
        move_uploaded_file($tempFile,$newFile);
    }else{
        $errors[] = "Ce fichier n'est pas un fichier image.";
    }

    // Si le fichier n'est pas une image et que le format est trop gros
    if (empty($errors)) {   
        $success = true;
    }
    //FIN DU TRAITEMENT POUR GERER L'UPLOAD

    if (empty($errors)){ 
    $db = connectDB();
    $sql = $db->prepare("INSERT INTO pictures (title, description, src, author) VALUES (?,?,?,?)");
    $sql->execute([
        $_POST['title'],
        $_POST['description'],
        $newFile,
        $_POST['author']
    ]);
    // Et on redirige sur l'adminlist
    header("Location:?page=adminlist");
    }
}

// --- la vue
include "./views/layout.phtml";