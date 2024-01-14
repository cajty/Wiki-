<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .side {
            height: 95vh;
           
           
           
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">wiki</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/Wiki-/public/Admin/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Wiki-/Accueil">Accueil</a>
                        
                    </li>
                    <li class="nav-item dropdown d-md-none d-block ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                        </a>
                        <ul class="dropdown-menu ">
                            <li class="list-group-item"><a href="http://localhost/Wiki-/public/Admin/">wiki</a></li>
                            <li class="list-group-item"> <a href="http://localhost/Wiki-/public/Admin/getTags">tag</a></li>
                            <li class="list-group-item"><a href="http://localhost/Wiki-/public/Admin/getCategories">Categorie</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link"   href="http://localhost/Wiki-/public/Auteur/" >Auteur</a>  
                    </li>
                </ul>
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['first'] . " " . $_SESSION['last'] ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php if ($_SESSION['isAdmin'] == 0) { ?>
                            <li><a class="dropdown-item" href="?uri=user">Visiter le site web</a></li>
                        <?php } ?>
                        <li><a class="dropdown-item" href="http://localhost/Wiki-/public/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
   