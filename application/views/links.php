<?php $this->load->view('components/page_head'); ?>

<style>
	.link-data{
		font:bold 11px sans-serif;
	}
</style>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1>iSTAFF</h1>
		<a href="<?= site_url('staff/index'); ?>" data-icon="home">HOME</a>
	</div><!-- /header -->

	<div data-role="content">  
	<div class="jqm-home-welcome">
		<h2>STAFF INFORMATION</h2>
	</div>

	<ul data-role="listview" data-inset="true" data-filter="true">
		<li data-role="list-divider" data-theme="a">Staff Documents</li>
			<?php if(!$resdocs || count($resdocs) == 0): ?>
				<li>No documents found!</li>
			<?php else: ?>
				<?php foreach( $resdocs as $doc): ?>
					<li><a href="http://www.edrpo.com/edrAssets/team_docs/<?= $doc->url; ?>"><?= $doc->form; ?></a></li>
				<?php endforeach; ?>
			<?php endif; ?>

		<?php if((int)$_SESSION['accessLevel'] < 3): ?>
			<li data-role="list-divider" data-theme="a">Pro Staff Documents</li>
				<?php if(!$prodocs || count($prodocs) == 0): ?>
					<li>No documents found!</li>
				<?php else: ?>
					<?php foreach( $prodocs as $doc): ?>
						<li><a href="http://www.edrpo.com/edrAssets/team_docs/<?= $doc->url; ?>"><?= $doc->form; ?></a></li>
					<?php endforeach; ?>
				<?php endif; ?>
		<?php endif; ?>

		<li data-role="list-divider" data-theme="a">Links</li>
			<?php if(!$links || count($links) == 0): ?>
				<li>No links were found!</li>
			<?php else: ?>
				<?php foreach( $links as $link): ?>
					<li><a href="<?= $link->url; ?>"><?= $link->link; ?></a></li>
				<?php endforeach; ?>
			<?php endif; ?>
	</ul>

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em><?= $username; ?></em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	
</script>

<?php $this->load->view('components/page_tail'); ?>