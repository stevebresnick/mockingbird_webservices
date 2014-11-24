<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Resource
 *
 * @author stephenbresnick
 */
class Resource {
    
    public function additionalResources($sessionid) {
        
        $resourcesarray = array();
        $resources = json_decode(file_get_contents('http://coursebuilder.facinghistory.org/mockingbird/session-additional-resources/resources.json?session='.$sessionid));
        
        foreach ($resources as $resource) {
            $resourcesarray[] = array(
                'title' => $resource->node_title,
                'type' => $resource->type,
                'icon' => $resource->icon,
                'description' => $resource->description,
                'path' =>$resource->resource_path
            );
        };
        
        return $resourcesarray;
    }
}
