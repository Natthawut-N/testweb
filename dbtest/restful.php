<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body onload="loadDoc()">
    <h1>Resile</h1>
    Add Test<input type="text" id="u_name"><input type="text" id="u_age">
    <button onclick="add_new()">Add data</button>
    <div id="result">
    </div>
    <script>
    function loadDoc() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            console.log(this.readyState + "," + this.status);
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        }
        xhttp.open("GET", "rest.php");

        xhttp.send();
    }

    function add_new() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            console.log(this.readyState + "," + this.status);
            if (this.readyState == 4 && this.status == 200) {
                alert(this.responseText);
            }
        }
        n = document.getElementById("u_name");
        a = document.getElementById("u_age");
        xhttp.open("POST", "rest.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("u_name = " + n.value + " &u_age=" + a.value);
    }
    </script>
</body>

</html>