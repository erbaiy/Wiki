<!DOCTYPE html>
<html>

<head>
    <title>Wiki Entry</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Wiki Entries</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Creation Date</th>
                    <th>Author ID</th>
                    <th>Category ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wiki as $row) { ?>
                    <tr>
                        <td><?= $row['wiki_title'] ?></td>
                        <td><?= $row['wiki_content'] ?></td>
                        <td><?= $row['date_create'] ?></td>
                        <td><?= $row['author_id'] ?></td>
                        <td><?= $row['category_id'] ?></td>
                        <td>
                            <a href="?route=editWiki&id=<?= $row['wiki_id'] ?>">Edit</a>
                            <a href="?route=deleteWiki&id=<?= $row['wiki_id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addWikiModal">Add New Wiki Entry</button>
        </div>
    </div>

    <!-- Add Wiki Modal -->
    <div class="modal fade" id="addWikiModal" tabindex="-1" role="dialog" aria-labelledby="addWikiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWikiModalLabel">Add New Wiki Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addWikiForm" action="?route=addWiki" method="post">
                        <div class="form-group">
                            <label for="wiki_title">Title:</label>
                            <input type="text" class="form-control" name="wiki_title" id="wiki_title" required>
                        </div>
                        <div class="form-group">
                            <label for="wiki_content">Content:</label>
                            <textarea class="form-control" name="wiki_content" id="wiki_content" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="date_create">Creation Date:</label>
                            <input type="date" class="form-control" name="date_create" id="date_create" required>
                        </div>
                        <div class="form-group">
                            <label for="author_id">Author ID:</label>
                            <input type="text" class="form-control" name="author_id" id="author_id" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category :</label>
                            <select name="category_id" id="">
                                <?php foreach ($category as $row) { ?>
                                    <option value="<?= $row['category_id'] ?>"><?= $row['name'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">select Tags:</label>
                            <select name="tag_id" id="">
                                <?php
                                foreach ($tags as $tag) {
                                ?>
                                    <option value="<?= $tag['tag_id'] ?>"><?= $tag['tag_name'] ?></option>
                                <?php } ?>

                                <option value="1">Tag 1</option>

                            </select>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Create Wiki Entry</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="script.js"></script>
</body>

</html>