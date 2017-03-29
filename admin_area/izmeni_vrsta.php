<!DOCTYPE html>
<?php
include("includes/db.php");

if(isset($_GET['izmeni_vrstu'])){
    $get_id = $_GET['izmeni_vrstu'];
    
    
    $get_pro = "select * from vrsta where vrsta_id='$get_id'";
                    
                    $run_pro = mysqli_query($con, $get_pro);
                    
                    $i = 0;
                    
                    $row_pro= mysqli_fetch_array($run_pro);
                        
                        $vrsta_id = $row_pro['vrsta_id'];
                        
                        $vrsta_naziv = $row_pro['vrsta_naziv'];
                        
                        $vrsta_slika = $row_pro['vrsta_slika'];
                        
                        $vrsta_opis = $row_pro['vrsta_opis'];
}



?>
<html>
    <head>
        <title>Nova Vrsta Proizvoda</title>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
    </head>
    <body bgcolor="">

        <form action="" method="post" enctype="multipart/form-data">

            <table align="center" width="800" border="1px">

                <tr align="center">
                    <td colspan="7"><h2>Izmeni vrste proizvoda</h2></td>
                </tr>
                <tr>
                    <td align="right">Ime vrste proizvoda:</td>
                    <td><input type="text" name="vrsta_naziv" size="50" value="<?php echo $vrsta_naziv;?>"/></td>
                </tr>

                <tr>
                    <td align="right">Slika vrste proizvoda:</td>
                    <td><input type="file" name="vrsta_slika"/><img src="product_images/<?php echo $vrsta_slika;?>" width="100" height="70"></td>
                </tr>

                <tr>
                    <td align="right">Opis</td>
                    <td><textarea name="vrsta_opis" cols="20" rows="10"></textarea><?php echo $vrsta_opis;?></td>
                </tr>
                
                <tr align="right">
                    <td colspan="7"><button type="submit" name="update_vrsta">Izmeni</button></td>
                </tr>               
            </table>
        </form>
    </body>
    
    <?php


if (isset($_POST['update_vrsta'])) {

    $update_id = $vrsta_id;
    $vrsta_naziv = $_POST['vrsta_naziv'];
    
    $vrsta_slika = $_FILES['vrsta_slika']['name'];
    $vrsta_slika_temp = $_FILES['vrsta_slika']['tmp_name'];
    
    $vrsta_opis = $_POST['vrsta_opis'];
    


    move_uploaded_file($vrsta_slika_temp, "product_images/$vrsta_slika");


    $update_vrsta = "update vrsta set vrsta_naziv='$vrsta_naziv', vrsta_slika='$vrsta_slika', vrsta_opis='$vrsta_opis' where vrsta_id='$update_id'";
   
    $insert_pro = mysqli_query($con, $update_vrsta);
    
    
    
    
    
    if($insert_pro){
        echo "<script>alert('Proizvod je izmenjen!')</script>";
        echo "<script>window.open('index.php?pogled_vrsta','_self')</script>";
    }
}

?>

    
    
</html>