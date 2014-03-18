<?php $this->load->view('components/page_head'); ?>

<div data-role="page">

	<div data-role="header">
		<a href="#" data-rel="back">Cancel</a>
		<h1>iSTAFF</h1>
	</div><!-- /header -->

	<div data-role="content">
		<div id="splashLogo" style="margin:0 auto;text-align:center;">
        	<img alt="logo" src="http://www.edrpo.com/edrAssets/iResLogos/<?= $propNum; ?>.png" />
        </div><!-- /splashLogo -->

        <h3 style="margin:0 auto;text-align:center;">New Resident Staff Account</h3>
        <br><br>
		<ul data-role="listview" data-filter="true" data-inset="true" data-filter-placeholder="Search ..." data-theme="d" data-dividertheme="a">
			<li data-role="list-divider">Click or Tap Yourself to Continue ...</li>
    		<?php foreach($staff as $emp): ?>
				<li>
					<a href="<?= site_url('user/create_new_account'.'/'.$emp->id); ?>"><?= $emp->lastName . ', ' . $emp->firstName; ?></a>
				</li>
    		<?php endforeach; ?>
    		<li data-role="list-divider">Not in the list? Your account is active. Please log in.</li>
		</ul>
	</div><!-- /content -->
	
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>Build a Better Community!</em></h4>
	</div><!-- /footer -->

</div><!-- /page -->

<?php $this->load->view('components/page_tail'); ?>