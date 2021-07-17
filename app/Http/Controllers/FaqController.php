<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
   
    public function index()
    {
        $items = Faq::all();

        return response()->json($items);
    }

    public function read($id)
    {
        $item = Faq::find($id);

        return response()->json($item);
    }

    public function store(Request $r)
    {
        $data = [
            'question' => $r->question, //'question -> field database $r-> buat isi body
            'answer' => $r->answer,
            'video_url' => $r->video_url
        ];
        //ngumpulin data

        Faq::insert($data);
        return response()->json($data);
    }

    public function update(Request $r, $id)
    {
        $data = [
            'question' => $r->question,
            'answer' => $r->answer,
            'video_url' => $r->video_url
        ];

        Faq::find($id)->update($data);

        $response = [
            'data' => $data,
            'status' => 200
        ];

        return response()->json($response);
    }
    
    public function delete($id)
    {
        Faq::find($id)->delete();

        $response = [
            'message' => 'berhasil',
            'status' => 200
        ];

        return response()->json($response);
    }

}
