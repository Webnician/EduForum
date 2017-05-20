<?php
/**
 * Created by PhpStorm.
 * User: olafbroms
 * Date: 5/20/2017
 * Time: 12:21 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeScreenController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }
}