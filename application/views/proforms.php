<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1>iSTAFF</h1>
		<a href="<?= site_url('staff/index'); ?>" data-icon="home">HOME</a>
	</div><!-- /header -->

	<div data-role="content">  

		<div class="jqm-home-welcome">
			<h2>PROFESSIONAL STAFF FORMS</h2>
		</div>
		<ul data-role="listview" data-inset="true" data-theme="d" data-icon="false" class="jqm-list jqm-home-list">
			<?php foreach($forms as $form): ?>
				<li><a href="<?= site_url('staff/' . $form->URL ); ?>"><?= strtoupper($form->form_name); ?></a></li>
			<?php endforeach; ?>		
		</ul>

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em><?= $username; ?></em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	
</script>

<?php $this->load->view('components/page_tail'); ?>