<?php
session_start();
require 'dbcon.php';
?>
<?php include('header.php') ?>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Add 
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label for="">Item Code</label>
                                <input type="text" name="item-code" required class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Item Name</label>
                                <input type="text" name="item-name" required class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Item Category</label>
                                <select id="" name="item-category" class="form-control">
                                    <?php
                                        $query = "SELECT * FROM item_category";
                                        $query_run = mysqli_query($con,$query);

                                        if(mysqli_num_rows($query_run) > 0){
                                            foreach($query_run as $item_category){
                                                ?>
                                                <option value="item_category">
                                                    <?= $item_category['category'] ?>
                                                </option>

                                                <?php
                                            }
                                        }
                                        else{
                                            echo "<h5>No Item category Found.</h5>";
                                        }
                                        
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Item Sub Category</label>
                                <select id="" name="item-subcategory" class="form-control">
                                    <?php
                                        $query = "SELECT * FROM item_subcategory";
                                        $query_run = mysqli_query($con,$query);

                                        if(mysqli_num_rows($query_run) > 0){
                                            foreach($query_run as $item_subcategory){
                                                ?>
                                                <option value="item_subcategory">
                                                    <?= $item_subcategory['sub_category'] ?>
                                                </option>

                                                <?php
                                            }
                                        }
                                        else{
                                            echo "<h5>No Item Subcategory Found.</h5>";
                                        }
                                        
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Quantity</label>
                                <input type="text" name="quantity" required class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Unit Price</label>
                                <input type="text" name="unit-price" required class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <a href="index.php" class="btn btn-danger float-end">BACK</a>
                                <button type="submit" name="save_item" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php') ?>