<?php
try {
function createSelect($_table, $_value, $_column)
{
  $_prev_par = false;
  $_query = "SELECT * FROM $_table";

  foreach ($_value as $_key => $_value)
  {
    if ($_value != "" && $_value != "0")
    {
      if ($_prev_par) {
        $_query .= " AND ";
      } else {
        $_query .= " WHERE ";
      }
      $_query .= $_column[$_key] . " = '$_value'";
      $_prev_par = true;
    }
  }
  $_query .= ";";
  return $_query;
}
}
catch (Exception $_exception) /* Exception Handling */
{
 require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>