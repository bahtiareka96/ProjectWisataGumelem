<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function show(string $id)
    // {
    //     $items = User::findOrFail($id);
    //     return view('pages.user.index', [
    //         'items' => $items
    //     ]);
    // }

    public function show(string $id)
    {
        $items = User::findOrFail($id);
        return view('pages.users.show', [
            'items' => $items
        ]);
    }

    public function edit(string $id)
    {
        $item = User::findOrFail($id);

        return view('pages.users.edit', [
            'item' => $item
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        $data = $request ->all();

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        $item = User::findOrFail($id);

        $item->update($data);
        return redirect()->route('users.show', $item);
    }
}
