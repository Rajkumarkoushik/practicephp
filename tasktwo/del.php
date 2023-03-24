<?php
include"db.php";

    $id = $_GET['id'];
    $delete = mysqli_query($taskTwo,"update task_two set status='2' where tasktwo_id='".$id."'");
    if($delete == true){
       echo 'deleted';
    }
    else{
        echo 'not deleted';
    }


?>