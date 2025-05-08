<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Article</title>
</head>
<body>
    <form action="/assign3-starter/controller.php" method="POST">
        <div class="container p-5">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control mb-3" placeholder="Title">

            <label for="authorID">Author ID:</label>
            <input type="text" id="authorID" name="authorID" class="form-control mb-3" placeholder="Author ID">

            <input type="hidden" name="image" value="Null">
            <input type="hidden" name="topID" value="2">

            <div class="form-group mt-3">
                <label for="content">Content:</label>
                <textarea class="form-control" rows="5" id="content" name="content"></textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-outline-primary mt-3" name="page" value="addArticle">Submit</button>
                <a href="/assign3-starter/controller.php?page=listArticles" class="btn btn-outline-danger mt-3">Cancel</a>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
