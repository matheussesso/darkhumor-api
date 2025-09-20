<?php helper('language'); ?>
<!DOCTYPE html>
<html lang="<?= $current_language == 'pt' ? 'pt-BR' : ($current_language == 'en' ? 'en-US' : 'es-ES') ?>">
<head>
    <title><?= lang('App.title') ?></title>
    
    <meta charset="utf-8"/>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="description" content="<?= lang('App.description') ?>"/>
    <meta name="author" content="Matheus Sesso"/>
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?= base_url() ?>"/>
    <meta property="og:title" content="<?= lang('App.title') ?>"/>
    <meta property="og:description" content="<?= lang('App.description') ?>"/>
    <meta property="og:image" content="<?= base_url('img/meta-image.png') ?>"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="og:image:alt" content="<?= lang('App.title') ?>"/>
    <meta property="og:site_name" content="Dark Humor API"/>
    <meta property="og:locale" content="<?= $current_language == 'pt' ? 'pt_BR' : ($current_language == 'en' ? 'en_US' : 'es_ES') ?>"/>
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:url" content="<?= base_url() ?>"/>
    <meta name="twitter:title" content="<?= lang('App.title') ?>"/>
    <meta name="twitter:description" content="<?= lang('App.description') ?>"/>
    <meta name="twitter:image" content="<?= base_url('img/meta-image.png') ?>"/>
    <meta name="twitter:image:alt" content="<?= lang('App.title') ?>"/>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <!-- Prism.js for Syntax Highlighting -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
    
    <link href="<?= base_url('css/styles.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('img/favicon.ico') ?>" rel="icon" type="image/x-icon"/>
    <link href="<?= base_url() ?>" rel="canonical"/>
</head>
<body>
    <!-- Modern Navbar -->
    <header class="shadow-sm py-4">
        <div class="container text-center">
            <div class="mb-4">
                <img src="<?= base_url('img/logo.png') ?>" alt="Dark Humor API Logo" class="img-fluid" style="max-width: 500px;">
            </div>
            <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap">
                <a class="text-decoration-none fw-medium text-dark" href="#api"><?= lang('App.nav_api') ?></a>
                <a class="text-decoration-none fw-medium text-dark" href="#sobre"><?= lang('App.nav_about') ?></a>
                <a class="text-decoration-none fw-medium text-dark" href="#docs"><?= lang('App.nav_docs') ?></a>
                <a class="text-decoration-none fw-medium text-dark" href="#examples"><?= lang('App.nav_examples') ?></a>
                <a class="btn btn-outline-danger btn-sm" href="https://github.com/matheussesso/darkhumor-api" target="_blank">
                    <i class="bi bi-github me-1"></i><?= lang('App.nav_github') ?>
                </a>
                
                <!-- Language Selector -->
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-globe me-1"></i>
                        <?php 
                            $langNames = ['pt' => 'PT', 'en' => 'EN', 'es' => 'ES'];
                            echo $langNames[$current_language];
                        ?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                        <li><a class="dropdown-item <?= $current_language == 'pt' ? 'active' : '' ?>" href="<?= base_url('language/pt') ?>">🇧🇷 Português</a></li>
                        <li><a class="dropdown-item <?= $current_language == 'en' ? 'active' : '' ?>" href="<?= base_url('language/en') ?>">🇺🇸 English</a></li>
                        <li><a class="dropdown-item <?= $current_language == 'es' ? 'active' : '' ?>" href="<?= base_url('language/es') ?>">🇪🇸 Español</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section with Gradient -->
    <section class="py-5 hero-section" id="api">
        <div class="container">
            <div class="row min-vh-50 align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <div class="badge bg-danger bg-opacity-10 text-danger mb-3 px-3 py-2">
                            <i class="bi bi-code-slash me-1"></i>
                            <?= lang('App.hero_badge') ?>
                        </div>
                        <h1 class="display-3 fw-bold text-dark mb-4">
                            <?= lang('App.hero_title') ?>
                            <span class="text-gradient"><?= lang('App.hero_title_api') ?></span>
                        </h1>
                        <p class="lead text-muted mb-4">
                            <?= lang('App.hero_description') ?>
                        </p>
                        <div class="d-flex flex-wrap gap-3 mb-4">
                            <button id="get_random_joke" class="btn btn-danger btn-lg px-4" onclick="getJoke()">
                                <i class="bi bi-shuffle me-2"></i><?= lang('App.hero_test_button') ?>
                            </button>
                            <a href="#docs" class="btn btn-outline-secondary btn-lg px-4">
                                <i class="bi bi-book me-2"></i><?= lang('App.hero_docs_button') ?>
                            </a>
                        </div>
                        <div class="d-flex align-items-center text-muted small">
                            <i class="bi bi-keyboard me-2"></i>
                            <?= lang('App.hero_keyboard_hint') ?> <kbd class="bg-light text-danger border ms-2 me-2 mt-1 rounded"><?= lang('App.hero_keyboard_key') ?></kbd> <?= lang('App.hero_keyboard_action') ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-demo">
                        <div class="code-window bg-dark rounded-3 p-4 shadow-lg">
                            <div class="d-flex align-items-center mb-3">
                                <div class="d-flex gap-1">
                                    <div class="bg-danger rounded-circle" style="width: 12px; height: 12px;"></div>
                                    <div class="bg-warning rounded-circle" style="width: 12px; height: 12px;"></div>
                                    <div class="bg-success rounded-circle" style="width: 12px; height: 12px;"></div>
                                </div>
                                <small class="text-light ms-3 opacity-75">Response JSON</small>
                            </div>
                            <pre class="text-light mb-0 small"><code>{
  "id": <span id="response_id" class="text-info">1</span>,
  "value": "<span id="response_text" class="text-warning"><?= lang('App.hero_loading') ?></span>",
  "theme": "<span id="response_theme" class="text-success">Tema</span>",
  "url": "<span id="response_url" class="text-primary"><?= base_url('jokes/1') ?></span>"
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light" id="sobre">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-5 fw-bold mb-3"><?= lang('App.features_title') ?></h2>
                    <p class="lead text-muted"><?= lang('App.features_subtitle') ?></p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-github text-danger fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3"><?= lang('App.feature_opensource_title') ?></h4>
                        <p class="text-muted"><?= lang('App.feature_opensource_desc') ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-check-circle-fill text-success fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3"><?= lang('App.feature_free_title') ?></h4>
                        <p class="text-muted"><?= lang('App.feature_free_desc') ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-code-square text-primary fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-3"><?= lang('App.feature_easy_title') ?></h4>
                        <p class="text-muted"><?= lang('App.feature_easy_desc') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">

        <!-- API Documentation -->
        <section id="docs" class="mb-5">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-5 fw-bold mb-3"><?= lang('App.docs_title') ?></h2>
                    <p class="lead text-muted"><?= lang('App.docs_subtitle') ?></p>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Random Joke -->
                <div class="col-lg-6">
                    <div class="api-card h-100 p-4 rounded-3 border-0 shadow-sm">
                        <div class="d-flex align-items-center mb-3">
                            <div class="method-badge bg-success text-white px-3 py-1 rounded-pill small fw-bold me-3">GET</div>
                            <h5 class="mb-0 fw-bold"><?= lang('App.endpoint_random_title') ?></h5>
                        </div>
                        <div class="endpoint-url bg-dark text-light p-3 rounded mb-3 font-monospace small">
                            <?= base_url('jokes/random') ?>
                        </div>
                        <p class="text-muted mb-3"><?= lang('App.endpoint_random_desc') ?></p>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-shuffle text-success me-2"></i>
                            <small class="text-muted"><?= lang('App.endpoint_random_note') ?></small>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="col-lg-6">
                    <div class="api-card h-100 p-4 rounded-3 border-0 shadow-sm">
                        <div class="d-flex align-items-center mb-3">
                            <div class="method-badge bg-success text-white px-3 py-1 rounded-pill small fw-bold me-3">GET</div>
                            <h5 class="mb-0 fw-bold"><?= lang('App.endpoint_categories_title') ?></h5>
                        </div>
                        <div class="endpoint-url bg-dark text-light p-3 rounded mb-3 font-monospace small">
                            <?= base_url('jokes/categories') ?>
                        </div>
                        <p class="text-muted mb-3"><?= lang('App.endpoint_categories_desc') ?></p>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-tags text-primary me-2"></i>
                            <small class="text-muted"><?= lang('App.endpoint_categories_note') ?></small>
                        </div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6">
                    <div class="api-card h-100 p-4 rounded-3 border-0 shadow-sm">
                        <div class="d-flex align-items-center mb-3">
                            <div class="method-badge bg-success text-white px-3 py-1 rounded-pill small fw-bold me-3">GET</div>
                            <h5 class="mb-0 fw-bold"><?= lang('App.endpoint_search_title') ?></h5>
                        </div>
                        <div class="endpoint-url bg-dark text-light p-3 rounded mb-3 font-monospace small">
                            <?= base_url('jokes/search?query=') ?><span class="text-warning">{termo}</span>
                        </div>
                        <p class="text-muted mb-3"><?= lang('App.endpoint_search_desc') ?></p>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-search text-warning me-2"></i>
                            <small class="text-muted"><?= lang('App.endpoint_search_note') ?></small>
                        </div>
                    </div>
                </div>

                <!-- By Category -->
                <div class="col-lg-6">
                    <div class="api-card h-100 p-4 rounded-3 border-0 shadow-sm">
                        <div class="d-flex align-items-center mb-3">
                            <div class="method-badge bg-success text-white px-3 py-1 rounded-pill small fw-bold me-3">GET</div>
                            <h5 class="mb-0 fw-bold"><?= lang('App.endpoint_category_title') ?></h5>
                        </div>
                        <div class="endpoint-url bg-dark text-light p-3 rounded mb-3 font-monospace small">
                            <?= base_url('jokes/random?category=') ?><span class="text-warning">{categoria}</span>
                        </div>
                        <p class="text-muted mb-3"><?= lang('App.endpoint_category_desc') ?></p>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-funnel text-info me-2"></i>
                            <small class="text-muted"><?= lang('App.endpoint_category_note') ?></small>
                        </div>
                    </div>
                </div>
                
                <!-- By ID (adicional) -->
                <div class="col-lg-6">
                    <div class="api-card h-100 p-4 rounded-3 border-0 shadow-sm">
                        <div class="d-flex align-items-center mb-3">
                            <div class="method-badge bg-success text-white px-3 py-1 rounded-pill small fw-bold me-3">GET</div>
                            <h5 class="mb-0 fw-bold"><?= lang('App.endpoint_id_title') ?></h5>
                        </div>
                        <div class="endpoint-url bg-dark text-light p-3 rounded mb-3 font-monospace small">
                            <?= base_url('jokes/') ?><span class="text-warning">{id}</span>
                        </div>
                        <p class="text-muted mb-3"><?= lang('App.endpoint_id_desc') ?></p>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-hash text-secondary me-2"></i>
                            <small class="text-muted"><?= lang('App.endpoint_id_note') ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Code Examples -->
        <section id="examples" class="mb-5">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-5 fw-bold mb-3"><?= lang('App.examples_title') ?></h2>
                    <p class="lead text-muted"><?= lang('App.examples_subtitle') ?></p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="code-examples-container">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills justify-content-center mb-4" id="codeExampleTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active d-flex align-items-center px-4 py-2" id="javascript-tab" data-bs-toggle="pill" data-bs-target="#javascript" type="button" role="tab">
                                    <i class="bi bi-filetype-js me-2 fs-5"></i>
                                    JavaScript
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center px-4 py-2" id="php-tab" data-bs-toggle="pill" data-bs-target="#php" type="button" role="tab">
                                    <i class="bi bi-filetype-php me-2 fs-5"></i>
                                    PHP
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center px-4 py-2" id="python-tab" data-bs-toggle="pill" data-bs-target="#python" type="button" role="tab">
                                    <i class="bi bi-filetype-py me-2 fs-5"></i>
                                    Python
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link d-flex align-items-center px-4 py-2" id="curl-tab" data-bs-toggle="pill" data-bs-target="#curl" type="button" role="tab">
                                    <i class="bi bi-terminal me-2 fs-5"></i>
                                    cURL
                                </button>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" id="codeExampleTabContent">
                            <div class="tab-pane fade show active" id="javascript" role="tabpanel">
                                <div class="code-block bg-dark rounded-3 p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-light opacity-75 small">JavaScript (Fetch API)</span>
                                        <button class="btn btn-outline-light btn-sm copy-btn" data-clipboard-target="#js-code">
                                            <i class="bi bi-clipboard me-1"></i><?= lang('App.copy_button') ?>
                                        </button>
                                    </div>
                                    <pre class="mb-0"><code id="js-code" class="language-javascript">// Buscar piada aleatória
fetch('<?= base_url('jokes/random') ?>')
  .then(response => response.json())
  .then(data => {
    console.log(data.value);
    console.log('Tema:', data.theme);
  })
  .catch(error => console.error('Erro:', error));

// Buscar por categoria
fetch('<?= base_url('jokes/random?category=obesidade') ?>')
  .then(response => response.json())
  .then(data => console.log(data.value));</code></pre>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="php" role="tabpanel">
                                <div class="code-block bg-dark rounded-3 p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-light opacity-75 small">PHP (file_get_contents)</span>
                                        <button class="btn btn-outline-light btn-sm copy-btn" data-clipboard-target="#php-code">
                                            <i class="bi bi-clipboard me-1"></i><?= lang('App.copy_button') ?>
                                        </button>
                                    </div>
                                    <pre class="mb-0"><code id="php-code" class="language-php">&lt;?php
// Buscar piada aleatória
$response = file_get_contents('<?= base_url('jokes/random') ?>');
$joke = json_decode($response, true);

echo $joke['value'] . "\n";
echo "Tema: " . $joke['theme'] . "\n";

// Usando cURL para mais controle
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '<?= base_url('jokes/random') ?>');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$joke = json_decode($response, true);
echo $joke['value'];
?&gt;</code></pre>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="python" role="tabpanel">
                                <div class="code-block bg-dark rounded-3 p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-light opacity-75 small">Python (requests)</span>
                                        <button class="btn btn-outline-light btn-sm copy-btn" data-clipboard-target="#python-code">
                                            <i class="bi bi-clipboard me-1"></i><?= lang('App.copy_button') ?>
                                        </button>
                                    </div>
                                    <pre class="mb-0"><code id="python-code" class="language-python">import requests
import json

# Buscar piada aleatória
response = requests.get('<?= base_url('jokes/random') ?>')
joke = response.json()

print(joke['value'])
print(f"Tema: {joke['theme']}")

# Buscar por categoria
params = {'category': 'obesidade'}
response = requests.get('<?= base_url('jokes/random') ?>', params=params)
joke = response.json()
print(joke['value'])

# Buscar piadas
search_params = {'query': 'gordo'}
response = requests.get('<?= base_url('jokes/search') ?>', params=search_params)
results = response.json()
print(f"Encontradas {results['total']} piadas")</code></pre>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="curl" role="tabpanel">
                                <div class="code-block bg-dark rounded-3 p-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-light opacity-75 small">cURL (Terminal)</span>
                                        <button class="btn btn-outline-light btn-sm copy-btn" data-clipboard-target="#curl-code">
                                            <i class="bi bi-clipboard me-1"></i><?= lang('App.copy_button') ?>
                                        </button>
                                    </div>
                                    <pre class="mb-0"><code id="curl-code" class="language-bash"># Piada aleatória
curl <?= base_url('jokes/random') ?>

# Piada por categoria
curl "<?= base_url('jokes/random?category=obesidade') ?>"

# Buscar piadas
curl "<?= base_url('jokes/search?query=gordo') ?>"

# Listar categorias
curl <?= base_url('jokes/categories') ?>

# Piada específica por ID
curl <?= base_url('jokes/') ?>{id}
# Exemplo:
curl <?= base_url('jokes/42') ?>

# Com formatação JSON (usando jq)
curl <?= base_url('jokes/random') ?> | jq '.'</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Statistics Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-5 fw-bold mb-3"><?= lang('App.stats_title') ?></h2>
                    <p class="lead text-muted"><?= lang('App.stats_subtitle') ?></p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-4">
                    <div class="stat-card text-center p-4">
                        <div class="stat-icon bg-danger bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-emoji-laughing-fill text-danger display-6"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-2">1000+</h3>
                        <p class="text-muted mb-0"><?= lang('App.stat_jokes') ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="stat-card text-center p-4">
                        <div class="stat-icon bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-tags-fill text-primary display-6"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-2">65+</h3>
                        <p class="text-muted mb-0"><?= lang('App.stat_categories') ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="stat-card text-center p-4">
                        <div class="stat-icon bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
                            <i class="bi bi-heart-fill text-success display-6"></i>
                        </div>
                        <h3 class="fw-bold text-dark mb-2">100%</h3>
                        <p class="text-muted mb-0"><?= lang('App.stat_free') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Footer -->
    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="mb-0 fw-bold">Dark Humor API</h5>
                    </div>
                    <p class="text-light opacity-75 mb-4">
                        <?= lang('App.footer_description') ?>
                    </p>
                    <div class="d-flex gap-3">
                        <a href="https://github.com/matheussesso/darkhumor-api" target="_blank" class="btn btn-outline-light btn-sm">
                            <i class="bi bi-github me-1"></i><?= lang('App.nav_github') ?>
                        </a>
                        <a href="#docs" class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-book me-1"></i><?= lang('App.footer_docs') ?>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3"><?= lang('App.footer_legal_title') ?></h6>
                    <p class="small text-light opacity-75 mb-3">
                        <?= lang('App.footer_legal_text1') ?>
                    </p>
                    <p class="small text-light opacity-75">
                        <?= lang('App.footer_legal_text2') ?>
                    </p>
                </div>
                
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3"><?= lang('App.footer_opensource_title') ?></h6>
                    <ul class="list-unstyled small text-light opacity-75">
                        <li class="mb-2">
                            <i class="bi bi-github me-2 text-success"></i>
                            <?= lang('App.footer_opensource_github') ?>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-infinity me-2 text-primary"></i>
                            <?= lang('App.footer_opensource_free') ?>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-key me-2 text-warning"></i>
                            <?= lang('App.footer_opensource_nokey') ?>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-people me-2 text-info"></i>
                            <?= lang('App.footer_opensource_contrib') ?>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-shield-check me-2 text-success"></i>
                            <?= lang('App.footer_opensource_privacy') ?>
                        </li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4 opacity-25">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="small mb-0 text-light opacity-75">
                        <?= lang('App.footer_copyright') ?>
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="small mb-0 text-light opacity-75">
                        <?= lang('App.footer_made_in') ?> <i class="bi bi-heart-fill text-danger"></i> <?= lang('App.footer_brazil') ?> • <?= lang('App.footer_inspired') ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Prism.js for Syntax Highlighting -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
    
    <!-- Simple JavaScript -->
    <script>
        // Traduções para JavaScript
        const translations = {
            loading: '<?= lang('App.js_loading') ?>',
            newJoke: '<?= lang('App.js_new_joke') ?>',
            error: '<?= lang('App.js_error') ?>',
            copied: '<?= lang('App.copied_button') ?>',
            copy: '<?= lang('App.copy_button') ?>'
        };

        // Função para buscar piada aleatória
        function getJoke() {
            const button = document.getElementById('get_random_joke');
            button.innerHTML = '<i class="bi bi-arrow-repeat me-2"></i>' + translations.loading;
            button.disabled = true;
            
            fetch('<?= base_url('jokes/random') ?>')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('response_id').textContent = data.id;
                    document.getElementById('response_url').textContent = data.url;
                    document.getElementById('response_text').textContent = data.value;
                    document.getElementById('response_theme').textContent = data.theme;
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert(translations.error);
                })
                .finally(() => {
                    button.innerHTML = '<i class="bi bi-shuffle me-2"></i>' + translations.newJoke;
                    button.disabled = false;
                });
        }

        // Atalho de teclado (R para nova piada)
        document.addEventListener('keydown', function(e) {
            if (e.key === 'r' || e.key === 'R') {
                e.preventDefault();
                getJoke();
            }
        });

        // Carrega piada inicial
        document.addEventListener('DOMContentLoaded', function() {
            getJoke();
            
            // Inicializa Prism.js
            if (typeof Prism !== 'undefined') {
                Prism.highlightAll();
            }
            
            // Funcionalidade de copiar código
            document.querySelectorAll('.copy-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-clipboard-target');
                    const codeElement = document.querySelector(targetId);
                    
                    if (codeElement) {
                        const text = codeElement.textContent;
                        navigator.clipboard.writeText(text).then(() => {
                            const originalText = this.innerHTML;
                            this.innerHTML = '<i class="bi bi-check me-1"></i>' + translations.copied;
                            this.classList.remove('btn-outline-light');
                            this.classList.add('btn-success');
                            
                            setTimeout(() => {
                                this.innerHTML = originalText;
                                this.classList.remove('btn-success');
                                this.classList.add('btn-outline-light');
                            }, 2000);
                        }).catch(err => {
                            console.error('Erro ao copiar:', err);
                        });
                    }
                });
            });
        });
    </script>

</body>
</html>
