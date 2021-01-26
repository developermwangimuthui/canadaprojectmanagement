<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Models\UserCompany;
use App\Models\UserLoggedInto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $companies = DB::table('user_companies')->
        join('companies', 'companies.id', '=', 'user_companies.company_id')
            ->where('user_companies.user_id', $user->id)
            ->get();

        if (Str::startsWith(request()->path(), 'api')) {
            $company = CompanyResource::collection($companies);


            return response([
                'error' => False,
                'message' => 'Success',
                'company' => $company
            ], Response::HTTP_OK);

        } else {
            return view('company.index');
        }


    }

    public function singleCompany($id)
    {
        $company = Company::where('id', $id)->get();


        $company = CompanyResource::collection($company);

        if (Str::startsWith(request()->path(), 'api')) {
            if (!$company) {
                return response([
                    'error' => true,
                    'message' => 'Project does not exist'
                ], Response::HTTP_OK);
            }
            return response([
                'error' => False,
                'message' => 'Success',
                'company' => $company
            ], Response::HTTP_OK);
        } else {

            return view('company.view', compact('company'));


        }
    }

    public function connect($id)
    {

        $user = Auth::user();
        $user_id = Auth::user()->id;

        $companyconnected = UserloggedInto::where('user_id', $user_id)->count();
        if ($companyconnected > 0) {
            DB::table('user_logged_intos')->where('user_id', $user_id)->update(['company_id' => $id]);
        } else {
            $login = new UserloggedInto;
            $login->user_id = $user_id;
            $login->store_id = $id;
            $login->save();


        }

        $companyname = Company::where('id', $id)->pluck('name')->first();
        $company = Company::where('id', $id)->get();

        $company = CompanyResource::collection($company);

        if (Str::startsWith(request()->path(), 'api')) {

            return response([
                'error' => False,
                'message' => 'Success',
                'company' => $company
            ], Response::HTTP_OK);
        } else {

            return redirect()->route('home')
                ->with('success', 'You have connected to ' . $companyname);
        }


    }


    public function create()
    {
        //

        return view('company.create');
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'location' => 'required'
        ]);



        $user_id = Auth::user()->id;

        $company = new Company();
        $company->name = $request->input('name');
        $company->location = $request->input('location');
        $company->user_id = $user_id;
        $company->save();

        $company_id = $company->id;

        $user_company = new UserCompany();
        $user_company->user_id = $user_id;
        $user_company->company_id = $company_id;
        $user_company->save();


       
        $companies = DB::table('user_companies')->
        join('companies', 'companies.id', '=', 'user_companies.company_id')
            ->where('user_companies.user_id', $user_id)
            ->get();

            $company = CompanyResource::collection($companies);
        if (Str::startsWith(request()->path(), 'api')) {
            return response([
                'error' => False,
                'message' => 'Success',
                'company' => $company
            ], Response::HTTP_OK);

        } else {

            return redirect()->route('store.index')
                ->with('success', 'Store added succesfully!!');
        }


    }


    public function show(Store $store)
    {
        //
    }

    public function edit(Store $store)
    {
        //
    }


    public function update(Request $request, Store $store)
    {
        //
    }


    public function destroy($id)
    {
        //
        $user = Auth::user();
        if ($user->hasRole('Chain Manager')) {
            # code...

            DB::table('stores')->where('id', $id)->delete();
            return redirect()->route('store.index')
                ->with('success', 'Store deleted ');
        }


    }
}
