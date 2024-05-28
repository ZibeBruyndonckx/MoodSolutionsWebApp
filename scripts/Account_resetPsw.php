<?php
try {
    require_once("../code/initialisatie.inc.php");
    if (isset($_GET['email'])) {
       $_email = $_GET['email'];

       $_query = "SELECT d_resetTimer FROM ts_authentication WHERE d_email = :email";
       $_stmt = $_PDO->prepare($_query);
       $_stmt->bindParam(':email', $_email);
       $_stmt->execute();
       $_resetTimer = $_stmt->fetchColumn();
       if (time() < $_resetTimer){
       $_query = "UPDATE ts_authentication SET d_resetTimer = 0 WHERE d_email = :email";
       $_stmt = $_PDO->prepare($_query);
       $_stmt->bindParam(':email', $_email);
       $_stmt->execute();
       } else if (time() > $_resetTimer) {
        header("Location: ../404.php");
        exit();
    }
    } else {
       header("Location: ../404.php");
       exit();
    }
    if (isset($_POST['submit'])) {
        // Setup variables
        $_password = $_POST['paswoord'];
        $_cPassword = $_POST['confirmPaswoord'];

        if (!empty($_email) && !empty($_password) && !empty($_cPassword)) {
            if ($_password == $_cPassword) {
                // Encrypt password
                require_once("../php_lib/encrypt.inc.php");
                $_encrypted = encrypt($_password, $_email);

                // Update password in database
                $_query = "UPDATE ts_authentication SET d_paswoord = :password WHERE d_email = :email";
                $_stmt = $_PDO->prepare($_query);
                $_stmt->bindParam(':password', $_encrypted);
                $_stmt->bindParam(':email', $_email);
                $_stmt->execute();

                // Display msg and go to login page
                require_once("../php_lib/logSecurityInfo.inc.php");
                $_msg = "Reset was succesvol. Je wordt binnen 3 seconden doorgestuurd naar de loginpagina.";
                header("refresh:3; url=Account_login.php");
                logSecurityInfo($_email, $_msg);
            } else {
                // Passwords do not match
                $_msg = "Passwords do not match.";
            }
        } else {
            // Missing input
            $_msg = "Fill in all fields.";
        }
    }
    // Output
    require_once("../smarty/mySmarty.inc.php");
    $_smarty->assign('msg', $_msg);
    $_smarty->assign('action', $_srv);
    $_smarty->assign('email', $_email);
    $_smarty->display('resetPsw.tpl');
} catch (Exception $_exception) {
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>