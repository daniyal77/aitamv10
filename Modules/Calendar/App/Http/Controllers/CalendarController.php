<?php

namespace Modules\Calendar\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $userId = Auth::user()->RoleId;
        $caldeners = Cache::remember('caldeners' . $userId, env('CASH_EXPIRE'), function () use ($userId) {
            return Calendar::where('unit_id', $userId)->get()->map->only('name', 'date');
        });
        return view('calendar::client.index', compact('caldeners'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $post = [
            'date' => $request->start_date,
            'name' => $request->desc,
            'unit_id' => Auth::user()->RoleId,
        ];
        Calendar::create($post);
        return true;
    }
}
