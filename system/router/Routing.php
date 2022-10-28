<?php
namespace system\router;
use application\model\Category;
use ReflectionMethod;
use system\traits\mytrait;
class Routing{
    use mytrait;
    private $current_route;
    public function __construct()
    {
        global $current_url;
       // echo $current_url;
        $current_route=$this->current_route=explode('/',$current_url);

        //echo $current_route[0]."<br>"; // خونه صفرم میشه کلاس
        //echo $current_route[1]."<br>"; // خونه یکم میشه متد
        //echo $current_route[2]."<br>"; // خونه دوم هم پارامتر های احتمالی
        /*if ($current_route[0] == ""){
            $cat = new Category();
            $categories = $cat->all();
            $this->view('app.index',compact('categories'));die();
        }*/

    }

    public function run()
    {


            //echo dirname(__FILE__);
        //echo realpath(dirname(__FILE__));
        $path=realpath(dirname(__FILE__)."/../../application/controller/".$this->current_route[0].".php");
        if(!file_exists($path)){
            echo "404 - صفحه مورد نظر پیدا نشد"; die();
        }

        sizeof($this->current_route) == 1 ? $method='index' : $method=$this->current_route[1];

        $class="application\controller\\".$this->current_route[0];
        $object=new $class();
        if (method_exists($object,$method)) {
            $reflection=new ReflectionMethod($class,$method);
            $parametercount= $reflection->getNumberOfParameters();
            if($parametercount <=  count(array_slice($this->current_route,2))){
                call_user_func_array(array($object,$method), array_slice($this->current_route,2));
            }
            else {
                echo "404 - پارامتری برای متد وجود ندارد";
            }
        }
        else{
            echo "404 - متد مورد نظر وجود ندارد";
        }
    }
}