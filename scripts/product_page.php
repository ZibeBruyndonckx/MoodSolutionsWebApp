<?php
try {
    /* Initialisatie */
    require_once("../code/initialisatie.inc.php");

    if (!isset($_GET['productID']) && !isset($_GET['from'])) {
        die("Er was een error, probeer later opnieuw");
    }
    $_productID = $_GET['productID'];
    $_fromScript = $_GET['from'];

    $_output .= '<button id="goBackBtn" onclick="goBack()">Terug naar ' . htmlspecialchars($_fromScript) . '</button>';

    // Fetch product details from the database
    $_query = "SELECT p.d_productNaam, p.d_shortDescription, p.d_longDescription, p.d_prijs, p.d_maxStock, p.d_product_URL, c.d_categorieNaam, p.d_extra 
              FROM t_producten p
              JOIN t_categorieen c ON p.t_categorieën_d_categorieID = c.d_categorieID
              WHERE p.d_productID = :productID";
    $_stmt = $_PDO->prepare($_query);
    $_stmt->bindParam(':productID', $_productID, PDO::PARAM_INT);
    $_stmt->execute();
    $_product = $_stmt->fetch(PDO::FETCH_ASSOC);

    if (!$_product) {
        die("Product not found.");
    }

    // Display product details
    $_output .= '<div class="product-details-container">';
    if (!empty($_product['d_productNaam']) || !empty($_product['d_categorieNaam'])) {
        $_output .= '<div class="product-header">';
        if (!empty($_product['d_productNaam'])) {
            $_output .= '<h1>' . htmlspecialchars($_product['d_productNaam']) . '</h1>';
        }
        if (!empty($_product['d_categorieNaam'])) {
            $_output .= '<p><strong>Category:</strong> ' . htmlspecialchars($_product['d_categorieNaam']) . '</p>';
        }
        $_output .= '</div>';
    }
    if (!empty($_product['d_prijs']) || !empty($_product['d_maxStock'])) {
        $_output .= '<div class="product-pricing">';
        if (!empty($_product['d_prijs'])) {
            $_output .= '<p><strong>Price:</strong> $_' . htmlspecialchars($_product['d_prijs']) . '</p>';
        }
        if (!empty($_product['d_maxStock'])) {
            $_output .= '<p><strong>Stock:</strong> ' . htmlspecialchars($_product['d_maxStock']) . '</p>';
        }
        $_output .= '</div>';
    }
    if (!empty($_product['d_shortDescription'])) {
        $_output .= '<p><strong>Korte Description:</strong> ' . nl2br(htmlspecialchars($_product['d_shortDescription'])) . '</p>';
    }
    if (!empty($_product['d_longDescription'])) {
        $_output .= '<p><strong>Long Description:</strong> ' . nl2br(htmlspecialchars($_product['d_longDescription'])) . '</p>';
    }
    if (!empty($_product['d_extra'])) {
        $_output .= '<p><strong>Extra:</strong> ' . htmlspecialchars($_product['d_extra']) . '</p>';
    }

    // Display the product file
    if (!empty($_product['d_product_URL']) && $_fromScript == "inventory") {
        $_fileURL = htmlspecialchars($_product['d_product_URL']);
        $_fileExtension = pathinfo($_fileURL, PATHINFO_EXTENSION);

        if ($_product['d_categorieNaam'] == 'Video') {
            $_output .= '<video width="100%" controls><source src="' . $_fileURL . '" type="video/' . $_fileExtension . '">De video kon niet worden geladen.</video>';
            $_output .= '<script>
        document.addEventListener("contextmenu", function(event) {event.preventDefault();
        });
        document.querySelectorAll("video").forEach(video => {video.addEventListener("dragstart", event => {event.preventDefault();
        });});</script>';
        }
         elseif ($_product['d_categorieNaam'] == 'Img') {
            $_output .= '<img src="' . $_fileURL . '" alt="' . htmlspecialchars($_product['d_productNaam']) . '" width="100%">
            <p><a id="downloadProduct" href="' . $_fileURL . '" download>Download ' . htmlspecialchars($_product['d_productNaam']) . '</a></p>';
        } else {
            $_output .= '<iframe src="' . $_fileURL . '" width="100%" height="600px"></iframe>
            <p><a id="downloadProduct" href="' . $_fileURL . '" download>Download ' . htmlspecialchars($_product['d_productNaam']) . '</a></p>';
        }
    }
    $_output .= '</div>';

    $_output .= '
    <script>
        function goBack() {
            window.history.back();
        }
    </script>';

    /* Output */
    if ($_SESSION['authenticated']) {
        if ($_SESSION['user_rol'] == 1) {
            $_menu = 1;
        } else {
            $_menu = 100;
        }
        $_userInfoDisplay[0] = true;
        $_userInfoDisplay[1] = $_SESSION['user_name'];
        $_userInfoDisplay[2] = $_SESSION['user_pfp'];
    } else {
        $_menu = 0;
    }
    require_once("../code/output.inc.php");
}
catch (Exception $_exception) {
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>