<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	require_once(PATH_THIRD."ff_fields/config.ff_fields.php");
	
	$plugin_info = array(
		'pi_name' 			=> FF_FIELDS_NAME,
		'pi_version' 		=> FF_FIELDS_VERSION,
		'pi_author' 		=> 'Brandon OHara',
		'pi_author_url' 	=> 'http://brandonohara.com/',
		'pi_description' 	=> '',
	    'pi_usage'        	=> Ff_fields::usage()
	);

	class Ff_fields {
		public $plugin_name = FF_FIELDS_NAME;
    
		public function __construct(){
			
		}
		
		public function field(){
			$field_name = explode("|", ee()->TMPL->fetch_param("name", array()) );
			
			if( count($field_name) == 0 )
				return ee()->TMPL->no_results();
				
			$fields = array();
			foreach($field_name as $name){
				$query = ee()->db->where("field_name", $name)->from("freeform_fields")->get();
				if($query->num_rows() == 0)
					continue;
				$field = $query->row_array();
				
				//settings formatting
				$field['options'] = array();
				$field['settings'] = json_decode($field['settings'], TRUE);
				if(isset($field['settings']['field_list_items'])){
					$options = explode("\n", $field['settings']['field_list_items']);
					foreach($options as $option)
						array_push($field['options'], array('option' => $option));
				}
				$field['settings'] = array($field['settings']);	
				
				array_push($fields, $field);
			}
			
			if( count($fields) == 0 )
				return ee()->TMPL->no_results();
			
			return ee()->TMPL->parse_variables(ee()->TMPL->tagdata, $fields);
		}
		
		public static function usage(){
	        return "";
	    }
	}

/* End of file pi.ff_fields.php */
/* Location: ./system/expressionengine/third_party/ff_fields/pi.ff_fields.php */
