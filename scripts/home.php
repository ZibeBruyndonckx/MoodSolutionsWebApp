<?php
//error_reporting(E_ALL); ini_set('display_errors', 1);
try
{
 /* Initialisatie */
 require_once("../code/initialisatie.inc.php");
 //authorised();

 /* Process */
 $_output = inlezen('U_home.html');

 /* Output */
 if ($_SESSION['authenticated']) {
    $_menu =  1;
    $_userInfoDisplay[0] = true;
    $_userInfoDisplay[1] = $_SESSION['user_name'];
    $_userInfoDisplay[2] = $_SESSION['user_pfp'];
 } else {
    $_menu =  0;
 }
 require_once("../code/output.inc.php");

}
catch (Exception $_exception) /* Exception Handling */
{
  require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>