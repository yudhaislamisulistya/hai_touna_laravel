<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ("admin.event");
    }

    public function all(){
        $data_temp = Event::orderBy("created_at", "desc")->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_event" => $value->id_event,
                "judul" => $value->judul,
                "tanggal_event" => $value->tanggal_event,
                "keterangan" => $value->keterangan,
                "gambar" => $value->gambar,
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ));
        }
        return Datatables::of($data)->toJson();
    }

    public function search($search){
        $data_temp = Event::where('judul', 'like', '%' . $search . '%')->orderBy("created_at", "desc")->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_event" => $value->id_event,
                "judul" => $value->judul,
                "tanggal_event" => $value->tanggal_event,
                "keterangan" => $value->keterangan,
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
        $data_temp = Event::orderBy("created_at", "desc")->limit($limit)->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_event" => $value->id_event,
                "judul" => $value->judul,
                "tanggal_event" => $value->tanggal_event,
                "keterangan" => $value->keterangan,
                "gambar" => $value->gambar,
                "created_at" => $created_at,
                "updated_at" => $updated_at,
            ));
        }
        return Datatables::of($data)->toJson();
    }

    public function orderby($order){
        $data_temp = Event::orderBy("created_at", $order)->get();

        $data = array();

        foreach ($data_temp as $key => $value) {
            $created_at = str_replace(["T", ".000000Z"],[" ", ""],$value->created_at);
            $updated_at = str_replace(["T", ".000000Z"],[" ", ""],$value->updated_at);
            array_push($data, array(
                "id_event" => $value->id_event,
                "judul" => $value->judul,
                "tanggal_event" => $value->tanggal_event,
                "keterangan" => $value->keterangan,
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
            'tanggal' => 'required',
            'keterangan' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "kurang"
            ]);
        }else{
            $data = new Event();
            $input = $request->all();
            $input['file'] = time().'.'.$request->file->extension();
            $request->file->move(public_path('files'), $input['file']);
            $data->judul = $input["judul"];
            $data->keterangan = $input["keterangan"];
            $data->tanggal_event = $input["tanggal"];
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
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Event::find($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul_ubah' => 'required',
            'tanggal_ubah' => 'required',
            'keterangan_ubah' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "status" => "kurang"
            ]);
        }else{
            $data = Event::find($id);
            $input = $request->all();
            $data->judul = $input["judul_ubah"];
            $data->keterangan = $input["keterangan_ubah"];
            $data->tanggal_event = $input["tanggal_ubah"];
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
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Event::find($request->id_event);
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
