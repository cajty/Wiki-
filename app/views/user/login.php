

 
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 border rounded mb-2 p-3">
                <h1 class="text-center">Login</h1>
                <form action="http://localhost/Wiki-/public/Login/login" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" value="login" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <hr>
                <p class="text-center">Don't have an account? <a href="http://localhost/Wiki-/public/Account">Create one</a></p>
            </div>
        </div>
    </div>

   