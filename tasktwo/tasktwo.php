<?php
include"db.php";

if(isset($_POST['submit_btn'])){

    $first_name = $_POST['first_name'];
    $Last_name = $_POST['Last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $birth = $_POST['birth'];
    $Joining_date = $_POST['Joining_date'];
    $designation = $_POST['designation'];
    $Experience = $_POST['Experience'];
    $male = $_POST['male'];
    $skills = $_POST['skills'];
    $department = $_POST['department'];

    $selTeamTwo = mysqli_query($taskTwo, "select * from task_two where mobile ='".$mobile."'&& email ='".$email."' ");

    $countTwo = mysqli_num_rows($selTeamTwo);
    if($countTwo >= 1){
        echo "<script>alert('Team member already exists')</script>";
    }
    else{
        $two = mysqli_query($taskTwo,"insert into task_two set first_name='".$first_name."',last_name ='".$Last_name."',mobile ='".$mobile."',email ='".$email."',birth_date ='".$birth."',joining_date ='".$Joining_date."',designation ='".$designation."',experience ='". $Experience."',gender ='".$male."',skills ='".$skills."',department ='".$department."',status=1");

        if($two==true){
            echo"<script>alert('submitted successfully')</script>";
        }else{
            echo"<script>alert('Not inserted successfully')</script>";
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
    <title>Task Two</title>
    <!-- Css link -->
    <link rel="stylesheet" href="./tasktwo.css">
    <!-- Bootstarp link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>

                <!-- Form section starts -->
                <section class="container">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="Name">First Name</label> <br>
                                <input type="text" name="first_name" placeholder="First Name"> <br>
                                <label for="Name">Last Name</label> <br>
                                <input type="text" name="Last_name" placeholder="Last Name"> <br>
                                <label for="text"> Mobile</label> <br>
                                <input type="text" name="mobile" placeholder="Mobile Number"> <br>
                                <label for="email">Email</label> <br>
                                <input type="text" name="email" placeholder="Email"> <br>
                                <label for="birth">Date of Birth</label> <br>
                                <input type="date" name="birth" placeholder="Date Of Birth"> <br>
                                <label for="date">Joining Date</label> <br>
                                <input type="date" name="Joining_date" placeholder="Joining Date"> <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="text">Designation</label> <br>
                                <input type="text" name="designation" placeholder="Designation"> <br>
                                <label for="text">Experience</label> <br> 
                                <input type="text" name="Experience" placeholder="Experience"> <br>
                                <label for="text">Gender</label> <br>
                                <input type="radio"  name="male" value="male"> 
                                <label for="text">Male</label> <br>
                                <input type="radio"  name="male" value="female"> 
                                <label for="text">Female</label> <br>
                                <input type="radio"  name="male" value="others">
                                <label for="text">Others</label>  <br>
                                <label for="text">Skills</label> <br>
                                <input type="text" name="skills" placeholder="Skills"> <br>
                                <select name="department" id=""> <br>
                                    <option value="select department" selected disabled>Select Department</option>
                                    <option value="App Development">App Development</option>
                                    <option value="Web Development">Web Development</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Graphic Designing">Graphic Designing</option>
                                    <option value="AR & VR">AR & VR</option>
                                    <option value="Gaming">Gaming</option>
                                </select> <br>
                            </div>
                            <button type="submit" name="submit_btn" class="mt-4">Sumbit</button>
                        </div>
                    </form>
                </section>
                <!-- Form section ends -->

                <!-- Table section starts -->
                <table class="container">
                    <div class="row">
                        <thead>
                            <tr class="table-head">
                                <th>S.NO</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Date Of Birth</th>
                                <th>Joining Date</th>
                                <th>Designation</th>
                                <th>Experience</th>
                                <th>Gender</th>
                                <th>Skills</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select = mysqli_query($taskTwo, " select * from task_two order by tasktwo_id desc");
                            $i = 1;
                            while($fetchdata = mysqli_fetch_array($select))
                            {
                            ?>
                            <tr class="table-head">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $fetchdata['first_name']; ?></td>
                                <td><?php echo $fetchdata['last_name']; ?></td>
                                <td><?php echo $fetchdata['mobile']; ?></td>
                                <td><?php echo $fetchdata['email']; ?></td>
                                <td><?php echo $fetchdata['birth_date']; ?></td>
                                <td><?php echo $fetchdata['joining_date']; ?></td>
                                <td><?php echo $fetchdata['designation']; ?></td>
                                <td><?php echo $fetchdata['experience']; ?></td>
                                <td><?php echo $fetchdata['gender']; ?></td>
                                <td><?php echo $fetchdata['skills']; ?></td>
                                <td><?php echo $fetchdata['department']; ?></td>   
                                <a href="del.php?id=<?php echo $fetchdata['tasktwo_id'] ?>">
                                <button type="button" name="del_btn" value="Delete">del</button></a>
                                
                                              
                            </tr>
                            <?php
                             $i++; }
                            ?>
                        </tbody>
                    </div>
                </table>
                <!-- Table section ends -->
    
</body>
</html>