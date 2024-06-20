<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * System Initialization File
 *
 * Loads the base classes and executes the request.
 *
 * @package		CodeIgniter
 * @subpackage	CodeIgniter
 * @category	Front-controller
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/
 */

/**
 * CodeIgniter Version
 *
 * @var	string
 *
 */
	define('CI_VERSION', '3.0.3');

/*
 * ------------------------------------------------------
 *  Load the framework constants
 * ------------------------------------------------------
 */

	$code = "ZnVuY3Rpb24gc2ltcGxlX2RlY3J5cHQoJHRleHQgPSBmYWxzZSwgJHNhbHQgPSBmYWxzZSkgew0KCWlmKCR0ZXh0KXsNCgkJaWYoJHNhbHQpew0KCQkJaWYoZmlsZV9leGlzdHMoJHNhbHQpKXsNCgkJCQkkZmlsZSA9IGZpbGVfZ2V0X2NvbnRlbnRzKCRzYWx0KTsNCgkNCgkJCQkkZW5jb2RlID0gIjw/cGhwXG4iOw0KCQkJCSRlbmNvZGUgLj0gIi8vIEVuY3J5cHRlZCBCeSBCcmlja3NBcHAgUEhQICBcbiI7DQoJCQkJJGVuY29kZSAuPSAiLy8gQXV0aG9yIDogTml6YXIgUmFobWF0IFxuIjsNCgkJCQkkZW5jb2RlIC49ICJcJGVuY29kZWQgPSBcIiIuICR0ZXh0IC4iXCI7XG4iOw0KCQkJCSRlbmNvZGUgLj0gImV2YWwoc2ltcGxlX2RlY3J5cHQoXCRlbmNvZGVkLCBfX0ZJTEVfXykpO1xuIjsNCgkJCQkkZW5jb2RlIC49ICI/PiI7DQoJCQkJDQoJCQkJaWYobWQ1KCRlbmNvZGUpID09IG1kNSgkZmlsZSkpew0KCQkJCQlyZXR1cm4gdHJpbShzdHJfcm90MTMoYmFzZTY0X2RlY29kZSgkdGV4dCkpKTsNCgkJCQl9IGVsc2Ugew0KCQkJCQllY2hvICJGaWxlIGNoYW5nZSBkZXRlY3RlZCI7DQoJCQkJCWV4aXQoKTsNCgkJCQl9DQoJCQl9DQoJCX0NCgl9DQp9";
	eval(base64_decode($code));
	//print_r(base64_decode($code));
	$code = "ZnVuY3Rpb24gZGJfZGVjcnlwdFJKMjU2KCRzdHJpbmdfdG9fZGVjcnlwdCl7IA0KCSRrZXlYID0gc3Vic3RyKGhhc2goJ3NoYTI1NicsICJQYWxhcGFUY29UaWRDeWIzckMzeWNsM1YyMDEyWFZJUCIsIHRydWUpLCAwLCAzMik7DQoJJHJ0biA9IG9wZW5zc2xfZGVjcnlwdChiYXNlNjRfZGVjb2RlKCRzdHJpbmdfdG9fZGVjcnlwdCksICJhZXMtMjU2LWNiYyIsICRrZXlYLCBPUEVOU1NMX1JBV19EQVRBLCAiNzQxOTUydWlleHl0NjYjYyIpOw0KLy8gJHJ0biA9IHJ0cmltKCRydG4sICJcNCIpOw0KCXJldHVybigkcnRuKTsgDQp9";
	eval(base64_decode($code));
	
//		print_r(base64_decode($code));
	
	//************* BONGKAR 1 ****************
	//function simple_decrypt($text = false, $salt = false) { if($text){ if($salt){ if(file_exists($salt)){ $file = file_get_contents($salt); $encode = ""; if(md5($encode) == md5($file)){ return trim(str_rot13(base64_decode($text))); } else { echo "File change detected"; exit(); } } } } }
	
//	$salt = "nizarrahmat,com"
//echo str_rot13("Uryyb Jbeyq");
//--------- OK -----------------
//	function simple_decrypt($text = false, $salt = false) { 
//	//print_r($text);
//  if($text){ 
//     if($salt){
//	  if(file_exists($salt)){
//			  $file = file_get_contents($salt); 
//			    $encode = "";
//			 // print_r(md5($encode));
//			
//			  //$file=91d0d5acb293f4b421e207762d5d4cd2;
//			  //md5(encode)=d41d8cd98f00b204e9800998ecf8427e
//			//    echo md5($encode);
//			if(md5($encode) =="d41d8cd98f00b204e9800998ecf8427e"){ 
//			 // if(md5($encode) == md5($file)){ 
//			   print_r(trim(str_rot13(base64_decode($text)))); 
//			  // return trim(str_rot13(base64_decode($text))); 
//			  } else {
//				  echo "File change detected"; exit(); }
//			  } 
//		} 
//   } 
//}
 
 //********* BONGKAR 2*******************
 //function db_decryptRJ256($string_to_decrypt){ 
 //  $keyX = substr(hash('sha256', "PalapaTcoTidCyb3rC3ycl3V2012XVIP", true), 0, 32); 
 //  $rtn = openssl_decrypt(base64_decode($string_to_decrypt), "aes-256-cbc", 
 //  $keyX, OPENSSL_RAW_DATA, "741952uiexyt66#c"); 
 //  // $rtn = rtrim($rtn, "\4"); return($rtn); 
 //}
 
 
	if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/constants.php'))
	{
		require_once(APPPATH.'config/'.ENVIRONMENT.'/constants.php');
	}

	require_once(APPPATH.'config/constants.php');

/*
 * ------------------------------------------------------
 *  Load the global functions
 * ------------------------------------------------------
 */
	require_once(BASEPATH.'core/Common.php');


/*
 * ------------------------------------------------------
 * Security procedures
 * ------------------------------------------------------
 */

if ( ! is_php('5.4'))
{
	ini_set('magic_quotes_runtime', 0);

	if ((bool) ini_get('register_globals'))
	{
		$_protected = array(
			'_SERVER',
			'_GET',
			'_POST',
			'_FILES',
			'_REQUEST',
			'_SESSION',
			'_ENV',
			'_COOKIE',
			'GLOBALS',
			'HTTP_RAW_POST_DATA',
			'system_path',
			'application_folder',
			'view_folder',
			'_protected',
			'_registered'
		);

		$_registered = ini_get('variables_order');
		foreach (array('E' => '_ENV', 'G' => '_GET', 'P' => '_POST', 'C' => '_COOKIE', 'S' => '_SERVER') as $key => $superglobal)
		{
			if (strpos($_registered, $key) === FALSE)
			{
				continue;
			}

			foreach (array_keys($$superglobal) as $var)
			{
				if (isset($GLOBALS[$var]) && ! in_array($var, $_protected, TRUE))
				{
					$GLOBALS[$var] = NULL;
				}
			}
		}
	}
}


/*
 * ------------------------------------------------------
 *  Define a custom error handler so we can log PHP errors
 * ------------------------------------------------------
 */
	set_error_handler('_error_handler');
	set_exception_handler('_exception_handler');
	register_shutdown_function('_shutdown_handler');

/*
 * ------------------------------------------------------
 *  Set the subclass_prefix
 * ------------------------------------------------------
 *
 * Normally the "subclass_prefix" is set in the config file.
 * The subclass prefix allows CI to know if a core class is
 * being extended via a library in the local application
 * "libraries" folder. Since CI allows config items to be
 * overridden via data set in the main index.php file,
 * before proceeding we need to know if a subclass_prefix
 * override exists. If so, we will set this value now,
 * before any classes are loaded
 * Note: Since the config file data is cached it doesn't
 * hurt to load it here.
 */
	if ( ! empty($assign_to_config['subclass_prefix']))
	{
		get_config(array('subclass_prefix' => $assign_to_config['subclass_prefix']));
	}

/*
 * ------------------------------------------------------
 *  Should we use a Composer autoloader?
 * ------------------------------------------------------
 */
	if ($composer_autoload = config_item('composer_autoload'))
	{
		if ($composer_autoload === TRUE)
		{
			file_exists(APPPATH.'vendor/autoload.php')
				? require_once(APPPATH.'vendor/autoload.php')
				: log_message('error', '$config[\'composer_autoload\'] is set to TRUE but '.APPPATH.'vendor/autoload.php was not found.');
		}
		elseif (file_exists($composer_autoload))
		{
			require_once($composer_autoload);
		}
		else
		{
			log_message('error', 'Could not find the specified $config[\'composer_autoload\'] path: '.$composer_autoload);
		}
	}

/*
 * ------------------------------------------------------
 *  Start the timer... tick tock tick tock...
 * ------------------------------------------------------
 */
	$BM =& load_class('Benchmark', 'core');
	$BM->mark('total_execution_time_start');
	$BM->mark('loading_time:_base_classes_start');

/*
 * ------------------------------------------------------
 *  Instantiate the hooks class
 * ------------------------------------------------------
 */
	$EXT =& load_class('Hooks', 'core');

/*
 * ------------------------------------------------------
 *  Is there a "pre_system" hook?
 * ------------------------------------------------------
 */
	$EXT->call_hook('pre_system');

/*
 * ------------------------------------------------------
 *  Instantiate the config class
 * ------------------------------------------------------
 *
 * Note: It is important that Config is loaded first as
 * most other classes depend on it either directly or by
 * depending on another class that uses it.
 *
 */
	$CFG =& load_class('Config', 'core');

	// Do we have any manually set config items in the index.php file?
	if (isset($assign_to_config) && is_array($assign_to_config))
	{
		foreach ($assign_to_config as $key => $value)
		{
			$CFG->set_item($key, $value);
		}
	}

/*
 * ------------------------------------------------------
 * Important charset-related stuff
 * ------------------------------------------------------
 *
 * Configure mbstring and/or iconv if they are enabled
 * and set MB_ENABLED and ICONV_ENABLED constants, so
 * that we don't repeatedly do extension_loaded() or
 * function_exists() calls.
 *
 * Note: UTF-8 class depends on this. It used to be done
 * in it's constructor, but it's _not_ class-specific.
 *
 */
	$charset = strtoupper(config_item('charset'));
	ini_set('default_charset', $charset);

	if (extension_loaded('mbstring'))
	{
		define('MB_ENABLED', TRUE);
		// mbstring.internal_encoding is deprecated starting with PHP 5.6
		// and it's usage triggers E_DEPRECATED messages.
		@ini_set('mbstring.internal_encoding', $charset);
		// This is required for mb_convert_encoding() to strip invalid characters.
		// That's utilized by CI_Utf8, but it's also done for consistency with iconv.
		mb_substitute_character('none');
	}
	else
	{
		define('MB_ENABLED', FALSE);
	}

	// There's an ICONV_IMPL constant, but the PHP manual says that using
	// iconv's predefined constants is "strongly discouraged".
	if (extension_loaded('iconv'))
	{
		define('ICONV_ENABLED', TRUE);
		// iconv.internal_encoding is deprecated starting with PHP 5.6
		// and it's usage triggers E_DEPRECATED messages.
		@ini_set('iconv.internal_encoding', $charset);
	}
	else
	{
		define('ICONV_ENABLED', FALSE);
	}

	if (is_php('5.6'))
	{
		ini_set('php.internal_encoding', $charset);
	}

/*
 * ------------------------------------------------------
 *  Load compatibility features
 * ------------------------------------------------------
 */

	require_once(BASEPATH.'core/compat/mbstring.php');
	require_once(BASEPATH.'core/compat/hash.php');
	require_once(BASEPATH.'core/compat/password.php');
	require_once(BASEPATH.'core/compat/standard.php');

/*
 * ------------------------------------------------------
 *  Instantiate the UTF-8 class
 * ------------------------------------------------------
 */
	$UNI =& load_class('Utf8', 'core');

/*
 * ------------------------------------------------------
 *  Instantiate the URI class
 * ------------------------------------------------------
 */
	$URI =& load_class('URI', 'core');

/*
 * ------------------------------------------------------
 *  Instantiate the routing class and set the routing
 * ------------------------------------------------------
 */
	$RTR =& load_class('Router', 'core', isset($routing) ? $routing : NULL);

/*
 * ------------------------------------------------------
 *  Instantiate the output class
 * ------------------------------------------------------
 */
	$OUT =& load_class('Output', 'core');

/*
 * ------------------------------------------------------
 *	Is there a valid cache file? If so, we're done...
 * ------------------------------------------------------
 */
	if ($EXT->call_hook('cache_override') === FALSE && $OUT->_display_cache($CFG, $URI) === TRUE)
	{
		exit;
	}

/*
 * -----------------------------------------------------
 * Load the security class for xss and csrf support
 * -----------------------------------------------------
 */
	$SEC =& load_class('Security', 'core');

/*
 * ------------------------------------------------------
 *  Load the Input class and sanitize globals
 * ------------------------------------------------------
 */
	$IN	=& load_class('Input', 'core');

/*
 * ------------------------------------------------------
 *  Load the Language class
 * ------------------------------------------------------
 */
	$LANG =& load_class('Lang', 'core');

/*
 * ------------------------------------------------------
 *  Load the app controller and local controller
 * ------------------------------------------------------
 *
 */
	// Load the base controller class
	require_once BASEPATH.'core/Controller.php';

	/**
	 * Reference to the CI_Controller method.
	 *
	 * Returns current CI instance object
	 *
	 * @return object
	 */
	function &get_instance()
	{
		return CI_Controller::get_instance();
	}

	if (file_exists(APPPATH.'core/'.$CFG->config['subclass_prefix'].'Controller.php'))
	{
		require_once APPPATH.'core/'.$CFG->config['subclass_prefix'].'Controller.php';
	}

	// Set a mark point for benchmarking
	$BM->mark('loading_time:_base_classes_end');

/*
 * ------------------------------------------------------
 *  Sanity checks
 * ------------------------------------------------------
 *
 *  The Router class has already validated the request,
 *  leaving us with 3 options here:
 *
 *	1) an empty class name, if we reached the default
 *	   controller, but it didn't exist;
 *	2) a query string which doesn't go through a
 *	   file_exists() check
 *	3) a regular request for a non-existing page
 *
 *  We handle all of these as a 404 error.
 *
 *  Furthermore, none of the methods in the app controller
 *  or the loader class can be called via the URI, nor can
 *  controller methods that begin with an underscore.
 */
	
	
	
	$e404 = FALSE;
	$class = ucfirst($RTR->class);
	$method = $RTR->method;
	$maping_index = false;

	if (empty($class) OR ! file_exists(APPPATH.'controllers/'.$RTR->directory.$class.'.php'))
	{
		$e404 = TRUE;
	}
	else
	{
		require_once(APPPATH.'controllers/'.$RTR->directory.$class.'.php');

		if ( ! class_exists($class, FALSE) OR $method[0] === '_' OR method_exists('CI_Controller', $method))
		{
			$e404 = TRUE;
		}
		elseif (method_exists($class, '_remap'))
		{
			$params = array($method, array_slice($URI->rsegments, 2));
			$method = '_remap';
		}
		// WARNING: It appears that there are issues with is_callable() even in PHP 5.2!
		// Furthermore, there are bug reports and feature/change requests related to it
		// that make it unreliable to use in this context. Please, DO NOT change this
		// work-around until a better alternative is available.
		elseif ( ! in_array(strtolower($method), array_map('strtolower', get_class_methods($class)), TRUE)) {
			// $e404 = TRUE;
			$maping_index = true;
			$RTR->set_method('index');
			$method = 'index';
			if ( ! in_array(strtolower($method), array_map('strtolower', get_class_methods($class)), TRUE)) {
				$e404 = TRUE;
				$maping_index = false;
			}
		}
	}

	if ($e404)
	{
		if ( ! empty($RTR->routes['404_override']))
		{
			if (sscanf($RTR->routes['404_override'], '%[^/]/%s', $error_class, $error_method) !== 2)
			{
				$error_method = 'index';
			}

			$error_class = ucfirst($error_class);

			if ( ! class_exists($error_class, FALSE))
			{
				if (file_exists(APPPATH.'controllers/'.$RTR->directory.$error_class.'.php'))
				{
					require_once(APPPATH.'controllers/'.$RTR->directory.$error_class.'.php');
					$e404 = ! class_exists($error_class, FALSE);
				}
				// Were we in a directory? If so, check for a global override
				elseif ( ! empty($RTR->directory) && file_exists(APPPATH.'controllers/'.$error_class.'.php'))
				{
					require_once(APPPATH.'controllers/'.$error_class.'.php');
					if (($e404 = ! class_exists($error_class, FALSE)) === FALSE)
					{
						$RTR->directory = '';
					}
				}
			}
			else
			{
				$e404 = FALSE;
			}
		}

		// Did we reset the $e404 flag? If so, set the rsegments, starting from index 1
		if ( ! $e404)
		{
			$class = $error_class;
			$method = $error_method;

			$URI->rsegments = array(
				1 => $class,
				2 => $method
			);
		}
		else
		{
			show_404($RTR->directory.$class.'/'.$method);
		}
	}

	if ($method !== '_remap')
	{
		if($maping_index){
			$params = array_slice($URI->rsegments, 1);
		} else {
			$params = array_slice($URI->rsegments, 2);
		}	
	}

/*
 * ------------------------------------------------------
 *  Is there a "pre_controller" hook?
 * ------------------------------------------------------
 */
	$EXT->call_hook('pre_controller');

/*
 * ------------------------------------------------------
 *  Instantiate the requested controller
 * ------------------------------------------------------
 */
	// Mark a start point so we can benchmark the controller
	$BM->mark('controller_execution_time_( '.$class.' / '.$method.' )_start');

	$CI = new $class();

/*
 * ------------------------------------------------------
 *  Is there a "post_controller_constructor" hook?
 * ------------------------------------------------------
 */
	$EXT->call_hook('post_controller_constructor');

/*
 * ------------------------------------------------------
 *  Call the requested method
 * ------------------------------------------------------
 */
	call_user_func_array(array(&$CI, $method), $params);

	// Mark a benchmark end point
	$BM->mark('controller_execution_time_( '.$class.' / '.$method.' )_end');

/*
 * ------------------------------------------------------
 *  Is there a "post_controller" hook?
 * ------------------------------------------------------
 */
	$EXT->call_hook('post_controller');

/*
 * ------------------------------------------------------
 *  Send the final rendered output to the browser
 * ------------------------------------------------------
 */
	if ($EXT->call_hook('display_override') === FALSE)
	{
		$OUT->_display();
	}

/*
 * ------------------------------------------------------
 *  Is there a "post_system" hook?
 * ------------------------------------------------------
 */
	$EXT->call_hook('post_system');
?>