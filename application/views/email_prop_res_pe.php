<!DOCTYPE html>
<html>
<head>
	<title>Program Evaluation Submission</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="581" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:<?= $rsProperty[0]['fntBaseColor']; ?>;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:<?= $rsProperty[0]['fntBaseColor']; ?>;padding:10px 0 10px 0;font-size:18px;font-weight:bold;">
					Program Evaluation Submission
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
								<td style="width:50%;text-align: left;"><b><?= $raFName . ' ' . $raLName; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Title of Program:</td>
								<td style="width:50%;text-align: left;"><b><?= $program_title; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Date and Time of Program:</td>
								<td style="width:50%;text-align: left;">
									<b><?= $program_datetime; ?></b>
								</td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Location of Program:</td>
								<td style="width:50%;text-align: left;"><b><?= $program_location; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Presenter:</td>
								<td style="width:50%;text-align: left;">
									<?php if($had_presenter == "no"): ?>
										<b>There was no presenter.</b>
									<?php else: ?>
										<b><?= $presenter; ?></b>
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Type of Program:</td>
								<td style="width:50%;text-align: left;"><b><?= $program_type; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Intended Audience:</td>
								<td style="width:50%;text-align: left;"><b><?= $audience; ?></b></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: right;">Number in Attendance:</td>
								<td style="width:50%;text-align: left;"><b><?= $number_audience; ?></b></td>
							</tr>
							<tr>
								<td colspan="2">
									<span style="font:bold 11px sans-serif;">Do you think that the marketing and advertising was effective? How could you improve for next time?</span>
									<br><?= $marketing; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<span style="font:bold 11px sans-serif;">Describe your program (content, audience participation, etc).</span>
									<br><?= $description; ?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<span style="font:bold 11px sans-serif;">Evaluate your program and give suggestions for improvement.</span>
									<br><?= $evaluation; ?>
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