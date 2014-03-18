<?php $this->load->view('components/page_head'); ?>

<style>
	.ui-li-has-arrow .ui-btn-inner a.ui-link-inherit, .ui-li-static.ui-li-has-arrow {
  		padding-right: 15px;
	}
</style>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1>iSTAFF</h1>
		<a href="<?= site_url('staff/index'); ?>" data-icon="home">HOME</a>
	</div><!-- /header -->

	<div data-role="content">
		<div class="jqm-home-welcome">
			<h2>MY WORK SCHEDULE</h2>
		</div>

		<div id="instructions" data-role="collapsible">
			<h2>HOW TO TRADE ASSIGNMENTS</h2>
			<?php 
				echo $globals[0]->swap_rules; 
			?>
		</div>

		<div id="message" style="display:none;">
			<p style="text-align:center;">
				<b>YOUR REQUEST HAS BEEN SENT!</b>
			</p>
		</div>

		<ul data-role="listview" data-inset="true">
			<?php foreach($dates as $d): ?> 

			<li data-role="list-divider" data-theme="d">
				<?= date('l, F d, Y', strtotime($d->assignment_date))?>
			</li>

			<?php
				$schedule = $this->prop_m->get_user_schedule_by_date($user[0]->id, $d->assignment_date);
				foreach($schedule as $s):
					//print_r($s);
					$end = $this->prop_m->return_end_time($s->assignment_date, $s->start, $s->duration);
			?>
				<li data-icon="false">
					<a class="btnRequest" data-status="<?= $s->status_id; ?>" href="<?= site_url('staff/request_swap/'.$s->id); ?>">
						<h6><?= $s->location; ?></h6>
					</a>
					<p style="padding:5px 0 5px 20px;">
						<?= date('g:i A',strtotime($s->start)); ?>
						&nbsp;-&nbsp;
						<?= date('g:i A',strtotime($end)); ?>
						&nbsp;(
						<?= number_format($s->duration,2); ?>
						hours&nbsp;)
					</p>
				</li>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</ul>
	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em><?= $username; ?></em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	$(document).bind("pagecreate", function(){
		var stats = "<?= $stats; ?>";
		if( stats == "success" ){
			$('#instructions').hide();
			$('#message').show();
		} // end if

		$(document).on('click', '.btnRequest', function(e){
			var status = $(this).data('status');
			if(parseInt(status) == 4){
				alert("That assignment is being considered for a different swap and cannot be selected at this time.");
				e.preventDefault();
				return false;
			} // end status
		});
	});
</script>

<?php $this->load->view('components/page_tail'); ?>