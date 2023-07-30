<?php
require 'dbcon.php';
?>
<?php include('header.php') ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item View 
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $item_id = mysqli_real_escape_string($con,$_GET['id']);
                            $query = "SELECT * FROM item WHERE id = '$item_id'";
                            $query_run = mysqli_query($con,$query);

                            if(mysqli_num_rows($query_run) > 0){
                                $item = mysqli_fetch_array($query_run);
                                ?>
                                            <div class="mb-3">
                                                <label for="">Item Code</label>
                                                <p class="form-control">
                                                    <?=$item['item_code']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Item Name</label>
                                                <p class="form-control">
                                                    <?=$item['item_name']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Item Category</label>
                                                <p class="form-control">
                                                    <?=$item['item_category']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Item Sub Category</label>
                                                <p class="form-control">
                                                    <?=$item['item_subcategory']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Quantity</label>
                                                <p class="form-control">
                                                    <?=$item['quantity']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Unit Price</label>
                                                <p class="form-control">
                                                    <?=$item['unit_price']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <a href="index.php" class="btn btn-danger float-end">BACK</a>
                                            </div>

                                <?php
                                
                            }
                            else{
                                echo "<h4>No such Id Found.</h4>";
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php') ?>