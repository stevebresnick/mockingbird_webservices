<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course
 *
 * @author stephenbresnick
 */
class Course {
    public function create($courseid) {
       
        $currentcourse = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/courses-services/course.json?course_id='.$courseid));
        $course = $currentcourse[0];
        $courseimage = $course->course_image->filename;

        return array(
            'title' => $course->node_title,
            'overview' => $course->course_overview,
            'image' => 'http://coursebuilder.facinghistory.org/mockingbird/sites/default/files/'.$courseimage
        );
    }
}
