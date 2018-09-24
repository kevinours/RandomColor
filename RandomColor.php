<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Random Color</title>
    <style>
        .col-sm-3{
            height: 150px;
            cursor: pointer;
            text-align: center;
            font-size: 2em;
            line-height : 150px;
            padding: 0 !important;
        }

        span{
            background-color: rgba(255, 255, 255, 0.4);
            padding: 0 94px;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <script>





        function randNumber(){
                var result =  '#'+(Math.random()*0xFFFFFF<<0).toString(16);
                document.getElementById("block"+(Math.round(Math.random()*19))).style.backgroundColor = result;
        }



        (function loop() {
            var rand = Math.round(Math.random() * (500));
            setTimeout(function() {
                //alert('A');
                randNumber();
                loop();
            }, rand);
        }());



        function rgb2hex(rgb) {
            if (/^#[0-9A-F]{6}$/i.test(rgb)) return rgb;

            rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            function hex(x) {
                return ("0" + parseInt(x).toString(16)).slice(-2);
            }
            return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
        }

        function copy(arg) {

            /* Get the text field */
            var copyText = document.getElementById("block"+arg).style.backgroundColor;
            copyText = rgb2hex(copyText);
            console.log(copyText);
            var h =  document.getElementById("h"+arg);

            h.value = copyText ;
            h.select();
            document.execCommand("copy");


            $(".sp"+arg).fadeIn( "slow", function() {
            });

            setTimeout(function(){
                $(".sp"+arg).fadeOut( "slow", function() {
                });
            }, 1000);
        }
    </script>

    <?php


    function random_color_part() {
        return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
    }

    function random_color() {
        return '#'.random_color_part() . random_color_part() . random_color_part();
    }

    ?>


</head>
<body>
    <div class="container">
        <div class="row">
            <?php for($i=0 ; $i<20 ;$i++){
                echo '<div id="block'.$i.'" class="col-sm-3" onclick="copy('.$i.')" style="background-color:'.random_color().'"><span class="sp'.$i.'" style="display: none;">Copied !</span></div>';
                echo '<input id="h'.$i.'" type="text" style="position:fixed; left: 9999px;">';
            }
            ;?>
        </div>
    </div>
</body>
</html>


