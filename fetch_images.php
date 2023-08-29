<?php
if (isset($_GET['folder'])) {
    $folder = $_GET['folder'];
    $dir = "./images/$folder/";
    $images = glob($dir . "*.{jpg,jpeg,png}", GLOB_BRACE);
    $images = array_map('basename', $images); // Only keep file names
    echo json_encode($images);
}
