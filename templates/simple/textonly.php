<?php include_once '../variables.php'; ?>

<html>
    <head>
        <title><?php echo $session['title']; ?></title>
        <link rel="stylesheet" type="text/css" href="http://coursebuilder.facinghistory.org/css/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="http://coursebuilder.facinghistory.org/css/bootstrap/bootstrap-theme.min.css"/>

        <style>
            .sessiontitle h1{
                text-align: center;
            }
            .top {
                width:100%;
            }
            .sessionheading {
                width:50%;
                float:left;
            }
            .sessionquote {
                text-align: center;
                font-style: italic;
            }
            .scope_and_sequence_image {
                float:right;
                display: block;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h1>Session <?php echo $session['number'] . ': ' . $session['title']; ?></h1>
                </div>
                <?php if (!empty($session['quote'])): ?>
                    <p class="text-center"><?php echo $session['quote']; ?></p>
                    <p class="text-center"><?php echo $session['speaker']; ?></p>
                    <hr/>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <hr/>
                    <h3>Essential Questions:</h3>
                    <ol class="essentialquestions">
                        <?php foreach ($questions as $question): ?>
                            <li><?php echo $question; ?></li>
                        <?php endforeach; ?>
                    </ol>
                    <hr/>
                    <?php if ($session['twitter']): ?>
                        <p><strong>Session Twitter Prompt:</strong>: <?php echo $session['twitter']['text'] . ' #' . $session['twitter']['hashtag']; ?></p>
                        <hr/>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>Session Introduction:</h3>
                    <?php echo $session['intro']; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>Session Overview:</h3>
                    <?php echo $session['overview']; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h3>Session <?php echo $session['number']; ?> Sections:</h3>
                    <?php foreach ($section as $asection): ?>
                        <div class="row">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $asection['title']; ?></h3>
                                </div>
                                <div class="panel-body">
                                <p><?php echo $asection['intro']; ?></p>
                                <hr/>
                                <h5><em><?php echo $asection['title']; ?></em> Activities:</h5>
                                <?php if (!empty($asection['activities'])): ?>
                                    <ol>
                                        <?php foreach ($asection['activities'] as $activity): ?>
                                            <li><strong><?php echo $activity['action_verb'] . ' ' . $activity['resource'] . ': </strong> ' . $activity['instruction_step']; ?>
                                                    <br/>
                                                    <?php if (!empty($activity['framing_language'])): ?>
                                                        <?php echo $activity['framing_language']; ?>
                                                    <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ol>
                                <hr/>
                                    <h5>Resources Used in <?php echo $asection['title']; ?>:</h5>
                                    <?php foreach ($asection['activities'] as $activityresource): ?>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <img src="<?php echo $activityresource['resource_icon']; ?>" width="25" height="25" style="margin-right:10px;"/> 
                                                    <?php echo $activityresource['resource']; ?> (<?php echo $activityresource['resource_type']; ?>)
                                                </h3>
                                            </div>
                                            <div class="panel-body">
                                                <?php if (!empty($activityresource['resource_description'])): ?>
                                                    <p><strong>Description:</strong></p>
                                                    <?php echo $activityresource['resource_description']; ?><br/>
                                                <?php endif; ?>
                                                <?php if (!empty($activityresource['resource_path'])): ?>
                                                    <p>URL: <a href="<?php echo $activityresource['resource_path']; ?>" target="_blank"><?php echo $activityresource['resource_path']; ?></a></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <hr/>
                    <?php endforeach; ?>
                </div>
            </div>
    </body>
</html>
