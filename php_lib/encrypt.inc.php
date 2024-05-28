<?php
try {
function encrypt($_string, $_salt="")
{
$_firstHash = "tiger128,4";
$_secondHash = "ripemd160";

/* Encrypting */
// eerste hashing met twee verschillende algorithmen --string en salt
  $_encryptedInput = hash($_firstHash,$_string);
  $_encryptedSalt = hash($_secondHash,$_salt);

// tweede salted hashing
  $_intermediateHash = hash($_firstHash,($_encryptedInput.$_encryptedSalt));
  
// derde salted hashing
  $_intermediateHash = hash($_secondHash,($_intermediateHash. $_encryptedSalt));
                          
// finale hashing met sha256 --> resultaat is steeds 64 chars
  $_encrypted = hash('sha256',($_intermediateHash));
  
return ($_encrypted);
}
} catch (Exception $_exception) /* Exception handling */
{
  require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>