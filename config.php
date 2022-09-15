<?php
define('USER', 'wrregist_wruser');
define('PASSWORD', 'Wrregist3r%.');
define('HOST', 'localhost');
define('DATABASE', 'wrregist_dbcertified');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>