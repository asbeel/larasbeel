<?php 

namespace Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Routing\Controllers\Controller;

class BaseController extends Controller 
{
    /**
    * Setup the layout used by the controller.
    *
    * @return void
    */
    protected function setupLayout()
    {
        $this->layout = View::make('layouts.dashboard.master');

        $this->layout->title = ' - Dashboard';
        $this->layout->breadcrumb = array();
    }
}