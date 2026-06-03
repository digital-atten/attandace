<?php

session_start();

if(!isset($_SESSION['admin'])){
header("Location:index.php");
}

include 'config/db.php';

$totalStudents =
mysqli_num_rows(
mysqli_query(
$conn,
"SELECT * FROM students"
)
);

?>

<!DOCTYPE html>

<html>

<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container-fluid">

<span class="navbar-brand">
Attendance Dashboard
</span>

<a
href="students.php"
class="btn btn-success">
Students
</a>

</div>

</nav>

<div class="container mt-4">

<div class="row">

<div class="col-md-4">

<div class="card p-3">

<h4>Total Students</h4>

<h1>
<?php echo $totalStudents; ?>
</h1>

</div>

</div>

</div>

</div>

</body>

</html>