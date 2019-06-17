<?php
namespace App\Helpers\RynxHelper;

class ViewTemplate {
    
    public static function view_with($template="template",$view="not_found",$data=array())
    {
        $data['rynx_view']=$view;
        return view($template,$data);
    }

    public static function view($view="not_found",$data=array())
    {
        return ViewTemplate::view_with('template',$view,$data);
    }
}