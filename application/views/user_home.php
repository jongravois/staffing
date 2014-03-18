<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header" data-theme="a">
		<h1>iSTAFF</h1>
		<a href="<?= site_url('user/log_out'); ?>" data-icon="gear" class="ui-btn-right">Log Out</a>
	</div><!-- /header -->

	<div data-role="content" class="jqm-content ui-content" role="main">  
		<div class="jqm-home-welcome">
			<h2><?= strtoupper(date('l, M j, Y')); ?></h2>
			<div class="jqm-intro"><?= $announcement; ?></div>
		</div>
		<?php $this->load->view('components/menu'); ?>
	</div><!-- /content -->
	
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em><?= $username; ?></em></h4>
	    <!--<p><?php //print_r($_SESSION); ?></p>-->
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	
</script>

<?php $this->load->view('components/page_tail'); ?>