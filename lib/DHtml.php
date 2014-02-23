<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//session_start();

    class DHtml 
    {
        public static function link($txt, $url) {
            $cmdstr = $url[0];
            $cmdstr .= (isset($url[1]))? "&id=".$url[1] : "";
            
            $url = $_SESSION['WEB_INDEX']."?cmd=".$cmdstr;
            $out = "<a href=\"{$url}\">{$txt}</a>";
            return $out;
        }
    }
?>