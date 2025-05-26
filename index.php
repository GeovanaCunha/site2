<?php
// Tradutor simples baseado em idioma passado por query ?lang=pt (padrão pt)
// Para facilitar, as traduções ficam no array $translations
$lang = 'pt';
if (isset($_GET['lang']) && in_array($_GET['lang'], ['pt', 'en', 'es'])) {
    $lang = $_GET['lang'];
}

// Traduções principais do site para 3 idiomas
$translations = [
    'pt' => [
        'title' => 'Hello Kitty - Página Principal',
        'accessibility' => 'Personalizar Acessibilidade',
        'normal' => 'Normal',
        'protanopia' => 'Protanopia',
        'deuteranopia' => 'Deuteranopia',
        'tritanopia' => 'Tritanopia',
        'dark_mode' => 'Modo Escuro',
        'font_increase' => 'Aumentar Fonte',
        'font_decrease' => 'Diminuir Fonte',
        'language' => 'Idioma',
        'hello_kitty_info_title' => 'Sobre Hello Kitty',
        'hello_kitty_info_text' => 'Hello Kitty (ハローキティ, Harō Kiti) é uma personagem da cultura pop japonesa criada pela empresa Sanrio em 1974. Ela é uma gatinha branca, com laço vermelho na orelha esquerda, conhecida mundialmente por sua imagem fofa e com vários produtos licenciados.',
        'memory_game_title' => 'Jogo da Memória',
        'characters_title' => 'Personagens',
    ],
    'en' => [
        'title' => 'Hello Kitty - Main Page',
        'accessibility' => 'Customize Accessibility',
        'normal' => 'Normal',
        'protanopia' => 'Protanopia',
        'deuteranopia' => 'Deuteranopia',
        'tritanopia' => 'Tritanopia',
        'dark_mode' => 'Dark Mode',
        'font_increase' => 'Increase Font',
        'font_decrease' => 'Decrease Font',
        'language' => 'Language',
        'hello_kitty_info_title' => 'About Hello Kitty',
        'hello_kitty_info_text' => 'Hello Kitty is a Japanese pop culture character created by Sanrio in 1974. She is a white kitten with a red bow on her left ear, known worldwide for her cute image and various licensed products.',
        'memory_game_title' => 'Memory Game',
        'characters_title' => 'Characters',
    ],
    'es' => [
        'title' => 'Hello Kitty - Página Principal',
        'accessibility' => 'Personalizar Accesibilidad',
        'normal' => 'Normal',
        'protanopia' => 'Protanopía',
        'deuteranopia' => 'Deuteranopía',
        'tritanopia' => 'Tritanopía',
        'dark_mode' => 'Modo Oscuro',
        'font_increase' => 'Aumentar Fuente',
        'font_decrease' => 'Disminuir Fuente',
        'language' => 'Idioma',
        'hello_kitty_info_title' => 'Sobre Hello Kitty',
        'hello_kitty_info_text' => 'Hello Kitty es un personaje de la cultura pop japonesa creado por Sanrio en 1974. Es una gatita blanca, con un lazo rojo en la oreja izquierda, conocida mundialmente por su imagen tierna y varios productos con licencia.',
        'memory_game_title' => 'Juego de Memoria',
        'characters_title' => 'Personajes',
    ],
];
$t = $translations[$lang];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo htmlspecialchars($t['title']); ?></title>
    <link rel="stylesheet" href="css/style.css" />
    <link id="theme-css" rel="stylesheet" href="css/light-mode.css" />
    <link id="daltonism-css" rel="stylesheet" href="css/normal.css" />
    <style>
        /* Estilo para layout da página principal */
        body {
            margin: 0; padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffe6f0; /* rosa claro */
            color: #4b004b;
            transition: background-color 0.5s, color 0.5s;
        }
        .container {
            display: flex;
            height: 100vh;
            width: 100vw;
            box-sizing: border-box;
            padding: 10px;
        }
        .sidebar {
            width: 25%;
            background: #ffd6e8;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-right: 2px solid #ffb3cc;
            position: relative;
        }
        .sidebar h2 {
            margin-top: 0;
            font-size: 1.6em;
            color: #a0006e;
        }
        .btn-accessibility {
            width: 100%;
            margin: 5px 0;
            padding: 10px 5px;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #e559a9;
            color: white;
            transition: background-color 0.3s;
        }
        .btn-accessibility:hover {
            background: #b6387d;
        }
        .colorblind-buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .colorblind-buttons button {
            flex: 1 1 48%;
            margin: 3px 1%;
        }
        .btn-circular-container {
            position: absolute;
            bottom: 20px;
            width: 90%;
            display: flex;
            justify-content: space-around;
        }
        .btn-circular {
            width: 60px; height: 60px;
            border-radius: 50%;
            border: 2px solid #a0006e;
            background-color: #fff0f6;
            cursor: pointer;
            overflow: hidden;
            box-shadow: 0 0 7px #d57899;
            transition: transform 0.3s;
        }
        .btn-circular img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
        .btn-circular:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px #d57899;
        }
        .content {
            width: 75%;
            padding: 20px;
            box-sizing: border-box;
            overflow-y: auto;
            background-color: white;
            border-radius: 10px;
            margin-left: 20px;
            box-shadow: 0 0 10px #ff99cc;
            display: flex;
            flex-direction: column;
        }
        .content h1 {
            font-weight: 700;
            color: #d50082;
        }
        .content p {
            font-size: 1.1rem;
            line-height: 1.5;
        }
        /* Aba do jogo da memória */
        .tabs {
            margin-top: 25px;
            display: flex;
            gap: 15px;
        }
        .tab {
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 20px;
            background: #f8c8e4;
            color: #a0006e;
            font-weight: 600;
            user-select: none;
            transition: background 0.3s;
        }
        .tab.active {
            background: #d50082;
            color: white;
        }
        .tab-content {
            margin-top: 15px;
            flex-grow: 1;
        }
        /* Jogo memória estilos */
        #memory-board {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            max-width: 600px;
            margin-top: 10px;
        }
        .card {
            background-color: #ffe9f5;
            border-radius: 10px;
            box-shadow: 0 0 8px #ff99cc;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
            perspective: 1000px;
        }
        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            border-radius: 10px;
        }
        .card.flipped .card-inner {
            transform: rotateY(180deg);
        }
        .card-front, .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 10px;
        }
        .card-front {
            background: #fce4ec;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }
        .card-back {
            background: #d50082;
            color: white;
            transform: rotateY(180deg);
            display: flex;
            align-items: center; justify-content: center;
            font-size: 2rem;
        }
        /* Footer dos botões dos personagens */
        .sidebar-footer {
            margin-top: 20px;
            flex-grow: 1;
        }
        /* Estilo para select idioma */
        select {
            margin-top: 5px;
            width: 100%;
            padding: 7px;
            border-radius: 8px;
            font-size: 1rem;
            border: 1px solid #a0006e;
            background: #fff0f6;
            color: #4b004b;
        }
        /* Para o toggle dark mode na body */
        body.dark-mode {
            background-color: #2e0038;
            color: #e2b3d9;
        }
        body.dark-mode .sidebar {
            background: #450052;
            border-right: 2px solid #a84da0;
        }
        body.dark-mode .btn-accessibility {
            background: #a84da0;
        }
        body.dark-mode .btn-accessibility:hover {
            background: #7a357b;
        }
        body.dark-mode .content {
            background-color: #3c003f;
            box-shadow: 0 0 12px #a84da0;
            color: #e2b3d9;
        }
        body.dark-mode .tab {
            background: #7a357b;
            color: #e2b3d9;
        }
        body.dark-mode .tab.active {
            background: #d57ad5;
            color: #2e0038;
        }
    </style>
</head>
<body>
    <div class="container">
        <aside class="sidebar" aria-label="Painel de Acessibilidade e Navegação personagens">
            <h2><?php echo $t['accessibility']; ?></h2>

            <div class="colorblind-buttons" role="group" aria-label="Opções de daltonismo">
                <button class="btn-accessibility" title="<?php echo $t['normal']; ?>" onclick="setDaltonism('normal')"><?php echo $t['normal']; ?></button>
                <button class="btn-accessibility" title="<?php echo $t['protanopia']; ?>" onclick="setDaltonism('protanopia')"><?php echo $t['protanopia']; ?></button>
                <button class="btn-accessibility" title="<?php echo $t['deuteranopia']; ?>" onclick="setDaltonism('deuteranopia')"><?php echo $t['deuteranopia']; ?></button>
                <button class="btn-accessibility" title="<?php echo $t['tritanopia']; ?>" onclick="setDaltonism('tritanopia')"><?php echo $t['tritanopia']; ?></button>
            </div>

            <button class="btn-accessibility" onclick="toggleDarkMode()"><?php echo $t['dark_mode']; ?></button>
            <button class="btn-accessibility" onclick="increaseFontSize()"><?php echo $t['font_increase']; ?></button>
            <button class="btn-accessibility" onclick="decreaseFontSize()"><?php echo $t['font_decrease']; ?></button>

            <label for="language-select" style="margin-top:15px;"><?php echo $t['language']; ?>:</label>
            <select id="language-select" onchange="changeLanguage(this.value)" aria-label="Selecionar idioma">
                <option value="pt" <?php if($lang==='pt') echo 'selected'; ?>>Português</option>
                <option value="en" <?php if($lang==='en') echo 'selected'; ?>>English</option>
                <option value="es" <?php if($lang==='es') echo 'selected'; ?>>Español</option>
            </select>

            <div class="btn-circular-container" aria-label="Navegação para as páginas dos personagens">
                <button class="btn-circular" onclick="window.location.href='personagem1.php?lang=<?php echo $lang; ?>'" aria-label="Personagem Charmmy Kitty">
                    <img src="https://vignette.wikia.nocookie.net/hellokitty/images/a/a1/Charmmy_Kitty_Portrait_1.png" alt="Charmmy Kitty" />
                </button>
                <button class="btn-circular" onclick="window.location.href='personagem2.php?lang=<?php echo $lang; ?>'" aria-label="Personagem My Melody">
                    <img src="https://vignette.wikia.nocookie.net/hellokitty/images/1/11/My_Melody_Headshot.png" alt="My Melody"/>
                </button>
                <button class="btn-circular" onclick="window.location.href='personagem3.php?lang=<?php echo $lang; ?>'" aria-label="Personagem Kuromi">
                    <img src="https://vignette.wikia.nocookie.net/hellokitty/images/f/f5/Kuromi_Headshot.png" alt="Kuromi"/>
                </button>
                <button class="btn-circular" onclick="window.location.href='personagem4.php?lang=<?php echo $lang; ?>'" aria-label="Personagem Badtz-Maru">
                    <img src="https://vignette.wikia.nocookie.net/hellokitty/images/d/d8/Badtz-Maru_Headshot.png" alt="Badtz-Maru"/>
                </button>
            </div>
        </aside>
        <main class="content" role="main" tabindex="-1">
            <h1><?php echo $t['hello_kitty_info_title']; ?></h1>
            <p><?php echo $t['hello_kitty_info_text']; ?></p>

            <nav class="tabs" role="tablist">
                <button class="tab active" role="tab" aria-selected="true" aria-controls="tab-memory" id="tab-memory-button" onclick="showTab('memory')"><?php echo $t['memory_game_title']; ?></button>
            </nav>
            <section id="tab-memory" class="tab-content" role="tabpanel" aria-labelledby="tab-memory-button">
                <div id="memory-board" aria-label="Tabuleiro do Jogo da Memória"></div>
                <button id="restart-game" style="margin-top:10px; padding:10px 20px; font-size:1rem; border:none; border-radius:8px; cursor:pointer; background:#d50082; color:#fff;" aria-label="Reiniciar Jogo"><?php echo $t['memory_game_title']; ?> - Reiniciar</button>
            </section>
        </main>
    </div>
    <script src="js/accessibility.js"></script>
    <script src="js/memory-game.js"></script>
</body>
</html>

