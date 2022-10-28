<?php

//echo $_SERVER['REQUEST_URI'];
$site_url="http://localhost/khayyam_mvc/";
$goal=explode('?',$_SERVER['REQUEST_URI']);
//echo $goal[0];
$current_url=str_replace('/khayyam_mvc/','',$goal[0]);
//echo $current_url;