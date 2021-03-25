<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table {
        border-collapse: collapse;
    }
    </style>
</head>
<body onload="product_list()">
<center>
<h1>ยินดีต้อนรับเข้าสู่เมนูลูกค้า</h1>
<h1>SHOPSHOCK</h1>
<h2>Select Product to Cart</h2> 
    <div id="p_list"></div>
</center>
    <script>
    let arr;
    function product_list() {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            //console.log(this.readyState +" , "+this.status);
            if (this.readyState==4 && this.status== 200) {
                arr = JSON.parse(this.responseText);
                console.log(arr);
                plist = document.getElementById("p_list");
                text = "";
                text += "<table border ='1'>";
                text +="<tr><td>ID</td>";
                text +="<td>product_code</td>";
                text +="<td>product_Name</td>";
                text +="<td>Brand_name</td>";
                text +="<td>Unit_name</td>";
                text +="<td>Cost</td>";
                text +="<td></td></tr>";
                for ( i = 0 ;i< arr.length ;i++) {
                   text +="<tr>";
                   for ( j = 0 ;j< arr.length ;j++){
                       text +="<td>"+arr[i][j]+"</td>";
                   }
                    text +="<td><button onclick='product_add("+i+")'> <ShopShock> </button></td>";
                    text +="</tr>";
                }
                text +="</table>";
                plist.innerHTML = text;
            }
        }
        xhttp.open("GET","product_rest.php",true);
        xhttp.send();
    }
    function product_add(i){
        alert(arr[i]);
        plist = document.getElementById("p_list");
        text="";
        text +="<table border ='1'>";
        text +="<tr><td>ID</td><td><input type='text' value='"+arr[i][0]+"' disabled></td></tr>";
        text +="<tr><td>product_code</td><td><input type='text' value='"+arr[i][1]+"' disabled></td></tr>";
        text +="<tr><td>product_Name</td><td><input type='text' value='"+arr[i][2]+"' disabled></td></tr>";
        text +="<tr><td>Brand_name</td><td><input type='text' value='"+arr[i][3]+"' disabled></td></tr>";
        text +="<tr><td>Unit_name</td><td><input type='text' value='"+arr[i][4]+"' disabled></td></tr>";
        text +="<tr><td>Cost</td><td><input type='text' value='"+arr[i][5]+"' disabled></td></tr>";
        text +="<tr><td></td><td><input type='number' min='1' max='"+arr[i][6]+"'></td></tr>";
        text +="</table>";
        plist.innerHTML = text;
    }
    function add_tocart(){
        let xhttp = new XMLHttpRequest();
        if (this.readyState==4 && this.status== 200) {
            alert(this.responseText);
        }
        xhttp.open("POST",product_rest.php,true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urldecode");
        xhttp.send("a=1&b=2");
    }
    </script>
</body>
</html>