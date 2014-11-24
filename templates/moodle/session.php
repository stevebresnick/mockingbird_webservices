<?php
include_once '../variables.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Session <?php echo $session['number']; ?>: <?php echo $session['title']; ?></title>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#tabs").tabs();
            });
        </script>
        <style>
            .activitiestable :nth-child(even) .activityrow{
                background:#fffbd9;
            };
        </style>
    </head>
    <body>
        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">Session <?php echo $session['number']; ?>: <?php echo $session['title']; ?></a></li>
                <li><a href="#tabs-2">Overview</a></li>
                <li><a href="#tabs-3">Activities (To-Do List)</a></li>
                <li><a href="#tabs-4">Session Resources</a></li>
            </ul>
            <div id="tabs-1">
                <p style="text-align: center;"><em><span style="font-size: small;"><span size="4"><span size="3"><?php echo $session['quote']; ?></span></span><span size="3"> </span></span></em></p>
                <p style="text-align: center;"><span size="3" style="font-size: small;">--<?php echo $session['speaker']; ?> <br /></span></p>
                <hr />
                <table style="background-color: #fffbd9; border-color: #84817b; border-width: 1px; width: 100%; border-style: solid;" cellpadding="10" align="center" border="1">
                    <tbody>
                        <tr>
                            <td><img src="http://coursebuilder.facinghistory.org/cms/app/webroot/img/sessiontiles/sessiontile<?php echo $session['number']; ?>.png" width="110" height="110" style="vertical-align: top;"/></td>
                            <td>
                                <h2>Session <?php echo $session['number']; ?>: <?php echo $session['title']; ?></h2>
                                <p><span style="font-size: medium;"><?php echo $session['intro']; ?><br /></span></span></span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%;" cellpadding="10" cellspacing="10" align="center" border="0">
                    <tbody>
                        <tr>
                            <td>
                                <h2><img src="http://coursebuilder.facinghistory.org/cms/app/webroot/img/icons/questions.png" style="vertical-align: middle; margin-left: 10px; margin-right: 10px;" height="40" width="40" />Essential Questions</h2>
                                <p></p>
                                <ul>
                                    <?php foreach ($questions as $question): ?>
                                        <li>
                                            <p><span style="font-size: medium;"><?php echo $question; ?></span></p>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <p><span size="2" style="font-size: small;"> </span></p>
                            </td>
                            <td><img src="<?php echo $session['scope_and_sequence']['image']; ?>" width="211" height="194" style="display: block; margin-left: auto; margin-right: auto;"/></td>                </tr>
                    </tbody>
                </table>
                <!--Twitter Prompt-->
                <table align="center">
                    <tbody>
                        <tr>
                            <td style="text-align: left;">
                                <div style="padding: 10px 0px 10px 10px; text-align: left;"><br height="20" width="24" src="http://coursebuilder.facinghistory.org/img/social/tweet.png" />
                                    <table style="border: 3px solid #16bae8; width: 100%; height: 190px;" border="3" cellspacing="1">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div style="padding: 10px 0px 10px 10px;">
                                                        <p><a style="text-decoration: none;" href="https://twitter.com/intent/tweet?&amp;text=<?php echo $session['twitter']['prompt']; ?>&hashtags=<?php echo $session['twitter']['hashtag'] ?>" target="_blank"><img src="http://coursebuilder.facinghistory.org/img/social/tweet.png" width="24" height="20" /><span style="text-decoration: none; font-weight: bold; color: #4099ff; font-size: 21px;"> Tweet Your Answer to #<?php echo $session['twitter']['hashtag'] ?></span><span style="color: #888888;"><strong><span style="text-decoration: none; font-size: small;">:    <?php echo $session['twitter']['text']; ?></span></strong></span></a></p>
                                                        <p><span style="color: #888888;"><strong><span style="text-decoration: none; font-size: small;"></span></strong><span style="text-decoration: none; font-size: small;"><span style="color: #000000;"><span style="text-decoration: none; font-size: small;">Twitter is a great resource to stay connected to teachers and current educational trends. If you have an account, please feel free to respond to the prompt above. Search #<?php echo $session['twitter']['hashtag']; ?> to connect with other online participants who are taking courses with Facing History this semester.</span></span></span></span></p>
                                                        <p></p>
                                                        <p><span style="color: #888888;"><span style="text-decoration: none; font-size: small;"><span style="color: #000000;"><span style="text-decoration: none; font-size: small;"><em>Click on the question next to "Tweet Your Answer to #<?php echo $session['twitter']['hashtag'] ?>" to send a Tweet.</em></span></span></span></span></p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--End Twitter Prompt--->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="tabs-2">
                <div style="margin-left: 200px;"></div>
                <hr style="width: 100%; height: 2px;" />
                <?php if (!empty($session['video'])): ?>
                    <table class="choicesshadow" style="margin: 10px 20px; width: 315px;" cellpadding="10" cellspacing="10" align="right" border="0">
                        <tbody>
                            <tr style="background: #58a796;">
                                <td>
                                    <h2 style="text-align: center;"><span style="font-size: medium;">
                                            <img src="http://stevebresnick.com/facing_history/coursebuilder/app/webroot/img/icons/icon11.png" style="margin-left: 10px; margin-right: 10px; vertical-align: middle; float: left;" height="41" width="40" />
                                            <span style="color: #ffffff;"><?php echo $session['video']['title']; ?></span></span></h2>
                                </td>
                            </tr>
                            <tr style="background: #fffbd9;"> <!---START VIDEO WRAPPER------>
                                <td>
                                    <?php echo $session['video']['player']; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
                <p><span style="font-size: medium;"><?php echo $session['overview']; ?></span><br /><span style="font-size: small;" size="2"></span></p>
            </div>
            <div id="tabs-3">
                <table style="width: 100%;" cellpadding="10" cellspacing="10" align="center" border="0" class="activitiestable">
                    <tbody>
                        <tr  style="background: #58a796;">
                            <td>
                                <h2 style="color: #ffffff;">Session <?php echo $session['number']; ?> Activities</h2>
                            </td>
                        </tr>

                        <!-----ROW----->

                        <tr>
                            <td>
                                <table class="activitiestable">
                                    <?php foreach ($section as $activityblock): ?>
                                            <!---Section Block for <?php echo $activityblock['title']; ?>--->
                                        <tr>
                                            <td>
                                                <div class="activityrow">
                                                    <ul style="padding-top:10px;">
                                                        <li>
                                                            <h3>
                                                                <a href="section.php?section_id=<?php echo $activityblock['id']; ?>"><?php echo $activityblock['title']; ?></a>:
                                                            </h3>

                                                            <?php if (!empty($activityblock['intro_trimmed'])): ?>
                                                                <p>
                                                                    <?php echo $activityblock['intro_trimmed']; ?>
                                                                </p>
                                                            <?php endif; ?>


                                                        </li>
                                                    </ul>
                                                    <table style="margin-left: 40px;"  cellspacing="10" cellpadding="10">
                                                        <?php foreach ($activityblock['activities'] as $activity): ?>
                                                            <tr>
                                                                <td>
                                                                    <img src="<?php echo $activity['resource_icon']; ?>" style="float: left; margin-left: 10px; margin-right: 10px;" height="41" width="40" />
                                                                </td>
                                                                <td>
                                                                    <p><span style="font-size: medium;"><strong><?php echo $activity['action_verb']; ?></strong> <em><?php echo $activity['resource'] . '</em>: ' . $activity['instruction_step']; ?></span></p>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                </div>
                                                <hr/>
                                            </td>
                                        </tr>
                                        <!---End Section Block for <?php echo $activityblock['title']; ?>--->
                                    <?php endforeach; ?>
                                </table>
                            </td>   
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="tabs-4">
                <table style="width: 100%;" cellpadding="10" cellspacing="10" align="center" border="0">
                    <tbody>
                        <tr  style="background: #58a796;">
                            <td>
                                <h2 style="color: #ffffff;">Session <?php echo $session['number']; ?> Activity Resources</h2>
                            </td>
                        </tr>

                        <?php foreach ($section as $activityblock): ?>
                        <!--Start Section <?php echo $activityblock['title'];?>-->
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="10">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h3>

                                                        <?php echo $activityblock['title']; ?>


                                                    </h3>
                                                </td>
                                            </tr>
                                            <?php foreach ($sections->resources($activityblock['id']) as $resource): ?>
                                                    <!---Resource Block for <?php echo $resource['resource']; ?>--->
                                                <tr>
                                                    <td>
                                                        <table  cellspacing="0" cellpadding="10" width="100%">
                                                            <tbody>

                                                                <tr style="background:#fffbd9;">
                                                                    <td style="border-top: 1px solid #0C8689; border-left: 1px solid #0C8689; border-bottom: 1px solid #0C8689; width:60px;">
                                                                        <p>
                                                                            <img src="<?php echo $resource['resource_icon']; ?>" style="float: left; margin-left: 10px; margin-right: 10px;" height="41" width="40" />
                                                                        </p>
                                                                        <p align="center">
                                                                            <span style="font-size: small;">
                                                                                <?php echo $resource['resource_type']; ?>
                                                                            </span>
                                                                        </p>
                                                                    </td>
                                                                    <td style="border-top: 1px solid #0C8689; border-right: 1px solid #0C8689; border-bottom: 1px solid #0C8689; padding-right: 15px;">
                                                                        <span style="font-size: large;"><strong><?php echo $resource['resource']; ?></strong><br/><hr/><br/>
                                                                            <?php if (!empty($resource['resource_description'])): ?>
                                                                                <em><?php echo $resource['resource_description']; ?></em><br/>
                                                                            <?php endif; ?>
                                                                            <?php if (!empty($resource['resource_path'])): ?>
                                                                                <a href="<?php echo $resource['resource_path']; ?>" target="_blank"><?php echo $resource['resource_path']; ?></a>
                                                                            <?php endif; ?>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                               <!---End Resource Block for <?php echo $resource['resource']; ?>--->
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        <!--End Section <?php echo $activityblock['title'];?>-->
                        <?php endforeach; ?>
                        <?php if (!empty($addresource)): ?>
                            <tr  style="background: #58a796;">
                                <td>
                                    <h2 style="color: #ffffff;">Session <?php echo $session['number']; ?> Additional Resources:</h2>
                                </td>
                            </tr>
                            <?php foreach ($addresource as $sessionresource): ?>
                                    <!---Resource block for <?php echo $sessionresource['title']; ?>--->
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="10">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table  cellspacing="0" cellpadding="10" width="100%">
                                                            <tbody>

                                                                <tr style="background:#fffbd9;">
                                                                    <td style="border-top: 1px solid #0C8689; border-left: 1px solid #0C8689; border-bottom: 1px solid #0C8689; width:60px;">
                                                                        <p>
                                                                            <img src="<?php echo $sessionresource['icon']; ?>" style="float: left; margin-left: 10px; margin-right: 10px;" height="41" width="40" />
                                                                        </p>
                                                                        <p align="center">
                                                                            <span style="font-size: small;">
                                                                                <?php echo $sessionresource['type']; ?>
                                                                            </span>
                                                                        </p>
                                                                    </td>
                                                                    <td style="border-top: 1px solid #0C8689; border-right: 1px solid #0C8689; border-bottom: 1px solid #0C8689; padding-right: 15px;">
                                                                        <span style="font-size: large;"><strong><?php echo $sessionresource['title']; ?></strong><br/><hr/><br/>
                                                                                <?php if (!empty($sessionresource['description'])): ?>
                                                                                <em><?php echo $sessionresource['description']; ?></em><br/>
                                                                            <?php endif; ?>

                                                                            <?php if (!empty($sessionresource['path'])): ?>
                                                                                <a href="<?php echo $sessionresource['path']; ?>" target="_blank"><?php echo $sessionresource['path']; ?></a>
                                                                            <?php endif; ?>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <!--End Resource Block for <?php echo $sessionresource['title']; ?>-->
                            <?php endforeach; ?>
                        <?php endif; ?>                 
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

