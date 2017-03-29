<?php

 $con = mysqli_connect("localhost", "root", "", "roadrunner");
 
if (mysqli_connect_errno()) {
    echo "Faild to connect to MySQL: " . mysqli_connect_errno();
}

function getIp() {

        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        
        return $ip;
    }

function cart(){
    if(isset($_GET['add_cart'])){
        
        global $con;
        
        $ip = getIp();
        
        $pro_id = $_GET['add_cart'];
        
        $check_pro = "select from cart where ip_add='$ip' AND v_id='$pro_id'";
        
        $run_check = mysqli_query($con, $check_pro);
        
        if(mysqli_num_rows($run_check)>0){
            echo "";
        }else{
            $insert_pro = "insert into cart (v_id,ip_add) values ('$pro_id','$ip')";
            
            $run_pro = mysqli_query($con, $insert_pro);
            
            echo "<script>window.open('index.php')</script>";
        }
    }
   
}

function total_items(){
    if(isset($_GET['add_cart'])){
        
        global $con;
        
        $ip = getIp();
        
        $get_items = "select * from cart where ip_add='$ip'";
        
        $run_items = mysqli_query($con, $get_items);
        
        $count_items = mysqli_num_rows($run_items);
    }else{
        
        $con = mysqli_connect("localhost", "root", "", "roadrunner");
        
        $ip = getIp();
        
        $get_items = "select * from cart where ip_add='$ip'";
        
        $run_items = mysqli_query($con, $get_items);
        
        $count_items = mysqli_num_rows($run_items);
            
        }
        echo $count_items;
    }

function vrste() {
    
    if(!isset($_GET['vrsta'])){
    
    global $con;

    $get_vrste = "select * from vrsta";

    $run_vrste = mysqli_query($con, $get_vrste);

    while ($row_vrste = mysqli_fetch_array($run_vrste)) {
        $vrsta_id = $row_vrste['vrsta_id'];
        $vrsta_naziv = $row_vrste['vrsta_naziv'];
        $vrsta_slika = $row_vrste['vrsta_slika'];
        $vrsta_opis = $row_vrste['vrsta_opis'];
        echo "
            <div align='center'>
                <table style='width:700px; height:100px; border: 1px solid white;'>
                    <td><img src ='admin_area/product_images/$vrsta_slika'/></td>    
                    <td style='color: #e2e2e2; padding-left:15px;'><h4 style='color:orange;'>$vrsta_naziv</h4> $vrsta_opis
                    <a href='proizvodi.php?vrsta=$vrsta_id style='margin-left:500px; margin-right:10px; margin-bottom:5px;' class='button btn btn-warning'>Vise</a></td>
                    <br/>
                </table>
            </div>                                                
        ";
    }
}}

function uzmiProizvode() {

    if(isset($_GET['vrsta'])) {

        $vrsta_id = $_GET['vrsta'];

        global $con;

        $get_cat_pro = "select * from proizvodi where proizvod_vrsta = '$vrsta_id'";

        $run_cat_pro = mysqli_query($con, $get_cat_pro);

        $count_cats = mysqli_num_rows($run_cat_pro);

        if ($count_cats == 0) {
            echo "<h1>Ovde nepostiji ni jedan proizvod!</h1>";
        }

        while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
            $proizvod_id = $row_cat_pro['proizvod_id'];
            $proizvod_vrsta = $row_cat_pro['proizvod_vrsta'];
            $proizvod_naziv = $row_cat_pro['proizvod_naziv'];
            $proizvod_cena = $row_cat_pro['proizvod_cena'];
            $proizvod_opis = $row_cat_pro['proizvod_opis'];
            $proizvod_slika = $row_cat_pro['proizvod_slika'];

            echo "
                <div>
                <table style='width:700px; height:100px; border: 1px solid white;'>
                    <td><img src ='admin_area/product_images/$proizvod_slika'/></td>
                    <td style='color: #e2e2e2; padding-left:15px;'><h4 style='color:orange;'>$proizvod_naziv</h4> $proizvod_opis
                    <p style='padding-top:25px; margin-bottom:-30px;'>Cena: $proizvod_cena din.</p> <a href='proizvodi.php?add_cart=$proizvod_id' style='margin-left:400px; margin-right:10px; margin-bottom:5px;' class='button btn btn-warning'>Dodaj u Korpu</a></td>
                    <br/>
                </table>
            </div>
            ";
        }
    }
}



function sviProizvode() {


        global $con;

        $get_cat_pro = "select * from proizvodi";

        $run_cat_pro = mysqli_query($con, $get_cat_pro);


        while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
            $proizvod_id = $row_cat_pro['proizvod_id'];
            $proizvod_vrsta = $row_cat_pro['proizvod_vrsta'];
            $proizvod_naziv = $row_cat_pro['proizvod_naziv'];
            $proizvod_cena = $row_cat_pro['proizvod_cena'];
            $proizvod_opis = $row_cat_pro['proizvod_opis'];
            $proizvod_slika = $row_cat_pro['proizvod_slika'];

            echo "
                <div>
                <table style='width:700px; height:100px; border: 1px solid white;'>
                    <td><img src ='admin_area/product_images/$proizvod_slika'/></td>
                    <td style='color: #e2e2e2; padding-left:15px;'><h4 style='color:orange;'>$proizvod_naziv</h4> $proizvod_opis
                    <p style='padding-top:25px; margin-bottom:-30px;'>Cena: $proizvod_cena din.</p> <a href='proizvodi.php?add_cart=$proizvod_id' style='margin-left:400px; margin-right:10px; margin-bottom:5px;' class='button btn btn-warning'>Dodaj u Korpu</a></td>
                    <br/>
                </table>
            </div>
            ";
        }
    }

 function login($email, $password){
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);
    
    $email = trim($email);
    $password = trim($password);
    
    $email = str_replace("'","",$email);
    $password = str_replace("'","",$password);
    $password = md5($password);
    
    global $con;
    
    $query = "SELECT * FROM korisnici WHERE korisnici.korisnik_email= '$email' AND korisnici.korisnik_lozinka= '$password' and korisnici.tip_korisnika = 2 and korisnici.aktivnost = 1 LIMIT 1";

    $getUser = mysqli_query($con, $query);
    
    
    $user = mysqli_fetch_object($getUser);
    
    if(!is_null($user)){
        $_SESSION['user']['korisnik_id'] = $user->korisnik_id;
        $_SESSION['user']['korisnik_ime'] = $user->korisnik_ime;
        $_SESSION['user']['korisnik_prezime'] = $user->korisnik_prezime;
        $_SESSION['user']['korisnik_email'] = $user->korisnik_email;
        $_SESSION['user']['tip_korisnika'] = $user->tip_korisnika;
        header("Location: index.php");
    }else{
        echo '<div class="alert alert-warning">
                <strong>Nepostojeci korisnik.</strong>
          </div>';
    }
    
    
 }
 
 /**
  * Get user data by user id 
  * @param string $user_id user id 
  * @return object
  */
 function getUserData($user_id){
     
    global $con;
    
    $query = "SELECT * FROM korisnici WHERE korisnici.korisnik_id = '$user_id'  LIMIT 1";

    $getUser = mysqli_query($con, $query);
    
    
    return $user = mysqli_fetch_object($getUser);
 }
 

 function updateUserData($data){
     global $con;
     
     $query = "UPDATE korisnici SET
             korisnik_ime = '".$data['name']."',korisnik_prezime = '".$data['surname']."', korisnik_email='".$data['email']."',korisnik_kontakt = '".$data['contact']."', korisnik_grad = '".$data['city']."', korisnik_adresa = '".$data['address']."' WHERE korisnik_id = '".$data['user_id']."'";
     
     $userUpdated = mysqli_query($con, $query);
     if($userUpdated){
         echo '<div class="alert alert-success">
                <strong>Uspesno ste izmenili podatke.</strong>
          </div>'; 
     }else{
         echo '<div class="alert alert-‚danger">
                <strong>Greska!</strong>
          </div>';
     }
     
 }
 
 function updateUserPass($data){
    
     global $con;
     
     $new_pass = md5($data['new_pass']);
     $query = "UPDATE korisnici SET
             korisnik_lozinka = '".$new_pass."' WHERE korisnik_id = '".$data['user_id']."'";
     
     $updatedPass = mysqli_query($con, $query);
     if($updatedPass){
         echo '<div class="alert alert-success">
                <strong>Uspesno ste izmenili lozinku.</strong>
          </div>'; 
     }else{
          echo '<div class="alert alert-danger">
                <strong>Greska!.</strong>
          </div>';
     }
     
 }

 function insertUser($data){
        global $con;
         
        $query = "insert into korisnici 
         (korisnik_ime, 
         korisnik_prezime, 
         korisnik_email, 
         korisnik_lozinka, 
         korisnik_kontakt,
         korisnik_grad, 
         korisnik_adresa,
         datum_registracije,
         tip_korisnika, 
         aktivnost) VALUES 
         ('".$data['name']."', '".$data['surname']."', '".$data['email']."', '".md5($data['password'])."' , '".$data['contact']."', '".$data['city']."', '".$data['address']."', NOW(), '2', '1')";
      //echo $query; 
      
     $insertedUser = mysqli_query($con, $query);
     
     if($insertedUser){
         echo '<div class="alert alert-success">
                <strong>Uspesno ste se registrovali. <a href="login.php"> Prijavite se ovde >></a></strong>
          </div>'; 
     }else{
          echo '<div class="alert alert-danger">
                <strong>Greška!.</strong>
          </div>';
     }
         
    }
