<?php
$errors=[];

$upload_max_filesize = ini_get('upload_max_filesize');

//Condition quand l'utilisateur appuie sur le bouton "upload"
if( isset($_POST['upload'])){
    //On copie le fichier temporaire vers un vrai fichier quelque part dans notre projet
    $tempFile = $_FILES["image_file"]["tmp_name"];

    //1. Checker si le fichier image est une image ou non
    //On peut récupérer des infos sur le fichier temporaire
    // Avec getimagesize()
    $checkFile = getimagesize($tempFile);
    $fileSize = $_FILES["image_file"]["size"];

    // Si le fichier est trop gros
    if ($fileSize > $upload_max_filesize){
        $errors[] = "Le format de ce fichier est trop gros.";
    }

    // Si le fichier n'est pas une image
    if ($checkFile){ 
        // Avec explode(string separator, string string)
        $extension = explode("/",$checkFile["mime"]);
        //On précise le nom du fichier basé sur un timestamp
        $newFile = "./uploads/".time().".".$extension[1];
        move_uploaded_file($tempFile,$newFile);
    }else{
        $errors[] = "Ce fichier n'est pas un fichier image.";
    }

    // Si le fichier n'est pas une image et que le format est trop gros
    if (empty($errors)) {   
        $success = true;
    }
}

include "./views/layout.phtml";