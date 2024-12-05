<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'mmp';
try {
    $pdo = new PDO("mysql:hostname=$host;dbname=$dbname", $user, $pass );
} catch (PDOException $e) {
    echo "Error" . $e->getMessage();
}
?>