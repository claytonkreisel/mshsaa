<?php

    class MSHSAA_Framework {

        public static function init(){

            //self::load_html_dom();
            self::load_fetch();

        }

        private static function load_html_dom(){
            include INC_DIR . "/_framework/simple_html_dom.php";
        }

        private static function load_fetch(){
            include INC_DIR . "/_framework/fetch.php";
        }

    }

    MSHSAA_Framework::init();
