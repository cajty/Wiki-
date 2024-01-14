

    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 border rounded mb-2 p-3">
                <h1 class="text-center">Login</h1>
                <form action="http://localhost/Wiki-/public/Account/registration" method="POST">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstName">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastName">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" value="register" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <hr>
                <p class="text-center">Already have an account? <a href="http://localhost/Wiki-/public/Login">Login</a></p>
            </div>
        </div>
    </div>
 

   