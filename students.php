<?php

include 'config/db.php';

if(isset($_POST['save'])){

$name=$_POST['name'];
$roll=$_POST['roll'];
$class=$_POST['class'];

$image=$_FILES['image']['name'];

$tmp=$_FILES['image']['tmp_name'];

move_uploaded_file(
$tmp,
"uploads/".$image
);

mysqli_query(
$conn,
"INSERT INTO students
(name,roll_no,class_name,image)
VALUES
('$name','$roll','$class','$image')"
);

}
?>

<!DOCTYPE html>

<html>

<head>

<title>Students</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Add Student</h2>

<form
method="POST"
enctype="multipart/form-data">

<input
name="name"
class="form-control mb-2"
placeholder="Student Name">

<input
name="roll"
class="form-control mb-2"
placeholder="Roll Number">

<input
name="class"
class="form-control mb-2"
placeholder="Class">

<input
type="file"
name="image"
class="form-control mb-2">

<button
name="save"
class="btn btn-primary">
Save Student
</button>

</form>

<hr>

<h3>Student List</h3>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Roll</th>
<th>Class</th>

</tr>

<?php

$result=
mysqli_query(
$conn,
"SELECT * FROM students"
);

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>

<img
src="uploads/<?php echo $row['image']; ?>"
width="60">

</td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['roll_no']; ?></td>

<td><?php echo $row['class_name']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>