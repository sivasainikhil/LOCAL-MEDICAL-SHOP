<?php
include('database.php');
if(isset($_GET['deleteid']))
{
    $id =$_GET['deleteid'];
    $query = "delete from tablets where id = $id ";
    mysqli_query($con,$query);
    header("Location: tablets.php");

}

?>