<?php
try {
    /* Initialisatie */
    require_once("../code/initialisatie.inc.php");

    /* Process */
    if (isset($_POST['submit'])) {
    $_persistent = isset($_POST['persist']);
    $_email = $_SESSION['user_email'];
    
    // Check if persistent logout is requested
    if ($_persistent) {
        // Update database to clear persistent login data
        $_query = "UPDATE ts_authentication
                  SET
                      d_token = '',
                      d_expire = 0
                  WHERE d_user = :user_id";
        $_stmt = $_PDO->prepare($_query);
        $_stmt->bindParam(':user_id', $_SESSION['user_id']);
        $_stmt->execute();
        $_msg = "Persistent uitgelogd";
    } else {
        $_msg = "Uitgelogd";
    }

    // Account logs
    require_once('../php_lib/logSecurityInfo.inc.php');
    logSecurityInfo($_email, $_msg);

    // Destroy session
    session_destroy();
    header("Location: home.php");
    exit;
  }

    /* Output */
    require_once("../smarty/mySmarty.inc.php");
    $_smarty->assign('msg', $_msg);
    $_smarty->assign('action', $_srv);
    $_smarty->display('logout.tpl');
} catch (Exception $_exception) /* Exception Handling */ {
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>
