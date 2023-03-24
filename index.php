<?php
include "db.php";

if(isset($_POST['submit_form']))
{
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$birth = $_POST['birth_day'];
$profile = $_POST['profile'];
$mobile = $_POST['mob_no'];
$email = $_POST['email'];
$course = $_POST['course'];
$time = $_POST['time'];
$location = $_POST['location'];
$about = $_POST['about'];
$year = $_POST['year'];
$country = $_POST['country'];
$city = $_POST['city'];


$enter = mysqli_query($practice,"insert into practice_form set first_name='".$first_name."',last_name='".$last_name."',birth_day='".$birth ."',mobile_number='".$mobile."',email='".$email."',inserted_course='".$course."',time='".$time ."',preferred_location='".$location."',about_this='".$about."',graduation_year='".$year."',country='".$country."',current_city='".$city."',status=1");

if($enter == true){
    echo"<script>alert('inserted successfully')</script>";
}
else{
    echo"<script>alert('insertion failed')</script>";

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
    <link rel="stylesheet" href="./style.css">
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Form section starts -->
    <section class="form-div">
      <form class="form container" method="post">
        <div class="col-md-4">
          <label for="" > First Name</label> <br />
          <input type="text" name="firstName" placeholder="First Name" />
        </div>
        <div class="col-md-4">
          <label for="" >Last Name</label> <br />
          <input type="text" name="lastName" placeholder="Last Name" />
        </div>
        <div class="form-birth col-md-4">
          <div>
            <label for="" >Do of Birth</label> <br />
            <input type="date" name="birth_day" />
          </div>
        </div>
        <div class="col-md-4">
          <label for="" >Profile</label> <br />
          <input type="file" name="profile" />
        </div>

        <div class="col-md-4">
          <label for="" >Mobile Number</label> <br />
          <input type="tel" name="mob_no" placeholder="ph number" />
        </div>
        <div class="col-md-4">
          <label for="" >Email</label> <br />
          <input type="email" name="email" placeholder="email" />
        </div>
        <div class="form-country col-md-4">
          <label for="" >Intrested Course</label> <br />
          <select id="" name="course">
            <option value="" selected disabled>select</option>
            <option value="Intrested Course" >Intrested Course</option>
            <option value="IELTS">IELTS</option>
            <option value="GRE" >GRE</option>
            <option value="GMAT" >GMAT</option>
            <option value="GMAT" >GMAT</option>
            <option value="TOEFL" >TOEFL</option>
            <option value="PTE" >PTE</option>
            <option value="Not Intrested">Not Intrested</option>
          </select>
        </div>
        <div class="form-time col-md-4">
          <label for="..." >Time</label> <br />
          <select  id="" name="time">
            <option value="" selected disabled>select</option>
            <option value="10Am To 6pm">10Am To 6pm</option>
            <option value="6Am to 9Am">6Am to 9Am</option>
            <option value="10Am To 6pm">10Am To 6pm</option>
          </select>
        </div>
        <div class="form-select form-time col-md-4">
          <label for="..." >Preferred Location</label> <br />
          <select  id="" name="location">
            <option value="" selected disabled>select</option>
            <option value="Himayatnagar">Himayatnagar</option>
            <option value="KPHB">KPHB</option>
          </select>
        </div>
        <div class="form-hear col-md-4">
          <label for="" >How did you hear about this</label> <br />
          <select  id="" name="about">
            <option value="" selected disabled>Select</option>
            <option value="Sign board">Sign board</option>
            <option value="nternet">Internet</option>
            <option value="Friend">Friend</option>
            <option value="Seminar">Seminar</option>
            <option value="Fest">Fest</option>
          </select>
        </div>
        <div class="form-graduation col-md-4">
          <label for="" >Select Graduation Year</label> <br />
          <select  id="" name="year">
            <option value="" selected disabled>select</option>
            <option value="1995">1995</option>
            <option value="1996">1996</option>
            <option value="1997">1997</option>
            <option value="1998">1998</option>
            <option value="1999">1999</option>
          </select>
        </div>
        <div class="form-country col-md-4">
          <label for="" >Country Intrested In</label> <br />
          <select  id="" name="country">
            <option value="" selected disabled>select</option>
            <option value="Australia">Australia</option>
            <option value="United States">United States</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="Germany">Germany</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="" >Current City In</label> <br />
          <input type="text" placeholder="City" name="city" />
        </div>
        <!-- <input type="submit" name ="submit_form" value="send message" class="btn btn-primary float-end"> -->
           <button class="submit-btn" name="submit_form" type="submit">Submit</button> 
      </form>
      <center>
      
       
      </center>
    </section>

    <!-- Form section ends -->

    <!-- Table section starts -->

      <table>
        <thead>
          <tr class="table-head">
            <th>SO.NO</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of birth</th>
            <th>Email</th>
            <th>Intrested Course</th>
            <th>Time</th>
            <th>Preferred Location</th>
            <th>How did you hear about this</th>
            <th>Select Graduation Year</th>
            <th>Country Intrested In</th>
            <th>Current City In</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $sel = mysqli_query($practice,"select * from practice_form");
        $i = 1;
        while($fetchvalue = mysqli_fetch_array($sel))
        {
        ?>
          <tr class="table-body">
            <td><?php echo $i; ?></td>
            <td><?php echo $fetchvalue['first_name']; ?></td>
            <td><?php echo $fetchvalue['last_name']; ?></td>
            <td><?php echo $fetchvalue['birth_day']; ?></td>
            <td><?php echo $fetchvalue['mobile_number']; ?></td>
            <td><?php echo $fetchvalue['email']; ?></td>
            <td><?php echo $fetchvalue['time']; ?></td>
            <td><?php echo $fetchvalue['preferred_location']; ?></td>
            <td><?php echo $fetchvalue['about_this']; ?></td>
            <td><?php echo $fetchvalue['graduation_year']; ?></td>
            <td><?php echo $fetchvalue['country']; ?></td>
            <td><?php echo $fetchvalue['current_city']; ?></td>
          </tr>
          <?php
       $i++; }
        ?>
        </tbody>
      </table>
    <!-- Table section ends -->
 
    
</body>
</html>
