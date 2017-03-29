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
                <th>Naziv</th>
                <th>Slika</th>
                <th>Izmeni</th>
                <th>Izbrisi</th>
            </tr>
                <?php 
                    $con = mysqli_connect("localhost", "root", "", "roadrunner");
                    
                    $get_pro = "select * from vrsta";
                    
                    $run_pro = mysqli_query($con, $get_pro);
                    
                    $i = 0;
                    
                    while ($row_pro= mysqli_fetch_array($run_pro)){
                        
                        $vrsta_id = $row_pro['vrsta_id'];
                        
                        $vrsta_naziv = $row_pro['vrsta_naziv'];
                        
                        $vrsta_slika = $row_pro['vrsta_slika'];
                        
                        $vrsta_opis = $row_pro['vrsta_opis'];
                        
                        $i++;
                    
                ?>
          
            <tr align="center">
                <td><?php echo $i; ?></td>
                <td><?php echo $vrsta_naziv; ?></td>
                <td><img src="product_images/<?php echo $vrsta_slika; ?>" width="100" height="70"></td>
                <td><?php echo $vrsta_opis; ?></td>
                <td><a href="index.php?izmeni_vrstu=<?php echo $vrsta_id; ?>">Izmeni</a></td>
                <td><a href="izbrisi_vrste.php?izbrisi_vrstu=<?php echo $vrsta_id; ?>">Izbrisi</a></td>
            </tr>
                    <?php } ?>
        </table>
   