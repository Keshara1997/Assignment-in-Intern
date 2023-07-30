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
                        <h4>Customer Edit 
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

                                <form action="code.php" method="POST">
                                            <input type="hidden" name="customer_id" value="<?=$customer_id; ?>" id="">
                                            <div class="mb-3">
                                                <label for="">Title</label>
                                                <select id="" name="title" value="<?=$customer['title']; ?>" class="form-control">
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Dr">Dr</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">First Name</label>
                                                <input type="text" name="first-name" value="<?=$customer['first_name']; ?>" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Middle Name</label>
                                                <input type="text" name="middle-name" value="<?=$customer['middle_name']; ?>" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Last Name</label>
                                                <input type="text" name="last-name" value="<?=$customer['last_name']; ?>" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Contact Number</label>
                                                <input type="text" name="contact-no" value="<?=$customer['contact_no']; ?>" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label for="">District</label>
                                                <select id="" name="district" value="<?=$customer['district']; ?>" class="form-control">
                                                <?php
                                                    $query = "SELECT * FROM district";
                                                    $query_run = mysqli_query($con,$query);

                                                    if(mysqli_num_rows($query_run) > 0){
                                                        foreach($query_run as $district){
                                                            ?>
                                                            <option value="district">
                                                                <?= $district['district'] ?>
                                                            </option>

                                                            <?php
                                                        }
                                                    }
                                                    else{
                                                        echo "<h5>No Districts Found.</h5>";
                                                    }
                                                    
                                                ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" name="update_customer" class="btn btn-primary">Update</button>
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