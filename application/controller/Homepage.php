<?php

namespace application\controller;

class Homepage extends Controller
{
    public function index()
    {
        $this->route("user/index");
}
}