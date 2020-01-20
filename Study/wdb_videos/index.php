<!doctype html>
<html lang="en">
<head>
    <title>Web Developer Bootcamp Videos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <!-- To get Live Server Working:
    http://localhost/~sami/Website_Dev/
    http://127.0.0.1:5500/

    Go to -> http://localhost/~sami/Website_Dev/Study/wdb_videos/
    -->
    <div class="form-group">
        <label for="chapter">Chapter</label>
        <select class="form-control" id="chapter">
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
        </select>
        <label for="content">Content</label>
        <select name="content" id="content">Content</select>

        <!-- <?php
        foreach(glob('./videos/' . $folder . '/*') as $filename){
            $filename = basename($filename);
            echo $filename;
            echo "<br>";
        }
        ?> -->
    </div>
<!-- 
    <video src="videos/1. Introduction to this Course/4. Why This Course.mp4" controls></video>

    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="slowPlaySpeed()">0.5x Speed</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="normalPlaySpeed()">1x Speed</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="fastPlaySpeed()">1.5x Speed</button>
    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="fasterPlaySpeed()">2x Speed</button> -->

    <!-- Optional JavaScript -->
    <script>
        var vid = document.querySelector("video");
        function slowPlaySpeed() { 
            vid.playbackRate = 0.5;
        }
        function normalPlaySpeed() { 
            vid.playbackRate = 1;
        }
        function fastPlaySpeed() { 
            vid.playbackRate = 1.5;
        }
        function fasterPlaySpeed() { 
            vid.playbackRate = 2;
        }

        var fs = require('fs');
        var chapter = document.getElementById("chapter");
        chapter.onchange = readFiles;

        function readFiles(chapter, onFileContent, onError) {
        fs.readdir(dirname, function(err, filenames) {
            if (err) {
            onError(err);
            return;
            }
            filenames.forEach(function(filename) {
            fs.readFile(dirname + filename, 'utf-8', function(err, content) {
                if (err) {
                onError(err);
                return;
                }
                onFileContent(filename, content);
            });
            });
        });
        }

    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>