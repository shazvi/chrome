<form action="register.php" method="post" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username*</label>
        <div class="col-sm-3">
            <input autofocus required type="text" name="username" id="username" class="form-control" placeholder="Username">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email*</label>
        <div class="col-sm-3">
            <input required type="email" name="email" id="email" class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="link" class="col-sm-2 control-label">Link to file</label>
        <div class="col-sm-3">
            <input type="url" name="link" id="link" class="form-control" placeholder="Direct link to 'Bookmarks' file">
            <!--<span class="form-inline"><a href="instruction.php" title="For generating link.">Instructions</a></span>-->
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Generating Link
            </button>
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password*</label>
        <div class="col-sm-3">
            <input required type="password" name="password" id="password" class="form-control" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="confirmation" class="col-sm-2 control-label">Confirmation*</label>
        <div class="col-sm-3">
            <input required type="password" name="confirmation" id="confirmation" class="form-control" placeholder="Confirmation">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <p>Or <a href="login.php"> Login</a></p>
            <p><a href="forgot.php">Forgot Password?</a></p>
        </div>
    </div>
</form>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Generating Link</h4>
            </div>
            <div class="modal-body">
                <h5><strong>Getting Started</strong></h5>
                <p>
                    To get started, one key prerequisite is to have a cloud syncing software installed on your PC which can share direct links to files uploaded in the cloud.
                </p>
                <h5><strong>Our Custom API</strong></h5>
                <p>
                    If and when you have that setup, our "hacked together" API involves syncing the "Bookmarks." file in chrome's settings folder("%LOCALAPPDATA%\Google\Chrome\User Data\Default") to a cloud storage service - using <a target="_blank" href="http://superuser.com/a/255734/161391">Hardlinks</a> if needed.
                </p>
                <h5><strong>Getting Link</strong></h5>
                <p>
                    Once that's done, proceed to getting a direct link to that file from the cloud storage provider and provide that link here.
                </p>
                <p>
                    <strong>Note:</strong> The reason for using such a complicated API setup is because Google doesn't provide its own Chrome Bookmarks API or a website where we can access it online.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>