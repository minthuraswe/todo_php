<?php

    require 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <?php
        $sql = "SELECT * FROM todo ORDER BY id DESC";
        $pdostatement = $pdo->prepare($sql);
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();
    ?>

    <section class="bg-light pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div> <h3>To Do List</h3> </div>
                            <div class="ml-auto"> 
                                <a href="create.php" class="btn btn-info">Create New</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $i = 1;
                                        if($result){
                                            foreach($result as $value){
                                    ?>  
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value['title'] ?></td>
                                        <td><?php echo $value['description'] ?></td>
                                        <td><?php echo date('Y-m-d', strtotime($value['created_at'])) ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $value['id'] ?>" type="button" class="btn btn-warning">Edit</a>
                                            <a href="delete.php?id=<?php echo $value['id'] ?>" type="button" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                    <?php
                                        $i++;
                                            }
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>