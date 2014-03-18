<!DOCTYPE html>
<html>
<head>
	<title>Leave Request Form Submission</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="581" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:<?= $rsProperty[0]['fntBaseColor']; ?>;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:<?= $rsProperty[0]['fntBaseColor']; ?>;padding:10px 0 10px 0;font-size:18px;font-weight:bold;">
					Leave Request Form Submission
					</td>
				</tr>
				<tr>
					<td style="color:#808080; font-size:11px; text-transform:uppercase; text-align:left;"><?= date('F d, Y'); ?></td>
				</tr>
				<tr>
					<td>
						<table width="100%" border="0" align="center">
							<tr>
								<td style="width:50%;text-align: right;">First Name:</td>
								<td style="width:50%;text-align: left;"><b><?= $fName; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Last Name:</td>
								<td style="width:50%;text-align: left;"><b><?= $lName; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Email:</td>
								<td style="width:50%;text-align: left;"><b><?= $email; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Location:</td>
								<td style="width:50%;text-align: left;"><b><?= $location; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Leave Requested:</td>
								<td style="width:50%;text-align: left;">
									from:&nbsp;<b><?= date('F d, Y g:i A', strtotime($off_time_start)); ?></b>
									<br>
									to:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?= date('F d, Y g:i A', strtotime($off_time_end)); ?></b>
								</td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Reason for Request:</td>
								<td style="width:50%;text-align: left;"><b><?= $reason; ?></b></td>
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