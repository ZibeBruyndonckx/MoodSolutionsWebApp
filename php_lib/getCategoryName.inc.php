<?php
function getCategoryName($_categoryId)
{
    global $_PDO;
    $_query = "SELECT d_categorieNaam FROM t_categorieen WHERE d_categorieID = :categoryID";
    $_stmt = $_PDO->prepare($_query);
    $_stmt->bindParam(':categoryID', $_categoryId);
    $_stmt->execute();
    $_result = $_stmt->fetch(PDO::FETCH_ASSOC);
    return $_result['d_categorieNaam'];
}
?>