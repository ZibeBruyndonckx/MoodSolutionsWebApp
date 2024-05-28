<?php
if (isset($_exception)) {
    // Display user-friendly message based on environment
    if ($_SERVER['SERVER_NAME'] != "localhost") {
        $_msg = "Er heeft zich een fout voorgedaan, probeer opnieuw.<br>
        Als de fout blijft voorkomen neem dan contact op met de web-verantwoordelijke.<br>
        Alvast onze verontschuldigingen";
    } else {
        $_msg = "<hr><strong>Exception</strong><br><br>
        Foutmelding: " . $_exception->getMessage() . "<br><br>
        Bestand: " . $_exception->getFile() . "<br>
        Regel: " . $_exception->getLine() . "<br><hr>";
    }

    // Log the exception details
    $_exception_log = [];
    $_exception_log[] = strftime("%d-%m-%Y %H:%M:%S");
    $_exception_log[] = $_exception->getMessage();
    $_exception_log[] = $_exception->getFile();
    $_exception_log[] = $_exception->getLine();
    
    // Open the error log file in append mode
    $_pointer = fopen("../logs/error_log.csv", "ab");
    if ($_pointer === false) {
        throw new Exception("Failed to open error_log.csv for writing.");
    }
    
    // Write the exception details to the log file
    fputcsv($_pointer, $_exception_log);
    fclose($_pointer);

    // Display the user message
    echo $_msg;

    // Delete logs older than two weeks
    $_endDate = new DateTime();
    $_endDate->modify('-2 weeks');
    $_einde = $_endDate->getTimestamp();

    // Open the existing error log file in read mode
    $_pointer1 = fopen("../logs/error_log.csv", "rb");
    if ($_pointer1 === false) {
        throw new Exception("Failed to open error_log.csv for reading.");
    }
    // Open a temporary log file in write mode
    $_pointer2 = fopen("../logs/temp_log.csv", "w+b");
    if ($_pointer2 === false) {
        fclose($_pointer1);
        throw new Exception("Failed to open temp_log.csv for writing.");
    }

    // Read through the error log file
    while ($_log_entry = fgetcsv($_pointer1)) {
        if ($_log_entry !== false) {
            // Split the log and then date
            list($_tijd, $_msg, $_file, $_line) = $_log_entry;
            list($_d, $_t) = explode(" ", $_tijd, 2);
            list($_dag, $_maand, $_jaar) = explode("-", $_d, 3);

            // Convert log date
            $_errorDatum = mktime(0, 0, 0, $_maand, $_dag, $_jaar);

            // Compare date and write if recent enough
            if ($_errorDatum > $_einde) {
                fputcsv($_pointer2, $_log_entry);
            }
        }
    }
    // Close files
    fclose($_pointer1);
    fclose($_pointer2);

    // Delete and rename files
    unlink("../logs/error_log.csv");
    rename("../logs/temp_log.csv", "../logs/error_log.csv");
}
// error_reporting(E_ALL); ini_set('display_errors', 1);
?>