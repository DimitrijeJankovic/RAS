<?php
    $total = 0;
    include ("includes/db.php");
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
                                       $proizvod_ime = $pp_price['proizvod_naziv'];
                                       
            
                                       $values = array_sum($proizvod_cena);
                                       
                                       $total += $values;
                                    }}


?>

<div>
    <form method="post" action="">
        <table width="500" align="center">
            <tr align="center">
                <td>Plati puetem Peypala:</td>
            <p style="align-content: center;"><img src="images/paypal-logo-1.png" width="450" ></p>
            </tr>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                <!-- Identify your business so that you can collect the payments. -->
                <input type="hidden" name="business" value="roudrunner@shop.com">

                <!-- Specify a Buy Now button. -->
                <input type="hidden" name="cmd" value="_xclick">

                <!-- Specify details about the item that buyers will purchase. -->
                <input type="hidden" name="item_name" value=<?php echo $proizvod_ime;  ?>>
                <input type="hidden" name="amount" value="<?php echo $total; ?>">
                <input type="hidden" name="currency_code" value="RSD">
                
                <input type="hidden" name="return" value="paypal_success.php">
                <input type="hidden" name="cancel_return" value="index.php">
                
                
                <!-- Display the payment button. -->
                <input type="image" name="submit" border="0"
                       src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png"
                       alt="Buy Now">
                <img alt="" border="0" width="1" height="1"
                     src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

            </form>


        </table>
    </form>
</div>
