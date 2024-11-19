<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div style="display: flex; justify-content: space-between; align-items: center">
            <h2>Lists of Clients</h2>
            <a href="create.php" class="btn btn-primary px-3 py-2" role="button">New Client</a>
        </div>
        <br>
        <table class="table" style="border: 2px solid black; border-radius: 15px; margin-top: 20px">
            <tr style="text-align: center; background-color: #111; color: #fff">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>

            <!-- php code here -->
            <?php
                // database connection here
                include "dbconnection.php";

                // Read all row from database here
                $sql = 'SELECT * FROM clients';
                $result = $conn->query($sql);

                if(!$result){
                    die("Invalid query: {$conn->error}");
                }

                // Read data from each row
                while($row = $result->fetch_assoc()){
                    echo "
                        <tr style='text-align: center;'>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a href='edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
            ?>

        </table>
    </div>
</body>
</html>