<?php
/*
* Template name: Vision
*/
?>

<?php get_header() ?>

<div class="video-intro">
  <div class="video-intro__page-name">Vision</div>
  <h1 class="video-intro__title">Ensemble, célébrons la victoire</h1>
  <p class="video-intro__paragraph">Paris 2024 proposera une nouvelle vision de l’Olympisme en action, dans un esprit unique de célébration internationale.</p>
  <button class="video-intro__button">
        <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 5v14l11-7z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
  <div class="video-intro__fade-effect"></div>
  <div class="video-intro__player">
    <video>
          <source src="<?= UPLOADS.'/concept.mp4' ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
  </div>
</div>

<div class="description-vision">
  <div class="description-vision__txt">
    <h4 class="txt__title">Un projet en héritage</h4>
    <p class="txt__paragraph">Le village olympique est conçu comme un projet exceptionnel de rénovation urbaine, il deviendra une référence majeure en termes de durabilité et de rénovation urbaine.</p>
    <div class="description-vision__cards">
      <div class="cards card-spectators">
        <img src="" alt="" class="cards__img">
        <p class="cards__number">100%</p>
        <p class="cards__txt">des spectateurs se rendant sur les sites, par transports publics, à pied ou à bicyclette</p>
      </div>
      <div class="cards card-cities">
        <img src="" alt="" class="cards__img">
        <p class="cards__number">85%</p>
        <p class="cards__txt">des grandes villes de France à Paris en moins de quatre heures</p>
      </div>
      <div class="cards card-transports">
        <img src="" alt="" class="cards__img">
        <p class="cards__number">0€</p>
        <p class="cards__txt">c'est le prix du ticket des transports parisiens pour les détenteurs de billets pour les jeux</p>
      </div>
    </div>
  </div>
</div>

<div class="athlete">
  <div class="athlete__txt">
    <h3 class="athlete__name">Tony yoka</h3>
    <p class="athlete__caption">La boxe à Roland-Garros, c'est géant !</p>
    <a href="" class="athlete__button btn--white btn__text--blue">La boxe</a>
  </div>
</div>

<?php get_footer() ?>