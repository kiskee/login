<?php  
session_start();
include 'partials/header.php';
require __DIR__.'/users/users.php';

$user=[
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
    'password' => '',


];






?>

<?php  include 'form2.php'; ?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(!($nameErr) and !($emailErr)  and !($websiteErr)){
        $user = createUser($_POST);
        redirect('all.php'); 
    }
    }


?>

<?php include 'partials/footer.php';?>

