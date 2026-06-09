<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    // 📌 Show all phones
    public function index()
    {
        $phones = Phone::all();
        return view('admin.phones.index', compact('phones'));
    }

    // 📌 Show create form
    public function create()
    {
        return view('admin.phones.create');
    }

    // 📌 Store new phone
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        // ✅ Only allow needed fields
        $data = $request->only(['name', 'brand', 'price']);

        // ✅ Handle Modern / New Phone checkbox
        $data['is_new'] = $request->has('is_new');

        // ✅ Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/phones'), $imageName);
            $data['image'] = $imageName;
        }

        Phone::create($data);

        return redirect('/admin/phones')
            ->with('success', 'Phone added successfully');
    }

    // 📌 Show edit form
    public function edit($id)
    {
        $phone = Phone::findOrFail($id);
        return view('admin.phones.edit', compact('phone'));
    }

    // 📌 Update phone
    public function update(Request $request, $id)
    {
        $phone = Phone::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        // ✅ Only allow needed fields
        $data = $request->only(['name', 'brand', 'price']);

        // ✅ Handle Modern / New Phone checkbox
        $data['is_new'] = $request->has('is_new');

        // ✅ Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/phones'), $imageName);
            $data['image'] = $imageName;
        }

        $phone->update($data);

        return redirect('/admin/phones')
            ->with('success', 'Phone updated successfully');
    }

    // 📌 Delete phone
    public function destroy($id)
    {
        Phone::destroy($id);
        return redirect('/admin/phones')
            ->with('success', 'Phone deleted successfully');
    }
}