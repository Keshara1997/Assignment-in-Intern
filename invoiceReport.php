<?php
    session_start();
require 'dbcon.php';
    
    $districtArr = array('Ampara', 'Anuradhapura', 'Badulla', 'Batticaloa', 'Colombo', 'Galle', 'Gampaha', 'Hambantota', 'Jaffna', 'Kalutara', 'Kalutara', 'Kandy', 'Kegalle', 'Kilinochchi', 'Kurunegala', 'Mannar', 'Matale', 'Matara', 'Moneragala', 'Mullaitivu', 'Nuwara Eliya', 'Polonnaruwa', 'Puttalam', 'Rathnapura', 'Vavuniya');


    function invoiceReport(){
        global $con;
        global $districtArr;

        $start = '2000-01-01';
        $to = date('Y').'-'.date('m').'-'.date('d');

        if(isset($_POST['sbm_search'])){
            $start = $_POST['start'];
            $to = $_POST['to'];
        }

        $sql = "SELECT * FROM invoice i, customer c WHERE i.customer = c.id and date between '$start' and '$to'";
    
        $result = $con->query($sql);
    
        if($result->num_rows > 0){
            //read data
            while($row = $result->fetch_assoc()){
                //read and utilize the row data
                $id = $row['id'];
                $invoiceNo =$row['invoice_no'];
                $date = $row['date'];
                $title = $row['title'];
                $fname = $row['first_name'];
                $mname = $row['middle_name'];
                $lname = $row['last_name'];
                $district = $row['district'];
                $iCount = $row['item_count'];
                $amount = $row['amount'];

                $fullName = $title.'.'.' '.$fname.' '.$mname.' '.$lname;
                $district = $districtArr[$district - 1];

                echo "<tr>
                <td>".$invoiceNo."</td>
                <td>".$date."</td>
                <td>".$fullName."</td>
                <td>".$district."</td>
                <td>".$iCount."</td>
                <td>".$amount."</td>
                
            </tr>";

        }
        }else{
            echo "<tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
            </tr>";
        }
    }

?>
<!DOCTYPE html>
<html>

<head>
    <title>CSQUARE</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <!-- Header -->
  <?php include('navbar.php') ?>
    <!-- Page Start -->
    <div class="container text-center">
    <h1>Invoice Report</h1>
  </div>
    <form class="container text-center" style="margin: 30px" action="" method='post'>
        <label for="start">Date From: </label>
        <input type="date" id="start" name="start">
    
        <label for="to">To: </label>
        <input type="date" id="to" name="to">

        <input type="submit" name="sbm_search" style="margin-left:20px" class="btn btn-success" value="Search">
    </form>

    <div>
        <table border="2px" class="table table-hover">
            <tr class="table-dark">
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Customer</th>
                <th>District</th>
                <th>Item Count</th>
                <th>Invoice Amount</th>
            </tr>

            <?php invoiceReport();?>
        </table>
    </div>




    <!-- Footer -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>



