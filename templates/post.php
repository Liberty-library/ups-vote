<!-- Post Section -->

<style>
.navbar-inverse { background-image: url("<?php echo $scl[0]["soc_cover_location"]; ?>"); }
 .page-header { background-image: url("<?php echo $scl[0]["soc_cover_location"]; ?>"); 
 margin: 0px; max-height: 5%; position: fixed; opacity: 0;}
 .body {height:10%;
 background-color: #000000;}
 .link {color:#DCDCDC;}
 
.video-js {
    display: inline-block;
    vertical-align: top;
    box-sizing: border-box;
    color: #fff;
    background-color: rgba(0,0,0,0.5);
    position: relative;
    padding: 0;
    font-size: 10px;
    line-height: 1;
    font-weight: normal;
    font-style: normal;
    font-family: Arial, Helvetica, sans-serif;
    word-break: initial;
}
body {
background-color: #000000;
}
</style>

<?php

	$mod = am_mod($soc);
	echo to_html(post_full($post, $soc, $mod));

 

// Check if the session variables are set

    // Access the data
    $p = $post;
    $s = $soc;

    // Now you can use $p and $s as needed
    // ...

?>
 
 
 
           <!--<link href="plugin/PlayerSkins/skins/youtube.css" rel="stylesheet" type="text/css"/> --->
            

<!-- Comment Section -->
<div class="panel panel-default well">
	<div class="panel-heading">
			<?php
				echo "<h3>";
					echo "Comments (".$post["comments"].")";
				echo "</h3>";
			?>
	<a data-toggle="modal" data-target="#new-comm" class="btn btn-default">Add Comment</a>
	</div>
	<div class="panel-body well-lg">
		<?php

			if (count($comms) == 0)
				echo to_html(par("No comments yet."));
			else
				echo to_html(build_comment_tree($comms, $mod));

		?>
	</div>
</div>

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
			    error: function( xhr, status, errorThrown ) {
			        alert( "Login to Vote!!!!!" );
			        console.log( "Error: " + errorThrown );
			        console.log( "Status: " + status );
			        console.dir( xhr );
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
			    error: function( xhr, status, errorThrown ) {
			        alert( "Login to Vote!!!!" );
			        console.log( "Error: " + errorThrown );
			        console.log( "Status: " + status );
			        console.dir( xhr );
			    }
			});
		});
		$(".comm-upvote").click(function() {
		
			var hasVoted = $(this).hasClass("btn-success");
		    $.ajax({
			    url: "comm_vote.php",
			    data: {
			        comm_id: this.value,
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
			    	{ debugger
				    	$("#comm-down-"+this.value).removeClass("btn-danger").addClass("btn-default");
				    	$(this).removeClass("btn-default").addClass("btn-success");
				    }
			    },
			    error: function( xhr, status, errorThrown ) {
			        alert( "Login to Vote!!!!" );
			        
			        console.log( "Status: " + status );
			        console.dir( xhr );
			    }
			});
		});
		$(".comm-downvote").click(function() {
			var hasVoted = $(this).hasClass("btn-danger");
		    $.ajax({
			    url: "comm_vote.php",
			    data: {
			        comm_id: this.value,
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
				    	$("#comm-up-"+this.value).removeClass("btn-success").addClass("btn-default");
				    	$(this).removeClass("btn-default").addClass("btn-danger");
			    	}
			    },
			    error: function( xhr, status, errorThrown ) {
			        alert( "Sorry, there was a problem!" );
			        console.log( "Error: " + errorThrown );
			        console.log( "Status: " + status );
			        console.dir( xhr );
			    }
			});
		});
		
		$(".comm-reply").click(function() {
			$("#parent-id").attr("value", $(this).attr("value"));
			$("#new-comm-heading").text("Reply");
		});

		$(".comm-del").click(function() {
			$("#del-comm-id").val($(this).attr("value"));
			$("#del-comm-title").val($.trim($("#comm-title-"+$(this).attr("value")).text())+" "+$("#comm-time-"+$(this).attr("value")).text());
			$("#del-comm-text").val($("#comm-text-"+$(this).attr("value")).text());
		});
		$(".comm-report").click(function() {
			$("#report-comm-id").val($(this).attr("value"));
			$("#report-comm-title").val($.trim($("#comm-title-"+$(this).attr("value")).text())+" "+$("#comm-time-"+$(this).attr("value")).text());
			$("#report-comm-text").val($("#comm-text-"+$(this).attr("value")).text());
		});
	});
</script>



<!<!-- Share Modal HTML -->
<div id="shareModal" class="modal fade">
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3 id="share-modal-heading">Share Post</h3>
            </div>
            <div class="modal-body">
                <!-- Include the provided code here -->
                <head>
                    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
                </head>

                <body>
                    
                    <div class="frame">
 <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("https://ups-vote.com/post?pid=" . $p["post_id"] . "&soc=" . $s["soc_name"]); ?>" class="btn" target="_blank">
    <i class="fab fa-facebook-f" style="color: #3b5998;"></i>
</a>
    <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode("https://ups-vote.com/post?pid=" . $p["post_id"] . "&soc=" . $s["soc_name"]); ?>" class="btn" target="_blank"><i class="fab fa-twitter" style="color: #00acee;"></i></a>
    <a href="https://dribbble.com" class="btn" target="_blank"><i class="fab fa-reddit" style="color: #ea4c89;"></i></a>
    <a href="https://www.linkedin.com" class="btn" target="_blank"><i class="fab fa-rumble" style="color: #0e76a8;"></i></a>
    <a href="https://getpocket.com" class="btn" target="_blank"><i class="fab fa-gab" style="color: #ee4056;"></i></a>
    <a href="mailto:example@example.com" class="btn"><i class="far fa-envelope"></i></a>
</div>
                    </div>
                    <style>
  

h1 {
  position: relative;
  text-align: center;
  color: #353535;
  font-family: "Cormorant Garamond", serif;
  bottom: 30px;
}
h1:before{
  position: absolute;
  content: "";
  bottom: -10px;
  width: 100%;
  height: 2px;
  background-color: ;
}

.frame{
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
  height: 80px;
  width: 350px;
  position: relative;
   box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001,
   inset 0px 0px 0px 0px #fff9,
   inset 0px 0px 0px 0px #0001,
   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
   border-radius: 10px;
}

.shareModal{
  height: 35px;
  width: 35px;
  border-radius: 3px;
  background: #e0e5ec;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  -webkit-tap-highlight-color: transparent;
  box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001,
   inset 0px 0px 0px 0px #fff9,
   inset 0px 0px 0px 0px #0001,
   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
  font-size: 16px;
  color: rgba(42, 52, 84, 1);
  text-decoration: none;
}
.btn:active{
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
}
                    </style>
                </body>
            </div>
            <div class="modal-footer">
                <span id="closeModal" class="btn" data-dismiss="modal">Close</span>
            </div>
        </div>
    </div>
</div>
<!-- post-report modal -->
<div>
	<div id="report-post" class="modal fade">
		<div class="modal-dialog" role="form">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3 id="report-post-heading">Report post</h3>
				</div>
				<form id="post_report_f" class="" method="POST" action=<?php echo "\"report_post.php?soc=".$soc["soc_name"]."&pid=".$post["post_id"]."\"";?> >
					<div class="modal-body">
						<div class="form-group">
							<input name="report_post_id" id="report-post-id" class="hidden" value="" readonly="">
						</div>
						<div class="form-group">
							<textarea name="report_post_text" id="report-post-text" class="form-control" rows="4" disabled=""><?php echo $post["text"]; ?></textarea>
						</div>
						<div class="form-group">
							<textarea name="report_post_reason" id="report-post-reason" class="form-control" rows="4" placeholder="Reason for reporting..."></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input class="btn btn-default" type="submit" value="Confirm" id="report-post-btn">
						<a href="#" class="btn" data-dismiss="modal">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- post-deletion modal -->
<div id="del-post" class="modal fade">
	<div class="modal-dialog" role="form">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3 id="del-post-heading">Delete post</h3>
			</div>
			<form id="post_del_f" class="" method="POST" action="del_post.php">
				<div class="modal-body">
					<div class="form-group">
						<input name="del_post_id" id="del-post-id" class="form-control hidden" value=<?php echo $post["post_id"]; ?> readonly="">
						<input name="soc_name" id="sticky-soc-name" class="" hidden readonly value=<?php echo $soc["soc_name"]; ?> >
					</div>
					<div class="form-group">
						<strong><input name="del_post_title" id="del-post-title" class="form-control" value=<?php echo "\"".$post["title"]."\""; ?> disabled="">
					</div></strong>
					<div class="form-group">
						<textarea name="del_post_text" id="del-post-text" class="form-control" rows="4" value="" disabled=""><?php echo $post["text"]; ?></textarea>
					</div>
					<div class="form-group">
						<textarea name="del_post_reason" id="del-post-text" class="form-control" rows="4" placeholder="Reason for deletion..."></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input class="btn btn-default" type="submit" value="Confirm" id="del-post-btn">
					<a href="#" class="btn" data-dismiss="modal">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- post-sticky modal -->
<div id="sticky-post" class="modal fade">
	<div class="modal-dialog" role="form">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3 id="sticky-post-heading"><?php echo ($post["status"]=="STICKIED") ? "Unsticky":"Sticky"; ?> post</h3>
			</div>
			<form id="post_sticky_f" class="" method="POST" action="sticky_post.php" >
				<div class="modal-body">
					<div class="form-group">
						<input name="sticky_post_id" id="sticky-post-id" class="" hidden readonly value=<?php echo $post["post_id"]; ?> >
						<input name="soc_name" id="sticky-soc-name" class="" hidden readonly value=<?php echo $soc["soc_name"]; ?> >
						<input name="action" id="sticky-action" class="" hidden readonly value=<?php echo ($post["status"]=="STICKIED") ? "UNSTICKY":"STICKY";?> >
					</div>
					<div class="form-group">
						<strong><input name="sticky_post_title" id="sticky-post-title" class="form-control" value=<?php echo "\"".$post["title"]."\""; ?> disabled="">
					</div></strong>
					<div class="form-group">
						<textarea name="sticky_post_text" id="sticky-post-text" class="form-control" rows="4" value="" disabled=""><?php echo $post["text"]; ?></textarea>
					</div>
					<div class="form-group">
						<textarea name="sticky_post_reason" id="sticky-post-text" class="form-control" rows="2" placeholder=<?php echo "\"Reason for ".(($post["status"]=="STICKIED") ? "un":"" )."sticky-ing...\""; ?>></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<input class="btn btn-default" type="submit" value="Confirm" id="sticky-post-btn">
					<a href="#" class="btn" data-dismiss="modal">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- comment-report modal -->
<div>
	<div id="report-comm" class="modal fade">
		<div class="modal-dialog" role="form">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3 id="report-comm-heading">Report comment</h3>
				</div>
				<form id="comm_report_f" class="" method="POST" action=<?php echo "\"report_comm.php?soc=".$soc["soc_name"]."&pid=".$post["post_id"]."\"";?> >
					<div class="modal-body">
						<div class="form-group">
						<input name="report_comm_id" id="report-comm-id" class="form-control hidden" value="" readonly="">
						</div>
						<div class="form-group">
						<strong><input name="report_comm_title" id="report-comm-title" class="form-control" value="" disabled="">
						</div></strong>
						<div class="form-group">
						<textarea name="report_comm_text" id="report-comm-text" class="form-control" rows="4" value="" disabled=""></textarea>
						</div>
						<div class="form-group">
						<textarea name="report_comm_reason" id="report-comm-text" class="form-control" rows="4" placeholder="Reason for reporting..."></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input class="btn btn-default" type="submit" value="Confirm" id="report-comm-btn">
						<a href="#" class="btn" data-dismiss="modal">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- comment-deletion modal -->
<div>
	<div id="del-comm" class="modal fade">
		<div class="modal-dialog" role="form">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3 id="del-comm-heading">Delete comment</h3>
				</div>
				<form id="comm_del_f" class="" method="POST" action=<?php echo "\"del_comm.php?soc=".$soc["soc_name"]."&pid=".$post["post_id"]."\"";?> >
					<div class="modal-body">
						<div class="form-group">
						<input name="del_comm_id" id="del-comm-id" class="form-control hidden" value="" readonly="">
						</div>
						<div class="form-group">
						<strong><input name="del_comm_title" id="del-comm-title" class="form-control" value="" disabled="">
						</div></strong>
						<div class="form-group">
						<textarea name="del_comm_text" id="del-comm-text" class="form-control" rows="4" value="" disabled=""></textarea>
						</div>
						<div class="form-group">
						<textarea name="del_comm_reason" id="del-comm-text" class="form-control" rows="4" placeholder="Reason for deletion..."></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input class="btn btn-default" type="submit" value="Confirm" id="del-comm-btn">
						<a href="#" class="btn" data-dismiss="modal">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- new comment modal -->
<div>
	<div id="new-comm" class="modal fade">
		<div class="modal-dialog" role="form">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3 id="new-comm-heading">Add comment</h3>
				</div>
				<form id="comm_delf" class="comm" method="POST" action=<?php echo "\"new_comm.php?soc=".$soc["soc_name"]."&pid=".$post["post_id"]."\"";?> >
					<div class="modal-body">
						<label class="label" for="text">Comment</label><br>
						<div class="form-group">
							<textarea name="text" class="form-control" rows="4" placeholder="Write comment here..."></textarea>
						</div>
						<input name="parent_id" id="parent-id" class="hidden" value="">
					</div>
					<div class="modal-footer">
						<input class="btn btn-default" type="submit" value="Submit" id="new-comm-btn">
						<a href="#" class="btn" data-dismiss="modal">Cancel</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

