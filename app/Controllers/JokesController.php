<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\JokesModel;

class JokesController extends ResourceController
{
    use ResponseTrait;

    protected $jokesModel;

    public function __construct()
    {
        $this->jokesModel = new JokesModel();
        helper('language');
    }

    /**
     * Retorna a view home
     */
    public function index()
    {
        // Detecta o idioma da sessão ou usa português como padrão
        $language = session('language') ?? 'pt';
        
        // Define idiomas suportados
        $supportedLanguages = ['pt', 'en', 'es'];
        if (!in_array($language, $supportedLanguages)) {
            $language = 'pt';
        }
        
        // Define o idioma atual
        service('request')->setLocale($language);
        
        $data = [
            'current_language' => $language,
            'supported_languages' => $supportedLanguages
        ];
        
        return view('home', $data);
    }
    
    /**
     * Altera o idioma da sessão
     */
    public function setLanguage($language = 'pt')
    {
        $supportedLanguages = ['pt', 'en', 'es'];
        
        if (in_array($language, $supportedLanguages)) {
            session()->set('language', $language);
            service('request')->setLocale($language);
        }
        
        return redirect()->to('/');
    }

    /**
     * Retorna uma piada aleatória
     */
    public function random()
    {
        $category = service('request')->getGet('category');
        
        if ($category) {
            return $this->getRandomByCategory($category);
        }

        $randomJoke = $this->jokesModel->getRandomJoke();
        $response = $this->formatJokeResponse($randomJoke);

        return $this->respond($response);
    }

    /**
     * Retorna uma piada aleatória de uma categoria específica
     */
    private function getRandomByCategory($category)
    {
        $categoryJokes = $this->jokesModel->getJokesByCategory($category);

        if (empty($categoryJokes)) {
            return $this->failNotFound('Categoria não encontrada');
        }

        $randomJoke = $categoryJokes[array_rand($categoryJokes)];
        $response = $this->formatJokeResponse($randomJoke);

        return $this->respond($response);
    }

    /**
     * Retorna todas as categorias disponíveis
     */
    public function categories()
    {
        $categories = $this->jokesModel->getCategories();
        return $this->respond($categories);
    }

    /**
     * Busca piadas por texto
     */
    public function search()
    {
        $query = service('request')->getGet('query');
        
        if (!$query) {
            return $this->fail('Parâmetro query é obrigatório');
        }

        $jokes = $this->jokesModel->searchJokes($query);
        $results = [];

        foreach ($jokes as $joke) {
            $results[] = $this->formatJokeResponse($joke);
        }

        $response = [
            'total' => count($results),
            'result' => $results
        ];

        return $this->respond($response);
    }

    /**
     * Retorna uma piada específica por ID
     */
    public function show($id = null)
    {
        if (!$id) {
            return $this->fail('ID é obrigatório');
        }

        $joke = $this->jokesModel->getJokeById($id);

        if (!$joke) {
            return $this->failNotFound('Piada não encontrada');
        }

        $response = $this->formatJokeResponse($joke);

        return $this->respond($response);
    }

    /**
     * Formata uma piada para resposta da API
     */
    private function formatJokeResponse($joke)
    {
        return [
            'id' => $joke['id'],
            'url' => base_url('jokes/' . $joke['id']),
            'value' => $joke['joke'],
            'theme' => $joke['theme']
        ];
    }
}
