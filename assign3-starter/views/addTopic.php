<div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Topic</h5>
                        <p class="card-text">Create a new topic.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="addTopic">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Enter a topic name" required>
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control mb-3" id="description" name="description" rows="4" placeholder="Describe the topic..."></textarea>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>