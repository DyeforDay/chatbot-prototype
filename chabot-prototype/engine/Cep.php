<?php
#ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
# API: https://cep.awesomeapi.com.br/json/03590070
# Variáveis de resposta

# cep
# address (tipo + logradouro)
# state (estado)
# district (bairro)
# city


class Cep
{
    private $data; # variável array para armazenar os dados de retorno

    # método construtor
    public function __construct($cep)
    {
        # endereço de requisição da API - Endpoint
        $url = "https://cep.awesomeapi.com.br/json/$cep";

        # realizando a requisição e armazenando os dados retornados
        $content = json_decode(file_get_contents($url));

        # validação dos dados retornados
        if (strpos($http_response_header[0], "200")) {
            $this->data = $content;
        } else {
            throw new Exception("CEP [$cep] não localizado ou incorreto");

        }
    }

    # métodos get
    public function getAddress()
    {
        return $this->data->address;
    }

    public function getCity()
    {
        return $this->data->city;
    }

    public function getState()
    {
        return $this->data->state;
    }

    public function getDistrict()
    {
        return $this->data->district;
    }
    
    public function getData()
    {
        return $this->data;
    }

}

$x = new Cep("07223171");
print_r($x->getAddress() . PHP_EOL);
print_r(" - ");
print_r($x->getCity() . PHP_EOL);
print_r("/");
print_r($x->getState() . PHP_EOL);
print_r(" - ");
print_r($x->getDistrict() . PHP_EOL);
// try {
//     $x = new Cep("03590160");

//     print_r($x->getAddress() . "<br>"); # chamando a propriedade no objeto
//     print_r($x->getDistrict() . "<br>");
//     print_r($x->getCity() . "/" . $x->getState() . "<br>");

// } catch (Exception $th) {
//     print($th->getMessage());
//     die();
// }
