<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Internationaal Straattheaterfestival Beveren</title>
  <?php echo $css;?>
  <link rel="stylesheet" type="text/css" href="./css/<?php if (!isset($_GET['page'])){
     echo "home.css";
    }else{
      echo $_GET['page'] ,".css";
    }
    ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script>
      WebFontConfig = {
        custom: {
          families: ["Roboto"],
          urls: ["assets/fonts/fonts.css"]
        }
      };

      (function(d) {
        var wf = d.createElement("script"),
          s = d.scripts[0];
        wf.src = "js/webfont.js";
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
      })(document);
    </script>

</head>
<?php echo $content;?>
<?php echo $js; ?>
</html>
