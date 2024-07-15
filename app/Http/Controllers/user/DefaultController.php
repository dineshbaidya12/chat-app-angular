<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DefaultController extends Controller
{
    public function index()
    {
        $authUser = Auth::user();
        $userDetails = UserDetails::where('user_id', $authUser->id)->first();
        return view('angular.base', compact('authUser', 'userDetails'));
    }

    public function changeTheme(Request $request)
    {
        $rules = [
            'theme' => 'required|in:light,dark'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $firstError = $errors->keys()[0];

            return response()->json(["success" => 0, "msg" => $errors->first($firstError), "form_errors" => $errors->toArray(), "form_errors_count" => $errors->count(), "first_error" => $firstError]);
        }
        $validated = $validator->validated();
        $user = UserDetails::where('user_id', Auth::user()->id)->first();
        $user->theme = $validated['theme'];
        $user->save();
        return response()->json(['success' => 1, 'msg' => 'Mode changed.']);
    }
}
