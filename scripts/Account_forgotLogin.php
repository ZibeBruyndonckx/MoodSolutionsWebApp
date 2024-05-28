<?php
try {
    require_once("../code/initialisatie.inc.php");

    if (isset($_POST['submit'])) /* Process */
    {
        $_email = $_POST['email'];
        if (!empty($_email)) // Check input
        {
            // Search in database
            $_query = "SELECT * FROM ts_authentication WHERE d_email = :email";
            $_stmt = $_PDO->prepare($_query);
            $_stmt->bindParam(':email', $_email);
            $_stmt->execute();
            $_user = $_stmt->fetch(PDO::FETCH_ASSOC);

            if ($_email == $_user['d_email']) // Check email
            { /* Send email to change password */
                // Extract user name
                $_recipientName = $_user['d_vNaam'];
                
                require_once("../sendgrid-php/sendgrid-php.php");
                $_apiKeyFile = "../sendgrid.env";
                $_apiKeyContent = file_get_contents($_apiKeyFile);
                
                // Extract the API key from the file content
                if ($_apiKeyContent !== false) {
                        preg_match("/'(.+?)'/", $_apiKeyContent, $_matches);
                            if (isset($_matches[1])) {
                                $_apiKey = $_matches[1];
                            } else {
                                 die("Er liep een Error op");
                            }
                        } else {
                            die("Er liep een error op");
                        }

                $email = new \SendGrid\Mail\Mail();
                $email->setFrom("zibe@proflab.be", "Mood Solutions");
                $email->setSubject("Reset jouw wachtwoord nu");
                $email->addTo($_email, $_recipientName);
                $email->addContent("text/html",  "
                <html>
                    <head>
                       <title>Reset jouw wachtwoord nu</title>
                    </head>
                    <body>
                       <h2>Reset jouw wachtwoord nu</h2>
                       <p>Was jij dit niet? Verander dan onmiddellijk jouw wachtwoord.</p>
                       <p><a href='http://localhost/EindProjectZibe/scripts/Account_resetPsw.php?email=".$_email."'><button>Reset Password</button></a></p>
                    </body>
                </html>
                        ");
                $sendgrid = new \SendGrid($_apiKey);
                try {
                    $_expire = time() + (60 * 5);
                    $_query = "UPDATE ts_authentication SET d_resetTimer = :expire WHERE d_email = :email";
                    $_stmt = $_PDO->prepare($_query);
                    $_stmt->bindParam(':expire', $_expire);
                    $_stmt->bindParam(':email', $_email);
                    $_stmt->execute();

                    $response = $sendgrid->send($email); /*
                    print $response->statusCode() . "\n";
                    print_r($response->headers());
                    print $response->body() . "\n"; */
                }
                catch (Exception $_exception) /* Exception Handling */
                {
                    require_once("../php_lib/myExceptionHandeling.inc.php");
                }
                require_once("../php_lib/logSecurityInfo.inc.php");
                $_msg = "Reset is send to email";
                logSecurityInfo($_email, $_msg);
            } else {
                // Authentication failed
                $_msg = "Foute email";
            }
        } else {
            // Missing input
            $_msg = "Vul het veld in.";
        }
    }
    /* Output */
    require_once("../smarty/mySmarty.inc.php");
    $_smarty->assign('msg', $_msg);
    $_smarty->assign('action', $_srv);
    $_smarty->display('forgotLogin.tpl');
}
catch (Exception $_exception) /* Exception Handling */
{
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>