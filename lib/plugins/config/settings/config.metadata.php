<?php
/**
 * Metadata for configuration manager plugin
 *
 * Note:  This file should be included within a function to ensure it 
 *        doesn't class with the settings it is describing.
 *
 * Format:
 *   $meta[<setting name>] = array(<handler class id>,<param name> => <param value>);
 *
 *   <handler class id>  is the handler class name without the "setting_" prefix
 *
 * Defined classes:
 *   Generic
 *   -------------
 *   ''             - default class ('setting'), text input, minimal input validation, setting output in quotes
 *   'numeric'      - text input, accepts numbers and arithmetic operators, setting output without quotes
 *   'onoff'        - checkbox input, setting output  0|1
 *   'multichoice'  - select input (single choice), setting output with quotes, required _choices parameter
 *   'email'        - text input, input must conform to email address format, setting output in quotes
 *   'password'     - password input, minimal input validation, setting output plain text in quotes
 *   'dirchoice'    - as multichoice, selection choices based on folders found at location specified in _dir
 *                    parameter (required)
 *
 *  Single Setting
 *  --------------
 *   'savedir'     - as 'setting', input tested against initpath() (inc/init.php)
 *   'sepchar'     - as multichoice, selection constructed from string of valid values
 *   'authtype'    - as 'setting', input validated against a valid php file at expected location for auth files
 *   'im_convert'  - as 'setting', input must exist and be an im_convert module
 *
 *  Any setting commented or missing will use 'setting' class - text input, minimal validation, quoted output
 *
 * Defined parameters:
 *   '_pattern'    - string, a preg pattern. input is tested against this pattern before being accepted
 *                   optional all classes, except onoff, multichoice & dirchoice which ignore it
 *   '_choices'    - array of choices. used to populate a selection box. choice will be replaced by a localised
 *                   language string, indexed by  <setting name>_o_<choice>, if one exists
 *                   required by 'multichoice' class, ignored by other classes
 *   '_dir'        - location of directory to be used to populate choice list
 *                   required by 'dirchoice' class, ignored by other classes
 *
 * @author    Chris Smith <chris@jalakai.co.uk>
 */
// ---------------[ settings for settings ]------------------------------
$config['format']  = 'php';      // format of setting files, supported formats: php
$config['varname'] = 'conf';     // name of the config variable, sans $

// this string is written at the top of the rewritten settings file,
// !! do not include any comment indicators !!
// this value can be overriden when calling save_settings() method
$config['heading'] = 'Dokuwiki\'s Main Configuration File - Local Settings';

// ---------------[ setting files ]--------------------------------------
// these values can be string expressions, they will be eval'd before use
$file['local']     = "DOKU_CONF.'local.php'";            // mandatory (file doesn't have to exist)
$file['default']   = "DOKU_CONF.'dokuwiki.php'";         // optional
$file['protected'] = "DOKU_CONF.'local.protected.php'";  // optional

// test value (FIXME, remove before publishing)
//$meta['test']     = array('multichoice','_choices' => array(''));  
 
// --------------[ setting metadata ]------------------------------------
// - for description of format and fields see top of file
// - order the settings in the order you wish them to appear
// - any settings not mentioned will come after the last setting listed and 
//   will use the default class with no parameters

$meta['title']    = array('');
$meta['start']    = array('');
$meta['savedir']  = array('savedir');
$meta['lang']     = array('dirchoice','_dir' => DOKU_INC.'inc/lang/');
$meta['template'] = array('dirchoice','_dir' => DOKU_INC.'lib/tpl/');

$meta['umask']    = array('numeric','_pattern' => '/0[0-7]{3}/');  // only accept octal representation
$meta['dmask']    = array('numeric','_pattern' => '/0[0-7]{3}/');  // only accept octal representation
$meta['basedir']  = array('');
$meta['baseurl']  = array('');

$meta['fullpath']    = array('onoff');
$meta['recent']      = array('numeric');
$meta['breadcrumbs'] = array('numeric');
$meta['typography']  = array('onoff');
$meta['htmlok']      = array('onoff');
$meta['phpok']       = array('onoff');
$meta['dformat']     = array('');
$meta['signature']   = array('');
$meta['toptoclevel'] = array('multichoice','_choices' => array(1,2,3,4,5));   // 5 toc levels
$meta['maxtoclevel'] = array('multichoice','_choices' => array(1,2,3,4,5));
$meta['maxseclevel'] = array('multichoice','_choices' => array(0,1,2,3,4,5)); // 0 for no sec edit buttons
$meta['camelcase']   = array('onoff');
$meta['deaccent']    = array('onoff');
$meta['useheading']  = array('onoff');
$meta['refcheck']    = array('onoff');
$meta['refshow']     = array('numeric');
$meta['allowdebug']  = array('onoff');

$meta['usewordblock']= array('onoff');
$meta['indexdelay']  = array('numeric');
$meta['relnofollow'] = array('onoff');
$meta['mailguard']   = array('multichoice','_choices' => array('visible','hex','none'));

$meta['useacl']      = array('onoff');
$meta['openregister']= array('onoff');
$meta['autopasswd']  = array('onoff');
$meta['resendpasswd'] = array('onoff');
$meta['authtype']    = array('authtype');
$meta['passcrypt']   = array('multichoice','_choices' => array('smd5','md5','sha1','ssha','crypt','mysql','my411'));
$meta['defaultgroup']= array('');
$meta['superuser']   = array('');
$meta['profileconfirm'] = array('onoff');

$meta['userewrite']  = array('multichoice','_choices' => array(0,1,2));
$meta['useslash']    = array('onoff');
$meta['sepchar']     = array('sepchar');
$meta['canonical']   = array('onoff');
$meta['autoplural']  = array('onoff');
$meta['usegzip']     = array('onoff');
$meta['cachetime']   = array('numeric');
$meta['purgeonadd']  = array('onoff');
$meta['locktime']    = array('numeric');
$meta['notify']      = array('email');
$meta['mailfrom']    = array('email');
$meta['gdlib']       = array('multichoice','_choices' => array(0,1,2));
$meta['im_convert']  = array('im_convert');
$meta['spellchecker']= array('onoff');
$meta['subscribers'] = array('onoff');
$meta['compress']    = array('onoff');
$meta['hidepages']   = array('');
$meta['send404']     = array('onoff');
$meta['sitemap']     = array('numeric');

$meta['rss_type']    = array('multichoice','_choices' => array('rss','rss1','rss2','atom'));
$meta['rss_linkto']  = array('multichoice','_choices' => array('diff','page','rev','current'));

$meta['target____wiki']      = array('');
$meta['target____interwiki'] = array('');
$meta['target____extern']    = array('');
$meta['target____media']     = array('');
$meta['target____windows']   = array('');

$meta['proxy____host'] = array('','_pattern' => '#^[a-z0-9\-\.+]+?#i');
$meta['proxy____port'] = array('numeric');
$meta['proxy____user'] = array('');
$meta['proxy____pass'] = array('password');
$meta['proxy____ssl']  = array('onoff');

$meta['safemodehack'] = array('onoff');
$meta['ftp____host']  = array('','_pattern' => '#^[a-z0-9\-\.+]+?#i');
$meta['ftp____port']  = array('numeric');
$meta['ftp____user']  = array('');
$meta['ftp____pass']  = array('password');
$meta['ftp____root']  = array('');
