<?php

include("includes/db.php");

if(isset($_GET['izbrisi_korisnika'])){
    
$delete_id = $_GET['izbrisi_korisnika'];

$delate_v = "delete from korisnici where korisnik_id='$delete_id'";

$run_delete = mysqli_query($con, $delate_v);

if($run_delete){
    
    echo "<script>alert('Korisnik je izbrisana!')</script>";
    echo "<script>window.open('index.php?pogled_customers','_self')</script>";
}
}

?>