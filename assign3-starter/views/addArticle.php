<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Article</title>
</head>
<body>
<form>
    <div class="container p-5">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control mb-3" placeholder="Title">
            
            <div>
                <label for="myImage">Select an iamge:</label>
                <input type="file" id="myImage" name="myImage">
            </div>

            <div class="form-group mt-3">
                <label for="content">Content:</label>
                <textarea class="form-control" rows="5" id="content"></textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-outline-primary mt-3">Submit</button>
                <button type="button" class="btn btn-outline-danger mt-3" data-bs-toggle="modal" data-bs-target="#confirmation">Cancel</button>
            </div>

            <div class="modal" id="confirmation">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Are you sure you want to cancel this article?</p>
                            <p>All data will not be saved.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-outline-danger" data-bs-dismiss="modal" value="reset">Yes, I'm sure</button>
                            <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>