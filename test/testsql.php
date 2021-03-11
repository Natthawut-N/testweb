<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    $hostname = "localhost";
    $username = "nat2024";
    $password = "password";
    $dbname = "bookstore";
    $conn = mysql_connect( $hostname, $username, $password );
    if (!$conn ) die ( "ไม่สามารถติดต่อกับ MySQL ได้" );
    mysql_select_db ( $dbname, $conn )or die ( "ไม่สามารถเลือกฐานข้อมูล itbookได้" );
    $sqltxt = "SELECT * FROM book";
    $result = mysql_query ( $sqltxt, $conn );
    echo "<html>

    <head>
        <title>Test database</title>
    </head>";
    echo "

    <body>
        <CENTER>
            <H3>รายชื่อหนังสือ</H3>
        </CENTER>";
        echo "<table width='100%' border='1' align='center'>";
            echo "<tr>
                <td>ลาดับที่ </td>
                <td>รหัสหนังสือ</td>
                <td>ชื่อหนังสือ</td>";
                echo "<td>ประเภทหนังสือ </td>
                <td>สถานะหนังสือ</td>
                <td>สานักพิมพ์</td>";
                echo "<td>ราคาหนังสือ </td>
                <td>ราคาเช่าหนังสือ</td>
                <td>จานวนวัน</td>";
                echo "<td>รูปภาพ </td>
                <td>วันที่ซื้อ</td>
            </tr>";
            $a=1;
            while ( $rs = mysql_fetch_array ( $result ) )
            {
            echo "<tr>
                <td> $a </td>";
                for($n = 0; $n < 10 ; $n++) { if ($n==2) echo "<td>" . CheckType( $conn, $rs[ $n ]) . "</td>" ; else if ($n==3) echo "<td>" . CheckStatus( $conn, $rs[ $n ]) . "</td>" ; else echo "<td>" . $rs[ $n ] . "</td>" ; } echo "</tr>" ; $a++; } echo "</table></body></html>" ; mysql_close ( $conn ); function CheckType( $conn, $code) { $sqltxt="SELECT * FROM typebook" ; $result1=mysql_query ( $sqltxt, $conn ); while ( $rs1=mysql_fetch_array ( $result1 ) ) { if ($rs1[0]==$code) return $rs1[1]; } return "" ; } function CheckStatus( $conn, $code) { $sqltxt="SELECT * FROM statusbook" ; $result2=mysql_query ( $sqltxt, $conn ); while ( $rs2=mysql_fetch_array ( $result2 ) ) { if ($rs2[0]==$code) return $rs2[1]; } return "" ; } ?>
    </body>

    </html>