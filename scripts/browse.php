<?php
try {
    /* Initialisatie */
    require_once("../code/initialisatie.inc.php");
    require_once("../php_lib/getCategoryName.inc.php");

    /* Process */
    // Get filter inputs
    $_search = isset($_GET['search']) ? $_GET['search'] : '';
    $_minSPrice = isset($_GET['minprice']) ? $_GET['minprice'] : '';
    $_maxSPrice = isset($_GET['maxprice']) ? $_GET['maxprice'] : '';
    $_Scategory = isset($_GET['product_type']) ? $_GET['product_type'] : [];

    // Construct query
    $_query = "SELECT d_productID, d_productNaam, d_shortDescription, d_prijs, t_categorieën_d_categorieID FROM t_producten WHERE 1=1";
    if (!empty($_search)) {
        $_query .= " AND LOWER(d_productNaam) LIKE LOWER('%$_search%')";
    }
    if (!empty($_Scategory)) {
        $_categoryIDs = implode(',', $_Scategory);
        $_query .= " AND t_categorieën_d_categorieID IN ($_categoryIDs)";
    }
    if (!empty($_minSPrice)) {
        $_query .= " AND d_prijs >= $_minSPrice";
    }
    if (!empty($_maxSPrice)) {
        $_query .= " AND d_prijs <= $_maxSPrice";
    }

    // Pagination parameters
    $_limit = 16;
    $_currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $_offset = ($_currentPage - 1) * $_limit;

    // Add pagination to the query
    $_query .= " LIMIT $_limit OFFSET $_offset";
    $_stmt = $_PDO->prepare($_query);
    $_stmt->execute();
    $_products = $_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Query to fetch prices
    $_minPrice = isset($_SESSION['minPrice']) ? $_SESSION['minPrice'] : '';
    $_maxPrice = isset($_SESSION['maxPrice']) ? $_SESSION['maxPrice'] : '';
    if (!$_minPrice && !$_maxPrice) {
        $_queryMinMaxPrice = "SELECT MIN(d_prijs) AS minP, MAX(d_prijs) AS maxP FROM t_producten";
        $_stmtMinMaxPrice = $_PDO->prepare($_queryMinMaxPrice);
        $_stmtMinMaxPrice->execute();
        $_priceResults = $_stmtMinMaxPrice->fetch(PDO::FETCH_ASSOC);
        $_minPrice = $_priceResults['minP'];
        $_SESSION['minPrice'] = $_minPrice;
        $_maxPrice = $_priceResults['maxP'];
        $_SESSION['maxPrice'] = $_maxPrice;
    }
    // Query to fetch categories
    $_categories = isset($_SESSION['categories']) ? $_SESSION['categories'] : '';
    if (!$_categories) {
        $_queryCategories = "SELECT d_categorieID, d_categorieNaam FROM t_categorieen";
        $_stmtCategories = $_PDO->prepare($_queryCategories);
        $_stmtCategories->execute();
        $_categories = $_stmtCategories->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['categories'] = $_categories;
    }

    // Pagination logic (after filtering)
    $_totalProductsQuery = "SELECT COUNT(*) FROM t_producten WHERE 1=1";
    if (!empty($_search)) {
        $_totalProductsQuery .= " AND LOWER(d_productNaam) LIKE LOWER('%$_search%')";
    }
    if (!empty($_Scategory)) {
        $_categoryIDs = implode(',', $_Scategory);
        $_totalProductsQuery .= " AND t_categorieën_d_categorieID IN ($_categoryIDs)";
    }
    if (!empty($_minSPrice)) {
        $_totalProductsQuery .= " AND d_prijs >= $_minSPrice";
    }
    if (!empty($_maxSPrice)) {
        $_totalProductsQuery .= " AND d_prijs <= $_maxSPrice";
    }
    $_totalStmt = $_PDO->prepare($_totalProductsQuery);
    $_totalStmt->execute();
    $_totalProducts = $_totalStmt->fetchColumn();
    $_totalPages = ceil($_totalProducts / $_limit);

    // Search bar
    $_output =
        '<div id="search-bar">
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search..." id="search" value="' . htmlspecialchars($_search) . '">
        <button type="submit" id="search-button">
            <img src="../img/searchIcon.png" alt="Search">
        </button>
    </form>
    </div>';

    // main-main
    $_output .= '<div id="main-main">';
    // Left Panel for filters
    $_output .= '<div id="filter-container">
    <form method="GET" action="">';

    // Price Slider
    if (empty($_minSPrice)) {
        $_minSPrice = $_minPrice;
    }
    if (empty($_maxSPrice)) {
        $_maxSPrice = $_maxPrice;
    }
    $_output .=
        '<div class="price-slider">
    <label for="price-range">Price Range:</label> </br>
    <input type="number" name="minprice" min="' . $_minPrice . '" max="' . $_maxPrice . '"
     value="' . $_minSPrice . '"  id="price-min" class="price-min">
    <input type="range" id="price-range" name="minpriceSlider"  min="' . $_minPrice . '" max="' . $_maxPrice . '"
     value="' . $_minSPrice . '" step="5">
    <input type="range" id="price-range-max" name="maxpriceSlider" min="' . $_minPrice . '" max="' . $_maxPrice . '"
     value="' . $_maxSPrice . '" step="5">
    <input type="number" name="maxprice" min="' . $_minPrice . '" max="' . $_maxPrice . '"
     value="' . $_maxSPrice . '" id="price-max" class="price-max">
    </div>';

    // Output checkboxes
    $_output .=
        '<h4>Product Types</h4>
    <div id="categoryBoxes">';
    foreach ($_categories as $_category) {
        if (!empty($_Scategory)) {
            $_checked = in_array($_category['d_categorieID'], $_Scategory) ? 'checked' : '';
        } else {
            $_checked = 'checked';
        }
        $_output .=
            '<label for="cat' . $_category['d_categorieID'] . '">
        ' . $_category['d_categorieNaam'] . '
        <input type="checkbox" id="cat' . $_category['d_categorieID'] . '" class="product-type" name="product_type[]" value="' . $_category['d_categorieID'] . '" ' . $_checked . '>
        </label>';
    }
    $_output .= '</div>';
    $_output .= '
    <button type="submit" id="update-filters"><h4>Filter</h4></button>
    </form></div>';

    // Output product list
    $_output .= '<div class="product-list">';
    foreach ($_products as $_product) {
        $_output .=
            '<div class="product" data-cat="' . getCategoryName($_product['t_categorieën_d_categorieID']) . '" data-price="' . $_product['d_prijs'] .
            '" onclick="viewProduct(' . $_product['d_productID'] . ')">
        <p id="productName"><strong>' . $_product['d_productNaam'] . '</strong></p>
        <p id="productSDescription">' . $_product['d_shortDescription'] . '</p>
        <p id="productPrice">€' . $_product['d_prijs'] . '</p>
        <p id="productCategory">' . getCategoryName($_product['t_categorieën_d_categorieID']) . '</p>
        </div>';
    }
    $_output .= '</div></div>';

    $_output .= '
    <script>
        function viewProduct(productID) {
            window.location.href = "product_page.php?productID=" + productID + "&from=browse";
        }
    </script>';

    // Function to build search parameters URL
    function buildSearchParamsURL($_search, $_minSPrice, $_maxSPrice, $_Scategory) {
    $_params = '';
    if (!empty($_search)) {
        $_params .= '&search=' . urlencode($_search);
    }
    if (!empty($_minSPrice)) {
        $_params .= '&minprice=' . urlencode($_minSPrice);
    }
    if (!empty($_maxSPrice)) {
        $_params .= '&maxprice=' . urlencode($_maxSPrice);
    }
    foreach ($_Scategory as $_category) {
        $_params .= '&product_type[]=' . urlencode($_category);
    }
    return $_params;
}
   // Pagination Output
   $_output .= '<div class="pagination"><ul>';
   if ($_currentPage > 1) {
      $_output .= '<li><a href="?page=' . ($_currentPage - 1) . buildSearchParamsURL($_search, $_minSPrice, $_maxSPrice, $_Scategory) . '">Previous</a></li>';
    }
    for ($_i = 1; $_i <= $_totalPages; $_i++) {
        $_output .= '<li><a href="?page=' . $_i . buildSearchParamsURL($_search, $_minSPrice, $_maxSPrice, $_Scategory) . '">' . $_i . '</a></li>';
    }
    if ($_currentPage < $_totalPages) {
        $_output .= '<li><a href="?page=' . ($_currentPage + 1) . buildSearchParamsURL($_search, $_minSPrice, $_maxSPrice, $_Scategory) . '">Next</a></li>';
    }
    $_output .= '</ul></div>';

    // Add js
    $_output .=
    '<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Set up the price slider
    let priceRangeMin = document.getElementById("price-range");
    let priceRangeMax = document.getElementById("price-range-max");
    let priceMinInput = document.getElementById("price-min");
    let priceMaxInput = document.getElementById("price-max");

    // Event listeners for price changes
    priceRangeMin.addEventListener("input", function () {
        if (parseInt(priceRangeMin.value) < parseInt(priceRangeMax.value)) {
            priceMinInput.value = priceRangeMin.value;
        }
    });
    priceMinInput.addEventListener("input", function () {
        if (parseInt(priceMinInput.value) < parseInt(priceMaxInput.value)) {
            priceRangeMin.value = priceMinInput.value;
        }
    });
    priceRangeMax.addEventListener("input", function () {
        if (parseInt(priceRangeMin.value) < parseInt(priceRangeMax.value)) {
            priceMaxInput.value = priceRangeMax.value;
        }
    });
    priceMaxInput.addEventListener("input", function () {
        if (parseInt(priceMinInput.value) < parseInt(priceMaxInput.value)) {
            priceRangeMax.value = priceMaxInput.value;
        }
    });
    });
    </script>';

    /* Output */
    if ($_SESSION['authenticated']) {
        if ($_SESSION['user_rol'] == 1) {
            $_menu = 1;
        } else  {
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
catch (Exception $_exception) /* Exception Handling */ {
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>