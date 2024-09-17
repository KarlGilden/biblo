<?php 
  switch($iso){
    case "mi":
      $dropdown_text = "Māori";
      break;
    
    case "tl":
      $dropdown_text = "Tagalog";
      break;
    default:
    $dropdown_text = "Select a language";
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Custom CSS -->
    <link href="/resources/styles/index.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <title><?= $data["title"] ?></title>
  </head>
  <body>
    <div class="page-wrapper">

      <nav class="navbar <?php echo $data["nav_color"]; ?> ">
        <div class="nav-links">
            <a href="/" class="logo-link">
              <p>Biblo</p>
            </a>
            <p class="spacer-md"></p>
            <a href="/" class="nav-link">
              <p>Home</p>
            </a>
            <p class="spacer-sm"></p>
            <a href="/library/<?= $iso ?>" class="nav-link">
              <p>Library</p>
            </a>
            <p class="spacer-sm"></p>
            <a href="/learning-resources" class="nav-link">
              <p>Resources</p>
            </a>
        </div>
        
        <p class="spacer-sm"></p>

        <div class="dropdown">
            <?php echo $dropdown_text . " 🞃"; ?> 
            <ul class="dropdown-links">
                <a href="/library/mi" class="dropdown-link">
                  <div>Māori</div>
                </a>
                <a href="/library/tl" class="dropdown-link">
                  <div>Tagalog</div>
                </a>
                <a href="/library/af" class="dropdown-link">
                  <div>Afrikaans</div>
                </a>
            </ul>
          </div>

          <div class="burger-menu-container">
            <button class="burger-button" onclick="openBurgerMenu()"><i class="fa fa-bars" aria-hidden="true"></i></button>     
          </div>

          <div id="burger-menu" class="burger-menu menu-closed <?php echo $data["nav_color"]; ?>">
            <div class="navbar">
              <div class="logo">
                <a href="/" class="logo-link">
                  <p>Biblo</p>
                </a>
              </div>
              <button class="burger-button" onclick="openBurgerMenu()"><i class="fa fa-times" aria-hidden="true"></i></button>     
            </div>
            
            <div class="burger-body">
              <a href="/" class="nav-link" onclick="openBurgerMenu()">
                <p>Home</p>
              </a>
              <p class="spacer-sm"></p>
              <a href="/library" class="nav-link" onclick="openBurgerMenu()">
                <p>Library</p>
              </a>
              <p class="spacer-sm"></p>
              <a href="/learning-resources" class="nav-link" onclick="openBurgerMenu()">
                <p>Resources</p>
              </a>
            </div>
          </div>  
      </nav>
      