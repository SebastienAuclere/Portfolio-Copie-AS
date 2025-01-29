<?php
/* /Dao/DbConnect.php */ 
/**
 * Classe de connexion à la base de données  
*/
class DbConnect 
{
    /** @var PDO|null $instance stockage de l'instance PDO unique */
    private static ?PDO $instance = null;

    /**
     * Créer et retourne l'instance PDO 
     * @return PDO l'instance PDO créée
    */
    public static function getInstance(): PDO {
        if(self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;port=3306;dbname=portfolio;charset=utf8', 'root', '');
        }

        return self::$instance;
    }
}