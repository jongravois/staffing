<!DOCTYPE html>
<html>
<head>
	<title>Activity Log Submission</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">
	
<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="800" cellspacing="10" cellpadding="0" style="color:#404040;">
				<tr>
					<td colspan="4" style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:#404040;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:#404040;padding:10px 0 10px 0;font-size:32px;font-weight:bold;">
					RESIDENT STAFF ACTIVITY LOG
					</td>
				</tr>
				<tr>
					<td style="width:50%;" colspan="2"><?= date('F d, Y'); ?></td>
					<td style="width:50%;" colspan="2"><b><?= $raFName . ' ' . $raLName; ?></b></td>
				</tr>
				<tr style="background-color:#dadada;">
					<td style="text-align:center;" colspan="4"><b>Resident Contact (Phone and/or Door to Door):</b></td>
				</tr>

				<tr style="font-size:11px;">
					<td style="width:25%;">Name/Apt</td>
					<td style="width:25%;">Personal Interaction</td>
					<td style="width:25%;">Updated Contact Info</td>
					<td style="width:25%;">Work Orders/Questions/Concerns</td>
				</tr>

				<?php
					$cntContacts = count($contacts['name']);
					for( $c=0;$c<$cntContacts;$c++):
				?>
					<tr>
						<td><?= $contacts['name'][$c]; ?></td>
						<td><?= $contacts['interaction'][$c]; ?></td>
						<td><?= $contacts['updated_info'][$c]; ?></td>
						<td><?= $contacts['work_orders'][$c]; ?></td>
					</tr>
				<?php endfor; ?>

				<tr style="background-color:#dadada;">
					<td style="text-align:center;" colspan="4">
						<b>Resident Birthday Cards:</b>
					</td>
				</tr>
				
				<?php
					$cntBCards = count($bcards['name']);
					for( $c=0;$c<$cntBCards;$c++):
				?>
					<tr>
						<td style="font-size:11px;">Date/Name/Apt</td>
						<td><?= $bcards['date'][$c]; ?></td>
						<td><?= $bcards['name'][$c]; ?></td>
						<td><?= $bcards['apt'][$c]; ?></td>
					</tr>
				<?php endfor; ?>

				<tr style="background-color:#dadada;">
					<td style="text-align:center;" colspan="4">
						<b>Building Inspections:</b>
					</td>
				</tr>
				<tr>
					<td style="width:25%; font-size:11px;">Common Areas</td>
					<td style="text-align:left;" colspan="3"><b><?= $common_areas; ?></b></td>
				</tr>
				<tr>
					<td style="font-size:11px;">Signage</td>
					<td style="text-align:left;" colspan="3"><b><?= $signage; ?></b></td>
				</tr>
				<tr>
					<td style="font-size:11px;">Lights</td>
					<td style="text-align:left;" colspan="3"><b><?= $lights; ?></b></td>
				</tr>
				<tr>
					<td style="font-size:11px;">Fire Equipment</td>
					<td style="text-align:left;" colspan="3"><b><?= $fire_equipment; ?></b></td>
				</tr>
				<tr>
					<td style="font-size:11px;">Damage</td>
					<td style="text-align:left;" colspan="3"><b><?= $damage; ?></b></td>
				</tr>
				<tr>
					<td style="font-size:11px;">Lease Violations</td>
					<td style="text-align:left;" colspan="3"><b><?= $lease_violations; ?></b></td>
				</tr>
				<tr>
					<td style="font-size:11px;">Landscaping/Curb Appeal</td>
					<td style="text-align:left;" colspan="3"><b><?= $landscaping; ?></b></td>
				</tr>

				<tr style="background-color:#dadada;">
					<td style="text-align:center;" colspan="4">
						<b>Grace Hill Training:</b>
					</td>
				</tr>

				<?php
					$cntGHill = count($ghill['section']);
					for( $c=0;$c<$cntGHill;$c++):
				?>
					<tr>
						<td style="font-size:11px;">Sections Due Completed:</td>
						<td colspan="3"><?= $ghill['section'][$c]; ?></td>
					</tr>
				<?php endfor; ?>

				<tr style="background-color:#dadada;">
					<td style="text-align:center;" colspan="4">
						<b>Community Development:</b>
					</td>
				</tr>

				<?php
					$cntCDev = count($cdev['plan']);
					for( $c=0;$c<$cntCDev;$c++):
				?>
					<tr>
						<td style="font-size:11px;">Resident Event Planning:</td>
						<td colspan="3"><?= $cdev['plan'][$c]; ?></td>
					</tr>
				<?php endfor; ?>

				<tr style="background-color:#dadada;">
					<td style="text-align:center;" colspan="4">
						<b>Suggestions/Feedback</b> <span style="font-size:12px;">(ideas, events, issues, or problems)</span>:
					</td>
				</tr>
				<tr>
					<td colspan="4"><b><?= $feedback; ?></b></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>