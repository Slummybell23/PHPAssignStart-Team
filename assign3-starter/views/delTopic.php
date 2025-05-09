<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Delete Topic</h5>
                        <p class="card-text">Confirm deletion of the selected topic.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="deleteTopic">
                            <input type="hidden" name="topID" value="<?php echo $_REQUEST['topID'] ?? ''; ?>">
                            <p><strong><?php echo htmlspecialchars($_REQUEST['name'] ?? ''); ?></strong></p>
                            <button class="btn btn-danger" type="submit" name="submit" value="CONFIRM">Confirm</button> 
                            <button class="btn btn-secondary" type="submit" name="submit" value="CANCEL">Cancel</button>   
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>