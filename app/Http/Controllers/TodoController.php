<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\TodoItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TodoController extends Controller
{
    public function index(): View
    {
        $todo_items = auth()->user()->todo_items;
        return view( 'todo_items.index', compact( 'todo_items' ) );
    }
    public function archive(): View
    {
        $todo_items = auth()->user()->todo_items()->withTrashed()->where('deleted_at','!=',NULL)->get();

        return view( 'todo_items.archive', compact( 'todo_items' ) );
    }

    public function create()
    {
        return view( 'todo_items.create' );
    }

    public function store( TodoRequest $request ): RedirectResponse
    {
        TodoItem::create( [
            'title'   => $request->input( 'title' ),
            'body'    => $request->input( 'body' ),
            'user_id' => auth()->user()->getKey()
        ] );

        return redirect()->route( 'dashboard' );
    }

    public function edit( TodoItem $todo_item ): View
    {
        return view( 'todo_items.edit', compact( 'todo_item' ) );
    }

    public function update( TodoItem $todo_item, TodoRequest $request ):RedirectResponse
    {
        $todo_item->update( [
            'title'   => $request->input( 'title' ),
            'body'    => $request->input( 'body' ),
            'user_id' => auth()->user()->getKey()
        ] );

        return redirect()->route( 'dashboard' );
    }

    public function done( TodoItem $todo_item ):RedirectResponse
    {
        $todo_item->delete();

        return redirect()->route( 'dashboard' );
    }

    /**
     * Restore item of list
     *
     * @return RedirectResponse
     */
    public function restore( $todo_item ):RedirectResponse
    {
        TodoItem::withTrashed()->find($todo_item)->restore();

        return redirect()->route( 'dashboard' );
    }
}
