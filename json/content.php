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
    <div style="width: 150;">
    Year:
    <select name="" id="year">
    </select><br>
    movie name :
    <select name="" id="movie">
    </select><br>
    </div>
    <script>
    var str = "";
    var jsonEx = <?php echo $JsonFile; ?>;

    var doc = document.getElementById("year_movie");
    // for ( i = 0;i < array.leng ;i++) {
    //     var option = document.createElement("option") ;
    //     option.text = i;
    //     doc.add(option);
    //     }
    html = "";
    for (var key in jsonEx){
        html += "<option value= "+ key + ">" +jsonEx[key].year +""+jsonEx[key].title+"</option>";
    }
    document.getElementById("year").innerHTML = html;
    </script>
    <div id="output">
    
    </div>
</body>
</html>