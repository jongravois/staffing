<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/forms'); ?>" data-icon="arrow-l">FORMS</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>LEAVE REQUEST FORM</h2>
		</div>
		<div data-role="fieldcontain" class="jqm-intro">
			<?php if( $form[0]->cust_top && $form[0]->cust_top != '' ): ?>
				<div data-role="fieldcontain" class="jqm-intro">
					<?= $form[0]->cust_top; ?>
				</div>
			<?php endif; ?>
		</div>
		
		<?= form_open('staff/res_lr_handler'); ?>
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
						<option value="<?= $loc->id; ?>"><?= $loc->location; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

		<div data-role="fieldcontain">	
			<label for="leave_time_start">Time Away - FROM:</label>
			<input type="date" id="leave_time_start" name="leave_time_start" data-role="datebox" data-options='{"mode": "calbox"}'>
		</div>

		<div data-role="fieldcontain">	
			<label for="leave_time_end">Time Away - TO:</label>
			<input type="date" id="leave_time_end" name="leave_time_end" data-role="datebox" data-options='{"mode": "calbox"}'>
		</div>

		<div data-role="fieldcontain">	
			<label for="cphone">Phone number:<br>(in the event of an emergency):</label>
			<input type="tel" id="cphone" name="cphone" placeholder="9999999999" pattern="\d{3}\d{3}\d{4}.*?$" />
		</div>

		<div data-role="fieldcontain" style="text-align:center;display:none;">
			<span style="font:bold 14px Verdana, arial, sans-serif; color:#b00400;">
				I understand that by providing my student ID number below I will be electronically signing this documentation. By signing this form electronically I acknowledge that I have read, understood, and agree to comply to all rules and regulations of the leave request form.
			</span>
		</div>

		<div data-role="fieldcontain" style="display:none;">	
			<label for="student_number">Student ID Number:</label>
			<input type="text" id="student_number" name="student_number" value="" />
		</div>

		<?php if( $form[0]->cust_bottom && $form[0]->cust_bottom != '' ): ?>
			<div data-role="fieldcontain" style="text-align:center;">
				<span style="font:bold 14px Verdana, arial, sans-serif; color:#b00400;">
					<?= $form[0]->cust_bottom;  ?>
				</span>
			</div>
		<?php endif; ?>

		<div data-role="fieldcontain" style="text-align:center;">	
			<input type="submit" name="submit" value="SEND REPORT" />
		</div>

		<?= form_close(); ?>

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>iSTAFF</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	$(document).bind("pagecreate", function(){

	});
</script>

<?php $this->load->view('components/page_tail'); ?>