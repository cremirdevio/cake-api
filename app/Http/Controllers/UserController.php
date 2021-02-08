<?php

namespace App\Http\Controllers;

use App\User;
use App\Wallet;
use App\Information;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $defaultPassword = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

    public function __construct()
    {
        //
    }

    public function index()
    {
        $users = User::paginate();
        return response()->json($users) ;
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $user = User::create(array_merge($request->all(), ['password' => $this->defaultPassword]));
        $wallet = Wallet::create([]);
        $information = Information::create([]);

        $user->wallet()->save($wallet);
        $user->info()->save($information);

        return response()->json($user, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $user = User::findorFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

        ]);

        $user = User::findorFail($id);
        $user->update($request->all());
        return response()->json($user, Response::HTTP_CREATED);
    }

    public function destroy($id)
    {
        $user = User::findorFail($id);
        $user->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
