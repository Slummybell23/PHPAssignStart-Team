<?php
$topics = $_REQUEST['topics'];
?>
<div class="container">
    <div class="col">
        <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="addTopic">Add Topic</button>
            <button class="btn btn-danger"  type="submit" name="page" value="deleteTopic">Delete Topic</button>

            <table class="table table-bordered table-striped mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Select</th>
                        <th>Topic ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Last Modified</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($topics as $topic): ?>
                    <tr>
                        <td><input type="radio" name="topID" value="<?= $topic->getTopID() ?>"></td>
                        <td><?= $topic->getTopID() ?></td>
                        <td><?= $topic->getName() ?></td>
                        <td><?= $topic->getDescription() ?></td>
                        <td><?= $topic->getLastModified() ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </form>
    </div>
</div>
