<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;

class ArticleController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'title' => 'min:3|max:30|string|required',
            'viewCount' => 'numeric|required',
        ]);

        if ($data->fails()) {
            return response([
                'data' => [
                    'messages' => $data->errors()
                ]
            ], 400);
        }


        Article::query()->create([
            'title' => $request->title,
            'viewCount' => $request->viewCount
        ]);

        return response()->json([
            'data' => [
                'message' => "Article created Successfully"
            ]
        ], 200);
    }
}
