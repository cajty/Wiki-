<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .sidebar {
            height: 95vh;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown d-block d-md-none">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-dark p-4 d-none d-md-block sidebar">
                <!-- Sidebar content goes here -->
                <h4 class="text-light">Sidebar</h4>
                <ul class="list-group">
                    <li class="list-group-item"><a href="http://localhost/Wiki-/public/Admin/">wiki</a></li>
                    <li class="list-group-item"> <a href="http://localhost/Wiki-/public/Admin/getTags">tag</a></li>
                    <li class="list-group-item"><a href="http://localhost/Wiki-/public/Admin/getCategories">Categorie</a></li>
                </ul>
            </div>
            <div class="col-md-9 p-4">
                <h1 class="mb-4">Wiki </h1>
                <h2>FOR visibility IF 1 visible and 0 invisible </h2>
                <div class="row">
                    <?php foreach ($r as $row) { ?>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $row->title  ?>  <br> visibility:<?=$row->visibility?> </h5>
                                            <p class="card-text"><?= $row->content ?></p>
                                            <a class='btn btn-warning btn-sm' href="http://localhost/Wiki-/public/Admin/visibility/<?= $row->id ?>" ">Visible</a>
                                            <a class='btn btn-danger btn-sm' href="http://localhost/Wiki-/public/Admin/deleteWiki/<?= $row->id ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>