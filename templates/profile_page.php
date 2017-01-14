<form action="profile.php" method="post" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username*</label>
        <div class="col-sm-3">
            <input autofocus required type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?=$usersq[0]["username"]?>">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email*</label>
        <div class="col-sm-3">
            <input required type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?=$usersq[0]["email"]?>">
        </div>
    </div>
    <div class="form-group">
        <label for="link" class="col-sm-2 control-label">Link to file</label>
        <div class="col-sm-3">
            <input type="url" name="link" id="link" class="form-control" placeholder="Direct link to 'Bookmarks' file" value="<?=$usersq[0]["link"]?>">
            <!--<span class="form-inline"><a href="instruction.php" title="For generating link.">Instructions</a></span>-->
        </div>
    </div>
    <div class="form-group">
        <label for="pass_old" class="col-sm-2 control-label">Old Password</label>
        <div class="col-sm-3">
            <input type="password" name="pass_old" id="pass_old" class="form-control" placeholder="Old Password">
        </div>
    </div>
    <div class="form-group">
        <label for="pass_new" class="col-sm-2 control-label">New Password</label>
        <div class="col-sm-3">
            <input type="password" name="pass_new" id="pass_new" class="form-control" placeholder="New Password">
        </div>
    </div>
    <div class="form-group">
        <label for="confirmation" class="col-sm-2 control-label">Confirmation</label>
        <div class="col-sm-3">
            <input type="password" name="confirmation" id="confirmation" class="form-control" placeholder="Confirmation">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-danger" data-toggle="modal" href="#deletefield">Delete This User</a>
        </div>
    </div>
</form>

<!--   MODALS   -->
<div class="modal fade" id="deletefield" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete User?</h4>
            </div>
            <div class="modal-body"><p>Are you sure you want to delete your user account?</p></div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</a>
                <a class="btn btn-danger" onclick="delid(<?=$usersq[0]["id"]?>);">Delete Account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function delid(id){
        var f = document.createElement("form");
        f.setAttribute('method',"post");
        f.setAttribute('action',"profile.php");

        var i = document.createElement("input"); //input element, text
        i.setAttribute('type',"hidden");
        i.setAttribute('name',"delid");
        i.setAttribute('value',id);
        f.appendChild(i);

        document.body.appendChild(f);
        f.submit();
    }
</script>