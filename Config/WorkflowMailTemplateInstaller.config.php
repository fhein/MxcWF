<?php
return [
    'sMxcWorkflowNotification' => [
        'name' => 'sMxcWorkflowNotification',
        'type' => 1,
        'is_html' => true,
        'from_mail' => '{config name=mail}',
        'from_name' => '{config name=shopName}',
        'subject' => 'maxence Workflow Status',
        'content_text' => '',
        'content_html' => '<!DOCTYPE HTML>
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<!-- Define Charset -->
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			<!-- Responsive Meta Tag -->
			<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
			<style type="text/css">body{	width: 100%;	background-color: #ffffff;	margin:0;	padding:0;	-webkit-font-smoothing: antialiased;	}	p,h1,h2,h3,h4{	margin-top:0;	margin-bottom:0;	padding-top:0;	padding-bottom:0;	}	span.preheader{	display: none; font-size: 1px;}	html{	width: 100%;	}	table{	font-size: 14px;	border: 0;	}	td{	color: #808080;	}	td.main-header{	color: #5d6775;	}	/* ----------- responsivity ----------- */	@media only screen and (max-width: 640px){	/*------ top header ------ */	.header-bg{	width: 440px !important; height: auto !important;}	.rounded-edg-bg{	width: 420px !important; height: 5px !important;}	.main-header{	line-height: 28px !important;}	.main-subheader{	line-height: 28px !important;}	/*--------logo-----------*/	.logo{	width: 400px !important;}	/*----- main image -------*/	.main-image{	width: 400px !important; height: auto !important;}	.main-text-container{	width: 340px !important; height: auto !important;}	/*-------- container --------*/	.container600{	width: 440px !important;}	.container580{	width: 420px !important;}	.container560{	width: 400px !important;}	.container540{	width: 380px !important;}	.main-content{	width: 418px !important;}	/*-------- secions ----------*/	.section-item{	width: 380px !important;}	.section-img{	width: 380px !important; height: auto !important;}	.order--article-container{	width: 250px !important;float:none;margin: 0 auto;}	.article--content{	margin-left:30px;}	.order--article-title{	text-align: center;}	}	@media only screen and (max-width: 479px){	/*------ top header ------ */	.header-bg{	width: 280px !important; height: auto !important;}	.rounded-edg-bg{	width: 260px !important; height: 5px !important;}	.main-header{	font-size: 24px !important; line-height: 28px !important;}	.main-subheader{	line-height: 28px !important;}	/*--------logo-----------*/	.logo{	width: 240px !important;}	/*----- main image -------*/	.main-image{	width: 240px !important; height: auto !important;}	.main-text-container{	width: 180px !important;}	/*-------- container --------*/	.container600{	width: 280px !important;}	.container580{	width: 260px !important;}	.container560{	width: 240px !important;}	.container540{	width: 220px !important;}	.main-content{	width: 258px !important;}	/*-------- secions ----------*/	.section-item{	width: 220px !important;}	.section-img{	width: 220px !important; height: auto !important;}	.section-title{	line-height: 28px !important; font-size: 16px !important;}	.order--article-container{	width: 180px !important;float:none;margin: 0 auto;}	.article--content{	margin-left:0;}	.article--text-left{	width: 60px;}	.article--text-right{	width: 120px;}	.article--text-inner{	float:right;}	/*-------- footer ----------*/	.footer{	width: 280px !important;}	}</style>
		</head>
		<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
			<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
				<tr>
					<td align="center">
						<table border="0" align="center" width="600" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="container600">
							<tr>
								<td height="40"/>
							</tr>
							<tr>
								<td align="center">
									<table border="0" width="560" align="center" cellpadding="0" cellspacing="0" class="container560">
										<tr>
											<td>
												<table border="0" align="center" cellpadding="0" cellspacing="0">
													<tr>
														<td align="center">
															<a href="{$sShopURL}" style="display: block; border-style: none !important; border: 0 !important;">
																<img editable="true" mc:edit="logo" height="150" width="inherit" border="0" style="display: block;" src="https://vapee.de/media/image/f1/b3/00/vapee-logo-500x480.png" alt="logo"/>
															</a>
														</td>
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
				<tr>
					<td>
						<table border="0" align="center" width="600" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="container600">
							<tr>
								<td>
									<table border="0" width="240" align="center" cellpadding="0" cellspacing="0" class="container">
										<tr>
											<td height="40"/>
										</tr>
										<tr>
											<td align="center">
												<img src="https://www.vapee.de/custom/plugins/MxcDropship/Resources/images/divider.png" editable="true" width="240" height="4" style="display: block;" alt="divider"/>
											</td>
										</tr>
										<tr>
											<td height="40"/>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table border="0" align="center" width="600" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="container600">
							<tr>
								<td>
									<table border="0" align="center" width="580" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="container580">
										<tr>
											<td>
												<table border="0" align="center" width="578" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="main-content">
													<repeater>
														<layout label="main-section">
															<tr>
																<td>
																	<table border="0" align="center" width="560" cellpadding="0" cellspacing="0" class="container560">
																		<tr>
																			<td align="center" mc:edit="title1" style="font-size: 28px; font-family: Helvetica, Arial, sans-serif;" class="main-header">
																				<multiline>{$mailTitle}</multiline>
																			</td>
																		</tr>
																		<tr>
																			<td height="20"/>
																		</tr>
																		<tr>
																			<td align="center" mc:edit="subtitle1" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																				<multiline>Liebes Team von {config name=shopName},</multiline>
																			</td>
																		</tr>
																		<tr>
																			<td height="20"/>
																		</tr>
																		<tr>
																			<td align="center" mc:edit="subtitle1" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																				<multiline>{$mailBody}</multiline>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<table border="0" width="240" align="center" cellpadding="0" cellspacing="0" class="container">
																					<tr>
																						<td height="40"/>
																					</tr>
																					<tr>
																						<td align="center">
																							<img src="https://www.vapee.de/custom/plugins/MxcDropship/Resources/images/divider.png" editable="true" width="240" height="4" style="display: block;" alt="divider"/>
																						</td>
																					</tr>
																					<tr>
																						<td height="40"/>
																					</tr>
																				</table>
																			</td>
																		</tr>{if $shippingaddress}<tr>
																			<td align="center" mc:edit="title1" style="font-size: 28px; font-family: Helvetica, Arial, sans-serif;" class="main-header">
																				<multiline>Lieferadresse</multiline>
																			</td>
																		</tr>
																		<tr>
																			<td height="20"/>
																		</tr>
																		<tr>
																			<td align="center" mc:edit="subtitle1" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																				<multiline>{if $shippingaddress.company}	{$shippingaddress.company}<br/>{/if}	{if $shippingaddress.department}	{$shippingaddress.department}<br/>{/if}	{$shippingaddress.firstname} {$shippingaddress.lastname}<br/>{$shippingaddress.street}<br/>{$shippingaddress.zipcode} {$shippingaddress.city}<br/>{$additional.countryShipping.countryname}<br/>
																				</multiline>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<table border="0" width="240" align="center" cellpadding="0" cellspacing="0" class="container">
																					<tr>
																						<td height="40"/>
																					</tr>
																					<tr>
																						<td align="center">
																							<img src="https://www.vapee.de/custom/plugins/MxcDropship/Resources/images/divider.png" editable="true" width="240" height="4" style="display: block;" alt="divider"/>
																						</td>
																					</tr>
																					<tr>
																						<td height="40"/>
																					</tr>
																				</table>
																			</td>
																		</tr>{/if}	
																		{if $errors}
																		<tr>
																			<td align="center" mc:edit="title1" style="font-size: 28px; font-family: Helvetica, Arial, sans-serif;" class="main-header">
																				<multiline>Fehler</multiline>
																			</td>
																		</tr>{foreach item=error key=position from=$errors}<tr>
																			<td height="20"/>
																		</tr>
																		<tr>
																			<td align="center" mc:edit="subtitle1" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																				<multiline>{$error.message}</multiline>
																			</td>
																		</tr>{/foreach}<tr>
																			<td>
																				<table border="0" width="240" align="center" cellpadding="0" cellspacing="0" class="container">
																					<tr>
																						<td height="40"/>
																					</tr>
																					<tr>
																						<td align="center">
																							<img src="https://www.vapee.de/custom/plugins/MxcDropship/Resources/images/divider.png" editable="true" width="240" height="4" style="display: block;" alt="divider"/>
																						</td>
																					</tr>
																					<tr>
																						<td height="40"/>
																					</tr>
																				</table>
																			</td>
																		</tr>
																		{/if}
																		{if $trackings}
																		<tr>
																			<td align="center" mc:edit="title1" style="font-size: 28px; font-family: Helvetica, Arial, sans-serif;" class="main-header">
																				<multiline>Tracking Informationen</multiline>
																			</td>
																		</tr>{foreach item=info key=position from=$trackings}<tr>
																			<td height="20"/>
																		</tr>
																		<tr>
																			<td align="center" mc:edit="subtitle1" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																				<multiline>
																					Versand mit {$info.carrier}: {$info.trackingLink}
																				</multiline>
																			</td>
																		</tr>{/foreach}<tr>
																			<td>
																				<table border="0" width="240" align="center" cellpadding="0" cellspacing="0" class="container">
																					<tr>
																						<td height="40"/>
																					</tr>
																					<tr>
																						<td align="center">
																							<img src="https://www.vapee.de/custom/plugins/MxcDropship/Resources/images/divider.png" editable="true" width="240" height="4" style="display: block;" alt="divider"/>
																						</td>
																					</tr>
																					<tr>
																						<td height="40"/>
																					</tr>
																				</table>
																			</td>
																		</tr>
																		{/if}
																		{if $revenue}
																		<tr>
																			<td align="center" mc:edit="title1" style="font-size: 28px; font-family: Helvetica, Arial, sans-serif;" class="main-header">
																				<multiline>Marge-Berechnung</multiline>
																			</td>
																		</tr>
																		<tr>
																			<td height="20"/>
																		</tr>
																		<tr>
																			<td align="center" mc:edit="subtitle1" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																				<multiline>
																					Rechnungsbetrag brutto: € {$revenue.amountInvoiced}<br/>
																					{if $revenue.paypalCost}
																					Paypal Gebühren: € {$revenue.paypalCost}<br/>
																					Einnahme brutto: € {$revenue.amountReceived}<br/>
																					{/if}
																					<strong>Einnahme netto: € {$revenue.amountReceivedNet}</strong>
																				</multiline>
																			</td>
																		</tr>
     																	<tr>
																			<td height="20"/>
																		</tr>
																	    <tr>
																			<td align="center" mc:edit="subtitle1" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																				<multiline>
																					Einkauf Produkte netto: € {$revenue.productCost}<br/>
																					Versand netto: € {$revenue.shippingCost}<br/>
																					<strong>Gesamtkosten netto: € {$revenue.totalCost}</strong>
																				</multiline>
																			</td>
																		</tr>
     																	<tr>
																			<td height="20"/>
																		</tr>
																	    <tr>
																			<td align="center" mc:edit="subtitle1" style="font-size: 15px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																				<multiline>
																			
																					Erlös netto: € {$revenue.revenue}<br/>
																					<strong>Marge: {$revenue.margin} %</strong>
																				</multiline>
																			</td>
																		</tr>
																		<tr>
																			<td>
																				<table border="0" width="240" align="center" cellpadding="0" cellspacing="0" class="container">
																					<tr>
																						<td height="40"/>
																					</tr>
																					<tr>
																						<td align="center">
																							<img src="https://www.vapee.de/custom/plugins/MxcDropship/Resources/images/divider.png" editable="true" width="240" height="4" style="display: block;" alt="divider"/>
																						</td>
																					</tr>
																					<tr>
																						<td height="40"/>
																					</tr>
																				</table>
																			</td>
																		</tr>
																		{/if}

																	</table>
																</td>
															</tr>
														</repeater>
														<tr>
															<td align="center" mc:edit="subtitle1" style="font-size: 10px; font-family: Helvetica, Arial, sans-serif;" class="main-subheader">
																	<multiline>
																		&copy; 2019 - {$smarty.now|date_format:"%Y"} <a href="http://www.maxence.de/">maxence business consulting gmbh</a><br/>All rights reserved.
																		</multiline>
																</td>
															</tr>
															<tr>
																<td height="30"/>
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
						<tr>
							<td height="40"/>
						</tr>
					</table>
				</body>
			</html>',
    ],
];
