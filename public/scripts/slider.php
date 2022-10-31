<?php

define('IMGDIR', 'about/');

define('WEBIMGDIR', 'about/');
// set session name for galleries "cookie"
define('SS_SESSNAME', 'galleries_sess');
$err = '';
session_name(SS_SESSNAME);
session_start();

// init galleries class
$ss = new galleries($err);
if (($err = $ss->init()) != '')
{
	header('HTTP/1.1 500 Internal Server Error');
	echo $err;
	exit();
}

$ss->get_images();

list($is_active, $img_cpt_name, $first, $prev, $next, $last) = $ss->run();
/*
    galleries class, can be used stand-alone
*/
class galleries
{
    private $gallerise_array = NULL;
    private $err = NULL;

    public function __construct(&$err)
    {
        $this->gallerise_array = array();
        $this->err = $err;
    }
    public function init()
    {
        // run actions only if img array session var is empty
        // check if image directory exists
        if (!$this->dir_exists())
        {
            return 'Error retrieving images, missing directory';
        }
        return '';
    }
    public function get_images()
    {
        if (isset($_SESSION['imgarr']))
        {
                $this->gallerise_array = $_SESSION['imgarr'];
        }
        else
        {
            if ($dh = opendir(IMGDIR))
            {
                while (false !== ($file = readdir($dh)))
                {
                    if (preg_match('/^.*\.(jpg|jpeg|gif|png)$/i', $file))
                    {
                        $this->gallerise_array[] = $file;
                    }
                }
                closedir($dh);
            }
            $_SESSION['imgarr'] = $this->gallerise_array;
        }
    }
    public function run()
    {
        $is_active = 1;
        $last = count($this->gallerise_array);
        if (isset($_GET['img']))
        {
            if (preg_match('/^[0-9]+$/', $_GET['img'])) $is_active = (int)  $_GET['img'];
            if ($is_active <= 0 || $is_active > $last) $is_active = 1;
        }
        if ($is_active <= 1)
        {
            $prev = $is_active;
            $next = $is_active + 1;
        }
        else if ($is_active >= $last)
        {
            $prev = $last - 1;
            $next = $last;
        }
        else
        {
            $prev = $is_active - 1;
            $next = $is_active + 1;
        }
        // line below sets the img_cpt_name name...
        $img_cpt_name = str_replace('-', ' ', $this->gallerise_array[$is_active - 1]);
        $img_cpt_name = str_replace('_', ' ', $img_cpt_name);
        $img_cpt_name = preg_replace('/\.(jpe?g|gif|png)$/i', '', $img_cpt_name);
        $img_cpt_name = ucfirst($img_cpt_name);
        return array($this->gallerise_array[$is_active - 1], $img_cpt_name, 1, $prev, $next, $last);
    }
    private function dir_exists()
    {
        return file_exists(IMGDIR);
    }
}
?>