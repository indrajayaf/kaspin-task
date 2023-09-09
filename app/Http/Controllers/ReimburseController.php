<?php

namespace App\Http\Controllers;

use App\Models\Reimburse;
use App\Models\Status;
use Illuminate\Http\Request;

class ReimburseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        switch (auth()->user()->level->level) {
            case 'Staff':
                $data = Reimburse::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->filter(request(['search','status']))->get();
                break;
            case 'Directur':
                $data = Reimburse::latest()->filter(request(['search','status']))->get();
                break;
            case 'Finance':
                $data = Reimburse::where('status_id', '!=', '1')->orderBy('id', 'desc')->filter(request(['search','status']))->get();
                break;
            default:
                $data = Reimburse::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->filter(request(['search','status']))->get();
                break;
        }

        $title = "Data Reimbursement";
        if(request('search')){
            $title = "Hasil Pencarian Reimbursement";
        }
        return view('reimburses.index', [
            'title' => $title,
            'reimburses' => $data,
            'statuses' => Status::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reimburses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required',
            'amount' => 'required',
            'file' => 'file|mimes:png,jpg,jpeg,pdf|max:2048',
            'submitted_at' => 'required'
        ]);

        if($request->file('file')){
            $validatedData['file'] = $request->file('file')->store('bukti-reimburse');
        }

        $validatedData['user_id'] = auth()->user()->id;
        if(auth()->user()->level->level == 'Staff'){
            $validatedData['status_id'] = 1;
        }
        
        $validatedData['submitted_at'] = date('Y-m-d H:i:s', strtotime($validatedData['submitted_at']));

        Reimburse::create($validatedData);

        return redirect('/dashboard/reimburses')->with('success', 'New reimbursement has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reimburse $reimburse)
    {
        return view('reimburses.show', [
            'data' => $reimburse
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reimburse $reimburse)
    {
        return view('reimburses.edit', [
            'data' => $reimburse
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reimburse $reimburse)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required',
            'amount' => 'required',
            'submitted_at' => 'required'
        ]);

        if($request->file('file')){
            $validatedData['file'] = $request->file('file')->store('bukti-reimburse');
        }
        $validatedData['submitted_at'] = date('Y-m-d H:i:s', strtotime($validatedData['submitted_at']));

        if(auth()->user()->level->level == 'Staff'){
            $validatedData['status_id'] = 1;
        }

        Reimburse::where('id', $reimburse->id)->update($validatedData);

        return redirect('/dashboard/reimburses')->with('success', 'Reimbursement has been updated!');
    }

    public function action(Request $request, Reimburse $reimburse)
    {
        
        $data['status_id'] = $request->status_id;

        if($request->reason){
            $data['reason'] = $request->reason;
        }

        Reimburse::where('id', $reimburse->id)->update($data);

        switch ($data['status_id']) {
            case '2':
                $status = 'accepted';
                break;
            case '3':
                $status = 'declined';
                break;
            case '4':
                $status = 'paid';
                break;
            default:
                $status = 'updated';
                break;
        }
        return redirect('/dashboard/reimburses')->with('success', "The reimbursement has been $status!");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reimburse $reimburse)
    {
        Reimburse::destroy($reimburse->id);
        return redirect('/dashboard/reimburses')->with('success', 'Reimbursement has been deleted!');
    }
}
