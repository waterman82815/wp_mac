<?php 
session_start();
session_unset();
    $_SESSION['FBID'] = NULL;
    $_SESSION['FULLNAME'] = NULL;
    $_SESSION['EMAIL'] =  NULL;
//header("Location: index.php");
header("Location: " ."http://waterman82815.github.io/wp_mac/facebook_example/index.php"); 
       // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>
