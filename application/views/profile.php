<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1>iSTAFF</h1>
		<a href="<?= site_url('staff/index'); ?>" data-icon="home">HOME</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>UPDATE YOUR PROFILE</h2>
		</div>
		<?= form_open('staff/edit_profile'); ?>
		<?= form_hidden('id', $user[0]->id); ?>
		<div data-role="fieldcontain">
			<label for="firstName">First Name:</label>
			<input type="text" id="firstName" name="firstName" value="<?= $user[0]->firstName; ?>" readonly />
		</div>

		<div data-role="fieldcontain">
			<label for="lastName">Last Name:</label>
			<input type="text" id="lastName" name="lastName" value="<?= $user[0]->lastName; ?>" readonly />
		</div>

		<div data-role="fieldcontain">	
			<label for="email">Your Email:</label>
			<input type="text" id="email" name="email" value="<?= $user[0]->staffEmail; ?>" />
		</div>

		<div data-role="fieldcontain" style="text-align:center;">	
			<input type="submit" name="submit" value="UPDATE EMAIL" />
		</div>

		<?= form_close(); ?>

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em><?= $username; ?></em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	
</script>

<?php $this->load->view('components/page_tail'); ?>