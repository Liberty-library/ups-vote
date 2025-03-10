<script>
	$( document ).ready(function(){
		$(".downvote-active").addClass("btn-danger");
		$(".upvote-active").addClass("btn-success");
		$(".post-upvote").click(function() {
			var hasVoted = $(this).hasClass("btn-success");
		    $.ajax({
			    url: "post_vote.php",
			    data: {
			        post_id: this.value,
			        vote: hasVoted ? "UNVOTE":"UP"
			    },
			    type: "POST",
			    dataType : "json",
			    context: this,
			    success: function( json ) {
			    	if (hasVoted)
			    	{
				    	$(this).removeClass("btn-success").addClass("btn-default");
			    	}
			    	else
			    	{
				    	$("#post-down-"+this.value).removeClass("btn-danger").addClass("btn-default");
				    	$(this).removeClass("btn-default").addClass("btn-success");
				    }
			    },
			error: function(xhr, status, errorThrown) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Sorry, You must LOGIN to Vote!'
    });
    console.log("Error: " + errorThrown);
    console.log("Status: " + status);
    console.dir(xhr);
}
			});
		});
		$(".post-downvote").click(function() {
			var hasVoted = $(this).hasClass("btn-danger");
		    $.ajax({
			    url: "post_vote.php",
			    data: {
			        post_id: this.value,
			        vote: hasVoted ? "UNVOTE":"DOWN"
			    },
			    type: "POST",
			    dataType : "json",
			    context: this,
			    success: function( json ) {
			    	if (hasVoted)
			    	{
				    	$(this).removeClass("btn-danger").addClass("btn-default");
			    	}
			    	else
			    	{
				    	$("#post-up-"+this.value).removeClass("btn-success").addClass("btn-default");
				    	$(this).removeClass("btn-default").addClass("btn-danger");
			    	}
			    },
			    error: function(xhr, status, errorThrown) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Sorry, You must LOGIN to Vote!'
    });
    console.log("Error: " + errorThrown);
    console.log("Status: " + status);
    console.dir(xhr);
}
			});
		});
	});
</script>

<!-- news feed -->
<div class="row container-fluid" style="">
	<div class="col-md-10 container-fluid">
		<div class="panel panel-default">
		<!-- Default panel contents -->
			<div class="panel-heading">News Feed</div>
			<div class="list-group panel-body">
				<?php 
					if (count($posts) == 0)
					{
						echo to_html(par("No posts yet."));
					}
					else
					{
						foreach($posts as $p)
						{
							echo "<div class=\"post-row\">";

							echo to_html(post_summary($p, $p["society"], true));

							echo "</div>";
							echo "<hr>";
						}
					}
				?>
			</div>
		</div>
	</div>
	<div class="col-md-2 container-fluid">
		<?php

			$t = make_table($subs, ["society"], "table", "sub_socs", [], [0]);
			$t["children"][0]["attribs"]["hidden"] = ""; // hide table header
			
			$table = div(div(par("Subscribed Subs"), "panel-heading"), "panel panel-primary");
			$table["children"][] = $t;
			echo to_html($table);

		?>

        <?php
            $sublist = get_subs();
            $t = make_table($sublist, ["society"], "table", "sub_socs", [], [0]);
            $t["children"][0]["attribs"]["hidden"] = ""; // hide table header

            $table = div(div(par("All Subs"), "panel-heading"), "panel panel-primary");
            $table["children"][] = $t;
            echo to_html($table);

        ?>
        <?php
        if ($hideButtons === true): ?>




                     
                              
		
	</div>
</div>
<?php else: ?>                       
        <a data-toggle="modal" data-target="#new-soc" class="btn btn-primary btn-large form-control" >Create a Sub</a>
		
	</div>
</div>
  <?php endif; ?>  
  
  <style>
 
 
 .votes{color: #b0ff16;
  font-weight: 900;}
 .fa-thumbs-down {font-size: 25px; display: table-row; }
  .fa-thumbs-up {font-size: 25px; display: table-row;}
  
  @media only screen and (max-width: 1100px) {
  .row {
    display: table-row;
    margin-right: 0px;
}
}
  
</style>


<!-- new-society modal -->
<div id="new-soc" class="modal fade">
	<div class="modal-dialog" role="form">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Create a new Society</h3>
			</div>
			<form id="new-soc-form" class="" method="POST" action="new_soc.php" enctype="multipart/form-data" >
				<div class="modal-body">
					<div class="form-group">
						<input name="soc" class="form-control" type="text" placeholder="Society name">
					</div>
					<div class="form-group">
						<textarea name="text" class="form-control" rows="4" placeholder="Text (Optional)"></textarea>
					</div>
					<div class="mb-3">
     <label for="image">Add a Cover Image (optional):</label>
    <input type="file" id="image" name="image">
        </div>
				</div>
				<div class="modal-footer">
					<input class="btn btn-default" type="submit" value="Submit" id="new_post">
					<a href="#" class="btn" data-dismiss="modal">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>
