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
                        <h4>Customer Add 
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label for="">Title</label>
                                <select id="" name="title" class="form-control">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Dr">Dr</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="first-name" required class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Middle Name</label>
                                <input type="text" name="middle-name" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Last Name</label>
                                <input type="text" name="last-name" required class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Contact Number</label>
                                <input type="text" name="contact-no" required class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">District</label>
                                <select id="" name="district" class="form-control">
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
                                <a href="index.php" class="btn btn-danger float-end">BACK</a>
                                <button type="submit" name="save_customer" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php') ?>