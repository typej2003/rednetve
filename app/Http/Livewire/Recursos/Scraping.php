<?php

namespace App\Http\Livewire\Recursos;

use Livewire\Component;

use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
use Exception;

class Scraping extends Component
{
    public function doScraping()
    {
        $html = file_get_html($url);
    }

    function obtenerTasaBCV() {
        $url = 'www.bcv.org.ve';
        
        // Usamos file_get_contents con un contexto para manejar posibles errores SSL si es necesario
        $context = stream_context_create([
            "ssl" => [
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ],
        ]);

        $html_content = file_get_contents($url, false, $context);

        if ($html_content === FALSE) {
            return "Error: No se pudo cargar la página del BCV.";
        }

        // Crea un objeto DOM a partir del string HTML
        $html = str_get_html($html_content);

        if (!$html) {
            return "Error: No se pudo parsear el HTML.";
        }

        $tasa = null;

        // --- Lógica de Scraping ---
        // Buscamos un div específico con la clase 'dynamic-content'
        $div_dolar = $html->find('div.dynamic-content div.col-sm-6 div.row div.col-sm-12 div.row div.col-sm-7 div.content div.row div.col-sm-10 strong', 0);
        
        if ($div_dolar) {
            // Obtenemos el texto y limpiamos espacios y caracteres no deseados
            $tasa_texto = trim($div_dolar->plaintext);
            
            // El formato es "Bs. XXX.XXX,XX" o similar. 
            // Necesitamos extraer solo el número para poder usarlo en operaciones matemáticas
            $tasa_limpia = str_replace(['Bs. ', '.', ','], ['', '', '.'], $tasa_texto);
            
            // Convertimos a un número flotante (float)
            $tasa = (float)$tasa_limpia;
        }

        // Limpiamos la memoria del objeto DOM
        $html->clear();

        if ($tasa) {
            return $tasa;
        } else {
            return "Error: No se encontró la tasa de cambio en la estructura actual de la página.";
        }
    }

    public function getUsdRate()
    {
        $url = 'www.bcv.org.ve';

        try {
            // Usamos el HTTP Client de Laravel para hacer la petición de forma segura
            $response = Http::withoutVerifying()->get($url); // Usamos withoutVerifying para evitar problemas de SSL/certificados comunes en ese sitio

            if ($response->failed()) {
                throw new Exception("Error al cargar la página del BCV: " . $response->status());
            }

            $html_content = $response->body();

            // Usamos el Crawler de Symfony para navegar el HTML
            $crawler = new Crawler($html_content);

            // --- Lógica de Scraping ---
            // El selector CSS para encontrar el valor específico
            // La estructura es compleja y susceptible de cambiar:
            $selector = 'div.dynamic-content div.col-sm-6 div.row div.col-sm-12 div.row div.col-sm-7 div.content div.row div.col-sm-10 strong';
            
            $node = $crawler->filter($selector)->first();

            if ($node->count() === 0) {
                throw new Exception("No se encontró la tasa en la estructura actual de la página.");
            }

            // Obtenemos el texto y limpiamos
            $tasa_texto = trim($node->text());
            
            // Reemplazamos Bs. , y . para convertir a float en formato US
            // El formato es "Bs. 1.234.567,89" -> queremos 1234567.89
            $tasa_limpia = str_replace(['Bs. ', '.'], '', $tasa_texto);
            $tasa_final = str_replace(',', '.', $tasa_limpia);
            
            $tasa = (float)$tasa_final;

            return $tasa;

        } catch (Exception $e) {
            // En un entorno de Laravel, es mejor loguear el error
            \Log::error("BCV Scraper Error: " . $e->getMessage());
            return $e->getMessage(); // Devuelve el error para mostrarlo si es necesario
        }
    }

    public function render()
    {
        dd($this->getUsdRate());
        return view('livewire.recursos.scraping');
    }
}
