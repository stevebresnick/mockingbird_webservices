<?php 
include_once '../../Outline.php';
include_once '../../Course.php';

$courseid = $_GET['course_id'];
$course = new Course();
$coursecurrent = $course->create($courseid);

$courseoutline = new Outline();
$outline = $courseoutline->output($courseid);
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://coursebuilder.facinghistory.org/css/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="http://coursebuilder.facinghistory.org/css/bootstrap/bootstrap-theme.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-12">
            <p class="lead"><?php echo $coursecurrent['title'];?></p>
            <div>
            <ul>
<?php foreach ($outline as $session):?>
                <li><p class="lead text-info">Session <?php echo $session['session_number'].': '.$session['session_title'];?></p></li><br/>
                <ul>
                    <?php foreach($session['sections'] as $section):?>
                    <li><p class="lead text-success"><?php echo $section['title'];?></p></li><br/>
                        <?php foreach($section['discussion'] as $discussion):?>
                        <ul>
                            <li><p class="lead text-warning">Discussion: <?php echo $discussion['title'];?></p></li><br/>
                        </ul>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </ul>
<?php endforeach;?>
            </ul>
                 </div>
            </div>
        </div>
    </body>
</html>
