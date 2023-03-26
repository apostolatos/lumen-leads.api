<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\CrudValidationTrait;
use App\ActiveCampaign\ActiveCampaign;

class LeadController extends Controller
{
    // use CrudValidationTrait;

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
    public function createOrUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'industry' => 'required'
        ]);

        if ($lead = Lead::where('email', $request->input('email'))->first()) {
            return $this->update($request, $lead->id);
        }

        return $this->create($request);
    }

    public function create(Request $request)
    {
        $lead = new Lead();

        $lead->full_name = $request->input('name');
        $lead->email = $request->input('email');
        $lead->industry = $request->input('industry');

        $lead->save();

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
    public function update(Request $request, $id)
    {
        $lead = Lead::find($id)->update(['full_name' => $request->input('name')]);

        return response()->json($lead);
    }

    public function delete($id)
    {
        $lead = Lead::find($id);

        $lead->delete();

        return response()->json('Success');
    }
}
