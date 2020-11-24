<?php

namespace App\Http\Controllers;

use App\TourGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class TourGuidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ("admin.tourguide");
    }

    public function all(){
        $data_temp = TourGuide::orderBy("created_at", "desc")->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_tourguide" => $value->id_tourguide,
                "nama" => $value->nama,
                "status" => $value->status,
                "kontak" => $value->kontak,
                "gambar" => $value->gambar,
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ));
        }
        return Datatables::of($data)->toJson();
    }

    public function search($search){
        $data_temp = TourGuide::where('nama', 'like', '%' . $search . '%')->orderBy("created_at", "desc")->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_tourguide" => $value->id_tourguide,
                "nama" => $value->nama,
                "status" => $value->status,
                "kontak" => $value->kontak,
                "gambar" => $value->gambar,
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ));
        }
        return Datatables::of($data)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function limit($limit)
    {
        $data_temp = TourGuide::orderBy("created_at", "desc")->limit($limit)->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_tourguide" => $value->id_tourguide,
                "nama" => $value->nama,
                "status" => $value->status,
                "kontak" => $value->kontak,
                "gambar" => $value->gambar,
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ));
        }
        return Datatables::of($data)->toJson();
    }

    public function orderby($order){
        $data_temp = TourGuide::orderBy("created_at", $order)->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_tourguide" => $value->id_tourguide,
                "nama" => $value->nama,
                "status" => $value->status,
                "kontak" => $value->kontak,
                "gambar" => $value->gambar,
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ));
        }
        return Datatables::of($data)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'statuses' => 'required',
            'kontak' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "kurang"
            ]);
        }else{
            $data = new TourGuide();
            $input = $request->all();
            $input['file'] = time().'.'.$request->file->extension();
            $request->file->move(public_path('files'), $input['file']);
            $data->nama = $input["nama"];
            $data->status = $input["statuses"];
            $data->kontak = $input["kontak"];
            $data->gambar = $input["file"];
            if ($data->save()) {
                return response()->json([
                    "status" => "berhasil"
                ]);
            }else{
                return response()->json([
                    "status" => "gagal"
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TourGuide  $tourguide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = TourGuide::find($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TourGuide  $tourguide
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_ubah' => 'required',
            'status_ubah' => 'required',
            'kontak_ubah' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "kurang"
            ]);
        }else{
            $data = TourGuide::where('id_tourguide', '=', $id)->update(array(
                'nama' => $request->nama_ubah,
                'status' => $request->status_ubah,
                'kontak' => $request->kontak_ubah,
            ));
            if ($data) {
                return response()->json([
                    "status" => "berhasil"
                ]);
            }else{
                return response()->json([
                    "status" => "gagal"
                ]);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TourGuide  $tourguide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TourGuide $tourguide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TourGuide  $tourguide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = TourGuide::find($request->id_tourguide);
        if ($data->delete()) {
            return response()->json([
                "status" => "berhasil"
            ]);
        }else{
            return response()->json([
                "status" => "gagal"
            ]);
        }
    }
}
