<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class IndicesController extends Controller
{
    /**
     * Define as variáveis para usarmos como base
     */
    private $goutteClient;
    private $guzzleClient;

    /**
     * Define as urls a qual iremos fazer o scraping
     */
    const url_tjsp = "https://debit.com.br/tabelas/tabela-completa.php?indice=aasp";
    const url_ortn = "https://debit.com.br/tabelas/tabela-completa.php?indice=btn";
    const url_ufir = "https://debit.com.br/tabelas/tabela-completa.php?indice=ufir";

    const url_caderneta_poupanca = "https://debit.com.br/tabelas/tabela-completa.php?indice=poupanca";
    const url_igpdi = "https://debit.com.br/tabelas/tabela-completa.php?indice=igp";
    const url_igpm = "https://debit.com.br/tabelas/tabela-completa.php?indice=igpm";
    const url_inpc = "https://debit.com.br/tabelas/tabela-completa.php?indice=inpc";
    const url_ipca = "https://debit.com.br/tabelas/ipca-indice-nacional-de-precos-ao-consumidor-amplo.php"; #posição é diferente
    const url_selic = "https://debit.com.br/tabelas/tabela-completa.php?indice=selic";
    const url_ipc_fipe = "https://debit.com.br/tabelas/tabela-completa.php?indice=ipc_fipe";
    const url_tr = "https://debit.com.br/tabelas/tabela-completa.php?indice=tr";
    const url_tjmg = "https://debit.com.br/tabelas/tabela-completa.php?indice=tjmg";
    
    function __construct()
    {
        // Cria o cliente do goutte
        $this->goutteClient = new Client();

        // Cria o cliente do Guzzle
        $this->guzzleClient = new GuzzleClient(['timeout' => 3,]);
        
        // Informa ao cliente do goutte que utilizaremos o guzzle
        $this->goutteClient->setClient($this->guzzleClient);
    }

    /**
     * Trata o texto do endpoint, retornando no padrão desejado
     *
     * @param object $crawler
     * @param string $filtro
     * @return array
     */
    private function getDataIndice($crawler, $filtro): array 
    {

        return $crawler->filter($filtro)->each(function ($node) {
            $texto = trim($node->text());

            // separando a data do indice
            $data_indice = explode(" ", $texto);

            // pegando data
            $data = $data_indice[0];

            // pegando indice
            $indice = $data_indice[1];

            // separa ano do mês
            $data = explode("/", $data);
            $mes = $data[0];
            $ano = $data[1];
            
            return [$ano, $mes, $indice];
        });

    }

    /**
     * Define a formatação do retorno
     *
     * @param array $anoMesIndice
     * @return array
     */
    private function tipoRetorno($anoMesIndice): array 
    {
        // return json_encode($anoMesIndice);
        return $anoMesIndice;
    }

    /**
     * Busca os índices TJSP
     *
     * @return array
     */
    public function indiceTjsp(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_tjsp);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices ORTN
     *
     * @return array
     */
    public function indiceOrtn(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_ortn);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices ORTN
     *
     * @return array
     */
    public function indiceUfir(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_ufir);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices CADERNETA POUPANÇA
     *
     * @return array
     */
    public function indiceCadernetaPoupanca(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_caderneta_poupanca);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices IGPDI
     *
     * @return array
     */
    public function indiceIgpdi(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_igpdi);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices IGPM
     *
     * @return array
     */
    public function indiceIgpm(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_igpm);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices INPC
     *
     * @return array
     */
    public function indiceInpc(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_inpc);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices IPCA
     *
     * @return array
     */
    public function indiceIpca(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_ipca);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices SELIC
     *
     * @return array
     */
    public function indiceSelic(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_selic);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices IPC
     *
     * @return array
     */
    public function indiceIpcFipe(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_ipc_fipe);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices TR
     *
     * @return array
     */
    public function indiceTr(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_tr);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }

    /**
     * Busca os índices TJMG
     *
     * @return array
     */
    public function indiceTjmg(): array
    {
        $crawler = $this->goutteClient->request('GET', self::url_tjmg);
        $anoMesIndice = [];
        
        for ($i=1; $i < 12; $i++) { 
            $filtro = "#preview6 > div > table > tbody > tr:nth-child({$i})";
            $arrayIndices = self::getDataIndice($crawler, $filtro);
            foreach ($arrayIndices as $value) {
                $anoMesIndice[$value[0]][$value[1]] = $value[2];
            }
        }

        return self::tipoRetorno($anoMesIndice);
    }
}
