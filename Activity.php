<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Activity
 *
 * @author stephenbresnick
 */
class Activity {
    
    public function create($sectionid) {
        
        $currentactivity = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/services-section-activities/activities.json?section='.$sectionid));
        $activity = $currentactivity[0];
        
        return $activity;
    }
}
