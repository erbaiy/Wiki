<!DOCTYPE html>
<html>

<head>
    <title>Wiki Entry</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-0mJU+Xr0niBKLCXF6hE4gNcEOVJL6F8Q9V2A4dsO4GQcC4eUdX0x1f4Zx9nqgB8Yv0V8ZGZfK2cZh5KsKASxug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar justify-content-space-between pe-4 ps-2 bg-dark">
        <div>
            <a href="?route=home" style="color: white;">home</a>

        </div>

        <div class="navbar  gap-4">

            <div class="">
                <input type="search" class="search " placeholder="Search">
                <img class="search_icon" src="assets/img/search.svg" alt="iconicon">
            </div>
            <!-- <img src="img/search.svg" alt="icon"> -->


            <div class="name">

            </div>
            <a href="" style="color: white;margin:0 10px">Author</a>

            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                <img src="assets/img/photo_admin.svg" alt="icon">
            </a>
            <a href="?route=logout" style="color: white;margin:0 10px">logout </a>

        </div>
    </nav>
    <div class="container">
        Wiki Entries

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
                <?php
                // dump($wiki);
                // die();
                foreach ($wiki as $row) {
                ?>
                    <tr>
                        <td><?= $row['wiki_title'] ?></td>
                        <td><?= $row['wiki_content'] ?></td>
                        <td><?= $row['date_create'] ?></td>
                        <td><?= $row['author_id'] ?></td>
                        <td><?= $row['category_id'] ?></td>
                        <td>
                            <form action="?route=deleteWiki" method="get">
                                <a href="?route=selectWikiforUpdate&id=<?= $row['wiki_id'] ?>">Edit</a>
                                <a href="?route=deleteWiki&id=<?= $row['wiki_id'] ?>">Delete</a>
                            </form>
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
                            <input type="hidden" class="form-control" name="author_id" id="author_id" value="<?php echo $_SESSION['user_id'];
                                                                                                                ?>" required>
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
                            <select name="tag_id[]" multiple class="form-control">
                                <?php
                                foreach ($tags as $tag) {
                                ?>
                                    <option value="<?= $tag['tag_id'] ?>"><?= $tag['tag_name'] ?></option>
                                <?php } ?>

                                <option value="1">Tag 1</option>

                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">select Tags:</label>
                            <select name="tag_id" id="">
                                <?php
                                foreach ($tags as $tag) {
                                ?>
                                    <option value="<?= $tag['tag_id'] ?>"><?= $tag['tag_name'] ?></option>
                                <?php } ?>

                                <option value="1">Tag 1</option>

                            </select>
                        </div> -->

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