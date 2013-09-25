<?php

namespace Controllers;

use Controllers\BaseController;
use View;
use Input;
use Sentry;
use Redirect;
use Validator;
use Config;
use Response;

class DashboardController extends BaseController
{
    /**
    * Index loggued page
    */
    public function getIndex()
    {
        $this->layout = View::make('dashboard.index');
        $this->layout->title = 'Dashboard';
        $this->layout->breadcrumb = Config::get('breadcrumbs.dashboard');
    }

    /**
    * Login page
    */
    public function getLogin()
    {
        $this->layout = View::make('dashboard.login');
        $this->layout->title = 'Login';
        $this->layout->breadcrumb = Config::get('breadcrumbs.login');
    }

    /**
    * Login post authentication
    */
    public function postLogin()
    {
        try
        {
            $validator = Validator::make(
                Input::all(),
                Config::get('rules.users.login')
            );

            if($validator->fails())
            {
                 return Response::json(array('logged' => false, 'errorMessages' => $validator->messages()->getMessages()));
            }

            $credentials = array(
                'email'    => Input::get('email'),
                'password' => Input::get('pass'),
            );

            // authenticate user
            Sentry::authenticate($credentials, Input::get('remember'));
        }
        catch (\RuntimeException $e)
        {
            return Response::json(array('logged' => false, 'errorMessage' => 'Sorry, login failed... check your credentials.', 'errorType' => 'danger'));
        }

        return Response::json(array('logged' => true));
    }

    /**
    * Logout user
    */
    public function getLogout()
    {
        Sentry::logout();

        return Redirect::route('indexDashboard');
    }

    /**
    * Access denied page
    */
    public function getAccessDenied()
    {
        $this->layout = View::make('dashboard.error', array('message' => 'Sorry, access denied !'));
        $this->layout->title = 'Error';
        $this->layout->breadcrumb = Config::get('breadcrumbs.dashboard');
    }
}