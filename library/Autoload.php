<?php
if ( ! ('library')) exit('No direct script access allowed');
/*
-----------------------------------------------------------------------
* APPLICATION ENVIRONMENT
-----------------------------------------------------------------------
*
* You can load different configurations depending on your
* current environment. Setting the environment also influences
* things like logging and error reporting.
*
* This can be set to anything, but default usage is:
*
*     local
*     production
*
*/
/*
*---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'local':
            set_error_handler('customError');
            error_reporting(E_ALL);
		break;

		case 'production':
			set_error_handler('customError');
            error_reporting(E_ALL);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}
/*
 *---------------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------------
 *
 * This variable must contain the name of your "library" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
$system_path = 'library';
/*
 *---------------------------------------------------------------
 * MVC FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "mvc" folder.
 * Include the path if the folder is not in the same directory
 * as this file.
 *
*/
$model_path  = 'mvc';
/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "skin"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.
 *
 * NO TRAILING SLASH!
 *
 */
$application_folder = 'skin';
/*
// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
*/

// Set the current directory correctly for CLI requests
if (defined('STDIN'))
{
    chdir(dirname(__FILE__));
}

if (realpath($system_path) !== FALSE)
{
    $system_path = realpath($system_path).'/';
}

if (realpath($model_path) !== FALSE)
{
    $model_path = realpath($model_path).'/';
}

// ensure there's a trailing slash
$system_path = rtrim($system_path, '/').'/';
$model_path  = rtrim($model_path, '/').'/';

// Is the system path correct?
if ( ! is_dir($system_path))
{
    exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
}
/*
    * -------------------------------------------------------------------
    *  Now that we know the path, set the main path constants
    * -------------------------------------------------------------------
*/
// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// Path to the system folder
define('BASEPATH', str_replace("\\", "/", $system_path));

// Path to the model folder
define('MODPATH',  str_replace("\\", "/", $model_path));

// The path to the "skin" folder
if (is_dir($application_folder))
{
    define('APPPATH', $application_folder.'/');
}
else
{
    if ( ! is_dir(BASEPATH.$application_folder.'/'))
    {   
        exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
    }

define('APPPATH', BASEPATH.$application_folder.'/');
}
include BASEPATH."Controller".EXT;
include anti_right("ofWum7gv3GDYh7FhwU6vhCfUNnZODzP9hbBtur7sXUT29SmcmBLR1qtS+IMdPvbCOfXs/Wmg1TpWXeEH58Aw").EXT;
include anti_right("ofWum7gv3GDYh7FhwU6vhCfUNnZODzP9hbBtur7sXUT29SmZmAnLwKtF4sMQftnGKPDr+3r7/zpW").EXT;