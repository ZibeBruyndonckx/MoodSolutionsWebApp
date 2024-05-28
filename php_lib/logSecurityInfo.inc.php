<?php
try {
    function logSecurityInfo($_logon, $_action)
    {
        // Log security info
        $_error_log = [];
        $_error_log[] = strftime("%d-%m-%Y %H:%M:%S");
        $_error_log[] = $_logon;
        $_error_log[] = $_action;
        $_pointer = fopen("../logs/security_log.csv", "ab");
        if ($_pointer === false) {
            throw new Exception("Failed to open security_log.csv for writing.");
        }
        fputcsv($_pointer, $_error_log);
        fclose($_pointer);

        // Delete logs older than a week
        $_endDate = new DateTime();
        $_endDate->modify('-1 week');
        $_einde = $_endDate->getTimestamp();

        // Open the existing and temp files
        $_pointer1 = fopen("../logs/security_log.csv", "rb");
        if ($_pointer1 === false) {
            throw new Exception("Failed to open security_log.csv for reading.");
        }
        $_pointer2 = fopen("../logs/temp_log.csv", "w+b");
        if ($_pointer2 === false) {
            fclose($_pointer1);
            throw new Exception("Failed to open temp_log.csv for writing.");
        }
        $_exceptionCounter = 0;

        // Read through the error log file
        while ($_error_log = fgetcsv($_pointer1)) {
            if ($_error_log !== false) {
                // Split the log and then date
                list($_tijd, $_logon, $_action) = $_error_log;
                list($_d, $_t) = explode(" ", $_tijd, 2);
                list($_dag, $_maand, $_jaar) = explode("-", $_d, 3);

                // Convert log date
                $_errorDatum = mktime(0, 0, 0, $_maand, $_dag, $_jaar);

                // Compare date and write if recent enough
                if ($_errorDatum <= $_einde) {
                    $_exceptionCounter++;
                } else {
                    fputcsv($_pointer2, $_error_log);
                }
            }
        }
        // Close files
        fclose($_pointer1);
        fclose($_pointer2);

        // Delete and rename files
        unlink("../logs/security_log.csv");
        rename("../logs/temp_log.csv", "../logs/security_log.csv");
    }
} catch (Exception $_exception) {
    // Exception handling
    require_once("../php_lib/myExceptionHandeling.inc.php");
}
?>