<?php
Interface Account{
    public function register($pdo);
    public function login($pdo);
    public function changepassword($pdo);
    public function logout($pdo);
}
?>