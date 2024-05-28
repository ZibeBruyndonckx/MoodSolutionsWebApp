<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Picture</title>
</head>
<body>
    <h1>Change Your Profile Picture</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_picture" accept="image/*">
        <button type="submit" name="submit">Upload</button>
    </form>
<?php
/* Initialisatie */
require_once("../code/initialisatie.inc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_picture"])) { /* Process */
    $_userID = $_SESSION['user_id'];
    $_targetDir = "../img/pfp/";
    $_existingFileNamePattern = $_targetDir . "pfp_" . $_userID . ".*";
    $_existingFiles = glob($_existingFileNamePattern);
    
    // Delete existing profile picture files, if they exist
    foreach ($_existingFiles as $_existingFile) {
        unlink($_existingFile);
    }

    $_targetFile = $_targetDir . "pfp_" . $_userID . "." . pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);
    $_uploadOk = 1;
    $_imageFileType = strtolower(pathinfo($_targetFile, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["profile_picture"]["size"] > 800000) {
        echo "Sorry, your file is too large.<br>";
        $_uploadOk = 0;
    }
    // Allow certain file formats
    if ($_imageFileType != "jpg" && $_imageFileType != "png" && $_imageFileType != "jpeg" && $_imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $_uploadOk = 0;
    }
    // Check if $_uploadOk is set to 0 by an error
    if ($_uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $_targetFile)) {
            echo "The file " . htmlspecialchars(basename($_targetFile)) . " has been uploaded.";

            // Update the database with the new profile picture URL
            $_newPfpURL = $_targetFile;
            $_SESSION['user_pfp'] = $_newPfpURL;
            // Update the d_pfp_URL in the database
            $_query = "UPDATE ts_authentication SET d_pfp_URL = :pfp_url WHERE d_user = :user_id";
            $_stmt = $_PDO->prepare($_query);
            $_stmt->bindParam(':pfp_url', $_newPfpURL);
            $_stmt->bindParam(':user_id', $_userID);
            $_stmt->execute();
            
            echo "<script>setTimeout(function() { window.close(); }, 3000);</script>";
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
}
?>
</body>
</html>