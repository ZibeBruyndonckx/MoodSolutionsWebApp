<?php
try {
 function radioButton($_name, $_table, $_number, $_mnemonic, $_start = 0, $_select = 0, $_extra ="")
 {
  global $_PDO; // for scope

  $_output ="\n";
  $_result = $_PDO -> query("SELECT $_number, $_mnemonic  FROM $_table");

  if ($_result -> rowCount() == 0)
  {
   throw new PDOException("$_table --> geen records");
  }
  while ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
  {
   if($_row[$_number] >= $_start)
   {
      $_output.= "<input type=radio class='clearfix' name=$_name id=$_name value=".$_row[$_number]." $_extra";
      if ($_row[$_number] == $_select)
      {
        $_output.=" checked ";
      }
      $_output.=">".$_row[$_mnemonic]."<br>";
    }
  }

  return $_output;
 }
}
catch (Exception $_exception) /* Exception Handling */
{
 require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>