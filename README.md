# 💀 Dark Humor API

[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue.svg)](https://www.php.net/)
[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.x-red.svg)](https://codeigniter.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![API Status](https://img.shields.io/badge/API-Active-green.svg)](https://github.com/matheussesso/darkhumor-api)

> Uma API REST gratuita e open source criada na zueira com piadas de baixissímo nível de humor negro em formato JSON, inspirada na [chucknorris.io](https://api.chucknorris.io/)

## Índice

- [Sobre o Projeto](#-sobre-o-projeto)
- [Características](#-características)
- [Demonstração](#-demonstração)
- [Instalação](#-instalação)
- [Uso da API](#-uso-da-api)
- [Endpoints](#-endpoints)
- [Exemplos de Código](#-exemplos-de-código)
- [Configuração](#-configuração)
- [Contribuição](#-contribuição)
- [Licença](#-licença)
- [Suporte](#-suporte)

## Sobre o Projeto

A **Dark Humor API** é uma API REST completa que fornece acesso a uma coleção cuidadosamente curada de piadas de humor negro em português brasileiro. Desenvolvida com CodeIgniter 4, oferece uma interface moderna e endpoints bem documentados para desenvolvedores.

### Características

- 🎲 **1000+ piadas** cuidadosamente selecionadas
- 🏷️ **65+ categorias** diferentes organizadas
- 🔍 **Busca por texto** livre e inteligente
- 🌐 **Suporte multilíngue** (PT, EN, ES)
- 📱 **Interface web** moderna e responsiva
- 🚀 **API REST** padronizada e documentada
- 🔒 **Código aberto** e gratuito
- ⚡ **Alta performance** com cache otimizado

## Demonstração

### Interface Web
Acesse a interface web interativa em: `https://darkhumor-api.ddns.net/`

### API Rápida
```bash
curl -X GET "https://darkhumor-api.ddns.net/jokes/random"
```

## Instalação

### Pré-requisitos

- **PHP 8.1+** com extensões:
  - `json` (habilitado por padrão)
  - `intl`
  - `mbstring`
  - `curl`
- **Composer** para gerenciamento de dependências
- **Servidor Web** (Apache/Nginx)

### Instalação Rápida

1. **Clone o repositório**
   ```bash
   git clone https://github.com/matheussesso/darkhumor-api.git
   cd darkhumor-api
   ```

2. **Instale as dependências**
   ```bash
   composer install
   ```

3. **Configure o ambiente**
   ```bash
   cp env .env
   # Edite o arquivo .env com suas configurações
   ```

4. **Configure permissões**
   ```bash
   chmod -R 755 public/
   chmod -R 777 writable/
   ```

5. **Configure o servidor web** para apontar para a pasta `public/`

6. **Teste a instalação**
   ```bash
   curl -X GET "http://localhost/jokes/random"
   ```

### Instalação com Docker (Recomendado)

```bash
# Clone o repositório
git clone https://github.com/matheussesso/darkhumor-api.git
cd darkhumor-api

# Execute com Docker Compose
docker-compose up -d

# Acesse em http://localhost:8080
```

## Uso da API

### Base URL
```
https://seu-dominio.com/
```

### Formato de Resposta
Todas as respostas são retornadas em formato JSON com estrutura padronizada:

```json
{
  "id": 1,
  "url": "https://seu-dominio.com/jokes/1",
  "value": "Texto da piada aqui...",
  "theme": "Categoria da piada"
}
```

### Headers Recomendados
```http
Accept: application/json
Content-Type: application/json
```

## 🔗 Endpoints

### 🎲 Piada Aleatória
```http
GET /jokes/random
```

**Resposta:**
```json
{
  "id": 42,
  "url": "https://seu-dominio.com/jokes/42",
  "value": "Por que o esqueleto não foi à festa? Porque não tinha corpo para isso!",
  "theme": "Morte"
}
```

### Piada por Categoria
```http
GET /jokes/random?category={categoria}
```

**Parâmetros:**
- `category` (string): Nome da categoria desejada

**Exemplo:**
```bash
curl -X GET "https://seu-dominio.com/jokes/random?category=morte"
```

### Lista de Categorias
```http
GET /jokes/categories
```

**Resposta:**
```json
[
  "aborto",
  "abuso", 
  "acidente",
  "aids",
  "amizade",
  "animais",
  "..."
]
```

### Busca por Texto
```http
GET /jokes/search?query={busca}
```

**Parâmetros:**
- `query` (string, obrigatório): Termo de busca

**Resposta:**
```json
{
  "total": 15,
  "result": [
    {
      "id": 1,
      "url": "https://seu-dominio.com/jokes/1", 
      "value": "Piada encontrada...",
      "theme": "Categoria"
    }
  ]
}
```

### Piada Específica
```http
GET /jokes/{id}
```

**Parâmetros:**
- `id` (integer): ID da piada desejada

**Exemplo:**
```bash
curl -X GET "https://seu-dominio.com/jokes/42"
```

## Exemplos de Código

### JavaScript (Fetch API)
```javascript
// Piada aleatória
async function getRandomJoke() {
  try {
    const response = await fetch('https://seu-dominio.com/jokes/random');
    const joke = await response.json();
    console.log(joke.value);
  } catch (error) {
    console.error('Erro:', error);
  }
}

// Buscar piadas
async function searchJokes(query) {
  try {
    const response = await fetch(`https://seu-dominio.com/jokes/search?query=${encodeURIComponent(query)}`);
    const data = await response.json();
    console.log(`Encontradas ${data.total} piadas`);
    data.result.forEach(joke => console.log(joke.value));
  } catch (error) {
    console.error('Erro:', error);
  }
}
```

### PHP (cURL)

```php
<?php
class DarkHumorAPI {
    private $baseUrl = 'https://seu-dominio.com';
    
    public function getRandomJoke($category = null) {
        $url = $this->baseUrl . '/jokes/random';
        if ($category) {
            $url .= '?category=' . urlencode($category);
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200) {
            return json_decode($response, true);
        }
        
        return null;
    }
    
    public function searchJokes($query) {
        $url = $this->baseUrl . '/jokes/search?query=' . urlencode($query);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($response, true);
    }
}

// Uso
$api = new DarkHumorAPI();
$joke = $api->getRandomJoke();
echo $joke['value'];
?>
```

### Python (requests)

```python
import requests
import json

class DarkHumorAPI:
    def __init__(self, base_url='https://seu-dominio.com'):
        self.base_url = base_url
        self.session = requests.Session()
        self.session.headers.update({'Accept': 'application/json'})
    
    def get_random_joke(self, category=None):
        """Obtém uma piada aleatória"""
        url = f"{self.base_url}/jokes/random"
        params = {'category': category} if category else {}
        
        try:
            response = self.session.get(url, params=params)
            response.raise_for_status()
            return response.json()
        except requests.RequestException as e:
            print(f"Erro: {e}")
            return None
    
    def search_jokes(self, query):
        """Busca piadas por texto"""
        url = f"{self.base_url}/jokes/search"
        params = {'query': query}
        
        try:
            response = self.session.get(url, params=params)
            response.raise_for_status()
            return response.json()
        except requests.RequestException as e:
            print(f"Erro: {e}")
            return None
    
    def get_categories(self):
        """Obtém todas as categorias"""
        url = f"{self.base_url}/jokes/categories"
        
        try:
            response = self.session.get(url)
            response.raise_for_status()
            return response.json()
        except requests.RequestException as e:
            print(f"Erro: {e}")
            return None

# Uso
api = DarkHumorAPI()
joke = api.get_random_joke()
if joke:
    print(joke['value'])
```

### Node.js (axios)

```javascript
const axios = require('axios');

class DarkHumorAPI {
  constructor(baseUrl = 'https://seu-dominio.com') {
    this.client = axios.create({
      baseURL: baseUrl,
      headers: {
        'Accept': 'application/json'
      }
    });
  }
  
  async getRandomJoke(category = null) {
    try {
      const params = category ? { category } : {};
      const response = await this.client.get('/jokes/random', { params });
      return response.data;
    } catch (error) {
      console.error('Erro:', error.message);
      return null;
    }
  }
  
  async searchJokes(query) {
    try {
      const response = await this.client.get('/jokes/search', {
        params: { query }
      });
      return response.data;
    } catch (error) {
      console.error('Erro:', error.message);
      return null;
    }
  }
}

// Uso
const api = new DarkHumorAPI();
api.getRandomJoke().then(joke => {
  if (joke) console.log(joke.value);
});
```

## Configuração

### Variáveis de Ambiente

Crie um arquivo `.env` baseado no `env` e configure:

```bash
# Configurações básicas
app.baseURL = 'https://seu-dominio.com/'
app.forceGlobalSecureRequests = true

# Configurações de desenvolvimento
CI_ENVIRONMENT = production

# Configurações de cache
cache.handler = 'file'
cache.storePath = 'writable/cache/'

# Configurações de log
logger.threshold = 4
```

### Configuração do Servidor Web

#### Apache (.htaccess)

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]

# Headers de segurança
Header always set X-Content-Type-Options nosniff
Header always set X-Frame-Options DENY
Header always set X-XSS-Protection "1; mode=block"
```

#### Nginx

```nginx
server {
    listen 80;
    server_name seu-dominio.com;
    root /path/to/darkhumor-api/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Headers de segurança
    add_header X-Content-Type-Options nosniff;
    add_header X-Frame-Options DENY;
    add_header X-XSS-Protection "1; mode=block";
}
```

### Estrutura do Projeto

```
darkhumor-api/
├── 📁 app/
│   ├── 📁 Controllers/
│   │   ├── BaseController.php
│   │   └── JokesController.php
│   ├── 📁 Models/
│   │   └── JokesModel.php
│   ├── 📁 Views/
│   │   └── home.php
│   ├── 📁 Libraries/
│   │   └── jokes.json
│   ├── 📁 Language/
│   │   ├── 📁 pt/
│   │   ├── 📁 en/
│   │   └── 📁 es/
│   └── 📁 Config/
├── 📁 public/
│   ├── 📁 css/
│   ├── 📁 js/
│   ├── 📁 img/
│   └── index.php
├── 📁 writable/
├── 📁 tests/
├── composer.json
├── README.md
└── README_API.md
```

## Testes

### Executar Testes
```bash
# Todos os testes
composer test

# Testes específicos
./vendor/bin/phpunit tests/unit/HealthTest.php

# Testes com cobertura
./vendor/bin/phpunit --coverage-html coverage/
```

### Testes da API
```bash
# Teste básico
curl -X GET "http://localhost/jokes/random"

# Teste com categoria
curl -X GET "http://localhost/jokes/random?category=morte"

# Teste de busca
curl -X GET "http://localhost/jokes/search?query=gordo"

# Teste de categorias
curl -X GET "http://localhost/jokes/categories"
```

### Métricas da API
- **1000+** piadas catalogadas
- **68+** categorias diferentes

## Licença

Este projeto está licenciado sob a **Licença MIT** - veja o arquivo [LICENSE](LICENSE) para detalhes.

```
MIT License

Copyright (c) 2025 Dark Humor API

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
```

## Tecnologias Utilizadas

- **PHP 8.1+** - Linguagem principal
- **CodeIgniter 4** - Framework web
- **JSON** - Formato de dados
- **Composer** - Gerenciador de dependências
- **PHPUnit** - Framework de testes

---

<div align="center">

**Desenvolvido com ❤️ para a comunidade de desenvolvedores brasileiros**

*Inspirado na [chucknorris.io](https://api.chucknorris.io/) - Adaptado para humor negro brasileiro*

[![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/matheussesso/darkhumor-api)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)](https://codeigniter.com/)

</div>
