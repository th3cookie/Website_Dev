<?php

$dir = $_GET["dir"];

$files = scandir($dir);
natsort($files);

foreach ($files as $file) {
    // Return files only
    if ( is_file($dir . '/' . $file) )
    echo "<option value=\"$file\">$file</option>";
}