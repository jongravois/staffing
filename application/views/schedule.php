<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1>iSTAFF</h1>
		<a href="<?= site_url('staff/index'); ?>" data-icon="home">HOME</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>WEEKLY WORK SCHEDULE</h2>
		</div>
		<p>The current week is <?= $week; ?></p>

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em><?= $username; ?></em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	
</script>

<?php $this->load->view('components/page_tail'); ?>