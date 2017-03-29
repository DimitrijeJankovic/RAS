<!DOCTYPE html>
<?php
include("includes/db.php");

if(isset($_GET['izmeni_proizvod'])){
    $get_id = $_GET['izmeni_proizvod'];
    
    
    $get_pro = "select * from proizvodi where proizvod_id='$get_id'";
                    
                    $run_pro = mysqli_query($con, $get_pro);
                    
                    $i = 0;
                    
                    $row_pro= mysqli_fetch_array($run_pro);
                        
                        $proizvod_id = $row_pro['proizvod_id'];
                        
                        $proizvod_vrsta = $row_pro['proizvod_vrsta'];
                        
                        $proizvod_naziv = $row_pro['proizvod_naziv'];
                        
                        $proizvod_cena = $row_pro['proizvod_cena'];
                        
                        $proizvod_opis = $row_pro['proizvod_opis'];
                        
                        $proizvod_slika = $row_pro['proizvod_slika'];
                        
                        $proizvod_kljucner = $row_pro['proizvod_kljucner'];
                        
}                       


?>
<html>
    <head>
        <title>Dodaj Proizvode</title>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
    </head>
    <body>

        <form action="" method="post" enctype="multipart/form-data">

            <table align="center" width="800" border="1">

                <tr align="center">
                    <td colspan="7"><h2>Izmeni Proizvode</h2></td>
                </tr>
                <tr>
                    <td align="right">Ime Proizvodea:</td>
                    <td><input type="text" name="proizvod_naziv" size="60" value="<?php echo $proizvod_naziv;?>"/></td>
                </tr>

                <tr>
                    <td align="right">Proizvod Vrsta</td>
                    <td>
                        <select name="proizvod_vrsta">
                            <option><?php echo $proizvod_vrsta;?></option>
                            <?php
                            $get_cats = "select * from vrsta";

                            $run_cats = mysqli_query($con, $get_cats);

                            while ($row_cats = mysqli_fetch_array($run_cats)) {

                                $vrsta_id = $row_cats['vrsta_id'];
                                $vrsta_naziv = $row_cats['vrsta_naziv'];

                                echo "<option value='$vrsta_id'>$vrsta_naziv</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td align="right">Slika Proizvoda:</td>
                    <td><input type="file" name="proizvod_slika"/><img src="product_images/<?php echo $proizvod_slika;?>" width="100" height="70"></td>
                </tr>

                <tr>
                    <td align="right">Cena Proizvoda:</td>
                    <td><input type="text" name="proizvod_cena" value="<?php echo $proizvod_cena;?>"/></td>
                </tr>

                <tr>
                    <td align="right">Opis Proizvoda:</td>
                    <td><textarea name="proizvod_opis" cols="20" rows="10"></textarea><?php echo $proizvod_opis;?></td>
                </tr>

                <tr>
                    <td align="right">Kljucna rec Proizvoda:</td>
                    <td><input type="text" name="proizvod_kljucner" size="60" value="<?php echo $proizvod_kljucner;?>"/></td>
                </tr>

                <tr align="right">
                    <td colspan="7"><button type="submit" name="izmeni_post">Izmeni</button></td>
                </tr>               
            </table>
        </form>
    </body>
    
    <?php


if (isset($_POST['izmeni_post'])) {

    $update_id = $poizvod_id;
    $proizvod_vrsta = $_POST['proizvod_vrsta'];
    $proizvod_naziv = $_POST['proizvod_naziv'];
    $proizvod_cena = $_POST['proizvod_cena'];
    $proizvod_opis = $_POST['proizvod_opis'];
    
    $proizvod_slika = $_FILES['proizvod_slika']['name'];
    $proizvod_slika_tmp = $_FILES['proizvod_slika']['tmp_name'];
    $proizvod_kljucner = $_POST['proizvod_kljucner'];

    move_uploaded_file($proizvod_slika_tmp, "product_images/$proizvod_slika");

    
    
    $update_proizvod = "update proizvodi set proizvod_vrsta='$proizvod_vrsta', proizvod_naziv='$proizvod_naziv', proizvod_cena='$proizvod_cena', proizvod_opis='$proizvod_opis', proizvod_slika='$proizvod_slika' , proizvod_kljucner='$proizvod_kljucner'  where proizvod_id='$update_id'";
   
   
    $insert_pro = mysqli_query($con, $update_proizvod);
    
    
    
    
    
    if($insert_pro){
        echo "<script>alert('Proizvod je izmenjen!')</script>";
        echo "<script>window.open('index.php?pogled_products','_self')</script>";
    }
}

?>

    
</html>