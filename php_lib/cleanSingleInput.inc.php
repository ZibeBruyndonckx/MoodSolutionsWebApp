<?php
try {
    function cleanSingleInput($_input)
    {
        // clean input
        $_clean = trim($_input);
        $_clean = stripslashes($_clean);
        $_clean = htmlspecialchars($_clean);

        // return cleaned input
        return $_clean;
    }
    if(isset($_POST['input_name'])) {
        $cleanedInput = cleanSingleInput($_POST['input_name']);
        //$cleanedInput now contains cleaned value of the input name
    }
}
catch (Exception $_exception) /* Exception Handling */
{
   require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>
