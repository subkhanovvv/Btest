<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    //Функция просмотра главной страницы и данных
    public function welcome()
    {
        $data = Task::all();
        return view('welcome', compact('data'));
    }

    //Функция чтения всех данных 
    public function index()
    {
        $data = Task::all();
        return response()->json([
            'data' => $data
        ]);
    }

    //Функция чтения данных по id 
    public function show($id)
    {
        $data = Task::find($id);
        return response()->json([
            'data' => $data
        ]);
    }

    //Функция создания 
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'type' => 'required',

        ]);

        $data = new Task;
        $data->name = $req->name;
        $data->type = $req->type;
        $data->save();

        return response()->json([
            'message' => 'Data saved successfully'
        ], 200);
    }

    //Функция обновления    
    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',
            'type' => 'required',

        ]);

        $data = Task::find($id);

        if ($data) {
            $data->name = $req->name;
            $data->type = $req->type;
            $data->update();

            return response()->json([
                'message' => 'Data updated successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'No data found'
            ], 404);
        }
    }

    //Функция удаления
    public function destroy($id)
    {
        $data = Task::find($id);

        if ($data) {
            $data->delete();

            return response()->json([
                'message' => 'Data deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'No data found'
            ], 404);
        }
    }

    //Функция фильтр данных 
    public function filter_date(Request $req)
    {
        $start_date = $req->start_date;
        $end_date = $req->end_date;

        $data = Task::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        return view('welcome', compact('data'));
    }
}
