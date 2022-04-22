<?php
echo '<form method="post" class="search-form-annuaire">
    <input type="text" name="search-query" placeholder="Votre recherche"'; if(isset($_POST['search-query'])){echo "value ='" . $_POST['search-query'] ."'";}
    echo '>
    <select name="section">
        <option aria-disabled="" value="">Toutes les sections</option>
        <option value="artisanat"';
        if($_POST['section'] == "artisanat"){echo "selected";}
        echo '>Artisanat</option>
        <option value="commerce"';
        if($_POST['section'] == "commerce"){echo "selected";}
        echo '>Commerce</option>
        <option value="industrie"';
        if($_POST['section'] == "industrie"){echo "selected";}
        echo '>Industrie / BTP</option>
        <option value="services"';
        if($_POST['section'] == "services"){echo "selected";}
        echo '>Services</option>
    </select>
    <input class="form-button" name="search-submit" type="submit" value="Rechercher">
</form>';
echo '<div class="flex-container_90">';
require_once(ABSPATH . 'wp-config.php');
$mysqli= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysqli_select_db($mysqli, DB_NAME);
$query = "SELECT * FROM `annuaire` INNER JOIN `entreprise` ON `annuaire`.id_adherent=`entreprise`.id WHERE `activite`!= 'null' ";
if (isset($_POST['section']) && $_POST['section'] != '') {
  $query .= " AND `section`='" . $_POST['section'] . "'";
} 
if (!empty($_POST['search-query'])) {
  $query .= " AND (`raison-sociale` LIKE '%" . $_POST['search-query'] . "%' OR `activite`  LIKE '%" . $_POST['search-query'] . "%')";
}
$result = $mysqli->query($query);
while ($row = $result->fetch_array()) {
  echo '<div class="entreprise-card">
                    <div class="entreprise-header">
                    <span class="entreprise-name">' . ucfirst(htmlentities($row['raison-sociale'], ENT_QUOTES, 'UTF-8')) . '</span>
                    </div>

                    <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/activite.png" alt="Activité">
            <p class="card-adherent_text"><span class="card-adherent_label">Activité : </span>' . ucfirst(htmlentities($row['activite'], ENT_QUOTES, 'UTF-8')) . '</p></div>
                            <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/adress.png" alt="Adresse">
            <p class="card-adherent_text"><span class="card-adherent_label">Adresse : </span>' . ucfirst(htmlentities($row['adresse'], ENT_QUOTES, 'UTF-8')) . '</p>
        </div>
        <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/section.png" alt="Section">
            <p class="card-adherent_text"><span class="card-adherent_label">Section : </span>' . ucfirst(htmlentities($row['section'], ENT_QUOTES, 'UTF-8')) . '</p>
        </div>
        <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/secteur.png" alt="Secteur">
            <p class="card-adherent_text"><span class="card-adherent_label">Secteur : </span>' . ucfirst(htmlentities($row['secteur'], ENT_QUOTES, 'UTF-8')) . '</p>
        </div>
        <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/website.png" alt="Site web">
            <p class="card-adherent_text"><span class="card-adherent_label">Site web : </span>' . ucfirst(htmlentities($row['site-web'], ENT_QUOTES, 'UTF-8')) . '</p>
        </div>
                    <span class="entreprise-title" onclick="showCoordonnees(' . $row['id'] . ')">Coordonnées</span>
                    <img id="dropArrow' . $row['id'] . '" class="entreprise-icon drop-icon" onclick="showCoordonnees(' . $row['id'] . ')" src="https://lavit-gaetan.com/wp-content/uploads/2021/12/chevron.png" alt="Voir plus">
                    <div id="dropCard' . $row['id'] . '" class="dropCard">
            <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/user-contact.png" alt="profil"><p class="card-adherent_text"><span class="card-adherent_label">Contact : </span>' . ucfirst(htmlentities($row['contact_nom'], ENT_QUOTES, 'UTF-8')) . ' ' . ucfirst(htmlentities($row['contact_prenom'], ENT_QUOTES, 'UTF-8')) . '</p></div>
            <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/contact.png" alt="contact"><p class="card-adherent_text"><span class="card-adherent_label">Coordonnées : </span>' . ucfirst(htmlentities($row['contact_email'], ENT_QUOTES, 'UTF-8')) . ' // ' . ucfirst(htmlentities($row['contact_telephone'], ENT_QUOTES, 'UTF-8')) . '</p></div>

                    </div>
                </div>';
}
$mysqli->close();
echo '</div>';
echo '<script>
function showCoordonnees(id){

//Récupération des variables
let dropArrow = "dropArrow" + id;
dropArrow = document.getElementById(dropArrow);

let dropCard = "dropCard" + id;
dropCard = document.getElementById(dropCard);

//Fermer le dropdown
if(dropArrow.style.transform == "rotateX(180deg)"){
    dropArrow.style.transform = "rotateX(0deg)";
    dropCard.style.display = "none";
}

//Ouvrir le dropdown
else{
    dropArrow.style.transform = "rotateX(180deg)";
    dropCard.style.display = "flex";
    dropCard.style.flexDirection = "column";    
    dropCard.style.alignItems = "center";
}
}</script>';