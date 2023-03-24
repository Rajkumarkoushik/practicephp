
<?php
include"db.php";

echo $_GET['user_id'];

$del = mysqli_query($taskOne,"update task_one set status=2 where task_id='".$_GET['user_id']."'");
    // $id = $_GET['id'];
    // $del = mysqli_query($taskOne,"update task_one set status='2' where task_id='".$id."'");
    if($del == true){
       echo 'deleted';
    }
    else{
        echo 'not deleted';
    }


?>