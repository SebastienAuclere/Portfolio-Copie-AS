<?php

// Si la requête est de type POST
if(!empty($_post)){
    
    try{
        // Contrôler que tous les champs ont été soumis
        // Si un champ est manquant, on lève une erreur
        if(!isset(
            $_POST['name'],
            $_POST['email'],
            $_POST['message'])
        ){
            throw new Exception('Le formulaire est incomplet');
        }
        
        $nom = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // contrôle de saisie
   

}