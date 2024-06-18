
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connectez-vous ! | Potajou</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../style2.css">
  <link rel="stylesheet" href="../style3.css">
  <link rel="stylesheet" href="../tb.css">
  <link rel="stylesheet" href="../style4.css">
</head>
<body>
<header>
<div class="loader" id="loader"><img src="../images/chargement.gif" alt=""></div>
      <nav>
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
          </a>
        <div class="dyna-01">
          <span class="burger">
            <label class="burger" for="burger">
              <input type="checkbox" id="burger" />
              <span class="span-01"></span>
              <span class="span-02"></span>
            </label>
          </span>
        </div>
        <button class="cta">
        <a href="inscription.php"><span class="hover-underline-animation"> S'inscrire ?</span></a>
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
      <div class="hamburger">
        <div class="parent">
          <div class="div1">
            <a href="../index.php">Retour à l'accueil</a>
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
            <a href="formulaire.php">Connexion</a>
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
            <a href="inscription.php">Inscription</a>
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
    <div class="fraise">
    <svg width="83" height="86" viewBox="0 0 133 216" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_205_11)">
<path d="M34.67 76.37C29.51 81.02 21.94 88.96 15.94 100.71C13.11 106.25 8.71 115.08 7.64 127.29C5.79 148.41 15.25 164.29 18.63 169.79C24.97 180.11 32.57 186.87 37.92 190.87C40.81 193.41 45.21 197.53 50.03 203.21C54.55 208.53 55.27 210.32 58.33 212.29C64.98 216.58 72.82 215.4 77.84 214.65C81.3 214.13 92.14 212.5 99.48 203.88C102.12 200.79 103.14 198.16 104.75 194.46C111.97 177.88 114.06 178.77 121.91 161.71C128.38 147.66 131.61 140.64 132.34 134.12C134.31 116.42 126.26 102.28 123.82 98.12C110.15 74.85 85.84 68.51 80.64 67.28C75.03 66.17 64.98 64.99 53.16 68.07C44.99 70.2 38.76 73.64 34.66 76.37H34.67Z" fill="#D13D56"/>
<path d="M15.04 43.96C7.61999 37.2 -0.330014 36.55 0.0099864 34.76C0.339986 33.04 7.92999 32.38 14.48 33.64C19.07 34.52 30.67 37.81 41.51 53.83C40.57 51.2 39.74 48.12 39.27 44.63C37.68 32.9 41.07 23.25 43.42 18.05C44.52 15.54 46.39 12.11 49.59 8.85C56.94 1.37 67.15 -0.95 67.86 0.33C68.44 1.37 62.27 3.9 58.66 11.21C56.57 15.45 56.15 19.63 56.19 22.76C55.95 24.61 55.79 27.89 57.09 31.62C59.17 37.6 57.12 49.52 58.66 50.5C57.85 48.7 63.24 36.73 63.48 32.74C63.96 24.7 69.55 19.75 70.77 18.72C70.51 22.98 70.54 28.2 71.33 34.08C72.03 39.29 77.31 44.81 78.5 48.54C80.91 48.79 80.58 47.8 83.89 45.63C90.78 41.11 90.23 30.53 91.85 30.6C93.34 30.67 96.01 39.68 93.31 48.54C90.02 59.34 80.33 64.84 76.77 66.63C71.26 65.89 61.97 65.4 51.24 68.58C43.95 70.74 38.32 73.91 34.46 76.52C33.27 74.36 30.68 69.69 27.36 63.67C19.22 48.89 18.1 46.74 15.02 43.93L15.04 43.96Z" fill="#5E7F38"/>
<path d="M35.23 92.86C34.71 92.92 34.28 95.85 35.15 98.47C35.74 100.25 37.04 102.23 37.48 102.06C38.35 101.71 36.17 92.76 35.24 92.86H35.23Z" fill="#F2B445"/>
<path d="M60.8 92.08C60.49 92.63 58.49 96.4 60.21 99.9C60.3 100.08 61.16 101.81 61.64 101.67C62.38 101.45 61.71 96.9 60.8 92.08Z" fill="#F2B445"/>
<path d="M82.6 147.54C82.08 147.6 81.65 150.53 82.52 153.15C83.11 154.93 84.41 156.91 84.85 156.74C85.72 156.39 83.54 147.44 82.61 147.54H82.6Z" fill="#F2B445"/>
<path d="M35.76 112.82C35.24 112.88 34.81 115.81 35.68 118.43C36.27 120.21 37.57 122.19 38.01 122.02C38.88 121.67 36.7 112.72 35.77 112.82H35.76Z" fill="#F2B445"/>
<path d="M108.17 146.75C107.86 147.3 105.86 151.07 107.58 154.57C107.67 154.75 108.53 156.48 109.01 156.34C109.75 156.12 109.08 151.57 108.17 146.75Z" fill="#F2B445"/>
<path d="M42.63 132.45C42.2 132.45 41.52 136.72 42.88 140.86C43.11 141.55 43.45 142.58 43.64 142.54C44.22 142.43 43.28 132.43 42.63 132.45Z" fill="#F2B445"/>
<path d="M18.15 124.8C17.57 125.91 16.64 128.07 16.72 130.86C16.76 132.22 17.03 133.36 17.31 134.22C17.59 131.08 17.87 127.94 18.15 124.8Z" fill="#F2B445"/>
<path d="M125.23 114.96C125.5 114.88 126.79 117.55 127.25 120.51C127.5 122.13 127.45 123.53 127.33 124.55C125.3 116.95 125.01 115.03 125.23 114.96Z" fill="#F2B445"/>
<path d="M96.46 139.43C96.26 139.81 95.03 142.2 96.12 144.48C96.17 144.58 96.74 145.75 97.05 145.66C97.5 145.53 97.1 142.72 96.46 139.44V139.43Z" fill="#F2B445"/>
<path d="M110.11 128.49C109.91 128.87 108.68 131.26 109.77 133.54C109.82 133.64 110.39 134.81 110.7 134.72C111.15 134.59 110.75 131.78 110.11 128.5V128.49Z" fill="#F2B445"/>
<path d="M75.09 120.76C74.61 120.76 73.72 122.87 74.67 124.46C75.23 125.39 76.16 125.72 76.44 125.81C75.85 121.62 75.4 120.76 75.09 120.76Z" fill="#F2B445"/>
<path d="M100.84 160.71C101.11 160.63 102.4 163.3 102.86 166.26C103.11 167.88 103.06 169.28 102.94 170.3C100.91 162.7 100.62 160.78 100.84 160.71Z" fill="#F2B445"/>
<path d="M50.71 166.52C50.23 166.52 49.34 168.63 50.29 170.22C50.85 171.15 51.78 171.48 52.06 171.57C51.47 167.38 51.02 166.52 50.71 166.52Z" fill="#F2B445"/>
<path d="M53.14 129.26C52.67 129.3 51.9 132.04 53.31 133.72C53.82 134.33 54.45 134.6 54.82 134.73C53.92 130.18 53.42 129.24 53.14 129.26Z" fill="#F2B445"/>
<path d="M95.52 109.66C95.09 109.66 94.41 113.93 95.77 118.07C96 118.76 96.34 119.79 96.53 119.75C97.11 119.64 96.17 109.64 95.52 109.66Z" fill="#F2B445"/>
<path d="M106.03 106.46C105.56 106.5 104.79 109.24 106.2 110.92C106.71 111.53 107.34 111.8 107.71 111.93C106.81 107.38 106.31 106.44 106.03 106.46Z" fill="#F2B445"/>
<path d="M96.12 95.78C96.52 95.58 98.27 97.3 98.4 99.51C98.47 100.73 98.03 101.66 97.8 102.08C96.04 97.39 95.8 95.93 96.12 95.77V95.78Z" fill="#F2B445"/>
<path d="M76.36 86.02C75.74 86.03 75.34 89.62 75.18 91.23C74.88 90.71 75.69 92.54 76.27 92.66C76.55 92.72 77.01 92.55 77.78 91.4C77.56 89.83 76.99 86 76.35 86.02H76.36Z" fill="#F2B445"/>
<path d="M34.33 155.54C34.02 156.09 32.02 159.86 33.74 163.36C33.83 163.54 34.69 165.27 35.17 165.13C35.91 164.91 35.24 160.36 34.33 155.54Z" fill="#F2B445"/>
<path d="M69.66 159.24C70.06 159.04 71.81 160.76 71.94 162.97C72.01 164.19 71.57 165.12 71.34 165.54C69.58 160.85 69.34 159.39 69.66 159.23V159.24Z" fill="#F2B445"/>
<path d="M50.04 111.14C50.31 111.06 51.6 113.73 52.06 116.69C52.31 118.31 52.26 119.71 52.14 120.73C50.11 113.13 49.82 111.21 50.04 111.14Z" fill="#F2B445"/>
<path d="M18.86 109.67C19.26 109.47 21.01 111.19 21.14 113.4C21.21 114.62 20.77 115.55 20.54 115.97C18.78 111.28 18.54 109.82 18.86 109.66V109.67Z" fill="#F2B445"/>
<path d="M49.89 149.49C49.27 149.5 48.87 153.09 48.71 154.7C48.41 154.18 49.22 156.01 49.8 156.13C50.08 156.19 50.54 156.02 51.31 154.87C51.09 153.3 50.52 149.47 49.88 149.49H49.89Z" fill="#F2B445"/>
</g>
<defs>
<clipPath id="clip0_205_11">
<rect width="132.66" height="215.39" fill="white"/>
</clipPath>
</defs>
</svg>
</div>
            <div class="abricot">
            <svg width="83" height="86" viewBox="0 0 187 200" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_203_2)">
<path d="M116.97 153.87C132 122.09 126.85 92.57 111.36 83.22C99.08 75.8 82.91 82.65 80.52 83.67C58.61 92.95 48.22 119.45 49.57 141.31C51.05 165.37 67.1 189.44 92.19 197.38C124.45 207.59 150.96 184.61 155.89 180.33C160.93 175.96 170.54 167.4 174.96 152.52C178.93 139.12 176.62 127.58 175.18 122.24C174.55 118.47 173.08 112.52 169.29 106.15C165.78 100.26 161.67 96.32 158.8 93.98C155.68 90.73 148.79 84.47 138.16 81.87C133.61 80.75 123.85 78.36 120.89 82.43C116.93 87.87 130.48 97.46 131.36 116.97C131.74 125.3 129.65 132.06 128.63 135.26C125.08 146.42 118.1 156.42 116.97 155.9C116.79 155.82 116.65 155.42 116.97 153.88V153.87Z" fill="#F2B445"/>
<path d="M100.04 34.54C100.79 35.56 101.85 37.15 102.8 39.24C103.67 41.13 106.09 47 105.21 54.16C104.88 56.82 104.33 57.8 103.79 62.47C103.56 64.49 103.45 66.17 103.4 67.3C106.04 67.07 109.26 66.56 112.81 65.45C115.12 64.73 117.15 63.88 118.88 63.04C120.82 59.83 122.77 56.61 124.71 53.4C126.32 50.87 128.72 47.64 132.17 44.43C135.57 41.26 138.92 39.12 141.53 37.7C146.74 35.52 152.67 33.39 159.28 31.56C169.27 28.79 178.4 27.39 186.17 26.71C186.16 30.14 185.67 38.36 180.31 46.78C175.58 54.21 169.45 58.05 166.43 59.68C159.12 62.72 152.95 63.88 148.6 64.36C136.66 65.69 132.36 62.66 123.53 66.29C120.66 67.47 118.17 69.01 113.18 70.24C108.98 71.28 105.37 71.52 102.95 71.56C102.65 72.5 102.33 73.87 102.33 75.54C102.33 77.59 102.82 79.22 103.21 80.24C102.47 80.12 101.69 80.02 100.85 79.95C99.96 79.87 99.11 79.83 98.32 79.81C98.26 76.29 98.29 72.58 98.47 68.69C98.61 65.58 98.83 62.59 99.1 59.73C99.1 59.73 98.15 57.14 95.33 55.19C88.55 50.49 77.21 58.84 62.58 60.35C49.53 61.7 47.75 55.67 28.49 53.62C16.34 52.33 6.29 53.59 0 54.74C0.72 52.95 1.96 50.33 4.04 47.56C17.61 29.44 49.76 28.1 72.23 36.35C78.66 38.71 89.87 43.9 100.87 55.7C101.23 53.12 101.5 48.45 99.57 43.21C98.6 40.6 97.34 38.54 96.23 37.03C97.5 36.21 98.77 35.39 100.04 34.56V34.54Z" fill="#2A67B0"/>
<path d="M57.42 2.07517e-05C57.55 3.33002 58.3 10.23 63.03 16.82C72.33 29.79 88.63 29.85 90.39 29.83C89.65 28.32 88.53 25.98 87.25 23.1C84.76 17.51 83.4 13.77 82.99 12.78C81.27 8.68002 75.54 3.64002 57.42 -0.00997925V2.07517e-05Z" fill="#2A67B0"/>
</g>
<defs>
<clipPath id="clip0_203_2">
<rect width="186.17" height="199.97" fill="white"/>
</clipPath>
</defs>
</svg>
            </div>
    <div class="form-container-2">
    <svg width="30" height="49" viewBox="0 0 30 49" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_319_510)">
<path d="M29.2913 4.70201C28.2494 1.76325 25.2728 0 22.2961 0C18.8729 0 15.8963 2.351 15.0033 5.73057C14.1103 2.351 10.9847 0 7.56158 0C4.58491 0 1.60822 1.76325 0.56639 4.70201C-0.773111 8.22851 1.31058 11.3142 1.60824 11.6081C6.07325 16.0162 10.5382 20.4243 15.0033 24.6855C19.4683 20.2774 23.9333 15.8693 28.3983 11.6081C28.5471 11.3142 30.6308 8.22851 29.2913 4.70201Z" fill="#5E7F38"/>
<path d="M29.2912 28.359C28.2494 25.4202 25.2727 23.657 22.2961 23.657H7.56157C4.73373 23.657 1.60821 25.4202 0.566379 28.359C-0.624288 31.8855 1.60822 34.9712 1.75705 35.1181C6.07322 39.5263 10.5382 43.9344 14.8544 48.3425C19.3194 43.9344 23.6356 39.5263 28.1006 35.1181C28.3982 34.9712 30.6307 31.8855 29.2912 28.359Z" fill="#FF811A"/>
</g>
<defs>
<clipPath id="clip0_319_510">
<rect width="30" height="49" fill="white"/>
</clipPath>
</defs>
</svg>
      <h1>Bienvenue !</h1>
    <p class="title">Connectez-vous sur votre compte Potajou</p>
    <?php
        if (isset($_SESSION['connexion'])) {
        echo '<p>'.$_SESSION['connexion'].'</p>'."\n";
        unset($_SESSION['connexion']);
        }
        ?>
    <form class="form" action="../traitement/valid_compte.php" method="POST">
        <input type="email" id="mail" class="input-03" name="mail" placeholder="E-Mail">
        <input type="password" id="mdp" name="mdp" class="input-03" placeholder="Mot De Passe">
        <p class="page-link">
            <a href="inscription.php"><span class="page-link-label">Pas de compte? S'inscrire içi</span></a>
        </p>
        <button type="submit" class="form-btn">Se connecter</button>
    </form>
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