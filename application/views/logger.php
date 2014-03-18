<?php $this->load->view('components/page_head'); ?>

<div data-role="page">

	<div data-role="header" data-theme="a">
		<h1>iSTAFF</h1>
	</div><!-- /header -->

	<div data-role="content">
		<div id="splashLogo" style="margin:0 auto;text-align:center;">
        	<img alt="logo" src="http://www.edrpo.com/edrAssets/iResLogos/<?= $propNum; ?>.png" />
        </div><!-- /splashLogo -->
	    
	    <h3 style="margin:0 auto;text-align:center;">Welcome to iSTAFF</h3>
        <?php if( $frm == 'A'): ?>
	        <form id="frmLogin" action="<?= site_url('user/validate_user'); ?>" method="post" data-ajax="false">
	        	<input type="hidden" name="propNum" value="<?= $propNum; ?>" />
	        	<ul data-role="listview" data-inset="true" data-theme="d" data-dividertheme="a">
	        		<li data-role="list-divider">
	        			<?= $msg; ?>
	        		</li>
	        		<li data-role="fieldcontain">
	        			<label for="email_a">Email:</label>
	        			<input type="email" name="email" id="email_a">
	    			</li>
	    			<li data-role="fieldcontain">
	    				<label for="password_a">Password:</label>
	    				<input type="password" name="password" id="password_a">
	    			</li>
	    			<li data-role="field-contain" style="text-align:center;">
	    				<label for="remember">Remember Me:</label>
	    				<select name="remember" id="remember" data-role="slider" data-mini="true">
	    					<option value="off">Off</option>
	    					<option value="on">On</option>
	    				</select>
	    			</li>
	    			<li data-role="fieldcontain" style="text-align:center;">
	      				<fieldset class="ui-grid-a">
	        				<button type="submit" class="btn input-block-level" data-theme="a">Submit</button>
	      				</fieldset>
	    			</li>
	        	</ul>
	      	</form>
	      	<ul data-role="listview" data-inset="true" data-theme="d" data-dividertheme="a">
	      		<li data-role="list-divider">
        			HAVEN'T EVER LOGGED IN BEFORE?
        		</li>
        		<li data-role="fieldcontain" style="text-align:center;">
	      				<fieldset class="ui-grid-a">
	        				<a href="<?= site_url('user/create_new_user'); ?>">
        						<button type="submit" data-theme="a">Create an Account</button>
        					</a>
	      				</fieldset>
	    			</li>
	      	</ul>
	    <?php elseif( $frm == 'B'): ?>
			<form action="<?= site_url('user/change_password'); ?>" method="post" data-ajax="false">
	        	<input type="hidden" name="propNum" value="<?= $propNum; ?>" />
	        	<ul data-role="listview" data-inset="true" data-theme="d" data-dividertheme="a">
	        		<li id="message_bar" data-role="list-divider">
	        			<?= $msg; ?>
	        		</li>
	        		<li data-role="fieldcontain">
	        			<label for="email">Email:</label>
	        			<input type="email" name="email" id="email" value="<?= $form['email']; ?>">
	    			</li>
	    			<li data-role="fieldcontain">
	    				<label for="password">Password:</label>
	    				<input type="password" name="password" id="password">
	    			</li>
	    			<li data-role="fieldcontain">
	    				<label for="password2">Confirm Password:</label>
	    				<input type="password" name="password2" id="password2" onblur="confirmMatch()">
	    			</li>
	    			<li data-role="fieldcontain">
	      				<fieldset class="ui-grid-a">
	        				<div class="ui-block-b"><button type="submit" data-theme="a">Submit</button></div>     
	      				</fieldset>
	    			</li>
	        	</ul>
	      	</form>
		<?php endif; ?>

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>Build a Better Community!</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	function confirmMatch(){
		var p1 = $('#password').val(),
		    p2 = $('#password2').val();
		if( p1 !== p2 ){
			e.preventDefault();
			$('#message_bar').html('THE PASSWORDS DO NOT MATCH! TRY AGAIN!');
			return false;
		} // end if
	} // end function
	/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
		(function() {
			var deviceAgent = navigator.userAgent.toLowerCase(),
			    agentID = deviceAgent.match(/(iphone|ipod|ipad)/),
			    cookies = false;

			if( $.cookie('user_name') != undefined){
				cookies = true;
				$('#email_a').val( $.cookie('user_name') );
			} // end if

			if( $.cookie('password') != undefined){
				cookies = true;
				$('#password_a').val( $.cookie('password') );
			} // end if

			if( $.cookie('user_name') != undefined && $.cookie('password') != undefined ){
				cookies = true;
				$('#remember').val('on');
			} // end if

			$('#frmLogin').submit( function(e){
				var remember = $('#remember').val();
				if(remember == 'on'){
					$.cookie('user_name', $('#email_a').val(), { expires: 30, path: '/' } );
					$.cookie('password', $('#password_a').val(), { expires: 30, path: '/' } );
				} else {
					$.removeCookie('user_name', { path: '/' } );
					$.removeCookie('password', { path: '/' } );
				} // end if
			});
		})(); // end self-invoking anonymous function

</script>

<?php $this->load->view('components/page_tail'); ?>