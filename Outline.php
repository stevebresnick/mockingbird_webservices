<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Outline
 *
 * @author stephenbresnick
 */
class Outline {
    
    public function output ($courseid) {
        
        $courseoutline = array();
        
        //Output all sessions by course id
        $sessions = $this->sessions($courseid);
        
        //add them to the course array and output all sections and discussions
        foreach($sessions as $session) {
            
            $sessionid = $session->session_id;
            $sectionarray = array();
            $sections = $this->sections($sessionid);
            
            foreach($sections as $section) {
                
                $sectionid = $section->section_id;
                $discussionarray = array();
                $discussions = $this->discussions($sectionid);
                
                foreach($discussions as $discussion){
                    $discussionarray[] = array(
                        'title' => $discussion->node_title
                    );
                };
                
                $sectionarray[] = array (
                    'title' => $section->node_title,
                    'discussion' => $discussionarray
                );
                
            };
            
            $courseoutline[]=array(
                'session_number' => $session->session_number,
                'session_title' => $session->node_title,
                'sections' => $sectionarray
            );
        };
        
        return $courseoutline;
        

    }
    
    public function sessions($courseid) {
        
        $sessions = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/course-sessions-outline/sessions.json?course_id='.$courseid));
        return $sessions;
        
    }
    
    public function sections ($sessionid) {
        
        $sections = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/session-sections-outline/sections.json?session_id='.$sessionid));
        return $sections;
    }
    
    public function discussions ($sectionid) {
        
        $discussions = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/section-discussions-outline/discussions.json?section_id='.$sectionid));
        return $discussions;
    }
}
