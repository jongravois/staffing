<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/forms'); ?>" data-icon="arrow-l">FORMS</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>WEEKLY REPORT</h2>
		</div>

		<?php if( $form[0]->cust_top && $form[0]->cust_top != '' ): ?>
			<div data-role="fieldcontain" class="jqm-intro">
				<?= $form[0]->cust_top; ?>
			</div>
		<?php endif; ?>

		<?= form_open('staff/res_wr_handler'); ?>
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
				<label for="week_num" >Week:</label>
				<?php
					$yr = date('Y');
					$wk = date('W');
					$curr = $yr . "-W" . $wk . "-1";
				?>
				<?= form_dropdown('week_num', $weekNumDD, $curr, 'id="week_num"'); ?>
			</div>

			<div>
				<label for="concerns">Do you have any concerns you would like to address?  If yes, what are the concerns?</p>
				<textarea name="concerns" id="concerns"></textarea>
			</div>

			<div>
				<label for="appointment">Would like to make an appointment with any professional staff?  If so, who?</label>
				<textarea name="appointment" id="appointment"></textarea>
			</div>

			<div>
				<label for="distribution">Do you feel like work is being evenly distributed among staff?  Explain.</label>
				<textarea name="distribution" id="distribution"></textarea>
			</div>

			<div>
				<label for="maintenance">Are you aware of any maintenance issues? If so, what?</label>
				<textarea name="maintenance" id="maintenance"></textarea>
			</div>

			<div>
				<label for="morale">Please describe the morale/relations amongst the staff.</label>
				<textarea name="morale" id="morale"></textarea>
			</div>

			<div>
				<label for="community">How have you built community on your block/floor/hall this week?</label>
				<textarea name="community" id="community"></textarea>
			</div>

			<div>
				<label for="resident_concerns">Are there any resident concerns that you are aware of this week? Include mediations/roommate conflicts.</label>
				<textarea name="resident_concerns" id="resident_concerns"></textarea>
			</div>

			<div>
				<label for="additional">Additional Comments/Concerns.</label>
				<textarea name="additional" id="additional"></textarea>
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