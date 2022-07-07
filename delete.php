<?php
include 'connection.php';
$rn = $_GET['rn'];
$query = "DELETE FROM `form`.`registration` WHERE `registration`.`id` = '$rn'";
$data = $conn->query($query);
if($data){
    echo "<script>Record Deleted from Database<script>";
    header('location:display.php');
    ?>
<?php } 
else{
    echo "<font color='red'>Failed to delete record from database";
}
?>
