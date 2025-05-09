<?php 
   $users = $_REQUEST['users'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Users</title>
</head>
<body>
    <div class="container">
        <div class="col">
            <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="add">Add User</button>
            <button class="btn btn-primary" type="submit" name="page" value="delete">Delete User</button>
            <table class="table table-bordered table-striped">
                <thead><tr><th>User ID</th><th>Username</th><th>Lastname</th><th>Firstname</th><th>Password</th><th>Email</th><th>Role</th><th>Last Modified</th></tr></thead>
                <tbody>
                    <?php
                        for($index=0;$index<count($users);$index++){
                            echo "<tr><td><name=\"contactID\" value=\"".$users[$index]->getUserID()."\"></td>";
                            echo "<td>".$users[$index]->getUserID()."</td>";
                            echo "<td>".$users[$index]->getUsername()."</td>";
                            echo "<td>".$users[$index]->getLastname()."</td>";
                            echo "<td>".$users[$index]->getFirstname()."</td>";
                            echo "<td>",$users[$index]->getPassword(),"</td>";
                            echo "<td>".$users[$index]->getEmail()."</td>";
                            echo "<td>".$users[$index]->getRole()."</td></tr>";
                            echo "<td>".$users[$index]->getLastModified()."</td>";
                        }
                    ?>
                </tbody>        
            </table>  
            </form>
        </div>
    </div>