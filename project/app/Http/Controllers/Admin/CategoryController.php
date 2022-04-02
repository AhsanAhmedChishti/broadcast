<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategorySectionTitle;
use Carbon\Carbon;
use Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Validator;
use Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Category::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)

            ->editColumn('image', function (Category $data) {
                $image = $data->image ? url('assets/images/category/' . $data->image) : url('assets/images/noimage.png');
                return '<img src="' . $image . '" alt="Image">';
            })
            ->addColumn('action', function (Category $data) {

                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                $status = '<div class="action-list d-inline"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-category-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>' . __('On') . '</option><option data-val="0" value="' . route('admin-category-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>' . __('Off') . '</option>/select></div>';
                return '<div class="action-list">
                                <a data-href="' . route('admin-category-edit', $data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a>
                                <a href="javascript:;" data-href="' . route('admin-category-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a>' . $status . '</div>';
            })
            ->rawColumns(['image', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }


    //*** GET Request Status
    public function status($id1, $id2)
    {
        $data = Category::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }




    //*** GET Request
    public function index()
    {
        return view('admin.category.index');
    }


    //******GET Request */

    public function create()
    {
        return view('admin.category.create');
    }



    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'name' => 'unique:categories',
            'slug' => 'unique:categories',
            'image'      => 'required|mimes:jpeg,jpg,png',
        ];
        $customs = [
            'name.unique' => 'This name has already been taken.',
            'slug.unique' => 'This slug has already been taken.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Category();
        $input = $request->all();
        if ($file = $request->file('image')) {
            $img = Image::make($file->getRealPath())->resize(260, 190);
            $thumbnail = time() . Str::random(8) . '.jpg';
            $img->save(public_path() . '/assets/images/category/' . $thumbnail);
            $input['image'] = $thumbnail;
        }
        $input['slug'] = Str::slug($request->slug);
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    /**Category get request */

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }


    /******Category post request update */

    public function update(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'name' => 'unique:categories,name,' . $id,
            'slug' => 'unique:categories,slug,' . $id,
            'image'      => 'mimes:jpeg,jpg,png',
        ];
        $customs = [
            'name.unique' => 'This name has already been taken.',
            'slug.unique' => 'This slug has already been taken.'
        ];
        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $category = Category::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('image')) {
            $img = Image::make($file->getRealPath())->resize(260, 190);
            $thumbnail = time() . Str::random(8) . '.jpg';
            $img->save(public_path() . '/assets/images/category/' . $thumbnail);
            if ($category->image != null) {
                if (file_exists(public_path() . '/assets/images/category/' . $category->image)) {
                    unlink(public_path() . '/assets/images/category/' . $category->image);
                }
            }
            $input['image'] = $thumbnail;
        }
        $input['slug'] = Str::slug($request->slug);
        $category->update($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends


    }


    /********Category title text create */

    public function category_title_create()
    {
        $category_section_title_text = CategorySectionTitle::find(1)->first();
        return view('admin.category.category_title_text', compact('category_section_title_text'));
    }


    /*******Category Title and text Update */

    public function category_title_update(Request $request, $id)
    {
        $updateTitleText = CategorySectionTitle::find($id);

        $updateTitleText->category_section_title = $request->category_section_title;
        $updateTitleText->category_section_text = $request->category_section_text;

        $updateTitleText->save();
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
    }




    //*** GET Request Delete
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        //If Photo Doesn't Exist
        if ($category->image == null) {
            $category->delete();
            //--- Redirect Section
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);
            //--- Redirect Section Ends
        }
        //If Photo Exist
        if (file_exists(public_path() . '/assets/images/category/' . $category->image)) {
            unlink(public_path() . '/assets/images/category/' . $category->image);
        }
        $category->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
