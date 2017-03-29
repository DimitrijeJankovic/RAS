<!DOCTYPE>
<html>
    <head>
        
    </head>
    <body>
        <table width="795" align="center">
            <tr align="center">
                <td colspan="6">Pogledaj sve Vrste Proizvoda</td>
            </tr>
            
            <tr align="center">
                <th>S.N</th>
                <th>Vrsta</th>
                <th>Naziv</th>
                <th>Cena</th>
                <th>Opis</th>
                <th>Slika</th>
                <th>Kljucna rec</th>
                <th>Izmeni</th>
                <th>Izbrisi</th>
            </tr>
                <?php 
                    $con = mysqli_connect("localhost", "root", "", "roadrunner");
                    
                    $get_pro = "select * from proizvodi";
                    
                    $run_pro = mysqli_query($con, $get_pro);
                    
                    $i = 0;
                    
                    while ($row_pro= mysqli_fetch_array($run_pro)){
                        
                        $proizvod_id = $row_pro['proizvod_id'];
                        
                        $proizvod_vrsta = $row_pro['proizvod_vrsta'];
                        
                        $proizvod_naziv = $row_pro['proizvod_naziv'];
                        $proizvod_cena = $row_pro['proizvod_cena'];
                        $proizvod_opis = $row_pro['proizvod_opis'];
                        $proizvod_slika = $row_pro['proizvod_slika'];
                        $proizvod_kljucner = $row_pro['proizvod_kljucner'];
                        
                        $i++;
                    
                ?>
          
            <tr align="center">
                <td><?php echo $i; ?></td>
                <td><?php echo $proizvod_vrsta; ?></td>
                <td><?php echo $proizvod_naziv; ?></td>
                <td><?php echo $proizvod_cena; ?></td>
                <td><?php echo $proizvod_opis; ?></td>
                <td><img src="product_images/<?php echo $proizvod_slika; ?>" width="100" height="70"></td>
                <td><?php echo $proizvod_kljucner; ?></td>
                <td><a href="index.php?izmeni_proizvod=<?php echo $proizvod_id; ?>">Izmeni</a></td>
                <td><a href="izbrisi_proizvode.php?izbrisi_proizvod=<?php echo $proizvod_id; ?>">Izbrisi</a></td>
            </tr>
                    <?php } ?>
        </table>
   