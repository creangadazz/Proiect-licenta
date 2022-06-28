<?php 
require_once("../includes/initialize.php"); 

if (isset($_POST['mealid'])) {


 
	$meal = new MealType();
	$mealresult = $meal->single_meals($_POST['mealid']); 
	echo $price= $mealresult->MealPrice;
	// $_SESSION['MealPrice'] = $price;

  	$max=count($_SESSION['hotel_cart']);
    for($i=0;$i<$max;$i++){

      $rmid=$_SESSION['hotel_cart'][$i]['hotelroomid'];
 	  $days = intval(isset($_GET['day'.$rmid]) ? $_GET['day'.$_POST['roomid']] : "");


  
       $sql = "SELECT * FROM `tblroom` r ,`tblaccomodation` a WHERE r.`ACCOMID`=a.`ACCOMID` AND ROOMID =" . $rmid;
       $result = mysql_query($sql) or die(mysql_error());
       while ($row = mysql_fetch_array($result)) {
 
       		 if ($days > 0 && $days < 999) {
       		 	# code... 
       		 	$totprice = $days * $row['PRICE'] +  (double)($price);
				$_SESSION['hotel_cart'][$i]['hotelroomprice']= $totprice;
				// redirect("index.php");

       		 }
		      
		       
       	}
       }
 
    
}  
    ?>