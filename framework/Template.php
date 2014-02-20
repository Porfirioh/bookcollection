<?php

define ("VIEWS_DIR", dirname(__FILE__).'/../views/');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class Template 
    {
        private $file;
        private $data;

        public function __construct($file) {
            $this->file = $file;
            $this->data = array();
        }

        public function assign($var, $val) {
            if ($val != '' && isset($val))
                $this->data[$var] = $val;
        }
        public function setFile($file) {
            $this->file = $file;
        }

        public function asHtml() {
            extract($this->data);
            ob_start();
            
            require_once(VIEWS_DIR."layout/header.php");
            require_once(VIEWS_DIR."layout/sidebar.php");
            
            /* Including content DIV */
            require_once($this->file);
            
            require_once(VIEWS_DIR."layout/footer.php");
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }
    
?>