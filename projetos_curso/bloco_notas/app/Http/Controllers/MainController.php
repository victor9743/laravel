<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {
        // load user notes
        $notes = User::find(session('user.id'))
        ->notes()
        ->whereNull('deleted_at')
        ->get()->toArray();

        //show home
        return view('main.index', ['notes' => $notes]);
    }

    public function new()
    {
        return view('main.new');
    }

    public function save(Request $request)
    {
        // form_validation
        $request->validate(
            // rules
            [
                'title' => ['required', 'min:3', 'max:200'],
                'text' => ['required', 'min:3', 'max:3000']
            ],
            // errors messages
            [
                'title.required' => "O campo title é obrigatório",
                'text.required' => "O campo text é obrigatório",
                'title.min' => "O campo title deve ter no minímo :min caracteres",
                'title.max' => "O campo title deve ter no máximo :max caracteres",
                'text.min' => "O campo text deve ter no minímo :min caracteres",
                'text.max' => "O campo text deve ter no máximo :max caracteres"

            ]
        );

        $note = new Note();
        $note->user_id = session('user.id');
        $note->title = $request->title;
        $note->text = $request->text;
        $note->save();

        return redirect()->route('home');
    }

    public function edit($id)
    {
        // load note
        $note = Note::find(Operations::check_decrypt($id));

        return view('main.edit', ['note' => $note]);
    }

    public function update(Request $request)
    {
        // validate request
        $request->validate(
            // rules
            [
                'title' => ['required', 'min:3', 'max:200'],
                'text' => ['required', 'min:3', 'max:3000']
            ],
            // errors messages
            [
                'title.required' => "O campo title é obrigatório",
                'text.required' => "O campo text é obrigatório",
                'title.min' => "O campo title deve ter no minímo :min caracteres",
                'title.max' => "O campo title deve ter no máximo :max caracteres",
                'text.min' => "O campo text deve ter no minímo :min caracteres",
                'text.max' => "O campo text deve ter no máximo :max caracteres"

            ]
        );

        // check if note_id exists
        if($request->note_id == null) {
            return  redirect()->route('home');
        }

        // descrypt note_id
        $id = Operations::check_decrypt($request->note_id);

        // load note
        $note = Note::find($id);
        $note->title = $request->title;
        $note->text = $request->text;
        $note->save();

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $id = Operations::check_decrypt($id);
        $note = Note::find($id);

        // hard delete
        // $note->delete();

        //soft delete
        // $note->deleted_at = date("Y-m-d H:i:s");
        // $note->save();

        // soft delete with model configuration (recommended)
        $note->delete();

        // hard delete with model configuration
        // $note->forceDelete();

        return redirect()->route('home');
    }

}
