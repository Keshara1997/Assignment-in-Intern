<?php
require 'dbcon.php';
?>
<?php include('header.php') ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer View 
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $customer_id = mysqli_real_escape_string($con,$_GET['id']);
                            $query = "SELECT * FROM customer WHERE id = '$customer_id'";
                            $query_run = mysqli_query($con,$query);

                            if(mysqli_num_rows($query_run) > 0){
                                $customer = mysqli_fetch_array($query_run);
                                ?>
                                            <div class="mb-3">
                                                <label for="">Title</label>
                                                <p class="form-control">
                                                    <?=$customer['title']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">First Name</label>
                                                <p class="form-control">
                                                    <?=$customer['first_name']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Middle Name</label>
                                                <p class="form-control">
                                                    <?=$customer['middle_name']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Last Name</label>
                                                <p class="form-control">
                                                    <?=$customer['last_name']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Contact Number</label>
                                                <p class="form-control">
                                                    <?=$customer['contact_no']; ?>
                                                </p>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">District</label>
                                                <p class="form-control">
                                                    <?=$customer['district']; ?>
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