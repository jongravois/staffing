<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1>iSTAFF</h1>
		<a data-rel="back" data-icon="arrow-l">BACK</a>
	</div><!-- /header -->

	<div data-role="content">
		<div class="jqm-home-welcome">
			<h2>SWAP ASSIGNMENT</h2>
		</div>
		<?= form_open('staff/swap_ast_one_handler'); ?>
		<?= form_hidden('staffID', $id); ?>
		
		<div id="step_one">
			<div data-role="fieldcontain">
				<label for="selName" class="ui-select">Select By Name:</label>
				<?= form_dropdown('selName', $ddStaff, '', 'id="selName"'); ?>
			</div>
			<?php if( !$ddDates || count($ddDates) == 0): ?>
				<div data-role="fieldcontain">
					<label for="selDate" class="select">Select By Date:</label>
					<?= form_dropdown('selDate', array(''=>'No Dates Available'), '', 'id="selDate"'); ?>
				</div>
			<?php else: ?>
				<div data-role="fieldcontain">
					<label for="selDate" class="select">Select By Date:</label>
					<?= form_dropdown('selDate', $ddDates, '', 'id="selDate"'); ?>
				</div>
			<?php endif; ?>
		</div>
		
		<div id="step_two" style="display:none;">
			

			<div data-role="fieldcontain" style="text-align:center;">	
				<input type="submit" name="submit" value="REQUEST CHANGE" />
			</div>
		</div>
		

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em><?= $username; ?></em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	$(document).bind("pagecreate", function(){
		var a2swap = "<?= $a2swap; ?>";

		$('#selName').on('change', function(e){
			var name =  $(this).val(),
			    date = '';
			$('#step_one').hide();
			
			$.ajax({
				type: "POST",
				url:  "<?= site_url('staff/ajax_swap_name'); ?>",
				data: { id: name, date: date, a2swap: a2swap },
				success: function(msg){
					$('#step_two').html(msg).fadeIn();
					$('#lview').listview().listview('refresh');
				} // end success
			});
		});
		/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
		$('#selDate').on('change', function(e){
			var date =  $(this).val(),
			    name = '';
			$('#step_one').hide();
			
			$.ajax({
				type: "POST",
				url:  "<?= site_url('staff/ajax_swap_date'); ?>",
				data: { id: name, date: date, a2swap: a2swap },
				success: function(msg){
					$('#step_two').html(msg).fadeIn();
					$('#lview').listview().listview('refresh');
				} // end success
			});
		});
	});
</script>

<?php $this->load->view('components/page_tail'); ?>