<?php
    session_start();
require 'dbcon.php';

    function invoiceItemReport(){
        global $con;

        $start = '2000-01-01';
        $to = date('Y').'-'.date('m').'-'.date('d');

        if(isset($_POST['sbm_search'])){
            $start = $_POST['start'];
            $to = $_POST['to'];
        }

        
        $sql = "SELECT i.id, i.invoice_no, i.date,c.title, c.first_name, c.middle_name, c.last_name, it.item_name, it.item_code, ic.category, it.unit_price FROM invoice i, invoice_master im, item it, customer c, item_category ic WHERE i.invoice_no = im.invoice_no AND im.item_id = it.id AND i.customer = c.id AND ic.id = it.item_category AND date BETWEEN '$start' AND '$to'";
    
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
                $iName = $row['item_name'];
                $iCode = $row['item_code'];
                $iCategory = $row['category'];
                $uprice = $row['unit_price'];

                $fullName = $title.'.'.' '.$fname.' '.$mname.' '.$lname;
                $itemNC = $iCode.'-'.$iName;


                echo "<tr>
                <td>".$invoiceNo."</td>
                <td>".$date."</td>
                <td>".$fullName."</td>
                <td>".$itemNC."</td>
                <td>".$iCategory."</td>
                <td>".$uprice."</td>
                
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
    <!-- navbar -->
   <?php include('navbar.php') ?>
                

    <!-- Page Start -->
    <div class="container text-center">
    <h1>Invoice Item Report</h1>
  </div>
    <form class="container text-center" style="margin: 30px" action="" method='post'>
        <label for="start">Date From: </label>
        <input type="date" id="start" name="start">
    
        <label for="to">To: </label>
        <input type="date" id="to" name="to">

        <input type="submit" class="btn btn-success" style="margin-left:20px" name="sbm_search" value="Search">
    </form>
    <div>
        <table border="2px" class="table table-hover">
            <tr class="table-dark">
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Item</th>
                <th>Item Category</th>
                <th>Item Unit Price</th>
            </tr>

            <?php invoiceItemReport();?>
        </table>
    </div>




    <!-- Footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>



