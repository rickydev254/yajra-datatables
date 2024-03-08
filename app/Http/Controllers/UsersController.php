<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\DataTables\UsersDataTable;

use App\Models\User;
 
class UsersController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Assuming you have a User model

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            // Add validation rules for other fields as needed
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index', $user->id)->with('success', 'User updated successfully.');
    }
}