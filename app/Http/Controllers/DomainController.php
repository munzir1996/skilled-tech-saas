<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Database\Models\Domain;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domains = Domain::all();

        return view('domains.index', [
            'domains' => $domains,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(redirect()->to('http://' . $request->name . '.' . env('APP_URL')));
        $validated = $request->validate([
            'name' => 'required|unique:tenants,id',
        ]);

        $tenantModel = Tenant::create([
            'id' => $request->name,
        ]);

        $tenantModel->domains()->create([
            'domain' => $request->name,
        ]);

        // return redirect()->to('http://' . $request->name . '.' . env('APP_URL'));
        return redirect()->route('domains.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $domain = Domain::findOrFail($id);

        $domain->tenant->delete();

        return redirect()->route('domains.index');
    }

    public function storeSubdomainRedirect(Request $request)
    {
        // dd(redirect()->to('http://' . $request->name . '.' . env('APP_URL')));
        $validated = $request->validate([
            'name' => 'required|unique:tenants,id',
        ]);

        $tenantModel = Tenant::create([
            'id' => $request->name,
        ]);

        $tenantModel->domains()->create([
            'domain' => $request->name,
        ]);

        return redirect()->to('http://' . $request->name . '.' . env('APP_URL'));
    }
}
