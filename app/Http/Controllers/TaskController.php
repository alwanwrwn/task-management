<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Task;

class TaskController extends Controller
{
    function index() {
        return view('task.index');
    }

    function getPerStatus(Request $request) {
        return Task::where('status', $request->status)->get();
    }

    function create(Request $request){
        return Task::create($request->all());
    }

    function read(Request $request)
    {
        return Task::findOrFail($request->id);
    }

    function update(Request $request){
        return Task::findOrFail($request->id)->update($request->all());
    }

    function delete(Request $request){
        return Task::findOrFail($request->id)->delete();
    }

}
