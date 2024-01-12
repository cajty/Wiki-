<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-3">
        <div class="container">
            <a class="navbar-brand" href="#">My Website</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card p-4">
            <h4 class="mb-4">Select an Option:</h4>
            <div class="mb-3">
                <select class="form-select" name="selectedOption">
                <?php foreach ($r as $row) { ?>
                        <option  value="<?= $row->name; ?>"><?= $row->name; ?></option>;
                    
                        <?php } ?>
                </select>
            </div>

            <h4 class="mt-4">Fill in the Details:</h4>
            <form action="http://localhost/Wiki-/public/Wiki/createWiki/1" method="POST">
               
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                        placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1"
                        rows="11"></textarea>
                </div>
                <button type="submit" name="submit" value="wikeCreat"
                    class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <footer class="footer mt-5 py-3 text-center bg-secondary text-white">
        <div class="container">
            <p>&copy; 2023 My Website. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>