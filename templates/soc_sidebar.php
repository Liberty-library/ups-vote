<style>
 .sidebar.col-md-2.container-fluid {
    /* Your styles go here */
    background-color: #f8f9fa; /* Example background color */
    padding-top: 32px; /* Example padding */
     
    }
.container-sidebar { padding:1px; top:0px; right: 20px; left: 0;   z-index: 1000;}
.table {
    background-color: #000000;
     border-radius: 25px;}
#sidebar {
   position: relative;
    top:0; bottom:0; left:0; right:20px;
    max-width:500px;
    height: 300px;
    background: #00000000;
    float:right;
        z-index: 3;
}
.sidebar {
    position: static;
    display: block;
    width: 500px;
    margin-top: 0;
 
}
@media screen and (max-width: 992px) {
  .row {
    display: flex;
    margin-right: 5px;
    width: 100%;
}
  body {
    background-color: blue;
  }
  .navbar {
    width: 100%;
}
.table {
    background-color: #000000;
}
 .sidebar.col-md-2.container-fluid {
        display: none;
    }
    #sidebar {
    display: none;
}
.container-fluid {
    /* margin-right: auto; */
    /* margin-left: auto; */
    padding-left: 5px;
    padding-right: 5px;
}
}
.panel-black {
    /* Your styles for the unique sidebar element */
    background-color:#010618;
    padding: 1px;
    border-right: 1px solid #dee2e6;
    
    /* Add more styles as needed */
}

/* Optional: Add styles for responsive behavior */
@media (max-width: 992px) {
   .panel-black{
       display: none;
        /* Add more responsive styles if necessary */
    }
}

/* On screens that are 600px or less, set the background color to olive */
@media screen and (max-width: 600px) {
  .row {
    display: flex;
    margin-right: 5px;
    width: 100%;
}

  body {
    background-color: rgb(8 51 68);
  }
   .navbar {
    width: 100%;
    
}
 .sidebar {
        display: none;
    }
    #sidebar {
    display: none;
}
.container-fluid {
    /* margin-right: auto; */
    /* margin-left: auto; */
    padding-left: 5px;
    padding-right:5px;
}
}


</style>

<div class="row container-fluid">
  <div id="sidebar" class="sidebar col-md-2 container-fluid">

        <?php
            $sublist = get_subs();
            $t = make_table($sublist, ["society"], "table", "sub_socs", [], [0]);
            $t["children"][0]["attribs"]["hidden"] = ""; // hide table header

            $table = div(div(par("All Subs"), "panel-heading"), "panel panel-black");
            $table["children"][] = $t;
            echo to_html($table);

        ?>
</div>

<!-- Page content -->
<div class="content">
 
</div>
