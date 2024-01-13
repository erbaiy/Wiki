<!DOCTYPE html>
<html>

<head>
    <title>Add New Wiki Entry</title>
    <style>
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-primary {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>updateWiki Entry</h1>
    <form id="addWikiForm" action="?route=updatWiki" method="post">
        <div class="form-group">
            <label for="wiki_title">Title:</label>
            <input type="text" class="form-control" name="wiki_title" id="wiki_title" value="<?php echo $row['wiki_title'] ?>">
            <input type="text" class="form-control" name="wiki_id" id="wiki_title" value="<?php echo $id ?>">
        </div>
        <div class="form-group">
            <label for="wiki_content">Content:</label>
            <textarea class="form-control" name="wiki_content" id="wiki_content" rows="5"><?php echo $row['wiki_content']; ?></textarea>

        </div>


        <div class="form-group">
            <label for="category">Category:</label>
            <select name="category_id" value="<?php echo $row['name'] ?>">
                <?php foreach ($category as $cat) { ?>
                    <option value="<?php echo $cat['category_id'] ?>"><?php echo $cat['name'] ?> </option>
                <?php } ?>
                <!-- <option value="ption> -->
                <!-- <option value="2">Category 2</option>
                <option value="3">Category 3</option> -->
            </select>
        </div>
        <div class="form-group">
            <label for="tag_id">Select Tags:</label>
            <select name="tag_id">
                <?php foreach ($tags as $tag) { ?>
                    <option value="<?php echo $tag['tag_id'] ?>"><?php echo $tag['tag_name'] ?> </option>
                <?php } ?>
            </select>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Create Wiki Entry</button>
    </form>
</body>

</html>