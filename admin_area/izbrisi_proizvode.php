<?php

include("includes/db.php");

if(isset($_GET['izbrisi_proizvod'])){
    
$delete_id = $_GET['izbrisi_proizvod'];

$delate_p = "delete from proizvodi where proizvod_id='$delete_id'";

$run_delete = mysqli_query($con, $delate_p);

if($run_delete){
    
    echo "<script>alert('Proizvod je izbrisana!')</script>";
    echo "<script>window.open('index.php?pogled_products','_self')</script>";
}
}

?>