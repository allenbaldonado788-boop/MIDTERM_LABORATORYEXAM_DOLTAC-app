<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $events = CalendarEvent::all();
        return view('calendar', compact('events'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'event_date' => 'required|date',
        'time_slot' => 'required',
        'subject' => 'required',
        'room' => 'required',
    ]);

    CalendarEvent::create($validated);

    return redirect()->back()->with('success', 'Event added successfully!');
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_date' => 'required|date',
            'time_slot' => 'required',
            'subject' => 'required',
            'room' => 'required',
        ]);

        $event = CalendarEvent::findOrFail($id);
        $event->update($request->except(['_token', '_method']));

        return redirect()->back()->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $event = CalendarEvent::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully!');
    }
}