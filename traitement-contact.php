<?php

// Si la requête est de type POST
if(!empty($_POST)){
    
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
   
        // Si le nom ne contient pas que des lettres
        // Si le nombre de caractères est inférieur à 2 ou supérieur à 60
        // Erreur
        if(!preg_match('/^[A-Za-zÀ-ÿ \'-]{2,60}$/', $nom)) {
            throw new Exception('Le format du nom est incorrect');
        }

        // Contrôler l'email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('L\email est invalide');
        }

        // Supprime les éventuelles balises HTML
        // Permet d'éviter l'injection de <script>
        $message = strip_tags($message);
        // Convertit les sauts de lignes en balises `<br>`
        $message = nl2br($message);
        // A partir de ce point, on considère que les données sont valides 
    
        // Affichage des données
        echo "<p>Nom: $nom</p>\n";                
        echo "<p>Adresse email: $email</p>\n";
        echo "<p>Message: $message</p>\n";
        
    } catch(Exception $ex) {
        echo 'Erreur: '. $ex->getMessage();
        exit;
    } // fin du try/catch
        
} // fin du if (!empty($_POST))

           
