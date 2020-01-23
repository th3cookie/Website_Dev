<!doctype html>
<html lang="en">
<head>
    <title>Web Developer Bootcamp Videos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS file -->
    <link rel="stylesheet" href="css.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Kalam:700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- To get Live Server Working:
    http://localhost/~sami/Website_Dev/
    http://127.0.0.1:5500/

    Go to -> http://localhost/~sami/Website_Dev/Study/wdb_videos/
    -->
    <?php
    $filecontents = file_get_contents('upto.txt');
    if(isset($_GET["chapter"], $_GET["episode"])) {
        $chapter = $_GET["chapter"];
        $episode = $_GET["episode"];
        $vid = "./videos/" . $chapter . "/" . $episode;
        file_put_contents("upto.txt", $vid);
    } elseif ($filecontents !== false ) {
        $fileArray = explode("/", $filecontents);
        $chapter = $fileArray[2];
        $episode = $fileArray[3];
        $vid = "./videos/" . $chapter . "/" . $episode;
    }
    ?>
    <h1 align="center" class="jumbotron text-center py-0" >Web Developer Bootcamp</h1>
    <form class="form-row mb-4" style="margin: auto" method="get">
        <div class="col-4 px-2">
            <label for="chapter" class="col-sm-2 col-form-label">Chapter</label>
            <select class="form-control" name='chapter' id="chapter">
            <?php
            $path    = './videos';
            $folders = array_diff(scandir($path), array('.', '..'));
            natsort($folders);
            foreach($folders as $folder) {
                if ($folder == $chapter) {
                    echo "<option selected='selected' name='chapter' value='" . $folder . "'>" . $folder . "</option>";
                } else {
                    echo "<option name='chapter' value='" . $folder . "'>" . $folder . "</option>";
                }
            }
            ?>
            </select>
        </div>
        <div class="col-4 px-2">
            <label class="col-sm-2 col-form-label" for="content">Episode</label>
            <select class="form-control" name="episode" id="episode">
            <?php
            if($episode) {
                echo "<option name='episode' value=\"$episode\">$episode</option>";
            }
            ?>
            </select>
        </div>
        <div class="col-3 px-2 btn-group-vertical">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
        </div>
    </form>
    <div class="d-flex">
        <div>
            <video id="video" controls src="<?php echo $vid; ?>"></video>
        </div>
        <div class="d-inline-flex p-3 text-white">
            <button type="button" class="btn btn-outline-dark" id='fieldPrev'>Prev</button>
            <button type="button" class="btn btn-warning" onclick="slowPlaySpeed()">0.5x Speed</button>
            <button type="button" class="btn btn-success" onclick="normalPlaySpeed()">1x Speed</button>
            <button type="button" class="btn btn-primary" onclick="fastPlaySpeed()">1.5x Speed</button>
            <button type="button" class="btn btn-danger" onclick="fasterPlaySpeed()">2x Speed</button>
            <button type="button" class="btn btn-outline-dark" id='fieldNext'>Next</button>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script>
        $(document).ready(function() {
            var chapter = $('#chapter').val();
            var episode = $('#episode').val();
            if (chapter) {
                if (episode) {
                    grabEpisodes();
                } else {
                    $.get("listdir.php", {"chapter": chapter}, function(response){
                    $("#episode").html(response);
                    });
                }
            }
        });
        $("#chapter").change(function() {
            grabEpisodes();
        });
        $(function() {
            var video = document.querySelector("video");
        });
        function grabEpisodes() {
            var chapter = $('#chapter').val();
            var episode = $('#episode').val();
            $.get("listdir.php", {"chapter": chapter, "episode": episode}, function(response){
                $("#episode").html(response);
            });
        }
        $("#fieldNext").click(function() {
            $('#episode option:selected').next().attr('selected', 'selected');
        });
        $("#fieldPrev").click(function() {
            $('#episode option:selected').prev().attr('selected', 'selected');
        });
        function slowPlaySpeed() {
            video.playbackRate = 0.5;
        }
        function normalPlaySpeed() {
            video.playbackRate = 1;
        }
        function fastPlaySpeed() {
            video.playbackRate = 1.5;
        }
        function fasterPlaySpeed() {
            video.playbackRate = 2;
        }
    </script>
</body>
</html>