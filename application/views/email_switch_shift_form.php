<?php  
	$from_datetime = strtotime($aF[0]->assignment_date . ' ' . $aF[0]->start);
	$to_datetime = strtotime($aT[0]->assignment_date . ' ' . $aT[0]->start);
?><!DOCTYPE html>
<html>
<head>
	<title>Switch Shift Form</title>
</head>
<body style="padding:0; margin:0; background:#fefefe;font-family: sans-serif;">

<table width="100%" border="0" cellspacing="0" cellpadding="5" bgcolor="#fefefe">
	<tr>
		<td align="center" valign="top">
			<table width="581" cellspacing="10" cellpadding="0">
				<tr>
					<td style="text-align:center;border-top-width:3px;border-top-style:solid;border-top-color:#404040;border-bottom-width:3px;border-bottom-style:solid;border-bottom-color:#404040;padding:10px 0 10px 0;font-size:18px;font-weight:bold;">
					Switch Shift Form
					</td>
				</tr>
				<tr>
					<td style="color:#808080; font-size:11px; text-transform:uppercase; text-align:left;"><?= date('F d, Y'); ?></td>
				</tr>
				<tr>
					<td>
						<table width="100%" border="0" align="center">
							<tr><td colspan="3">
								<b>This form is to be completed and submitted to the Residence Life Coordinator three (3) days prior to the on-call shift or desk shift switch. It is it not three (3) days prior you will need to contact your direct RLC Supervisor and get the switch approved prior to the RA/CA on-call or desk shift switch is taking place.<br><br>To allow the swap, click "APPROVE" below. To deny the swap, click "DENY" below.</b><br><br>
							</td></tr>
							<tr><td colspan="3">
								<p style="color: #009;">
									<b><?= $aF[0]->fname . ' ' . $aF[0]->lname; ?></b> is switching an assignment on <b><?= date('M j, Y', $from_datetime); ?></b> at <b><?= $aF[0]->location; ?></b> with <b><?= $aT[0]->fname . ' ' . $aT[0]->lname; ?></b> for the assignment on <b><?= date('M j, Y', $to_datetime); ?></b> at <b><?= $aT[0]->location; ?></b>.
								</p>
							</td></tr>
							<tr><td colspan="3">&nbsp;</td></tr>
							<tr><td colspan="3"><b>SUMMARY</b></td></tr>
							<tr style="background-color:#404040; color:#FFF;">
								<td style="20%">&nbsp;</td>
								<td style="width:40%;text-align:center;">
									<b>REQUESTOR</b>
								</td>
								<td style="width:40%;text-align:center;">
									<b>YOUR INFO</b>
								</td>
							</tr>
							<tr>
								<td>NAME</td>
								<td><b><?= $aF[0]->fname . ' ' . $aF[0]->lname; ?></b></td>
								<td><b><?= $aT[0]->fname . ' ' . $aT[0]->lname; ?></b></td>
							</tr>
							<tr>
								<td>DAY</td>
								<td><b><?= date('l', $from_datetime); ?></b></td>
								<td><b><?= date('l', $to_datetime); ?></b></td>
							</tr>
							<tr>
								<td>DATE</td>
								<td><b><?= date('M j, Y', $from_datetime); ?></b></td>
								<td><b><?= date('M j, Y', $to_datetime); ?></b></td>
							</tr>
							<tr>
								<td>START</td>
								<td><b><?= date('g:i A', $from_datetime); ?></b></td>
								<td><b><?= date('g:i A', $to_datetime); ?></b></td>
							</tr>
							<tr>
								<td>END</td>
								<td>
									<b>
									<?= date('g:i A', strtotime($this->prop_m->return_end_time($aF[0]->assignment_date, $aF[0]->start, $aF[0]->duration))); ?>
									</b>
								</td>
								<td>
									<b>
										<?= date('g:i A', strtotime($this->prop_m->return_end_time($aT[0]->assignment_date, $aT[0]->start, $aT[0]->duration))); ?>
									</b>
								</td>
							</tr>
							<tr>
								<td>DURATION</td>
								<td><b><?= $aF[0]->duration; ?> hours</b></td>
								<td><b><?= $aT[0]->duration; ?> hours</b></td>
							</tr>
							<tr>
								<td>LOCATION</td>
								<td><b><?= $aF[0]->location; ?></b></td>
								<td><b><?= $aT[0]->location; ?></b></td>
							</tr>
							<tr><td colspan="3">&nbsp;</td></tr>
							<tr>
								<td colspan="3">
									<b>Please click one of the choices below:</b>
								</td>
							</tr>
							<tr><td colspan="3">&nbsp;</td></tr>
							<tr>
								<td>&nbsp;</td>
								<td align="center">
									<a href="<?= $istaffURL . 'jax/swap_approve/' . $aF[0]->id . '/' . $aT[0]->id; ?>">APPROVE</a>
								</td>
								<td align="center">
									<a href="<?= $istaffURL . 'jax/swap_deny/' . $aF[0]->id . '/' . $aT[0]->id; ?>">DENY</a>
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