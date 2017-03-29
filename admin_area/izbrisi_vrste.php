<?php

include("includes/db.php");

if(isset($_GET['izbrisi_vrstu'])){
    
$delete_id = $_GET['izbrisi_vrstu'];

$delate_v = "delete from vrsta where vrsta_id='$delete_id'";

$run_delete = mysqli_query($con, $delate_v);

if($run_delete){
    
    echo "<script>alert('Vrsta je izbrisana!')</script>";
    echo "<script>window.open('index.php?pogled_vrsta','_self')</script>";
}
}

?>