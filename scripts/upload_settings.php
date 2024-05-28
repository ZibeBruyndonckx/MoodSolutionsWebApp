<?php
try {
    /* Initialisatie */
    require_once("../code/initialisatie.inc.php");

    // Construct HTML output
    $_output .= '
    <h1>Verander uw profielfoto</h1>
    <a href="../scripts/upload_pfp.php">hier</a>
    ';

    // Role change form
    if ($_SESSION['user_rol'] > 1) {
        $_output .= '<h1>Change Your Role</h1>
        <form action="'.$_srv.'" method="post">
            <label for="new_role">Select New Role:</label>
            <select name="new_role" id="new_role">';

        for ($_i = $_SESSION['user_rol'] - 1; $_i > 0; $_i--) {
            $_output .= '<option value="'.$_i.'">Role '.$_i.'</option>';
        }
        $_output .= '</select>
            <button type="submit" name="change_role">Change Role</button>
        </form>';

        // Process role change request
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["change_role"])) {
            $_new_role = $_POST["new_role"];
            if ($_SESSION['user_rol'] > 2 && $_new_role == 2) {
                $_SESSION['user_rol'] = $_new_role;
                $_output .= '<h1>Uw heeft nu tijdelijk rol 2</h1>';
                $_output .= '<a href="../scripts/O_home.php" target="_blank">Home</a>';
                echo "<script>setTimeout(function() { window.close(); }, 3000);</script>";
            } elseif ($_SESSION['user_rol'] > 1 && $_new_role == 1) {
                $_SESSION['user_rol'] = $_new_role;
                $_output .= '<h1>Uw heeft nu tijdelijk rol 1</h1>';
                $_output .= '<a href="../scripts/home.php" target="_blank">Home</a>';
                echo "<script>setTimeout(function() { window.close(); }, 10000);</script>";
            }
        }
    }

    /* Output */
    require_once("../smarty/mySmarty.inc.php");
    $_smarty->assign('inhoud', $_output);
    $_smarty->display('upload.tpl');
} catch (Exception $_exception) /* Exception Handling */ {
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>