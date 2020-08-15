<?php

    require 'config.php';

    if($_POST){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $sql = "UPDATE todo SET title='$title', description='$description' WHERE id='$id'";
        $pdostatement = $pdo->prepare($sql);
        $result = $pdostatement->execute();

        if($result){

            echo "<script>alert('To Do is Updated');window.location.href='index.php';</script>";
        
        }

    }else{

        $sql = "SELECT * FROM todo WHERE id=" . $_GET['id'];
        $pdostatement = $pdo->prepare($sql);
        $pdostatement->execute();
        $result = $pdostatement->fetchAll();

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing</title>
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
                                <h3>Editing Todo</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $result [0] ['id'] ?>">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" value="<?php echo $result [0] ['title'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="title">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="80" rows="8"><?php echo $result [0] ['description'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Update</button>
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