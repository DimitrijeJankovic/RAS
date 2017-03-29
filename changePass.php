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
        
        <!-- login form star -->
        <div class="col-lg-12">
           <?php 
           if(isset($_POST['submit'])){
               if(empty($_POST['new_pass'])){
                   echo "Unesite novu lozinku.";
               }else{
                   updateUserPass($_POST);
               }
           }
           if(isset($_SESSION['user'])){
            // $user = getUserData($_SESSION['user']['korisnik_id']);
           ?>
           
            <form action="" method="POST">
            <div class="form-group">
                <label for="usr">Nova lozinka:</label>
                <input  type="password" name="new_pass" class="form-control" id="usr">
            </div>
                <input type="hidden" name="user_id" value="<?=$_SESSION['user']['korisnik_id']?>" />
                <button type="submit" name="submit" class="btn btn-primary">Potvrdi</button>
            </form>
           <?php } ?>
        </div>
        
         <!-- login form end -->
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