<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Exception;
use Illuminate\Http\Request;
use App\Models\ServiceHistories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ServiceHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'script' => 'components.scripts.serviceHistories',
            'cars' => Car::all()->pluck('name', 'id'),
        ];
        return view('pages.serviceHistories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->car_id == NULL) {
            $json = [
                'msg'       => 'Mohon pilih mobil',
                'status'    => false
            ];
        } elseif ($request->date == NULL) {
            $json = [
                'msg'       => 'Mohon berikan tanggal service mobil',
                'status'    => false
            ];
        } elseif ($request->description == NULL) {
            $json = [
                'msg'       => 'Mohon berikan deskripsi',
                'status'    => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request) {
                    ServiceHistories::create([
                        'car_id' => $request->car_id,
                        'date' => $request->date,
                        'description' => $request->description,
                    ]);
                });

                $json = [
                    'msg' => 'Riwayat berhasil ditambahkan',
                    'status' => true
                ];
            } catch (Exception $e) {
                $json = [
                    'msg'       => 'Error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }
        return Response::json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceHistories  $serviceHistories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            $data = ServiceHistories::where('id', $id)
                ->first();
            return Response::json($data);
        }
        $data = ServiceHistories::orderBy('id', 'desc')
            ->get();
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('car_id', function ($row) {
                return $row->car->name;
            })
            ->addColumn('lisence_plate', function ($row) {
                return '<span class="badge bg-dark">' . $row->car->lisence_plate . '</span>';
            })
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];

                return view('components.buttons.serviceHistories', $data);
            })
            ->rawColumns(['action', 'lisence_plate'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceHistories  $serviceHistories
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceHistories $serviceHistories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceHistories  $serviceHistories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->car == NULL) {
            $json = [
                'msg'       => 'Mohon pilih mobil',
                'status'    => false
            ];
        } elseif ($request->date == NULL) {
            $json = [
                'msg'       => 'Mohon berikan tanggal service mobil',
                'status'    => false
            ];
        } elseif ($request->description == NULL) {
            $json = [
                'msg'       => 'Mohon berikan deskripsi',
                'status'    => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request, $id) {
                    ServiceHistories::where('id', $id)->update([
                        'car_id' => $request->car,
                        'date' => $request->date,
                        'description' => $request->description,
                    ]);
                });

                $json = [
                    'msg' => 'Riwayat berhasil disunting',
                    'status' => true
                ];
            } catch (Exception $e) {
                $json = [
                    'msg'       => 'Error',
                    'status'    => false,
                    'e'         => $e
                ];
            }
        }
        return Response::json($json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceHistories  $serviceHistories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $history = ServiceHistories::find($id);
            if (!$history) {
                $json = [
                    'msg' => 'Data Tidak Ditemukan',
                    'status' => false,
                ];
            }
            DB::transaction(function () use ($id) {
                DB::table('service_histories')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'Riwayat berhasil dihapus',
                'status' => true
            ];
        } catch (Exception $e) {
            $json = [
                'msg' => 'error',
                'status' => false,
                'e' => $e,
            ];
        };

        return Response::json($json);
    }
}
