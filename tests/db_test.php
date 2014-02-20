<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

                    $title = "Spring in action";
                    
                   $mysqli = mysqli_connect('localhost', 'webuser', 'password', 'demodb');
                    $sql = "SELECT * FROM tbl_books WHERE title='".$title."'";
                    $res = mysqli_query($mysqli, $sql);
                    $book = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    
                    echo $book['title'];
?>