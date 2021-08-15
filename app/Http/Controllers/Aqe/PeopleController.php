<?php

namespace App\Http\Controllers\Aqe;

use App\Http\Controllers\Controller;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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
            "people" => People::query()->orderBy('id')->paginate(10)
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
        $this->getValidate($request, $id);
        $people = People::find($id);
        $people->firstname = $request->input('firstname');
        $people->lastname = $request->input('lastname');
        $people->street = $request->input('street');
        $people->postalCode = $request->input('postalCode');
        $people->city = $request->input('city');
        $people->save();
        $request->session()->flash('success', 'Person updated successfully!');
        return redirect()->route('people.index');
    }

    public function show() {
        return Inertia::render('Peoples/Index', [
            "people" => People::query()->orderBy('id', 'DESC')->paginate(10)
        ]);
    }

    public function delete_view($id)
    {
        return Inertia::render('Peoples/Delete', [
            'people' => People::query()->findOrFail($id)
        ]);
    }

    public function delete(Request $request, $id)
    {
        $people = People::find($id);
        $people->delete();
        $request->session()->flash('success', 'Person removed successfully!');
        return redirect()->route('people.index');
    }



    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @throws ValidationException
     */
    private function getValidate(Request $request): void
    {
        $data = [
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'postalCode' => 'required',
            'city' => 'required'
        ];
        $this->validate($request, $data);
    }

}
