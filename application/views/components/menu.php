<ul data-role="listview" data-inset="true">
	<li><a href="<?= site_url('staff/myschedule'); ?>">MY WORK SCHEDULE</a></li>
	<!--<li><a href="<?php //= site_url('staff/schedule'); ?>">FULL WORK SCHEDULE</a></li>-->
	<li><a href="<?= site_url('staff/links'); ?>">IMPORTANT DOCS &amp; LINKS</a></li>
	<li><a href="<?= site_url('staff/forms'); ?>">FORMS</a></li>
	<?php if((int)$_SESSION['accessLevel'] < 3): ?>
		<li><a href="<?= site_url('staff/proforms'); ?>">PRO FORMS</a></li>
	<?php endif; ?>
	<li><a href="<?= site_url('staff/profile'); ?>">MY PROFILE</a></li>
</ul>