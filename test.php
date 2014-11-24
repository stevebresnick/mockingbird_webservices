<?php
require_once 'Session.php';
require_once 'EssentialQuestions.php';
require_once 'Section.php';
require_once 'Resource.php';
require_once 'Twitter.php';

$id = $_GET['session_id'];

$sessions = new Session();
$session = $sessions->create($id);

$essentialquestions = new EssentialQuestions();
$questions = $essentialquestions->create($id);

$sections = new Section();
$section = $sections->create($id);

$resources = new Resource();
$resource = $resources->additionalResources($id);

echo '$session[title] = '.$session['title'];
echo '<br/>';

echo '$session[number] = '.$session['number'];
echo '<br/>';

echo '$session[quote] = '.$session['quote'];
echo '<br/>';

echo '$session[speaker] = '.$session['speaker'];
echo '<br/>';

echo '$session[brief_intro] = '.$session['brief_intro'];
echo '<br/>';

echo '$session[twitter] = ';
print_r($session['twitter']);
echo '<br/>';

echo '$session[intro] = '.$session['intro'];
echo '<br/>';

echo '$session[video] = ';
print_r($session['video']);
echo '<br/>';

echo '$session[scope_and_sequence][name] = '.$session['scope_and_sequence']['name'];
echo '<br/>';

echo '$session[scope_and_sequence][image] = '.$session['scope_and_sequence']['image'];
echo '<br/>';

$image = $session['scope_and_sequence']['image'];
echo "<img src='".$image."' width='211' height='194'/>";

echo 'foreach ($questions as $question) {
    echo "<li>".$question."</li>";
};';

echo '<ol>';
foreach ($questions as $question) {
    echo '<li>'.$question.'</li>';
};
echo '</ol>';

echo '$session[\'overview\'] ='.$session['overview'];

echo '<pre>';
print_r($section);
echo '<pre>';

echo '<h1>Additional Resources</h1>';
echo '<pre>';
print_r($resource);
echo '<pre>';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

