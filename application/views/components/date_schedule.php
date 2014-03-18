<ul id="lview" data-role="listview" data-inset="true">
	<li data-role="list-divider" data-theme="d">
		<?= date('l, F d, Y', strtotime($date))?>
	</li>

	<?php
		$schedule = $this->prop_m->get_schedule_by_date($date);
		if( !$schedule || count($schedule) == 0): ?>
			<li data-icon="false">
				<h3>All assignments are under a swap request.</h3>
			</li>
		<?php else:
			foreach($schedule as $s):
				//print_r($s);
				$end = $this->prop_m->return_end_time($s->assignment_date, $s->start, $s->duration);
	?>
				<li data-icon="false">
					<a href="<?= site_url('staff/request_swap_two/'.$a2swap.'/'.$s->id); ?>">
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
	<?php endif; ?>
</ul>