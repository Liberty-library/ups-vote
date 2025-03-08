  <link rel="stylesheet" href="css/style.css">
 
  <style>
  .floating {  
    animation-name: floating;
    animation-duration: 3s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    margin-left: 80px;
    margin-top: 15px;
    z-index: 0;
    
}
 img {
    vertical-align: middle;
    z-index: 0; position: relative;
}
@keyframes floating {
    0% { transform: translate(0,  0px); }
    50%  { transform: translate(0, 150px); }
    100%   { transform: translate(0, -0px);
    z-index: 0;}    
}
.form-signin {
    z-index: 1000;
    position: relative
}

</style>
<body>
    <div class="floating" style="height: 23px; width: 40px;
            
            padding: 0px; z-index: 0; ">
       <img src="uploads/style/images2.png" width="250" height="150" style="z-index: 0; position: relative;" alt="">
    </div>
</body>
<div class="form-container" style="height:300px;   z-index: 1;">

	<form class="form-signin" action="login.php" method="post">
		<h2 class="form-signin-heading"></h2>
		
		<div class="form-group">
			<label for="inputEmail" class="sr-only">Email address</label>
			<input name="username" type="text" id="inputEmail" class="form-control" placeholder="Username" required="" autofocus=""/>
		</div>
		
		<div class="form-group">
			<label for="inputPassword" class="sr-only">Password</label>
			<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required=""/>
		</div>
		
		<div class="form-group">
			<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</div>
	</form>
	<div>
		or <a href="register">Register</a>
	</div>
</div>
<!--<div id=login_img style="bottom:0%; text-align: center; position: ;">
<img src="uploads/1699725420_654fc06cab2d9.PNG" alt="login_image" width="1000" height="500">
</div> ---->
<div id=footer style="bottom:0%; text-align: center; position: ;">
&nbsp;

<a title="Terms of Use" href="TERMS_OF_USE.php" rel="nofollow">Terms of Use</a> 
</div>
