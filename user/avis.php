<?php
session_start();
$titre="Dépôt Avis";
$id_jardins=$_GET['id'];
$id=$_SESSION['id'];

if(!isset($_SESSION['id'])) {
    header('location: compte.php');
}
?>
<main>
<a href="tableFavori_gestion.php" class="gestion">Retour</a><br><br>
<style>
    a.gestion {
  display: inline-block;
  background-color: #3cb371; /* Medium sea green */
  color: #ffffff;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  font-size: 16px;
  transition: background-color 0.3s ease;
  margin-top: 20px;
}

a.gestion:hover {
  background-color: #2e8b57; /* Sea green on hover */
}
</style>
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <div class="box" id="avis">
        <form action="../traitement/valid_avis.php" method="post" enctype="multipart/form-data">
        <label>Déposer une note ici* :</label>
        <div class="stars-wrapper">
        <div class="stars">
        <i class="lar la-star" data-value="1"></i>
        <i class="lar la-star" data-value="2"></i>
        <i class="lar la-star" data-value="3"></i>
        <i class="lar la-star" data-value="4"></i>
        <i class="lar la-star" data-value="5"></i>
        <input type="hidden" name="note" id="note" value="0">
        <?php
        echo '<input type="hidden" name="id_jardins" value="' . $id_jardins . '">';
        ?>
        </div>
        </div>
        <label for="avis">Votre avis détaillé* :</label>
        <textarea id="avis" name="avis" rows="30" cols="55" placeholder="Écrivez votre commentaire ici..."></textarea>
        <div id="compte2">
        <label for="photo" class="custom-file-label">Vous pouvez déposer une photo ici</label></br>
        <input type="file" name="photo" id="photo">
        <label>Les champs obligatoires sont marqués d'un *</label>
        <?php
        echo '<input type="hidden" name="id_jardins" value="' . $id_jardins . '">';
        echo '<input type="hidden" name="id" value="' . $id . '">';
        ?>
        <button type="submit" id="valid_avis">Valider</button>
        <?php
        if (isset($_SESSION['avis'])) {
        echo '<p>'.$_SESSION['avis'].'</p>'."\n";
        unset($_SESSION['avis']);
        }
        ?>
        </div>
        </form>
        <style>
            /* Add some basic styling for the form */
#avis form {
  width: 50%;
  margin: 0 auto;
  font-family: Arial, sans-serif;
}

/* Style the label and input elements */
#avis label,
#avis input,
#avis textarea,
#avis button {
  display: block;
  width: 100%;
  margin-bottom: 10px;
}

/* Style the stars wrapper */
.stars-wrapper {
  display: flex;
  justify-content: center;
  margin-bottom: 10px;
}

/* Style the stars */
.stars i {
  font-size: 30px;
  color: #ccc;
  cursor: pointer;
}

/* Style the selected star */
.stars i.selected {
  color: #ffc107;
}

/* Style the textarea */
#avis textarea {
  resize: none;
  width: 100%;
  height: 250px;
  padding: 10px;
}

/* Style the button */
#valid_avis {
  background-color: #4caf50;
  color: white;
  padding: 10px;
  border: none;
  cursor: pointer;
}

/* Style the button on hover */
#valid_avis:hover {
  background-color: #45a049;
}

/* Style the error message */
#avis p {
  color: red;
  margin-top: 10px;
}
        </style>
        <title>Vos Avis | Potajou</title>
        <?php
        ?>
    </div>
</main>
<script>
    document.getElementById('photo').addEventListener('change', function() {
    var label = document.querySelector('.custom-file-label');
    var fileName = this.files[0].name;
    label.textContent = fileName;
});
</script>
<script>
    window.onload = () => {
    // On va chercher toutes les étoiles
    const stars = document.querySelectorAll(".la-star");
    
    // On va chercher l'input
    const note = document.querySelector("#note");

    // On boucle sur les étoiles pour le ajouter des écouteurs d'évènements
    for(star of stars){
        // On écoute le survol
        star.addEventListener("mouseover", function(){
            resetStars();
            this.style.color = "darkgoldenrod";
            this.classList.add("las");
            this.classList.remove("lar");
            // L'élément précédent dans le DOM (de même niveau, balise soeur)
            let previousStar = this.previousElementSibling;

            while(previousStar){
                // On passe l'étoile qui précède en jaune
                previousStar.style.color = "darkgoldenrod";
                previousStar.classList.add("las");
                previousStar.classList.remove("lar");
                // On récupère l'étoile qui la précède
                previousStar = previousStar.previousElementSibling;
            }
        });

        // On écoute le clic
        star.addEventListener("click", function(){
            note.value = this.dataset.value;
        });

        star.addEventListener("mouseout", function(){
            resetStars(note.value);
        });
    }

    /**
     * Reset des étoiles en vérifiant la note dans l'input caché
     * @param {number} note 
     */
    function resetStars(note = 0){
        for(star of stars){
            if(star.dataset.value > note){
                star.style.color = "black";
                star.classList.add("lar");
                star.classList.remove("las");
            }else{
                star.style.color = "darkgoldenrod";
                star.classList.add("las");
                star.classList.remove("lar");
            }
        }
    }
}
</script>
