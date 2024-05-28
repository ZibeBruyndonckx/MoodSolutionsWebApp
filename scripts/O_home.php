<?php
try
{
  /* Initialisatie */
  require_once("../code/initialisatie.inc.php");

  /* Process */
  $_output = inlezen('O_home.html');

  /* Output */

  $_menu =  100;
  $_userInfoDisplay[0] = true;
  $_userInfoDisplay[1] = $_SESSION['user_name'];
  $_userInfoDisplay[2] = $_SESSION['user_pfp'];

  require_once("../code/output.inc.php");
}
catch (Exception $_exception) /* Exception Handling */
{
  require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>