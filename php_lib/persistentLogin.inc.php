<?php
try {
    function persistentLogin()
    {
        global $_PDO; // for scope
        $_time = time();

        // persistentie cookie
        if (isset($_COOKIE["auth"])) {
            list($_token) = explode(':', $_COOKIE["auth"]);

            if (ctype_xdigit($_token)) {
                // token correct aanwezig + checkt in db

                $prepQuery = "SELECT d_user, d_rol, d_email, d_vNaam, d_pfp_URL
                              FROM ts_authentication
                              WHERE (d_token = :token
                              AND d_expire > :time)";

                $stmt = $_PDO->prepare($prepQuery);
                $stmt->execute(array(':token' => $_token, ':time' => $_time));

                if ($stmt->rowCount() == 1) // login gekend
                {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        // login gegevens ophalen + cookie gezet binnen de vorige x uur

                        $_SESSION['user_id']       = $row['d_user'];
                        $_SESSION['rol']           = $row['d_rol'];
                        $_SESSION['authenticated'] = true;
                        $_SESSION['email']         = $row['d_email'];
                        $_SESSION['user_name']     = $row['d_vNaam'];
                        $_SESSION['user_pfp']      = $row['d_pfp_URL'];

                        require_once "../php_lib/logSecurityInfo.inc.php";
                        logSecurityInfo($_SESSION['email'], "Persistent ingelogd");

                        return true;
                        // persistent ingelogged
                    }
                } else {
                    return false;
                    // combinatie token niet gevonden
                }
            } else {
                return false;
                // incorrecte cookie
            }
        } else {
            return false;
            // cookie afwezig
        }
    }
} catch (Exception $_exception) /* Exception handling */
{
   require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>