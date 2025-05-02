<?php 
   $comments = $_REQUEST['comments'];
?>
    <div class="container">
        <div class="col">
            <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="addComments">Add Comment</button>
            <button class="btn btn-primary" type="submit" name="page" value="deleteComments">Delete Comment</button>
            <table class="table table-bordered table-striped">
                <thead><tr><th>Comment ID</th><th>Author ID</th><th>Article ID</th><th>Content</th><th>Date Modified</th></tr></thead>
                <tbody>
                    <?php

                        for($index=0;$index<count($comments);$index++){
                            echo "<tr><td><input type=\"radio\" name=\"comID\" value=\"".$comments[$index]->getComID()."\"></td>";
                            echo "<td>".$comments[$index]->getAuthorID()."</td>";
                            echo "<td>".$comments[$index]->getArtID()."</td>";
                            echo "<td>".$comments[$index]->getContent()."</td>";
                            echo "<td>".$comments[$index]->getLastModified()."</td></tr>";
                        }
                    ?>
                </tbody>        
            </table>  
            </form>
        </div>
    </div>