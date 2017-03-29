<?php session_start();?>
<!DOCTYPLE>
<?php
include ("functions/functions.php");
?>
<html>
    <head>
        <title>Road Runner</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="css/horizontal.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script src="js/js.js"></script> 
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" style="color: orange;">RoadRunner</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="sviproizvodi.php">Proizvodi</a></li>
                        <li><a href="onama.php">O nama<span class="sr-only">(current)</span></a></li>
                        <li><a href="lokacija.php">Lokacija</a></li>

                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search" style="margin-right: 5px;">
                        </div>
                        <button type="submit" class="btn btn-default" style="margin: 0 auto;">Potvrdi</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="cart.php" class="glyphicon glyphicon-shopping-cart"> <?php total_items();?> Proizvoda</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Korisnik <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if(isset($_SESSION['user'])){?>
                                <li><a href="profile.php">Moj profil</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php" style="color: orange;">Odjavi se</a></li>
                                <?php }else { ?>
                                    <li><a href="login.php">Prijavljivanje</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="register.php" style="color: orange;">Registracija</a></li>
                                <?php }?>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>  
            
        <div id="product_box">
                        
                        <form action="" method="post" enctype="multipart/from-data">
                            <table align="center" width="700" bgcolor="skyblue">
                                <tr align="center">
                                    <th>Obrisi</th>
                                    <th>Proizvodi</th>
                                    <th>Kolicina</th>
                                    <th>Ukupna Cena</th>
                                </tr>
                                
                                <?php
                                    $total = 0;
                                    
                                    $ip = getIp();
    
                                    $sel_price = "select * from cart where ip_add='$ip'";
    
                                    $run_price = mysqli_query($con, $sel_price);
    
                                    while($p_price=mysqli_fetch_array($run_price)){
        
                                       $pro_id = $p_price['v_id'];
        
                                       $pro_price = "select * from proizvodi where proizvod_id='$pro_id'";
    
                                       $run_pro_price = mysqli_query($con, $pro_price);
        
                                    while ($pp_price = mysqli_fetch_array($run_pro_price)){
            
                                       $proizvod_cena = array($pp_price['proizvod_cena']);
                                       $proizvod_naziv = $pp_price['proizvod_naziv'];
                                       $proizvod_slika = $pp_price['proizvod_slika'];
                                       
                                       $single_price = $pp_price['proizvod_cena'];
            
                                       $values = array_sum($proizvod_cena);
                                       
                                       $total += $values;
                                ?>
                                
                                <tr align="center">
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
                                    <td><?php echo $proizvod_naziv; ?><br>
                                        <img src="admin_area/product_images/<?php echo $proizvod_slika;?>" /></td>
                                    <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty']; ?>"/></td>
                                    
                                    <?php
                                        if(isset($_POST['update_cart'])){
                                            $qty = $_POST['qty'];
                                            
                                            $update_qty = "update cart set qty='$qty'";
                                            
                                            $run_qty = mysqli_query($con, $update_qty);
                                            
                                            $_SESSION['qty']=$qty;
                                            
                                            $total=$total*$qty;
                                        }
                                        
                                    ?>
                                    
                                    <td><?php echo "RSD: ".$single_price; ?></td>
                                </tr>
                                
                                
                                    <?php }} ?>    
                                <tr align="right">
                                    <td colspan="4"><b>Ukupna Cena:</b></td>
                                    <td colspan="4"><?php echo "RSD: ".$total;?></td>
                                </tr>
                                
                                <tr align="center">
                                    <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" class="btn btn-primary"/></td>
                                    <td><input type="submit" name="continue" value="Continue Shopping" class="btn btn-primary"/></td>
                                    <td><a href="checkout.php" class="btn btn-primary">Checkout</a></td>
                                </tr>
                            </table>  
                        </form>
                        <?php
                        //function updateaCart(){
                            global $con;

                            $ip = getIp();
                        
                            if(isset($_POST['update_cart'])){
                                foreach($_POST['remove'] as $remove_id){
                                     
                                    $delete_product = "delete from cart where v_id='$remove_id' AND ip_add='$ip'";
                                    
                                    $run_delete = mysqli_query($con, $delete_product);
                                    
                                    if($run_delete){
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }
                                }
                            }
                            if(isset($_POST['continue'])){
                                echo "<script>window.open('index.php')</script>";
                            }
                            //echo @$up_cart = updateaCart();
                        //}    
                        ?>
                            
                    </div>

        <br>
        <footer>
            <div class="footer">
                <nav>
                    <ul>
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="sviproizvodi.php">PROIZVODI</a></li>
                        <li><a href="onama.php">O NAMA</a></li>
                        <li><a href="lokacija.php">KAKO NAS NACI</a></li>
                        <li><a href="zaposleni.php">ZAPOSLENI</a></li>
                    </ul>
                </nav>
            </div>
        </footer>
    </body>
</html>