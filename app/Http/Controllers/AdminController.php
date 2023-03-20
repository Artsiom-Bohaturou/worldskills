<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUpdateRequest;
use App\Models\Applications;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $data = Applications::all();

        return view('admin', compact('data'));
    }

    public function update(AdminUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $application = Applications::findOrFail($id);

        if ($data['status'] == 'processed') {
            Storage::delete(str_replace('storage', 'public', $application->photo_url));
            $path = $this->getPathToFile($data['photo']->extension());
            Storage::put($path, file_get_contents($data['photo']));
            unset($data['photo']);
            $data += ['photo_url' => str_replace('public', 'storage', $path)];
        }

        $application->update($data);

        return redirect()->route('admin.index');
    }
}
