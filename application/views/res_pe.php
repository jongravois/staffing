<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/forms'); ?>" data-icon="arrow-l">FORMS</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>PROGRAM EVALUATION FORM</h2>
		</div>

		<?php if( $form[0]->cust_top && $form[0]->cust_top != '' ): ?>
			<div data-role="fieldcontain" class="jqm-intro">
				<?= $form[0]->cust_top; ?>
			</div>
		<?php endif; ?>
		
		<?= form_open('staff/res_pe_handler'); ?>
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
				<label for="program_title">Program Title:</label>
				<input type="text" id="program_title" name="program_title"  />
			</div>

			<div data-role="fieldcontain">
				<label for="program_date">Program Date:</label>
				<input type="date" id="program_date" name="program_date"  />
			</div>

			<div data-role="fieldcontain">
				<label for="program_time">Program Time:</label>
				<input type="time" id="program_time" name="program_time"  />
			</div>

			<div data-role="fieldcontain">
				<label for="program_location">Program Location:</label>
				<input type="text" id="program_location" name="program_location"  />
			</div>

			<div data-role="fieldcontain">
				<label for="flipPresenter">Was there a presenter?</label>
				<select name="had_presenter" id="flipPresenter" data-role="slider">
					<option value="no">No</option>
					<option value="yes">Yes</option>
				</select> 
			</div>

			<div id="txPresenter" data-role="fieldcontain" style="display:none;">
				<label for="presenter">Presenter's Name:</label>
				<input type="text" id="presenter" name="presenter"  />
			</div>

			<div data-role="fieldcontain">	
				<label for="program_type">Type of Program:</label>
				<select name="program_type" id="program_type">
					<option value="-">Please select ...</option>
					<option value="Community Service">Community Service</option>
					<option value="Diversity">Diversity</option>
					<option value="Educational">Educational</option>
					<option value="Social">Social</option>
					<option value="Wellness/Personal Development">Wellness/Personal Development</option>
				</select>
			</div>

			<div data-role="fieldcontain">	
				<label for="audience">Intended Audience:</label>
				<select name="audience" id="audience">
					<option value="-">Please select ...</option>
					<option value="Freshmen">Freshmen</option>
					<option value="Student Athletes">Student Athletes</option>
					<option value="Personal Block">Personal Block</option>
					<option value="All of the Above">All of the Above</option>
				</select>
			</div>

			<div data-role="fieldcontain">
				<label for="number_audience">Number of Persons in Attendance:</label>
				<input type="number" id="number_audience" name="number_audience"  />
			</div>

			<div>
				<label for="marketing">Do you think that the marketing and advertising was effective? How could you improve for next time?</label>
				<textarea name="marketing"></textarea>
			</div>

			<div>
				<label for="description">Describe your program (content, audience participation, etc):</label>
				<textarea name="description"></textarea>
			</div>

			<div>
				<label for="evaluation">Evaluate your program and give suggestions for improvement:</label>
				<textarea name="evaluation"></textarea>
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
	$(document).bind("pagecreate", function(){
		$(document).on('change', '#flipPresenter', function(e){
			var val = $(this).val();
			if(val=="yes"){
				$('#txPresenter').slideDown();
			} else {
				$('#txPresenter').slideUp();
			} // end if
		});
	});
</script>

<?php $this->load->view('components/page_tail'); ?>