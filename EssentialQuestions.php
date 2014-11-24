<?php

/**
 * Description of essentialquestions
 *
 * @author stephenbresnick
 */
class essentialquestions {
    
    public function create($id){
        $essential_questions = array();
        $essentialquestions = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/services-essential-questions/essential-questions.json?session='.$id));
        $eq = $essentialquestions;
        
        foreach ($eq as $question) {
            $essential_questions[] = $question->essential_question;
        }

        return $essential_questions;
    }
}
