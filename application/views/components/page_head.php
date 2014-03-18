<!DOCTYPE html> 
<html> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>iSTAFF</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="/jqm132/jquery.mobile-1.3.2.min.css" />
	<link rel="stylesheet" href="/jqm132/jquery.mobile.theme-1.3.2.css" />
	<link rel="stylesheet" href="/jqm_datebox/css/jqm-datebox.css" />
	<link rel="stylesheet" href="/jqm_datebox/css/jquery.mobile.simpledialog.min.css" />
	<link rel="stylesheet" href="/jqm_datebox/css/demos.css" />
	<link rel="stylesheet" href="/css/jqm_site.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">

	<style type="text/css">
		.ui-body-c, .ui-overlay-c { background: #F7FDFA; }
		.ui-header .ui-title, .ui-footer .ui-title { color: #616161; text-shadow: none; }
		.ui-bar-a { color: #616161; text-shadow: none; }
		.ui-btn-up-a { color: #616161; text-shadow: none; }
		.jqm-content .jqm-intro{ color: #1D1212; }
		.jqm-content > h2, .jqm-content > h3, .jqm-content > h4, .jqm-home-welcome h2 { color:#4FA82C; }
		.jqm-home-welcome h2 { margin-left:0; }

		/* Smartphone Styling */
		@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
			#splashLogo img{ width: 90%; }
		} /* END SMARTPHONE STYLING */
		@media screen and (min-width: 800px) {
  			.ui-li-desc {
    			margin: -2em 0 0 1.5em;
  			}
		}
		.invalid { border-color: #B00400; border-width: 2px;}
	</style>

	<script src="/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript">
	    $(document).bind("mobileinit", function(){
	    	$. mobile.ajaxEnabled = false;
	    }); // END document.bind
	</script>
	<script src="/jqm132/jquery.mobile-1.3.2.min.js" type="text/javascript"></script>
	<script src="/jqm_datebox/js/jquery.mousewheel.min.js" type="text/javascript"></script>
	<script src="/jqm_datebox/js/jqm-datebox.core.js" type="text/javascript"></script>
	<script src="/jqm_datebox/js/jqm-datebox.mode.calbox.js" type="text/javascript"></script>
	<script src="/jqm_datebox/js/jqm-datebox.mode.datebox.js" type="text/javascript"></script>
	<script src="/jqm_datebox/js/jqm-datebox.mode.flipbox.js" type="text/javascript"></script>
	<script src="/jqm_datebox/js/jqm-datebox.mode.durationbox.js" type="text/javascript"></script>
	<script src="/jqm_datebox/js/jqm-datebox.mode.slidebox.js" type="text/javascript"></script>
	<script src="/jqm_datebox/js/jquery.mobile.datebox.i18n.en_US.utf8.js" type="text/javascript"></script>
	<script src="/jqm_datebox/js/jquery.mobile.simpledialog.min.js" type="text/javascript"></script>
	<script src="/js/jquery.cookie.js" type="text/javascript"></script>
	
</head> 
<body>