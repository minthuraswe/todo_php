<?php

    require 'config.php';

    if($_POST){

        $title = $_POST['title'];
        $description = $_POST['description'];
    
        $sql = "INSERT INTO todo(title,description) VALUES (:title,:description)";
        $pdostatement = $pdo->prepare($sql);
        $result = $pdostatement->execute(
            array(
                ':title' => $title,
                ':description' => $description,
            )
        );
        if($result){

            echo "<script>alert('To Do is Created');window.location.href='index.php';</script>";
        
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <section class="bg-light pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h3>Creating New Todo</h3>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="create.php" method="post">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea name="description" class="form-control" id="" cols="80" rows="8"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info">Create</button>
                            <a href="index.php" class="btn btn-secondary">Back</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </section>
</body>
</html>