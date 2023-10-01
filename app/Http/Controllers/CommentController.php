<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $comments = Comment::orderBy('ma','desc')->paginate(5);
        $comments = Comment::get();
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'noidung' => 'required',
            'phongid' => 'required',
            'userid' => 'required',
        ]);

        Comment::create($request->post());

        return redirect()->back()->withMessage('success', 'Comment has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'noidung' => 'required',
            'phongid' => 'required',
            'userid' => 'required',
        ]);

        $comment->fill([
            'noidung' => $request->ten,
            'userid' => $request->userid,
            'phongid' => $request->phongid,
        ])->save();

        return redirect()->back()->withMessage('success', 'Comment Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->withMessage('success', 'Comment has been deleted successfully');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // $comments = Comment::where('ma','LIKE','%'.$request->search."%")
        //                         ->orWhere('ten','LIKE','%'.$request->search."%")
        //                         ->orWhere('gia','LIKE','%'.$request->search."%")
        //                         ->orWhere('hinh','LIKE','%'.$request->search."%")
        //                         ->orWhere('mieuTa','LIKE','%'.$request->search."%")
        //                         ->orderBy('ma','asc')->paginate(5);
        $comments = Comment::where('id', 'LIKE', '%' . $request->search . "%")
            ->orWhere('noidung', 'LIKE', '%' . $request->search . "%")
            ->get();
        return view('comments.search', compact('comments'));
    }
}
