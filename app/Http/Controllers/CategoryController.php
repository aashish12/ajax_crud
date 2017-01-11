<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    /*
     * Display all data
     */
    public function index()
    {
        $data = new category();
        $values = $data::paginate(5);

        return view('category.index')->with('values',$values);
    }

    /*
     * Add student data
     */
    public function add(Request $request)
    {
        $data = new category();
        $data -> category_name = $request -> category_name;
        $data -> category_description = $request -> category_description;
        $data -> category_color = $request -> category_color;
        $data -> category_icon = $request -> category_icon;
        $data->created_at = time();
        $data -> save();
        return back()
            ->with('success','Record Added successfully.');
    }

    /*
     * View data
     */
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = category::find($id);
//            echo json_decode($info);die();
            return response()->json($info);
        }
    }

    /*
    *   Update data
    */
    public function update(Request $request)
    {
        $id = $request -> edit_id;
        $data = category::find($id);
        $data -> category_name = $request -> edit_category_name;
        $data -> category_description = $request -> edit_category_description;
        $data -> category_color = $request -> edit_category_color;
        $data -> category_icon = $request -> edit_category_icon;
        $data->created_at = time();

        $data -> save();
        return back()
            ->with('success','Record Updated successfully.');
    }

    /*
    *   Delete record
    */
    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = category::find($id);
        $response = $data -> delete();
        if($response)
            echo "Record Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }

}
