<?php 
   $contacts = $_REQUEST['contacts'];
?>
    <div class="container">
        <div class="col">
            <form action="controller.php" method="GET">
            <table class="table table-bordered table-striped">
                <thead><tr><th>User ID</th><th>User Name</th><th>Lastname, </th><th>Firstname</th><th>Email</th><th>Role</th><th>Last Modified</th></tr></thead>
                <tbody>
                    <?php

                        for($index=0;$index<count($contacts);$index++){
                            echo "<tr><td><input type=\"radio\" name=\"contactID\" value=\"".$contacts[$index]->getContactID()."\"></td>";
                            echo "<td>".$contacts[$index]->getUserId()."</td>";
                            echo "<td>".$contacts[$index]->getUsername()."</td>";
                            echo "<td>".$contacts[$index]->getLastname()."</td>";
                            echo "<td>".$contacts[$index]->getFirstname()."</td>";
                            echo "<td>",$contacts[$index]->getPassword(),"</td>";
                            echo "<td>".$contacts[$index]->getEmail()."</td>";
                            echo "<td>".$contacts[$index]->getRole()."</td></tr>";
                            echo "<td>".$contacts[$index]->getLastModified()."</td>";
                        }
                    ?>
                </tbody>        
            </table>  
            </form>
        </div>
    </div>