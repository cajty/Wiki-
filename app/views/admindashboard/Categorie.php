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
                <h1 class="mb-4">tag</h1>
                <form action="http://localhost/Wiki-/public/Admin/creatCategories" method="POST">
                    <label for="name">Tag Name:</label>
                    <input type="text" name="name" id="name">
                    <input type="submit" name="submit" value="creatCategories">
                </form>

                <div class="container-fluid">
                    <div class="row">
                        <?php foreach ($cat as $row) { ?>
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                        <?= $row->name ?>
                                        </h5>
                                        <button class='btn btn-primary btn-sm' data-bs-toggle="modal" data-bs-target="#update<?= $row->id ?>">Update</button>
                                        <a class='btn btn-danger btn-sm' href="http://localhost/Wiki-/public/Admin/deleteCategories/<?= $row->id ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="update<?= $row->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Tag</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">
                                                <form action="http://localhost/Wiki-/public/Admin/updateCategories/<?= $row->id ?>" method="POST">
                                                    <div class="mb-3">
                                                        <label for="categorie_name" class="form-label">Tag Name:</label>
                                                        <input type="text" class="form-control" id="name" value="<?= $row->name ?>" name="mane" required>
                                                    </div>
                                                    <button type="submit" name="submit" value="creatCategories" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>