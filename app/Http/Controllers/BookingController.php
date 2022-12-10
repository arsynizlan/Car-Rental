<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'script' => 'components.scripts.bookings',
            'cars' => Car::all()->pluck('name', 'id'),
            'responsible_person' => User::Role('Responsible Person')->pluck('name', 'id'),
        ];
        return view('pages.bookings.index', $data);
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

        if ($request->driver_name == NULL) {
            $json = [
                'msg'       => 'Mohon berikan nama driver',
                'status'    => false
            ];
        } elseif ($request->car_id == NULL) {
            $json = [
                'msg'       => 'Mohon pilih mobil',
                'status'    => false
            ];
        } elseif ($request->loan_date == NULL) {
            $json = [
                'msg'       => 'Mohon isi tanggal pinjam mobil',
                'status'    => false
            ];
        } elseif ($request->returned_date == NULL) {
            $json = [
                'msg'       => 'Mohon isi tanggal kembali mobil',
                'status'    => false
            ];
        } elseif ($request->loan_date > $request->returned_date) {
            $json = [
                'msg'       => 'Tanggal Kembali Mobil Tidak Valid',
                'status'    => false
            ];
        } elseif ($request->responsible_person == NULL) {
            $json = [
                'msg'       => 'Mohon isi Penganggung Jawab',
                'status'    => false
            ];
        } else {
            try {
                DB::transaction(function () use ($request) {
                    Booking::create([
                        'driver_name' => $request->driver_name,
                        'car_id' => $request->car_id,
                        'loan_date' => $request->loan_date,
                        'returned_date' => $request->returned_date,
                        'user_id' => $request->responsible_person
                    ]);
                });

                $json = [
                    'msg' => 'Pesanan berhasil ditambahkan',
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
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            $data = Booking::where('id', $id)
                ->first();
            return Response::json($data);
        }
        $data = Booking::orderBy('id', 'desc')
            ->get();
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('car_id', function ($row) {
                return $row->car->name;
            })
            ->addColumn('lisence_plate', function ($row) {
                return $row->car->lisence_plate;
            })
            ->addColumn('duration', function ($row) {
                $start_Date = $row->loan_date;
                $end_Date = $row->returned_date;
                $start = Carbon::parse($start_Date);
                $end = Carbon::parse($end_Date);
                $length = $start->diffInDays($end);
                if ($length == 0) {
                    $length += 1;
                }
                return $length . ' Hari';
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 0) {
                    return 'Menunggu Persetujuan';
                } elseif ($row->status == 1) {
                    return 'Ditolak';
                } else {
                    return 'Diterima';
                }
            })
            ->addColumn('user_id', function ($row) {
                return $row->user->name;
            })
            ->addColumn('action', function ($row) {
                $data = [
                    'id' => $row->id
                ];

                return view('components.buttons.bookings', $data);
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $booking = Booking::find($id);
            if (!$booking) {
                $json = [
                    'msg' => 'Data Tidak Ditemukan',
                    'status' => false,
                ];
            }
            DB::transaction(function () use ($id) {
                DB::table('bookings')->where('id', $id)->delete();
            });

            $json = [
                'msg' => 'Pesanan berhasil dihapus',
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