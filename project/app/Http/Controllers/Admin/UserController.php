<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\User;
use App\Models\Withdraw;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:admin');
	}

	//*** JSON Request
	public function datatables()
	{
		$datas = User::orderBy('id', 'desc')->get();
		//--- Integrating This Collection Into Datatables
		return Datatables::of($datas)
			->addColumn('name', function (User $data) {
				return $data->first_name . ' ' . $data->last_name;
			})
			->addColumn('featured', function (User $data) {
				return  $data->is_featured == 1 ? __('Yes') : __('No');
			})
			->addColumn('action', function (User $data) {
				return '<div class="action-list"><a href="' . route('admin-user-show', $data->id) . '" > <i class="fas fa-eye"></i> Details</a><a data-href="' . route('admin-user-edit', $data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" class="send" data-email="' . $data->email . '" data-toggle="modal" data-target="#vendorform"><i class="fas fa-envelope"></i> Send</a><a href="javascript:;" data-href="' . route('admin-user-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
			})
			->rawColumns(['action'])
			->toJson(); //--- Returning Json Data To Client Side
	}

	//*** GET Request
	public function index()
	{
		return view('admin.user.index');
	}

	//*** GET Request
	public function show($id)
	{
		$data = User::findOrFail($id);
		return view('admin.user.show', compact('data'));
	}

	//*** GET Request
	public function ban($id1, $id2)
	{
		$user = User::findOrFail($id1);
		$user->ban = $id2;
		$user->update();
	}


	//*** GET Request
	public function create()
	{
		return view('admin.user.create');
	}

	//*** POST Request
	public function store(Request $request)
	{
		//--- Validation Section

		$rules = [
			'email'   => 'required|email|unique:users',
			'password' => 'required',
			'photo' => 'required|mimes:jpeg,jpg,png',
		];
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
		}
		//--- Validation Section Ends

		//--- Logic Section

		$user = new User;
		$input = $request->all();
		if ($input['type'] == "0") {
			$input['company_name'] = null;
			$input['cvr_number']   = null;
		}
		$input['customer_number']  = Str::random(8);
		$input['password'] = bcrypt($request['password']);
		$token = md5(time() . $request->name . $request->email);
		$input['verification_link'] = $token;
		$input['affilate_code'] = md5($request->name . $request->email);
		if ($request->is_featured == "") {
			$input['is_featured'] = 0;
		}
		if ($request->is_charity == "") {
			$input['is_charity'] = 0;
		}
		if ($file = $request->file('photo')) {
			$name = time() . $file->getClientOriginalName();
			$file->move('assets/images/users', $name);
			if ($user->photo != null) {
				if (file_exists(public_path() . '/assets/images/users/' . $user->photo)) {
					unlink(public_path() . '/assets/images/users/' . $user->photo);
				}
			}
			$input['photo'] = $name;
		}

		$user->fill($input)->save();

		//--- Logic Section Ends

		//--- Redirect Section
		$msg = 'New Customer Created Successfully.';
		return response()->json($msg);
		//--- Redirect Section Ends
	}

	//*** GET Request
	public function edit($id)
	{
		$data = User::findOrFail($id);
		return view('admin.user.edit', compact('data'));
	}

	//*** POST Request
	public function update(Request $request, $id)
	{

		//--- Validation Section
		$rules = [
			'photo' => 'mimes:jpeg,jpg,png',
			'email'   => 'email|unique:users,email,' . $id,
		];

		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
		}
		//--- Validation Section Ends

		$user = User::findOrFail($id);
		$data = $request->all();

		if ($file = $request->file('photo')) {
			$name = time() . $file->getClientOriginalName();
			$file->move('assets/images/users', $name);
			if ($user->photo != null) {
				if (file_exists(public_path() . '/assets/images/users/' . $user->photo)) {
					unlink(public_path() . '/assets/images/users/' . $user->photo);
				}
			}
			$data['photo'] = $name;
		}

		if ($request->is_featured == "") {
			$data['is_featured'] = 0;
		}

		if ($request->is_charity == "") {
			$data['is_charity'] = 0;
		}

		if (!empty($request->password)) {
			$data['password'] = bcrypt($request['password']);
		} else {
			$data['password'] = $user->password;
		}

		$user->update($data);
		$msg = 'Customer Information Updated Successfully.';
		return response()->json($msg);
	}

	//*** GET Request Delete
	public function destroy($id)
	{
		$user = User::findOrFail($id);

		if ($user->orders->count() > 0) {
			foreach ($user->orders as $gal) {
				$gal->delete();
			}
		}


		if ($user->socialProviders->count() > 0) {
			foreach ($user->socialProviders as $gal) {
				$gal->delete();
			}
		}

		// OTHER SECTION ENDS

		//If Photo Doesn't Exist
		if ($user->photo == null) {
			$user->delete();
			//--- Redirect Section
			$msg = 'Data Deleted Successfully.';
			return response()->json($msg);
			//--- Redirect Section Ends
		}
		//If Photo Exist
		if (file_exists(public_path() . '/assets/images/users/' . $user->photo)) {
			unlink(public_path() . '/assets/images/users/' . $user->photo);
		}
		$user->delete();
		//--- Redirect Section
		$msg = 'Data Deleted Successfully.';
		return response()->json($msg);
		//--- Redirect Section Ends
	}

	//*** JSON Request
	public function withdrawdatatables()
	{
		$datas = Withdraw::where('type', '=', 'user')->orderBy('id', 'desc')->get();
		//--- Integrating This Collection Into Datatables
		return Datatables::of($datas)
			->addColumn('email', function (Withdraw $data) {
				$email = $data->user->email;
				return $email;
			})
			->addColumn('phone', function (Withdraw $data) {
				$phone = $data->user->phone;
				return $phone;
			})
			->editColumn('status', function (Withdraw $data) {
				$status = ucfirst($data->status);
				return $status;
			})
			->editColumn('amount', function (Withdraw $data) {
				$sign = Currency::where('is_default', '=', 1)->first();
				$amount = $sign->sign . round($data->amount * $sign->value, 2);
				return $amount;
			})
			->addColumn('action', function (Withdraw $data) {
				$action = '<div class="action-list"><a data-href="' . route('admin-withdraw-show', $data->id) . '" class="view details-width" data-toggle="modal" data-target="#modal1"> <i class="fas fa-eye"></i> Details</a>';
				if ($data->status == "pending") {
					$action .= '<a data-href="' . route('admin-withdraw-accept', $data->id) . '" data-toggle="modal" data-target="#confirm-delete"> <i class="fas fa-check"></i> Accept</a><a data-href="' . route('admin-withdraw-reject', $data->id) . '" data-toggle="modal" data-target="#confirm-delete1"> <i class="fas fa-trash-alt"></i> Reject</a>';
				}
				$action .= '</div>';
				return $action;
			})
			->rawColumns(['name', 'action'])
			->toJson(); //--- Returning Json Data To Client Side
	}

	//*** GET Request
	public function withdraws()
	{
		return view('admin.user.withdraws');
	}

	//*** GET Request
	public function withdrawdetails($id)
	{
		$sign = Currency::where('is_default', '=', 1)->first();
		$withdraw = Withdraw::findOrFail($id);
		return view('admin.user.withdraw-details', compact('withdraw', 'sign'));
	}

	//*** GET Request
	public function accept($id)
	{
		$withdraw = Withdraw::findOrFail($id);
		$data['status'] = "completed";
		$withdraw->update($data);

		//--- Redirect Section
		$msg = 'Withdraw Accepted Successfully.';
		return response()->json($msg);
		//--- Redirect Section Ends
	}

	//*** GET Request
	public function reject($id)
	{
		$withdraw = Withdraw::findOrFail($id);
		$account = User::findOrFail($withdraw->user->id);
		$account->income = $account->income + $withdraw->amount + $withdraw->fee;
		$account->update();
		$data['status'] = "rejected";
		$withdraw->update($data);



		//--- Redirect Section
		$msg = 'Withdraw Rejected Successfully.';
		return response()->json($msg);
		//--- Redirect Section Ends
	}
}
