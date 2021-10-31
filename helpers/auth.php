<?php
session_start();
if(isset($_POST['login'])){
if (empty(trim($_POST['usemail'],$characters = " \n\r\t\v\0"))  || empty(trim($_POST['password'],$characters = " \n\r\t\v\0"))) {
$msg = "complete fields!";
$msg_class="alert-danger";
} else{
$username = $_POST['usemail'];
$password = $_POST['password'];

$query = "select * from users where email='$username' or username='$username'";
$result = $conn->query($query);
if ($result->num_rows<1){
$msg = "Account does not exist";
$msg_class = "alert-danger";
}else {

$query = "select * from users where email='$username' or username='$username'";
$result = $conn->query($query);

}        if ($result->num_rows == 1) {
$row = $result->fetch_array(MYSQLI_ASSOC);
if (!password_verify($_POST['password'], $row['password'])) {
$msg = "Cross-check your password!!";
$msg_class = "alert-danger";
} else if (password_verify($_POST['password'], $row['password'])) {


$_SESSION['lr_id'] = $row['user_id'];// Password matches, so create the sessions
$_SESSION['lr_user'] = $row['username'];
$_SESSION['lr_name'] = $row['fullname'];
$_SESSION['lr_email'] = $row['email'];
$_SESSION['active'] = $row['user_active'];

//            header("Location: ../index.php", true, 303);
header('Location:index.php');

}


}}}