<?php

namespace application\controller;

class Widget extends Controller
{
    public function widget_menu($page)
    {
        $this->view("admin.widget.".$page);
    }
}