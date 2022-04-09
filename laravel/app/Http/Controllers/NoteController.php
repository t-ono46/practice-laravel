<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

/**
 * Noteに関するコントローラー
 */
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NoteRequest $request
     * @return RedirectResponse
     */
    public function store(NoteRequest $request)
    {
        Note::create($request->all())->save();

        return redirect()->route('notes.index')->with('success_message', 'ノートを作成しました');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Note $note
     * @return Application|Factory|View
     */
    public function edit(Note $note)
    {
        return view('note.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NoteRequest $request
     * @param Note $note
     * @return RedirectResponse
     */
    public function update(NoteRequest $request, Note $note)
    {
        $note->fill($request->all())->save();

        return redirect()->route('notes.index')->with('success_message', 'ノートを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Note $note
     * @return RedirectResponse
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success_message', 'ノートを削除しました');
    }
}
