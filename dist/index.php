<?php

    //Define Needed Constants
    define('APP_DIR', getcwd());
    define('INC_DIR', APP_DIR . '/inc');

    class MSHSAA {

        //Load App
        public static function init(){

            self::load_framework();

        }

        private static function load_framework(){
            include INC_DIR . '/_framework/_framework.php';
        }


    }

    MSHSAA::init();

    $test = new MSHSAA_Fetch('schools');
    echo '<pre>';
    print_r($test);
    echo '</pre>';
