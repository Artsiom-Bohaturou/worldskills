<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyApplicationRequest;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Auth::user()->applications()->orderBy('updated_at', 'desc')->get();

        return view('profile', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $path = $this->getPathToFile($data['photo']->extension());

        Storage::put(
            $path,
            file_get_contents($data['photo'])
        );

        Auth::user()->applications()->create([
            'pet_name' => $data['pet_name'],
            'photo_url' => str_replace('public', 'storage', $path),
        ]);

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyApplicationRequest $request)
    {
        $id = $request->validated()['id'];
        $application = Auth::user()->applications()->find($id);
        if ($application->status != 'new') {
            return redirect()->route('profile.index');
        }

        $storagePath = str_replace('storage', 'public', $application->photo_url);

        Storage::delete($storagePath);
        $application->delete();
        return redirect()->route('profile.index');
    }
}
