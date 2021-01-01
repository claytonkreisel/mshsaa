<?php

    class MSHSAA_Fetch {

        public $current_url = false;
        public $last_url = false;
        public $dom = false;

        public function __construct($url = false){
            if(!$url) return $this;
            switch($url) {
                case "schools":
                    return $this->load_schools();
                    break;
                default:
                    return $this->load_dom($url);
                    break;
            }
        }

        public function load_dom($url = false){
            if(!$url) return false;
            if($this->current_url) $this->last_url = $this->current_url;
            $this->current_url = $url;
            $stream_opts = [
                "ssl" => [
                    "verify_peer"=>false,
                    "verify_peer_name"=>false,
                ]
            ];
            $html = file_get_contents($url, false, stream_context_create($stream_opts));
            $this->dom = new DOMDocument;
            libxml_use_internal_errors(true);
            $this->dom = $this->dom->loadHTML($html);
            libxml_clear_errors();
            print_r($this->dom->documentElement);
        }

        public function load_schools(){
            $this->load_dom('https://www.mshsaa.org/About/MemberSchools.aspx');
        }

        public function get_dom(){
            return $this->dom;
        }

        public function get_current_url(){
            return $this->current_url;
        }

        public function get_last_url(){
            return $this->last_url;
        }

    }
