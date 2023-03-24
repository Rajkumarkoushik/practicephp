<?php
include"db.php";

if(isset($_POST['form_submit']))
{
$name = $_POST['user_name'];
$email = $_POST['user_email'];
$number = $_POST['user_number'];
$age = $_POST['user_age'];
$bio = $_POST['user_bio'];
$job = $_POST['user_job'];
$interest = $_POST['user_interest'];

$selectTeam = mysqli_query($taskThree,"select *from task_three where email='".$email."' && phone='".$number."'");

$count = mysqli_num_rows($selectTeam);
if($count >= 1){
    echo "<script>alert('User alredy exists')</script>";
}
else{

    $three= mysqli_query($taskThree, "insert into task_three set name='".$name."',email='".$email."',phone='".$number."',age='".$age."',bio='".$bio."',job_role='".$job."',interests='".$interest."',status=1");

if($three == true){
    echo '<script>alert("Form submitted successfully")</script>';
}
else{
    echo '<script>alert("Data Not submitted")</script>';
}

}


}
?>

<?php
include"phpmailer/email.php";
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Three</title>
    <link rel="stylesheet" href="./taskthree.css">
    <!-- Bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>

        <!-- Form section starts -->
            <div class="row">
                <div class="col-md-12">
                <form  method="post">
                    <h1> Sign Up </h1>
                    <fieldset>
                    <legend><span class="number">1</span> Your Basic Info</legend>
                    
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="user_name">
                    
                    <label for="email">Email:</label>
                    <input type="email" id="mail" name="user_email">
                
                    <label for="phone">Phone:</label>
                    <input type="text" id="password"  name="user_number">
                    
                    <label>Age:</label> <br>
                    <input type="radio" id="under_13" value="under_13" name="user_age">
                    <label for="under_13" class="light">Under 18</label><br>
                    <input type="radio" id="over_13" value="over_13" name="user_age">
                    <label for="over_13" class="light">Over 18</label>
                    
                    </fieldset>
                    <fieldset>  
                    
                    <legend><span class="number">2</span> Your Profile</legend>
                    
                    <label for="bio">Bio:</label>
                    <textarea id="bio" name="user_bio"></textarea>
                    <label for="job">Job Role:</label>
                    <select id="job" name="user_job">
                        <optgroup label="Web">
                        <option value="frontend_developer">Front-End Developer</option>
                        <option value="php_developer">PHP Developer</option>
                        <option value="python_developer">Python Developer</option>
                        <option value="rails_developer">Rails Developer</option>
                        <option value="web_designer">Web Designer</option>
                        <option value="wordpress_developer">Wordpress Developer</option>
                        </optgroup>
                        <optgroup label="Mobile">
                        <option value="android_developer">Android Developer</option>
                        <option value="ios_developer">IOS Developer</option>
                        <option value="mobile_designer">Mobile Designer</option>
                        </optgroup>
                        <optgroup label="Business">
                        <option value="business_owner">Business Owner</option>
                        <option value="freelancer">Freelancer</option>
                        </optgroup>
                    </select>
                    
                    <label>Interests:</label> <br>
                    <input type="checkbox" id="development" value="interest_development" name="user_interest">
                    <label class="light" for="development">Development</label><br>
                    <input type="checkbox" id="design" value="interest_design" name="user_interest">
                    <label class="light" for="design">Design</label><br>
                    <input type="checkbox" id="business" value="interest_business" name="user_interest">
                    <label class="light" for="business">Business</label>
                    
                    </fieldset>
                
                    <button type="submit" name="form_submit" class="button">Sign Up</button>
                    
                </form>
                </div>
            </div>

        <!-- Form section ends -->


        <!-- Table section starts -->
            <table class="container">
                    <div class="row">
                        <thead>
                            <tr class="table-head">
                                <th>S.NO</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Age</th>
                                <th>Bio</th>
                                <th>Job Role</th>
                                <th>Interests</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $selct = mysqli_query($taskThree," select *from task_three order by thaskthree_id desc");
                                $i=1;
                                while($fetchdata = mysqli_fetch_array($selct)){
                            ?>
                          <tr class="table-head">
                            <td><?php echo $i;?></td>
                            <td><?php echo $fetchdata['name'];?></td>
                            <td><?php echo $fetchdata['email'];?></td>
                            <td><?php echo $fetchdata['phone'];?></td>
                            <td><?php echo $fetchdata['age'];?></td>
                            <td><?php echo $fetchdata['bio'];?></td>
                            <td><?php echo $fetchdata['job_role'];?></td>
                            <td><?php echo $fetchdata['interests'];?></td>
                          </tr>
                          <?php
                             $i++;
                            }
                             ?>
                        </tbody>
                    </div>
                </table>
        <!-- Table section ends -->

        <!-- Cards section starts -->
                <section class="container">
                    <div class="row">
                    <?php
                    $selct = mysqli_query($taskThree," select *from task_three order by thaskthree_id desc");
                    $i=1;
                    while($fetchdata = mysqli_fetch_array($selct)){
                    ?>
                        <div class="col-lg-4 cards-main">
                            <h5>Name :-<?php echo $fetchdata['name'];?> </h5>
                            <h5>Email :-<?php echo $fetchdata['email'];?></h5>
                            <h6>Phone :-<?php echo $fetchdata['phone'];?></h6>
                            <h6>Age:-<?php echo $fetchdata['age'];?></h6>
                            <h6>Bio:-<?php echo $fetchdata['bio'];?></h6>
                            <h5>Job Role:-<?php echo $fetchdata['job_role'];?></h5>
                            <h5>Interests:-<?php echo $fetchdata['interests'];?></h5>
                        </div>
                    <?php
                    $i++;}
                    ?>
                    </div>
                </section>



            
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Web</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Phone</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Ios</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">   
                    <?php
                    $selct = mysqli_query($taskThree," select *from task_three where job_role='web_designer'  order by thaskthree_id desc");
                    $i=1;
                    while($fetchdata = mysqli_fetch_array($selct)){
                    ?>
                        <div class="col-lg-4 cards-main">
                            <h5>Name :-<?php echo $fetchdata['name'];?> </h5>
                            <h5>Email :-<?php echo $fetchdata['email'];?></h5>
                            <h6>Phone :-<?php echo $fetchdata['phone'];?></h6>
                            <h6>Age:-<?php echo $fetchdata['age'];?></h6>
                            <h6>Bio:-<?php echo $fetchdata['bio'];?></h6>
                            <h5>Job Role:-<?php echo $fetchdata['job_role'];?></h5>
                            <h5>Interests:-<?php echo $fetchdata['interests'];?></h5>
                            <a href="del.php?task_id=<?php echo $fetchdata['thaskthree_id'];?>"><button type="button" name="del_btn" value="Delete">Delete</button></a>
                            <a href="edit.php?task_id=<?php echo $fetchdata['thaskthree_id'];?>"><button>Edit</button></a>
                        </div>
                    <?php
                    $i++;}
                    ?>
                    </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">   
                <?php
                    $selct = mysqli_query($taskThree," select *from task_three where job_role='mobile_designer'  order by thaskthree_id desc");
                    $i=1;
                    while($fetchdata = mysqli_fetch_array($selct)){
                    ?>
                        <div class="col-lg-4 cards-main">
                            <h5>Name :-<?php echo $fetchdata['name'];?> </h5>
                            <h5>Email :-<?php echo $fetchdata['email'];?></h5>
                            <h6>Phone :-<?php echo $fetchdata['phone'];?></h6>
                            <h6>Age:-<?php echo $fetchdata['age'];?></h6>
                            <h6>Bio:-<?php echo $fetchdata['bio'];?></h6>
                            <h5>Job Role:-<?php echo $fetchdata['job_role'];?></h5>
                            <h5>Interests:-<?php echo $fetchdata['interests'];?></h5>
                            <a href="del.php?task_id=<?php echo $fetchdata['thaskthree_id'];?>"><button type="button" name="del_btn" value="Delete">Delete</button></a>
                            <a href="edit.php?task_id=<?php echo $fetchdata['thaskthree_id'];?>"><button>Edit</button></a>
                        </div>
                    <?php
                    $i++;}
                    ?>
                    </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"> 
                    <?php
                    $selct = mysqli_query($taskThree," select *from task_three where job_role='ios_developer'  order by thaskthree_id desc");
                    $i=1;
                    while($fetchdata = mysqli_fetch_array($selct)){
                    ?>
                        <div class="col-lg-4 cards-main">
                            <h5>Name :-<?php echo $fetchdata['name'];?> </h5>
                            <h5>Email :-<?php echo $fetchdata['email'];?></h5>
                            <h6>Phone :-<?php echo $fetchdata['phone'];?></h6>
                            <h6>Age:-<?php echo $fetchdata['age'];?></h6>
                            <h6>Bio:-<?php echo $fetchdata['bio'];?></h6>
                            <h5>Job Role:-<?php echo $fetchdata['job_role'];?></h5>
                            <h5>Interests:-<?php echo $fetchdata['interests'];?></h5>
                           <a href="del.php?task_id=<?php echo $fetchdata['thaskthree_id'];?>"><button type="button" name="del_btn" value="Delete">Delete</button></a>
                           <a href="edit.php?task_id=<?php echo $fetchdata['thaskthree_id'];?>"><button>Edit</button></a>
                        </div>
                    <?php
                    $i++;}
                    ?>
                    </div>
                    </div>
            
        <!-- Cards section ends -->


     
    
</body>
</html>