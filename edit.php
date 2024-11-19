<?php

    include "dbconnection.php";

    $id='';
    $name='';
    $email='';
    $phone='';
    $address='';

    $errmsg = '';
    $successmsg ='';

    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            // GET Method: Shows the data of the client

            // If Id is not set, redirect to index page
            if(!isset($_GET['id'])){
                header('location: index.php');
                exit;
            }

            $id = $_GET['id'];

            // Read the row of the selected client from database table
            $sql = "SELECT * FROM clients WHERE id = $id";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            if(!$row){
                header("location: index.php");
                exit;
            }

            // If there exists the data in a row
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];
            $address = $row['address'];

            break;
        case 'POST':
            // POST Method: Update the data of client
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            do{
                if(empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)){
                    $errmsg = "All Fields are required";
                    break;
                }

                $sql = "UPDATE clients SET name = '$name', email = '$email', phone = '$phone', address = '$address' WHERE id = $id";
                $result = $conn->query($sql);

                if(!$result){
                    $errmsg =  "Invalid query: {$conn->error}";
                    break;
                }

                $successmsg = "Client Updated Successfully";

                // header("location: index.php");
                // exit;
            }while(false);
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new clients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <!-- Displaying Error Message -->
        <?php
        if(!empty($errmsg)){
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errmsg</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" id="" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" name="phone" id="" value="<?php echo $phone;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="tel" class="form-control" name="address" id="" value="<?php echo $address;?>">
                </div>
            </div>

            <!-- Displaying success Message -->
            <?php
            if(!empty($successmsg)){
                echo "
                    <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successmsg</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="index.php" role="button" class="btn btn-outline-primary">Cancel</a>
                </div>
            </div>
        </form>

        <a href="index.php" style="text-decoration: none; color: black; font-size: 22px; font-weight: 600">&larr; Back</a>
    </div>
</body>
</html>