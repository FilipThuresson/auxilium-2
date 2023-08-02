<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {

        ddd($request->post());
        /*
        if ($id !== 'new') {
            $comment = Comment::find($id);
        } else {
            $comment = new Comment;
        }

        $comment->fill($request->validated());
        $comment->user_id = $request->user()->id;
        $comment->save();*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
