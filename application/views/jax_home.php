<?php $this->load->view('components/page_head'); ?>

<style>
	.ui-li-has-arrow .ui-btn-inner a.ui-link-inherit, .ui-li-static.ui-li-has-arrow {
  		padding-right: 15px;
	}
</style>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1>iSTAFF</h1>
	</div><!-- /header -->

	<div data-role="content">
		<div id="splashLogo" style="margin:0 auto;text-align:center;">
        	<img alt="logo" src="http://www.edrpo.com/edrAssets/iResLogos/<?= $propNum; ?>.png" />
        </div><!-- /splashLogo -->

        <h3>Your response has been sent.</h3>
		<br><br>
		<a href="<?= 'http://' . $_SERVER['HTTP_HOST'];  ?>" data-role="button">LOG IN</a>
	</div><!-- /content -->

	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>Build a Better Community!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	$(document).bind("pagecreate", function(){
		
	});
</script>

<?php $this->load->view('components/page_tail'); ?>