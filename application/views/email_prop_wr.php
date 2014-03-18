<!DOCTYPE html>
<html>
<head>
	<title>RA Weekly Report</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="581" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:<?= $rsProperty[0]['fntBaseColor']; ?>;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:<?= $rsProperty[0]['fntBaseColor']; ?>;padding:10px 0 10px 0;font-size:18px;font-weight:bold;">
					RA Weekly Report
					</td>
				</tr>
				<tr>
					<td style="color:#808080; font-size:11px; text-transform:uppercase; text-align:left;"><?= date('F d, Y'); ?></td>
				</tr>
				<tr>
					<td>
						<table width="100%" border="0" align="center">
							<tr>
								<td style="width:40%;text-align: right;">Staff Name:</td>
								<td style="width:60%;text-align: left;"><b><?= $raName; ?></b></td>
							</tr>
							<tr>
								<td style="width:40%;text-align: right;">Location:</td>
								<td style="width:60%;text-align: left;"><b><?= $location; ?></b></td>
							</tr>
							<tr>
								<td style="width:40%;text-align: right;">Report Week <b><?= $week_num; ?></b>:</td>
								<td style="width:60%;text-align: left;"><b><?= $week_mon; ?> through <?= $week_sun; ?></b></td>
							</tr>
							<tr><td colspan="2">&nbsp;</td></tr>
							<tr>
								<td colspan="2"><b>Do you have any concerns you would like to address?  If yes, what are the concerns?</b><br><?= $concerns; ?></td>
							</tr>
							<tr>
								<td colspan="2"><b>Would like to make an appointment with any professional staff?  If so, who?</b><br><?= $appointment; ?></td>
							</tr>
							<tr>
								<td colspan="2"><b>Do you feel like work is being evenly distributed among staff?  Explain.</b><br><?= $distribution; ?></td>
							</tr>
							<tr>
								<td colspan="2"><b>Are you aware of any maintenance issues? If so, what?</b><br><?= $maintenance; ?></td>
							</tr>
							<tr>
								<td colspan="2"><b>Please describe the morale/relations amongst the staff.</b><br><?= $morale; ?></td>
							</tr>
							<tr>
								<td colspan="2"><b>How have you built community on your block/floor/hall this week?</b><br><?= $community; ?></td>
							</tr>
							<tr>
								<td colspan="2"><b>Are there any resident concerns that you are aware of this week? Include mediations/roommate conflicts.</b><br><?= $resident_concerns; ?></td>
							</tr>
							<tr>
								<td colspan="2"><b>Additional Comments/Concerns.</b><br><?= $additional; ?></td>
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