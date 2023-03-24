<?php
include"db.php";

$id=$_GET['task_id'];

$value = mysqli_query($taskThree,"select *from task_three where thaskthree_id='".$id."'");
$fetch = mysqli_fetch_array($value);

if(isset($_POST['form_submit']))
{
$name = $_POST['user_name'];
$email = $_POST['user_email'];
$number = $_POST['user_number'];
$age = $_POST['user_age'];
$bio = $_POST['user_bio'];
$job = $_POST['user_job'];
$interest = $_POST['user_interest'];

    $three= mysqli_query($taskThree, "update task_three set name='".$name."',email='".$email."',phone='".$number."',age='".$age."',bio='".$bio."',job_role='".$job."',interests='".$interest."' where thaskthree_id='".$id."' && status=1");

if($three == true){
    echo '<script>alert("Updated successfully")</script>';
}
else{
    echo '<script>alert("Updation faild")</script>';
}

}


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
                    <input type="text" id="name" name="user_name" value="<?php echo $fetch['name'];?>">
                    
                    <label for="email">Email:</label>
                    <input type="email" id="mail" name="user_email" value="<?php echo $fetch['email'];?>">
                
                    <label for="phone">Phone:</label>
                    <input type="text" id="password"  name="user_number" value="<?php echo $fetch['phone'];?>">
                    
                    <label>Age:</label> <br>
                    <input type="radio" id="under_18" value="<?php echo $fetch['age'];?>" name="user_age">
                    <label for="under_18" class="light">Under 18</label><br>
                    <input type="radio" id="over_18" value="over_18" name="user_age">
                    <label for="over_18" class="light">Over 18</label>
                    
                    </fieldset>
                    <fieldset>  
                    
                    <legend><span class="number">2</span> Your Profile</legend>
                    
                    <label for="bio">Bio:</label>
                    <textarea id="bio" name="user_bio" value="<?php echo $fetch['bio'];?>"></textarea>
                    <label for="job">Job Role:</label>
                    <select id="job" name="user_job">
                        <optgroup label="Web">
                        <option value="<?php echo $fetch['job_role'];?>">Front-End Developer</option>
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
                    <input type="checkbox" id="development" value="<?php echo $fetch['interests'];?>" name="user_interest">
                    <label class="light" for="development">Development</label><br>
                    <input type="checkbox" id="design" value="Development" name="user_interest">
                    <label class="light" for="design">Design</label><br>
                    <input type="checkbox" id="business" value="Design" name="user_interest">
                    <label class="light" for="business">Business</label>
                    
                    </fieldset>
                
                    <button type="submit" name="form_submit" class="button">Sign Up</button>
                    
                </form>
                </div>
            </div>

        <!-- Form section ends -->

    </body>
</html>