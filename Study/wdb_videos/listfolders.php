<?php
// $path    = './videos';
// $folders = array_diff(scandir($path), array('.', '..'));
// print_r($folders);
$path    = './videos';
$folders = array_diff(scandir($path), array('.', '..'));
foreach($folders as $folder) {
    echo "<option value='" . $folder . "'>" . $folder . "</option>";
}
?>