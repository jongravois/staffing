<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/forms'); ?>" data-icon="arrow-l">FORMS</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>BULLETIN BOARD REQUEST FORM</h2>
		</div>

		<?php if( $form[0]->cust_top && $form[0]->cust_top != '' ): ?>
			<div data-role="fieldcontain" class="jqm-intro">
				<?= $form[0]->cust_top; ?>
			</div>
		<?php endif; ?>
		
		<?= form_open('staff/res_pbb_handler'); ?>
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
				<label for="display_month">Month for Program or Bulletin Board:</label>
				<select id="display_month" name="display_month">
					<option value="---">Select One...</option>
					<option value="January">January</option>
					<option value="February">February</option>
					<option value="March">March</option>
					<option value="April">April</option>
					<option value="May">May</option>
					<option value="June">June</option>
					<option value="July">July</option>
					<option value="August">August</option>
					<option value="September">September</option>
					<option value="October">October</option>
					<option value="November">November</option>
					<option value="December">December</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="locationPBB">Location of Program or Bulletin Board:</label>
				<input type="text" id="locationPBB" name="locationPBB"  />
			</div>

			<div>
				<label for="description">Program or Bulletin Board Description:</label>
				<textarea name="description"></textarea>
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