<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $sort = $request->get('sort', 'id'); // Mặc định sắp xếp theo tên sản phẩm
        $order = $request->get('order', 'asc'); 

        $posts = Post::query();

        $posts->orderBy($sort, $order);

        $posts = $posts->paginate(10);

        return view('Post.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Post.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            $data = $request->all();
            // dd($data);
            $post = Post::create($data);

            return redirect()->route('Post.index')->with(['success' => 'Thêm mới post thành công']);

        } 
        catch (Exception $ex) {
            Log::error("ERROR => PostController@store =>" . $ex->getMessage());
            return redirect()->back()->with(['error' => 'Thêm mới post thất bại']);
        }
    
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('Post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('Post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try{

            $post = Post::findOrFail($id);
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);
            $data = $request->all();
            $post->update($data);
            return redirect()->back()->with(['success' => 'Cập nhật post thành công']);

        } catch (Exception $ex) {
            Log::error("ERROR => PostController@store =>". $ex->getMessage());
            return redirect()->back()->with(['error' => 'Cập nhật post thất bại']);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Post $post, $id)
    {
        //
        try{
            $post = post::findOrFail($id);

            $post->delete();

            return redirect()->back()->with(['success' => 'Xóa post thành công']);

        } catch (Exception $ex) {
            Log::error("ERROR => postController@store =>". $ex->getMessage());
            return redirect()->back()->with(['error' => 'Xóa post thất bại']);
        }

        return redirect()->back();
    }
}
