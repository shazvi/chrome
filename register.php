<?php
// configuration
require("includes/config.php");
// if form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["username"]))
    {
        apologize("You must provide your username.");
    }
    elseif(empty($_POST["email"]))
    {
        apologize("You must provide an email.");
    }
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    {
        apologize("Email is not valid");
    }
    elseif (!empty($_POST["link"]) && !filter_var($_POST["link"], FILTER_VALIDATE_URL))
    {
        apologize("Link is not valid");
    }
    elseif(empty($_POST["password"]))
    {
        apologize("You must provide your password.");
    }
    elseif(empty($_POST["confirmation"]))
    {
        apologize("You must provide your password twice.");
    }
    elseif($_POST["password"] != $_POST["confirmation"])
    {
        apologize("Passwords do not match!");
    }else{
        $jsonarray = json_decode(file_get_contents($_POST["link"]),true);
        if(!array_key_exists("roots", $jsonarray))
        {
            apologize("Link doesn't contain bookmarks data.");
        }

        // query database for user
        $rowsuser = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        $rowsemail = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);

        // if we found name or email
        if (count($rowsuser) == 1)
        {
            apologize("Username already exists.");
        }
        elseif(count($rowsemail) == 1)
        {
            apologize("Email already exists.");
        }
    }

    $result = query("INSERT INTO users (username, hash, email, link) VALUES(?, ?, ?, ?)", $_POST["username"], crypt($_POST["password"]), $_POST["email"], !empty($_POST["link"])?$_POST["link"]:"");

    if ($result === false)
    {
        apologize("An error unexpected occurred!");
    }
    else
    {
        $rows = query("SELECT LAST_INSERT_ID() AS id");

        // remember that user's now logged in by storing user's ID in session
        $_SESSION["id"] = $rows[0]["id"];
        setcookie( "id", $_SESSION["id"], strtotime( '+30 days' ) );

        // redirect to home
        redirect("/");

    }
}

else
{
	// else render form
	render("register_form.php", array("title" => "Register"));
}
