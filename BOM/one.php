<?php
    $con = mysqli_connect('localhost','Tidu','iambinod@69', 'bank');
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($con, $_GET['id']);
        $sql = "SELECT * FROM customers WHERE Account_number='$id' ";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        }
?>
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
        <h1> Account number -  <?php echo $row['Account_number']?> </h1>
        <h1> Name -  <?php echo $row['Name']?> </h1>
        <h1> Contact number -  <?php echo $row['Contact_number']?> </h1>
        <h1> Current balance -  <?php echo $row['Current_Balance']?> </h1>
        <?php echo "<a class='btn btn-primary' href='transfer.php?id1={$row['Account_number']}' role='button'> Transfer money </a>" ?>
    </center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>