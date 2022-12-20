<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ApprovalHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'script' => 'components.scripts.approvalHistories',
            'cars' => Car::all()->pluck('name', 'id'),
            'responsible_person' => User::Role('Responsible Person')->pluck('name', 'id'),
        ];
        return view('pages.approvalHistories.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_numeric($id)) {
            $data = Booking::where('id', $id)
                ->first();
            return Response::json($data);
        }
        $data = Booking::where('user_id', '=', Auth::user()->id)
            ->where('status', '>', '1')
            ->orderBy('id', 'desc')
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
            ->addColumn('duration', function ($row) {
                $start_Date = $row->date_from;
                $end_Date = $row->date_to;
                $start = Carbon::parse($start_Date);
                $end = Carbon::parse($end_Date);
                $length = $start->diffInDays($end);
                $length += 1;
                return $length . ' Hari';
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 0) {
                    return '<span class="badge bg-info">' . 'Menunggu Persetujuan Admin' . '</span>';
                } elseif ($row->status == 1) {
                    return '<span class="badge bg-danger">' . 'Ditolak oleh Admin' . '</span>';
                } elseif ($row->status == 2) {
                    return '<span class="badge bg-info">' . 'Menunggu Persetujuan Penanggung Jawab' . '</span>';
                } elseif ($row->status == 3) {
                    return '<span class="badge bg-danger">' . 'Ditolak oleh Penanggung Jawab' . '</span>';
                } else {
                    return '<span class="badge bg-success">' . 'Disetujui' . '</span>';
                }
            })

            ->rawColumns(['lisence_plate', 'status'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
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