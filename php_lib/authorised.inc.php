<?php
try {
    function authorised()
    {
        if (DEVELOPMENT_MODE) {
            return; // no security check required
        }
        global $_PDO;
        $_email = isset($_SESSION['user_email']) ? $_SESSION['user_email'] : "unknown";
        $_action = "Unauthenticated search attempt";

        require_once("../php_lib/persistentLogin.inc.php");
        if (!isset($_SESSION["authenticated"])) {
            if (!persistentLogin()) {
                $_rol = 0;
            }
        } else {
            $_rol = isset($_SESSION['user_rol']) ? $_SESSION['user_rol'] : 0;
        }
        $_script = basename($_SERVER['PHP_SELF']);
        $_query = "SELECT * FROM ts_authorisation
                   WHERE (d_script = '$_script'
                   AND d_$_rol = 1);";
        $_result = $_PDO->query($_query);

        if ($_result->rowCount() == 0) {
            header("Location:../extra/fatalError.html");
            require_once("../php_lib/logSecurityInfo.inc.php");
            logSecurityInfo($_email, $_action);
            exit;
        }
    }
} catch (Exception $_exception) {
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>