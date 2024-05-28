<?php
try {
  function dropDown($_name, $_table, $_number, $_mnemonic, $_start = 0, $_select = 0)
{
global $_PDO; // For Scope
$_output = "<select name='$_name' id= '$_name'>\n";
$_result = $_PDO -> query("SELECT $_number, $_mnemonic FROM $_table");

if ($_result -> rowCount() == 0)
{
throw new PDOException("$_table --> geen records");
}

while ($_row = $_result -> fetch(PDO::FETCH_ASSOC))
{
if($_row[$_number] >= $_start)
{
$_output.="<option value='".$_row[$_number]."'";
if ($_row[$_number] == $_select)
{
$_output.=" selected ";
}
$_output.=">".$_row[$_mnemonic]."</option>\n";
}
}
$_output.="</select>\n";
return $_output;
}
}
catch (Exception $_exception) /* Exception Handling */
{
 require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>