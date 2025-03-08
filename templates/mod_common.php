<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php 
	$t = isset($_GET["view"]) ? $_GET["view"]:"mods";
	$pg = "mod_panel.php?soc=".$soc["soc_name"]."&view=";
	$_SESSION['soc_id'] = $soc["soc_id"];
?>

<div class="panel container-fluid well">
<div class="panel-heading well well-sm">
	<h3>Mod Panel</h3>
</div>
<div class="panel-body well well-sm">
<ul class="nav nav-tabs">
	<li role="navigation" class=<?php echo $t=="main" ? "active":""?>>
		<a href=<?php echo $pg."main" ?>> 
			<span><i class="fa fa-tachometer"></i></span>
			Dashboard
		</a>
	</li>
	<li role="presentation" class=<?php echo $t=="mods"  ? "active":"" ?> >
		<a href=<?php echo $pg."mods" ?>>
			<span class="glyphicon glyphicon-list"></span>
		   Mod List
		</a>
	</li>
	<li role="presentation" class=<?php echo $t=="bans"  ? "active":"" ?> >
		<a href=<?php echo $pg."bans" ?>>
			<span class="glyphicon glyphicon-ban-circle"></span>
			 User bans
		</a>
	</li>
	<li role="presentation" class=<?php echo $t=="log"   ? "active":"" ?> >
		<a href=<?php echo $pg."log" ?>>
			<span class="glyphicon glyphicon-list-alt"></span>
			 Mod Log
		</a>
	</li>
	<li role="presentation" class=<?php echo $t=="dposts" ? "active":"" ?> >
		<a href=<?php echo $pg."dposts" ?>>
			<span class="glyphicon glyphicon-file"></span>
			 Deleted Posts
		</a>
	</li>
	<li role="presentation" class=<?php echo $t=="dcomms" ? "active":"" ?> >
		<a href=<?php echo $pg."dcomms" ?>>
			<span class="glyphicon glyphicon-comment"></span>
			 Deleted Comments
		</a>
	</li>
	<li role="presentation" class=<?php echo $t=="preps" ? "active":"" ?> >
		<a href=<?php echo $pg."preps" ?>>
			<span class="glyphicon glyphicon-warning-sign"></span>
			<span class="glyphicon glyphicon-file"></span>
			 Reported posts
		</a>
	</li>
	<li role="presentation" class=<?php echo $t=="creps" ? "active":"" ?> >
		<a href=<?php echo $pg."creps" ?>>
			<span class="glyphicon glyphicon-warning-sign"></span>
			<span class="glyphicon glyphicon-comment"></span>
			 Reported comments
		</a>
	</li>
</ul>
<script>
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


<button type="button" class="btn btn-css" data-toggle="modal" data-target="#customCssModal" data-socid="<?php echo $soc['soc_id']; ?>">
    Open Custom CSS Modal
</button>

<!-- Modal -->
<!-- Your modal markup (HTML structure) -->
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
                <form id="customCssForm" action=<?php echo "\"update_css.php?soc=" . $soc["soc_name"] . "\""; ?> method="post">
                    <input type="hidden" name="soc_id" value=<?php echo $soc["soc_id"];?> >
                    <label for="css_code">Custom CSS:</label><br>
                    <textarea id="css_code" name="css_code" rows="10" cols="50"></textarea><br>
                    <?php echo get_society_css($soc["soc_id"]); ?>
                    <input type="submit" class="btn btn-primary" value="Save CSS">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to handle modal functionality -->
<script>
    $(document).ready(function() {
        // Show the modal event
        $('#customCssModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var socId = button.data('socid'); // Extract info from data-* attributes

            // Fetch the current CSS for the society using an AJAX request
            $.ajax({
                url: 'get_current_css.php', // Adjust the URL to the script that fetches CSS
                type: 'GET',
                data: { soc_id: socId },
                success: function(response) {
                    // Update the textarea with the fetched CSS
                    $('#css_text').val(response);
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching CSS: ' + error);
                }
            });
        });
    });
</script>
<div class="well">
