<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Http\Requests\Pharmacy\StoreRequest;
use App\Http\Requests\Pharmacy\UpdateRequest;
use App\Services\PharmacyService;

class PharmacyController extends Controller
{
    protected $pharmacyService;

    public function __construct(PharmacyService $pharmacyService)
    {
        $this->pharmacyService = $pharmacyService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacies = $this->pharmacyService->getAll();
        return view('pharmacies.index' , compact('pharmacies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\pharmacy\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {            
        $data = $request->validated();
        $this->pharmacyService->create($data);
  
        return redirect()->route('pharmacies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(pharmacy $pharmacy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit($pharmacy_id)
    {
        $pharmacy = $this->pharmacyService->find($pharmacy_id);
        return view('pharmacies.edit' , compact('pharmacy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\pharmacy\UpdateRequest  $request
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $pharmacy_id)
    {
        $data = $request->validated();
        $this->pharmacyService->update($pharmacy_id , $data);
  
        return redirect()->route('pharmacies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy($pharmacy_id)
    {
        $this->pharmacyService->delete($pharmacy_id);
        return redirect()->route('pharmacies.index');
    }
}
