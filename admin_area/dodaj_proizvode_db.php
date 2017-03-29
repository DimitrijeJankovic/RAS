<?php

include("includes/db.php");

if (isset($_POST['insert_post'])) {

    $proizvod_vrsta = $_POST['proizvod_vrsta'];
    $proizvod_naziv = $_POST['proizvod_naziv'];
    $proizvod_cena = $_POST['proizvod_cena'];
    $proizvod_opis = $_POST['proizvod_opis'];
    
    $proizvod_slika = $_FILES['proizvod_slika']['name'];
    $proizvod_slika_tmp = $_FILES['proizvod_slika']['tmp_name'];
    $proizvod_kljucner = $_POST['proizvod_kljucner'];

    move_uploaded_file($proizvod_slika_tmp, "product_images/$proizvod_slika");

    
    
    $insert_product = "insert into proizvodi (proizvod_vrsta, proizvod_naziv, proizvod_cena, proizvod_opis, proizvod_slika, proizvod_kljucner) values ('$proizvod_vrsta','$proizvod_naziv','$proizvod_cena','$proizvod_opis','$proizvod_slika','$proizvod_kljucner')";
    
   
    $insert_pro = mysqli_query($con, $insert_product);
    
    
    
    
    
    if($insert_pro){
        echo "<script>alert('Proizvod je ubacen!')</script>";
        echo "<script>window.open('dodaj_proizvode.php')</script>";
    }
}

?>
