<?php
include"db.php";

    // // If upload button is clicked ...
    // if (isset($_POST['upload'])) {
    
    //     $filename = $_FILES["uploadfile"]["name"];
    //     $tempname = $_FILES["uploadfile"]["tmp_name"];
    //     $folder = "./image/" . $filename;
    
    //     // $db = mysqli_connect("localhost", "root", "", "geeksforgeeks");
    
    //     // Get all the submitted data from the form
    //     $sql = "INSERT INTO image (file_upload) VALUES ('$filename')";
    
    //     // Execute query

    
    //     // Now let's move the uploaded image into the folder: image
    //     if (move_uploaded_file($filename, $folder)) {
    //         echo "<h3>  Image uploaded successfully!</h3>";
    //     } else {
    //         echo "<h3>  Failed to upload image!</h3>";
    //     }
    // }

?>


<!DOCTYPE html>
<html>
   
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
   
<body>
    <!-- <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
    <div id="display-image">
        <?php
            $query = " select * from image_upload ";
            $result = mysqli_query($connect, $query);
    
            while ($data = mysqli_fetch_assoc($result)) {
        ?>
            <img src="./image/<?php echo $data['file_upload']; ?>">
    
        <?php
            }
        ?>
    </div> -->



        <form method="POST" action="index.php" enctype="multipart/form-data">
  	  	
            <input type="file" name="image">  	
            <button type="submit" name="upload">Upload Image</button>
          
        </form>
      
      <?php
      // database connection
      if (isset($_POST['upload'])) {
          
          // Get name of images
          $Get_image = $_files['image']['name'];
          
          // image Path
          $image_Path = "image/".basename($Get_image);
    
          $sql = "INSERT INTO image_upload (file_upload) VALUES ('$Get_image')";
          
        // Run SQL query
          mysqli_query($connect, $sql);
    
          if (move_uploaded_file($_files['image']['tmp_name'], $image_Path)) {
              echo "<script>alert('Your Image uploaded successfully')</script>";
          }else{
              echo  "<script>alert('Not Insert Image')</script>";
          }
      }
      
      
      // Fetch image from database
        $img = mysqli_query($connect, "SELECT * FROM image_upload");
         while ($row = mysqli_fetch_array($img)) {     
            
              echo "<img src='image/".$row['file_upload']."'width='500px' 'height= 300px'> <br>";   
          
        }     
    ?>


<a href="" download>
  Download with original filename -> samanthaming.png
</a>
</body>
 
</html>