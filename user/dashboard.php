<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tableau de bord | Potajou</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="../style3.css">
    <link rel="stylesheet" href="../tb.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
  </head>
  <body>
    <section class="total">
    <?php
    require("../base.php");
    if (isset($_SESSION['prénom'])) {
      // Si l'utilisateur est connecté, assignez le prénom à la variable $connexion
      $prénom = $_SESSION['prénom'];
      $id = $_SESSION['id'];
      

      $req = $mabd->prepare('SELECT img_compte FROM compte WHERE id_compte = '.$id.';');
      $req->execute();
      $pdp = $req->fetchAll();
  } else {
    header('location : formulaire.php');
  }
  $req = $mabd->prepare('SELECT jardins.img_jardins, jardins.taille_jardins, jardins.id_jardins,jardins.nom_jardins, parcelles.id_parcelles, proprietaire.prénom_compte AS proprietaire, parcelles.date_debut_parcelles, parcelles.date_fin_parcelles FROM parcelles INNER JOIN jardins ON parcelles._id_jardins = jardins.id_jardins INNER JOIN compte AS proprietaire ON jardins._id_compte = proprietaire.id_compte WHERE parcelles._id_compte = '.$_SESSION['id'].' AND parcelles.reservation_parcelles = 2;');
  $req->execute();
  $jardins_confirm = $req->fetchAll();
  ?>
    <header>
      <nav>
      <a href="./profil.php"><div class="profil">
          <?php
          foreach($pdp as $photo) {
            echo '<img class="profil-img" src="../images/uploads_pdp/'.$photo['img_compte'].'" alt="Photo de profil">';
          }
          ?>
          <?php echo $prénom; ?>
        </div></a>
        <button class="cta">
        <?php        
        if (isset($_GET['logout'])) {
          session_destroy();
          header('Location: ../index.php');
          exit;
        }
        echo '<a href="?logout=true"><span class="hover-underline-animation">DECONNEXION</span></a>';
          ?>
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
      </nav>
      <div class="dyna">
        <span class="burger">
          <label class="burger" for="burger">
            <input type="checkbox" id="burger" />
            <span class="span-01"></span>
            <span class="span-02"></span>
          </label>
        </span>
      </div>
      <div class="dyna-01">
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
        <div class="div4">
            <a href="../index.php">Accueil</a>
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
          <div class="div1">
            <a href="../user/profil.php">PROFIL</a>
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
            <a href="../user/dashboard.php">Tableau de Bord</a>
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
            <a href="../jardin/vosjardins.php">Vos Jardins</a>
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
      </nav>
      <div class="pres-p">
      <h1 class="title--01">Bonjour, <?php echo $prénom; ?> <span>👋🏻</span></h1>
      <p>Bienvenue sur votre tableau de bord, içi vous avez la
        possibilité de voir les Jardins, ainsi que vos réservations !</p>
      </p>
      <hr class="separatorr"></hr>
    </div>
    <h1 class="t-02"><span>Tous</span> les <span>Jardins</span></h1>

    <div class="parentt-1">
      <div class="divv-1"></div>
      <a href="../jardin/jardin.php?id=<?php $idquetuveux = 1; echo $idquetuveux; ?>" class="divv-2">
  <p class="h1-j">
    <h7>Jardin du Partage</h7>
  </p>
  <p>1800 m²</p>
  <p>41% d'occupation</p>
</a>
      <div class="divv-3"></div>
      <a href="../jardin/jardin.php?id=<?php $idquetuveux = 2; echo $idquetuveux; ?>" class="divv-2">
  <p class="h1-j">
    <h7>Jardin partagé de Viennes</h7>
  </p>
  <p>500 m²</p>
  <p>65% d'occupation</p>
</a>
      <div class="divv-5"></div>
      <a href="../jardin/jardin.php?id=<?php $idquetuveux = 3; echo $idquetuveux; ?>" class="divv-2">
  <p class="h1-j">
    <h7>Jardin du Parc Des Moulins</h7>
  </p>
  <p>1800 m²</p>
  <p>9% d'occupation</p>
</a>
      <div class="divv-7"></div>
      <a href="../jardin/jardin.php?id=<?php $idquetuveux = 4; echo $idquetuveux; ?>" class="divv-2">
  <p class="h1-j">
    <h7>Jardin des Saisons</h7>
  </p>
  <p>75 m²</p>
  <p>87% d'occupation</p>
</a>
      <div class="divv-9"></div>
      <a href="../jardin/jardin.php?id=<?php $idquetuveux = 5; echo $idquetuveux; ?>" class="divv-2">
  <p class="h1-j">
    <h7>Jardin Vert-Coeur</h7>
  </p>
  <p>50 m²</p>
  <p>21% d'occupation</p>
</a>
      <div class="divv-11"> </div>
      <a href="../jardin/jardin.php?id=<?php $idquetuveux = 6; echo $idquetuveux; ?>" class="divv-2">
  <p class="h1-j">
    <h7>Jardin de la Salpète</h7>
  </p>
  <p>150 m²</p>
  <p>56% d'occupation</p>
</a>
</div>
<hr class="separatorr-2"></hr>
    <h1 class="t-03">Vos Réservations</h1>

    <?php
    if (empty($jardins_confirm)) {
        echo "<h3 class='sad-face'>😞</h3>";
        echo "<h3 class='t-03'>Vous n'avez aucune réservation confirmé.</h3>";
    } else {
        $jardins_grouped_confirm = [];
        foreach ($jardins_confirm as $confirmation) {
            $id_jardin = $confirmation['id_jardins'];
            if (!isset($jardins_grouped_confirm[$id_jardin])) {
                $jardins_grouped_confirm[$id_jardin] = [
                    'img_jardins' => $confirmation['img_jardins'],
                    'nom_jardins' => $confirmation['nom_jardins'],
                    'proprietaire' => $confirmation['proprietaire']
                ];
            }
            $jardins_grouped_confirm[$id_jardin]['parcelles'][] = $confirmation['id_parcelles'] - (25 * ($id_jardin - 1));
        }
        
        foreach ($jardins_grouped_confirm as $jardin) {
            echo '<div class="jardin-1">';
            echo '<img src="../images/'.$jardin['img_jardins'].'" alt="Image du jardin" class="jardin-image">'; 
            echo '<h1 class="jardin-texte">'.$jardin['nom_jardins'].'</h1>';
            echo '<h2 class="jardin-texte-2">'.$jardin['proprietaire'].'</h2>';
            $idquetuveux = 1;
            echo '<a href="../jardin/jardin.php?id=' . $idquetuveux . '"><button class="button">Suivre</button></a>';
            echo '</div>';
        }
    }
?>
      </div>
    </div>
    <footer class="footer-2">
        <div class="footer-p1">
          <h1 class="footer-h1">Potajou</h1>
          <p>Un site de co-jardinage,</p>
          <p>Eco-conçu !</p>
          <div class="footer-p1-01">
          <p>Prendre un nouveau départ?</p>
          <button class="form-btnn scroll-to-top">Haut de page</button>
          </div>
        </div>
        <div class="footer-p2">
          <h2 class="footer-h2">Redirections</h2>
          <ul>
          <a href="formulaire.php">Connexion</a>
            <a href="inscription.php">Inscription</a>
            <a href="formulaire.php">Tableau de Bord</a>
            <a href="../mentions.php">Mentions Légales</a>
          </ul>
        </div>
    </footer>
  </body>
  </section>
  <script>
    function ajouterEcouteurDeCliqueAuBouton() {
      const monBouton = document.querySelector("#burger");
      const menuPrincipal = document.querySelector(".hamburger");
      const menuSecondaire = document.querySelector(".hamburger-2");
      const lignesFleche = document.querySelector(".span-01");
      const ligneFleche = document.querySelector(".span-02");
      const boutonDyna = document.querySelector(".dyna");
      const boutonCta = document.querySelector(".cta span");
      const boutonCta2 = document.querySelector(".cta svg");
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
            boutonCta2.classList.toggle("active");
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
</html>

<!-- desktop version --> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../style2.css">
    <link rel="stylesheet" href="../style3.css">
    <link rel="stylesheet" href="../tb.css" />
  </head>
  <body>
  <section class="total-desktop">
    <header>
      <nav>
        <!-- 
      <a href="./profil.php"><div class="profil">
          <?php
          foreach($pdp as $photo) {
            echo '<img class="profil-img" src="../images/uploads_pdp/'.$photo['img_compte'].'" alt="Photo de profil">';
          }
          ?>
          <?php echo $prénom; ?>
        </div></a>
        -->
        <button class="cta">
        <?php        
        if (isset($_GET['logout'])) {
          session_destroy();
          header('Location: ../index.php');
          exit;
        }
        echo '<a href="?logout=true"><span class="hover-underline-animation">DECONNEXION</span></a>';
          ?>
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
      </nav>
      <div class="hamburger">
        <div class="parent">
          <div class="div1">
            <a href="../user/profil.php">PROFIL</a>
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
            <a href="../user/dashboard.php">VOS RESERVATIONS</a>
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
            <a href="../user/dashboard.php">Tableau de Bord</a>
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
          <div class="div4">
            <a href="#">Vos Jardins</a>
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
    <div class="dashboard-container">
        <div class="sidebar">
            <!-- Contenu de la barre latérale -->
             <a href="../index.php">
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
            <ul>
            </a>
                <li><a href="../user/dashboard.php" class="tb-active">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="30.000000pt" height="30.000000pt" viewBox="0 0 500.000000 500.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,500.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M2443 3515 c-31 -13 -1155 -942 -1201 -992 -12 -13 -22 -30 -22 -38
0 -23 113 -154 138 -161 16 -5 33 1 55 17 18 13 259 212 537 444 618 514 557
467 583 454 11 -7 265 -216 564 -465 379 -316 551 -454 568 -454 33 0 146 135
143 170 -2 19 -44 59 -168 162 -91 76 -173 147 -182 159 -16 19 -18 52 -18
353 0 245 -3 335 -12 344 -8 8 -66 12 -195 12 -170 0 -183 -1 -193 -19 -6 -11
-10 -87 -10 -175 0 -86 -3 -156 -6 -156 -3 0 -92 73 -197 161 -106 89 -210
170 -232 180 -47 22 -108 24 -152 4z"/>
<path d="M2388 3007 c-68 -56 -213 -176 -323 -266 -426 -351 -466 -385 -471
-405 -3 -12 -4 -198 -2 -413 l3 -393 28 -27 27 -28 330 -3 330 -3 0 311 0 310
205 0 205 0 0 -310 0 -310 320 0 c226 0 327 3 345 12 54 24 55 33 55 467 l0
401 -27 24 c-77 66 -870 719 -885 727 -13 7 -43 -13 -140 -94z"/>
</g>
</svg>
</svg>Tableau de bord</a></li>
                <li><a href="../user/profil.php" class="tb-active2">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="20.000000pt" height="20.000000pt" viewBox="0 0 500.000000 500.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,500.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M2199 4987 c-103 -29 -178 -96 -214 -190 -8 -23 -29 -123 -45 -221
-16 -99 -33 -183 -38 -188 -5 -5 -49 -24 -98 -43 -49 -18 -123 -49 -164 -68
l-75 -35 -45 32 c-300 215 -321 226 -429 226 -112 0 -147 -23 -362 -238 -221
-221 -243 -254 -243 -372 -1 -97 13 -127 144 -311 57 -79 105 -151 107 -160 3
-9 -15 -60 -40 -115 -24 -54 -54 -129 -66 -166 -19 -57 -26 -67 -49 -72 -15
-3 -99 -17 -187 -31 -236 -38 -306 -78 -368 -212 -21 -46 -22 -59 -22 -333 l0
-285 33 -67 c60 -123 121 -154 382 -198 131 -22 189 -35 197 -47 7 -9 20 -39
29 -67 16 -48 26 -73 88 -210 l25 -53 -115 -159 c-129 -180 -148 -224 -142
-322 6 -111 29 -144 238 -354 217 -218 254 -242 375 -242 92 0 124 15 315 151
l154 111 72 -33 c40 -18 112 -47 161 -65 48 -18 92 -36 96 -40 4 -4 21 -89 38
-190 43 -265 76 -327 209 -389 l55 -26 285 0 285 0 67 33 c123 60 155 122 198
382 16 101 33 187 38 191 4 4 41 19 82 33 41 15 116 45 166 67 l91 41 142
-102 c199 -142 226 -155 326 -155 122 0 147 16 366 235 205 203 237 249 246
350 7 77 -16 150 -76 235 -27 39 -79 113 -116 166 l-66 95 36 80 c20 43 50
117 67 164 16 47 33 89 37 93 5 5 91 22 192 38 263 42 325 76 388 209 l26 55
0 290 c0 333 -2 344 -92 432 -61 61 -100 74 -328 113 -99 18 -183 35 -186 38
-3 4 -18 43 -34 87 -15 44 -45 118 -66 164 -35 75 -38 86 -25 105 7 12 55 80
106 151 51 72 103 153 116 180 31 66 32 153 3 232 -20 52 -43 79 -218 254
-213 213 -247 237 -351 246 -92 9 -144 -14 -329 -144 l-163 -115 -102 45 c-55
25 -136 57 -178 72 -43 15 -78 30 -78 32 0 3 -14 87 -31 186 -43 258 -75 319
-197 379 l-66 33 -266 2 c-189 2 -278 -1 -311 -10z m541 -289 c5 -13 23 -113
40 -223 17 -110 35 -214 41 -231 17 -55 56 -80 203 -129 77 -25 193 -73 259
-105 128 -64 166 -71 218 -44 17 8 101 66 188 128 87 62 170 121 185 131 l27
18 164 -164 c106 -105 165 -170 165 -184 0 -11 -54 -96 -121 -190 -134 -189
-159 -232 -159 -272 0 -15 29 -86 64 -158 36 -71 83 -185 105 -252 22 -68 45
-131 50 -142 21 -39 63 -52 299 -92 130 -22 242 -45 247 -50 14 -14 13 -465 0
-478 -6 -6 -112 -27 -235 -47 -234 -38 -281 -51 -307 -90 -8 -13 -34 -81 -58
-152 -24 -72 -72 -185 -105 -253 -89 -177 -96 -152 122 -458 54 -75 98 -145
98 -156 0 -14 -58 -78 -164 -184 -146 -145 -166 -162 -184 -152 -12 6 -76 51
-144 99 -307 219 -275 211 -461 119 -72 -36 -187 -83 -253 -105 -67 -22 -130
-45 -141 -51 -41 -21 -54 -61 -94 -298 -22 -130 -42 -241 -45 -245 -7 -11
-481 -10 -488 1 -3 5 -21 105 -41 222 -19 118 -38 226 -41 241 -11 55 -51 82
-186 126 -69 23 -181 69 -248 102 -165 81 -179 81 -302 -4 -51 -35 -144 -100
-207 -144 -86 -62 -117 -79 -130 -73 -9 5 -87 81 -174 169 -151 152 -158 161
-146 184 7 12 64 95 127 183 127 177 157 233 148 276 -3 15 -34 87 -70 159
-35 72 -81 183 -102 246 -20 64 -48 129 -61 145 -30 35 -45 39 -312 84 -118
20 -218 38 -223 41 -4 3 -8 113 -8 245 0 183 3 241 13 244 6 3 116 22 243 43
255 43 278 52 306 119 9 21 31 83 48 138 18 55 59 156 92 224 32 68 61 136 64
150 9 42 -13 82 -151 276 -71 99 -130 188 -133 198 -6 25 319 353 341 344 9
-3 101 -66 205 -140 118 -83 204 -137 225 -141 41 -8 58 -2 208 73 64 32 169
75 232 95 126 41 162 63 183 111 7 18 29 128 49 246 19 118 38 222 41 232 5
16 25 17 245 17 239 0 239 0 249 -22z"/>
<path d="M2278 3550 c-498 -105 -848 -538 -848 -1049 0 -183 37 -338 117 -493
57 -111 120 -194 219 -288 132 -126 275 -206 455 -256 114 -31 322 -43 439
-25 455 70 810 414 895 867 26 133 16 357 -19 479 -114 392 -427 686 -813 764
-131 27 -321 27 -445 1z m369 -265 c338 -64 589 -324 643 -668 14 -84 8 -232
-10 -302 -57 -210 -182 -382 -354 -489 -483 -302 -1113 -22 -1211 539 -19 110
-19 160 0 270 77 441 496 733 932 650z"/>
</g>
</svg>Votre Profil</a></li>
                <li><a href="../jardin/vosjardins.php" class="tb-active3">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="20.000000pt" height="20.000000pt" viewBox="0 0 500.000000 500.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,500.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M360 4612 l-31 -27 -156 -1075 -156 -1075 -1 -245 c-1 -220 2 -256
22 -350 51 -231 139 -441 267 -635 91 -138 279 -335 420 -438 117 -86 349
-204 495 -250 212 -68 298 -81 540 -81 186 -1 230 2 328 22 134 27 290 77 398
126 42 20 78 36 80 36 2 0 29 -46 61 -102 78 -139 91 -153 143 -153 84 0 116
85 65 172 -30 49 -23 52 43 19 115 -57 277 -105 431 -127 106 -15 378 -6 481
16 544 116 958 484 1130 1004 53 159 72 285 72 461 0 132 -11 224 -131 1060
-72 503 -134 926 -137 938 -8 37 -49 72 -83 72 -17 0 -131 -40 -253 -89 -619
-246 -955 -385 -975 -404 -17 -15 -23 -32 -23 -63 0 -35 5 -47 31 -68 17 -14
41 -26 54 -26 13 0 260 95 550 211 290 116 528 209 530 207 1 -1 21 -131 43
-288 23 -157 77 -533 121 -836 92 -634 98 -690 82 -839 -51 -484 -357 -895
-801 -1078 -47 -19 -134 -48 -195 -63 -101 -26 -125 -29 -295 -29 -248 0 -364
25 -574 123 l-99 46 44 39 c24 21 69 60 100 86 l55 47 315 83 c646 171 820
219 845 235 50 34 54 97 9 142 -41 41 -29 43 -658 -127 -164 -45 -300 -79
-303 -76 -3 3 13 34 35 69 51 80 125 237 155 325 12 37 29 70 37 75 8 4 189
55 403 112 428 116 436 119 436 189 0 45 -44 97 -82 97 -13 -1 -153 -36 -313
-80 -159 -43 -292 -77 -294 -75 -2 2 45 88 105 192 l109 187 230 61 c127 33
240 66 252 73 52 29 58 98 14 143 -38 37 -55 37 -219 -7 -74 -19 -135 -34
-137 -32 -2 2 44 84 102 183 122 208 131 239 85 285 -22 21 -40 30 -64 30 -46
0 -71 -20 -109 -88 -92 -163 -182 -312 -186 -308 -2 2 -19 60 -37 128 -19 68
-41 138 -49 155 -44 85 -170 52 -169 -44 1 -21 28 -139 60 -263 l60 -225 -58
-99 c-31 -55 -62 -102 -69 -104 -8 -3 -11 22 -11 80 0 102 -22 252 -55 378
-82 307 -242 579 -476 806 -148 143 -299 248 -475 330 -174 82 -568 234 -604
234 -86 0 -120 -117 -48 -164 13 -9 140 -63 283 -122 273 -111 378 -161 472
-221 132 -83 312 -253 416 -392 94 -125 192 -328 240 -498 48 -167 60 -277 54
-477 -6 -189 -20 -273 -71 -433 -99 -313 -293 -583 -563 -786 l-63 -47 -23 38
c-13 20 -51 85 -85 143 l-61 106 85 319 c47 175 128 478 180 673 65 244 93
363 89 383 -14 63 -100 89 -150 46 -28 -25 -33 -42 -241 -823 -46 -176 -88
-329 -93 -340 -6 -16 -14 -9 -48 50 -22 39 -104 180 -182 313 l-141 244 86
316 c130 481 164 612 164 639 0 38 -51 83 -94 83 -74 0 -77 -7 -185 -415 -54
-203 -102 -370 -107 -372 -6 -2 -16 8 -22 22 -6 13 -68 121 -137 240 -69 118
-125 218 -125 223 0 4 34 134 76 287 77 287 82 319 48 357 -38 41 -122 31
-147 -19 -8 -15 -36 -108 -62 -205 -26 -98 -51 -178 -54 -178 -3 0 -67 107
-142 238 -149 259 -170 283 -231 266 -40 -12 -71 -54 -70 -94 0 -21 46 -110
137 -267 74 -130 133 -238 131 -241 -3 -2 -81 16 -173 42 -92 25 -182 46 -200
48 -88 6 -135 -87 -75 -151 24 -27 56 -38 310 -104 156 -41 285 -76 286 -78
15 -17 276 -483 274 -488 -2 -4 -167 37 -368 91 -201 54 -375 98 -387 98 -12
0 -36 -12 -53 -26 -27 -24 -31 -32 -28 -72 2 -35 9 -49 30 -65 23 -17 444
-138 830 -237 l125 -32 95 -167 c53 -91 133 -230 178 -309 46 -78 81 -145 78
-147 -4 -4 -459 114 -920 239 -113 31 -222 56 -241 56 -43 0 -87 -46 -87 -89
0 -35 30 -75 67 -89 27 -11 1099 -301 1253 -340 l75 -18 83 -145 82 -144 -57
-27 c-252 -118 -591 -166 -871 -123 -692 105 -1219 629 -1333 1325 -7 41 -12
147 -12 235 0 144 7 207 67 615 37 250 104 712 150 1025 64 441 86 569 96 567
7 -2 156 -61 330 -133 173 -71 329 -129 346 -129 52 0 101 64 88 115 -3 13
-15 32 -27 43 -25 23 -805 342 -836 342 -11 0 -35 -12 -51 -28z"/>
<path d="M1485 4156 c-33 -33 -39 -66 -22 -109 31 -72 137 -70 167 2 37 90
-78 174 -145 107z"/>
<path d="M4186 3299 c-35 -41 -34 -83 3 -120 42 -42 99 -41 135 2 15 17 26 43
26 59 0 16 -11 42 -26 59 -21 26 -33 31 -69 31 -36 0 -48 -5 -69 -31z"/>
</g>
</svg>Vos Jardins</a></li>
            </ul>
            <a href="?logout=true"><button class="Btn">
            <?php        
        if (isset($_GET['logout'])) {
          session_destroy();
          header('Location: ../index.php');
          exit;
        }
          ?>
  <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
  <div class="text">Deconnexion</div>
</button></a>
        </div>
        <div class="main-content">
          <div class="bv-1">
        <h1>Bonjour, <?php echo $prénom; ?> <span>👋🏻</span></h1>
        <a href="./profil.php"><div class="profil">
        <?php
            foreach($pdp as $photo) {
              echo '<img class="profil-img" src="../images/uploads_pdp/'.$photo['img_compte'].'" alt="Photo de profil">';
            }
          ?>
          <?php echo $prénom; ?>
          </div>
        </div>
          </a>
        <div class="bv-p">
        <p>Bienvenue sur votre tableau de bord, içi vous avez la
        possibilité de voir les Jardins, ainsi que vos réservations !</p>
        </div>
        <div class="bv-2">
          <div class="bv-div1">
            <?php
    $idquetuveux = 1;
    echo '<a href="../jardin/jardin.php?id='.$idquetuveux.'"><h1>Jardin de partage des Sénardes</h1></a>';
?></div>
          <div class="bv-div2">
          <?php
    $idquetuveux = 2;
    echo '<a href="../jardin/jardin.php?id='.$idquetuveux.'"><h1>Jardin partagé des Viennes</h1></a>';
?>
          </div>
          <div class="bv-div3">
          <?php
    $idquetuveux = 3;
    echo '<a href="../jardin/jardin.php?id='.$idquetuveux.'"><h1>Jardin partagé du Parc des Moulins</h1></a>';
?>
          </div>
          <div class="bv-div4">
          <?php
    $idquetuveux = 4;
    echo '<a href="../jardin/jardin.php?id='.$idquetuveux.'"><h1>Jardin des Saisons</h1></a>';
?>
          </div>
          <div class="bv-div5">
          <?php
    $idquetuveux = 5;
    echo '<a href="../jardin/jardin.php?id='.$idquetuveux.'"><h1>Jardin Vert-Coeur</h1></a>';
?>
          </div>
          <div class="bv-div6">
          <?php
    $idquetuveux = 6;
    echo '<a href="../jardin/jardin.php?id='.$idquetuveux.'"><h1>Jardins de la Salpète </h1></a>';
?>
          </div>
          </div>
        </a>
        <div class="container-test">
          
            <div class="container-test-2">
            <img src="../images/promo.webp" alt="">
            <h1>Rejoignez-nous !</h1>
            <p>Venez vivre une aventure inoubliable et sans regret !</p>
            <button class="button-2">Lancez-vous !</button>

            </div>
            <?php 

try {
$db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req = $db->prepare("SELECT * FROM jardins");
$req->execute();

$jardins = $req->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
echo 'Erreur : ' . $e->getMessage();
}
?>

<div id="map" style="height:150px;position: relative;width:600px;margin-bottom:10px; border-radius:15px;">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>

<script>

const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
maxZoom: 19,
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
});

const CartoDB_Positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
subdomains: 'abcd',
maxZoom: 20
});

const Stadia_AlidadeSmoothDark = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.{ext}', {
minZoom: 0,
maxZoom: 20,
attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
ext: 'png'
});

const map = L.map('map', {
center: [48.299999, 4.08333],
zoom: 13,
layers: [CartoDB_Positron]
});

const baseLayers = {
'coloré': osmHOT,
'clair': CartoDB_Positron,
'nuit': Stadia_AlidadeSmoothDark
};
L.control.layers(baseLayers).addTo(map);

</script>
<?php
echo '<script>';

foreach ($jardins as $jardin) {
$image_url = '../images/markers/' . $jardin['marker'];

// Échappement des apostrophes dans les noms et adresses des jardins
$nom_jardin = addslashes($jardin['nom_jardins']);
$adresse_jardin = addslashes($jardin['adresse_jardins']);

// Génération du code JavaScript pour chaque jardin
echo "var image_nom = L.icon({
iconUrl: '$image_url',
iconSize: [30, 140],
iconAnchor: [22, 94],
popupAnchor: [-3, -76]
});
var polygon_" . $jardin['id_jardins'] . "= L.polygon([
[" . $jardin['p_point1'] . "],
[" . $jardin['p_point2'] . "],
[" . $jardin['p_point3'] . "],
[" . $jardin['p_point4'] . "]
], {
color: '#5e7f38'
}).addTo(map);";

echo "var marker" . $jardin['id_jardins'] . " = L.marker([" . $jardin['co_marker'] . "], {
icon: image_nom,
alt: '$nom_jardin'
}).addTo(map).bindPopup('$nom_jardin<br>$adresse_jardin');";
}

echo '</script>';
?>

        </div>
  </div>
  </div>
  </section>
          
