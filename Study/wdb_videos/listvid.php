<?php
if (isset($_GET["vid"])) {
    $vid = $_GET["vid"];
    // file_put_contents("upto.txt", $vid);
    echo "<video id=\"video\" src=\"$vid\" controls></video>";
}
