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
		
		public static function usage(){
	        return "";
	    }
	}

/* End of file pi.ff_fields.php */
/* Location: ./system/expressionengine/third_party/ff_fields/pi.ff_fields.php */
