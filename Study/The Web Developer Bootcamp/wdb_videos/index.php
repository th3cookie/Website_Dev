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
    -->
    <pre>
    <?php
    $path    = './videos';
    $folders = array_diff(scandir($path), array('.', '..'));
    print_r($folders);
    ?>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Chapter</label>
        <select class="form-control" id="exampleFormControlSelect1">
            <option value=""></option>
        </select>
    </div>
    <?php
    foreach ($folders as $value) {
        $files = array_diff(scandir("./videos/$value/"), array('.', '..'));
        print_r($files);
        echo "<br>";
    }
    ?>
    </pre>
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
        
        // document.querySelector('video').playbackRate = 2.0;
        // document.querySelector('video').play();

    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>