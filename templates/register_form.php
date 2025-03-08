<link href="https://liberty-library.com/node_modules/croppie/croppie.css" rel="stylesheet" type="text/css"/>
        <script src="https://liberty-library.com/node_modules/croppie/croppie.min.js" type="text/javascript"></script>
        <link href="https://liberty-library.com/view/js/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://liberty-library.com/view/js/bootstrap-fileinput/js/fileinput.min.js" type="text/javascript"></script>
        <link href="https://liberty-library.com/view/css/bodyFadein.css" rel="stylesheet" type="text/css"/>
         <link href="https://liberty-library.com/node_modules/animate.css/animate.min.css?cache=1653104841_1653104975" rel="stylesheet"  type="text/css" />
    <link href="https://liberty-library.com/view/js/webui-popover/jquery.webui-popover.min.css" rel="stylesheet" type="text/css"/>
<link href="https://liberty-library.com/node_modules/fontawesome-free/css/all.min.css?cache=1653104841_1653104975" rel="stylesheet" type="text/css"/>
<link href="https://liberty-library.com/view/css/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>

 




<div class="container" style="width:300px">

<form class="form-signin"  action="register.php" method="post">
	<h2 class="form-signin-heading">Sign up</h2>
	<div class="form-group">
		<input autofocus required class="form-control" name="username" placeholder="Username" type="text"/>
	</div>
	<br>
        <input id="inputPassword" name="password" type="password"  placeholder="Password" class="form-control" data-tooltip="Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.">
       
            <span class="input-group-addon" style="cursor: pointer;" id="toggle_inputPassword"  data-toggle="tooltip" data-placement="left" title="Show/Hide Password"><i class="fas fa-eye-slash"></i></span>
    
    <script>
        $(document).ready(function () {
            $('#toggle_inputPassword').click(function () {
                $(this).find('i').toggleClass("fa-eye fa-eye-slash");
                if ($(this).find('i').hasClass("fa-eye")) {
                    $("#inputPassword").attr("type", "text");
                } else {
                    $("#inputPassword").attr("type", "password");
                }
            })
        });
    </script>
	
	<br>
	<div class="form-group" style="width:270px">
	<input id="inputPasswordConfirm" name="confirmation" type="password" placeholder="Confirm New Password" class="form-control" autocomplete="off">
		
		<span class="input-group-addon alreadyTooltip" style="cursor: pointer;" id="toggle_inputPasswordConfirm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Show/Hide Password"><i class="fas fa-eye-slash"></i></span>
    </div>
    <script>
    
        $(document).ready(function () {
            $('#toggle_inputPasswordConfirm').click(function () {
                $(this).find('i').toggleClass("fa-eye fa-eye-slash");
                if ($(this).find('i').hasClass("fa-eye")) {
                    $("#inputPasswordConfirm").attr("type", "text");
                } else {
                    $("#inputPasswordConfirm").attr("type", "password");
                }
            })
        });
    
    </script>
	
	
	<div class="form-group" style="width:270px">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
	</div>
</form>
<div>
    or <a href="login.php">log in</a>
</div>
</div>
<div id=footer style="bottom:0%; text-align: center; position: ;">
&nbsp;

<a title="Terms of Use" href="TERMS_OF_USE.php" rel="nofollow">Terms of Use</a> 
</div>
<style>
    .input-group-addon, .input-group-btn {
    width: 0%;
    white-space: nowrap;
    vertical-align: middle;
}
    
    body {
        background: radial-gradient(#8f7f47,#023b4d);
    }
    .tooltip{
    z-index: 1;
    position: relative;
    background: rgba(0,0,0,0.3);
    padding: 5px 12px;
    border-radius: 100%;
    font-size: 20px;
    cursor: help;
    color: black;
}

.tooltip::before, .tooltip::after{
    position: absolute;
    left: 50%;
    opacity: 0;
    transition: all ease 0.3s;
}

.tooltip::before{
    content: "";
    border-width: 10px 8px 0 8px;
    border-style: solid;
    border-color: rgba(0,0,0,0.3) transparent transparent transparent;
    top: -20px;
    margin-left: -8px;
}

.tooltip::after{
    content: attr(data-tooltip);
    background: rgba(0,0,0,0.3);
    top: -20px;
    transform: translateY(-100%);
    font-size: 14px;
    margin-left: -150px;
    width: 300px;
    border-radius: 10px;
    color: #eee;
    padding: 14px;
}

/* Hover states */

.tooltip:hover::before, .tooltip:hover::after{
    opacity: 1;
}

    .AnimatedLight {
        position: absolute;
        width: 0px;
        opacity: .75;
        background-color: white;
        box-shadow: #e9f1f1 0px 0px 20px 2px;
        opacity: 0;
        top: 100vh;
        bottom: 0px;
        left: 0px;
        right: 0px;
        margin: auto;
        z-index: -1;
    }

    .x1{
        -webkit-animation: floatUp 4s infinite linear;
        -moz-animation: floatUp 4s infinite linear;
        -o-animation: floatUp 4s infinite linear;
        animation: floatUp 4s infinite linear;
        -webkit-transform: scale(1.0);
        -moz-transform: scale(1.0);
        -o-transform: scale(1.0);
        transform: scale(1.0);
    }

    .x2{
        -webkit-animation: floatUp 7s infinite linear;
        -moz-animation: floatUp 7s infinite linear;
        -o-animation: floatUp 7s infinite linear;
        animation: floatUp 7s infinite linear;
        -webkit-transform: scale(1.6);
        -moz-transform: scale(1.6);
        -o-transform: scale(1.6);
        transform: scale(1.6);
        left: 15%;
    }

    .x3{
        -webkit-animation: floatUp 2.5s infinite linear;
        -moz-animation: floatUp 2.5s infinite linear;
        -o-animation: floatUp 2.5s infinite linear;
        animation: floatUp 2.5s infinite linear;
        -webkit-transform: scale(.5);
        -moz-transform: scale(.5);
        -o-transform: scale(.5);
        transform: scale(.5);
        left: -15%;
    }

    .x4{
        -webkit-animation: floatUp 4.5s infinite linear;
        -moz-animation: floatUp 4.5s infinite linear;
        -o-animation: floatUp 4.5s infinite linear;
        animation: floatUp 4.5s infinite linear;
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
        left: -34%;
    }

    .x5{
        -webkit-animation: floatUp 8s infinite linear;
        -moz-animation: floatUp 8s infinite linear;
        -o-animation: floatUp 8s infinite linear;
        animation: floatUp 8s infinite linear;
        -webkit-transform: scale(2.2);
        -moz-transform: scale(2.2);
        -o-transform: scale(2.2);
        transform: scale(2.2);
        left: -57%;
    }

    .x6{
        -webkit-animation: floatUp 3s infinite linear;
        -moz-animation: floatUp 3s infinite linear;
        -o-animation: floatUp 3s infinite linear;
        animation: floatUp 3s infinite linear;
        -webkit-transform: scale(.8);
        -moz-transform: scale(.8);
        -o-transform: scale(.8);
        transform: scale(.8);
        left: -81%;
    }

    .x7{
        -webkit-animation: floatUp 5.3s infinite linear;
        -moz-animation: floatUp 5.3s infinite linear;
        -o-animation: floatUp 5.3s infinite linear;
        animation: floatUp 5.3s infinite linear;
        -webkit-transform: scale(3.2);
        -moz-transform: scale(3.2);
        -o-transform: scale(3.2);
        transform: scale(3.2);
        left: 37%;
    }

    .x8{
        -webkit-animation: floatUp 4.7s infinite linear;
        -moz-animation: floatUp 4.7s infinite linear;
        -o-animation: floatUp 4.7s infinite linear;
        animation: floatUp 4.7s infinite linear;
        -webkit-transform: scale(1.7);
        -moz-transform: scale(1.7);
        -o-transform: scale(1.7);
        transform: scale(1.7);
        left: 62%;
    }

    .x9{
        -webkit-animation: floatUp 4.1s infinite linear;
        -moz-animation: floatUp 4.1s infinite linear;
        -o-animation: floatUp 4.1s infinite linear;
        animation: floatUp 4.1s infinite linear;
        -webkit-transform: scale(0.9);
        -moz-transform: scale(0.9);
        -o-transform: scale(0.9);
        transform: scale(0.9);
        left: 85%;
    }
    @-webkit-keyframes floatUp{
        0%{top: 100vh; opacity: 0;}
        25%{opacity: 1;}
        50%{top: 0vh; opacity: .8;}
        75%{opacity: 1;}
        100%{top: -100vh; opacity: 0;}
    }
    @-moz-keyframes floatUp{
        0%{top: 100vh; opacity: 0;}
        25%{opacity: 1;}
        50%{top: 0vh; opacity: .8;}
        75%{opacity: 1;}
        100%{top: -100vh; opacity: 0;}
    }
    @-o-keyframes floatUp{
        0%{top: 100vh; opacity: 0;}
        25%{opacity: 1;}
        50%{top: 0vh; opacity: .8;}
        75%{opacity: 1;}
        100%{top: -100vh; opacity: 0;}
    }
    @keyframes floatUp{
        0%{top: 100vh; opacity: 0;}
        25%{opacity: 1;}
        50%{top: 0vh; opacity: .8;}
        75%{opacity: 1;}
        100%{top: -100vh; opacity: 0;}
    }


    @-webkit-keyframes fadeOut{
        0%{opacity: 0;}
        30%{opacity: 1;}
        80%{opacity: .9;}
        100%{opacity: 0;}
    }

    @-moz-keyframes fadeOut{
        0%{opacity: 0;}
        30%{opacity: 1;}
        80%{opacity: .9;}
        100%{opacity: 0;}
    }

    @-o-keyframes fadeOut{
        0%{opacity: 0;}
        30%{opacity: 1;}
        80%{opacity: .9;}
        100%{opacity: 0;}
    }

    @keyframes fadeOut{
        0%{opacity: 0;}
        30%{opacity: 1;}
        80%{opacity: .9;}
        100%{opacity: 0;}
    }

    @-webkit-keyframes finalFade{
        0%{opacity: 0;}
        30%{opacity: 1;}
        80%{opacity: .9;}
        100%{opacity: 1;}
    }

    @-moz-keyframes finalFade{
        0%{opacity: 0;}
        30%{opacity: 1;}
        80%{opacity: .9;}
        100%{opacity: 1;}
    }

    @-o-keyframes finalFade{
        0%{opacity: 0;}
        30%{opacity: 1;}
        80%{opacity: .9;}
        100%{opacity: 1;}
    }

    @keyframes finalFade{
        0%{opacity: 0;}
        30%{opacity: 1;}
        80%{opacity: .9;}
        100%{opacity: 1;}
    }
.container {
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}

</style>
<div class='AnimatedLight x1'></div>
<div class='AnimatedLight x2'></div>
<div class='AnimatedLight x3'></div>
<div class='AnimatedLight x4'></div>
<div class='AnimatedLight x5'></div>
<div class='AnimatedLight x6'></div>
<div class='AnimatedLight x7'></div>
<div class='AnimatedLight x8'></div>
<div class='AnimatedLight x9'></div><br>
</style>


