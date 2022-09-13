<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post - My Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container p-3">
        <a href="./cms-index.php" class="btn btn-dark">CMS Main</a>

        <form action="./create-post-controller.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <textarea type="text" class="form-control" name="content" placeholder="Content"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="author" placeholder="Author">
            </div>
            <div class="form-group">
                <input type="file" name="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Create post</button>
        </form>
    </div>
</body>
</html>