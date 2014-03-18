<?php //print_r($form);  ?>
<?php $this->load->view('components/page_head'); ?>

<div id="index" data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/forms'); ?>" data-icon="arrow-l">FORMS</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>ACTIVITY LOG</h2>
		</div>
		<?= form_open('staff/res_al_handler'); ?>
			
			<?php if( $form[0]->cust_top && $form[0]->cust_top != '' ): ?>
				<div data-role="fieldcontain" class="jqm-intro">
					<?= $form[0]->cust_top; ?>
				</div>
			<?php endif; ?>

			<div data-role="fieldcontain">
				<label for="raFName">First Name</label>
				<input type="text" id="raFName" name="raFName" value="<?= $user[0]->firstName; ?>" />
			</div>
			
			<div data-role="fieldcontain">
				<label for="raLName">Last Name</label>
				<input type="text" id="raLName" name="raLName" value="<?= $user[0]->lastName; ?>" />
			</div>
			
			<div data-role="fieldcontain">	
				<label for="email">Your Email</label>
				<input type="text" id="email" name="email" value="<?= $user[0]->staffEmail; ?>" />
			</div>
			
			<div data-role="collapsible" data-theme="a" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
			    <h4>Resident Contact<br>(Phone and/or Door to Door)</h4>
			    <div id="resident_contact" data-role="fieldcontain">
			    	<div id="contact_entry">
			    		<p style="font:bold 10px sans-serif">Name/Apt</p>
			    		<input type="text" name="contact[name][]" /><br>
			    		<p style="font:bold 10px sans-serif">Personal Interaction</p>
			    		<input type="text" name="contact[interaction][]" /><br>
			    		<p style="font:bold 10px sans-serif">Updated Contact Info</p>
			    		<input type="text" name="contact[updated_info][]" /><br>
			    		<p style="font:bold 10px sans-serif">Work Orders Questions Concerns</p>
			    		<input type="text" name="contact[work_orders][]" />
			    		<br><br>
			    	</div>
			    </div>
	    		<p><a href="#" data-role="button" data-mini="true" data-inline="true" data-icon="plus" data-theme="b" id="btnContact">Add Another</a></p>
			</div>

			<div data-role="collapsible" data-theme="a" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
			    <h4>Resident Birthday Cards</h4>
	    		<table id="bcard_table">
	    			<tr>
	    				<th style="width:30%;">DATE</th>
	    				<th style="width:40%;">NAME</th>
	    				<th style="width:30%;">APT</th>
	    			</tr>
	    			<tr id="bcard_entry">
	    				<td><input type="date" name="bcards[date][]" /></td>
	    				<td><input type="text" name="bcards[name][]" /></td>
	    				<td><input type="text" name="bcards[apt][]" /></td>
	    			</tr>
	    		</table>
	    		<p><a href="#" data-role="button" data-mini="true" data-inline="true" data-icon="plus" data-theme="b" id="btnBCard">Add Another</a></p>
			</div> <!-- / Birthday Cards -->

			<div data-role="collapsible" data-theme="a" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
			    <h4>Building Inspections</h4>
			    <table>
			    	<tr>
			    		<td>Common Areas</td>
			    		<td><textarea name="common_areas" id="common_areas" cols="30" rows="10"></textarea></td>
			    	</tr>
			    	<tr>
			    		<td>Signage</td>
			    		<td><textarea name="signage" id="signage" cols="30" rows="10"></textarea></td>
			    	</tr>
			    	<tr>
			    		<td>Lights</td>
			    		<td><textarea name="lights" id="lights" cols="30" rows="10"></textarea></td>
			    	</tr>
			    	<tr>
			    		<td>Fire Equipment</td>
			    		<td><textarea name="fire_equipment" id="fire_equipment" cols="30" rows="10"></textarea></td>
			    	</tr>
			    	<tr>
			    		<td>Damage</td>
			    		<td><textarea name="damage" id="damage" cols="30" rows="10"></textarea></td>
			    	</tr>
			    	<tr>
			    		<td>Lease Violations</td>
			    		<td><textarea name="lease_violations" id="lease_violations" cols="30" rows="10"></textarea></td>
			    	</tr>
			    	<tr>
			    		<td>Landscaping/Curb Appeal</td>
			    		<td><textarea name="landscaping" id="landscaping" cols="30" rows="10"></textarea></td>
			    	</tr>
			    </table>
			</div>

			<div data-role="collapsible" data-theme="a" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
			    <h4>Grace Hill Training</h4>
			    <table id="ghill_table">
			    	<tr>
			    		<th>Sections Due Completed</th>
			    	</tr>
			    	<tr id="ghill_entry">
			    		<td><input type="text" name="ghill[section][]" /></td>
			    	</tr>
			    </table>
				<p><a href="#" data-role="button" data-mini="true" data-inline="true" data-icon="plus" data-theme="b" id="btnGHill">Add Another</a></p>
			</div> <!-- /Grace Hill -->

			<div data-role="collapsible" data-theme="a" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
			    <h4>Community Development</h4>
			    <table id="cdev_table">
			    	<tr>
			    		<th>Resident Event Planning</th>
			    	</tr>
			    	<tr id="cdev_entry">
			    		<td><input type="text" name="cdev[plan][]" /></td>
			    	</tr>
			    </table>
				<p><a href="#" data-role="button" data-mini="true" data-inline="true" data-icon="plus" data-theme="b" id="btnCDev">Add Another</a></p>
			</div> <!-- /Community Development -->

			<div data-role="collapsible" data-theme="a" data-content-theme="d" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u">
			    <h4>Suggestions/Feedback<br>(Ideas, events, issues or problems)</h4>
			    <textarea name="feedback" id="feedback"></textarea>
			</div> <!-- /Feedback -->

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
	$(document).on('pagebeforeshow', '#index', function(){       
	    $(document).off('click', '#btnContact').on('click', '#btnContact',function(e) {
	    	var clone = $('#contact_entry').clone().removeAttr('id');
	        clone.find('[type=text]').val('');
	        clone.appendTo('#resident_contact');
	    });
	    $(document).off('click', '#btnBCard').on('click', '#btnBCard',function(e) {
	        var clone = $('#bcard_entry').clone().removeAttr('id');
	        clone.find('[type=text]').val('');
	        clone.find('[type=date]').val('');
	        clone.appendTo('#bcard_table');
	    });
	    $(document).off('click', '#btnGHill').on('click', '#btnGHill',function(e) {
	        var clone = $('#ghill_entry').clone().removeAttr('id');
	        clone.find('[type=text]').val('');
	        clone.appendTo('#ghill_table');
	    });
	    $(document).off('click', '#btnCDev').on('click', '#btnCDev',function(e) {
	        var clone = $('#cdev_entry').clone().removeAttr('id');
	        clone.find('[type=text]').val('');
	        clone.appendTo('#cdev_table');
	    });
	});
</script>

<?php $this->load->view('components/page_tail'); ?>