<?php

namespace App\Http\Controllers;

use App\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class LokersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ("admin.loker");
    }

    public function all(){
        $data_temp = Loker::orderBy("created_at", "desc")->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_loker" => $value->id_loker,
                "judul" => $value->judul,
                "kontak" => $value->kontak,
                "deskripsi" => $value->deskripsi,
                "profil" => $value->profil,
                "gambar" => $value->gambar,
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ));
        }
        return Datatables::of($data)->toJson();
    }

    public function search($search){
        $data_temp = Loker::where('judul', 'like', '%' . $search . '%')->orderBy("created_at", "desc")->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_loker" => $value->id_loker,
                "judul" => $value->judul,
                "kontak" => $value->kontak,
                "deskripsi" => $value->deskripsi,
                "profil" => $value->profil,
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
        $data_temp = Loker::orderBy("created_at", "desc")->limit($limit)->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_loker" => $value->id_loker,
                "judul" => $value->judul,
                "kontak" => $value->kontak,
                "deskripsi" => $value->deskripsi,
                "profil" => $value->profil,
                "gambar" => $value->gambar,
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ));
        }
        return Datatables::of($data)->toJson();
    }

    public function orderby($order){
        $data_temp = Loker::orderBy("created_at", $order)->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_loker" => $value->id_loker,
                "judul" => $value->judul,
                "kontak" => $value->kontak,
                "deskripsi" => $value->deskripsi,
                "profil" => $value->profil,
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
            'judul' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'profil' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "kurang"
            ]);
        }else{
            $data = new Loker();
            $input = $request->all();
            $input['file'] = time().'.'.$request->file->extension();
            $request->file->move(public_path('files'), $input['file']);
            $data->judul = $input["judul"];
            $data->kontak = $input["kontak"];
            $data->deskripsi = $input["deskripsi"];
            $data->profil = $input["profil"];
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
     * @param  \App\Loker  $loker
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Loker::find($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loker  $loker
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul_ubah' => 'required',
            'kontak_ubah' => 'required',
            'deskripsi_ubah' => 'required',
            'profil_ubah' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "kurang"
            ]);
        }else{
            $data = Loker::find($id);
            $input = $request->all();
            $data->judul = $input["judul_ubah"];
            $data->kontak = $input["kontak_ubah"];
            $data->deskripsi = $input["deskripsi_ubah"];
            $data->profil = $input["profil_ubah"];
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loker  $loker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loker $loker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loker  $loker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Loker::find($request->id_loker);
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
