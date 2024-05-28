<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <style>
        /* Css */
        body {
            font-family: 'Roboto', 'Outfit', sans-serif;
            background-color: #f5f5f5;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        button {
            font-size: 16px;
        }

        #iframe-container {
            width: 100%;
            height: 675px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h1>404 Not Found</h1>
    <p>Sorry, the page you are looking for might be in another castle.</p>

    <!-- Button to go back -->
    <button onclick="goBack()">Go Back</button>
    <br><br>

    <!-- Embedded iframe -->
    <div id="iframe-container">
        <iframe src="https://notfound-static.fwebservices.be/nl-BE/404?key=65f0362d9072c" width="100%" height="100%"
            style="border: none;" title="custom404"></iframe>
    </div>

    <script>
        // JavaScript function to go back to the previous page
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>