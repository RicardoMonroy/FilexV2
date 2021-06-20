<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Mail\SendInvitation;
use App\Signature;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mycontracts = Contract::where('user_id', Auth::user()->id)
            // ->orWhere('signer_two_mail', Auth::user()->email)
            ->get();

            $myinvitations = Auth::user()->contracts;

            // dd($myinvitations);

        return view('contracts.index', compact('mycontracts', 'myinvitations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

        return view('contracts.create', compact('files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $contract = DB::table('contracts')->where('file_id', $request->id)->exists();

        if( $contract ){ // Si existe el contrato
            $contract = Contract::find($request->id); // Recuperar contrato
            // $sign = DB::table('signatures')->where('contract_id', $request->id )->first(); // Recuperar Id contrato
            // $user = Signature::where('id', $contract->id)->where('user_id', Auth::user()->id )->first();

            $signs = Signature::where('contract_id', $request->id)->where('user_id', Auth::user()->id)->first();

            // dd('ID contrato: '.$contract->id, 'ID Usuario: '.Auth::user()->id, $signs);

            if( isset($signs) ){
                return back()->with('message','Parece que ya firmaste anteriormente este documento!');
            }
            else{
                return redirect()->route('signatures.presign', $request->id);
            }

        }
        elseif( !$contract ){ // Si no existe el contrato
            if ($request->type == "individual"){
                $file = File::find($request->id);
                $name = $file->name;
                $message = 'Documento firmado en Filex, la mejor plataforma para firmas electrónicas de documentos.';
                $file_id = $file->id;
                $user_name = Auth::user()->name;
                $user_id = $file->user_id;
                $contract = Contract::create([
                    'name' => $name,
                    'message' => $message,
                    'file_id' => $file_id,
                    'user_id' => $user_id,
                    'user_name' => $user_name,
                ]);
                DB::table('contract_user')->insert([
                    'user_id' => Auth::user()->id,
                    'contract_id' => $contract->id,
                    'email' => Auth::user()->email,
                    'created_at' => now()
                ]);
                return redirect()->route('signatures.presign', $contract->id)->with('message','Se ha creado el contrato automáticamente!');

            }elseif($request->type == "Grupal"){
                $file = File::find($request->file_id);
                $name = $request->name;
                $message = $request->message;
                $file_id = $request->file_id;
                $user_id = $file->user_id;
                $user_name = Auth::user()->name;
                for( $i = 0 ; $i < $request->nmails ; $i++ ){
                    if($i == 0){$guest_id[$i] = $request->guest_id0;}
                    if($i == 1){$guest_id[$i] = $request->guest_id1;}
                    if($i == 2){$guest_id[$i] = $request->guest_id2;}
                    if($i == 3){$guest_id[$i] = $request->guest_id3;}
                    if($i == 4){$guest_id[$i] = $request->guest_id4;}
                    if($i == 5){$guest_id[$i] = $request->guest_id5;}
                    if($i == 6){$guest_id[$i] = $request->guest_id6;}
                    if($i == 7){$guest_id[$i] = $request->guest_id7;}
                    if($i == 8){$guest_id[$i] = $request->guest_id8;}
                    if($i == 9){$guest_id[$i] = $request->guest_id9;}
                }
                for( $i = 0 ; $i < $request->nmails ; $i++ ){
                    if($i == 0){$guest_email[$i] = $request->guest_email0;}
                    if($i == 1){$guest_email[$i] = $request->guest_email1;}
                    if($i == 2){$guest_email[$i] = $request->guest_email2;}
                    if($i == 3){$guest_email[$i] = $request->guest_email3;}
                    if($i == 4){$guest_email[$i] = $request->guest_email4;}
                    if($i == 5){$guest_email[$i] = $request->guest_email5;}
                    if($i == 6){$guest_email[$i] = $request->guest_email6;}
                    if($i == 7){$guest_email[$i] = $request->guest_email7;}
                    if($i == 8){$guest_email[$i] = $request->guest_email8;}
                    if($i == 9){$guest_email[$i] = $request->guest_email9;}
                }
                $contract = Contract::create([
                    'name' => $request->name,
                    'message' => $request->message,
                    'file_id' => $request->file_id,
                    'user_id' => Auth::user()->id,
                    'user_name' => $user_name,
                    'created_at' => now()
                ]);
                $receivers = '';
                DB::table('contract_user')->insert([
                    'user_id' => Auth::user()->id,
                    'contract_id' => $contract->id,
                    'email' => Auth::user()->email,
                    'created_at' => now()
                ]);
                for( $i = 0 ; $i < $request->nmails ; $i++ ){
                    DB::table('contract_user')->insert([
                        'user_id' => $guest_id[$i],
                        'contract_id' => $contract->id,
                        'email' => $guest_email[$i],
                        'created_at' => now()
                    ]);
                    Mail::to($guest_email[$i])->send(new SendInvitation($contract));
                }
                return redirect()->route('signatures.presign', $contract->id)->with('message','Se ha creado el contrato!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::find($id);
        $guests = DB::table('contract_user')->where('contract_id', $contract->id )->get();

        if( $contract->signatures->count() == $guests->count() ){
            $ready = true;
        }
        else{
            $ready = false;
        }
        // dd($contract->signed);

        return view('contracts.show', compact('contract', 'guests', 'ready'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('edit');
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
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroy');
    }

    public function confirm(Request $request)
    {
        // dd($request->all());
        $datos = $request->all();
        $file_id = $datos["file_id"];
        $name = $datos["name"];
        $message = $datos["message"];

        $file = File::find($file_id);

        $i = 0;
        foreach($datos as $dato){
            if( $i > 3 ){
                $guests[$i - 4] = $dato;
            }
            $i = $i + 1;
        }
        $j = 0;
        foreach($guests as $guest){
            if($guest = User::where('email', $guest)->first()){
                $users_id[$j] = $guest->id;
                $users_email[$j] = $guest->email;
                $users_name[$j] = $guest->name;
            }else{
                $users_id[$j] = NULL;
                $users_email[$j] = $guests[$j];
                $users_name[$j] = 'Invitado';
            }
            $j = $j + 1;
        }
        $nmails = $j;
        // dd($guests, $users_id, $users_email, $users_name);
        return view('contracts.confirm', compact('name', 'file', 'message', 'users_id', 'users_email', 'users_name', 'nmails'));
    }


}
