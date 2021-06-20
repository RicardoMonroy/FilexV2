<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Signature;
use App\Signed;
use App\User;
use Dompdf\Dompdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpCfdi\Credentials\Credential;
use setasign\Fpdi\FpdfTpl;
use setasign\Fpdi\Fpdi;

class SignatureController extends Controller
{
    public function presign($id)
    {
        $contract = Contract::find($id);
        $user = Auth::user();

        return view('signatures.presign', compact('contract', 'user'));
    }

    public function sign(Request $request)
    {
        // dd($request->all());

        if($request->cerFile && $request->pemKeyFile && $request->passPhrase){
            $cerFile = 'file://' . $request->cerFile;
            $pemKeyFile = 'file://' . $request->pemKeyFile;
            $passPhrase = $request->passPhrase; // contraseña para abrir la llave privada
            try {
                $fiel = Credential::openFiles($cerFile, $pemKeyFile, $passPhrase);
            } catch (Exception $exception) {
                $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

                return redirect()->back()->with('warning', 'Parece que el password no es correcto!');
            }

            $sourceString = $request->contractName;
            // alias de privateKey/sign/verify
            $signature = $fiel->sign($sourceString);
            // echo base64_encode($signature), PHP_EOL;
            // alias de certificado/publicKey/verify
            $verify = $fiel->verify($sourceString, $signature);
            // var_dump($verify); // bool(true)
            // objeto certificado
            $certificado = $fiel->certificate();
            // echo $certificado->rfc(), PHP_EOL; // el RFC del certificado
            // echo $certificado->legalName(), PHP_EOL; // el nombre del propietario del certificado
            // echo $certificado->branchName(), PHP_EOL; // el nombre de la sucursal (en CSD, en FIEL está vacía)
            // echo $certificado->serialNumber()->bytes(), PHP_EOL; // número de serie del certificado
            // dd($certificado);
            try {
                $data = $certificado->serialNumber()->bytes();
                $str = $this->strToHex($data);
            } catch (Exception $exception) {
                $str = 'N/A';
            }
            // $hex = $this->hexToStr($str);
            // dd($data, $str, $hex);
            // dd(Auth::user()->id);
            $signature = Signature::create([
                'user_id' => Auth::user()->id,
                'contract_id' => $request->contractId,
                'verify' => $verify,
                'string' => base64_encode($signature),
                'rfc' => $certificado->rfc(),
                'legalName' => $certificado->legalName(),
                'branchName' => $certificado->branchName(),
                'serialNumber' => $str
            ]);

            $contractId = $request->contractId;
            $guests = DB::table('contract_user')->where('contract_id', $contractId)->get();
            $signatures = DB::table('signatures')->where('contract_id', $contractId)->get();

            if ($signatures->count() == $guests->count()) {
                $i = $this->generate($contractId);

                return redirect()->route('contracts.show', $contractId)->with('info', 'Se firmó el documento!');
            }
            else{
                return redirect()->route('contracts.index')->with('info', 'Se firmó el documento!');
            }
        }
        else{
            // dd($request->all());

            $cerFile = 'storage/0-Filex/certificate.crt';
            $pemKeyFile = 'storage/0-Filex/privateKey.key';
            $passPhrase = 'Filex'; // contraseña para abrir la llave privada
            try {
                $fiel = Credential::openFiles($cerFile, $pemKeyFile, $passPhrase);
            } catch (Exception $exception) {
                $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

                return redirect()->back()->with('warning', 'Parece que el password no es correcto!');
            }

            $sourceString = $request->contractName;
            // alias de privateKey/sign/verify
            $signature = $fiel->sign($sourceString);
            // echo base64_encode($signature), PHP_EOL;
            // alias de certificado/publicKey/verify
            $verify = $fiel->verify($sourceString, $signature);
            // var_dump($verify); // bool(true)
            // objeto certificado
            $certificado = $fiel->certificate();
            // echo $certificado->rfc(), PHP_EOL; // el RFC del certificado
            // echo $certificado->legalName(), PHP_EOL; // el nombre del propietario del certificado
            // echo $certificado->branchName(), PHP_EOL; // el nombre de la sucursal (en CSD, en FIEL está vacía)
            // echo $certificado->serialNumber()->bytes(), PHP_EOL; // número de serie del certificado
            // dd($certificado);
            try {
                $data = $certificado->serialNumber()->bytes();
                $str = $this->strToHex($data);
            } catch (Exception $exception) {
                $str = 'N/A';
            }
            // $hex = $this->hexToStr($str);
            // dd($data, $str, $hex);
            // dd(base64_encode($signature));
            $signature = Signature::create([
                'user_id' => Auth::user()->id,
                'contract_id' => $request->contractId,
                'verify' => $verify,
                'string' => base64_encode($signature),
                'rfc' => $request->rfc,
                'legalName' => $request->name,
                'branchName' => $certificado->branchName(),
                'serialNumber' => $str
            ]);

            $contractId = $request->contractId;
            $guests = DB::table('contract_user')->where('contract_id', $contractId)->get();
            $signatures = DB::table('signatures')->where('contract_id', $contractId)->get();

            if ($signatures->count() == $guests->count()) {
                $i = $this->generate($contractId);

                return redirect()->route('contracts.show', $contractId)->with('info', 'Se firmó el documento!');
            }
            else{
                return redirect()->route('contracts.index')->with('info', 'Se firmó el documento!');
            }

        }



    }

    public function strToHex($string)
    {
        $hex = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $hex .= dechex(ord($string[$i]));
        }
        return $hex;
    }
    public function hexToStr($hex)
    {
        $string = '';
        for ($i = 0; $i < strlen($hex) - 1; $i += 2) {
            $string .= chr(hexdec($hex[$i] . $hex[$i + 1]));
        }
        return $string;
    }


    public function generatePDF(Request $request){
        // dd($request->all());
        $contract = Contract::find($request->contractId);
        // dd($contractId->id);
        $this->generate($contract->id);

        $guests = DB::table('contract_user')->where('contract_id', $contract->id )->get();
        $ready = true;


        return view('contracts.show', compact('contract', 'guests', 'ready'));
    }

    public function generate($contractId)
    {
        $contract = Contract::find($contractId);
        // dd($contract);
        $data['title'] = 'Contrato firmado';
        $data['css_files'] = [asset('backend/css/main.css'),];
        $html = '
                <style>
                    table{
                        /* border-bottom: 1 solid #000000; */
                        border: 0.2px solid #000;
                        width: 100%;
                        text-align: left;
                    }
                    td, th {
                        width: 50%;
                    }
                    img {
                        position: absolute;
                        max-height: 100px;
                    }
                    textarea{
                        border: none;
                        font-size: 0.8em;
                        min-height: 4em;
                    }
                </style>
                <table>
                    <thead>
                        <tr>
                            <th>Firmas del contrato: ' . $contract->name . '</th>
                        </tr>
                    </thead>
                </table>
                ';

        foreach( $contract->signatures as $signature ) {
            if ( !isset($signature->user->handwritten->base64) ){
                $base64 = ''; // poner aquí un sello filex para reemplazar a la firma
            }else{
                $base64 = $signature->user->handwritten->base64;
            }
            $html .= '
            <table>
                    <tbody>
                        <tr>
                            <td><strong>Nombre: </strong>' . $signature->user->name . '</td>
                            <td><img src="data:image/png;base64, '. $base64 .'" alt=""></td>
                        </tr>
                        <tr>
                            <td><strong>Nombre legal: </strong>' . $signature->legalName . '</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Correo: </strong>' . $signature->user->email . '</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>RFC: </strong>' . $signature->rfc . '</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>No. de Serie SCD: </strong>' . $signature->serialNumber . '</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Firma Digital: </strong></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td><textarea class="form-control" placeholder="">' . $signature->string . '</textarea></td>
                        </tr>
                    </tbody>
                </table>
            ';
        }
        // dd($html);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->render();

        $userId = $contract->user->id;
        $hoy = date("Y-m-d H:i:s");

        if (!file_exists('/public/' . $this->getOwnerFolder($userId))) {
            Storage::makeDirectory('/public/' . $this->getOwnerFolder($userId));
        }
        // dd($contract->user->id, 'storage/' . $this->getOwnerFolder($userId) . '/' . str_replace(' ','-', $contract->name ) . '-anexo.pdf');
        // dd($contract->file->file);

        file_put_contents('storage/' . $this->getOwnerFolder($userId) . '/' . str_replace(' ','-', $contract->name ) . '-anexo.pdf', $dompdf->output());

        $pdf = new Fpdi();
        $pagecount = $pdf->setSourceFile('storage/' . $contract->file->file);
        for ($i = 0; $i < $pagecount; $i++) {
            $pdf->AddPage('P', 'Letter');
            $tplidx = $pdf->importPage($i + 1, '/MediaBox');
            $pdf->useTemplate($tplidx, 10, 10, 200);
        }
        $pdf->AddPage('P', 'Letter');
        // $tplIdx = $pdf->importPage($pagecount);
        // $pdf->useTemplate($tplIdx);
        // dd('storage/' . $this->getOwnerFolder($userId) . '/' . str_replace(' ','-', $contract->name ) . '-anexo.pdf');
        $anexo = 'storage/' . $this->getOwnerFolder($userId) . '/' . str_replace(' ','-', $contract->name ) . '-anexo.pdf';
        $pdf->setSourceFile($anexo);

        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);
        $pdf->Output('storage/' . $this->getOwnerFolder($userId) . '/' . $hoy . '-' . str_replace(' ','-', $contract->name ) . '.pdf', 'F');

        $signed = Signed::create([
            'url' => $this->getOwnerFolder($userId) . '/' . $hoy . '-' . str_replace(' ','-', $contract->name ) . '.pdf',
            'user_id' => $contract->user->id,
            'contract_id' => $contractId
        ]);
        // if(Storage::disk('public')->exists($anexo))
        // {
        //     dd('encontrado', $anexo);
        //     Storage::disk('public')->delete($anexo);
        // }
        // else
        // {
        //     dd('no encontrado', $anexo);
        // }
        // dd('pausa');

        return true;
    }

    private function getOwnerFolder($id)
    {
        $user = User::find($id);

        return str_replace(' ', '-', $user->id . '-' . $user->name);
    }
}
