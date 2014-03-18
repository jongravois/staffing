<ul id="lview" data-role="listview" data-inset="true">
	<?php if( !$dates || count($dates) == 0): ?>
		<li data-icon="false"><b>NO ASSIGNMENTS FOUND.</b></li>
	<?php else: ?>
		<?php foreach($dates as $d): ?> 
			<li data-role="list-divider" data-theme="d">
				<?= date('l, F d, Y', strtotime($d->assignment_date))?>
			</li>

			<?php
				$schedule = $this->prop_m->get_user_swap_schedule_by_date($uid, $d->assignment_date);
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
		<?php endforeach; ?>
	<?php endif; ?>
</ul>