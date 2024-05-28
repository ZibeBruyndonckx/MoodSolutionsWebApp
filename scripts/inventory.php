<?php
try {
    require_once("../code/initialisatie.inc.php");
    require_once("../php_lib/getCategoryName.inc.php");

    if ($_SESSION['authenticated']) {
        $_userID = $_SESSION['user_id'];
        $_search = isset($_GET['search']) ? $_GET['search'] : '';

        // Query to fetch inventory
        $_query = "SELECT p.d_productID, p.d_productNaam, p.d_shortDescription, p.d_prijs, p.t_categorieën_d_categorieID
                   FROM t_aankopen a
                   JOIN t_producten p ON a.t_producten_d_productID = p.d_productID
                   WHERE a.ts_authentication_d_user = :userID";

        if (!empty($_search)) {
            $_query .= " AND LOWER(d_productNaam) LIKE LOWER('%$_search%')";
        }
        $_stmt = $_PDO->prepare($_query);
        $_stmt->bindParam(':userID', $_userID);
        $_stmt->execute();
        $_inventory = $_stmt->fetchAll(PDO::FETCH_ASSOC);

        $_output .= '<h2>Inventory: </h2>';

        // Search bar
        $_output .= '<div id="search-bar">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search..." id="search" value="' . htmlspecialchars($_search) . '">
            <button type="submit" id="search-button">
                <img src="../img/searchIcon.png" alt="Search">
            </button>
        </form>
        </div>';

        if (empty($_inventory)) {
            $_output .= '<h3>Je hebt momenteel geen items in jouw inventory</h3>';
        } else {
            $_output .= '<div class="product-list">';

            // Loop to display products owned
            foreach ($_inventory as $_product) {
                $_output .= '<div class="product" data-cat="' . getCategoryName($_product['t_categorieën_d_categorieID']) .
                '" data-price="' . $_product['d_prijs'] . '" onclick="viewProduct(' . $_product['d_productID'] . ')">
                <p id="productName"><strong>' . $_product['d_productNaam'] . '</strong></p>
                <p id="productSDescription">' . $_product['d_shortDescription'] . '</p>
                <p id="productPrice">€' . $_product['d_prijs'] . '</p>
                <p id="productCategory">' . getCategoryName($_product['t_categorieën_d_categorieID']) . '</p>
                </div>';
            }
            $_output .= '</div></div>';
        }
        $_output .= '
        <script>
            function viewProduct(productID) {
                window.location.href = "product_page.php?productID=" + productID + "&from=inventory";
            }
        </script>';

        /* Output */
        $_menu = 1;
        $_userInfoDisplay[0] = true;
        $_userInfoDisplay[1] = $_SESSION['user_name'];
        $_userInfoDisplay[2] = $_SESSION['user_pfp'];
        require_once("../code/output.inc.php");
    }
} catch (Exception $_exception) {
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>