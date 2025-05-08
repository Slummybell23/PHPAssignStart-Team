<?php
    if (isset($_REQUEST['articles'])) {
        $articles = $_REQUEST['articles'];
    } else {
        $articles = null;
    } 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Articles</title>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-start gap-2 mb-3">
            <form action="../controller.php" method="POST">
                <button class="btn btn-primary" type="submit" name="page" value="addArticle">Add Article</button>
            </form>

        <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="deleteArticle">Delete Article</button>
        </div>
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Article ID</th><th>Topic ID</th><th>Title</th><th>Image</th><th>Content</th><th>Last Modified</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($index=0;$index<count($articles);$index++){
                            echo "<tr><td><input type=\"radio\" name=\"artID\" value=\"".$articles[$index]->getArticleID()."\"> ".$articles[$index]->getArticleID()."</td>";
                            echo "<td>".$articles[$index]->getTopicID()."</td>";
                            echo "<td>".$articles[$index]->getTitle()."</td>";
                            echo "<td>".$articles[$index]->getImage()."</td>";
                            echo "<td>".$articles[$index]->getContent()."</td>";
                            echo "<td>".$articles[$index]->getLastModified()."</td></tr>";
                        }

                        // If there are no articles
                        if (count($articles) == 0) {
                            echo "<tr><td colspan=\"7\">No articles found</td></tr>";
                        }
                    ?>
                </tbody>        
            </table>  
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>