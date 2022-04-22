  <?php
  echo '<form method="post" class="search-form-annuaire">
      <input type="text" name="search-query" placeholder="Votre recherche"';
  if (isset($_POST['search-query'])) {
      echo "value ='" . $_POST['search-query'] . "'";
  }
  echo '>
      <select name="categorie" id="annuaire-select">
          <option aria-disabled="" value="">Toutes les categories</option>
          <option value="artisanat"';
  if ($_POST['categorie'] == "artisanat") {
      echo "selected";
  }
  echo '>Artisanat</option>
          <option value="eni"';
  if ($_POST['categorie'] == "eni") {
      echo "selected";
  }
  echo '>Economie Numérique et Innovation</option>
          <option value="efj"';
  if ($_POST['categorie'] == "efj") {
      echo "selected";
  }
  echo '>Emploi, Formation et Jeunesse</option>
          <option value="ouverture-regionale"';
  if ($_POST['categorie'] == "ouverture-regionale") {
      echo "selected";
  }
  echo '>Ouverture Régionale</option>
          <option value="pe-at"';
  if ($_POST['categorie'] == "pe-at") {
      echo "selected";
  }
  echo '>Perspectives Economiques et Ancrage Territorial</option>
  <option value="social"';
  if ($_POST['categorie'] == "social") {
      echo "selected";
  }
  echo '>Social</option>
      </select>
      <input class="form-button" name="search-submit" type="submit" value="Rechercher">
  </form>';
  echo '<div class="flex-container_90">';
  require_once(ABSPATH . 'wp-config.php');
  $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
  mysqli_select_db($mysqli, DB_NAME);
  $query = "SELECT * FROM `mandat` WHERE `isActive`=1";
  if (isset($_POST['categorie']) && $_POST['categorie'] != '') {
      $query .= " AND `categorie`='" . $_POST['categorie'] . "'";
  }
  if (!empty($_POST['search-query'])) {
      $query .= " AND (`label` LIKE '%" . $_POST['search-query'] . "%' OR `nom`  LIKE '%" . $_POST['search-query'] . "%' OR `categorie`  LIKE '%" . $_POST['search-query'] . "%')";
  }
  $result = $mysqli->query($query);
  while ($row = $result->fetch_array()) {

      if ($row['categorie'] == 'artisanat') {
          $category = 'Artisanat';
      }

      if ($row['categorie'] == 'pe-at') {
          $category = 'Perspectives Economiques et Ancrage Territorial';
      }

      if ($row['categorie'] == 'eni') {
          $category = 'Economie Numérique et Innovation';
      }

      if ($row['categorie'] == 'efj') {
          $category = 'Emploi, Formation et Jeunesse';
      }

      if ($row['categorie'] == 'social') {
          $category = 'Social';
      }

      if ($row['categorie'] == 'ouverture-regionale') {
          $category = 'Ouverture Régionale';
      }
      echo '<div class="mandat-contact"></div>
  <div class="mandat-card">
    <div class="mandat-infoBtn" onclick="showMandatCoordonnees(' . $row['id'] . ')">
      <div class="tiptool-container">
        <p class="tiptool-mark">?</p>
      </div>
    </div>
    <div class="mandat-header">
      <h2 class="mandat-title">' . ucfirst(htmlentities($row['label'], ENT_QUOTES, 'UTF-8')) . '</h2>
    </div>
    <div class="mandat-row">
      <p><span class="bold">Nom : </span>' . ucfirst(htmlentities($row['nom'], ENT_QUOTES, 'UTF-8')) . '</p>

    </div>
    <div class="mandat-row">
      <p><span class="bold">Catégorie : </span>' . ucfirst(htmlentities($category, ENT_QUOTES, 'UTF-8')) . '</p>

    </div>
    <div class="mandat-hidden" id="mandat-hidden' . $row['id'] . '">
      <div class="mandat-subrow">
        <p><span class="bold">Mission : </span>' . ucfirst(htmlentities($row['mission'], ENT_QUOTES, 'UTF-8')) . '</p>
      </div>
      <div class="mandat-subrow">
        <p><span class="bold">Composition : </span>' . ucfirst(htmlentities($row['composition'], ENT_QUOTES, 'UTF-8')) . '</p>
      </div>

      <div class="mandat-subrow">
        <p><span class="bold">Nombre de mandataires CPME au sein de l\'instance : </span>' . ucfirst(htmlentities($row['nombre_mandataires'], ENT_QUOTES, 'UTF-8')) . '</p>
      </div>

      <div class="mandat-subrow">
        <p><span class="bold">Nos mandataires : </span>' . ucfirst(htmlentities($row['noms_mandataires'], ENT_QUOTES, 'UTF-8')) . '</p>
      </div>

      <div class="mandat-subrow">
        <p><span class="bold">Durée du mandat : </span>' . ucfirst(htmlentities($row['duree'], ENT_QUOTES, 'UTF-8')) . '</p>
      </div>

      <div class="mandat-subrow">
        <p><span class="bold">Date de renouvellement : </span>' . ucfirst(htmlentities($row['renouvellement'], ENT_QUOTES, 'UTF-8')) . '</p>

      </div>
    </div>
    <button onclick="showMandat(' . $row['id'] . ')" class="mandat-button" id="mandat-btn' . $row['id'] . '">Voir Plus</button>
  </div>';
  }
  $mysqli->close();







  <?php
  echo '<form method="post" class="search-form-annuaire">
      <input type="text" name="search-query" placeholder="Votre recherche"';
  if (isset($_POST['search-query'])) {
      echo "value ='" . $_POST['search-query'] . "'";
  }
  echo '>
      <select name="categorie" id="annuaire-select">
          <option aria-disabled="" value="">Toutes les categories</option>
          <option value="artisanat"';
  if ($_POST['categorie'] == "artisanat") {
      echo "selected";
  }
  echo '>Artisanat</option>
          <option value="eni"';
  if ($_POST['categorie'] == "eni") {
      echo "selected";
  }
  echo '>Economie Numérique et Innovation</option>
          <option value="efj"';
  if ($_POST['categorie'] == "efj") {
      echo "selected";
  }
  echo '>Emploi, Formation et Jeunesse</option>
          <option value="ouverture-regionale"';
  if ($_POST['categorie'] == "ouverture-regionale") {
      echo "selected";
  }
  echo '>Ouverture Régionale</option>
          <option value="pe-at"';
  if ($_POST['categorie'] == "pe-at") {
      echo "selected";
  }
  echo '>Perspectives Economiques et Ancrage Territorial</option>
  <option value="social"';
  if ($_POST['categorie'] == "social") {
      echo "selected";
  }
  echo '>Social</option>
      </select>
      <input class="form-button" name="search-submit" type="submit" value="Rechercher">
  </form>';
echo '<div class="flex-container_90">';
require_once(ABSPATH . 'wp-config.php');
$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysqli_select_db($mysqli, DB_NAME);
$query = "SELECT * FROM `mandat` WHERE `isActive`=1";
if (isset($_POST['categorie']) && $_POST['categorie'] != '') {
    $query .= " AND `categorie`='" . $_POST['categorie'] . "'";
}
if (!empty($_POST['search-query'])) {
    $query .= " AND (`label` LIKE '%" . $_POST['search-query'] . "%' OR `nom`  LIKE '%" . $_POST['search-query'] . "%' OR `categorie`  LIKE '%" . $_POST['search-query'] . "%')";
}
  $result = $mysqli->query($query);
while ($row = $result->fetch_array()) {
  if ($row['categorie'] == 'artisanat') {
    $category = 'Artisanat';
}

if ($row['categorie'] == 'pe-at') {
    $category = 'Perspectives Economiques et Ancrage Territorial';
}

if ($row['categorie'] == 'eni') {
    $category = 'Economie Numérique et Innovation';
}

if ($row['categorie'] == 'efj') {
    $category = 'Emploi, Formation et Jeunesse';
}

if ($row['categorie'] == 'social') {
    $category = 'Social';
}

if ($row['categorie'] == 'ouverture-regionale') {
    $category = 'Ouverture Régionale';
}
  echo '<div class="entreprise-card">
                    <div class="entreprise-header">
                    <span class="entreprise-name">' . ucfirst(htmlentities($row['label'], ENT_QUOTES, 'UTF-8')) . '</span>
                    </div>

                    <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/bank-3.png"" alt="Nom">
            <p class="card-adherent_text"><span class="card-adherent_label">Nom : </span>' . ucfirst(htmlentities($row['nom'], ENT_QUOTES, 'UTF-8')) . '</p></div>
                            <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/category.png" alt="catégorie">
            <p class="card-adherent_text"><span class="card-adherent_label">Catégorie : </span>' . ucfirst(htmlentities($category, ENT_QUOTES, 'UTF-8')) . '</p>
        </div>
        <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/time.png" alt="durée">
            <p class="card-adherent_text"><span class="card-adherent_label">Durée : </span>' . ucfirst(htmlentities($row['duree'], ENT_QUOTES, 'UTF-8')) . '</p>
        </div>
        <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/renouvellement.png" alt="renouvellement">
            <p class="card-adherent_text"><span class="card-adherent_label">Renouvellement : </span>' . ucfirst(htmlentities($row['renouvellement'], ENT_QUOTES, 'UTF-8')) . '</p>
        </div>
        <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/nombre.png" alt="nombre">
            <p class="card-adherent_text"><span class="card-adherent_label">Nombre de mandataires : </span>' . ucfirst(htmlentities($row['nombre_mandataires'], ENT_QUOTES, 'UTF-8')) . '</p>
        </div>


                    <div id="dropCard' . $row['id'] . '" class="dropCard">
            <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/user-contact.png" alt="profil"><p class="card-adherent_text"><span class="card-adherent_label">Mission : </span>' . ucfirst(htmlentities($row['mission'], ENT_QUOTES, 'UTF-8')) . '</p></div>
            <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/contact.png" alt="contact"><p class="card-adherent_text"><span class="card-adherent_label">Composition : </span>' . ucfirst(htmlentities($row['composition'], ENT_QUOTES, 'UTF-8')) . '</p></div>
            <div class="card-adherent_row"><img class="card-adherent_icon" src="/wp-content/uploads/2022/04/contact.png" alt="contact"><p class="card-adherent_text"><span class="card-adherent_label">Nos mandatires : </span>' . ucfirst(htmlentities($row['noms_mandataires'], ENT_QUOTES, 'UTF-8')) . '</p></div>

                    </div>
                    <img id="dropArrow' . $row['id'] . '" class="entreprise-icon drop-icon" onclick="showCoordonnees(' . $row['id'] . ')" src="/wp-content/uploads/2022/04/down-chevron-1.png" alt="Voir plus">
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

//Ouvrir le dropdown"
else{
    dropArrow.style.transform = "rotateX(180deg)";
    dropCard.style.display = "flex";
    dropCard.style.flexDirection = "column";    
    dropCard.style.alignItems = "center";
}
}</script>';