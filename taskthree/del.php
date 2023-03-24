<?php
include"db.php";

echo $_GET['task_id'];

$delete = mysqli_query($taskThree, "update task_three set status=2 where thaskthree_id='".$_GET['task_id']."'");
if($delete== true){
    echo 'deleted';
} else{
    echo 'not deleted';
}
?>