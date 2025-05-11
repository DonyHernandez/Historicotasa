<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
Use App\Models\Historialtasa;

class StoreBcvRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:fetch-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch exchange rates from BCV and store them in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $arrContextOptions=array(                                // se puede usar en desarrollo. NO usar en produccion.
        //     "ssl"=>array("verify_peer"=>false,
        //         "verify_peer_name"=>false,
        //     ),
        // );
        try {
            // $response = Http::withOptions([
            //     'verify' => storage_path('certs/cacert.pem')
            // ])->get('https://www.bcv.org.ve');
            $response = Http::withoutVerifying()->get('https://www.bcv.org.ve/');
            $html = $response->body();

            // Usar una librería de parsing HTML como DomCrawler
            $crawler = new Crawler($html);

            // El Euro generalmente está en un div con clase 'recuadrotsmc'
            $valorEuro = $crawler->filter('#euro div.centrado strong')->text();
            // $valorEuro = trim($valorEuro);
            $valorEuro = $valorEuro;
            // $valorNumericoEuro = (float) str_replace(',', '.', str_replace('.', '', $valorEuro));


            // El Yuan generalmente está en un div con clase 'recuadrotsmc'
            $valorYuan = $crawler->filter('#yuan div.centrado strong')->text();
            // $valorYuan = trim($valorYuan);
            $valorYuan = $valorYuan;
            // $valorNumericoYuan = (float) str_replace(',', '.', str_replace('.', '', $valorYuan));


            // El Lira generalmente está en un div con clase 'recuadrotsmc'
            $valorLira = $crawler->filter('#lira div.centrado strong')->text();
            // $valorLira = trim($valorLira);
            $valorLira = $valorLira;
            // $valorNumericoLira = (float) str_replace(',', '.', str_replace('.', '', $valorLira));


            // El Rublo generalmente está en un div con clase 'recuadrotsmc'
            $valorRublo = $crawler->filter('#rublo div.centrado strong')->text();
            // $valorRublo = trim($valorRublo);
            $valorRublo = $valorRublo;
            // $valorNumericoRublo = (float) str_replace(',', '.', str_replace('.', '', $valorRublo));


            // El Dolar generalmente está en un div con clase 'recuadrotsmc'
            $valorDolar = $crawler->filter('#dolar div.centrado strong')->text();
            // $valorDolar = trim($valorDolar);
            $valorDolar = $valorDolar;
            // $valorNumericoDolar = (float) str_replace(',', '.', str_replace('.', '', $valorDolar));


            //Fecha de publicacion de la tasa, Extrae la fecha del atributo "content"
            $fechaBCV = $crawler->filter('span.date-display-single')->attr('content');
            // Formatea la fecha a "dd-mm-YYYY" (ej: "22-04-2025")
            $fechaFormateada = \Carbon\Carbon::parse($fechaBCV)->format('d-m-Y H:i:s');

            // dd($fechaFormateada); // Resultado: "22-04-2025"




            // Crear La tasa
            Historialtasa::Create(
                [
                    // 'operacion' carga de la tasa en BCV.
                    'fechaval1' => now()->toDateString(),
                    //suma un dia para realizar la busqueda
                    'fechaval2' => now()->addDay()->toDateString(),
                    // 'eur' => $valorNumericoEuro,
                    'eur' => $valorEuro,
                    // 'cny' => $valorNumericoYuan,
                    'cny' => $valorYuan,
                    // 'try' => $valorNumericoLira,
                    'try' => $valorLira,
                    // 'rub' => $valorNumericoRublo,
                    'rub' => $valorRublo,
                    // 'usd' => $valorNumericoDolar,
                    'usd' => $valorDolar,
                    // Fecha de publicacion de la tasa en xls
                    'fechaope' => $fechaFormateada,

                ]
            );
            $this->info('Exchange rates fetched and stored successfully.');
        } catch (\Exception $e) {
            $this->error('Error fetching exchange rates: ' . $e->getMessage());
            // Enviar correo electrónico de error
            \Mail::to('dhernandez@citymarket.com.ve')->send(new \App\Mail\ExchangeRateError($e->getMessage()));
        }
    }
}
