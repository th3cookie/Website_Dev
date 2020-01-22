<?php
if (isset($_GET["dir"])) {
    $dir = $_GET["dir"];
    $files = scandir($dir);
    natsort($files);
    foreach ($files as $file) {
        if ( is_file($dir . '/' . $file) ) {
            if(strtolower(end(explode(".",$file))) =="mp4")
                echo "<option value=\"$file\">$file</option>";
        }
    }
}
