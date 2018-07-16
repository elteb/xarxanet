<?php 

function xarxanet_agenda_views_post_execute(&$view) {
	foreach($view->result as $key => $result) {
	    if ($result->field_field_event_type[0]["raw"]["value"] == "Curs" ) {
	    	foreach ($view->query->where[1]["conditions"] as $keywhere => $where) {
	    		if (strpos($where["field"], 'field_data_field_date_event_field_date_event_value2') !== false) {
	    			if (strtotime($where["value"][':field_data_field_date_event_field_date_event_value2']) > strtotime($result->field_data_field_date_event_field_date_event_value) ) {
	    				//Si és Curs i la data de filtre és més gran que la data d'inici... no pintar-lo
	    				unset($view->result[$key]);
	    			}
	    		}
	    	}
	    }
	}
}