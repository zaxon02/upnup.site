<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

// TODO: Добавить логотипы платёжных систем
class CategoryController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->image = $request->file('image')->store('images', 'public');
        $category->save();

        return redirect()->route('categories.show', $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->orderByDesc('created_at')->paginate(4);

        return view('categories.show', ['category' => $category, 'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->input('name');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $category->image = $request->file('image')->store('images', 'public');
        }

        $category->save();

        return redirect()->route('categories.show', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('posts.index');
    }
}
