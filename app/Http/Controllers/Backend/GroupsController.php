<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Group;
use DB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        if ($request->input('search') == null) {
            $groups = Group::all();
        } else {
            $search_string = $request->input('search');
            $groups = DB::table('groups')
                ->select('groups.*')
                ->where('groups.group_name', 'LIKE', "%$search_string%")->get();
        }

        return view('backend.groups.groups', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(){
        return view('backend.groups.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request){
        $group_name = $request->input('group_name');
        $group_active = $request->input('group_active') == "on";

        Group::create([
            'group_name' => $group_name,
            'group_active' => $group_active,
        ]);

        return redirect()->back()->with('message', 'Gruppe wurde erstellt.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $gid
     *
     * @return Application|Factory|View
     */
    public function edit($gid){
        $groups = Group::where('id', '=', $gid)->first();

        return view('backend.groups.edit', ['groups' => $groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $gid
     *
     * @return RedirectResponse
     */
    public function update(Request $request, $gid){
        $group_name = $request->input('group_name');
        $group_active = $request->input('group_active') == 'on';

        DB::table('groups')->where('id', '=', $gid)->update(['group_name' => $group_name, 'group_active' => $group_active]);

        return redirect()->back()->with('message', 'Gruppe wurde aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $gid
     *
     * @return RedirectResponse
     */
    public function destroy($gid){
        DB::table('groups')->where('id', '=', $gid)->delete();

        return redirect()->back()->with('message', 'Gruppe erfolgreich gelöscht.');
    }
}
