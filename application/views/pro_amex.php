<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/proforms'); ?>" data-icon="arrow-l">FORMS</a>
	</div><!-- /header -->

	<div id="form_data" data-role="content">  
		<div class="jqm-home-welcome">
			<h2>AMERICAN EXPRESS REQUEST FORM</h2>
		</div>
		<?= form_open('staff/pro_amex_handler'); ?>

			<?php if( $form[0]->cust_top && $form[0]->cust_top != '' ): ?>
				<div data-role="fieldcontain" class="jqm-intro">
					<?= $form[0]->cust_top; ?>
				</div>
				<br><br>
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
				<label for="date_needed">Date Needed:</label>
				<input type="date" id="date_needed" name="date_needed" data-role="datebox" data-options='{"mode": "calbox"}'>
			</div>

			<div data-role="fieldcontain">
				<label for="location">Place of Purchase:</label>
				<input type="text" id="location" name="location" value="" />
			</div>

			<div>
				<label for="purpose">Business Purpose:</label>
				<textarea name="purpose"></textarea>
			</div>

			<div>
				<label for="expense">Total Estimated Expense:</label>
				<textarea name="expense"></textarea>
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