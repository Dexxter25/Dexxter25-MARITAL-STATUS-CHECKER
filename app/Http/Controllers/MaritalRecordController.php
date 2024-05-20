<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaritalRecord;

class MaritalRecordController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'birthdate' => 'required|date',
            'civil_status' => 'required|string',
            'religion' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
            'mother_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'citizenship' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
        ]);

        // Create a new record
        MaritalRecord::create($validatedData);

        $records = MaritalRecord::all();
    return view('main.records', ['records' => $records])->with('success', 'Record saved successfully!');

    }

    public function records()
    {
        $records = MaritalRecord::all();
        return view('main.records', ['records' => $records]);
    }

    public function destroy($id)
    {
        $record = MaritalRecord::findOrFail($id);
        $record->delete();
        return redirect()->route('main.records')->with('success', 'Record deleted successfully!');
    }

    public function view($id)
    {
        $view = MaritalRecord::findOrFail($id);
        return view('main.view', ['view' => $view]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'birthdate' => 'required|date',
            'civil_status' => 'required|string',
            'religion' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
            'mother_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'citizenship' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
        ]);

        $view = MaritalRecord::find($id);
        $view->fill($validatedData);
        $view->save();

        return redirect()->route('main.view', ['id' => $id])->with('success', 'Record updated successfully.');
    }
}
