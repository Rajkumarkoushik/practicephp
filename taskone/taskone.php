<?php
include"db.php";

if(isset($_POST['sub_form']))
{
$name = $_POST['name'];
$designation = $_POST['designation'];
$mobile = $_POST['mobile'];
$skills = $_POST['skills'];
$name = $_POST['name'];
$email = $_POST['email'];
$department = $_POST['department'];



$selTeam = mysqli_query($taskOne,"select * from task_one where mobile='".$mobile."' && email='".$email."'");

$count = mysqli_num_rows($selTeam);
if($count >= 1)
{
    echo"<script>alert('Team member already exists')</script>";
}
else
{

    $one = mysqli_query($taskOne,"insert into task_one set name='".$name."',department='".$department."',designation='".$designation."',skills='".$skills."',mobile='".$mobile."',email='".$email."',status=1");

if($one == true){
    echo"<script>alert('inserted successfully')</script>";
}
else{
    echo"<script>alert('insertion failed')</script>";
}
}
}



 ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task One</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./taskone.css">
    
</head>
<body>

    <form action="" method="POST">
        <label for="Name">Name</label>
        <input type="text" name="name">
        <label for="designation">Designation</label>
        <input type="text" name="designation">
        <label for="mobile">Mobile</label>
        <input type="text" name="mobile">
        <label for="text">Skills</label>
        <input type="text" name="skills">
        <label for="Email">Email</label>
        <input type="email" name="email">
        <input type="file" name="file">
        <select name="department" id="" >
            <option value="" selected disabled>Department</option>
            <option value="Web Development">Web Development</option>
            <option value="App Developmen">App Development</option>
            <option value="Graphic desiging">Graphic desiging</option>
            <option value="Ar and Vr">Ar and Vr</option>
            <option value="Digital Marketing">Digital Marketing</option>
            <option value="Gaming">Gaming</option>
        </select>
        <button type="submit" name="sub_form">Submit</button>
    </form>

  <form action="" method="POST">
    <input type="text" name="search">
    <button name="ser_btn" type="submit">Search</button>
  </form>

  
<?php
  if(isset($_POST['ser_btn']))
  {

  $search = $_POST['search'];

  $connect = mysqli_query($taskOne, "select * from task_one where department like '%$search%' or name like '%$search%' ");


$rows = mysqli_num_rows($connect);
if($rows >= 1){
    while($fetch = mysqli_fetch_array($connect))
   {
    ?>
    
      <div class="col-lg-3 card-sec">
      <h4>Name:<?php echo $fetch['name']; ?></h4>
      <h5>Department:<?php echo $fetch['department']; ?></h5>
      <h6>Designations:<?php echo $fetch['designation']; ?></h6>
      <p>Skills:<?php echo $fetch['skills']; ?></p>
      <p>Mobile:<?php echo $fetch['mobile']; ?></p>
      <p>Email:<?php echo $fetch['email']; ?></p>
  </div>
  <?php
   }
  

}
else{
    echo "<script>alert('No Results found')</script>";
}
}
?>

 


    <!-- Cards section starts -->
    <!-- <section class="container">
        <div class="row">
        <?php
        $selTask = mysqli_query($taskOne,"select * from task_one order by task_id desc");
        while($fetchvalue = mysqli_fetch_array($selTask))
        {
        ?>
            <div class="col-lg-3 card-sec">
                <h4>Name:<?php echo $fetchvalue['name']; ?></h4>
                <h5>Department:<?php echo $fetchvalue['department']; ?></h5>
                <h6>Designations:<?php echo $fetchvalue['designation']; ?></h6>
                <p>Skills:<?php echo $fetchvalue['skills']; ?></p>
                <p>Mobile:<?php echo $fetchvalue['mobile']; ?></p>
                <p>Email:<?php echo $fetchvalue['email']; ?></p>
            </div>
            <div class="col-lg-1"></div>
        <?php
        }
        ?>
        </div>

    </section> -->
    <!-- Cards section ends -->



    <!-- Tabs section starts -->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Web Development</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">App Development</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Digital Marketing</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-graphic-tab" data-toggle="pill" data-target="#pills-graphic" type="button" role="tab" aria-controls="pills-graphic" aria-selected="false">Graphic Designing</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"> 
        <!-- Php query function starts -->
        <?php
        $selTask = mysqli_query($taskOne,"select * from task_one where department='Web Development' order by task_id desc");
        while($fetchvalue = mysqli_fetch_array($selTask))
        {
        ?>
            <div class="col-lg-3 card-sec">
                <h4>Name:<?php echo $fetchvalue['name']; ?></h4>
                <h5>Department:<?php echo $fetchvalue['department']; ?></h5>
                <h6>Designations:<?php echo $fetchvalue['designation']; ?></h6>
                <p>Skills:<?php echo $fetchvalue['skills']; ?></p>
                <p>Mobile:<?php echo $fetchvalue['mobile']; ?></p>
                <p>Email:<?php echo $fetchvalue['email']; ?></p>
                <a href="del.php?user_id=<?php echo $fetchvalue['task_id'] ?>">
                    <button type="button" name="del_btn" value="Delete">del</button>
                </a>

                <a href="Edit.php?task_id=<?php echo $fetchvalue['task_id']; ?>"><button>Edit</button></a>
            </div>
            <div class="col-lg-1"></div>
        <?php
        }
        ?>
           <!-- Php query function ends -->
    </div>

        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"> 
               <!-- Php query function starts -->
        <?php
        $selTask = mysqli_query($taskOne,"select * from task_one where department='App Developmen' order by task_id desc");
        while($fetchvalue = mysqli_fetch_array($selTask))
        {
        ?>
            <div class="col-lg-3 card-sec">
                <h4>Name:<?php echo $fetchvalue['name']; ?></h4>
                <h5>Department:<?php echo $fetchvalue['department']; ?></h5>
                <h6>Designations:<?php echo $fetchvalue['designation']; ?></h6>
                <p>Skills:<?php echo $fetchvalue['skills']; ?></p>
                <p>Mobile:<?php echo $fetchvalue['mobile']; ?></p>
                <p>Email:<?php echo $fetchvalue['email']; ?></p>
                <a href="del.php?user_id=<?php echo $fetchvalue['task_id'] ?>">
                    <button type="button" name="del_btn" value="Delete">del</button>
                </a>

                <a href="Edit.php?task_id=<?php echo $fetchvalue['task_id']; ?>"><button>Edit</button></a>
            </div>
            <div class="col-lg-1"></div>
        <?php
        }
        ?>
           <!-- Php query function ends -->
        </div>

        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> 
               <!-- Php query function starts --> 
            <?php
            $selTask = mysqli_query($taskOne,"select * from task_one where department='Digital Marketing'  order by task_id desc");
            while($fetchvalue = mysqli_fetch_array($selTask))
            {
            ?>
                <div class="col-lg-3 card-sec">
                    <h4>Name:<?php echo $fetchvalue['name']; ?></h4>
                    <h5>Department:<?php echo $fetchvalue['department']; ?></h5>
                    <h6>Designations:<?php echo $fetchvalue['designation']; ?></h6>
                    <p>Skills:<?php echo $fetchvalue['skills']; ?></p>
                    <p>Mobile:<?php echo $fetchvalue['mobile']; ?></p>
                    <p>Email:<?php echo $fetchvalue['email']; ?></p>
                    <a href="del.php?user_id=<?php echo $fetchvalue['task_id'] ?>">
                    <button type="button" name="del_btn" value="Delete">del</button>
                </a>

                <a href="Edit.php?task_id=<?php echo $fetchvalue['task_id']; ?>"><button>Edit</button></a>
                </div>
                <div class="col-lg-1"></div>
            <?php
            }
            ?>
           <!-- Php query function ends -->
        </div>

        <div class="tab-pane fade" id="pills-graphic" role="tabpanel" aria-labelledby="pills-graphic-tab"> 
               <!-- Php query function starts --> 
            <?php
            $selTask = mysqli_query($taskOne,"select * from task_one where department='Graphic desiging' && status=1 order by task_id desc");
            $count = mysqli_num_rows($selTask);
            if($count > 0)
            {
            while($fetchvalue = mysqli_fetch_array($selTask))
            {
            ?>
                
                <div class="col-lg-3 card-sec">
                    <h4>Name:<?php echo $fetchvalue['name']; ?></h4>
                    <h5>Department:<?php echo $fetchvalue['department']; ?></h5>
                    <h6>Designations:<?php echo $fetchvalue['designation']; ?></h6>
                    <p>Skills:<?php echo $fetchvalue['skills']; ?></p>
                    <p>Mobile:<?php echo $fetchvalue['mobile']; ?></p>
                    <p>Email:<?php echo $fetchvalue['email']; ?></p>

                    <a href="del.php?user_id=<?php echo $fetchvalue['task_id'] ?>">
                    <button type="button" name="del_btn" value="Delete">del</button>
                    <a href="Edit.php?task_id=<?php echo $fetchvalue['task_id']; ?>"><button>Edit</button></a>
                </a>

                   
                </div>
                <div class="col-lg-1"></div>
            <?php
            }
        }
        else{
            ?>
            <p>No Team Member found under graphic designing</p>
            <?php
        }
        ?>
           <!-- Php query function ends -->
        </div>
       
        
    </div>
  
    <!-- Tabs section ends -->





 

    

        <!-- Bootstrap links -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>