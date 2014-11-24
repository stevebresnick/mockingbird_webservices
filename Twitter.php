<?php

/**
 * Transforms raw text into a Twitter-friendly string to work with the Twitter API
 *
 * @author stephenbresnick
 */
class Twitter {

public function transformPrompt($rawPrompt){
	$fixedPrompt = str_replace(' ', '%20', $rawPrompt);
        return $fixedPrompt;//htmlspecialchars($newUrl);
}

public function create($sessionid){
    
    $tweet = array();
    $twitters = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/twitter-services/twitter.json?session='.$sessionid));
    
    foreach ($twitters as $twitter) {
        $tweet['prompt'] = $this->transformPrompt($twitter->node_title);
        $tweet['text'] = $twitter->node_title;
        $tweet['hashtag'] = $twitter->hashtag;
    }
    
    return $tweet;
}

}
