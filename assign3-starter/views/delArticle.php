<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Delete Article</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Delete Article</h5>
                        <p class="card-text">Confirm Deletion of "<?php echo $_REQUEST['title']; ?>" from the list.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="deleteArticle">
                            <input type="hidden" name="artID" value="<?php echo $_REQUEST['artID']; ?>">
                            <button class="btn btn-outline-primary mt-3" type="submit" name="submit" value="CONFIRM">Confirm</button> 
                            <a href="/assign3-starter/controller.php?page=listArticles" class="btn btn-outline-danger mt-3">Cancel</a> 
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</body>
</html>
