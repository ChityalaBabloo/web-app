<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notification</title>
    <link rel="stylesheet" href="../css/notification.css">
    <script src="../js/notification.js"></script>
</head>
<body>
    <div class="container-fluid"><br>
        <form method="post" id="commentForm" enctype="multipart/form-data">
            <div class="form-group">
                <label for="comment">Enter Your Comment</label>
                <textarea name="comment" id="comment" class="form-control" cols="5" rows="5" style="resize:vertical;max-width:90%" required></textarea>
            </div>
            <div>
                <input type="file" name="image[]" id="image" multiple>
            </div><br>
            <div>
                <input type="submit" class="btn btn-info" name="post" id="post" value="POST">
            </div>
        </form><br>
        <h2 class="heading text-dark"></h2>
        <div class="content"></div>
    </div>
</body>
</html>
