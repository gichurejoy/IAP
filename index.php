<?php
include_once'user.php';
include_once'database.php';
$conn=new DBconn();
$pdo=$conn->connectToDatabase();
$event=$_POST['event'];
$error=array();
$data=array();
if(4event=="register"){
    $firstName=$_POST['fname'];
    $lastName=$_POST['lname'];
    $idNumber=$_POST['id'];
    $email=$_POST['email'];
    $profilepic=$_POST['profilepic'];
    $password=$_POST['password'];
    $user=new user($idNumber,$password);
    $user->setFirstName($firstName);
    $user->setLastName($lastName);
    $user->setIdNumber($idNumber);
    $user->setEmail($email);
    $user->setProfilePic($profilepic);
    $user->setPassword($password);
    echo $user->register($pdo);
}
else if($event=='login'){
    $idNumber=$_POST['id'];
    $password=$_POST['password'];
    $user=new user($idNumber,$password);
    $user->getIdNumber($idNumber);
    $user->getPassword($password);
    echo $user->login($pdo);
}
?>