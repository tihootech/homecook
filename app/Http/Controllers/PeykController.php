<?php

namespace App\Http\Controllers;

use App\Peyk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PeykController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('master');
    }

    public function index()
    {
        $peyks = Peyk::paginate(20);
        return view('dashboard.peyks.index', compact('peyks'));
    }

    public function create()
    {
        $peyk = new Peyk;
        return view('dashboard.peyks.form', compact('peyk'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
        ]);
        $data = self::validation();
        $user = Peyk::createUserAccount($request->username, $request->password);
        $data['user_id'] = $user->id;
        $data['uid'] = rs();
        $peyk = Peyk::create($data);
        TextMessageController::store('newpeyk', $peyk->mobile, [$request->username,$request->password]);
        return redirect()->route('peyk.index')->withMessage(__('SUCCESS'));
    }

    public function edit(Peyk $peyk)
    {
        return view('dashboard.peyks.form', compact('peyk'));
    }

    public function update(Request $request, Peyk $peyk)
    {
        $data = self::validation($peyk->id);
        $peyk->update($data);
        return redirect()->route('peyk.index')->withMessage(__('SUCCESS'));
    }

    public function destroy(Peyk $peyk)
    {
        $peyk->delete();
        return redirect()->route('peyk.index')->withMessage(__('SUCCESS'));
    }

    public static function validation($id=0)
    {
        return request()->validate([
            'first_name' => 'required|string|max:190',
            'last_name' => 'required|string|max:190',
            'mobile' => 'required|digits:11',
        ]);
    }
}
