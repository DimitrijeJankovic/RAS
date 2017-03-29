<!DOCTYPE>
<html>
    <head>
        <title>Admin deo!</title>
        <link rel="stylesheet" href="styles/style.css"/>
              
    </head>
    <body>
        <div class="main_wrapper">
            <div></div>
            <div id="right">
                <h2 style="text-align: center; padding-top: 10px;">Manager Content</h2>
                <br/>
                <a href="index.php?unesi_vrsta">- Unesi nove vrste proizvoda</a>
                <a href="index.php?pogled_vrsta">- Pogledaj sve vrste proizvda</a>
                <a href="index.php?unesi_products">- Unesi nove proizvode</a>
                <a href="index.php?pogled_products">- Pogledaj sve proizvode</a>
                
                <br/>
                
                
                
            </div>
            <div id="left">
                <?php
                
                    if(isset($_GET['unesi_vrsta'])){
                        
                        include ("dodaj_vrste_pro.php");
                    }
                    
                    if(isset($_GET['pogled_vrsta'])){
                        
                        include ("pogled_vrsta.php");
                    }
                    
                    if(isset($_GET['izmeni_vrstu'])){
                        
                        include ("izmeni_vrsta.php");
                    }
                    
                    if(isset($_GET['unesi_products'])){
                        
                        include ("dodaj_proizvode.php");  
                    }
                    
                    if(isset($_GET['pogled_products'])){
                        
                        include ("pogled_proizvoda.php");
                    }
                    
                    if(isset($_GET['izmeni_proizvod'])){
                        
                        include ("izmeni_proizvod.php");
                    }
                    
                    if(isset($_GET['pogled_customers'])){
                        
                        include ("pogled_korisnika.php");
                    }
                
                
                
                
                ?>
            </div>
        </div>
    </body>
</html>