<?php

/**
 * This class interacts with the Brightcove API to build a player for display
 *
 * @author stephenbresnick
 */
class Brightcove {
    
    public $videoid;
    
    public function create($sessionid) {
        
        $video = array();
        $brightcoves = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/brightcove-services/video.json?session='.$sessionid));
        
        foreach ($brightcoves as $brightcove) {
            $bcid = $brightcove->id;
            $video['title'] = $brightcove->node_title;
            $video['id'] = $bcid;
            $video['player'] = $this->player($bcid);
        }
        
        $this->videoid = $video['id'];
        return $video;
    }
    //This function reads the Brightcove API and returns an array based on a search query
    public function returnBCArray($search) {
        $searchquery = str_replace(' ', '%20', $search);
        $apiendpoint = 'http://api.brightcove.com/services/library?command=search_videos&any=' . $searchquery . '&page_size=100&video_fields=id%2Cname%2CshortDescription%2ClongDescription%2CvideoStillURL%2Clength&media_delivery=default&sort_by=DISPLAY_NAME%3AASC&page_number=0&get_item_count=true&callback=BCL.onSearchResponse&token=Bc_rX0PVJLx9Qis1edG-sSPth3WWA1ggjkLXHF48xgyAJtQMbpLHZg..';
        $json = file_get_contents($apiendpoint); //{"courseintro":"This is a new description.","sessions":[null]}
        $json2 = substr($json, 21);
        $json = substr($json2, 0, -2);
        $json = utf8_encode($json);
        $bcfeed = json_decode($json, true);
        $this->videos = $bcfeed['items']; //$bcfeed['items'];
    }

    //This function creates a brightcove player from a given id
    public function player($videoid) {
        $bcplayer = '<!-- Start of Brightcove Player -->

<div style="display:none">

</div>

<!--
By use of this code snippet, I agree to the Brightcove Publisher T and C 
found at https://accounts.brightcove.com/en/terms-and-conditions/. 
-->

<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>

<object id="myExperience' . $videoid . ' " class="BrightcoveExperience">
  <param name="bgcolor" value="#FFFFFF" />
  <param name="width" value="560" />
  <param name="height" value="315" />
  <param name="playerID" value="' . $videoid . ' " />
  <param name="playerKey" value="AQ~~,AAABYEdBaAk~,1dGnVytVBSw9Y4yoko71XnFgkvpqea1-" />
  <param name="isVid" value="true" />
  <param name="isUI" value="true" />
  <param name="dynamicStreaming" value="true" />
  
  <param name="@videoPlayer" value="' . $videoid . ' " />
</object>

<!-- 
This script tag will cause the Brightcove Players defined above it to be created as soon
as the line is read by the browser. If you wish to have the player instantiated only after
the rest of the HTML is processed and the page load is complete, remove the line.
-->
<script type="text/javascript">brightcove.createExperiences();</script>

<!-- End of Brightcove Player -->';
        return $bcplayer;
    }
    
    public function findVideoById($videoid = null){
        $apiendpoint = 'http://api.brightcove.com/services/library?command=find_video_by_id&video_id='.$videoid.'&video_fields=id%2Cname%2CshortDescription%2ClongDescription%2CvideoStillURL%2Clength&media_delivery=default&callback=BCL.onSearchResponse&token=Bc_rX0PVJLx9Qis1edG-sSPth3WWA1ggjkLXHF48xgyAJtQMbpLHZg..';
        $json = file_get_contents($apiendpoint); //{"courseintro":"This is a new description.","sessions":[null]}
        $json2 = substr($json, 21);
        $json = substr($json2, 0, -2);
        $json = utf8_encode($json);
        $bcfeed = json_decode($json, true);
        return $bcfeed; //$bcfeed['items'];
    }
}
