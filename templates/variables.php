<?php
require_once '../../Course.php';
require_once '../../Session.php';
require_once '../../EssentialQuestions.php';
require_once '../../Section.php';
require_once '../../Resource.php';
require_once '../../Twitter.php';

$courseid = $_GET['course_id'];
$id = $_GET['session_id'];
$sectionid = $_GET['section_id'];

$courses = new Course();
$course = $courses->create($courseid);

$sessions = new Session();
$session = $sessions->create($id);

$essentialquestions = new EssentialQuestions();
$questions = $essentialquestions->create($id);

$sections = new Section();
$section = $sections->create($id);
//$sectionresources = $sections->resources($sectionid);
$singlesection = $sections->single($sectionid);

$resources = new Resource();
$addresource = $resources->additionalResources($id);