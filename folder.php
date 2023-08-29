<!DOCTYPE html>
<html>
<head>
    <title>Select Folder</title>
</head>
<body>

    <?php
    // Specify the directory to read
    $dir = "./images";

    // Read the folder names in the directory
    $folders = scandir($dir);

    // Loop through each folder and create a hyperlink
    foreach ($folders as $folder) {
        // Skip the current and parent directory indicators "." and ".."
        if ($folder === "." || $folder === "..") {
            continue;
        }
        
        // Check if it's a directory
        if (is_dir($dir . '/' . $folder)) {
            echo "<a href='index.php?klas=" . urlencode($folder) . "'>" . htmlspecialchars($folder) . "</a><br>";
        }
    }
    ?>

</body>
</html>
