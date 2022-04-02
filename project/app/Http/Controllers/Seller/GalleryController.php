<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Auction;
use Image;

class GalleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show()
    {
        $data[0] = 0;
        $id = $_GET['id'];
        $prod = Auction::findOrFail($id);
        if (count($prod->galleries)) {
            $data[0] = 1;
            $data[1] = $prod->galleries;
        }
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = null;
        $lastid = $request->auction_id;
        if ($files = $request->file('gallery')) {
            foreach ($files as  $key => $file) {
                $val = $file->getClientOriginalExtension();
                if ($val == 'jpeg' || $val == 'jpg' || $val == 'png' || $val == 'svg') {
                    $gallery = new Gallery;
                    $thumbnail = time() . $file->getClientOriginalName();
                    $img = Image::make($file->getRealPath())->resize(730, 400);
                    $img->save(public_path() . '/assets/images/galleries/' . $thumbnail);
                    $gallery['photo'] = $thumbnail;
                    $gallery['auction_id'] = $lastid;
                    $gallery->save();
                    $data[] = $gallery;
                }
            }
        }
        return response()->json($data);
    }

    public function destroy()
    {

        $id = $_GET['id'];
        $gal = Gallery::findOrFail($id);
        if (file_exists(public_path() . '/assets/images/galleries/' . $gal->photo)) {
            unlink(public_path() . '/assets/images/galleries/' . $gal->photo);
        }
        $gal->delete();
    }
}
