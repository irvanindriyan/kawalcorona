<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Helpers\FunctionHelpers;

class UserController extends Controller
{
    public function all()
    {
        try {
            $getData = User::whereNotIn('username', ['admin'])
            ->orderby('urut', 'asc')
            ->get();

            $getData->maxUrut = count($getData);

            return response()->json(
                FunctionHelpers::resOK($getData), 200);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'username' => 'required|string|min:5|max:15|unique:users,username',
            ]);

            $maxUrut = User::count();

            $data = array(
                'urut' => $maxUrut,
                'username' => $request->username,
                'email' => null,
                'password' => Hash::make('12345'),
            );

            User::create($data);

            return response()->json(
                FunctionHelpers::resOK('Add user successful'), 200);
        } catch (\Illuminate\Validation\ValidationException $e ) {
            return response()->json(
                FunctionHelpers::resErrorValidation($e), $e->status);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $getData = User::where('id', $id);
            $data = $getData->firstOrFail();

            return response()->json(
                FunctionHelpers::resOK($data), 200);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }

    public function update(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required|string|exists:users,id',
                'username' => 'required|string|min:5|max:15|unique:users,username,'.$request->id.',id',
            ]);

            User::where('id', $request->id)
            ->update($request->only('username'));

            return response()->json(
                FunctionHelpers::resOK('Update user successful'), 200);
        } catch (\Illuminate\Validation\ValidationException $e ) {
            return response()->json(
                FunctionHelpers::resErrorValidation($e), $e->status);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            User::where('id', $id)
            ->delete();

            $datas = User::whereNotIn('username', ['admin'])
            ->orderby('urut', 'asc')
            ->get();

            foreach ($datas as $key => $data) {
                User::where('id', $data->id)
                ->update(['urut' => ($key + 1)]);
            }

            return response()->json(
                FunctionHelpers::resOK('Delete user successful'), 200);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }

    public function naikUser(Request $request) {
        try {
            $naikUser = $request->urut - 1;
            $turunUser = $naikUser + 1;

            $getNext = User::where('urut', $naikUser)->firstOrFail();

            User::where('id', $request->id)
            ->update(['urut' => $naikUser]);

            User::where('id', $getNext->id)
            ->update(['urut' => $turunUser]);

            return response()->json(
                FunctionHelpers::resOK('Naik user successful'), 200);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }

    public function turunUser(Request $request) {
        try {
            $turunUser = $request->urut + 1;
            $naikUser = $turunUser - 1;

            $getPrev = User::where('urut', $turunUser)->firstOrFail();

            User::where('id', $request->id)
            ->update(['urut' => $turunUser]);

            User::where('id', $getPrev->id)
            ->update(['urut' => $naikUser]);

            return response()->json(
                FunctionHelpers::resOK('Turun user successful'), 200);
        } catch (\Exception $e){
            return response()->json(
                FunctionHelpers::resError($e->getMessage()), 422);
        }
    }
}
