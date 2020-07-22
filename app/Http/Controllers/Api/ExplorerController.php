<?php

namespace App\Http\Controllers\Api;

use App\Explorer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExplorerController extends Controller
{
    private  $explorer;

    public function __construct(Explorer $explorer)
    {
        $this->explorer = $explorer;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $explorer = $this->explorer->paginate('10');
        return response()->json($explorer, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        try{

            $explorer = $this->explorer->create($data); //Mass Asignment

            return response()->json([
                'data' => [
                    'msg' => 'Success!!!'
                ]
            ], 200);
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        try{

            $explorer = $this->explorer->findOrFail($id);
            $explorer->update($data);

            return response()->json([
                'data' => [
                    'msg' => 'Update -- Success!!!'
                ]
            ], 200);
        }catch (\Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
