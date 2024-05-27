<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

Use App\Models\Event;

class EventController extends Controller
{
    public function index() {
     
      $events = Event::all();
      return view("Welcome",['events' => $events]);

    }

    public function create() {
      return view('events.create');
    }

}
