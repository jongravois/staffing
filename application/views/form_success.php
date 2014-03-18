<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/index'); ?>" data-icon="home">HOME</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>SUCCESS!</h2>
		</div>
		<p style="font:bold 14px Verdana, arial, sans-serif; color:#b00400; text-align:center;">Your form has been received.</p>
		<?php $this->load->view('components/menu'); ?>

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>iSTAFF</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	
</script>

<?php $this->load->view('components/page_tail'); ?>