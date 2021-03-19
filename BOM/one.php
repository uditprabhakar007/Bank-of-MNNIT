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
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="main">
        <h1> Customer details </h1>
        <h2> Account number - <span class="tab1"> <?php echo $row['Account_number']?> </span></h2>
        <h2> Name -  <span class="tab2"> <?php echo $row['Name']?> </spam></h2>
        <h2> Contact number -  <span class="tab3"> <?php echo $row['Contact_number']?> </spam></h2>
        <h2> Current balance -  <span class="tab4"> <?php echo $row['Current_Balance']?> </spam></h2>
        <?php echo "<a class='btn btn-primary' href='transfer.php?id1={$row['Account_number']}' role='button'> Transfer money </a>" ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>