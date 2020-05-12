<?php

// Informations d'identification
define('DB_SERVER', 'mysql-resumes.alwaysdata.net');
define('DB_USERNAME', 'resumes');
define('DB_PASSWORD', 'Lalm83220');
define('DB_NAME', 'resumes_database');

// Connexion à la base de données MySQL
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if ($conn === false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
