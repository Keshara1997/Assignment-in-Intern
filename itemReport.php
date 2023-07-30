<?php
    session_start();
require 'dbcon.php';

    function itemReport(){
        global $con;
        global $districtArr;
        $sql = "SELECT i.item_name, ic.category, isc.sub_category, i.quantity FROM item i, item_category ic, item_subcategory isc WHERE i.item_category = ic.id AND i.item_subcategory = isc.id;";
    
        $result = $con->query($sql);
    
        if($result->num_rows > 0){
            //read data
            while($row = $result->fetch_assoc()){
                //read and utilize the row data
                $iName = $row['item_name'];
                $category =$row['category'];
                $subCategory = $row['sub_category'];
                $quantity = $row['quantity'];

                echo "<tr>
                <td>".$iName."</td>
                <td>".$category."</td>
                <td>".$subCategory."</td>
                <td>".$quantity."</td>
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
    <h1>Item Report</h1>
  </div>
    <div>
        <table border="2px" class="table table-hover">
            <tr class="table-dark">
                <th>Item Name</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Quntity</th>
            </tr>

            <?php itemReport();?>
        </table>
    </div>




    <!-- Footer -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>



