<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TechnicianController extends Controller
{
    public function index()
    {
        $technicians = User::where('role', 'petugas')->get();
        return view('technicians.index', compact('technicians'));
    }

    // Add other CRUD methods here

    public function edit(User $technician)
    {
        return view('technicians.edit', compact('technician'));
    }

    public function update(Request $request, User $technician)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'nik' => 'required',
            // Add validation rules as needed
        ]);

        $technician->update($request->all());

        return redirect()->route('technicians.index')->with('success', 'Technician updated successfully.');
    }

    public function destroy(User $technician)
    {
        $technician->delete();
        return redirect()->route('technicians.index')->with('success', 'Technician deleted successfully.');
    }
}