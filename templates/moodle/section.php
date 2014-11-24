<?php
include_once '../variables.php';
?>
<!-------->

<table border="0" cellpadding="10" align="center" style="background-color: #fffbd9; margin-top: 20px; width: 100%;">
	<tbody>
		<tr style="background: #58a796;">
			<td style="padding: 10px 20px 10px 20px;">
                        <?php foreach ($singlesection['activities'] as $activity):?>
                            <img src="<?php echo $activity['resource_icon'];?>" class="icon-resource">
                        <?php endforeach;?>                     
                        </td>
		</tr>
		<tr>
			<td style="padding: 10px 20px 10px 20px;">
				<table align="center" style="margin: 15px 15px 25px 25px; width: 90%;">
					<tbody>
						<tr>
							<td style="padding:15px;">
                                                        <?php if (!empty($singlesection['image'])):?>
                                                            <img src="<?php echo $singlesection['image']; ?>" style="max-width:300px; max-height: 400px; float:left; margin: 10px 20px 10px 10px; border: 1px solid #58a796; padding:5px; background:white;">
							<?php endif;?>
							<p class="intro">
                                                            <?php echo $singlesection['intro']; ?>
							</p>
                                                        </td>
						</tr>
					</tbody>
				</table>
				<table align="center" style="margin: 15px 15px 25px 25px; width: 90%; background: #ffffff; border: 1px solid #58a796;">
					<tbody>
						<tr>
							<td class="panel-heading" style="background:#58a796;">
								<h3 align="center" style="text-align: center;"><span style="color: #ffffff;">Activity Procedure:</span></h3>
							</td>
						</tr>
						<tr>
							<td style="background: #ffffff; padding: 20px;">
								<ol class="procedure-steps">
								<?php foreach ($singlesection['activities'] as $activity): ?>
                                                                    <li><p><strong><span style="color:#5a1103;"><?php echo $activity['action_verb'];?></span>
                                                                        
                                                                        <?php if(!empty($activity['resource'])):?>
                                                                            <?php echo ' '.$activity['resource']; ?>
                                                                        <?php endif;?>
                                                                        <?php echo ': ';?>
                                                                            </strong> <?php echo $activity['instruction_step'];?></p>
                                                                    <?php if(!empty($activity['framing_language'])):?>
                                                                        <span style="color:#7c7b7b;"><?php echo $activity['framing_language'];?></span>
                                                                    <?php endif;?>
                                                                    </li>
                                                                <?php endforeach;?>
                                                                </ol>
							</td>
						</tr>
					</tbody>
				</table>
                            <?php if(!empty($singlesection['outro'])):?>
                            				<table align="center" style="margin: 15px 15px 25px 25px; width: 90%;">
					<tbody>
						<tr>
							<td style="padding:15px;">
							<p class="intro">
                                                            <?php echo $singlesection['outro']; ?>
							</p>
                                                        </td>
						</tr>
					</tbody>
				</table>
                            <?php endif;?>
				<table align="center" style="margin: 15px 15px 25px 25px; width: 90%;">
					<tbody>
						<tr>
							<td class="panel-heading moodle-beige">
								<h3 align="center" style="text-align: center;"><span style="color: #58a796;">Activity Resources:</span></h3>
							</td>
						</tr>
						<tr>
							<td>
                                                <?php foreach($singlesection['activities'] as $activityresource):?>
								<table align="center" style="margin: 15px 0px 15px 0px; width: 100%; background: #ffffff; border: 1px solid #58a796;">
									<tbody>
										<tr>
											<td style="padding: 15px; margin-right: 25px;">
												<table style="width: 100%;">
													<tbody>
														<tr>
															<td>
																<p class="lead" align="center"><span style="color: #58a796;"><?php echo $activityresource['resource'];?></span></p>
															</td>
														</tr>
														<tr>
															<td style="padding-top: 10px; padding-bottom: 10px;">
																<table style="float: left; margin: 5px 10px 10px 0px;">
																	<tbody>
																		<tr>
																			<td>
																				<p align="center"><img src="<?php echo $activityresource['resource_icon'];?>" class="icon-resource" /></p>
																			</td>
																		</tr>
																		<tr>
																			<td style="padding: 0px 5px 0px 5px;">
																				<p align="center"><small><?php echo $activityresource['resource_type'];?></small></p>
																			</td>
																		</tr>
																	</tbody>
																</table>
                                                                                                                            <?php if(!empty($activityresource['resource_description'])):?>
																<p><strong>Description:</strong> <?php echo $activityresource['resource_description'];?></p>
                                                                                                                            <?php endif;?>
															</td>
														</tr>
                                                                                                                <?php if(!empty($activityresource['resource_path'])):?>
														<tr>
															<td>
																<p align="center"><a href="<?php echo $activityresource['resource_path'];?>" target="_blank">Click Here to view resource</a></p>
															</td>
														</tr>
                                                                                                                <?php endif;?>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
                                                <?php endforeach;?>
							</td>
                                                </tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>