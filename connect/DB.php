
<?php
    class DB{
    private static function connect()
    {
        $pdo = new PDO('mysql:host=127.0.0.1; dbname=facebook; charset=utf8mb4', 'root', '');
        // error connecting to database handling
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    private static function query($query, $params = array()){
        // Prepares an SQL statement to be executed by the PDOStatement::execute() method. 
        $statement = self::connect()->prepare($query);
        $statement->execute($params);

        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
    }
    }
?>