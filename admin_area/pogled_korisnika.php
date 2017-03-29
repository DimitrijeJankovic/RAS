<!DOCTYPE>
<html>
    <head>
        
    </head>
    <body>
        <table width="1600" align="center">
            <tr align="center">
                <td colspan="6">Pogledaj sve Korisnike</td>
            </tr>
            
            <tr align="center">
                <th>S.N</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
                <th>Lozinka</th>
                <th>Kontakt</th>
                <th>Grad</th>
                <th>Adresa</th>
                <th>Datum registracije</th>
                <th>Tip korisinika</th>
                <th>Aktivnost</th>
                <th>Izbrisi</th>
            </tr>
                <?php 
                    $con = mysqli_connect("localhost", "root", "", "roadrunner");
                    
                    $get_pro = "select * from korisnici";
                    
                    $run_pro = mysqli_query($con, $get_pro);
                    
                    $i = 0;
                    
                    while ($row_pro= mysqli_fetch_array($run_pro)){
                        
                        $korisnik_id = $row_pro['korisnik_id'];
                        $korisnik_ime = $row_pro['korisnik_ime'];
                        $korisnik_prezime = $row_pro['korisnik_prezime'];
                        $korisnik_email = $row_pro['korisnik_email'];
                        $korisnik_lozinka = $row_pro['korisnik_lozinka'];
                        $korisnik_kontakt = $row_pro['korisnik_kontakt'];
                        $korisnik_grad = $row_pro['korisnik_grad'];
                        $korisnik_adresa = $row_pro['korisnik_adresa'];
                        $datum_registracije = $row_pro['datum_registracije'];
                        $tip_korisnika = $row_pro['tip_korisnika'];
                        $aktivnost = $row_pro['aktivnost'];
                        
                        $i++;
                    
                ?>
          
            <tr align="center">
                <td><?php echo $i; ?></td>
                <td><?php echo $korisnik_ime; ?></td>
                <td><?php echo $korisnik_prezime; ?></td>
                <td><?php echo $korisnik_email; ?></td>
                <td><?php echo $korisnik_lozinka; ?></td>
                <td><?php echo $korisnik_kontakt; ?></td>
                <td><?php echo $korisnik_grad; ?></td>
                <td><?php echo $korisnik_adresa; ?></td>
                <td><?php echo $datum_registracije; ?></td>
                <td><?php echo $tip_korisnika; ?></td>
                <td><?php echo $aktivnost; ?></td>
                
                
                <td><a href="izbrisi_korisnika.php?izbrisi_korisnika=<?php echo $korisnik_id; ?>">Izbrisi</a></td>
            </tr>
                    <?php } ?>
        </table>
   