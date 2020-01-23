<?php
if(isset($_GET["chapter"])) {
    $chapter = $_GET["chapter"];
    if(isset($_GET["episode"])) {
        $episode = $_GET["episode"];
    }
    $dir = "./videos/" . $chapter;
    $files = array_diff(scandir($dir), array('.', '..'));
    natsort($files);
    foreach ($files as $file) {
        if ( is_file($dir . '/' . $file) ) {
            if(strtolower(end(explode(".",$file))) =="mp4")
            if ($episode == $file) {
                echo "<option selected='selected' name='episode' value=\"$file\">$file</option>";
            } else {
                echo "<option name='episode' value=\"$file\">$file</option>";
            }
        }
    }
}
