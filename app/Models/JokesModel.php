<?php

namespace App\Models;

use CodeIgniter\Model;

class JokesModel extends Model
{
    protected $jokesData;
    protected $categories;

    public function __construct()
    {
        parent::__construct();
        $this->loadJokesData();
    }

    /**
     * Carrega os dados das piadas do arquivo JSON
     */
    private function loadJokesData()
    {
        $jsonPath = APPPATH . 'Libraries/jokes.json';
        
        if (!file_exists($jsonPath)) {
            throw new \Exception('Arquivo de piadas não encontrado');
        }

        $jsonContent = file_get_contents($jsonPath);
        $this->jokesData = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Erro ao decodificar JSON: ' . json_last_error_msg());
        }

        $this->categories = $this->extractCategories();
    }

    /**
     * Retorna todas as piadas
     */
    public function getAllJokes()
    {
        return $this->jokesData['jokes'];
    }

    /**
     * Retorna uma piada aleatória
     */
    public function getRandomJoke()
    {
        $jokes = $this->jokesData['jokes'];
        return $jokes[array_rand($jokes)];
    }

    /**
     * Retorna uma piada por ID
     */
    public function getJokeById($id)
    {
        $jokes = $this->jokesData['jokes'];
        
        foreach ($jokes as $joke) {
            if ($joke['id'] == $id) {
                return $joke;
            }
        }
        
        return null;
    }

    /**
     * Retorna piadas de uma categoria específica
     */
    public function getJokesByCategory($category)
    {
        $jokes = $this->jokesData['jokes'];
        $categoryJokes = [];

        foreach ($jokes as $joke) {
            if (stripos($joke['theme'], $category) !== false) {
                $categoryJokes[] = $joke;
            }
        }

        return $categoryJokes;
    }

    /**
     * Busca piadas por texto
     */
    public function searchJokes($query)
    {
        $jokes = $this->jokesData['jokes'];
        $results = [];

        foreach ($jokes as $joke) {
            if (stripos($joke['joke'], $query) !== false || 
                stripos($joke['theme'], $query) !== false) {
                $results[] = $joke;
            }
        }

        return $results;
    }

    /**
     * Retorna todas as categorias disponíveis
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Retorna o total de piadas
     */
    public function getTotalJokes()
    {
        return $this->jokesData['total_jokes'];
    }

    /**
     * Retorna a descrição da coleção
     */
    public function getDescription()
    {
        return $this->jokesData['description'];
    }

    /**
     * Extrai categorias únicas dos temas das piadas
     */
    private function extractCategories()
    {
        $themes = array_column($this->jokesData['jokes'], 'theme');
        $categories = [];

        foreach ($themes as $theme) {
            // Separa temas compostos por "e", vírgula ou outros separadores
            $parts = preg_split('/\s+e\s+|,\s*|\s+e\s+/', $theme);
            
            foreach ($parts as $part) {
                $category = trim(strtolower($part));
                if (!empty($category) && !in_array($category, $categories)) {
                    $categories[] = $category;
                }
            }
        }

        sort($categories);
        return $categories;
    }

    /**
     * Retorna estatísticas das piadas
     */
    public function getStats()
    {
        return [
            'total_jokes' => $this->getTotalJokes(),
            'total_categories' => count($this->categories),
            'description' => $this->getDescription()
        ];
    }
}
