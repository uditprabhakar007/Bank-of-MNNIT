<?php
    $con = mysqli_connect('localhost','Tidu','iambinod@69', 'bank');
    if(isset($_GET['id1'])){
        $id1 = mysqli_real_escape_string($con, $_GET['id1']);
        $sql = "SELECT * FROM customers WHERE Account_number='$id1' ";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        }
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="main">
        <h1> Transaction Details </h1>
        <form action="" method="POST">
          <div class="form-group">
          <div class="form-padding">
            <input required type="account_number" class="form-control" name="account_number" autocomplete="off" placeholder="Enter account number"></div>
          <div class="form-padding">
            <input required type= "amount" class="form-control" name="amount" autocomplete="off" placeholder="Enter amount"></div>
          <div class="form-padding">
            <button type="submit" name="Transfer" class="btn btn-primary">Submit</button></div>
          </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
   $con = mysqli_connect('localhost','Tidu','iambinod@69', 'bank');
   if(isset($_POST['Transfer']))
   {
       $chk = " SELECT * FROM customers WHERE Account_number= '".$_POST['account_number']."' ";
       $rchk = mysqli_query($con, $chk);
       $rowchk = mysqli_fetch_array($rchk);
       if($rowchk == null){
       echo "<script>alert('Incorrect account number');
             window.location.href='/BOM/view.php';
             </script>";
       }
       else if($row['Current_Balance'] < $_POST['amount']){
       echo "<script>alert('Insufficient balance');
             window.location.href='/BOM/view.php';
             </script>";
       }
       else{
       $query = " UPDATE customers SET Current_Balance= Current_Balance + '".$_POST['amount']."' WHERE Account_number= '".$_POST['account_number']."' ";
       $query2 = " UPDATE customers SET Current_Balance= Current_Balance - '".$_POST['amount']."' WHERE Account_number= '".$row['Account_number']."' ";
       $r1 = mysqli_query($con, $query);
       $r2 = mysqli_query($con, $query2);
       if($r1 && $r2){
       echo "<script>alert('Transaction succesful');
       window.location.href='/BOM/view.php';
       </script>";
       }
       }
   }
?>
