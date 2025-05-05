<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Wiki
    </title>

    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light ">
            <div class="container">
                <!-- Brand/logo -->
                <a class="navbar-brand" href="#">
                    <img src="https://tse4.mm.bing.net/th?id=OIP.IdLwnRtdlKuifzEMNBxwJgHaEL&pid=Api&P=0&h=180" alt="Wiki Logo" width="30" height="30" class="d-inline-block align-top">
                    <span class="ml-2">Wiki™</span>
                </a>

                <!-- Toggler/collapsible Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?route=author">Author</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Language
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">FR</a>
                                <a class="dropdown-item" href="#">EN</a>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">EN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?route=getlogin">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?route=logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section action="#" method="POST" class="search">
        <h2>Find Your wiki</h2>

        <div class="form-group mb-2">
            <input type="text" id="keywords" placeholder="Keywords">

            <button type="submit" name="search" onclick="search()" class="btn btn-primary mb-2">Search</button>


    </section>

    <!--------------------------  card  --------------------->
    <section class="light">
        <h2 class="text-center py-3">Latest Wiki Listings</h2>
        <div class="container py-2">

            <div id="result">

            </div>
        </div>
    </section>





    <footer>

        <div class="footer-bottom">
            <p>&copy; 2024 Wiki. All rights reserved.</p>
        </div>
    </footer>


    <script>
        function search() {
            var searchTerm = document.getElementById('keywords').value;

            // con=
            // console.log(searchTerm);
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '?route=searchWiki&inp=' + searchTerm, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // console.log(xhr.responseText);
                    document.getElementById('result').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
        search();
    </script>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>