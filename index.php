<?php
require('base.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Potajou | Co-jardinez !</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="style3.css" />
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/lenis@1.1.1/dist/lenis.min.js"></script>
  </head>
  <body>
    <header>
      <div class="title-01">
        <h1 class="test-1">Jardinage <span>&</span> <h1 class="test-2">Partage<span>*</span></h1>
        <svg width="100" height="100" xmlns="http://www.w3.org/2000/svg">
          <line
            x1="50"
            y1="30"
            x2="50"
            y2="70"
            stroke="black"
            stroke-width="2"
          />
          <line
            x1="40"
            y1="60"
            x2="50"
            y2="70"
            stroke="black"
            stroke-width="2"
          />
          <line
            x1="60"
            y1="60"
            x2="50"
            y2="70"
            stroke="black"
            stroke-width="2"
          />
        </svg>
      </div>
      <nav>
        <svg
          version="1.1"
          id="Calque_1"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px"
          y="0px"
          viewBox="0 0 248.6 78.7"
          style="enable-background: new 0 0 248.6 78.7"
          xml:space="preserve"
        >
          <style type="text/css">
            .st0 {
              display: none;
              fill: #636363;
            }
            .st1 {
              fill: #5e7f38;
            }
            .st2 {
              fill: #ff811a;
            }
          </style>
          <g id="Calque_2_1_">
            <rect x="110.4" y="-23.1" class="st0" width="104.4" height="78.3" />
            <path
              class="st1"
              d="M172.2,3.2c-0.7-2-2.7-3.2-4.7-3.2c-2.3,0-4.3,1.6-4.9,3.9C162,1.6,159.9,0,157.6,0c-2,0-4,1.2-4.7,3.2
c-0.9,2.4,0.5,4.5,0.7,4.7c3,3,6,6,9,8.9c3-3,6-6,9-8.9C171.7,7.7,173.1,5.6,172.2,3.2z"
            />
            <path
              class="st2"
              d="M172.2,19.3c-0.7-2-2.7-3.2-4.7-3.2l0,0h-9.9l0,0c-1.9,0-4,1.2-4.7,3.2c-0.8,2.4,0.7,4.5,0.8,4.6
c2.9,3,5.9,6,8.8,9c3-3,5.9-6,8.9-9C171.6,23.8,173.1,21.7,172.2,19.3z"
            />
          </g>
          <g>
            <path
              class="st1"
              d="M38.9,41.4c0,0.5-0.1,1-0.1,1.5c-2.1,14.4-25.6,14.4-25.6,14.4c-1.1,0-2.1,1-2.1,2.1v0.1
c0.3,5.4,1.5,12,1.6,12.5l0.2,1.3c0.2,1,0.3,2.1,0.3,3.2c0,0.8-0.8,1.5-1.6,1.5H1.5c-0.4,0-0.8-0.2-1.1-0.5c-0.3-0.3-0.4-0.6-0.4-1
c0-1,0.1-2.1,0.3-3.2l0.4-2c1-5.6,1.6-11.2,1.6-16.9c0-5.7-0.6-11.3-1.6-16.9l-0.4-2c-0.2-1-0.3-2.1-0.3-3.1c0-0.5,0.1-0.8,0.4-1.1
C0.7,31.2,1.1,31,1.5,31h10.2c0.8,0,1.6,0.7,1.6,1.5c0,1.1-0.1,2.1-0.3,3.2l-0.4,2c-0.1,0.7-0.3,1.5-0.4,2.2
c0.2-1.2,3.8-7.7,9.8-8.8c1.5-0.3,3.2-0.4,4.7-0.4c2.1,0,4.1,0.3,5.5,1C35.3,33.1,38.9,36.6,38.9,41.4z M25.6,42v-1
c-0.2-1.5-0.9-5.2-3.9-5.2c-3.2,0-6,3-8.8,8.1c-1.7,3.1-1.9,8.8-2,10.4h1.8c3.3,0,6.5-1.2,8.9-3.4C23.7,49,25.5,46.2,25.6,42z"
            />
            <path
              class="st1"
              d="M80.4,54.6c0,13.2-9,24-20.2,24c-11.1,0-20.2-10.8-20.2-24c0-13.3,9-24.1,20.2-24.1
C71.3,30.6,80.4,41.3,80.4,54.6z M66.9,54.6c0-11.6-3-20.9-6.7-20.9s-6.7,9.3-6.7,20.9c0,11.6,3,20.9,6.7,20.9S66.9,66.2,66.9,54.6
z"
            />
            <path
              class="st1"
              d="M115.4,31c1.3,0,2.2,1,2.2,2.2l-0.6,9.7c0,0.6-0.3,1.3-0.7,1.8c-0.5,0.4-1.1,0.7-1.8,0.7
c-1.1,0-1.9-0.6-2.3-1.5c-0.6-1.4-3.9-9.7-6.2-9.7c-2.1,0-2.7,14.7-2.7,20.4c0,5.7,0.5,11.3,1.5,16.9l0.4,2c0.2,1,0.3,2.1,0.3,3.2
c0,0.8-0.7,1.5-1.5,1.5H93.8c-0.4,0-0.8-0.2-1.1-0.5c-0.3-0.3-0.4-0.6-0.4-1c0-1,0.1-2.1,0.3-3.2l0.4-2c1.1-5.6,1.5-11.2,1.5-16.9
c0-5.7-0.8-20.4-2.7-20.4c-2.7,0-5.6,8.3-6.2,9.7c-0.4,0.9-1.3,1.5-2.3,1.5c-0.6,0-1.3-0.3-1.8-0.7c-0.4-0.5-0.7-1.1-0.7-1.8
l-0.6-9.7c0-1.3,1-2.2,2.2-2.2H115.4z"
            />
            <path
              class="st1"
              d="M152.3,75.4c0,1.4-1.3,2.7-3,2.7h-9.2c-1.5,0-2.9-1-3.1-2.5c0-0.1-0.1-0.4-0.1-0.6c0-1,0.3-2.5,0.3-4.3
c0-1.7-0.2-3.7-1.1-5.9c-0.3-0.7-1-1.2-1.8-1.2c-0.3,0-0.6,0.1-0.8,0.2l-5,2.9c-2,1.1-3.2,3-3.2,5c0,0.4,0.1,0.8,0.1,1.2
c0.2,1,0.4,1.8,0.6,2.3c0.1,0.2,0.1,0.4,0.1,0.6c0,1-0.6,1.9-1.7,2.1c-0.2,0.1-0.4,0.1-0.6,0.1H114c-1.3,0-2.2-0.9-2.2-2
c0-0.4,0.1-0.6,0.3-1V75l2.7-4.2c6.8-12.1,8.6-28.7,8.6-36v-1.2c0-1.5,1.6-2.7,3.3-2.7H137c1.7,0,3.2,1.3,3.2,2.7
c0.6,7.5,2.1,13.9,3.9,20.4c1.9,6.6,4.3,13,7.4,19.1c0,0,0.2,0.5,0.6,1.2C152.2,74.7,152.3,75.1,152.3,75.4z M132.2,60.8
c1.3-0.7,2-2,2-3.2c0-0.3-0.1-0.6-0.1-0.8c-0.7-2.8-2.6-9.9-3.9-13.3c-0.1-0.3-0.4-0.4-0.7-0.4c-0.3,0-0.6,0.1-0.7,0.4
c-3.6,6.6-4.5,13.4-4.5,19.2c0,0.9,0.8,1.5,1.8,1.5c0.3,0,0.6-0.1,0.9-0.2L132.2,60.8z"
            />
            <path
              class="st1"
              d="M166.6,35.7c0.7,0,1.2,0.5,1.2,1.2c0,0.8-0.1,1.6-0.2,2.4l-0.3,1.5c-0.8,4.2-0.7,18.7-0.7,23V65
c-0.3,11.1-7,13-10.2,13.5c-0.2,0.1-0.3,0.1-0.5,0.1c-0.9,0-1.2-0.7-1.2-0.7c-0.1-0.2-0.1-0.3-0.1-0.4c0-0.7,0.7-1.1,1.1-1.3
c2.8-1.2,3.1-3.6,3.1-6.1v-1.5c0-1.7,0.1-5.8,0.1-10.4c0-6.9-0.1-14.8-0.6-17.4l-0.3-1.5c-0.2-0.8-0.2-1.6-0.2-2.3
c0-0.4,0.1-0.6,0.3-0.8c0.2-0.2,0.5-0.4,0.8-0.4H166.6z"
            />
            <path
              class="st1"
              d="M210.7,54.6c0,13.2-9,24-20.2,24s-20.2-10.8-20.2-24c0-13.3,9-24.1,20.2-24.1S210.7,41.3,210.7,54.6z
 M197.3,54.6c0-11.6-3-20.9-6.7-20.9c-3.7,0-6.7,9.3-6.7,20.9c0,11.6,3,20.9,6.7,20.9C194.3,75.6,197.3,66.2,197.3,54.6z"
            />
            <path
              class="st1"
              d="M215.2,64c0-0.7,0.1-1.4,0.1-2.2c0.3-3,0.5-5.7,0.5-7.3c0-5.7-0.6-11.3-1.6-16.9l-0.3-2
c-0.2-1-0.3-2.1-0.3-3.1c0-0.5,0.1-0.8,0.4-1.1c0.3-0.3,0.7-0.5,1.1-0.5h10.2c0.9,0,1.6,0.7,1.6,1.5c0,1.1-0.1,2.1-0.3,3.2l-0.4,2
c-0.9,5-1,9.9-1,14.8v2c0,3.2,0,1.2,0.1,5.9c0,3.6,0.6,14.5,5.8,14.5c5.5,0,5.8-10.9,5.8-14.4c0.1-4.7,0.1-2.7,0.1-6v-2
c0-5-0.1-9.9-1-14.8l-0.4-2c-0.1-1-0.3-2.1-0.3-3.1c0-0.5,0.2-0.8,0.5-1.1c0.3-0.3,0.6-0.5,1.1-0.5H247c0.8,0,1.5,0.7,1.5,1.5
c0,1.1-0.1,2.1-0.3,3.2l-0.3,2c-1.1,5.6-1.6,11.2-1.6,16.9c0,1.6,0.2,4.3,0.5,7.2c0.1,0.7,0.1,1.4,0.1,2c0,9.2-6.6,14.3-14.8,14.3
H230C221.9,78,215.2,72.8,215.2,64z"
            />
          </g>
        </svg>
        <div class="dyna-01">
          <span class="burger">
            <label class="burger" for="burger">
              <input type="checkbox" id="burger" />
              <span class="span-01"></span>
              <span class="span-02"></span>
            </label>
          </span>
        </div>
          <?php
          if(!isset($_SESSION['id'])) {
            ?>
            <?php
    echo '<div class="cta">';
    echo '<a href="user/formulaire.php" class="hover-underline-animation">';
    echo "<span>S'Identifier</span>";
    echo '</a>';
    echo '<svg id="arrow-horizontal" xmlns="http://www.w3.org/2000/svg" width="30" height="10" viewBox="0 0 46 16">';
    echo '<path id="Path_10" data-name="Path 10" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" transform="translate(30)"></path>';
    echo '</svg>';
    echo '</div>';
?>
      <?php
          } else {
            $req = $mabd->prepare('SELECT img_compte,prénom_compte FROM compte WHERE id_compte = '.$_SESSION['id'].';');
            $req->execute();
            $pdp = $req->fetchAll();

            foreach($pdp as $profil) {
              echo '<a href="user/dashboard.php">';
              echo '<div class="profil">';
              echo '<img class="profil-img" src="images/uploads_pdp/'.$profil['img_compte'].'" alt="Photo de profil">';
              echo '<p class="nom-profile">' . $profil['prénom_compte'] . '</p>';
              echo '</div>';
              echo '</a>';
            }
          }
          ?>
          </nav>
      <div class="dyna">
        <span class="burger">
          <label class="burger" for="burger">
            <input type="checkbox" id="burger-01" />
            <span class="span-01"></span>
            <span class="span-02"></span>
          </label>
        </span>
      </div>
      <div class="hamburger">
        <div class="parent">
          <div class="div1">
            <a href="user/formulaire.php">Nos Jardins</a>
            <svg width="65" height="50" viewBox="0 0 100 100">
              <g transform="rotate(-45 50 50)">
                <!-- Tige de la flèche -->
                <line
                  x1="10"
                  y1="50"
                  x2="70"
                  y2="50"
                  stroke="white"
                  stroke-width="2"
                />
                <!-- Première partie de la tête de flèche -->
                <line
                  x1="70"
                  y1="50"
                  x2="55"
                  y2="35"
                  stroke="white"
                  stroke-width="2"
                />
                <!-- Deuxième partie de la tête de flèche -->
                <line
                  x1="70"
                  y1="50"
                  x2="55"
                  y2="65"
                  stroke="white"
                  stroke-width="2"
                />
              </g>
            </svg>
          </div>
          <div class="div2">
            <a href="user/formulaire.php">Profil</a>
            <svg width="65" height="50" viewBox="0 0 100 100">
              <g transform="rotate(-45 50 50)">
                <!-- Tige de la flèche -->
                <line
                  x1="10"
                  y1="50"
                  x2="70"
                  y2="50"
                  stroke="white"
                  stroke-width="2"
                />
                <!-- Première partie de la tête de flèche -->
                <line
                  x1="70"
                  y1="50"
                  x2="55"
                  y2="35"
                  stroke="white"
                  stroke-width="2"
                />
                <!-- Deuxième partie de la tête de flèche -->
                <line
                  x1="70"
                  y1="50"
                  x2="55"
                  y2="65"
                  stroke="white"
                  stroke-width="2"
                />
              </g>
            </svg>
          </div>
          <div class="div3">
            <a href="admin/crud_admin.php">Gestion</a>
            <svg width="65" height="50" viewBox="0 0 100 100">
              <g transform="rotate(-45 50 50)">
                <!-- Tige de la flèche -->
                <line
                  x1="10"
                  y1="50"
                  x2="70"
                  y2="50"
                  stroke="white"
                  stroke-width="2"
                />
                <!-- Première partie de la tête de flèche -->
                <line
                  x1="70"
                  y1="50"
                  x2="55"
                  y2="35"
                  stroke="white"
                  stroke-width="2"
                />
                <!-- Deuxième partie de la tête de flèche -->
                <line
                  x1="70"
                  y1="50"
                  x2="55"
                  y2="65"
                  stroke="white"
                  stroke-width="2"
                />
              </g>
            </svg>
          </div>
        </div>
      </div>
      <div class="hamburger-2"></div>
    </header>
    <div class="container-01">
      <a href="user/formulaire.php"><h2 class="fiouu">NOS JARDINS</h2></a>
      <a href="user/formulaire.php"><h2 class="fiouu">NOS CULTURES</h2></a>
      <a href="user/formulaire.php"><h2 class="fiouu">OU PRATIQUER</h2></a>
      <a href="user/formulaire.php"><h2 class="fiouu">QUELS OUTILS</h2></a>
    </div>
    <div class="container-02">
      <img class="scroll-image" src="images/coviv.webp" alt="" />
      <div class="container-02-title">
        <h1>Convivialité</h1>
        <p>
          Rejoignez-nous et partagez des moments de convivialité avec notre communauté chaleureuse et accueillante. Ici, nous célébrons la joie d'être ensemble, d'échanger des idées et de tisser des liens sincères. Ensemble, nous créons un espace où chacun se sent valorisé et soutenu. Venez vivre des expériences enrichissantes et faites partie de notre famille de cœur.
        </p>
      </div>
    </div>
    <!-- deuxieme container-->
    <div class="container-03">
      <img class="scroll-image" src="images/partage.webp" alt="" />
      <div class="container-02-title">
        <h1>Partage</h1>
        <p>
          Ici, nous croyons en la valeur du partage et en la richesse qu'il apporte à notre communauté. Partagez vos histoires, vos idées, et vos compétences avec ceux qui en ont besoin. Ensemble, nous pouvons bâtir un réseau de soutien où chacun trouve des réponses et de l'inspiration. Votre générosité et votre engagement peuvent illuminer la vie de quelqu'un d'autre.
        </p>
      </div>
    </div>
    <!-- troisième container -->
    <div class="container-02">
      <img class="scroll-image" src="images/entreaide.webp" alt="" />
      <div class="container-02-title">
        <h1>Entre-aide</h1>
        <p>
          Ici, nous croyons en la puissance de la solidarité et de l'entraide.
           Notre plateforme permet à chacun de trouver le soutien nécessaire, qu'il s'agisse de conseils, de partage d'expériences, ou d'un simple mot d'encouragement. Ensemble, nous pouvons surmonter les défis et grandir en communauté.
        </p>
      </div>
    </div>
    <!-- début "que fait-on ?"-->
    <div class="container-04-title fiouu">
      <h1>Qui <span>sommes</span>-nous ?</h1>
      <p>
        Potajou est une plateforme dédiée au co-jardinage, où passionnés de jardinage et propriétaires de terrains peuvent se rencontrer et partager leurs espaces verts. Nous croyons en la force de la communauté et du partage, permettant à chacun de cultiver, 
        apprendre et grandir ensemble. 
      </p>
    </div>
    <div class="container-04-title fiouu">
      <h1>Que <span>fait</span>-on ?</h1>
      <p>
        Potajou met en relation les passionnés de jardinage avec des propriétaires de terrains. Ensemble, nous cultivons des espaces verts partagés, favorisant la convivialité et l'apprentissage mutuel. Rejoignez-nous pour faire fleurir vos jardins en communauté.
      </p>
    </div>
    <div class="container-04-title fiouu">
      <h1>Pourquoi <span>nous</span> choisir ?</h1>
      <p>
        Optez pour Potajou afin de profiter d'une expérience de co-jardinage unique. Nous facilitons la rencontre entre jardiniers passionnés et propriétaires de terrains, créant des espaces verts partagés où règnent convivialité et apprentissage. 
      </p>
    </div>
    <!-- les étapes -->
    <h1 class="etapes fiouu">Les Etapes</h1>
    <div class="parent-1">
      <div class="div-1">
        <h1>01</h1>
        <a href="user/inscription.php"><h2>S'inscrire</h2></a>
      </div>
      <div class="div-2">
        <h1>02</h1>
        <a href="user/formulaire.php"><h2>Se connecter</h2></a>
      </div>
      <div class="div-3">
        <h1>03</h1>
        <a href="user/formulaire.php"><h2>Voir tous les Jardins</h2></a>
      </div>
      <div class="div-4">
        <h1>04</h1>
        <a href="user/formulaire.php"><h2>Se rendre sur place</h2></a>
      </div>
      <div class="div-5">
        <h1>05</h1>
        <a href="user/formulaire.php"><h2>Jardinez !</h2></a>
      </div>
    </div>
    <!--les jardins mobile/tablet-->
    <h1 class="jardins fiouu">Quelques Jardins</h1>
    <div class="j-total">
      <!-- premiere jardins-->
      <div class="container-05">
        <img src="images/jardinns.webp" alt="" />
        <div class="container-02-title">
          <h1>JARDINS 01</h1>
          <p>Jardin de partage</p>
          <a href="user/formulaire.php">
          <button class="cta">
            <span class="hover-underline-animation">VOIR</span>
            <svg
              id="arrow-horizontal"
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="10"
              viewBox="0 0 46 16"
            >
              <path
                id="Path_10"
                data-name="Path 10"
                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                transform="translate(30)"
              ></path>
            </svg>
          </button>
        </a>
        </div>
      </div>
      <!-- deuxième jardins-->
      <div class="container-06">
        <div class="container-02-title">
          <img src="images/ouvriers.webp" alt="" />
          <h1>JARDINS 02</h1>
          <p>Jardin Jules Guesde</p>
          <a href="user/formulaire.php">
          <button class="cta">
            <span class="hover-underline-animation">VOIR </span>
            <svg
              id="arrow-horizontal"
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="10"
              viewBox="0 0 46 16"
            >
              <path
                id="Path_10"
                data-name="Path 10"
                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                transform="translate(30)"
              ></path>
            </svg>
          </button>
        </a>
        </div>
      </div>
      <!-- troisième jardin-->
      <div class="container-10">
        <div class="container-02-title">
          <img src="images/jardin_jules_guesde.webp" alt="" />
          <h1>JARDINS 03</h1>
          <p>Jardin partagé des Viennes</p>
          <a href="user/formulaire.php">
          <button class="cta">
            <span class="hover-underline-animation"> VOIR </span>
            <svg
              id="arrow-horizontal"
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="10"
              viewBox="0 0 46 16"
            >
              <path
                id="Path_10"
                data-name="Path 10"
                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                transform="translate(30)"
              ></path>
            </svg>
          </button>
        </a>
        </div>
      </div>
    </div>
    <!-- Les jardins desktop -->
    <div class="container">
      <section class="panel red">
        <div class="container-05">
        <img src="images/familiaux.webp" alt="" />
        <div class="container-02-title">
          <h1>JARDINS 01</h1>
          <p>Jardins Ouvriers et Familiaux</p>
          <a href="user/formulaire.php">
          <button class="cta">
            <span class="hover-underline-animation">VOIR</span>
            <svg
              id="arrow-horizontal"
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="10"
              viewBox="0 0 46 16"
            >
              <path
                id="Path_10"
                data-name="Path 10"
                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                transform="translate(30)"
              ></path>
            </svg>
          </button>
        </a>
        </div>
      </div>
      <div class="container-05">
        <img src="images/cath.webp" alt="" />
        <div class="container-02-title">
          <h1>JARDINS 02</h1>
          <p>Jardins quartier Seguin</p>
          <a href="user/formulaire.php">
          <button class="cta">
            <span class="hover-underline-animation">VOIR</span>
            <svg
              id="arrow-horizontal"
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="10"
              viewBox="0 0 46 16"
            >
              <path
                id="Path_10"
                data-name="Path 10"
                d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                transform="translate(30)"
              ></path>
            </svg>
          </button>
        </a>
        </div>
      </div>
      </section>
      <section class="panel purple">
        <div class="container-05">
          <img src="images/jardin_de_partage.webp" alt="" />
          <div class="container-02-title">
            <h1>JARDINS 03</h1>
            <p>Jardins rue Louis Blanc</p>
            <a href="user/formulaire.php">
            <button class="cta">
              <span class="hover-underline-animation">VOIR</span>
              <svg
                id="arrow-horizontal"
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="10"
                viewBox="0 0 46 16"
              >
                <path
                  id="Path_10"
                  data-name="Path 10"
                  d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                  transform="translate(30)"
                ></path>
              </svg>
            </button>
          </a>
          </div>
        </div>
        <div class="container-05">
          <img src="images/accord.webp" alt="" />
          <div class="container-02-title">
            <h1>JARDINS 04</h1>
            <p>L'Accord parfait</p>
            <a href="user/formulaire.php">
            <button class="cta">
              <span class="hover-underline-animation">VOIR</span>
              <svg
                id="arrow-horizontal"
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="10"
                viewBox="0 0 46 16"
              >
                <path
                  id="Path_10"
                  data-name="Path 10"
                  d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z"
                  transform="translate(30)"
                ></path>
              </svg>
            </button>
            </a>
          </div>
        </div>
      </section>
      <section class="panel blue">
        cc
      </section>
    </div>
    <!-- NOUS CONTACTER -->
    <h1 class="contact-01">Nous Contacter</h1>
    <!-- formulaire contact -->
    <form action="traitement/valid_contact.php#contact-form" id="contact-form" method="post">
    <div>
        <input type="text" id="nom" class="input-03" name="nom" required placeholder="Nom" autocomplete="name">
    </div>
    <div>
        <input class="input-03" type="email" id="email" name="email" required placeholder="E-mail" autocomplete="email">
    </div>
    <div>
        <textarea class="input-03" id="message" name="message" rows="4" required placeholder="Message"></textarea>
    </div>
    <div>
        <button class="form-btn-02" type="submit">Envoyer</button>
    </div>
</form>

    <?php
        if (isset($_SESSION['information'])) {
            $message_type = $_SESSION['information_type'] ?? 'error';
            echo '<div class="form-message ' . $message_type . '">'.$_SESSION['information'].'</div>'."\n";
            session_unset();
        }
        ?>
    <footer>
        <div class="footer-p1">
          <h1>Potajou</h1>
          <p>Un site de co-jardinage,</p>
          <p>Eco-conçu !</p>
          <div class="footer-p1-01">
          <p>Prendre un nouveau départ?</p>
          <button class="form-btnn scroll-to-top">Haut de page</button>
          </div>
        </div>
        <div class="footer-p2">
          <h1>Redirections</h1>
          <ul>
            <a href="index.php">Accueil</a>
            <a href="user/formulaire.php">Tableau de Bord</a>
            <a href="mentions.php">Mentions Légales</a>
          </ul>
        </div>
    </footer>
  </body>
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    var buttons = document.querySelectorAll('.scroll-to-top');
    buttons.forEach(function(button) {
      button.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    });
  });
</script>
  <script>
    gsap.registerPlugin(ScrollTrigger);

    function pinAndReveal(container) {
      gsap.timeline({
        scrollTrigger: {
          trigger: container,
          start: "top top",
          end: "bottom top",
          pin: true,
          pinSpacing: false,
          scrub: 1,
        }
      })
      .from(container.querySelector(".container-02-title, .container-03-title"), {
        y: 0,
        autoAlpha: 0,
        ease: "power1.out",
        duration: 1
      });
    }
  </script>
  <script>
    gsap.registerPlugin(ScrollTrigger);
    let sections = gsap.utils.toArray(".panel");
    gsap.to(sections, {
      xPercent: -50 * (sections.length - 1),
      ease: "none",
      scrollTrigger: {
        trigger: ".container",
        pin: true,
        scrub: 0,
        snap: 0 / (sections.length - 1),
        end: () => "+=" + document.querySelector(".container").offsetWidth
      }
    });
  </script>
  <script>
    const lenis = new Lenis()
    let lenisActive = true
    lenis.on('scroll', (e) => {
      console.log(e)
    })
    lenis.on('scroll', ScrollTrigger.update)
    gsap.ticker.add((time) => {
      lenis.raf(time * 400)
    })
    gsap.ticker.lagSmoothing(0)
    function toggleLenis() {
      if (lenisActive) {
        lenis.stop()
        console.log('Lenis désactivé')
      } else {
        lenis.start() 
        console.log('Lenis activé')
      }
      lenisActive = !lenisActive
    }
    document.getElementById('burger').addEventListener('click', toggleLenis)
  </script>
  <script>
    gsap.set(".test-2", { y: "-=500" });
    let tween1 = gsap.to(".test-2", { 
        y: 0, 
        duration: 3, 
        ease: "power2.inOut" 
    }); 
    ScrollTrigger.create({
        trigger: ".test-2",
        start: "top bottom",
        animation: tween1,
    });
    gsap.set(".parent-1", { y: "-=100" });
    let tween3 = gsap.to(".parent-1", { 
        y: 0, 
        opacity: 1,
        duration: 3, 
        ease: "power2.inOut" 
    }); 
    ScrollTrigger.create({
        trigger: ".parent-1",
        start: "top bottom",
        animation: tween3,
    });
    gsap.to(".parent-1", {
    opacity: 1,
    duration: 5, 
});
    gsap.set(".test-1", { y: "-=500" });
    let tween2 = gsap.to(".test-1", { 
        y: 0, 
        duration: 5, 
        ease: "power2.inOut" 
    }); 
    ScrollTrigger.create({
        trigger: ".test-1",
        start: "top bottom",
        animation: tween2,
    });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
      const animateElement = (element) => {
          gsap.to(element, {
              opacity: 1,
              y: 0,
              duration: 1,
              ease: "power2.inOut" 
          });
      };
      const triggerAnimation = (element) => {
          ScrollTrigger.create({
              trigger: element,
              start: "top bottom",
              onEnter: () => animateElement(element),
              once: true 
          });
      };
      const elementsToObserve = document.querySelectorAll(".fiouu");
      elementsToObserve.forEach((element) => {
          triggerAnimation(element);
      });
  });
</script>
  <script>
    function ajouterEcouteurDeCliqueAuBouton() {
      const monBouton = document.querySelector("#burger");
      const menuPrincipal = document.querySelector(".hamburger");
      const menuSecondaire = document.querySelector(".hamburger-2");
      const lignesFleche = document.querySelector(".span-01");
      const ligneFleche = document.querySelector(".span-02");
      const boutonDyna = document.querySelector(".dyna");
      const boutonCta = document.querySelector(".cta");
      const dureeAnimation = 1500;
      const delaiReactivationBouton = 1800;
      let estEnAnimation = false;

      function gestionFinAnimation(event) {
        if (event.animationName === "slideOut") {
          event.target.style.display = "none";
          event.target.classList.remove("hide");
        }
        event.target.classList.remove("animating");
      }

      if (monBouton) {
        monBouton.addEventListener("click", function () {
          if (estEnAnimation) return;
          estEnAnimation = true;
          monBouton.disabled = true;
          if (document.body.style.overflowY === "hidden") {
            document.body.style.overflowY = "visible";
          } else {
            document.body.style.overflowY = "hidden";
          }
          window.scrollTo({ top: 0, behavior: "smooth" });
          setTimeout(() => {
            console.log("Bouton cliqué");
            if (lignesFleche) lignesFleche.classList.toggle("active");
            if (boutonDyna) boutonDyna.classList.toggle("active");
            if (ligneFleche) ligneFleche.classList.toggle("active");
            monBouton.classList.toggle("active");
            boutonCta.classList.toggle("active");
            const menus = [menuPrincipal, menuSecondaire];
            menus.forEach((menu) => {
              menu.classList.add("animating");
              if (menu.classList.contains("show")) {
                menu.classList.remove("show");
                menu.classList.add("hide");
              } else {
                menu.style.display = "flex";
                setTimeout(() => {
                  menu.classList.add("show");
                }, 10);
              }
            });
            setTimeout(() => {
              menus.forEach((menu) => menu.classList.remove("animating"));
              setTimeout(() => {
                monBouton.disabled = false;
                estEnAnimation = false;
              }, delaiReactivationBouton);
            }, dureeAnimation);
          }, 0);
        });
        menuPrincipal.addEventListener("animationend", gestionFinAnimation);
        menuSecondaire.addEventListener("animationend", gestionFinAnimation);
      }
    }
    ajouterEcouteurDeCliqueAuBouton();
  </script>
  <script>
setTimeout(function() {
  var loader = document.getElementById('loader');
  loader.style.animation = 'fadeOut 0.3s ease forwards'; 
  setTimeout(function() {
    loader.classList.remove('active'); 
    loader.style.zIndex = '-1';
  }, 500); 
}, 3000); 
</script>
</html>
