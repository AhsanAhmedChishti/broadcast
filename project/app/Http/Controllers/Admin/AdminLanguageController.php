<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use App\Models\AdminLanguage;
use App;
use Illuminate\Support\Str;

class AdminLanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
         $datas = AdminLanguage::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('action', function(AdminLanguage $data) {
                                $delete = $data->id == 1 ? '':'<a href="javascript:;" data-href="' . route('admin-tlang-delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a>';
                                $default = $data->is_default == 1 ? '<a><i class="fa fa-check"></i> Default</a>' : '<a class="status" data-href="' . route('admin-tlang-st',['id1'=>$data->id,'id2'=>1]) . '">Set Default</a>';
                                return '<div class="action-list"><a href="' . route('admin-tlang-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a>'.$delete.$default.'</div>';
                            }) 
                            ->rawColumns(['action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.adminlanguage.index');
    }

    //*** GET Request
    public function create()
    {

        // $new = null;
        // $file = fopen('auction-language-danish.csv',"r");
        // $i = 1;
        // $keys = array();
        // $values = array();
        // while (($line = fgetcsv($file)) !== FALSE) {
        //     if($i != 1)
        //     {
        //         if(!empty($line[0])){
        //             $keys[] =  $line[0];
        //             $values[] = mb_convert_encoding($line[1], 'UTF-8', 'UTF-8');
        //         }
        //     }
        //     $i++;
        // }
        // fclose($file);

        // foreach(array_combine($keys,$values) as $key => $value)
        // {
        //     $new[$key] = $value;
        // }  

        // $mydata = json_encode($new);
        // file_put_contents(public_path().'/project/resources/lang/newjson.json', $mydata); 


        return view('admin.adminlanguage.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section

        //--- Validation Section Ends

        //--- Logic Section
        $new = null;
        $input = $request->all();
        $data = new AdminLanguage();
        $data->language = $input['language'];
        $name = time().Str::random(8);
        $data->name = $name;
        $data->file = $name.'.json';
        $data->rtl = $input['rtl'];
        $data->save();
        unset($input['_token']);
        unset($input['language']);
        $keys = $request->keys;
        $values = $request->values;
        foreach(array_combine($keys,$values) as $key => $value)
        {
            $n = str_replace("_"," ",$key);
            $new[$n] = $value;
        }  
        $mydata = json_encode($new);
        file_put_contents(public_path().'/project/resources/lang/'.$data->file, $mydata); 
        //--- Logic Section Ends

        //--- Redirect Section        
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends    
    }

    //*** GET Request
    public function edit($id)
    {
        $data = AdminLanguage::findOrFail($id);
        $data_results = file_get_contents(public_path().'/project/resources/lang/'.$data->file);
        $lang = json_decode($data_results, true);
        // $f = fopen('language.csv',"w");
        // $hline[0] = 'Keys';
        // $hline[1] = 'Values';
        // fputcsv($f,  $hline);
        // foreach ($lang as $key => $value) {
        //     $line[0] = $key;
        //     $line[1] = $value;
        //     fputcsv($f,  $line);
        // }
        // fclose($f);        

        return view('admin.adminlanguage.edit',compact('data','lang'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Validation Section
        
        //--- Validation Section Ends

        //--- Logic Section
        $new = null;
        $input = $request->all();
        $data = AdminLanguage::findOrFail($id);
        if (file_exists(public_path().'/project/resources/lang/'.$data->file)) {
            unlink(public_path().'/project/resources/lang/'.$data->file);
        }
        $data->language = $input['language'];
        $name = time().Str::random(8);
        $data->name = $name;
        $data->file = $name.'.json';
        $data->rtl = $input['rtl'];
        $data->update();
        unset($input['_token']);
        unset($input['language']);
        $keys = $request->keys;
        $values = $request->values;
        foreach(array_combine($keys,$values) as $key => $value)
        {
            $n = str_replace("_"," ",$key);
            $new[$n] = $value;
        }        
        $mydata = json_encode($new);
        file_put_contents(public_path().'/project/resources/lang/'.$data->file, $mydata); 
        //--- Logic Section Ends

        //--- Redirect Section     
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends            
    }

      public function status($id1,$id2)
        {
            $data = AdminLanguage::findOrFail($id1);
            $data->is_default = $id2;
            $data->update();
            $data = AdminLanguage::where('id','!=',$id1)->update(['is_default' => 0]);
            //--- Redirect Section     
            $msg = 'Data Updated Successfully.';
            return response()->json($msg);      
            //--- Redirect Section Ends  
        }

    //*** GET Request Delete
    public function destroy($id)
    {
        if($id == 1)
        {
        return "You don't have access to remove this language";
        }
        $data = AdminLanguage::findOrFail($id);
        if (file_exists(public_path().'/project/resources/lang/'.$data->file)) {
            unlink(public_path().'/project/resources/lang/'.$data->file);
        }
        $data->delete();
        //--- Redirect Section     
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);      
        //--- Redirect Section Ends     
    }
}
