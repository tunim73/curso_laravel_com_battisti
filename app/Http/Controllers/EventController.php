<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class EventController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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
  public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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

    $user = auth()->user();
    $userId = $user->id;

    $data['user_id'] = $userId;

    Event::create($data);

    return redirect('/')->with('msg', "Evento criado com sucesso");
  }

  /**
   * Display the specified resource.
   */
  public function show($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
  {
    $event = Event::findOrFail($id);
    return view('events.show', ['event' => $event]);
  }

  public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
  {

    $user = auth()->user();

    $events = $user->events;

    return view(
      'events.dashboard',
      ['events' => $events]
    );

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
