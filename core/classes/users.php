<?php 
    class User{
        protected $pdo;

        function __construct($pdo)
        {
            $this->pdo = $pdo;

        }
        public function checkInput($variable){
            // Convert special characters to HTML entities
            $variable = htmlspecialchars($variable);
            // removes any space gighlighted by user
            $variable = trim($variable);
            // Un-quotes a quoted string.
            $variable = stripslashes($variable);

            return $variable();
        }
    }
?>