<?php

// Connect to database
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=meat-yogurt', 'root', '');
} catch (PDOException $e) {
    // echo '<pre>';
    // print_r($e);
    // echo '</pre>';
    echo '<p>Whoops, something went wrong</p>';
    echo '<br>';
    echo '<a href="http://localhost/projects/meat-yogurt/">Back to hompage</a>';
    exit();
}

$customer = [
    'name' => isset($_POST['name']) ? $_POST['name'] : NULL,
    'email' => isset($_POST['email']) ? $_POST['email'] : NULL,
    // php date function - https://www.php.net/manual/en/function.date.php
    'created_at' => date("Y-m-d"), 
];

$db->prepare("
    INSERT INTO newsletters (name, email, created_at) VALUES (:name, :email, :created_at)
")->execute($customer);

// Redirect browser
header("Location: http://localhost/projects/meat-yogurt/"); 
exit();