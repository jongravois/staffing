<?php //print_r($form);  ?>
<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/forms'); ?>" data-icon="arrow-l">FORMS</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>PAID DESK SHIFT FORM</h2>
		</div>
		<?= form_open('staff/res_pds_handler'); ?>
			
			<?php if( $form[0]->cust_top && $form[0]->cust_top != '' ): ?>
				<div data-role="fieldcontain" class="jqm-intro">
					<?= $form[0]->cust_top; ?>
				</div>
			<?php endif; ?>

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
				<label for="shift_date">Shift Date:</label>
				<input type="date" id="shift_date" name="shift_date" data-role="datebox" data-options='{"mode": "calbox"}'>
			</div>

			<div data-role="fieldcontain">
				<label for="shift_time_start">Shift Start Time:</label>
				<input type="date" id="shift_time_start" name="shift_time_start" data-role="datebox" data-options='{"mode":"timebox"}'>
			</div>

			<div data-role="fieldcontain">	
				<label for="shift_duration">Shift Duration:</label>
				<select name="shift_duration" id="shift_duration">
					<option value="00:00">Please select ...</option>
					<option value=".5">30 minutes</option>
					<option value="1.0">1 hours</option>
					<option value="1.5">1 hours, 30 minutes</option>
					<option value="2.0">2 hours</option>
					<option value="2.5">2 hours, 30 minutes</option>
					<option value="3.0">3 hours</option>
					<option value="3.5">3 hours, 30 minutes</option>
					<option value="4.0">4 hours</option>
					<option value="4.5">4 hours, 30 minutes</option>
					<option value="5.0">5 hours</option>
					<option value="5.5">5 hours, 30 minutes</option>
					<option value="6.0">6 hours</option>
					<option value="6.5">6 hours, 30 minutes</option>
					<option value="7.0">7 hours</option>
					<option value="7.5">7 hours, 30 minutes</option>
					<option value="8.0">8 hours</option>
					<option value="8.5">8 hours, 30 minutes</option>
					<option value="9.0">9 hours</option>
					<option value="9.5">9 hours, 30 minutes</option>
					<option value="10.0">10 hours</option>
					<option value="10.5">10 hours, 30 minutes</option>
					<option value="11.0">11 hours</option>
					<option value="11.5">11 hours, 30 minutes</option>
					<option value="12.0">12 hours</option>
				</select>
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
		</form>

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