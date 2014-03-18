<!DOCTYPE html>
<html>
<head>
	<title>Bulletin Board Request</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="581" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:<?= $rsProperty[0]['fntBaseColor']; ?>;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:<?= $rsProperty[0]['fntBaseColor']; ?>;padding:10px 0 10px 0;font-size:18px;font-weight:bold;">
					Bulletin Board Request Form
					</td>
				</tr>
				<tr>
					<td style="color:#808080; font-size:11px; text-transform:uppercase; text-align:left;"><?= date('F d, Y'); ?></td>
				</tr>
				<tr>
					<td>
						<table width="100%" border="0" align="center">
							<tr>
								<td style="width:50%;text-align: right;">Staff Name:</td>
								<td style="width:50%;text-align: left;"><b><?= $raName; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Month for Bulletin Board:</td>
								<td style="width:50%;text-align: left;"><b><?= $display_month; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Location of Bulletin Board:</td>
								<td style="width:50%;text-align: left;"><b><?= $prog_location; ?></b></td>
							</tr>
							<tr>
								<td colspan="2"><b>Bulletin Board Description:</b><br><?= $description; ?></td>
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