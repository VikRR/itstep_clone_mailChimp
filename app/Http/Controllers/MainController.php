<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
  /**
   * MainController constructor.
   */
  public function __construct(){
    $this->middleware('auth');
  }

  public function index(){
      return view('main');
    }
}
