<?php
try {
  function inlezen($_bestand)
{ // lees file
$_pointer = fopen("../html/$_bestand", 'rb');
$_return_waarde = fread($_pointer, 10000);
fclose($_pointer);

return ($_return_waarde);
}
}
catch (Exception $_exception) /* Exception Handling */
{
 require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>