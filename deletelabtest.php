<?php
include('database.php');
if(isset($_GET['deleteid']))
{
    $id = $_GET['deleteid'];
    $query = "DELETE FROM labtest WHERE id = $id ";
    mysqli_query($con, $query);
    header("Location: labtests.php");
}
?>
