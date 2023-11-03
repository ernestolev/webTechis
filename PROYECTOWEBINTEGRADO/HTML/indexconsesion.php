
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tortas Techi´s</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/litera/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/diseñoPrin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ysabeau+Infant:wght@500&display=swap" rel="stylesheet">

</head>

<body>
<?php include '../Conexion/conexion.php';
?>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="OPCMOV">
                <a class="dpdow nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">☰</a>
                <div class="dropdown-menu dropdown-menu-left">
                    <a class="dropdown-item" href="/HTML/FORMS-LOGIN-REGISTRO/login.html">Iniciar Sesion</a>
                    <a class="dropdown-item" href="/HTML/FORMS-LOGIN-REGISTRO/registro.html">Registrarme</a>
                    <p>_ _ _ _ _ _ _ _ _ _ _ _ _ _ _</p>
                    <a class="dropdown-item" href="/HTML/CARTA/tortas.html">Carta</a>
                    <a class="dropdown-item" href="/HTML/locales.html">Locales</a>
                    <a class="dropdown-item" href="/HTML/contacto.html">Contacto</a>
                </div>
            </div>
            <a class="titnavv" href="index.html">
                <h1 class="titnav">Tortas Techi´s</h1>
            </a>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="itemsnav navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="CARTA/tortas.php">Carta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="HTML/locales.html">Locales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="HTML/contacto.html">Contacto</a>
                    </li>
                </ul>
            </div>
            <div class="OPCPC">
                <a class="dpdow nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="../imagenes/user.png" alt="user" class="userlogo">
                    <?php
                    session_start();

                    if (isset($_SESSION['nombre_usuario'])) {
                        echo $_SESSION['nombre_usuario'];

                    }
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a>
                    <?php
                    if (isset($_SESSION['rol'])) {
                        // Verifica si el rol es "admin" y muestra el enlace
                        if ($_SESSION['rol'] === "admin") {
                            echo '<a class="dropdown-item" href="MVC/dashboard.php">Acceso Admin</a>';
                        }
                    } else {
                        echo 'Rol no encontrado en la sesión.';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="gallery-container">
        <div class="gallery" id="image-gallery">
            <img src="../imagenes/bannerPrin.jpg.png" alt="bannerpromo" class="imgbanner">
            <img src="../imagenes/banner1.jpg.png" alt="bannerpromo" class="imgbanner">
            <img src="../imagenes/banner2.jpg.png" alt="bannerpromo" class="imgbanner">
        </div>
    </div>


    <script>
        const imageUrls = [
            'imagenes/bannerPrin.jpg',
            'imagenes/banner1.jpg',
            'imagenes/banner2.jpg',
        ];

        let currentIndex = 0;

        function loadGallery() {
            const gallery = document.getElementById('image-gallery');
            imageUrls.forEach(url => {
                const galleryItem = document.createElement('div');
                galleryItem.classList.add('gallery-item');
                const image = document.createElement('img');
                image.src = url;
                galleryItem.appendChild(image);
                gallery.appendChild(galleryItem);
            });
            showImage(currentIndex);
            startAutoSlide();
        }

        function showImage(index) {
            const gallery = document.querySelector('.gallery');
            const imageWidth = gallery.clientWidth;
            const newPosition = -index * imageWidth;
            gallery.style.transform = `translateX(${newPosition}px)`;
        }

        function handleNavigationClick(event) {
            if (event.target.classList.contains('prev-button')) {
                prevImage();
            } else if (event.target.classList.contains('next-button')) {
                nextImage();
            }
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + imageUrls.length) % imageUrls.length;
            showImage(currentIndex);
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % imageUrls.length;
            showImage(currentIndex);
        }

        function startAutoSlide() {
            setInterval(() => {
                nextImage();
            }, 3000);
        }

        document.addEventListener('DOMContentLoaded', loadGallery);
        document.querySelector('.gallery-container').addEventListener('click', handleNavigationClick);
    </script>
</body>
<footer>
    <div class="divfooter">
        <img src="../imagenes/logo.png" alt="milogo" class="imglogoprin">
        <a class="itemsfooter" href="nosotros.html">Nosotros</a>
        <a class="itemsfooter" href="https://goo.gl/maps/pviJPGxG7m7KWNzN8">Ubicación</a>
        <a class="itemsfooter" href="terminos.html">Términos y condiciones</a>
        <a class="itemsfooter" href="libroreclamaciones.php">Libro de reclamaciones</a>
        <a class="redesfooter" href="google.com"> <img src="../imagenes/red1.png" alt="imgred" class="imgred1"></a>
        <a class="redesfooter" href="https://www.facebook.com/profile.php?id=100064073740564"><img
                src="../imagenes/red2.png" alt="imgred" class="imgred2"></a>
        <a class="redesfooter" href="https://wa.link/cn4v1n"><img src="../imagenes/red3.png" alt="imgred"
                class="imgred3"></a>

    </div>
</footer>

</html>