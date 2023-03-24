<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Pour recupérer tous les utilsateurs de la BD
     * @return  \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $leads = Lead::all();
        return response()->json($leads);
    }

    /**
     * pour enregistrer un nouvel utilisateur dans la base de données
     * 
     * @param Request $request
     */
    public function create(Request $request)
    {
        $lead = new Lead();
        
        $lead->full_name = $request->input('name');
        $lead->surname = $request->input('email');
        $lead->save();

        DB::collection('Leads')->insert([
            'full_name' => 'name1',
            'email_address' => 'email_address',
            'industry' => 'industry'
        ]);

        return response()->json($lead);
    }

    /**
     * On renvoit l'individu dans la BD
     * correspondant à l'id spécifié
     * 
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get($id)
    {
        $lead = Lead::find($id);

        return response()->json($lead);
    }

    /**
     * Mettre à jour les informations sur un utilisateur de la BD
     * 
     * @param Request $request
     * @param $id
     * @return  \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,$id)
    {
        $lead = Lead::find($id);

        $lead->name = $request->input('name');
        $lead->surname = $request->input('surname');
        $lead->username = $request->input('username');

        $lead->save();

        return response()->json($lead);
    }

    public function delete($id)
    {
        $lead = Lead::find($id);

        $lead->delete();

        return response()->json('Success');
    }
}
