<?php
session_start();
include 'connection.php';

global $login;
global $password;

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT id, nome FROM associado WHERE login = '$login' AND senha = '$password'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if($row){
    $_SESSION['id'] = $row['id'];
	$_SESSION['nome'] = $row['nome'];
    echo "SUCCESS";
}else{
	echo "<script> alert('Senha ou Login incorreto');</script>";
}
?>