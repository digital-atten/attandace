<?php
session_start();

if(isset($_POST['login'])){

$user=$_POST['username'];
$pass=$_POST['password'];

if($user=="admin" && $pass=="1234"){

$_SESSION['admin']=$user;

header("Location: dashboard.php");
exit();

}else{

$msg="Invalid Login";

}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4">

<h2>Attendance System Login</h2>

<?php
if(isset($msg)){
echo "<div class='alert alert-danger'>$msg</div>";
}
?>

<form method="POST">

<input
type="text"
name="username"
class="form-control mb-3"
placeholder="Username">

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Password">

<button
class="btn btn-primary"
name="login">
Login
</button>

</form>

</div>

</div>

</body>
</html>