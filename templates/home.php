<nav class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">My Chrome</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li style="padding: 15px;">Logged in as <?=ucfirst($user[0]["username"])?></li>
            </ul>
        </div>
    </div>
</nav>

<div class="row clearfix">
    <div class="col-md-9">
        <div class="form-inline" style="text-align: center;">
            <input class="form-control" style="margin-bottom: 10px;" autofocus type="text" id="search" placeholder="Type to Search...">
        </div>
        <div class='list-group' id='results'>
            <a class='list-group-item active' style='display: none;'>Results</a>
        </div>
        <?php traverse($bookmarks, "Bookmarks Bar");?>
    </div>

    <div class="col-md-3">
        <div class="bkmk easy-tree hidden-xs hidden-sm" role="complementary" style="position: inherit; overflow-y: auto;">
            <div class="list-group">
                <a class='list-group-item active'>Contents:</a>
                <a href="#search" class='list-group-item list-group-item-success' onclick="$('#search').focus();">Search</a>
                <div class="list-group-item"> <?php traverseaffix($bookmarks, "Bookmarks Bar");?> </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"> ///////////////////////////  SCRIPTS  ////////////////////////////////////////
    // Search Box Functions
    $(document).ready(function() {
        $("#search").keyup(function(e) {
            $('.file').unhighlight();
            $("#results").hide().html("<a class='list-group-item active'>Results</a>");
            if (e.keyCode == 27) {// clear search field on "Esc" key
                document.getElementById("search").value = "";
            }

            // Instant Search Functionality
            var val = $(this).val().toLowerCase();
            $(".file").each(function() {//for each row (tr)
                var text = $(this).text().toLowerCase();
                if ((text.indexOf(val) != -1 && val != "")) {//if match found OR search box empty
                    $("#results").show().append(this.outerHTML);
                }
            });

            // HIGHLIGHT (http://bartaz.github.io/sandbox.js/jquery.highlight.html)
            val = val.split(" ");
            $('.file').highlight(val);
        });
    });

    // set affix height
    function affixhgt() {
        $(".bkmk").css("height", ($(window).height()-90)+"px");
    }
    $(window).resize(affixhgt);
    affixhgt();

    // trims white space from string (search function)
    function trim(str) { return str.replace(/^\s\s*/, '').replace(/\s\s*$/, ''); }


    // Affix scroll
    var $sidebar   = $(".bkmk"),
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 15;

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });
</script>