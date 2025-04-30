<?php 
    require_once '../models/ArticleDAO.php';

    $articleDAO = new ArticleDAO();
    $articles = $articleDAO->getArticles();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Articles</title>
</head>
<body>
    <div class="container">
        <div class="col">
            <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="add">Add Article</button>
            <button class="btn btn-primary" type="submit" name="page" value="delete">Delete Article</button>
            <table class="table table-bordered table-striped">
                <thead><tr><th>Article ID</th><th>Category ID</th><th>Title</th><th>Image</th><th>Content</th><th>Last Modified</th></tr></thead>
                <tbody>
                    <?php

                        for($index=0;$index<count($articles);$index++){
                            echo "<tr><td><input type=\"radio\" name=\"articleID\" value=\"".$articles[$index]->getArticleID()."\"></td>";
                            echo "<td>".$articles[$index]->getCategoryID()."</td>";
                            echo "<td>".$articles[$index]->getTitle()."</td>";
                            echo "<td>".$articles[$index]->getImage()."</td>";
                            echo "<td>".$articles[$index]->getContent()."</td>";
                            echo "<td>".$articles[$index]->getLastModified()."</td></tr>";
                        }

                        //If there are no articles
                        if (count($articles) == 0) {
                            echo "<tr><td colspan=\"7\">No articles found</td></tr>";
                        }

                    ?>
                </tbody>        
            </table>  
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <div id="accordion">
            <?php
            
                for($index=0;$index<count($articles);$index++) {

                    echo "

                    <div class=\"card\">
                        <div class=\"card-header\">
                            <a class=\"btn\" data-bs-toggle=\"collapse\" href=\"#collapse".$index."\">
                                ".$articles[$index]->getTitle()." --".$articles[$index]->getCategoryID()."-- ".$articles[$index]->getLastModified()."
                            </a>
                            </div>
                            <div id=\"collapse".$index."\" class=\"collapse\" data-bs-parent=\"#accordion\">
                            <div class=\"card-body\">
                                {$articles[$index]->getContent()}
                                <div class=\"d-flex justify-content-end gap-2\">
                                    <button type=\"button\" class=\"btn btn-outline-primary\"> Read More</button>
                                    <button type=\"button\" class=\"btn btn-outline-warning\"> Edit</button>
                                    <button type=\"button\" class=\"btn btn-outline-danger btn-sm\"> Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    ";

                }

            
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>