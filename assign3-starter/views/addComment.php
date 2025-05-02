
<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mailing List</h5>
                        <p class="card-text">Add a new contact to the list.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="addComments">
                            <label for="authorID" class="form-label">Author ID</label>
                            <input type="text" class="form-control mb-3" id="authorID" name="authorID" placeholder="Enter your Author ID" required>
                            <label for="artID" class="form-label">Article ID</label>
                            <input type="text" class="form-control mb-3" id="artID" name="artID" placeholder="Enter your Article ID" required>
                            <label for="content" class="form-label">Comment</label>
                            <input type="text" class="form-control mb-3" id="content" name="content" placeholder="Enter your comment" required>
                            <label for="lastModified" class="form-label">Date</label>
                            <input type="text" class="form-control mb-3" id="lastModified" name="lastModified" placeholder="Enter your date" required>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
