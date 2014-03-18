<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order Request</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="581" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:<?= $rsProperty[0]['fntBaseColor']; ?>;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:<?= $rsProperty[0]['fntBaseColor']; ?>;padding:10px 0 10px 0;font-size:18px;font-weight:bold;">
					Purchase Order Request Form
					</td>
				</tr>
				<tr>
					<td style="color:#808080; font-size:11px; text-transform:uppercase; text-align:left;"><?= date('F d, Y'); ?></td>
				</tr>
				<tr>
					<td>
						<table width="100%" border="0" align="center">
							<tr>
								<td style="width:20%;text-align: right;">Location:</td>
								<td style="width:80%;text-align: left;"><b><?= $location; ?></b></td>
							</tr>
							<tr>
								<td style="width:20%;text-align: right;">Requestor:</td>
								<td style="width:80%;text-align: left;"><b><?= $fname . " " . $lname; ?></b></td>
							</tr>
							<tr>
								<td style="width:20%;text-align: right;">Vendor/Store/Location:</td>
								<td style="width:80%;text-align: left;"><b><?= $vendor; ?></b></td>
							</tr>
							<tr>
								<td colspan="2">
									<table width="100%" cellspacing="0" cellpadding="0" border="1">
										<tr>
											<th style="width:55%;">Item(detailed description)</th>
											<th style="width:15%;">Quantity</th>
											<th style="width:15%;">Unit Price</th>
											<th style="width:15%;">Total</th>
										</tr>
										<tr class="itemRow">
											<td><?= $i1desc; ?></td>
											<td align="center"><?= $i1quantity; ?></td>
											<td align="center"><?= $i1unitprice; ?></td>
											<td align="right"><?= number_format($i1total,2,'.',','); ?></td>
										</tr>
										<tr class="itemRow">
											<td><?= $i2desc; ?></td>
											<td align="center"><?= $i2quantity; ?></td>
											<td align="center"><?= $i2unitprice; ?></td>
											<td align="right"><?= number_format($i2total,2,'.',','); ?></td>
										</tr>
										<tr class="itemRow">
											<td><?= $i3desc; ?></td>
											<td align="center"><?= $i3quantity; ?></td>
											<td align="center"><?= $i3unitprice; ?></td>
											<td align="right"><?= number_format($i3total,2,'.',','); ?></td>
										</tr>
										<tr class="itemRow">
											<td><?= $i4desc; ?></td>
											<td align="center"><?= $i4quantity; ?></td>
											<td align="center"><?= $i4unitprice; ?></td>
											<td align="right"><?= number_format($i4total,2,'.',','); ?></td>
										</tr>
										<tr class="itemRow">
											<td><?= $i5desc; ?></td>
											<td align="center"><?= $i5quantity; ?></td>
											<td align="center"><?= $i5unitprice; ?></td>
											<td align="right"><?= number_format($i5total,2,'.',','); ?></td>
										</tr>
										<tr class="itemRow">
											<td><?= $i6desc; ?></td>
											<td align="center"><?= $i6quantity; ?></td>
											<td align="center"><?= $i6unitprice; ?></td>
											<td align="right"><?= number_format($i6total,2,'.',','); ?></td>
										</tr>
										<tr class="itemRow">
											<td><?= $i7desc; ?></td>
											<td align="center"><?= $i7quantity; ?></td>
											<td align="center"><?= $i7unitprice; ?></td>
											<td align="right"><?= number_format($i7total,2,'.',','); ?></td>
										</tr>
										<tr class="itemRow">
											<td><?= $i8desc; ?></td>
											<td align="center"><?= $i8quantity; ?></td>
											<td align="center"><?= $i8unitprice; ?></td>
											<td align="right"><?= number_format($i8total,2,'.',','); ?></td>
										</tr>
										<tr style="background-color:#333;height:5px;font-size:0px;">
											<td colspan="4">&nbsp;</td>
										</tr>
										<tr>
											<td align="center"> --- </td>
											<td align="center"><?= $numberItems; ?> items</td>
											<td align="center"> --- </td>
											<td align="right"><?= number_format($totalPrice,2,'.',','); ?></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>