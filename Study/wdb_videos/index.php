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
    <h1 align="center" class="jumbotron text-center py-0" >Web Developer Bootcamp</h1>
    <div class="form-row mb-4" style="margin: auto">
        <div class="col-4 px-2">
            <label for="chapter" class="col-sm-2 col-form-label">Chapter</label>
            <select class="form-control" id="chapter">
            <?php
            $path    = './videos';
            $folders = array_diff(scandir($path), array('.', '..'));
            natsort($folders);
            foreach($folders as $folder) {
                echo "<option value='" . $folder . "'>" . $folder . "</option>";
            }
            ?>
            </select>
        </div>
        <div class="col-4 px-2">
            <label class="col-sm-2 col-form-label" for="content">Content</label>
            <select class="form-control" name="content" id="content">
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#chapter").change(function() {
                        var dir = "./videos/" + $(this).val();
                        $.get("listdir.php", {"dir": dir}, function(response){
                            $("#content").html(response);
                        });
                    });
                })
            </script>
            </select>
        </div>
        <div class="col-3 px-2 btn-group-vertical">
            <button onclick="loadVid()" class="btn btn-primary btn-lg btn-block">Submit</button>
        </div>
    </div>
    <div class="d-flex">
        <div id="vid"></div>
        <div class="d-inline-flex p-3 text-white">
            <button type="button" class="btn btn-warning" onclick="slowPlaySpeed()">0.5x Speed</button>
            <button type="button" class="btn btn-success" onclick="normalPlaySpeed()">1x Speed</button>
            <button type="button" class="btn btn-primary" onclick="fastPlaySpeed()">1.5x Speed</button>
            <button type="button" class="btn btn-danger" onclick="fasterPlaySpeed()">2x Speed</button>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <script>
        function loadVid() {
            var vid = "./videos/" + $("#chapter").val() + "/" + $("#content").val();
            $.ajax({
                url: "listvid.php",
                method: "GET",
                data: {"vid": vid},
                success: function(response) {
                    $("#vid").html(response);
                }
            })
            getVid();
        }
        function getVid() {
            var video = document.querySelector("video");
        }
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