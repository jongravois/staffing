<!DOCTYPE html>
<html>
<head>
	<title>RA Paid Shift Submission</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="581" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:<?= $rsProperty[0]['fntBaseColor']; ?>;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:<?= $rsProperty[0]['fntBaseColor']; ?>;padding:10px 0 10px 0;font-size:18px;font-weight:bold;">
					RA Paid Shift Form Submission
					</td>
				</tr>
				<tr>
					<td style="color:#808080; font-size:11px; text-transform:uppercase; text-align:left;"><?= date('F d, Y'); ?></td>
				</tr>
				<tr>
					<td>
						<table width="100%" border="0" align="center">
							<tr>
								<td style="width:30%;text-align: right;">RA First Name:</td>
								<td style="width:70%;text-align: left;"><b><?= $raFName; ?></b></td>
							</tr>
							<tr>
								<td style="width:30%;text-align: right;">RA Last Name:</td>
								<td style="width:70%;text-align: left;"><b><?= $raLName; ?></b></td>
							</tr>
							<tr>
								<td style="width:30%;text-align: right;">Shift Location:</td>
								<td style="width:70%;text-align: left;"><b><?= $location; ?></b></td>
							</tr>
							<tr>
								<td style="width:30%;text-align: right;">Shift Date:</td>
								<td style="width:70%;text-align: left;"><b><?= date('l, F j, Y',strtotime($shift_date)); ?></b></td>
							</tr>
							<tr>
								<td style="width:30%;text-align: right;">Shift Start Time:</td>
								<td style="width:70%;text-align: left;"><b><?= date('h:i A', strtotime($shift_time_start)); ?></b></td>
							</tr>
							<tr>
								 <td style="width:30%;text-align: right;">Shift Duration:</td>
								 <td style="width:70%;text-align: left;"><b><?= $shift_duration; ?></b></td>
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