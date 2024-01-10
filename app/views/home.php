<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <!-- Content here -->
    </div>
    <nav class="navbar navbar-expand-lg text-bg-secondary py-3  ">

        <b class="navbar-brand   text-white  px-2">
            My Website
        </b>

    </nav>
    <form  action="http://localhost/Wiki-/public/Wike/createWiki" method="POST">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="11"></textarea>
    </div>
    <button type="submit" name="submit" value="wikeCreat" class="btn btn-primary">Submit</button>
    </form>

    <footer class="footer text-bg-secondary text-center">
        <div class="container p-3">
            <p>&copy; 2023 My Website. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>