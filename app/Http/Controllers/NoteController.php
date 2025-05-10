<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        if (!Gate::allows('notes')) {
            abort(404);
        }
        $color = $request->color;
        $title = $request->title == "desc" ? 'desc' : 'asc';
        $date = $request->date == "old" ? 'asc' : 'desc';
        if (!$request->has(['color', 'title', 'date'])) {
            $notes = Note::where('user_id', Auth::user()->id)->get();
        } elseif ($color == "all") {
            $notes = Note::where('user_id', Auth::user()->id)
                ->orderBy('title', $title)
                ->orderBy('created_at', $date)
                ->get();
        } else {
            $notes = Note::where('color', "bg-$color-400")
                ->where('user_id', Auth::user()->id)
                ->orderBy('title', $title)
                ->orderBy('created_at', $date)
                ->get();
        }
        return view('notes.index', ['notes' => collect($notes)]);
    }
    public function create()
    {
        if (!Gate::allows('create-note')) {
            abort(404);
        }
        return view('notes.create');
    }
    public function store(Request $request)
    {
        if (!Gate::allows('store-note')) {
            abort(404);
        }
        $request->validate([
            'title' => 'required|string',
            'color' => 'required'
        ]);
        $text = "";
        for ($i = 1; $i <= 20; $i++) {
            if ($request['input' . $i] != null)
                $text .= $request['input' . $i] . "<br>";
        }
        $note = new Note();
        $note->title = $request['title'];
        $note->user_id = Auth::user()->id;
        $note->color = $request['color'];
        $note->note = $text;
        $note->save();
        return redirect('/notes');
    }
    public function show(int $id)
    {
        if (!Gate::allows('show-note', Note::find($id))) {
            abort(403, 'Access Denied');
        }
        return view('notes.show', ['note' => Note::find($id)]);
    }
    public function delete(int $id)
    {
        if (!Gate::allows('delete-note', Note::withTrashed()->find($id))) {
            abort(403, 'Access Denied');
        }
        if (Note::withTrashed()->find($id)->deleted_at != null || Auth::user()->is_admin) {
            Note::withTrashed()->find($id)->forceDelete();
        }
        Note::destroy($id);
        if (Auth::user()->is_admin) {
            return redirect('/admin');
        }
        return redirect('/notes');
    }
    public function edit(int $id)
    {
        if (!Gate::allows('edit-note', Note::find($id))) {
            abort(403, 'Access Denied');
        }
        return view('notes.edit', ['note' => Note::find($id)]);
    }
    public function update(Request $request)
    {
        if (!Gate::allows('update-note', Note::find($request->id))) {
            abort(403, 'Access Denied');
        }
        $request->validate([
            'title' => 'required|string',
            'color' => 'required'
        ]);
        $text = "";
        for ($i = 0; $i <= 20; $i++) {
            if ($request['input' . $i] != null)
                $text .= $request['input' . $i] . "<br>";
        }
        $note = Note::find($request->id);
        $note->title = $request->title;
        $note->color = $request->color;
        $note->note = $text;
        $note->save();
        return redirect('/notes');
    }

    public function dashboard()
    {
        $notes = Note::all();
        $users = User::where('id', '>=', '1')->get();
        return view('dashboard', ['users' => $users, 'notes' => $notes]);
    }
    public function trash()
    {
        $trash = Note::withTrashed()->where('user_id', Auth::user()->id)->where('deleted_at', '!=', null)->get();
        // dd($trash);
        return view('notes.trash', ['trashs' => $trash]);
    }
    public function restore(int $id)
    {
        if (!Gate::allows('restore-note', Note::withTrashed()->find($id))) {
            abort(403, 'Access Denied');
        }
        Note::withTrashed()->find($id)->restore();
        return redirect('/notes');
    }
}
