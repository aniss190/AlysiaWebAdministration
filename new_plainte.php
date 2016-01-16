<?php

  include ('infoConnexion.php');
  include ('function.php');
  @session_start ();

  $plaignant= addslashes($_REQUEST['plaignant']);
  $coupable= addslashes($_REQUEST['coupable']);
  $descript= addslashes($_REQUEST['description']);
  $preuve= addslashes($_REQUEST['preuve']);
  $conclusion= addslashes($_REQUEST['conclusion']);
  $sanction= addslashes($_REQUEST['sanction']);

  $date=date("Y-m-d");

  $present = 1;

  $modo=$_SESSION['nom'];
   
  addplainte($modo,$plaignant,$date,$coupable,$descript,$preuve,$conclusion,$sanction, $present);
  
  if($role=="admin"){
    header("Location:base.php?plainteAdded");
  }
  else{
    header("Location:new-plainte.php?plainteAdded");
  }

?>

  


  
