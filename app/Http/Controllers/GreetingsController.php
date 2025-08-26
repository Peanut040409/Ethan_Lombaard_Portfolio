<?php

namespace App\Http\Controllers;

use App\Models\Greeting;
use Illuminate\Http\Request;

class GreetingsController extends Controller
{
    public function index() {
        $greetings = Greeting::all();
        return view('admin.greetings.index', ['greetings' => $greetings]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'greeting' => 'required|string|max:255',
            'language' => 'required|string|max:100',
        ]);

        Greeting::create([
            'greeting' => $validated['greeting'],
            'language' => $validated['language'],
        ]);

        return redirect()->route('admin.greetings.index');   
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'greeting' => 'required|string|max:255',
            'language' => 'required|string|max:100',
        ]);

        $greeting = Greeting::findOrFail($id);

        $greeting->greeting = $validated['greeting'];
        $greeting->language = $validated['language'];

        $greeting->save();

        return redirect()->route('admin.greetings.index');
    }

    public function destroy($id) {
        $greeting = Greeting::findOrFail($id);
        $greeting->delete();

        return redirect()->route('admin.greetings.index');
    }
}