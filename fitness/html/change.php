<?php
error_reporting(E_ALL^E_NOTICE);
header("content-type:text/html;charset=utf-8");//设置编码格式
session_start();
$mysqli=new mysqli('localhost','root','','user');

$username = $_SESSION['name'];
$upass = $_SESSION['password'];
$oldpassword = $_POST['oldpass'];
$newpassword = $_POST['newpass'];
$renewpassword = $_POST['renewpass'];


if($_POST['oldpass']&&$_POST['newpass']&&$_POST['renewpass']){
	if ($newpassword != $renewpassword) {
		echo "<script>alert('密码输入不一致');location.href='change.html'</script>";
	}
	else{
		mysqli_query ($mysqli,"update information set password='$newpassword' where name='$username'" );
		echo "<script>alert('密码修改成功');location.href='center.php'</script>";
	}
}	
?>