<?php 
class Controller
{
    public function model($model)
    {
        require_once "./mvc/models/".trim($model).".php";
        return new $model;
    }

    public function view($view, $data=[])
    {
    	require_once './mvc/view/'.$view.'.php';
    }
}
?>