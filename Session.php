<?php
header("Content-Type: text/html; charset=utf-8");


        /*
	public $session_services_path = 'session-services/session';
	public $twitter_services_path = 'twitter';
	public $essential_questions_services_path = 'services-essential-questions/essential-questions';
	public $sections_services_path = 'rest-section-services/section';
	public $activities_services_path = 'rest-activities-services/activities';
	public $resources_services_path = 'resources';
	public $sessionarray = array();*/
	
	
class Session {
        
   public function create($id) {
        
        $currentsession = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/session-services/session.json?session='.$id));
        $session = $currentsession[0];
        //Set class variables
        /*foreach ($currentsession as $session){
            $session->title = $sessionarray['title'];
        };*/
        return array(
            'title' => $session->session_title,
            'number' => $session->session_number,
            'quote' => $session->session_quote,
            'speaker' => $session->speaker,
            'intro' => $session->session_intro,
            'scope_and_sequence' => array(
                'name' => $session->scope_and_sequence,
                'image' => $session->scope_and_sequence_image
            )
        );
    }
}

/*
		$session = json_decode(file_get_contents($this->siteurl.$this->session_services_path.'.json?session='.$this->sessionid));
		$session = $session[0];
		$title = $session->session_title;
		$number = $session->session_number;
		$scope_and_sequence = $session->scope_and_sequence;
		$scope_and_sequence_image = $session->scope_and_sequence_image;
		$quote = $session->session_quote;
		$speaker = $session->speaker;
		$intro = $session->session_intro;
		$brief_intro = $session->brief_intro;
		//$twitter = $this->twitter($this->sessionid);
		return array(
			'title' => $title,
			'number' => $number,
			'scope_and_sequence' => $scope_and_sequence,
			'scope_and_sequence_image' => $scope_and_sequence_image,
			'quote' => $quote,
			'speaker' => $speaker,
			'brief_intro' => $brief_intro,
			'intro' => $intro,
			//'twitter' => $twitter
		); 
	}
	
	private function makeTwitterPrompt($prompt) {
		//Create Twitter prompt
		$twitter = str_replace(' ', '%20', $prompt);
		return $twitter;
	}
	
	public function twitter($id){
		$twitterarray = array();
		$url = json_decode(file_get_contents($this->siteurl.$this->twitter_services_path.'.json?session='.$id));
		$twitter = $url[0];
		$prompt = $twitter->node_title;
		$twitterarray['prompt'] = $prompt;
		$twitterarray['autoprompt'] = $this->makeTwitterPrompt($prompt);
		return $twitterarray;
	}
	
	public function essential_questions(){
		$questionsarray = array();
		$essentialquestions = json_decode(file_get_contents($this->siteurl.$this->essential_questions_services_path.'.json?session='.$this->sessionid));
		
		foreach ($essentialquestions as $essquestion) {
			$question = $essquestion->essential_question;
			$session = $essquestion->parent_session;
			$questionsarray[] = $question;
		};
		return $questionsarray;
	}
	
	public function sections(){
		$sectionarray = array();
		$sections = json_decode(file_get_contents($this->siteurl.$this->sections_services_path.'.json?session='.$this->sessionid));

		foreach($sections as $section) {
			//$session = $section->parent_session;
			$sessionid = $section->parent_session;
			$id = $section->section_id;
			$title = $section->node_title;
			$intro = $section->intro;
			$activities = $this->activities($id);
			$outro = $section->outro;
			$sectionarray[] = array(
				'id' => $id,
				'title' => $title,
				'intro' => $intro,
				'activities' => $activities,
				'outro' => $outro,
				//'session' => $session,
				'sessionid' => $sessionid
			);
		};
		return $sectionarray;
		//return $sections;
		
	}

	public function activities($section){
		$activitiesarray = array();
		$activities = json_decode(file_get_contents($this->siteurl.$this->activities_services_path.'.json?section='.$section));
		
		foreach($activities as $activity){
			//$session = $activity->parent_session;
			$section = $activity->parent_section;
			$action = $activity->action_verb;
			$resourceid = $activity->resource;
			//$resource = $this->resource($resourceid);
			$step = $activity->instruction_step;
			switch ($action){
				case 'Journal':
					$image = 'http://coursebuilder.facinghistory.org/img/icons/journal.png';
					break;
				case 'Discuss':
					$image = 'http://coursebuilder.facinghistory.org/img/icons/icon3.png';
					break;
				default:
					$image = $resource['image'];
			};
			$activitiesarray[] = array(
				'session' => $session,
				'section' => $section,
				'action verb' => $action,
				'resource' => $resource,
				'instruction_step' => $step
				//'image' => $image
			);
		};
		return $activitiesarray;
	}
        }
/*
	public function resource($id) {
		$resourcesarray = array();
		$resources = json_decode(file_get_contents($this->siteurl.$this->resources_services_path.'.json?resource_id='.$id));
		
		foreach($resources as $resource) {
			$title = $resource->node_title;
			$image = $resource->image_path;
			$type = $resource->type;
			$description = $resource->description;
			$path = $resource->resource_path;
			$resourcesarray['title'] = $title;
			$resourcesarray['image'] = $image;
			$resourcesarray['type'] = $type;
			$resourcesarray['description'] = $description;
			$resourcesarray['path'] = $path;
		};
		
		return $resourcesarray;
	}
	
}

/*

// enter all of the relevant information about the web service
$webaddress = 'http://coursebuilder.facinghistory.org/mockingbird';
$servicename = 'rest';

//Resource Identifiers within Drupal Views (defined under Services Settings -> path)
$session_resource = 'sessions';
$essential_questions_resource = 'essential-questions';
$section_resource = 'sections';
$activities_resource = 'activities';


//Filter Criteria is Session ID
$sessionid = $_GET['session_id'];

$sessions = json_decode(file_get_contents($webaddress.'/'.$servicename.'/'.$session_resource.'.json?session='.$sessionid), true);
$essential_questions = json_decode(file_get_contents($webaddress.'/'.$servicename.'/'.$essential_questions_resource.'.json?session='.$sessionid), true);
$sections = json_decode(file_get_contents($webaddress.'/'.$servicename.'/'.$section_resource.'.json?session='.$sessionid), true);

//Get all activities associated with each Section
function activities($sectionid){
	foreach ()
};
$activities = json_decode(file_get_contents($webaddress.'/'.$servicename.'/'.$activities_resource.'.json?session='.$sessionid), true);

?>
<h1>Session</h1>
<pre>
<?php print_r($sessions); ?>
</pre>
<h1>Essential Questions</h1>
<pre>
<?php print_r($essential_questions); ?>
</pre>
<h1>Sections</h1>
<pre>
<?php print_r($sections); ?>
</pre>
<h1>Activities</h1>
<pre>
<?php print_r($activities); ?>
</pre>
*/