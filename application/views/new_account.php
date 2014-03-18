<?php $this->load->view('components/page_head'); ?>

<div data-role="page">

	<div data-role="header">
		<h1>iSTAFF</h1>
	</div><!-- /header -->

	<div data-role="content">
		<div id="splashLogo" style="margin:0 auto;text-align:center;">
        	<img alt="logo" src="http://www.edrpo.com/edrAssets/iResLogos/<?= $propNum; ?>.png" />
        </div><!-- /splashLogo -->

        <h3 style="margin:0 auto;text-align:center;">New Resident Staff Account</h3>
        <br><br>
		<form action="<?= site_url('user/create_new_account_handler'); ?>" method="post" data-ajax="false">
			<ul data-role="listview" data-inset="true" class="input-block-level"  data-theme="d" data-dividertheme="a">
				<input type="hidden" name="id" value="<?= $staff[0]->id; ?>" />
				<li data-role="list-divider">Enter a Valid Email Address</li>
				<li data-role="fieldcontain">
					<input type="text" name="email" id="email" value="">
				</li>
				<li data-role="fieldcontain">
					<button type="submit" class="btn input-block-level" data-theme="a">Submit</button>
				</li>
			</ul>
		</form>
		<br><br>
		<h4 style="margin:0 auto;text-align:center;">Once your account has been created, you will be forwarded to the log-in screen.<br>Please use the email you entered as your username and <u><b>changeme</b></u> as the initial password.<br>You will then be forced to create a secure password.</h4>
	</div><!-- /content -->
	
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>Build a Better Community!</em></h4>
	</div><!-- /footer -->

</div><!-- /page -->

<?php $this->load->view('components/page_tail'); ?>