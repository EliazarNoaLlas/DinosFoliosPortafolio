<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Ingeniería Informática y de Sistemas | UNSAAC</title>
    <style>
        :root {
            --primary-color: #002d52;
            --secondary-color: #0056b3;
            --accent-color: #00a0dc;
            --text-light: #ffffff;
            --text-dark: #333333;
            --transition-speed: 0.3s;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            color: var(--text-dark);
            font-family: 'Segoe UI', 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-attachment: fixed;
            transition: background-image 1s ease-in-out;
        }

        header {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar img {
            width: 150px;
            height: auto;
            transition: transform var(--transition-speed);
        }

        .navbar img:hover {
            transform: scale(1.05);
        }

        .pcl-header-cta-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .pcl-header-cta-button {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: all var(--transition-speed);
            border: 2px solid transparent;
        }

        .pcl-header-cta-button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        #carreras-hero {
            margin-top: 80px;
            background: linear-gradient(135deg, rgba(0, 45, 82, 0.95), rgba(0, 86, 179, 0.9));
            padding: 4rem 2rem;
            color: var(--text-light);
            text-align: center;
        }

        .hero-title {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-career-title {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: var(--accent-color);
            animation: fadeInUp 1s ease-out 0.2s;
        }

        .hero-descripcion {
            font-size: 1.2rem;
            font-style: italic;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s ease-out 0.4s;
        }

        .bottom-bar {
            background-color: var(--primary-color);
            padding: 1.5rem;
            text-align: center;
            margin-top: auto;
        }

        .bottom-bar p {
            color: var(--text-light);
            margin: 0.5rem 0;
            font-size: 0.9rem;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .pcl-header-cta-buttons {
                display: none;
            }

            .navbar {
                flex-direction: column;
                padding: 0.5rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-career-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <header role="banner">
        <nav class="navbar">
            <div class="logo">
                <img src="img/universidad.jpg" alt="UNSAAC Logo" width="150" height="150">
            </div>
            <div class="pcl-header-cta-buttons">
                <a class="pcl-header-cta-button" href="#" onclick="redirectToLogin()">Iniciar Sesión</a>
                <a class="pcl-header-cta-button" href="http://in.unsaac.edu.pe/home/">Página Principal</a>
                <a class="pcl-header-cta-button" href="#">Nosotros</a>
                <a class="pcl-header-cta-button" href="#">Contacto</a>
                <a class="pcl-header-cta-button" href="#">Docentes</a>
            </div>
        </nav>
    </header>

    <main id="carreras-hero">
        <div class="hero-content">
            <h2 class="hero-title">Bienvenido al sistema de registros</h2>
            <h1 class="hero-career-title">ESCUELA PROFESIONAL DE INGENIERÍA INFORMÁTICA Y DE SISTEMAS</h1>
            <p class="hero-descripcion">"El ordenador nació para resolver problemas que antes no existían" - Bill Gates</p>
        </div>
    </main>

    <footer class="bottom-bar">
        <p>Universidad Nacional San Antonio Abad del Cusco</p>
        <p>Av. de la Cultura 733 - Cusco, Cusco, Cusco, Perú</p>
    </footer>

    <script>
        function redirectToLogin() {
            const dominioActual = window.location.origin;
            const urlDestino = dominioActual + '/admin/login';
            window.location.href = urlDestino;
        }
        
        const images = [
            'img/escuela1.jpg',
            'img/escuela2.jpg',
            'img/escuela3.jpg'
        ];

        let currentImage = 0;

        function changeBackgroundImage() {
            document.body.style.backgroundImage = `url(${images[currentImage]})`;
            currentImage = (currentImage + 1) % images.length;
        }

        // Initial background image
        changeBackgroundImage();
        setInterval(changeBackgroundImage, 5000);
    </script>
</body>
</html>