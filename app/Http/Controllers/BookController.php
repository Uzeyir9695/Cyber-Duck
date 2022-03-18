<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Book::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return view('books.actions', compact('row'));
                })
                ->addColumn('image', function ($row) {
                    return '<img src="'.$row->getFirstMediaUrl('images'). '" width="60" height="60" class="rounded d-flex justify-content-center"/>';
                })
                ->setRowAttr(['align' => 'center'])
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('books.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $request->validated();

        $book = Book::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'description' => $request->description
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $book->addMediaFromRequest('image')->toMediaCollection('images');
        }

        return redirect()->route('books.create')->with('message', 'Book created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
//        $image = $book->getFirstMediaUrl('images');
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $validator = $request->validated();

        $book->update($validator);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $book->clearMediaCollection('images');
            $book->addMediaFromRequest('image')->toMediaCollection('images');
        }

//        session()->flash('success', 'Image Update successfully');

        return redirect()->route('books.edit', $book->id)->with('message', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with('message', 'Book deleted successfully!');
    }
}
