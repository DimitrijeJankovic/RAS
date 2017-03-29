<?php

include("includes/db.php");

if (isset($_POST['insert_post'])) {

    $vrsta_naziv = $_POST['vrsta_naziv'];
    
    $vrsta_slika = $_FILES['vrsta_slika']['name'];
    $vrsta_slika_temp = $_FILES['vrsta_slika']['tmp_name'];
    
    $vrsta_opis = $_POST['vrsta_opis'];
    


    move_uploaded_file($vrsta_slika_temp, "product_images/$vrsta_slika");


    $insert_vrsta = "insert into vrsta (vrsta_naziv, vrsta_slika, vrsta_opis) values ('$vrsta_naziv','$vrsta_slika','$vrsta_opis')";
    
   
    $insert_pro = mysqli_query($con, $insert_vrsta);
    
    
    
    
    
    if($insert_pro){
        echo "<script>alert('Proizvod je ubacen!')</script>";
        echo "<script>window.open('index.php?dodaj_vrste_pro.php','_self')</script>";
    }
}

?>
