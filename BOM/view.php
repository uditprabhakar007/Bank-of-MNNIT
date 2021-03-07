<!DOCTYPE html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body{
            background-color : whitesmoke;
            }
        </style>
</head>
<body>
    <center>
    <table>
        <tr>
            <th> Account number </th>
            <th> Name </th>
            <th> Contact number </th>
            <th> Current balance </th>
            <th> </th>
        </tr>
        <?php
        $con = mysqli_connect('localhost','Tidu','iambinod@69', 'bank');
        $sql = "SELECT Account_number, Name, Contact_number, Current_Balance from customers";
        $result = $con -> query($sql);
        if($result -> num_rows > 0){
        while($row=$result -> fetch_assoc()){
        echo "<tr><td>".$row["Account_number"]."</td><td>".$row["Name"]."</td><td>".$row["Contact_number"]."</td><td>"
        .$row["Current_Balance"]."</td><td>"."<a href='one.php?id={$row['Account_number']}'> VIEW </a> </td></tr>";
        }
        echo "</table>";
        }else{
        echo "0 result";
        }
        $con -> close();
        ?>
    </table>
    </center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



