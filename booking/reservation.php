<?php

if (!isset($_SESSION['hotel_cart'])) {
  # code...
  redirect(WEB_ROOT.'index.php');
}


// if (isset($_POST['profileCheck'])) {
//   # code...
//     unset($_SESSION['pay']);
//    unset($_SESSION['hotel_cart']);
// }

/*$guestid =$_GET['guestid'];
$guest = new Guest();
$result=$guest->single_guest($guestid);*/

  $name = $_SESSION['name']; 
  $last = $_SESSION['last'];
  // $country =$_SESSION['country'];
  $city = $_SESSION['city'] ;
  $address = $_SESSION['address'];
  $zip =  $_SESSION['zip'] ;
  $phone = $_SESSION['phone'];
  // $email = $_SESSION['email'];
  // $password =$_SESSION['pass'];
  $stat = $_SESSION['pending'];

?>

 <div id="accom-title"  > 
    <div  class="pagetitle">   
            <h1  >Reservation Details
                 
            </h1> 
       </div> 
  </div>

<div class="container"> 

    <div class="col-xs-12 col-sm-11">
      <!--<div class="jumbotron">-->
        <div class="">
           

          <td valign="top" class="body" style="padding-bottom:10px;">

           <form action="index.php?view=payment" method="post"  name="" >
            <span id="printout">
            
           <p>
            <? print(Date("l F d, Y")); ?>
            <br/><br/>
           Sir/Madam <?php echo $name.' '.$last;?> <br/>
           <?php echo $address;?><br/>
           <?php echo $phone;?> <br/>
           <!-- <?php echo $email;?><br/><br/> -->
           Dear Sir/Madam. <?php echo $last;?>,<br/><br/>
           Greetings from Hotel Royal Beach Resorts!<br/><br/>
           Please check the details of your reservation:<br/><br/>
           <strong>GUEST NAME(S):</strong> <?php echo $name.' '.$last;?>


          </p>

        <table class="table table-hover">
              <thead>
                <tr  bgcolor="#999999">
                  <!-- <th width="10">#</th> -->
                  <th align="center" width="120">Room Type</th>
                  <th align="center" width="120">Check In</th>
                  <th align="center" width="120">Check Out</th>
                  <th align="center" width="120">Nights</th>
                  <th  width="120">Price</th>
                  <th align="center" width="120">Room</th>
                  <th align="center" width="90">Amount</th> 
                </tr> 
              </thead>
          <tbody>
          
            <?php




             // $arival   = $_SESSION['from']; 
             //  $departure = $_SESSION['to']; 
              // $days = dateDiff($arival,$departure);
              $count_cart = count($_SESSION['hotel_cart']);

                for ($i=0; $i < $count_cart  ; $i++) {    
              $mydb->setQuery("SELECT * FROM `tblroom` r, `tblaccomodation` a WHERE  r.`ACCOMID`=a.`ACCOMID` AND `ROOMID` =". $_SESSION['hotel_cart'][$i]['hotelroomid']);
              $cur = $mydb->loadResultList();

              foreach ($cur as $result) {
                echo '<tr>'; 
                // echo '<td></td>';
                echo '<td>'. $result->ROOM.' '. $result->ACCOMODATION.'</td>';
                echo '<td>'.$_SESSION['hotel_cart'][$i]['hotelcheckin'].'</td>';
                echo '<td>'.$_SESSION['hotel_cart'][$i]['hotelcheckout'].'</td>';
                echo '<td>'.$_SESSION['hotel_cart'][$i]['hotelday'].'</td>';
                echo '<td> &euro;'. $result->PRICE.'</td>';
                echo '<td >1</td>';
                echo '<td >&euro;'. $_SESSION['hotel_cart'][$i]['hotelroomprice'].'</td>'; 
                echo '</tr>';
              } 


          }
           $payable= $result->PRICE *$days;
           $_SESSION['pay']= $payable;
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="5"></td><td align="right"><h5><b>Order Total: </b></h5>
              <td align="left">
              <h5><b> <?php echo '&euro;' . $payable= $days*$result->PRICE; ?></b></h5>
                           
              </td>
            </tr>
            <!--   <tr>
            <td colspan="4"></td><td colspan="5">
                  <div class="col-xs-12 col-sm-12" align="right">
                      <button type="submit" class="btn btn-primary" align="right" name="btnlogin">Payout</button>
                  </div>

            </td>
            </tr> -->

          </tfoot>  
        </table>

    <?php   
     // unset($_SESSION['pay']);
     //    unset($_SESSION['hotel_cart']);
        ?>
</span>
<div id="divButtons" name="divButtons">
<a href="print_reservation.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
<!-- <input type="button" value="Print" onclick="tablePrint();" class="btn btn-primary"> -->
</div>
              </form>
 
        </div>
    <!--  </div>-->
    </div>
    <!--/span--> 
    <!--Sidebar-->

  </div>
  <!--/row-->
  <script>
function tablePrint(){ 
 document.all.divButtons.style.visibility = 'hidden';  
    var display_setting="toolbar=no,location=no,directories=no,menubar=no,";  
    display_setting+="scrollbars=no,width=500, height=500, left=100, top=25";  
    var content_innerhtml = document.getElementById("printout").innerHTML;  
    var document_print=window.open("","",display_setting);  
    document_print.document.open();  
    document_print.document.write('<body style="font-family:verdana; font-size:12px;" onLoad="self.print();self.close();" >');  
    document_print.document.write(content_innerhtml);  
    document_print.document.write('</body></html>');  
    document_print.print();  
    document_print.document.close(); 
   
    return false;  
    } 
  $(document).ready(function() {
    oTable = jQuery('#list').dataTable({
    "bJQueryUI": true,
    "sPaginationType": "full_numbers"
    } );
  });   
</script>