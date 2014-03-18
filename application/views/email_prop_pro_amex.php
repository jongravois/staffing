<!DOCTYPE html>
<html>
<head>
	<title>AmEx Credit Card Request</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="581" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:<?= $rsProperty[0]['fntBaseColor']; ?>;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:<?= $rsProperty[0]['fntBaseColor']; ?>;padding:10px 0 10px 0;font-size:18px;font-weight:bold;">
					AmEx Credit Card Request
					</td>
				</tr>
				<tr>
					<td style="color:#808080; font-size:11px; text-transform:uppercase; text-align:left;"><?= date('F d, Y'); ?></td>
				</tr>
				<tr>
					<td>
						<table width="100%" border="0" align="center">
							<tr>
								<td style="width:50%;text-align: right;">Name:</td>
								<td style="width:50%;text-align: left;"><b><?= $sName; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Date Needed:</td>
								<td style="width:50%;text-align: left;"><b><?= $date_needed; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Place of Purchase:</td>
								<td style="width:50%;text-align: left;"><b><?= $location; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Business Reason:</td>
								<td style="width:50%;text-align: left;"><b><?= $purpose; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Approximate Total Expense:</td>
								<td style="width:50%;text-align: left;"><b><?= $expense; ?></b></td>
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