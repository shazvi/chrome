<form action="login.php" method="post" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Login Name</label>
        <div class="col-sm-3">
            <input autofocus required type="text" name="username" id="username" class="form-control" placeholder="Username">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-3">
            <input required type="password" name="password" id="password" class="form-control" placeholder="Password">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Log In</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <p>Or <a href="register.php"> Register</a></p>
            <p>Or <a href="demo.php"> Demo the Site</a></p>
            <p><a href="forgot.php">Forgot Password?</a></p>
            <!--<p><a href="instruction.php">Setup API</a></p>-->
        </div>
    </div>
</form>