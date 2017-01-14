<?php
	// configuration
    require("includes/config.php");

    // if form was submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
	{
    	// validate submission
    	if(empty($_POST["email"]))
    	{
    	    apologize("You must provide an email address.");
    	}
    	
    	// query database for user
        $rows = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);

        // if we found email, 
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];
            $newpass = Random(6);
            $MessageHTML = 
            '<html><body> '.
                '<p>Your password has been reset to: </p>'.
                '<p> ' . $newpass .'</p>'.
                'Go to <a href="http://mychrome.site90.net">Chrome Bookmarks</a>' .
            '</body></html>';
            $MessageTEXT = "Your password has been reset to " . $newpass;

            $result = query("UPDATE users SET hash = ? WHERE email = ?", crypt($newpass), $_POST["email"]);

            if ($result === false)
            {
                apologize("An unexpected error occurred!");
            }
            else
            {
                mailgun($_POST["email"],"MyChrome Password Reset",$MessageHTML,$MessageTEXT);
                //apologize(null,"forgot",array("title" => "Password Reset", "email" => $_POST["email"]));
                render("forgot_post.php", array("title" => "Password reset", "email" => $row["email"]));
            }
        }
        else
        {
        // else apologize
        apologize("Invalid email address.");
    	}
    	
    	
	
	}
	else
	{
    	// render forgot form
    	render("forgot_form.php", array("title" => "Forgot Password"));
	}

?>