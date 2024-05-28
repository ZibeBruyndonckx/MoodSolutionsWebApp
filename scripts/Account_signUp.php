<?php
try {
    require_once("../code/initialisatie.inc.php");

    if (isset($_POST['submit'])) /* Process */
    { // Setup variables
        $_vNaam = $_POST['vNaam'];
        $_aNaam = $_POST['aNaam'];
        $_email = $_POST['email'];
        $_password = $_POST['paswoord'];
        $_cPassword = $_POST['confirmPaswoord'];
        $_pfp_URl = "../img/pfp/pfp_0.png";

        if (!empty($_vNaam) && !empty($_aNaam) && !empty($_email) && !empty($_password) && !empty($_cPassword)) // Check input
        {
            if (preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>ยง~])[A-Za-z\d!@#$%^&*()\-_=+{};:,<.>ยง~]{7,}$/', $_password)) {
                if ($_password == $_cPassword) // Compare passwords
                {
                    // Check if email is already in use
                    $query = "SELECT * FROM ts_authentication WHERE d_email = :email";
                    $stmt = $_PDO->prepare($query);
                    $stmt->bindParam(':email', $_email);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($user) {
                        $_msg = "Deze email is al in gebruik";
                    } else {
                        // Check successful, Encrypt password
                        require_once("../php_lib/encrypt.inc.php");
                        $_encrypted = encrypt($_password, $_email);

                        // Add to database
                        $_query = "INSERT INTO ts_authentication (d_email, d_paswoord, d_token, d_expire, d_faultCntr, d_timeOut, d_rol, d_resetTimer, d_vNaam, d_aNaam, d_pfp_URL) VALUES (:email, :password, '', 0, 0, 0, 1, 0, :vNaam, :aNaam, :pfp_URL)";
                        $_stmt = $_PDO->prepare($_query);
                        $_stmt->bindParam(':vNaam', $_vNaam);
                        $_stmt->bindParam(':aNaam', $_aNaam);
                        $_stmt->bindParam(':email', $_email);
                        $_stmt->bindParam(':password', $_encrypted);
                        $_stmt->bindParam(':pfp_URL', $_pfp_URl);
                        $_stmt->execute();

                        // Go to homepage
                        header("Location: home.php");
                        $_msg = "Account aangemaakt";
                        require_once('../php_lib/logSecurityInfo.inc.php');
                        logSecurityInfo($_email, $_msg);
                        exit();
                    }
                }
            else {
                // Check failed
                $_msg = "Verschillende paswoorden.";
            }
        } else {
        // Password not strong enough
        $_msg = "Paswoord moet, 1 Hoofdletter, kleine letter, cijfer en special charachter hebben. Minimum 7 tekens lang";
    }
        } else {
            // Missing input
            $_msg = "Vul alle velden in.";
        }
    }

    /* Output */
    require_once("../smarty/mySmarty.inc.php");
    $_smarty->assign('msg', $_msg);
    $_smarty->assign('action', $_srv);
    $_smarty->display('signUp.tpl');
}
catch (Exception $_exception) /* Exception Handling */
{
  require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>