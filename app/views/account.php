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

    <div class="container p-5">
        <div class="row justify-content-center  p-5">
            <div class="col-lg-4 col-md-6 col-sm-8 border   mb-2 text-bg-dark p-3">
                <h1>Login</h1>
                <form  action="http://localhost:8000/User/registration" method="POST">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstName">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control"  name="lastname" id="lastName">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control"  name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit"  name="submit" value="regester" class="btn btn-primary">Submit</button>
                </form>
                <hr>
                <p>I have an account <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>

    <footer class="footer text-bg-secondary text-center">
        <div class="container p-3">
            <p>&copy; 2023 My Website. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>