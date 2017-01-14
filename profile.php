<?php
// configuration
require("includes/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if($_SESSION["id"] != 2) {
        if(isset($_POST["delid"])){
            if($_POST["delid"]==$_SESSION["id"]){
                query("DELETE FROM users WHERE id = ?", $_SESSION["id"]);
            }else{
                apologize("Couldn't access user.");
            }
        }else{
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
                apologize("Link is not a valid URL");
            }
            else
            {
                $jsonarray = json_decode(file_get_contents($_POST["link"]),true);
                if(!array_key_exists("roots", $jsonarray))
                {
                    apologize("Link doesn't contain bookmarks data.");
                }
            }
            if(!empty($_POST["pass_old"])){
                $old_pass = query("SELECT `hash` FROM `users` WHERE `id` = ?", $_SESSION["id"]);
                // validate submission
                if(empty($_POST["pass_new"]))
                {
                    apologize("You must provide a new password.");
                }
                elseif(empty($_POST["confirmation"]))
                {
                    apologize("You must provide your password twice.");
                }
                elseif($_POST["pass_new"] != $_POST["confirmation"])
                {
                    apologize("New password and confirmation do not match!");
                }
                elseif (crypt($_POST["pass_old"], $old_pass[0]["hash"]) != $old_pass[0]["hash"])
                {
                    apologize("Old password is wrong");
                }
            }


            // query database for user
            $usersq = query("select * from users where id = ?", $_SESSION["id"]);
            $rowsuser = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
            $rowsemail = query("SELECT * FROM users WHERE email = ?", $_POST["email"]);

            // if we found name or email
            if (count($rowsuser) == 1 && ($rowsuser[0]["id"] != $usersq[0]["id"]))
            {
                apologize("Username already exists.");
            }
            if(count($rowsemail) == 1 && ($rowsemail[0]["id"] != $usersq[0]["id"]))
            {
                apologize("Email already exists.");
            }

            if (!empty($_POST["pass_old"])) {
                $result = query("update users set username = ?, email = ?, hash = ?, link = ? where id = ?", $_POST["username"], $_POST["email"], crypt($_POST["pass_new"]), $_POST["link"], $_SESSION["id"]);
            }else{
                $result = query("update users set username = ?, email = ?, link = ? where id = ?", $_POST["username"], $_POST["email"], !empty($_POST["link"])?$_POST["link"]:"", $_SESSION["id"]);
            }

            if ($result === false)
            {
                apologize("An unexpected error occurred!");
            }else{
                redirect("/");
            }
        }
    } else {
        redirect("/");
    }
}

else{
    $usersq = query("select * from users where id = ?", $_SESSION["id"]);
    render("profile_page.php", array("title" => "User Profile", "usersq" => $usersq));
}

?>