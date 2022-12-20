<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'script' => 'components.scripts.cars'
        ];
        return view('pages.cars.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $rules = [
            'lisence_plate' => 'unique:cars',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $json = [
                'msg'       => 'Plat Nomor sudah digunakan!',
                'status'    => false
            ];
            return Response::json($json);
        } elseif ($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon berikan nama mobil',
                'status'    => false
            ];
        } elseif ($request->type == NULL) {
            $json = [
                'msg'       => 'Mohon pilih jenis mobil',
                'status'    => false
            ];
        } elseif ($request->lisence_plate == NULL) {
            $json = [
                'msg'       => 'Mohon berikan plat nomor mobil',
                'status'    => false
            ];
        } elseif ($request->lisence_plate == NULL) {
            $json = [
                'msg'       => 'Mohon berikan plat nomor mobil',
                'status'    => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request) {
                    Car::create([
                        'name' => $request->name,
                        'type' => $request->type,
                        'lisence_plate' => $request->lisence_plate,
                        'owner' => $request->owner
                    ]);
                });

                $json = [
                    'msg' => 'Mobil berhasil ditambahkan',
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
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            $data = Car::where('id', $id)
                ->first();
            return Response::json($data);
        }
        $data = Car::orderBy('id', 'desc')
            ->get();
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('lisence_plate', function ($row) {
                return '<span class="badge bg-dark">' . $row->lisence_plate . '</span>';
            })
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];

                return view('components.buttons.cars', $data);
            })
            ->rawColumns(['action', 'lisence_plate'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'lisence_plate' => Rule::unique('cars', 'lisence_plate')->ignore($id),
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $json = [
                'msg'       => 'Plat Nomor sudah digunakan!',
                'status'    => false
            ];
            return Response::json($json);
        } elseif ($request->name == NULL) {
            $json = [
                'msg'       => 'Mohon berikan nama mobil',
                'status'    => false
            ];
        } elseif ($request->type == NULL) {
            $json = [
                'msg'       => 'Mohon pilih jenis mobil',
                'status'    => false
            ];
        } elseif ($request->lisence_plate == NULL) {
            $json = [
                'msg'       => 'Mohon berikan plat nomor mobil',
                'status'    => false
            ];
        } elseif ($request->lisence_plate == NULL) {
            $json = [
                'msg'       => 'Mohon berikan plat nomor mobil',
                'status'    => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request, $id) {
                    Car::where('id', $id)->update([
                        'name' => $request->name,
                        'type' => $request->type,
                        'lisence_plate' => $request->lisence_plate,
                        'owner' => $request->owner
                    ]);
                });

                $json = [
                    'msg' => 'Mobil berhasil disunting',
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
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $car = Car::find($id);
            if (!$car) {
                $json = [
                    'msg' => 'Data Tidak Ditemukan',
                    'status' => false,
                ];
            }
            DB::transaction(function () use ($id) {
                DB::table('cars')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'Mobil berhasil dihapus',
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
