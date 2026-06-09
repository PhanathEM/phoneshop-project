<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Phone::query();

        //  Search by name and brand
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('brand', 'LIKE', '%' . $request->search . '%');
            });
        }

        //  Filter by brand
        if ($request->brand) {
            $query->where('brand', $request->brand);
        }

        //  Main product list (with pagination)
        $phones = $query->latest()->paginate(24);

        //  Modern New Phones (ONLY for homepage, no search)
        $newPhones = collect(); // default empty

        if (!$request->search && !$request->brand) {
            $newPhones = Phone::where('is_new', true)
                ->latest()
                ->take(10)
                ->get();
        }

        return view('user.shop.index', compact('phones', 'newPhones'));
    }

    public function show($id)
    {
        $phone = Phone::findOrFail($id);
        return view('user.shop.show', compact('phone'));
    }
}