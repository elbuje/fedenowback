<?php
/**
 * Front Controller & Routing - Fede Nowback
 * Domain: https://fedenowback.com.ar
 */
require_once __DIR__ . "/../includes/config.php";

// Parse URI
$request_uri = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH);
$path = trim($request_uri, "/");

// Router table (Friendly URLs)
$routes = [
    ""                  => __DIR__ . "/../views/index.php",
    "mentorias"         => __DIR__ . "/../views/mentorias.php",
    "mentoria"          => __DIR__ . "/../views/mentorias.php",
    "encende-tu-fuego"  => __DIR__ . "/../views/encende-tu-fuego.php",
    "evento"            => __DIR__ . "/../views/encende-tu-fuego.php",
    "comunidad"         => __DIR__ . "/../views/comunidad.php",
    "campus"            => __DIR__ . "/../views/comunidad.php",
    "skool"             => __DIR__ . "/../views/comunidad.php",
    "sobre-mi"          => __DIR__ . "/../views/sobre-mi.php",
    "bio"               => __DIR__ . "/../views/sobre-mi.php",
    "contacto"          => __DIR__ . "/../views/contacto.php",
];

// Static file serving fallback
if (file_exists(__DIR__ . "/" . $path) && is_file(__DIR__ . "/" . $path) && !preg_match("/\.php$/i", $path)) {
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $mimes = [
        "jpg"  => "image/jpeg",
        "jpeg" => "image/jpeg",
        "png"  => "image/png",
        "webp" => "image/webp",
        "css"  => "text/css",
        "js"   => "application/javascript",
        "xml"  => "application/xml",
        "txt"  => "text/plain",
        "svg"  => "image/svg+xml",
    ];
    $contentType = $mimes[strtolower($ext)] ?? mime_content_type(__DIR__ . "/" . $path);
    header("Content-Type: " . $contentType);
    header("Content-Length: " . filesize(__DIR__ . "/" . $path));
    readfile(__DIR__ . "/" . $path);
    exit;
}

// Sitemap XML dinámico con todas las landings
if ($path === "sitemap.xml") {
    header("Content-Type: application/xml; charset=utf-8");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
    ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc><?= SITE_URL ?>/</loc>
    <lastmod><?= date("Y-m-d") ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc><?= SITE_URL ?>/mentorias</loc>
    <lastmod><?= date("Y-m-d") ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.95</priority>
  </url>
  <url>
    <loc><?= SITE_URL ?>/encende-tu-fuego</loc>
    <lastmod><?= date("Y-m-d") ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.95</priority>
  </url>
  <url>
    <loc><?= SITE_URL ?>/comunidad</loc>
    <lastmod><?= date("Y-m-d") ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.90</priority>
  </url>
  <url>
    <loc><?= SITE_URL ?>/sobre-mi</loc>
    <lastmod><?= date("Y-m-d") ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.80</priority>
  </url>
  <url>
    <loc><?= SITE_URL ?>/contacto</loc>
    <lastmod><?= date("Y-m-d") ?></lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.80</priority>
  </url>
</urlset>
    <?php
    exit;
}

// Dispatch route
if (isset($routes[$path])) {
    require $routes[$path];
    exit;
}

// Clean fallback for .php extensions
$clean_path = preg_replace("/\.php$/", "", $path);
if (isset($routes[$clean_path])) {
    header("Location: /" . $clean_path, true, 301);
    exit;
}

// 404 Not Found
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página No Encontrada - Fede Nowback</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body style="background: #09090b; color: #fff; font-family: sans-serif;">
<section style="padding: 100px 20px; text-align: center; min-height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div style="font-size: 5rem; font-weight: 900; color: #f97316;">404</div>
    <h1 style="margin: 16px 0 24px; font-size: 2rem;">Página no encontrada</h1>
    <p style="color: #a1a1aa; max-width: 500px; margin: 0 auto 32px;">
        La sección que buscás no existe o fue actualizada a una nueva dirección.
    </p>
    <a href="/" style="display:inline-block;padding:14px 32px;background:#f97316;color:#fff;border-radius:8px;text-decoration:none;font-weight:700;">Volver al Inicio</a>
</section>
</body>
</html>
