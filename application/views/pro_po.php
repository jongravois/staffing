<?php $this->load->view('components/page_head'); ?>

<div data-role="page" data-add-back-btn="true">

	<div data-role="header">
		<h1><?= $username; ?></h1>
		<a href="<?= site_url('staff/proforms'); ?>" data-icon="arrow-l">FORMS</a>
	</div><!-- /header -->

	<div data-role="content">  
		<div class="jqm-home-welcome">
			<h2>PURCHASE ORDER REQUEST</h2>
		</div>
		<?= form_open('staff/pro_po_handler'); ?>

		<?php if( $form[0]->cust_top && $form[0]->cust_top != '' ): ?>
			<div data-role="fieldcontain" class="jqm-intro">
				<?= $form[0]->cust_top; ?>
			</div>
			<br><br>
		<?php endif; ?>

		<div data-role="fieldcontain">
			<label for="raFName">First Name:</label>
			<input type="text" id="raFName" name="raFName" value="<?= $user[0]->firstName; ?>" />
		</div>
		
		<div data-role="fieldcontain">
			<label for="raLName">Last Name:</label>
			<input type="text" id="raLName" name="raLName" value="<?= $user[0]->lastName; ?>" />
		</div>
		
		<div data-role="fieldcontain">	
			<label for="email">Your Email:</label>
			<input type="text" id="email" name="email" value="<?= $user[0]->staffEmail; ?>" />
		</div>

		<div data-role="fieldcontain">
			<label for="location" class="select">Location:</label>
			<select id="location" name="location">
				<option>Please select ...</option>
				<?php foreach($locations as $loc): ?>
					<option value="<?= $loc->id; ?>"><?= $loc->location; ?></options>
				<?php endforeach; ?>
			</select>
		</div>
		
		<div data-role="fieldcontain">
			<label for="vendor">Vendor/Store/Location:</label>
			<input type="text" id="vendor" name="vendor" value="" />
		</div>

		<div>
			<table width="100%" cellspacing="0" cellpadding="0" border="1">
				<tr>
					<th style="width:55%;">Item(detailed description)</th>
					<th style="width:15%;">Quantity</th>
					<th style="width:15%;">Unit Price</th>
					<th style="width:15%;">Total</th>
				</tr>
				<?php for($r=1; $r<9; $r++): ?>
					<tr class="itemRow">
						<td>
							<textarea name="i<?= $r; ?>-desc"></textarea>
						</td>
						<td class="qty">
							<input type="text" id="i<?= $r; ?>-quantity" name="i<?= $r; ?>-quantity" value="0" />
						</td>
						<td class="price">
							<input type="text" name="i<?= $r; ?>-unit-price" value="0.00" />
						</td>
						<td class="line_total">
							<input type="text" name="i<?= $r; ?>-total" id="i<?= $r; ?>-total" class="inTotal" value="0.00" disabled="disabled" />
						</td>
					</tr>
				<?php endfor; ?>
				<tr style="background-color:#333;height:5px;font-size:0px;">
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td align="center"> --- </td>
					<td align="center">
						<input type="text" id="numberItems" name="numberItems" value="0" />
					</td>
					<td align="center"> --- </td>
					<td align="center">
						<input type="text" id="totalPrice" name="totalPrice" value="0.00" disabled="disabled" />
					</td>
				</tr>
			</table>
		</div>

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
		<?= form_close(); ?>

	</div><!-- /content -->
	<div data-role="footer" class="footer-docs" data-position="fixed">
	    <h4><em>iSTAFF</em></h4>
	</div><!-- /footer -->
</div><!-- /page -->

<script type="text/javascript">
	(function() {
		$('.price').on('blur', 'input', function(e){
			var thisQ = $(this).closest('tr').find('.qty input').val();
			var thisP = $(this).val();
			var thisT = parseFloat(thisQ) * parseFloat(thisP);
			$(this).closest('tr').find('.inTotal').val( parseFloat(thisT).toFixed(2));

			running_total();
		});
	})(); // end self-invoking anonymous function

	function running_total(){
		var n1 = $('#i1-quantity').val();
		var n2 = $('#i2-quantity').val();
		var n3 = $('#i3-quantity').val();
		var n4 = $('#i4-quantity').val();
		var n5 = $('#i5-quantity').val();
		var n6 = $('#i6-quantity').val();
		var n7 = $('#i7-quantity').val();
		var n8 = $('#i8-quantity').val();

		var rCnt = parseFloat(n1)+parseFloat(n2)+parseFloat(n3)+parseFloat(n4)+parseFloat(n5)+parseFloat(n6)+parseFloat(n7)+parseFloat(n8);
		$('#numberItems').val( parseFloat(rCnt) );

		var t1 = $('#i1-total').val();
		var t2 = $('#i2-total').val();
		var t3 = $('#i3-total').val();
		var t4 = $('#i4-total').val();
		var t5 = $('#i5-total').val();
		var t6 = $('#i6-total').val();
		var t7 = $('#i7-total').val();
		var t8 = $('#i8-total').val();

		var rTot = parseFloat(t1)+parseFloat(t2)+parseFloat(t3)+parseFloat(t4)+parseFloat(t5)+parseFloat(t6)+parseFloat(t7)+parseFloat(t8);
		$('#totalPrice').val( parseFloat(rTot).toFixed(2) );
	} // end function
</script>

<?php $this->load->view('components/page_tail'); ?>