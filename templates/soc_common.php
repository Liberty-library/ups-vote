<div class="container-fluid well well-lg page-header" >

	<h1 class="soc_title-top"><?php echo to_html(soc_link($soc["soc_name"]), "soc-title"); ?></h1>
	</div>
	<div class="btn-toolbar">
		<hr>
		
		<?php
		$scl = get_socc($scl,  $soc["soc_id"]);
		$_SESSION['soc_id'] = $soc;
		//echo $scc;
		/*echo "<div class=\"dropdown-top\">";
		echo "<button class=\"dropbtn-top\" onclick=\"myFunction()\">Menu";
                echo  "<i class=\"fa fa-caret-down\"></i>";
  echo "</button>";
 echo "<div class=\"dropdown-top-content\" id=\"myDropdown\">";
		
		echo "<li>";
			echo "<a role=link href=\"soc?soc=".$soc["soc_name"]."&saction=";
			// sub/unsub button
			if ($status["sub"])
				echo "unsub\" class=\"link\"><span class=\"glyphicon glyphicon-ok-sign\"></span> Subscribed";
			else
				echo "sub\" class=\"link\"><span class=\"glyphicon glyphicon-plus-sign\"></span> Subscribe";
			echo "</a>";
			echo "</li>";
			echo "<li>";
			// info
			echo "	<a role=link href=\"soc?soc=".$soc["soc_name"]."&view=info\" class=\"link\">
							<span class=\"glyphicon glyphicon-info-sign\"></span>
							About
						</a>";
						
						echo "</li>";
						echo "<li>";
						
			// mod panel
			
			if ($status["mod"] || $status["admin"])
				echo "	<a role=link href=\"mod_panel?soc=".$soc["soc_name"]."\" class=\"link\">
							<span class=\"glyphicon glyphicon-cog\"></span> 
							Mod Panel
						</a>";
						echo "</li>";
						echo "<li>";
			if (!$status["admin"])
				echo "<a class=\"link\" id=\"\" href=\"\" data-toggle=\"modal\" data-target=\"#report-soc\" value=\"3\" style=\"float:right;\">report</a>";
				echo "</li>";
		echo "<li>";
			if ($status["mod"] || $status["admin"])
				echo "	<a role=link href=\"new-sub?soc=".$soc["soc_name"]."\" class=\"link\">
							<span class=\"glyphicon glyphicon-cog\"></span> 
							Change Cover Picture
						</a>";
	echo "</div>";*/
		
	$soc = $_SESSION['soc_id'];

if ($hideButtons === true) {
    // This section of code will be hidden when $hideButtons is true (i.e., when you want to hide the buttons)
    echo 'Log in to make a Post';
} else {
    // This section of code will be displayed when $hideButtons is false (i.e., when you want to show the button)
    echo '<button class="btn btn-dark btn-sm" style="background-color: #000000b5;" data-toggle="modal" data-target="#newPostModal">
            New Post
          </button>';
}
?>


<!-- Trigger button for the modal -->
<!--<button class="btn btn-dark btn-sm" style="background-color: #000000b5;" data-toggle="modal" data-target="#newPostModal">
    New Post 
</button>

<!-- Modal -->
<div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="newPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPostModalLabel">New Post Options</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="new-post-link?soc=<?php echo $soc["soc_name"]; ?>">Link Post</a>
                    </li>
                    <li class="list-group-item">
                        <a href="new-post-page?soc=<?php echo $soc["soc_name"]; ?>">Image and/or text Post</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
		
<!--<script>
        // Add an event listener to capture the CSS input when the form is submitted
        document.getElementById('customCssForm').addEventListener('submit', function (event) {
            // Get the CSS input value and set it as a data attribute to be accessed in PHP
            var cssInput = document.getElementById('css_code');
            cssInput.setAttribute('data-css-code', cssInput.value);
        });

        // Combine both window.onclick event handlers
        window.onclick = function(e) {
            if (e.target.matches('.dropbtn-top')) {
                // Toggle between hiding and showing the dropdown content
                document.getElementById("myDropdown").classList.toggle("show");
            } else {
                // Close the dropdown if the user clicks outside of it
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }

                var myDropdown2 = document.getElementById("myDropdown2");
                if (myDropdown2.classList.contains('show')) {
                    myDropdown2.classList.remove('show');
                }
            }
        };
    </script>


<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customCssModal">
    Open Custom CSS Modal
</button>--->


<!-- Modal Trigger Button -->
<button class="btn btn-dark btn-sm" style="background-color: #000000b5; color: #25c0a9d6; "  data-toggle="modal" data-target="#socMenuModal">
    Society Menu 
</button>

<!-- Modal -->
<div class="modal fade" id="socMenuModal" tabindex="-1" role="dialog" aria-labelledby="socMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Content Goes Here -->
            <div class="modal-header">
                <h5 class="modal-title" style="color: #25c0a9d6;" id="socMenuModalLabel">Society Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal Body Content Goes Here -->
                <ul class="list-group">
                    <li class="list-group-item">
                        <a role="link" href="soc?soc=<?php echo $soc["soc_name"]; ?>&saction=<?php echo ($status["sub"]) ? "unsub" : "sub"; ?>" class="link">
                            <span class="glyphicon <?php echo ($status["sub"]) ? "glyphicon-ok-sign" : "glyphicon-plus-sign"; ?>"></span>
                            <?php echo ($status["sub"]) ? "Subscribed" : "Subscribe"; ?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a role="link" href="soc?soc=<?php echo $soc["soc_name"]; ?>&view=info" class="link">
                            <span class="glyphicon glyphicon-info-sign"></span>
                            About
                        </a>
                    </li>
                    <li class="list-group-item">
                        <?php
                        if ($status["mod"] || $status["admin"]) {
                            echo '<a role="link" href="mod_panel?soc='.$soc["soc_name"].'" class="link">';
                            echo '<span class="glyphicon glyphicon-cog"></span> Mod Panel';
                            echo '</a>';
                        }
                        ?>
                    </li>
                    <li class="list-group-item">
                        <?php
                        if (!$status["admin"]) {
                            echo '<a class="link" id="" href="" data-toggle="modal" data-target="#report-soc" value="3" style="float:right;">report</a>';
                        }
                        ?>
                    </li>
                    <li class="list-group-item">
                        <?php
                        if ($status["mod"] || $status["admin"]) {
                            echo '<a role="link" href="new-sub?soc='.$soc["soc_name"].'" class="link">';
                            echo '<span class="glyphicon glyphicon-cog"></span> Change Cover Picture';
                            echo '</a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <!-- Modal Footer Content Goes Here -->
            </div>
        </div>
    </div>
</div>

<a href="home" class="btn btn-dark btn-sm" style="background-color: #000000b5; color: #25c0a9d6; " >
   Home
</a>

<!-- Modal -->
<div class="modal fade" id="customCssModal" tabindex="-1" role="dialog" aria-labelledby="customCssModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="customCssModalLabel">Customize CSS</h4>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <form action=<?php echo "\"update_css.php?soc=".$soc["soc_name"]."\""; ?> method="post">
                    <input type="hidden" name="soc_id" value=<?php echo $soc["soc_id"];?> >
                    <label for="css_code">Custom CSS:</label><br>
                    <textarea id="css_code" name="css_code" rows="10" cols="50"></textarea><br>
                    <input type="submit" class="btn btn-primary" value="Save CSS">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <!-- ... (remaining modal content) -->
</div>
	<div id="report-soc" class="modal fade">
		<div class="modal-dialog" role="form">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3 id="report-soc-heading">Report society</h3>
				</div>
				<form id="soc_report_f" class="" method="POST" action=<?php echo "\"report_soc.php?soc=".$soc["soc_name"]."\""; ?> >
					<div class="modal-body">
						<div class="form-group">
						<input name="report_soc_id" id="report-soc-id" class="form-control hidden" value=<?php echo $soc["soc_id"]; ?> readonly="">
						</div>
						<div class="form-group">
						<textarea name="report_soc_reason" id="report-soc-text" class="form-control" rows="4" placeholder="Reason for reporting..."></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input class="btn btn-default" type="submit" value="Confirm" id="report-soc-btn">
						<a href="#" class="btn" data-dismiss="modal">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<style>


.dropdown-top {
  float: left;
  overflow: hidden;
}

.dropdown-top  .dropbtn-top {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}



.dropdown-top-content {
  display: none;
  position: absolute;
  background-color: #010618;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-top-content a {
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-top-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}
</style>
<!--<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn-top')) {
  var myDropdown = document.getElementById("myDropdown2");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}

/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn-top')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>--->

