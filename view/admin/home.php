<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .conten {


            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 20px;

        }

        .px-4 {
            gap: 20px;
        }

        .category {
            background-color: #f5deb31c;
            width: 50%;
            height: 500px;
            border: #00000026 solid 2px;
            border-radius: 5px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            color: white;
            background-color: #4CAF50;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn.br-darck {
            background-color: #333;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">

                    <a href="" class="nav-link text-white-50">home</a>

                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item active" style="width: 100%;">
                        <a href="?route=Dashboard" class="sidebar_link"> <img src="assets/img/overview.svg" alt="icon">Overview</a>
                    </li>

                    <li class="sidebar_item">
                        <a href="index.php?route=archife" class="sidebar_link"> <img src="assets/img/task.svg" alt="icon">archife</a>
                    </li>



                </ul>

        </aside>
        <div class="main">
            <nav class="conten justify-content-space-between pe-4 ps-2">

                <div class="navbar  gap-4">
                    <div class="">
                        <input type="search" class="search " placeholder="Search">
                        <img class="search_icon" src="assets/img/search.svg" alt="iconicon">
                    </div>
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <img class="notification" src="assets/img/new.svg" alt="icon">
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="assets/img/settingsno.svg" alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="assets/img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="assets/img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>

                    </div>
                    <div class="inline"></div>
                    <div class="name"> Admin</div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="assets/img/photo_admin.svg" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="/PeoplePerTask/project/pages/index.html">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="contain Agents px-4" style="display: flex;">
                <div class="category">
                    <div class="head bg-black">

                    </div>
                    <table>
                        <thead>
                            <!-- <tr><button class="btn  br-darck">add</button></tr> -->
                            <tr>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-darck" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    new category
                                </button>

                                <!-- Modal -->
                                <form action="?route=addCategory" method='POST'>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><i>Category</i></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <input type="text" name="category" placeholder="enter new category" id="">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                    <input type="submit" name="submit" id="" value="save" class="btn btn-primary">
                                </form>
                </div>
        </div>
    </div>
    </div>
    </tr>
    <tr>
        <th>
            <p><i>category</i></p>

        </th>
        <th>
            ______________________
        </th>
        <th>
            update
        </th>
        <th>
            delete
        </th>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach ($result as $row) {
        ?>
            <tr style="border:#00000026 solid 1.3px;">
                <th><?php echo $row["name"] ?></th>
                <td>
                    <div class="modal fade" id="exampleModal_<?php echo $row['category_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="?route=updateCategory" method="post">
                                        <input type="hidden" name="categoryid" id="" value="<?php echo $row['category_id']; ?>">
                                        <input type="text" name="inpCategory" value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <th>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $row['category_id']; ?>" href="#"><i class="fa-solid fa-pencil"></i></a>
                </th>
                <th>
                    <a href="/?route=deleteCategory&id=<?php echo $row['category_id']; ?>"><i class="fa-solid fa-trash"></i></a>
                </th>
            </tr>
        <?php
        }
        ?>
    </tbody>
    </table>
    <div class="body"></div>

    </div>
    <div class="category">
        <table class="table">
            <thead>
                <tr><!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTagModal">
                        Add New Tag
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addTagModalLabel">Add New Tag</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- Modal Body -->
                                <form id="addTagForm" action="?route=addTags" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="tagName" class="form-label">Tag Name</label>
                                            <input type="text" name="tagName" class="form-control" id="tagName" name="tagName" required>
                                        </div>
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" class="btn btn-primary" form="addTagForm">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </tr>
                <tr>ags</tr>
                <tr>
                    <th scope="col">tag id</th>
                    <th scope="col">tag name</th>

                    <th scope="col">edite</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody id="studentdata">


            </tbody>
        </table>
    </div>

    </section>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../public/assets/dashboard.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getData();
        });

        function getData() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '?route=getTags', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // console.log(xhr.response);
                    var response = JSON.parse(xhr.responseText);
                    response.forEach(function(value, index) {
                        var row = `
                    <tr data-id="${value.tag_id}">
                        <td>${value.tag_id}</td>
                        <td>${value.tag_name}</td>
                        <td>
                            <button data-bs-target="#modal${index}" data-bs-toggle="modal">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                        </td>
                        <td>
                            <button onclick="deleteData(${value.tag_id})" class="delete-btn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <div class="modal fade" id="modal${index}" tabindex="-1" aria-labelledby="modal${index}Label" aria-hidden="true">
                            <form id="form${index}"></form>
                        </div>
                    </tr>`;
                        document.getElementById('studentdata').insertAdjacentHTML('beforeend', row);
                        document.getElementById('form' + index).innerHTML = `
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modal${index}Label">Update Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <input type="hidden" name="Tagid" value="${value.tag_id}"/>
                                        <input type="text" name="inpTag" value="${value.tag_name}"/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button name=submit type="button" onclick="updateData(${index})" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>`;
                    });

                }
            };
            xhr.send();
        }

        function deleteData(id) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '?route=deleteTags&id=' + id, true);
            console.log(id);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var row = document.querySelector('tr[data-id="' + id + '"]');
                    console.log(row);
                    if (row) {
                        row.remove();
                    }
                    alert('Record deleted successfully!');
                }
            };
            xhr.send();
        }

        // function updateData(index) {

        //     console.log(index);
        //     var form = document.getElementById('form' + index);
        //     var id = form.elements['Tagid'].value;
        //     var name = form.elements['inpTag'].value;
        //     // console.log(fo)

        //     var xhr = new XMLHttpRequest();
        //     xhr.open('POST', '?route=updateTags', true);
        //     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        //     var params = 'id=' + encodeURIComponent(id) + '&name=' + encodeURIComponent(name);

        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState === 4 && xhr.status === 200) {
        //             // alert('Data updated successfully!');
        //             console.log(params);
        //         }
        //     };

        //     xhr.send(params);
        // }
        function updateData(index) {
            console.log(index);
            var form = document.getElementById('form' + index);
            var id = form.elements['Tagid'].value;
            var name = form.elements['inpTag'].value;

            var params = 'id=' + encodeURIComponent(id) + '&name=' + encodeURIComponent(name);

            // Redirect to the updateTags route

            window.location.href = '?route=updateTags&id=' + encodeURIComponent(id) + '&name=' + encodeURIComponent(name);

            // Optional: Perform an AJAX request if needed
            var xhr = new XMLHttpRequest();
            xhr.open('get', '?route=updateTags', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // alert('Data updated successfully!');
                    console.log(params);
                }
            };

            xhr.send(params);
        }
    </script>
</body>

</html>