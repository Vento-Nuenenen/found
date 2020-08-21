<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Group;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        if ($request->input('search') == null) {
            $events = Event::all();
        } else {
            $search_string = $request->input('search');
            $events = DB::table('events')
                ->select('events.*')
                ->where('events.event_name', 'LIKE', "%$search_string%")->get();
        }

        return view('backend.events.events', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.events.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $group_name = $request->input('group_name');
        $group_active = $request->input('group_active');

        Group::create([
            'group_name' => $group_name,
            'group_active' => $group_active,
        ]);

        return redirect()->back()->with('message', 'Event wurde erstellt.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $eid
     *
     * @return Application|Factory|View
     */
    public function edit($eid)
    {
        $groups = Group::where('id', '=', $eid)->first();

        return view('backend.groups.edit', ['groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $eid
     *
     * @return RedirectResponse
     */
    public function update(Request $request, $eid)
    {
        $event_name = $request->input('event_name');
        $event_date = $request->input('event_date');

        DB::table('events')->where('id', '=', $eid)->update([
            'event_name' => $event_name,
            'event_date' => $event_date
        ]);

        return redirect()->back()->with('message', 'Event wurde aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $eid
     *
     * @return RedirectResponse
     */
    public function destroy($eid)
    {
        DB::table('events')->where('id', '=', $eid)->delete();

        return redirect()->back()->with('message', 'Event erfolgreich gelöscht.');
    }
}
