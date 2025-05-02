<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
use App\Models\Historialtasa;

class TasaBcvController extends Controller
{
    //
    public function index()
    {
        return view('vistatasa');

    }

//     public function ObtenerTasaBCV()
//     {
//         $client = new HttpBrowser();
//         $crawler = $client->request('GET', 'https://www.bcv.org.ve/');  // Se URL para acceder a la pagina BCV

//         // Suponiendo que la tasa esta en un elemento con id "tasa-actual"
//         $tasaElement =$crawler->filter_id('#dollar');
// // dd($tasaElement);
//         if($tasaElement->count()>0)
//         {
//             $tasa = $tasaElement->text();
//             //Limpiar y convertir la tasa segun sea necesario
//             // return $tasa;  //Code Original
//             return view ('vistatasa', compact('tasa'));
//             // return view('posts.index', compact('posts'));

//         }else{

//             return 'No se pudo enontrar la tasa';

//         }
//     }
}
