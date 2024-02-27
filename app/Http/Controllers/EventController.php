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
    $search = request('search');

    if ($search) {
      $events = Event::where([['title', 'like', '%' . $search . '%']])->get();
    } else {
      $events = Event::all();
    }


    return view('welcome', ['events' => $events, 'search' => $search]);
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

    $data = $request->all();

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
      $requestImage = $request->image;

      $extension = $requestImage->extension();

      $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

      $requestImage->move(public_path('img/events'), $imageName);

      $data['image'] = $imageName;
    } else {
      $data['image'] = '';
    }

    Event::create($data);

    return redirect('/')->with('msg', "Evento criado com sucesso");
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $event = Event::findOrFail($id);
    return view('events.show', ['event' => $event]);
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
