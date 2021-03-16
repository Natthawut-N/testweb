<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $JsonFile = file_get_contents("movies.json");
    $array = json_decode($JsonFile,true);
    ?>
    <select name="" id="year_movie">

        <?php 
        for ($i=0; $i < 10; $i++) { 
            foreach ($array as $key => $value) {
            echo "<option value='{$value}'>".$value["year"]." : ".$value["title"]."</option>";
        }
        }
        ?>
    <script>
    var str = "";
    var jsonEx = <?php echo $JsonFile; ?>;
    </script>
    <div id="output"></div>
</body>
</html>