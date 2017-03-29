<!DOCTYPE html>
<?php
include("includes/db.php");
?>
<html>
    <head>
        <title>Nova Vrsta Proizvoda</title>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
    </head>
    <body bgcolor="">

        <form action="dodaj_vrste_pro_db.php" method="post" enctype="multipart/form-data">

            <table align="center" width="800" border="1px">

                <tr align="center">
                    <td colspan="7"><h2>Unesite nove vrste proizvoda</h2></td>
                </tr>
                <tr>
                    <td align="right">Ime vrste proizvoda:</td>
                    <td><input type="text" name="vrsta_naziv" size="50"/></td>
                </tr>

                <tr>
                    <td align="right">Slika vrste proizvoda:</td>
                    <td><input type="file" name="vrsta_slika"/></td>
                </tr>

                <tr>
                    <td align="right">Opis</td>
                    <td><textarea name="vrsta_opis" cols="20" rows="10"></textarea></td>
                </tr>
                
                <tr align="right">
                    <td colspan="7"><button type="submit" name="insert_post">Sacuvaj</button></td>
                </tr>               
            </table>
        </form>
    </body>
</html>