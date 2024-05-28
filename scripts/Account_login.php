<?php
try {
    require_once("../code/initialisatie.inc.php");
    require_once("../php_lib/persistentLogin.inc.php");

    // Check for persistent login
    if (persistentLogin()) {
        header('Location:../scripts/home.php');
    }
    if (!isset($_SESSION['OG_attempts'])) {
    $_SESSION['OG_attempts'] = 3;
    }

    if (isset($_POST['submit'])) /* Process */
    {
        $_email = $_POST['email'];
        $_password = $_POST['paswoord'];
        $_persistent = isset($_POST['persist']);

        if (!empty($_email) && !empty($_password)) // Check input
        {
            // Encrypt password
            require_once("../php_lib/encrypt.inc.php");
            $_encrypted = encrypt($_password, $_email);

            // Search in database
            $_query = "SELECT * FROM ts_authentication WHERE d_email = :email";
            $_stmt = $_PDO->prepare($_query);
            $_stmt->bindParam(':email', $_email);
            $_stmt->execute();
            $_user = $_stmt->fetch(PDO::FETCH_ASSOC);

            if ($_user) // Check if user exists
            {
                // Check if user is locked out due to too many failed attempts
                if ($_user['d_faultCntr'] >= 3 && $_user['d_timeOut'] > time()) {
                    $_SESSION['OG_attempts']++;
                    $_remainingTimeout = $_user['d_timeOut'] - time();
                    $_minutes = floor($_remainingTimeout / 60);
                    $_seconds = $_remainingTimeout % 60;
                    $_msg = "Te veel mislukte pogingen. Probeer het opnieuw in $_minutes minuten en $_seconds seconden.";
                } else {
                    if ($_encrypted == $_user['d_paswoord']) // Compare passwords
                    {
                        // Reset failed attempts
                        $_queryReset = "UPDATE ts_authentication SET d_faultCntr = 0, d_timeOut = 0 WHERE d_email = :email";
                        $_stmtReset = $_PDO->prepare($_queryReset);
                        $_stmtReset->bindParam(':email', $_email);
                        $_stmtReset->execute();

                        // Store user data in session
                        $_SESSION['user_rol'] = $_user['d_rol'];
                        $_SESSION['user_name'] = $_user['d_vNaam'];
                        $_SESSION['user_pfp'] = $_user['d_pfp_URL'];
                        $_SESSION['user_id'] = $_user['d_user'];
                        $_SESSION['user_email'] = $_email;
                        $_SESSION['authenticated'] = true;

                        // Process Persistent Login
                        if ($_persistent) {
                            $_token = encrypt(uniqid(rand(), true));
                            $_expire = time() + (60 * 60 * 8);
                            setcookie('auth', $_token, $_expire);
                            $_action = "Persistent ingelogd";
                        } else {
                            $_token = 0;
                            $_expire = 0;
                            $_action = "Ingelogd";
                        }

                        // Update authentication information in database
                        $prepQuery = "UPDATE ts_authentication
                                      SET d_faultCntr = '0',
                                          d_timeOut = '0',
                                          d_token = :token,
                                          d_expire = :expire
                                      WHERE d_user = :user";

                        $stmt = $_PDO->prepare($prepQuery);
                        $stmt->execute(array(':token' => $_token, ':expire' => $_expire, ':user' => $_SESSION['user_id']));

                        // Log action for Accounting
                        require_once("../php_lib/logSecurityInfo.inc.php");
                        logSecurityInfo($_SESSION['user_email'], $_action);

                        // Authentication successful
                        if ($_SESSION['user_rol'] == 1) {
                            header("Location: home.php");
                        } else  {
                            header("Location: O_home.php");
                        }
                        $_msg = "Ingelogd";
                        exit();
                    } else {
                        // Increase failed login attempts
                        if ($_user['d_faultCntr'] >= 2) {
                            $_timeout = time() + $_user['d_faultCntr']* 30;
                        } else {
                            $_timeout = 0;
                        }
                        $_faultCntr = $_user['d_faultCntr'] + 1;
                        $_pogingLeft = $_SESSION['OG_attempts'] - $_faultCntr;
                        $_queryUpdate = "UPDATE ts_authentication SET d_faultCntr = :faultCntr, d_timeOut = :timeout WHERE d_email = :email";
                        $_stmtUpdate = $_PDO->prepare($_queryUpdate);
                        $_stmtUpdate->bindParam(':faultCntr', $_faultCntr);
                        $_stmtUpdate->bindParam(':timeout', $_timeout);
                        $_stmtUpdate->bindParam(':email', $_email);
                        $_stmtUpdate->execute();

                        $_msg = "Foute email of paswoord. Nog $_pogingLeft poging(en)";
                    }
                }
            } else {
                $_msg = "Gebruiker niet gevonden";
            }
        } else {
            // Missing input
            $_msg = "Vul beide velden in.";
        }
        // Log msg for Accounting
        require_once("../php_lib/logSecurityInfo.inc.php");
        logSecurityInfo($_email, $_msg);
    }

    /* Output */
    require_once("../smarty/mySmarty.inc.php");
    $_smarty->assign('msg', $_msg);
    $_smarty->assign('action', $_srv);
    $_smarty->display('login.tpl');
}
catch (Exception $_exception) /* Exception Handling */
{
  require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>