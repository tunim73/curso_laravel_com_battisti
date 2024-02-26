<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;

class EventController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $events = Event::all();

    return view('welcome', ['events' => $events]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('events.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreEventRequest $request)
  {
    $event = Event::create($request->all());

    return redirect('/');
  }

  /**
   * Display the specified resource.
   */
  public function show(Event $event)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Event $event)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateEventRequest $request, Event $event)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Event $event)
  {
    //
  }
}
