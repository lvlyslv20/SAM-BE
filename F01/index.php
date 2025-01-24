<?php

require_once 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Olympics Host Cities</title>
    <link rel="icon" href="assets/icon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/icon.png" alt="Olympics Logo"> HostHorizon
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#popular">Popular</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#city">City</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">News</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="landing" id="home">
        <div class="text-section-wrapper">
            <div class="text-section">
                <h1 class="title pt-5">Host Cities of the Olympics</h1>
            </div>
        </div>
        <div id="carouselExample" class="carousel slide image-slider" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img2.avif" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="assets/immg3.jpeg" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="assets/sikkim.jpg" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <section id="popular" class="section">
        <div class="container">
            <h2 class="mt-3">Popular</h2>
            <p>Best Olympic Games Host Cities For Visitors</p>
        </div>
        <div class="wrapper">
            <div class="container2">
                <?php

                $contentSql = "SELECT id, country, description, image_path FROM popular_tbl";
                $contentResult = $conn->query($contentSql);

                if ($contentResult->num_rows > 0) {

                    while ($content = $contentResult->fetch_assoc()) {
                        $id = $content['id'];
                        $imagePath = $content['image_path'];
                        $country_name = $content['country'];
                        $description = $content['description'];

                        $imagePath = basename($imagePath);

                        $imageDir = 'assets/images/';
                        $imageFullPath = $imageDir . $imagePath;

                        if (file_exists($imageFullPath) && is_file($imageFullPath)) {
                            $imageToShow = $imageFullPath;
                        } else {
                            $imageToShow = $imageDir . 'default.jpg';
                            $country_name = 'No name available for this image.';
                            $description = 'No description available for this image.';
                        }
                ?>
                        <input type="radio" name="slide" id="<?php echo $id; ?>" checked>
                        <label for="<?php echo $id; ?>" class="card" style="background-color: rgb(0, 0, 0);">
                            <div class="row">
                                <div class="icon"><?php echo $id; ?></div>
                                <div class="description  text-center">
                                    <h4><?php echo htmlspecialchars($country_name); ?></h4>
                                    <p><?php echo htmlspecialchars($description); ?></p>
                                </div>
                            </div>
                            <img src="<?php echo htmlspecialchars($imageToShow); ?>" alt="Card 1" class="img-fluid card-img">
                        </label>
                <?php
                    }
                } else {
                    echo "<p>No image found.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="color1 w-100 p-2 "></div>
                <div class="color2 w-100 p-2"></div>
                <div class="color3 w-100 p-2"></div>
                <div class="color4 w-100 p-2"></div>
                <div class="color5 w-100 p-2"></div>
            </div>
        </div>
    </div>

    <section id="city" class="section bg-light px-5">
        <div class="container">
            <h2 class="mt-4">List of Olympic Host Cities</h2>
            <h4>Summer Olympics</h4>
        </div>
        <div class="city-wrapper">
            <?php

            $contentCities = "SELECT cityName, description, image FROM cities_tbl WHERE season='summer'";
            $contentResult = $conn->query($contentCities);

            if ($contentResult->num_rows > 0) {

                while ($content = $contentResult->fetch_assoc()) {
                    $imagePath = $content['image'];
                    $cityName = $content['cityName'];
                    $description = $content['description'];

                    $imagePath = basename($imagePath);

                    $imageDir = 'assets/images/';
                    $imageFullPath = $imageDir . $imagePath;

                    if (file_exists($imageFullPath) && is_file($imageFullPath)) {
                        $imageToShow = $imageFullPath;
                    } else {
                        $imageToShow = $imageDir . 'default.jpg';
                        $cityName = 'No name available for this image.';
                        $description = 'No description available for this image.';
                    }
            ?>
                    <div class="city-card">
                        <img src="<?php echo htmlspecialchars($imageToShow); ?>" alt="<?php echo htmlspecialchars($cityName); ?>" class="city-img">
                        <div class="city-info">
                            <h4><?php echo htmlspecialchars($cityName); ?></h4>
                            <p><?php echo htmlspecialchars($description); ?></p>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No image found.</p>";
            }
            ?>
        </div>

        <div class="container mt-5">
            <h4>Winter Olympics</h4>
        </div>
        <div class="city-wrapper">
            <?php

            $contentCities = "SELECT cityName, description, image FROM cities_tbl WHERE season='winter'";
            $contentResult = $conn->query($contentCities);

            if ($contentResult->num_rows > 0) {

                while ($content = $contentResult->fetch_assoc()) {
                    $imagePath = $content['image'];
                    $cityName = $content['cityName'];
                    $description = $content['description'];

                    $imagePath = basename($imagePath);

                    $imageDir = 'assets/images/';
                    $imageFullPath = $imageDir . $imagePath;

                    if (file_exists($imageFullPath) && is_file($imageFullPath)) {
                        $imageToShow = $imageFullPath;
                    } else {
                        $imageToShow = $imageDir . 'default.jpg';
                        $country_name = 'No name available for this image.';
                        $description = 'No description available for this image.';
                    }
            ?>
                    <div class="city-card">
                        <img src="<?php echo htmlspecialchars($imageToShow); ?>" alt="<?php echo htmlspecialchars($cityName); ?>" class="city-img">
                        <div class="city-info">
                            <h4><?php echo htmlspecialchars($cityName); ?></h4>
                            <p><?php echo htmlspecialchars($description); ?></p>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No image found.</p>";
            }
            ?>
        </div>
    </section>

    <section id="blog" class="section">
        <div class="container">
            <h2 class="mt-3 mb-5">News and Articles</h2>

            <div class="row">
                <div class="col-lg-8 col-md-12 mb-4">
                    <div class="video-container">
                        <iframe width="710" height="415"
                            src="https://www.youtube.com/embed/MQR5KmdRmuU?si=bCa8Ud5fylKJues3&amp;controls=0&amp;start=12"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="article-list">
                        <div class="d-flex mb-4 align-items-center">
                            <img src="assets/art1.avif" alt="London Olympics" class="img-fluid rounded me-3"
                                style="width: 100px; height: 100px;" />
                            <div>
                                <h5 class="article-title p-3"> <a
                                        href="https://www.reuters.com/sports/olympics/brisbane-2032-chief-wants-purpose-built-main-stadium-games-2024-12-06/">Brisbane
                                        2032 chief wants purpose-built main
                                        stadium for Games</a></h5>
                            </div>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <img src="assets/art2.jpg" alt="London Olympics" class="img-fluid rounded me-3"
                                style="width: 100px; height: 100px;" />
                            <div>
                                <h5 class="article-title p-3"> <a
                                        href="https://www.reuters.com/sports/milano-cortina-2026-gets-first-venue-with-livigno-slopes-2024-12-12/">Milano-Cortina
                                        2026 gets first venue with Livigno slopes</a></h5>
                            </div>
                        </div>
                        <div class="d-flex mb-4 align-items-center">
                            <img src="assets/art3.avif" alt="London Olympics" class="img-fluid rounded me-3"
                                style="width: 100px; height: 100px;" />
                            <div>
                                <h5 class="article-title p-3"> <a
                                        href="https://www.reuters.com/sports/olympics/world-cup-2034-saudi-arabia-unlikely-clash-with-winter-games-says-ioc-2024-12-03/">World
                                        Cup 2034 in Saudi Arabia unlikely to clash with Winter Games, says IOC</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer style="display: flex; justify-content: space-between; align-items: center; padding: 50px; background-color:rgb(0, 0, 0);">
        <div style="display: flex; flex-direction: column; align-items: flex-start;">
            <div>
                <a href="#" style="margin-right: 10px;">Facebook</a>
                <a href="#" style="margin-right: 10px;">Instagram</a>
                <a href="#" style="margin-right: 10px;">Twitter</a>
                <a href="https://www.youtube.com/@Olympics">YouTube</a>
            </div>
            <div style="margin-top: 10px;" class="text-center">
                <p style="align-items:center">ALL RIGHTS RESERVED 2025</p>
            </div>
        </div>
        <div>
            <img src="assets/icon.png" alt="Olympics Logo" style="width: 100px;">
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const navLinks = document.querySelectorAll('.nav-link');
        const navbarToggler = document.querySelector('.navbar-toggler');

        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navbarToggler.getAttribute('aria-expanded') === 'true') {
                    navbarToggler.click();
                }
            });
        });
    </script>
</body>

</html>