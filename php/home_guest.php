<?php

    // configuration
    require("../includes/global.php"); 
	
	verify_access(true);

	?>
	
	<body class="">
        <link href="https://liberty-library.com/view/css/navbar.css?cache=1653104842_1653104974" rel="stylesheet" type="text/css"/>
<h1 class='hidden metaDescription'> - 1598 &middot; </h1>    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-light bg-light" id="mainNavBar">
        <ul class="items-container">
            <li>
    <ul class="left-side">
        <li style="max-width: 40px;">
            <!-- functionGetHamburgerButton.php start --><button type="button" id="buttonMenu" class="btn btn-default pull-left hamburger"  data-toggle="tooltip"  title="Main Menu" data-placement="right">
                <svg class="ham hamRotate ham1 " style="" viewBox="0 0 100 100" width="32" onclick="this.classList.toggle('active')">
            <path
                class="line top"
                d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
            <path
                class="line middle"
                d="m 30,50 h 40" />
            <path
                class="line bottom"
                d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
            </svg>    
            </button>




<!-- functionGetHamburgerButton.php end -->                            <script>
                    $(document).ready(function () {
                        YPTHidenavbar();
                    });
                </script>
                        </li>
        <li style="width: 100%; text-align: center;">
            <a class="navbar-brand" id="mainNavbarLogo" href="https://liberty-library.com/" >
                <img src="https://liberty-library.com/videos/userPhoto/logo.png?1680562193" alt="Liberty Library" class="img-responsive ">
            </a>
        </li>
        
    </ul>
</li><li class="nav-item" style="margin-right: 0px; " id="searchNavItem">
    <div class="navbar-header">
        <button type="button" id="buttonSearch" class="visible-xs navbar-toggle btn btn-default navbar-btn faa-parent animated-hover animate__animated animate__bounceIn" data-toggle="collapse" data-target="#mysearch" style="padding: 6px 12px;">
            <span class="fa fa-search faa-shake"></span>
        </button>
    </div>
    <div class="input-group"  id="mysearch">
        <form class="navbar-form form-inline input-group" role="search" id="searchForm"  action="https://liberty-library.com/" style="padding: 0;">
            <input class="form-control globalsearchfield" type="text" value="" name="search" placeholder="Search" id="searchFormInput">
            <span class="input-group-append">
                <button class="btn btn-default btn-outline-secondary border-left-0 border  py-2 faa-parent animated-hover" type="submit">
                    <i class="fas fa-search faa-shake"></i>
                </button>
            </span>
        </form>
    </div>
</li>
            <li id="lastItemOnMenu">
                <div class="pull-right" id="myNavbar">
                    <ul class="right-menus align-center" style="padding-left: 0;">
                        
    <style>
        .liveVideo{
            position: relative;
        }
        .liveVideo .liveNow, .liveVideo .liveFuture{
            position: absolute;
            bottom: 5px;
            right: 5px;
        }
        #availableLiveStream{
            width: 350px;
            overflow: hidden;
            max-height: 75vh;
            overflow-y: auto;
        }
        #availableLiveStream li a div{
            overflow: hidden;
        }
    </style>
    <li class="dropdown" onclick="setTimeout(function () {
                lazyImage();
            }, 500);
            setTimeout(function () {
                lazyImage();
            }, 1000);
            setTimeout(function () {
                lazyImage();
            }, 1500);">
        <a href="#" class="faa-parent animated-hover btn btn-default navbar-btn" data-toggle="dropdown">
            <span class="fas fa-bell faa-ring"></span>
            <span class="badge onlineApplications" style=" background: rgba(255,0,0,1); color: #FFF;">0</span>
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu dropdown-menu-right notify-drop" >
                <div id="availableLiveStream">

            </div>
        </ul>
    </li>

    <div class="col-lg-12 col-sm-12 col-xs-12 bottom-border hidden extraVideosModel liveVideo">
        <a href="" class="videoLink" class="videoLink galleryLink " >
            <div class="aspectRatio16_9" style="min-height: 70px;" >
                <img src="https://liberty-library.com/videos/userPhoto/logo.png?cache=1680562193_1680562193" class="thumbsJPG img-responsive" height="130" itemprop="thumbnailUrl" alt="Logo" />
                <img src="" style="position: absolute; top: 0; display: none;" class="thumbsGIF img-responsive" height="130" />
                <span class="label label-danger liveNow faa-flash faa-slow animated">LIVE NOW</span>
            </div>
        </a>

        <a class="h6 galleryLink " href="_link_" >
            <strong class="title liveTitle">Title</strong>
        </a>
        <div class="galeryDetails" style="overflow: hidden;">
            <div>
                <img src="" class="photoImg img img-circle img-responsive" style="max-width: 20px;">
            </div>
            <div class="liveUser">User</div>        
            <div class="galleryTags">
                </div>
        </div>
    </div>

    <script>
        function refreshGetLiveImage(selector) {
            $(selector).find('.thumbsImage img').each(function (index) {
                var src = $(this).attr('src');
                src = addGetParam(src, 'cache', Math.random());
                $(this).attr('src', src);
            });
            setTimeout(function () {
                $(selector).slideDown();
            }, 1000); // give some time to load the new images
        }

        var _processLiveStats_processingNow = 0;
        function processLiveStats(response) {
            if(_processLiveStats_processingNow){
                return false;
            }
            _processLiveStats_processingNow = 1;
            setTimeout(function(){_processLiveStats_processingNow=0;},200);
            if (typeof response !== 'undefined') {
                if (isArray(response)) {
                    for (var i in response) {
                        if (typeof response[i] !== 'object') {
                            continue;
                        }
                        //console.log('processLiveStats is array', response[i]);
                        processApplicationLive(response[i]);
                    }
                } else {
                    //console.log('processLiveStats not array', response);
                    processApplicationLive(response);
                }
                if (!response.countLiveStream) {
                    availableLiveStreamNotFound();
                } else {
                    $('#availableLiveStream').removeClass('notfound');
                }
                $('.onlineApplications').text($('#availableLiveStream > div').length);
            }

            setTimeout(function () {
                }, 200);
        }

        function getStatsMenu(recurrentCall) {
            if (avideoSocketIsActive()) {
                return false;
            }
            availableLiveStreamIsLoading();
            $.ajax({
                url: webSiteRootURL + 'plugin/Live/stats.json.php?Menu',
                success: function (response) {
                    //console.log('getStatsMenu processLiveStats', response);
                    processLiveStats(response);
                    if (avideoSocketIsActive()) {
                        //console.log('getStatsMenu: Socket is enabled we will not process ajax result');
                        return false;
                    }
                    if (recurrentCall) {
                        var timeOut = 15000;
                        setTimeout(function () {
                            getStatsMenu(true);
                        }, timeOut);
                    }
                }
            });
        }

        function processApplicationLive(response) {
            if (typeof response.applications !== 'undefined') {
                var applications = response.applications;
                response.applications = [];
                for (let key in applications) {
                    if (applications[key].hasOwnProperty('html')) {
                        response.applications.push(applications[key]);
                    }
                }

                if (response.applications.length) {
                    //console.log('processApplicationLive 1', response.applications, response.applications.length);
                    for (i = 0; i < response.applications.length; i++) {
                        //console.log('processApplicationLive 1 title', response.applications[i].title);
                        processApplication(response.applications[i]);
                        if (!response.applications[i].comingsoon) {
                            if (typeof response.applications[i].live_cleanKey !== 'undefined') {
                                selector = '.liveViewStatusClass_' + response.applications[i].live_cleanKey;
                                onlineLabelOnline(selector);
                            }
                            if (typeof response.applications[i].key !== 'undefined') {
                                selector = '.liveViewStatusClass_' + response.applications[i].key;
                                onlineLabelOnline(selector);
                            }
                        }
                    }
                    mouseEffect();
                }else{
                    //console.log('processApplicationLive ERROR', response);
                }
            }
            // check for live servers
            var count = 0;
            while (typeof response[count] !== 'undefined') {
                //console.log('processApplicationLive 2',count, response[count].applications, response[count].applications.length);
                for (i = 0; i < response[count].applications.length; i++) {
                    processApplication(response[count].applications[i]);
                }
                count++;
            }
        }

        function availableLiveStreamIsLoading() {
            if ($('#availableLiveStream').hasClass('notfound')) {
                availableLiveStreamEmpty();
            }
        }

        function availableLiveStreamNotFound() {
            $('#availableLiveStream').addClass('notfound');
            availableLiveStreamEmpty();
        }

        function availableLiveStreamEmpty() {
            $('#availableLiveStream').empty();
        }

        var linksToEmbedTimeout;
        function processApplication(application) {
            href = application.href;
            title = application.title;
            name = application.name;
            user = application.user;
            photo = application.photo;
            if (application && typeof application.key == 'string') {
                key = application.key.replace(/[&=]/g, '');
            } else {
                key = '';
            }

            ////console.log('processApplication', application.className);
            callback = '';
            if (typeof application.callback === 'string') {
                callback = application.callback;
            }
            isPrivate = application.isPrivate;
            if (application.type === 'Live') {
                online = application.users.online;
                views = application.users.views;
            } else {
                online = 0;
                views = 0;
            }
            if (typeof application.html != 'undefined') {
                var notificationHTML = $(application.html);
                var notificatioID = (notificationHTML.attr('id') + '_notification').replace(/[&=]/g, '');
                if (typeof key !== 'undefined') {
                    ////console.log('processApplication remove class .live_' + key);
                    $('.live_' + key).remove();
                }
                if (!$('#' + notificatioID).length) {
                    notificationHTML.attr('id', notificatioID);
                    if (application.comingsoon) {
                        //console.log('application.comingsoon 1', application.comingsoon, application.method);
                        $('#availableLiveStream').append(notificationHTML);
                    } else {
                        $('#availableLiveStream').prepend(notificationHTML);
                    }
                    animateChilds('#availableLiveStream', 'animate__bounceInRight', 0.05);
                } else {
                    ////console.log('processApplication is already present '+notificatioID, application.className);
                }

                var html;
                        html = application.htmlExtra;
                        var id = $(html).attr('id').replace(/[&=]/g, '');
                if ($('#' + id).length) {
                    //console.log('processApplication key found', id);
                    return false;
                }
                //console.log('processApplication key NOT found', id);
                if (application.comingsoon) {
                    ////console.log('application.comingsoon 2', application.comingsoon, application.method);
                    $('#liveScheduleVideos .extraVideos').append(html);
                    $('#liveScheduleVideos').slideDown();
                } else {
                    $('#liveVideos .extraVideos').prepend(html);
                    $('#liveVideos').slideDown();
                }
                setTimeout(function () {
                    lazyImage();
                }, 1000);
                if (callback) {
                    eval("try {" + callback + ";} catch (e) {console.log('processApplication application.callback error',e.message);}");
                }
            } else {
                //console.log('application.html is undefined');
            }
            clearTimeout(linksToEmbedTimeout);
            linksToEmbedTimeout = setTimeout(function () {
                    avideoSocket();
            }, 500);
            if (application.users && typeof application.users.views !== 'undefined') {
                $('.views_on_total_on_live_' + application.users.transmition_key + '_' + application.users.live_servers_id).text(application.users.views);
            }
        }
        
        function isInLive(json){
            selector1 = '#liveViewStatusID_' + json.key + '_' + json.live_servers_id;
            selector2 = '.liveViewStatusClass_' + json.key + '_' + json.live_servers_id;
            selector3 = '#liveViewStatusID_' + json.cleanKey + '_' + json.live_servers_id;
            selector4 = '.liveViewStatusClass_' + json.cleanKey + '_' + json.live_servers_id;
            //console.log('isInLive 1', json);
            //console.log('isInLive 2', selector1, selector2, selector3, selector4);
            var _isInLive = $(selector1).length || $(selector2).length || $(selector3).length || $(selector4).length;
            //console.log('isInLive 3', $(selector1).length, $(selector2).length, $(selector3).length, $(selector4).length, _isInLive);
            return _isInLive;
        }

        function socketLiveONCallback(json) {
            //console.log('socketLiveONCallback processLiveStats', json);
            processLiveStats(json.stats);
            var selector = '.live_' + json.live_servers_id + "_" + json.key;
            $(selector).slideDown();

            if (typeof onlineLabelOnline == 'function') {
                selector = '#liveViewStatusID_' + json.key + '_' + json.live_servers_id;
                onlineLabelOnline(selector);
                selector = '.liveViewStatusClass_' + json.key + '_' + json.live_servers_id;
                onlineLabelOnline(selector);
                selector = '.liveViewStatusClass_' + json.cleanKey;
                ////console.log('socketLiveOFFCallback 3', selector);
                onlineLabelOnline(selector);
            }

            // update the chat if the history changes
            var IframeClass = ".yptchat2IframeClass_" + json.key + "_" + json.live_servers_id;
            if ($(IframeClass).length) {
                var src = $(IframeClass).attr('src');
                if (src) {
                    avideoToast('Loading new chat');
                    var newSRC = addGetParam(src, 'live_transmitions_history_id', json.live_transmitions_history_id);
                    $(IframeClass).attr('src', newSRC);
                }
            }
            if(isInLive(json)){
                playerPlay();
                showImage('prerollPoster', json.cleanKey);
            }
        }
        function socketLiveOFFCallback(json) {
            //console.log('socketLiveOFFCallback', json);
            var selector = '.live_' + json.live_servers_id + "_" + json.key;
            selector += ', .liveVideo_live_' + json.live_servers_id + "_" + json.key;
            selector += ', .live_' + json.key;
            ////console.log('socketLiveOFFCallback 1', selector);
            $(selector).slideUp("fast", function () {
                $(this).remove();
            });
            if (typeof onlineLabelOffline == 'function') {
                selector = '#liveViewStatusID_' + json.key + '_' + json.live_servers_id;
                ////console.log('socketLiveOFFCallback 2', selector);
                onlineLabelOffline(selector);
                selector = '.liveViewStatusClass_' + json.key + '_' + json.live_servers_id;
                ////console.log('socketLiveOFFCallback 3', selector);
                onlineLabelOffline(selector);
                selector = '.liveViewStatusClass_' + json.cleanKey;
                ////console.log('socketLiveOFFCallback 3', selector);
                onlineLabelOffline(selector);
            }
            setTimeout(function () {
                //console.log('socketLiveOFFCallback processLiveStats');
                processLiveStats(json.stats);
                setTimeout(function () {
                    hideExtraVideosIfEmpty();
                }, 500);
            }, 500);
            
            if(isInLive(json)){
                showImage('postrollPoster', json.cleanKey);
            }
        }

        function showImage(type, key) {
            var img = false;
            //console.log('showImage', type, key);
            eval('prerollPoster = prerollPoster_'+key);
            eval('postrollPoster = postrollPoster_'+key);
            eval('liveImgCloseTimeInSecondsPreroll = liveImgCloseTimeInSecondsPreroll_'+key);
            eval('liveImgTimeInSecondsPreroll = liveImgTimeInSecondsPreroll_'+key);
            eval('liveImgCloseTimeInSecondsPostroll = liveImgCloseTimeInSecondsPostroll_'+key);
            eval('liveImgTimeInSecondsPostroll = liveImgTimeInSecondsPostroll_'+key);
            var liveImgTimeInSeconds = 30;
            var liveImgCloseTimeInSeconds = 30;
            if (type == 'prerollPoster' && prerollPoster) {
                liveImgTimeInSeconds = liveImgTimeInSecondsPreroll;
                liveImgCloseTimeInSeconds = liveImgCloseTimeInSecondsPreroll;
                img = prerollPoster;
            } else if (type == 'postrollPoster' && postrollPoster) {
                liveImgTimeInSeconds = liveImgTimeInSecondsPostroll;
                liveImgCloseTimeInSeconds = liveImgCloseTimeInSecondsPostroll;
                img = postrollPoster;
            }
            console.log('showImage Poster', type, img, key);
            if (img) {
                if(typeof closeLiveImageRoll == 'function'){
                    closeLiveImageRoll();
                }
                $('.'+type).remove();
                
                var _liveImageBGTemplate = liveImageBGTemplate.replace('{liveImgCloseTimeInSeconds}', liveImgCloseTimeInSeconds);
                var _liveImageBGTemplate = _liveImageBGTemplate.replace('{liveImgTimeInSeconds}', liveImgTimeInSeconds);
                var _liveImageBGTemplate = _liveImageBGTemplate.replace('{src}', img);
                _liveImageBGTemplate = _liveImageBGTemplate.replace(/\{class\}/g, type);
                
                $(_liveImageBGTemplate).appendTo("#mainVideo");
            }

            //console.log('prerollPoster', prerollPoster);
            //console.log('postrollPoster', postrollPoster);
            //console.log('liveImgTimeInSeconds', liveImgTimeInSeconds);
            //console.log('liveImgCloseTimeInSeconds', liveImgCloseTimeInSeconds);
        }

        function hideExtraVideosIfEmpty() {
            $('#liveScheduleVideos .extraVideos').each(function (index, currentElement) {
                var somethingIsVisible = false;
                $(this).children('div').each(function (index2, currentElement2) {
                    if ($(this).is(":visible")) {
                        somethingIsVisible = true;
                        return false;
                    }
                });
                if (!somethingIsVisible) {
                    $('#liveScheduleVideos').slideUp();
                }
            });
            $('#liveVideos .extraVideos').each(function (index, currentElement) {
                var somethingIsVisible = false;
                $(this).children('div').each(function (index2, currentElement2) {
                    if ($(this).is(":visible")) {
                        somethingIsVisible = true;
                        return false;
                    }
                });
                if (!somethingIsVisible) {
                    $('#liveVideos').slideUp();
                }
            });
        }

        $(document).ready(function () {
            if (!avideoSocketIsActive()) {
                availableLiveStreamIsLoading();
                getStatsMenu(true);
            }
            });
    </script>
