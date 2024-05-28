<?php
try {
    /* Initialisatie */
    require_once("../code/initialisatie.inc.php");

    // Fetch form db
    $_query = "SELECT d_categorieID, d_categorieNaam FROM t_categorieen";
    $_stmt = $_PDO->prepare($_query);
    $_stmt->execute();
    $_categories = $_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Form
    $_output .= '
    <div class="add-products-form-container">
    <h1>Upload nieuw product</h1>
    <form action="' . $_srv . '" method="post" enctype="multipart/form-data">
        <label for="d_productNaam">Product naam:</label>
        <input type="text" id="d_productNaam" name="d_productNaam" required><br>

        <label for="d_shortDescription">Korte beschrijving:</label>
        <textarea id="d_shortDescription" name="d_shortDescription" required></textarea><br>

        <label for="d_longDescription">Lange beschrijving:</label>
        <textarea id="d_longDescription" name="d_longDescription" required></textarea><br>

        <label for="d_prijs">Prijs:</label>
        <input type="number" id="d_prijs" name="d_prijs" required><br>

        <label for="d_maxStock">Maximale stock(optioneel):</label>
        <input type="number" id="d_maxStock" name="d_maxStock"><br>

        <label for="d_product_URL">Selecteer uw product:</label>
        <input type="file" id="d_product_URL" name="d_product_URL" required><br>

        <label for="t_categorieën_d_categorieID">Categorie:</label>
        <select id="t_categorieën_d_categorieID" name="t_categorieën_d_categorieID" required>
            <option value="" disabled selected>Kies een category</option>';
        foreach ($_categories as $_category) {
            $_output .= '<option value="' . $_category['d_categorieID'] . '">' . $_category['d_categorieNaam'] . '</option>';
        }
        $_output .= '
        </select><br>

        <label for="d_extra">Extra(optional):</label>
        <input type="text" id="d_extra" name="d_extra"><br>

        <button type="submit" name="submit">Upload Product</button>
    </form></div>';

    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Get form inputs
        $_productNaam = $_POST['d_productNaam'];
        $_shortDescription = $_POST['d_shortDescription'];
        $_longDescription = $_POST['d_longDescription'];
        $_prijs = $_POST['d_prijs'];
        $_maxStock = isset($_POST['d_maxStock']) ? $_POST['d_maxStock'] : null;
        $_productURL = "../products/" . basename($_FILES["d_product_URL"]["name"]);
        $_categorieID = $_POST['t_categorieën_d_categorieID'];
        $_extra = isset($_POST['d_extra']) ? $_POST['d_extra'] : null;

        // Insert into the database
        $_query = "INSERT INTO t_producten (d_productNaam, d_shortDescription, d_longDescription, d_prijs, d_maxStock, d_product_URL, t_categorieën_d_categorieID, d_extra)
                   VALUES (:productNaam, :shortDescription, :longDescription, :prijs, :maxStock, :productURL, :categorieID, :extra)";
        $_stmt = $_PDO->prepare($_query);
        $_stmt->bindParam(':productNaam', $_productNaam);
        $_stmt->bindParam(':shortDescription', $_shortDescription);
        $_stmt->bindParam(':longDescription', $_longDescription);
        $_stmt->bindParam(':prijs', $_prijs);
        $_stmt->bindParam(':maxStock', $_maxStock);
        $_stmt->bindParam(':productURL', $_productURL);
        $_stmt->bindParam(':categorieID', $_categorieID);
        $_stmt->bindParam(':extra', $_extra);
        $_stmt->execute();

        // Get the last inserted product ID
        $_productID = $_PDO->lastInsertId();

        // Fetch the category name
        $_query = "SELECT d_categorieNaam FROM t_categorieen WHERE d_categorieID = :categorieID";
        $_stmt = $_PDO->prepare($_query);
        $_stmt->bindParam(':categorieID', $_categorieID);
        $_stmt->execute();
        $_category = $_stmt->fetch(PDO::FETCH_ASSOC);

        // Extract the file extension from the uploaded file
        $_fileExtension = pathinfo($_productURL, PATHINFO_EXTENSION);

        // Generate the product URL
        $_productURL = "../products/" . $_category['d_categorieNaam'] . "/" . $_productID . "." . $_fileExtension;
        // Handle file upload
        if (!move_uploaded_file($_FILES["d_product_URL"]["tmp_name"], $_productURL)) {
            die("Error uploading product image.");
        }

        // Update the product record with the new URL
        $_query = "UPDATE t_producten SET d_product_URL = :productURL WHERE d_productID = :productID";
        $_stmt = $_PDO->prepare($_query);
        $_stmt->bindParam(':productURL', $_productURL);
        $_stmt->bindParam(':productID', $_productID);
        $_stmt->execute();

        $_output = "<h3>Product succesvol upgeload.</h3>" . $_output;
    }

    /* Output */
    $_menu = 100;
    $_userInfoDisplay[0] = true;
    $_userInfoDisplay[1] = $_SESSION['user_name'];
    $_userInfoDisplay[2] = $_SESSION['user_pfp'];
    require_once("../code/output.inc.php");
} catch (Exception $_exception) {
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>