<?php
require("includes/config.php");
// Link to "Bookmarks" file[https://wspreview.cubby.com/p/_79adb645b84c49ec83ffaccb93d1ae76/Bookmarks/807099066]

$user = query("select * from users where id = ?", $_SESSION["id"]);
if(!empty($user[0]["link"])){
    // Get bookmarks
    $jsonarray = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', file_get_contents($user[0]["link"])),true);
    $bookmarks = $jsonarray["roots"]["bookmark_bar"]["children"];

    function traverse($folder, $name) {
        echo"<div class='list-group'>".
            "<a class='list-group-item active folder' id='".str_replace(" ", "_", $name)."'><span class='glyphicon glyphicon-folder-open'></span> ".$name."</a>";

        foreach($folder as $child) {
            if($child["type"] == "folder") {
                echo "<div class='list-group-item content'>";
                traverse($child["children"], $child["name"]);
                echo "</div>";
            }elseif($child["type"] == "url") {
                echo"<a href='".$child["url"]."' class='list-group-item list-group-item-warning file'>".htmlspecialchars($child["name"])."</a>";
            }
        }
        echo"</div>";
    }

    function traverseaffix($folder, $name) {
        echo "<ul><li>".
            "<a href='#".str_replace(" ", "_", $name)."'>$name</a>";

        foreach($folder as $child) {
            if($child["type"] == "folder") traverseaffix($child["children"], $child["name"]);
        }
        echo "</li></ul>";
    }

    /*function traverseaffix($folder, $name, $indent) {
        echo "<a href='#".str_replace(" ", "_", $name)."' class='list-group-item' style='text-indent: ".($indent*20)."px;'>$name</a>";
        foreach($folder as $child) {
            if($child["type"] == "folder") {
                traverseaffix($child["children"], $child["name"], $indent+1);
            }
        }
    }*/

    render("home.php", array("title" => ucfirst($user[0]["username"])."'s Chrome Bookmarks", "bookmarks" => $bookmarks, "user" => $user));
}
else nolink();

?>