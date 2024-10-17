<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = User::get();
        return view('file',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'file' => 'required |mimes:jpeg,jpg,png | max:3000',
        ]);
        
        $file = $request->file('file');
       $path = $request->file->store('image','public');

       User::create([
        'file' => $path,
       ]);
       return redirect()->route('user.index');
    // $filename = time() . '-' . $file->getClientOriginalName();
    // $path = $request->file->storeAs('image',$filename,'local');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $file = User::find($id);

        return view('update',compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $files = User::find($id);

       
       if ($request->hasFile('file')) {
           
           $img_path = public_path('storage/') . $files->file;

           if (fileExists($img_path)) {
            @unlink($img_path);
           }
    
            $path = $request->file->store('image','public');

    
           $files->file = $path;
           $files->save();

       }

       return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $file = User::find($id);

        $file = User::find($id);
        $file->delete();

        $path = public_path('storage/') . $file->file;
        
        if (fileExists($path)) {
            unlink($path);
        }

        return redirect()->route('user.index');
    }
}
