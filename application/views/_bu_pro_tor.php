<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/index'); ?>" data-icon="home">HOME</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>TIME OFF REQUEST FORM</h2>
		</div>

		<?php if( $form[0]->cust_top && $form[0]->cust_top != '' ): ?>
			<div data-role="fieldcontain" class="jqm-intro">
				<?= $form[0]->cust_top; ?>
			</div>
			<br><br>
		<?php endif; ?>

		<?= form_open('staff/pro_tor_handler'); ?>
		<div data-role="fieldcontain">
			<label for="raFName">First Name:</label>
			<input type="text" id="raFName" name="raFName" value="<?= $user[0]->firstName; ?>" />
		</div>
		
		<div data-role="fieldcontain">
			<label for="raLName">Last Name:</label>
			<input type="text" id="raLName" name="raLName" value="<?= $user[0]->lastName; ?>" />
		</div>
		
		<div data-role="fieldcontain">	
			<label for="email">Your Email:</label>
			<input type="text" id="email" name="email" value="<?= $user[0]->staffEmail; ?>" />
		</div>

		<div data-role="fieldcontain">
			<label for="location" class="select">Location:</label>
			<select id="location" name="location">
				<option>Please select ...</option>
				<?php foreach($locations as $loc): ?>
					<option value="<?= $loc->id; ?>"><?= $loc->location; ?></options>
				<?php endforeach; ?>
			</select>
		</div>
		
		<div data-role="fieldcontain">	
			<label for="off_time_start">Time Away - FROM:</label>
			<input type="date" id="off_time_start" name="off_time_start" data-role="datebox" data-options='{"mode": "calbox"}'>
		</div>

		<div data-role="fieldcontain">	
			<label for="off_time_end">Time Away - TO:</label>
			<input type="date" id="off_time_end" name="off_time_end" data-role="datebox" data-options='{"mode": "calbox"}'>
		</div>

		<div>
			<label for="reason">Reason for Request:</label>
			<textarea name="reason"></textarea>
		</div>

		<?php if( $form[0]->cust_bottom && $form[0]->cust_bottom != '' ): ?>
			<div data-role="fieldcontain" style="text-align:center;">
				<span style="font:bold 14px Verdana, arial, sans-serif; color:#b00400;">
					<?= $form[0]->cust_bottom;  ?>
				</span>
			</div>
		<?php endif; ?>
		
		<div data-role="fieldcontain" style="text-align:center;">	
			<input type="submit" name="submit" value="SEND FORM" />
		</div>
		<?= form_close(); ?>

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>iSTAFF</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	
</script>

<?php $this->load->view('components/page_tail'); ?>