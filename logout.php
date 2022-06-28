<?php
require_once("includes/initialize.php");


// 1. Find the session
@session_start();
 
// 2. Unset all the session variables
unset($_SESSION['GUESTID']);	
unset($_SESSION['name']); 		
unset($_SESSION['last']);	
unset($_SESSION['country']);
unset($_SESSION['city']); 		
unset($_SESSION['address']); 		
unset($_SESSION['phone']); 	
unset($_SESSION['email']); 		
unset($_SESSION['pass']); 	
unset($_SESSION['from']); 
unset($_SESSION['to']); 	
unset($_SESSION['hotel_cart']); 	


//Destroy the session
//session_destroy();

redirect(WEB_ROOT ."index.php?logout=1");
?>

