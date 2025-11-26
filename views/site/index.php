<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4 main-elem"></h1>


    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3 img-cyrcle text-center">
                <h2>Схожесть культуры</h2>
                <img src="/web/img/i1.jpg" alt="изображение">
            </div>
            <div class="col-lg-4 mb-3 img-cyrcle text-center">
                <h2>Одни ценности</h2>

                <img src="/web/img/2.jpg" alt="изображение">
            </div>
            <div class="col-lg-4 img-cyrcle text-center">
                <h2>Прекрасные виды</h2>

                <img src="/web/img/i3.jpg" alt="изображение">
            </div>
        </div>

    </div>

    <div id="carouselExampleInterval" class="carousel slide carusel-style" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="/web/img/i3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="/web/img/2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/web/img/i1.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<?php

$this->registerJsFile(
    'js/index.js',
    ['depends' => [yii\web\JqueryAsset::class]]
);
