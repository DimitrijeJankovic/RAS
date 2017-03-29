<!DOCTYPE html>
<?php
include("includes/db.php");
?>
<html>
    <head>
        <title>Dodaj Proizvode</title>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
    </head>
    <body>

        <form action="dodaj_proizvode_db.php" method="post" enctype="multipart/form-data">

            <table align="center" width="800" border="1">

                <tr align="center">
                    <td colspan="7"><h2>Dodaje Proizvode</h2></td>
                </tr>
                <tr>
                    <td align="right">Ime Proizvodea:</td>
                    <td><input type="text" name="proizvod_naziv" size="60"/></td>
                </tr>

                <tr>
                    <td align="right">Proizvod Vrsta</td>
                    <td>
                        <select name="proizvod_vrsta">
                            <option>Izaberi vrstu:</option>
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
                    <td><input type="file" name="proizvod_slika"/></td>
                </tr>

                <tr>
                    <td align="right">Cena Proizvoda:</td>
                    <td><input type="text" name="proizvod_cena"/></td>
                </tr>

                <tr>
                    <td align="right">Opis Proizvoda:</td>
                    <td><textarea name="proizvod_opis" cols="20" rows="10"></textarea></td>
                </tr>

                <tr>
                    <td align="right">Kljucna rec Proizvoda:</td>
                    <td><input type="text" name="proizvod_kljucner" size="60"/></td>
                </tr>

                <tr align="right">
                    <td colspan="7"><button type="submit" name="insert_post">Unesi</button></td>
                </tr>               
            </table>
        </form>
    </body>
</html>