<?php

class Manager {
   
    protected function con(){
        $envPath=$_SESSION['dir'].'/.env';
        if (file_exists($envPath)) {
            $env = parse_ini_file($envPath);
            foreach ($env as $key => $value) {
                $_ENV[$key] = $value;
                putenv("$key=$value");
            }
        }
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPassword = $_ENV['DB_PASSWORD'];
        try {
            $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    
}
