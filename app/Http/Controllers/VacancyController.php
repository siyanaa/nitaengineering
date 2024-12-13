<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ImageConverter;

class VacancyController extends Controller 
{
    public function index()
    {
        $vacancies = Vacancy::all();
        $page_title = 'Vacancy';
        return view('admin.vacancy.index', compact('vacancies','page_title'));
    }

    public function create()
    {
        return view('admin.vacancy.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5555',
            'vacancy_name' => 'required|string|max:255',
            'number_of_people_required' => 'required|integer|min:1',
        ]);

        $image = $request->file('image');
        $folderPath = 'uploads/vacancy/';
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path($folderPath), $filename);
        $path = $folderPath . $filename;

        $vacancy = Vacancy::create([
            'title' => $request->title,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'content' => $request->content,
            'image' => $path,
            'vacancy_name' => $request->vacancy_name, 
            'number_of_people_required' => $request->number_of_people_required,
            'description' => $request->content, // Make sure this field exists in your vacancy table
        ]);

        session()->put('show_vacancy_popup', true);
        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy created successfully');
    }

    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.vacancy.update', compact('vacancy'));
    }

    public function update(Request $request, $id) 
    {
        $vacancy = Vacancy::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'vacancy_name' => 'required|string|max:255',
            'number_of_people_required' => 'required|integer|min:1',
        ]);

        $path = $vacancy->image;

        if ($request->hasFile('image')) {
            if (file_exists(public_path($vacancy->image))) {
                unlink(public_path($vacancy->image));
            }

            $image = $request->file('image');
            $folderPath = 'uploads/vacancy/';
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($folderPath), $filename);
            $path = $folderPath . $filename;
        }

        $vacancy->update([
            'title' => $request->title,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'content' => $request->content,
            'image' => $path,
            'vacancy_name' => $request->vacancy_name,
            'number_of_people_required' => $request->number_of_people_required,
            'description' => $request->content, // Make sure this field exists in your vacancy table
        ]);

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy updated successfully');
    }

    public function destroy($id) 
    {
        $vacancy = Vacancy::findOrFail($id);
        if (file_exists(public_path($vacancy->image))) {
            unlink(public_path($vacancy->image));
        }
        $vacancy->delete();

        return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy deleted successfully');
    }
}