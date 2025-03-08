<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="../includes/DataTables/datatables.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="../includes/DataTables/datatables.min.js" rel="stylesheet"></script>
		<script src="js/bootstrap.min.js"></script>

		<title><?php echo $title; ?></title>
		<style>
			/*body { background-color: #ccc; }*/
			.post-title { color: black; }
			.soc-title { color: black; }
			.post-details { color: #777; }
			.modal { text-align: left; }
			a { color: #555; }
			/*
			.active { background-color: #aaa; }
			.well { background-color: #aaa;}*/
		</style>
	</head>
	<body>
		<div class="panel-heading">Customize Your Society colors <div class="pull-right"><div class="material-switch">
                                <input class="pluginSwitch" data-toggle="toggle" type="checkbox" id="654f735f19626" uuid="c4fe1b83-8f5a-4d1b-b912-172c608bf9e3" name="Customize" value="1" checked >
                                <label for="654f735f19626" class="label-primary"></label>
                            </div></div></div>
    <div class="panel-body" style="padding: 15px 30px;">
        <script src='plugin/Customize/sass/spectrum-dist/dist/spectrum.js'></script>
<link rel='stylesheet' href='plugin/Customize/sass/spectrum-dist/dist/spectrum.css' />
<style>
    .sp-colorize-container{
        min-width: 25px;
        border-style: solid !important;
        border-width: 1px !important;
    }
    .sp-palette-container{
        display: none;
    }
    input.spectrum {
        padding: 2px 5px;
        border-width: 0;
    }
    #spectrumColors > form > div > label{
        padding-bottom: 10px;
        min-height: 100px;
        width: 100%;
    }
    #spectrumColors > form > div {
        border: solid #CCC 1px;
        padding: 5px;
        margin-bottom: 10px;
        min-height: 100px;
        overflow: hidden;
    }
    .sp-replacer{
        width: 100%;
        min-height: 70px;
        position: absolute;
        bottom: 0;
        left: 0;
    }
</style>
<div id="spectrumColors" class="row">
    <div class="alert alert-info">
       As a mod you can custamize the layout of this society,
        on this page we provide you with an easier way to change the default colors.
    </div>
    <button class="btn btn-danger btn-block" id="colorsReset">Reset</button>
    <form id="colorsForm">
        <button class="btn btn-success btn-block">Save</button>
        <hr>
        <div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickergray-base'>Gray Base:<br><input type='text' name='colorpickergray-base' id='colorpickergray-base' value='#000' placeholder='Gray Base' /></label>
<script>
    $("#colorpickergray-base").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#000"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickergray-darker'>Gray Darker:<br><input type='text' name='colorpickergray-darker' id='colorpickergray-darker' value='#222' placeholder='Gray Darker' /></label>
<script>
    $("#colorpickergray-darker").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#222"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickergray-dark'>Gray Dark:<br><input type='text' name='colorpickergray-dark' id='colorpickergray-dark' value='#333' placeholder='Gray Dark' /></label>
<script>
    $("#colorpickergray-dark").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#333"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickergray'>Gray:<br><input type='text' name='colorpickergray' id='colorpickergray' value='#555' placeholder='Gray' /></label>
<script>
    $("#colorpickergray").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#555"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickergray-light'>Gray Light:<br><input type='text' name='colorpickergray-light' id='colorpickergray-light' value='#777' placeholder='Gray Light' /></label>
<script>
    $("#colorpickergray-light").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#777"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickergray-lighter'>Gray Lighter:<br><input type='text' name='colorpickergray-lighter' id='colorpickergray-lighter' value='#eee' placeholder='Gray Lighter' /></label>
<script>
    $("#colorpickergray-lighter").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#eee"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbrand-primary'>Brand Primary:<br><input type='text' name='colorpickerbrand-primary' id='colorpickerbrand-primary' value='#337ab7' placeholder='Brand Primary' /></label>
<script>
    $("#colorpickerbrand-primary").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#337ab7"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbrand-success'>Brand Success:<br><input type='text' name='colorpickerbrand-success' id='colorpickerbrand-success' value='#5cb85c' placeholder='Brand Success' /></label>
<script>
    $("#colorpickerbrand-success").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#5cb85c"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbrand-info'>Brand Info:<br><input type='text' name='colorpickerbrand-info' id='colorpickerbrand-info' value='#5bc0de' placeholder='Brand Info' /></label>
<script>
    $("#colorpickerbrand-info").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#5bc0de"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbrand-warning'>Brand Warning:<br><input type='text' name='colorpickerbrand-warning' id='colorpickerbrand-warning' value='#f0ad4e' placeholder='Brand Warning' /></label>
<script>
    $("#colorpickerbrand-warning").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f0ad4e"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbrand-danger'>Brand Danger:<br><input type='text' name='colorpickerbrand-danger' id='colorpickerbrand-danger' value='#d9534f' placeholder='Brand Danger' /></label>
<script>
    $("#colorpickerbrand-danger").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#d9534f"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbody-bg'>Body Bg:<br><input type='text' name='colorpickerbody-bg' id='colorpickerbody-bg' value='#EEE' placeholder='Body Bg' /></label>
<script>
    $("#colorpickerbody-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#EEE"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickercomponent-active-color'>Component Active Color:<br><input type='text' name='colorpickercomponent-active-color' id='colorpickercomponent-active-color' value='#fff' placeholder='Component Active Color' /></label>
<script>
    $("#colorpickercomponent-active-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickertable-bg-accent'>Table Bg Accent:<br><input type='text' name='colorpickertable-bg-accent' id='colorpickertable-bg-accent' value='#f9f9f9' placeholder='Table Bg Accent' /></label>
<script>
    $("#colorpickertable-bg-accent").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f9f9f9"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickertable-bg-hover'>Table Bg Hover:<br><input type='text' name='colorpickertable-bg-hover' id='colorpickertable-bg-hover' value='#f5f5f5' placeholder='Table Bg Hover' /></label>
<script>
    $("#colorpickertable-bg-hover").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f5f5f5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickertable-border-color'>Table Border Color:<br><input type='text' name='colorpickertable-border-color' id='colorpickertable-border-color' value='#ddd' placeholder='Table Border Color' /></label>
<script>
    $("#colorpickertable-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbtn-default-color'>Btn Default Color:<br><input type='text' name='colorpickerbtn-default-color' id='colorpickerbtn-default-color' value='#333' placeholder='Btn Default Color' /></label>
<script>
    $("#colorpickerbtn-default-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#333"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbtn-default-bg'>Btn Default Bg:<br><input type='text' name='colorpickerbtn-default-bg' id='colorpickerbtn-default-bg' value='#fff' placeholder='Btn Default Bg' /></label>
<script>
    $("#colorpickerbtn-default-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbtn-default-border'>Btn Default Border:<br><input type='text' name='colorpickerbtn-default-border' id='colorpickerbtn-default-border' value='#ccc' placeholder='Btn Default Border' /></label>
<script>
    $("#colorpickerbtn-default-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ccc"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbtn-primary-color'>Btn Primary Color:<br><input type='text' name='colorpickerbtn-primary-color' id='colorpickerbtn-primary-color' value='#fff' placeholder='Btn Primary Color' /></label>
<script>
    $("#colorpickerbtn-primary-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbtn-success-color'>Btn Success Color:<br><input type='text' name='colorpickerbtn-success-color' id='colorpickerbtn-success-color' value='#fff' placeholder='Btn Success Color' /></label>
<script>
    $("#colorpickerbtn-success-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbtn-info-color'>Btn Info Color:<br><input type='text' name='colorpickerbtn-info-color' id='colorpickerbtn-info-color' value='#fff' placeholder='Btn Info Color' /></label>
<script>
    $("#colorpickerbtn-info-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbtn-warning-color'>Btn Warning Color:<br><input type='text' name='colorpickerbtn-warning-color' id='colorpickerbtn-warning-color' value='#fff' placeholder='Btn Warning Color' /></label>
<script>
    $("#colorpickerbtn-warning-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbtn-danger-color'>Btn Danger Color:<br><input type='text' name='colorpickerbtn-danger-color' id='colorpickerbtn-danger-color' value='#fff' placeholder='Btn Danger Color' /></label>
<script>
    $("#colorpickerbtn-danger-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerinput-bg'>Input Bg:<br><input type='text' name='colorpickerinput-bg' id='colorpickerinput-bg' value='#fff' placeholder='Input Bg' /></label>
<script>
    $("#colorpickerinput-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerinput-border'>Input Border:<br><input type='text' name='colorpickerinput-border' id='colorpickerinput-border' value='#ccc' placeholder='Input Border' /></label>
<script>
    $("#colorpickerinput-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ccc"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerinput-border-focus'>Input Border Focus:<br><input type='text' name='colorpickerinput-border-focus' id='colorpickerinput-border-focus' value='#66afe9' placeholder='Input Border Focus' /></label>
<script>
    $("#colorpickerinput-border-focus").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#66afe9"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerinput-color-placeholder'>Input Color Placeholder:<br><input type='text' name='colorpickerinput-color-placeholder' id='colorpickerinput-color-placeholder' value='#999' placeholder='Input Color Placeholder' /></label>
<script>
    $("#colorpickerinput-color-placeholder").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#999"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerlegend-border-color'>Legend Border Color:<br><input type='text' name='colorpickerlegend-border-color' id='colorpickerlegend-border-color' value='#e5e5e5' placeholder='Legend Border Color' /></label>
<script>
    $("#colorpickerlegend-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#e5e5e5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerdropdown-bg'>Dropdown Bg:<br><input type='text' name='colorpickerdropdown-bg' id='colorpickerdropdown-bg' value='#fff' placeholder='Dropdown Bg' /></label>
<script>
    $("#colorpickerdropdown-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerdropdown-border'>Dropdown Border:<br><input type='text' name='colorpickerdropdown-border' id='colorpickerdropdown-border' value='rgba(0, 0, 0, .15)' placeholder='Dropdown Border' /></label>
<script>
    $("#colorpickerdropdown-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "rgba(0, 0, 0, .15)"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerdropdown-fallback-border'>Dropdown Fallback Border:<br><input type='text' name='colorpickerdropdown-fallback-border' id='colorpickerdropdown-fallback-border' value='#ccc' placeholder='Dropdown Fallback Border' /></label>
<script>
    $("#colorpickerdropdown-fallback-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ccc"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerdropdown-divider-bg'>Dropdown Divider Bg:<br><input type='text' name='colorpickerdropdown-divider-bg' id='colorpickerdropdown-divider-bg' value='#e5e5e5' placeholder='Dropdown Divider Bg' /></label>
<script>
    $("#colorpickerdropdown-divider-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#e5e5e5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerdropdown-link-hover-bg'>Dropdown Link Hover Bg:<br><input type='text' name='colorpickerdropdown-link-hover-bg' id='colorpickerdropdown-link-hover-bg' value='#f5f5f5' placeholder='Dropdown Link Hover Bg' /></label>
<script>
    $("#colorpickerdropdown-link-hover-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f5f5f5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerdropdown-caret-color'>Dropdown Caret Color:<br><input type='text' name='colorpickerdropdown-caret-color' id='colorpickerdropdown-caret-color' value='#000' placeholder='Dropdown Caret Color' /></label>
<script>
    $("#colorpickerdropdown-caret-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#000"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-default-color'>Navbar Default Color:<br><input type='text' name='colorpickernavbar-default-color' id='colorpickernavbar-default-color' value='#777' placeholder='Navbar Default Color' /></label>
<script>
    $("#colorpickernavbar-default-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#777"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-default-bg'>Navbar Default Bg:<br><input type='text' name='colorpickernavbar-default-bg' id='colorpickernavbar-default-bg' value='#f8f8f8' placeholder='Navbar Default Bg' /></label>
<script>
    $("#colorpickernavbar-default-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f8f8f8"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-default-link-color'>Navbar Default Link Color:<br><input type='text' name='colorpickernavbar-default-link-color' id='colorpickernavbar-default-link-color' value='#777' placeholder='Navbar Default Link Color' /></label>
<script>
    $("#colorpickernavbar-default-link-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#777"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-default-link-hover-color'>Navbar Default Link Hover Color:<br><input type='text' name='colorpickernavbar-default-link-hover-color' id='colorpickernavbar-default-link-hover-color' value='#333' placeholder='Navbar Default Link Hover Color' /></label>
<script>
    $("#colorpickernavbar-default-link-hover-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#333"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-default-link-active-color'>Navbar Default Link Active Color:<br><input type='text' name='colorpickernavbar-default-link-active-color' id='colorpickernavbar-default-link-active-color' value='#555' placeholder='Navbar Default Link Active Color' /></label>
<script>
    $("#colorpickernavbar-default-link-active-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#555"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-default-link-disabled-color'>Navbar Default Link Disabled Color:<br><input type='text' name='colorpickernavbar-default-link-disabled-color' id='colorpickernavbar-default-link-disabled-color' value='#ccc' placeholder='Navbar Default Link Disabled Color' /></label>
<script>
    $("#colorpickernavbar-default-link-disabled-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ccc"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-default-toggle-hover-bg'>Navbar Default Toggle Hover Bg:<br><input type='text' name='colorpickernavbar-default-toggle-hover-bg' id='colorpickernavbar-default-toggle-hover-bg' value='#ddd' placeholder='Navbar Default Toggle Hover Bg' /></label>
<script>
    $("#colorpickernavbar-default-toggle-hover-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-default-toggle-icon-bar-bg'>Navbar Default Toggle Icon Bar Bg:<br><input type='text' name='colorpickernavbar-default-toggle-icon-bar-bg' id='colorpickernavbar-default-toggle-icon-bar-bg' value='#888' placeholder='Navbar Default Toggle Icon Bar Bg' /></label>
<script>
    $("#colorpickernavbar-default-toggle-icon-bar-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#888"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-default-toggle-border-color'>Navbar Default Toggle Border Color:<br><input type='text' name='colorpickernavbar-default-toggle-border-color' id='colorpickernavbar-default-toggle-border-color' value='#ddd' placeholder='Navbar Default Toggle Border Color' /></label>
<script>
    $("#colorpickernavbar-default-toggle-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-inverse-bg'>Navbar Inverse Bg:<br><input type='text' name='colorpickernavbar-inverse-bg' id='colorpickernavbar-inverse-bg' value='#222' placeholder='Navbar Inverse Bg' /></label>
<script>
    $("#colorpickernavbar-inverse-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#222"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-inverse-link-hover-color'>Navbar Inverse Link Hover Color:<br><input type='text' name='colorpickernavbar-inverse-link-hover-color' id='colorpickernavbar-inverse-link-hover-color' value='#fff' placeholder='Navbar Inverse Link Hover Color' /></label>
<script>
    $("#colorpickernavbar-inverse-link-hover-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-inverse-link-disabled-color'>Navbar Inverse Link Disabled Color:<br><input type='text' name='colorpickernavbar-inverse-link-disabled-color' id='colorpickernavbar-inverse-link-disabled-color' value='#444' placeholder='Navbar Inverse Link Disabled Color' /></label>
<script>
    $("#colorpickernavbar-inverse-link-disabled-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#444"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-inverse-brand-hover-color'>Navbar Inverse Brand Hover Color:<br><input type='text' name='colorpickernavbar-inverse-brand-hover-color' id='colorpickernavbar-inverse-brand-hover-color' value='#fff' placeholder='Navbar Inverse Brand Hover Color' /></label>
<script>
    $("#colorpickernavbar-inverse-brand-hover-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-inverse-toggle-hover-bg'>Navbar Inverse Toggle Hover Bg:<br><input type='text' name='colorpickernavbar-inverse-toggle-hover-bg' id='colorpickernavbar-inverse-toggle-hover-bg' value='#333' placeholder='Navbar Inverse Toggle Hover Bg' /></label>
<script>
    $("#colorpickernavbar-inverse-toggle-hover-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#333"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-inverse-toggle-icon-bar-bg'>Navbar Inverse Toggle Icon Bar Bg:<br><input type='text' name='colorpickernavbar-inverse-toggle-icon-bar-bg' id='colorpickernavbar-inverse-toggle-icon-bar-bg' value='#fff' placeholder='Navbar Inverse Toggle Icon Bar Bg' /></label>
<script>
    $("#colorpickernavbar-inverse-toggle-icon-bar-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernavbar-inverse-toggle-border-color'>Navbar Inverse Toggle Border Color:<br><input type='text' name='colorpickernavbar-inverse-toggle-border-color' id='colorpickernavbar-inverse-toggle-border-color' value='#333' placeholder='Navbar Inverse Toggle Border Color' /></label>
<script>
    $("#colorpickernavbar-inverse-toggle-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#333"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernav-tabs-border-color'>Nav Tabs Border Color:<br><input type='text' name='colorpickernav-tabs-border-color' id='colorpickernav-tabs-border-color' value='#ddd' placeholder='Nav Tabs Border Color' /></label>
<script>
    $("#colorpickernav-tabs-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernav-tabs-active-link-hover-border-color'>Nav Tabs Active Link Hover Border Color:<br><input type='text' name='colorpickernav-tabs-active-link-hover-border-color' id='colorpickernav-tabs-active-link-hover-border-color' value='#ddd' placeholder='Nav Tabs Active Link Hover Border Color' /></label>
<script>
    $("#colorpickernav-tabs-active-link-hover-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickernav-tabs-justified-link-border-color'>Nav Tabs Justified Link Border Color:<br><input type='text' name='colorpickernav-tabs-justified-link-border-color' id='colorpickernav-tabs-justified-link-border-color' value='#ddd' placeholder='Nav Tabs Justified Link Border Color' /></label>
<script>
    $("#colorpickernav-tabs-justified-link-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpagination-bg'>Pagination Bg:<br><input type='text' name='colorpickerpagination-bg' id='colorpickerpagination-bg' value='#fff' placeholder='Pagination Bg' /></label>
<script>
    $("#colorpickerpagination-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpagination-border'>Pagination Border:<br><input type='text' name='colorpickerpagination-border' id='colorpickerpagination-border' value='#ddd' placeholder='Pagination Border' /></label>
<script>
    $("#colorpickerpagination-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpagination-hover-border'>Pagination Hover Border:<br><input type='text' name='colorpickerpagination-hover-border' id='colorpickerpagination-hover-border' value='#ddd' placeholder='Pagination Hover Border' /></label>
<script>
    $("#colorpickerpagination-hover-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpagination-active-color'>Pagination Active Color:<br><input type='text' name='colorpickerpagination-active-color' id='colorpickerpagination-active-color' value='#fff' placeholder='Pagination Active Color' /></label>
<script>
    $("#colorpickerpagination-active-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpagination-disabled-bg'>Pagination Disabled Bg:<br><input type='text' name='colorpickerpagination-disabled-bg' id='colorpickerpagination-disabled-bg' value='#fff' placeholder='Pagination Disabled Bg' /></label>
<script>
    $("#colorpickerpagination-disabled-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpagination-disabled-border'>Pagination Disabled Border:<br><input type='text' name='colorpickerpagination-disabled-border' id='colorpickerpagination-disabled-border' value='#ddd' placeholder='Pagination Disabled Border' /></label>
<script>
    $("#colorpickerpagination-disabled-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerstate-success-text'>State Success Text:<br><input type='text' name='colorpickerstate-success-text' id='colorpickerstate-success-text' value='#3c763d' placeholder='State Success Text' /></label>
<script>
    $("#colorpickerstate-success-text").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#3c763d"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerstate-success-bg'>State Success Bg:<br><input type='text' name='colorpickerstate-success-bg' id='colorpickerstate-success-bg' value='#dff0d8' placeholder='State Success Bg' /></label>
<script>
    $("#colorpickerstate-success-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#dff0d8"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerstate-info-text'>State Info Text:<br><input type='text' name='colorpickerstate-info-text' id='colorpickerstate-info-text' value='#31708f' placeholder='State Info Text' /></label>
<script>
    $("#colorpickerstate-info-text").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#31708f"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerstate-info-bg'>State Info Bg:<br><input type='text' name='colorpickerstate-info-bg' id='colorpickerstate-info-bg' value='#d9edf7' placeholder='State Info Bg' /></label>
<script>
    $("#colorpickerstate-info-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#d9edf7"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerstate-warning-text'>State Warning Text:<br><input type='text' name='colorpickerstate-warning-text' id='colorpickerstate-warning-text' value='#8a6d3b' placeholder='State Warning Text' /></label>
<script>
    $("#colorpickerstate-warning-text").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#8a6d3b"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerstate-warning-bg'>State Warning Bg:<br><input type='text' name='colorpickerstate-warning-bg' id='colorpickerstate-warning-bg' value='#fcf8e3' placeholder='State Warning Bg' /></label>
<script>
    $("#colorpickerstate-warning-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fcf8e3"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerstate-danger-text'>State Danger Text:<br><input type='text' name='colorpickerstate-danger-text' id='colorpickerstate-danger-text' value='#a94442' placeholder='State Danger Text' /></label>
<script>
    $("#colorpickerstate-danger-text").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#a94442"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerstate-danger-bg'>State Danger Bg:<br><input type='text' name='colorpickerstate-danger-bg' id='colorpickerstate-danger-bg' value='#f2dede' placeholder='State Danger Bg' /></label>
<script>
    $("#colorpickerstate-danger-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f2dede"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickertooltip-color'>Tooltip Color:<br><input type='text' name='colorpickertooltip-color' id='colorpickertooltip-color' value='#fff' placeholder='Tooltip Color' /></label>
<script>
    $("#colorpickertooltip-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickertooltip-bg'>Tooltip Bg:<br><input type='text' name='colorpickertooltip-bg' id='colorpickertooltip-bg' value='#000' placeholder='Tooltip Bg' /></label>
<script>
    $("#colorpickertooltip-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#000"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpopover-bg'>Popover Bg:<br><input type='text' name='colorpickerpopover-bg' id='colorpickerpopover-bg' value='#fff' placeholder='Popover Bg' /></label>
<script>
    $("#colorpickerpopover-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpopover-border-color'>Popover Border Color:<br><input type='text' name='colorpickerpopover-border-color' id='colorpickerpopover-border-color' value='rgba(0, 0, 0, .2)' placeholder='Popover Border Color' /></label>
<script>
    $("#colorpickerpopover-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "rgba(0, 0, 0, .2)"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpopover-fallback-border-color'>Popover Fallback Border Color:<br><input type='text' name='colorpickerpopover-fallback-border-color' id='colorpickerpopover-fallback-border-color' value='#ccc' placeholder='Popover Fallback Border Color' /></label>
<script>
    $("#colorpickerpopover-fallback-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ccc"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerlabel-color'>Label Color:<br><input type='text' name='colorpickerlabel-color' id='colorpickerlabel-color' value='#fff' placeholder='Label Color' /></label>
<script>
    $("#colorpickerlabel-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerlabel-link-hover-color'>Label Link Hover Color:<br><input type='text' name='colorpickerlabel-link-hover-color' id='colorpickerlabel-link-hover-color' value='#fff' placeholder='Label Link Hover Color' /></label>
<script>
    $("#colorpickerlabel-link-hover-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickermodal-content-bg'>Modal Content Bg:<br><input type='text' name='colorpickermodal-content-bg' id='colorpickermodal-content-bg' value='#fff' placeholder='Modal Content Bg' /></label>
<script>
    $("#colorpickermodal-content-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickermodal-content-border-color'>Modal Content Border Color:<br><input type='text' name='colorpickermodal-content-border-color' id='colorpickermodal-content-border-color' value='rgba(0, 0, 0, .2)' placeholder='Modal Content Border Color' /></label>
<script>
    $("#colorpickermodal-content-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "rgba(0, 0, 0, .2)"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickermodal-content-fallback-border-color'>Modal Content Fallback Border Color:<br><input type='text' name='colorpickermodal-content-fallback-border-color' id='colorpickermodal-content-fallback-border-color' value='#999' placeholder='Modal Content Fallback Border Color' /></label>
<script>
    $("#colorpickermodal-content-fallback-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#999"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickermodal-backdrop-bg'>Modal Backdrop Bg:<br><input type='text' name='colorpickermodal-backdrop-bg' id='colorpickermodal-backdrop-bg' value='#000' placeholder='Modal Backdrop Bg' /></label>
<script>
    $("#colorpickermodal-backdrop-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#000"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickermodal-header-border-color'>Modal Header Border Color:<br><input type='text' name='colorpickermodal-header-border-color' id='colorpickermodal-header-border-color' value='#e5e5e5' placeholder='Modal Header Border Color' /></label>
<script>
    $("#colorpickermodal-header-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#e5e5e5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerprogress-bg'>Progress Bg:<br><input type='text' name='colorpickerprogress-bg' id='colorpickerprogress-bg' value='#f5f5f5' placeholder='Progress Bg' /></label>
<script>
    $("#colorpickerprogress-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f5f5f5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerprogress-bar-color'>Progress Bar Color:<br><input type='text' name='colorpickerprogress-bar-color' id='colorpickerprogress-bar-color' value='#fff' placeholder='Progress Bar Color' /></label>
<script>
    $("#colorpickerprogress-bar-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerlist-group-bg'>List Group Bg:<br><input type='text' name='colorpickerlist-group-bg' id='colorpickerlist-group-bg' value='#fff' placeholder='List Group Bg' /></label>
<script>
    $("#colorpickerlist-group-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerlist-group-border'>List Group Border:<br><input type='text' name='colorpickerlist-group-border' id='colorpickerlist-group-border' value='#ddd' placeholder='List Group Border' /></label>
<script>
    $("#colorpickerlist-group-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerlist-group-hover-bg'>List Group Hover Bg:<br><input type='text' name='colorpickerlist-group-hover-bg' id='colorpickerlist-group-hover-bg' value='#f5f5f5' placeholder='List Group Hover Bg' /></label>
<script>
    $("#colorpickerlist-group-hover-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f5f5f5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerlist-group-link-color'>List Group Link Color:<br><input type='text' name='colorpickerlist-group-link-color' id='colorpickerlist-group-link-color' value='#555' placeholder='List Group Link Color' /></label>
<script>
    $("#colorpickerlist-group-link-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#555"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerlist-group-link-heading-color'>List Group Link Heading Color:<br><input type='text' name='colorpickerlist-group-link-heading-color' id='colorpickerlist-group-link-heading-color' value='#333' placeholder='List Group Link Heading Color' /></label>
<script>
    $("#colorpickerlist-group-link-heading-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#333"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpanel-bg'>Panel Bg:<br><input type='text' name='colorpickerpanel-bg' id='colorpickerpanel-bg' value='#fff' placeholder='Panel Bg' /></label>
<script>
    $("#colorpickerpanel-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpanel-inner-border'>Panel Inner Border:<br><input type='text' name='colorpickerpanel-inner-border' id='colorpickerpanel-inner-border' value='#ddd' placeholder='Panel Inner Border' /></label>
<script>
    $("#colorpickerpanel-inner-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpanel-footer-bg'>Panel Footer Bg:<br><input type='text' name='colorpickerpanel-footer-bg' id='colorpickerpanel-footer-bg' value='#f5f5f5' placeholder='Panel Footer Bg' /></label>
<script>
    $("#colorpickerpanel-footer-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f5f5f5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpanel-default-border'>Panel Default Border:<br><input type='text' name='colorpickerpanel-default-border' id='colorpickerpanel-default-border' value='#ddd' placeholder='Panel Default Border' /></label>
<script>
    $("#colorpickerpanel-default-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpanel-default-heading-bg'>Panel Default Heading Bg:<br><input type='text' name='colorpickerpanel-default-heading-bg' id='colorpickerpanel-default-heading-bg' value='#f5f5f5' placeholder='Panel Default Heading Bg' /></label>
<script>
    $("#colorpickerpanel-default-heading-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f5f5f5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpanel-primary-text'>Panel Primary Text:<br><input type='text' name='colorpickerpanel-primary-text' id='colorpickerpanel-primary-text' value='#fff' placeholder='Panel Primary Text' /></label>
<script>
    $("#colorpickerpanel-primary-text").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerthumbnail-border'>Thumbnail Border:<br><input type='text' name='colorpickerthumbnail-border' id='colorpickerthumbnail-border' value='#ddd' placeholder='Thumbnail Border' /></label>
<script>
    $("#colorpickerthumbnail-border").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ddd"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerwell-bg'>Well Bg:<br><input type='text' name='colorpickerwell-bg' id='colorpickerwell-bg' value='#f5f5f5' placeholder='Well Bg' /></label>
<script>
    $("#colorpickerwell-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f5f5f5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbadge-color'>Badge Color:<br><input type='text' name='colorpickerbadge-color' id='colorpickerbadge-color' value='#fff' placeholder='Badge Color' /></label>
<script>
    $("#colorpickerbadge-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbadge-link-hover-color'>Badge Link Hover Color:<br><input type='text' name='colorpickerbadge-link-hover-color' id='colorpickerbadge-link-hover-color' value='#fff' placeholder='Badge Link Hover Color' /></label>
<script>
    $("#colorpickerbadge-link-hover-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbadge-active-bg'>Badge Active Bg:<br><input type='text' name='colorpickerbadge-active-bg' id='colorpickerbadge-active-bg' value='#fff' placeholder='Badge Active Bg' /></label>
<script>
    $("#colorpickerbadge-active-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbreadcrumb-bg'>Breadcrumb Bg:<br><input type='text' name='colorpickerbreadcrumb-bg' id='colorpickerbreadcrumb-bg' value='#f5f5f5' placeholder='Breadcrumb Bg' /></label>
<script>
    $("#colorpickerbreadcrumb-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f5f5f5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerbreadcrumb-color'>Breadcrumb Color:<br><input type='text' name='colorpickerbreadcrumb-color' id='colorpickerbreadcrumb-color' value='#ccc' placeholder='Breadcrumb Color' /></label>
<script>
    $("#colorpickerbreadcrumb-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ccc"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickercarousel-text-shadow'>Carousel Text Shadow:<br><input type='text' name='colorpickercarousel-text-shadow' id='colorpickercarousel-text-shadow' value='rgba(0, 0, 0, .6)' placeholder='Carousel Text Shadow' /></label>
<script>
    $("#colorpickercarousel-text-shadow").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "rgba(0, 0, 0, .6)"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickercarousel-control-color'>Carousel Control Color:<br><input type='text' name='colorpickercarousel-control-color' id='colorpickercarousel-control-color' value='#fff' placeholder='Carousel Control Color' /></label>
<script>
    $("#colorpickercarousel-control-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickercarousel-indicator-active-bg'>Carousel Indicator Active Bg:<br><input type='text' name='colorpickercarousel-indicator-active-bg' id='colorpickercarousel-indicator-active-bg' value='#fff' placeholder='Carousel Indicator Active Bg' /></label>
<script>
    $("#colorpickercarousel-indicator-active-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickercarousel-indicator-border-color'>Carousel Indicator Border Color:<br><input type='text' name='colorpickercarousel-indicator-border-color' id='colorpickercarousel-indicator-border-color' value='#fff' placeholder='Carousel Indicator Border Color' /></label>
<script>
    $("#colorpickercarousel-indicator-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickercarousel-caption-color'>Carousel Caption Color:<br><input type='text' name='colorpickercarousel-caption-color' id='colorpickercarousel-caption-color' value='#fff' placeholder='Carousel Caption Color' /></label>
<script>
    $("#colorpickercarousel-caption-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerclose-color'>Close Color:<br><input type='text' name='colorpickerclose-color' id='colorpickerclose-color' value='#000' placeholder='Close Color' /></label>
<script>
    $("#colorpickerclose-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#000"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerclose-text-shadow'>Close Text Shadow:<br><input type='text' name='colorpickerclose-text-shadow' id='colorpickerclose-text-shadow' value='#fff' placeholder='Close Text Shadow' /></label>
<script>
    $("#colorpickerclose-text-shadow").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickercode-color'>Code Color:<br><input type='text' name='colorpickercode-color' id='colorpickercode-color' value='#c7254e' placeholder='Code Color' /></label>
<script>
    $("#colorpickercode-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#c7254e"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickercode-bg'>Code Bg:<br><input type='text' name='colorpickercode-bg' id='colorpickercode-bg' value='#f9f2f4' placeholder='Code Bg' /></label>
<script>
    $("#colorpickercode-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f9f2f4"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerkbd-color'>Kbd Color:<br><input type='text' name='colorpickerkbd-color' id='colorpickerkbd-color' value='#fff' placeholder='Kbd Color' /></label>
<script>
    $("#colorpickerkbd-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#fff"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerkbd-bg'>Kbd Bg:<br><input type='text' name='colorpickerkbd-bg' id='colorpickerkbd-bg' value='#333' placeholder='Kbd Bg' /></label>
<script>
    $("#colorpickerkbd-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#333"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpre-bg'>Pre Bg:<br><input type='text' name='colorpickerpre-bg' id='colorpickerpre-bg' value='#f5f5f5' placeholder='Pre Bg' /></label>
<script>
    $("#colorpickerpre-bg").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#f5f5f5"
    });
</script></div><div class='col-lg-2 col-md-4 col-sm-6'><label for='colorpickerpre-border-color'>Pre Border Color:<br><input type='text' name='colorpickerpre-border-color' id='colorpickerpre-border-color' value='#ccc' placeholder='Pre Border Color' /></label>
<script>
    $("#colorpickerpre-border-color").spectrum({
        preferredFormat: "hex3",
        showInput: true,
        color: "#ccc"
    });
</script></div>        <hr>
        <button class="btn btn-success btn-block">Save</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#colorsForm').submit(function (evt) {
            evt.preventDefault();
            modal.showPleaseWait();
            $.ajax({
                url: 'plugin/Customize/page/colorsSave.json.php',
                data: $('#colorsForm').serializeArray(),
                type: 'post',
                success: function (response) {
                    modal.hidePleaseWait();
                    if (response.saved) {
                        $("#pluginCustomCss").attr('href', 'cache/custom.css?' + Math.random());
                    } else {
                        avideoAlert("Sorry!", "Error on saving colors", "error");
                    }
                }
            });
            return false;
        });
        $('#colorsReset').click(function (evt) {
            evt.preventDefault();
            modal.showPleaseWait();
            $.ajax({
                url: 'plugin/Customize/page/colorsReset.json.php',
                success: function (response) {
                    modal.hidePleaseWait();
                    if (response.saved) {
                        $("#pluginCustomCss").attr('href', 'cache/custom.css?' + Math.random());
                    } else {
                        avideoAlert("Sorry!", "Error on saving colors", "error");
                    }
                }
            });
            return false;
        });
    });
</script>    </div>
</div>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>
<footer style="position: fixed;bottom: 0;width: 100%; display: none;" id="mainFooter">
    <p>Built By: Blood sweat and tears!!!!</p></footer>
<script>
    $(function () {
/** showAlertMessage **/

/** showAlertMessage END **/    });
</script>
