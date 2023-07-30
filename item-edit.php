<?php
session_start();
require 'dbcon.php';
?>
<?php include('header.php') ?>
    <div class="container mt-5 mb-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Edit 
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

                                <form action="code.php" method="POST">
                                            <input type="hidden" name="item_id" value="<?=$item_id; ?>" id="">
                                            <div class="mb-3">
                                                <label for="">Item Code</label>
                                                <input type="text" name="item-code" value="<?=$item['item_code']; ?>" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Item Name</label>
                                                <input type="text" name="item-name" value="<?=$item['item_name']; ?>" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Item Category</label>
                                                <select id="" name="item-category" value="<?=$item['item_category']; ?>" class="form-control">
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
                                                            echo "<h5>No Items Found.</h5>";
                                                        }
                                                        
                                                    ?>
                                                </select>
                                            
                                                
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Item Sub Category</label>
                                                <select id="" name="item-category" value="<?=$item['item_subcategory']; ?>" class="form-control">
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
                                                            echo "<h5>No Items Found.</h5>";
                                                        }
                                                        
                                                    ?>
                                                </select>
                                                
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Quantity</label>
                                                <input type="text" name="quantity" value="<?=$item['quantity']; ?>" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Unit Price</label>
                                                <input type="text" name="unit-price" value="<?=$item['unit_price']; ?>" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" name="update_item" class="btn btn-primary">Update</button>
                                                <a href="index.php" class="btn btn-danger float-end">BACK</a>
                                            </div>
                                </form>

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