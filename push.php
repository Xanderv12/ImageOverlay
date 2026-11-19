<!-- push.php -->
<?php
// Adding a login check to make sure the push.php script is only accessible to logged-in users
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape all user inputs to ensure security
    $base_dir = escapeshellarg($_POST['base_dir']);
    $head_Txt = escapeshellarg($_POST['headerTxt']);
    $imgSize = escapeshellarg($_POST['imgSize']); // To set size of image in the CSS file
    $imgURL1 = escapeshellarg($_POST['imgURL1']);
    $imgURL2 = escapeshellarg($_POST['imgURL2']);

    // Adjust python path and script path to match your server environment
    $pythonPath = ''; // Place location of python.exe or python3.exe here, e.g., C:\Python39\python.exe or /usr/bin/python3
    $scriptPath = ''; // Place location of GUI_2.py here

    // Build the command line call
    $command = "$pythonPath $scriptPath $base_dir $head_Txt $imgSize $imgURL1 $imgURL2 2>&1";

    // Execute script
    $output = shell_exec($command);

    $_SESSION = array(); // Clear session data

    // Clear the session cookie if it exists
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    $target = $_POST['base_dir'];

    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Results</title>
            <link rel="stylesheet" href="assets/css/prettier.css">
        </head>
        <body>
            <h3>Execution Result:</h3>
            <pre><?php echo htmlspecialchars($output); ?></pre>
            <?php
            
            // URL to Truman
            //echo '<br><a href="http://truman.wcsu.edu/imageComparison/'.$target.'" target="_blank">Click here to see results</a>';
            
            // URL to WCSU archive Library
            //echo '<br><a href="http://archive.library.wcsu.edu/imageComparison/'.$target.'" target="_blank">Click here to see results</a>';
            ?>
            <br><a href="index.php">Back to Login</a>
        </body>
    </html>
    <?php
}
?>

