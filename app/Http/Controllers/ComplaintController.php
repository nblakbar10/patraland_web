<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status');
        $query = Complaint::query();

        if ($status) {
            $query->where('status', $status);

        }
        $complaints = $query->leftJoin('users', 'complaints.user_handler_id', '=', 'users.id')
                            ->select('complaints.*', 'users.name as handler_name')
                            ->paginate(10);

        return view('complaints.index', compact('complaints'));
    }

    public function edit(Complaint $complaint)
    {
        return view('complaints.edit', compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint)
    {
        $request->validate([
            'home_address' => 'required|string|max:255',
            'description' => 'required|string',
            // 'status' => 'required|string',
            // Add validation rules as needed
        ]);

        $complaint->update($request->all());

        return redirect()->route('complaints.index')->with('success', 'Complaint updated successfully.');
    }

    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('complaints.index')->with('success', 'Complaint deleted successfully.');
    }

    // public function index()
    // {
    //     $users = User::all();

    //     return view('users.index', compact('users'));
    // }




}
