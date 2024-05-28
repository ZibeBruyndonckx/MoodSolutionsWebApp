<?php
try {
 function cleanInput()
 {
  foreach($_POST as $_name => $_inhoud )
  {
   // clean the input
   $_clean = trim($_inhoud);
   $_clean = stripcslashes($_clean);
   $_clean = htmlspecialchars($_clean);

   // return the cleaned input
   $_POST[$_name] = $_clean;
  }
 }
}
catch (Exception $_exception) /* Exception Handling */
{
 require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>