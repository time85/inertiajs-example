<?php

namespace App\Http\Controllers\Aqe;

use App\Http\Controllers\Controller;
use App\Models\Aqe\People;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PeopleController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return Inertia::render('Peoples/Index', [
            "people" => People::query()->orderBy('id', 'DESC')->paginate(10)
        ]);
    }


    public function create()
    {
        return Inertia::render('Peoples/Create');
    }



    public function edit($id)
    {
        return Inertia::render('Peoples/Edit', [
            'people' => People::query()->findOrFail($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
