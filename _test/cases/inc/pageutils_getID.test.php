<?php

require_once DOKU_INC.'inc/pageutils.php';

class init_getID_test extends UnitTestCase {

    /**
     * fetch media files with basedir and urlrewrite=2
     * 
     * data provided by Jan Decaluwe <jan@jandecaluwe.com>
     */
    function test1(){
        global $conf;
        $conf['basedir'] = '//';
        $conf['userewrite'] = 2;
        $conf['deaccent'] = 0; // the default (1) gives me strange exceptions


        $_SERVER['SCRIPT_FILENAME'] = '/lib/exe/fetch.php';
        $_SERVER['REQUEST_URI'] = '/lib/exe/fetch.php/myhdl-0.5dev1.tar.gz?id=snapshots&cache=cache';

        $this->assertEqual(getID('media'), 'myhdl-0.5dev1.tar.gz');
    }


    /**
     * getID with internal mediafile, urlrewrite=2, no basedir set, apache, mod_php
     */
    function test2(){
        global $conf;
        $conf['basedir'] = '';
        $conf['userewrite'] = '2';
        $conf['baseurl'] = '';
        $conf['useslash'] = '1';
        $_SERVER['DOCUMENT_ROOT'] = '/var/www/';
        $_SERVER['HTTP_HOST'] = 'xerxes.my.home';
        $_SERVER['SCRIPT_FILENAME'] = '/var/www/dokuwiki/lib/exe/detail.php';
        $_SERVER['PHP_SELF'] = '/dokuwiki/lib/exe/detail.php/wiki/discussion/button-dw.png';
        $_SERVER['REQUEST_URI'] = '/dokuwiki/lib/exe/detail.php/wiki/discussion/button-dw.png?id=test&debug=1';
        $_SERVER['SCRIPT_NAME'] = '/dokuwiki/lib/exe/detail.php';
        $_SERVER['PATH_INFO'] = '/wiki/discussion/button-dw.png';
        $_SERVER['PATH_TRANSLATED'] = '/var/www/wiki/discussion/button-dw.png';

        $this->assertEqual(getID('media',true), 'wiki:discussion:button-dw.png');
        $this->assertEqual(getID('media',false), 'wiki/discussion/button-dw.png');
    }

}
//Setup VIM: ex: et ts=4 enc=utf-8 :