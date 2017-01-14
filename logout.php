<?php

    // configuration
    require("includes/config.php");
    
    // log out current user, if any
    setcookie("id", "", 1);
    logout();

    // redirect user
    redirect("/");

?>
