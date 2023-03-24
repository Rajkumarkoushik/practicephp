<?php
include"db.php";
$id=$_GET['task_id'];
$query=mysqli_query($taskOne,"select *from task_one where task_id='".$id."'");
$fetch=mysqli_fetch_array($query);

if(isset($_POST['sub_form']))
{
$name = $_POST['name'];
$designation = $_POST['designation'];
$mobile = $_POST['mobile'];
$skills = $_POST['skills'];
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];

    $one = mysqli_query($taskOne,"update task_one set name='".$name."',department='".$department."',designation='".$designation."',skills='".$skills."',mobile='".$mobile."',email='".$email."' where task_id='".$id."' && status=1");

if($one == true){
    echo"<script>alert('UPdated successfully')</script>";
}
else{
    echo"<script>alert('Updation failed')</script>";

}


}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Form section starts -->

    <form action="" method="POST">
        <label for="Name">Name</label>
        <input type="text" name="name" value="<?php echo $fetch['name'];?>">
        <label for="designation">Designation</label>
        <input type="text" name="designation" value="<?php echo $fetch['designation'];?>">
        <label for="mobile">Mobile</label>
        <input type="text" name="mobile" value="<?php echo $fetch['mobile'];?>">
        <label for="text">Skills</label>
        <input type="text" name="skills" value="<?php echo $fetch['skills'];?>">
        <label for="Email">Email</label>
        <input type="email" name="email" value="<?php echo $fetch['email'];?>">
        <select name="department" id="">
            <option value="<?php echo $fetch['department'];?>" selected></option>
            <option value="Web Development">Web Development</option>
            <option value="App Developmen">App Development</option>
            <option value="Graphic desiging">Graphic desiging</option>
            <option value="Ar and Vr">Ar and Vr</option>
            <option value="Digital Marketing">Digital Marketing</option>
            <option value="Gaming">Gaming</option>
        </select>
        <button type="submit" name="sub_form">Submit</button>
    </form>
<!-- Form section ends -->
    
</body>
</html>