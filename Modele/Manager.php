<?php

class Manager
{
    // Function to establish a database connection
    protected function con()
    {
        // Set the path to the .env file
        $envPath = $_SESSION['dir'] . '/.env';

        // Check if the .env file exists and load its environment variables
        if (file_exists($envPath)) {
            $env = parse_ini_file($envPath);
            foreach ($env as $key => $value) {
                $_ENV[$key] = $value;
                putenv("$key=$value");
            }
        }

        // Retrieve database connection details from environment variables
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPassword = $_ENV['DB_PASSWORD'];

        try {
            // Establish a PDO database connection
            $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

            // Set PDO attributes to enable error handling
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            // Handle any database connection errors and display an error message
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>
