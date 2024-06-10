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
    
    <title><?= $data["title"] ?></title>
  </head>
  <body>
    <div class="page-wrapper">

      <nav class="navbar <?php echo $data["nav_color"]; ?> ">
        <div class="logo">
          <a href="/" class="logo-link">
            <li>Biblo</li>
          </a>
        </div>
        <p class="spacer-md"></p>
        <ul class="nav-links">
          <a href="/" class="nav-link">
            <li>Home</li>
          </a>
          <p class="spacer-sm"></p>
          <a href="/library/<?= $iso ?>" class="nav-link">
            <li>Library</li>
          </a>
          <p class="spacer-sm"></p>
          <a href="/learning-resources" class="nav-link">
            <li>Resources</li>
          </a>
        </ul>
        <p class="spacer-sm"></p>
        <div class=" dropdown">
              <?php 
                    switch($iso){
                      case "mi":
                        echo "Māori";
                        break;
                      
                      case "tl":
                        echo "Tagalog";
                        break;
                      default:
                        echo "Select a language";
                    }
              ?> 🞃
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
            <button class="burger-button" onclick="openBurgerMenu()">☰</button>     
          </div>
          <div id="burger-menu" class="burger-menu menu-closed <?php echo $data["nav_color"]; ?>">
            <div class="navbar">
              <div class="logo">
                <a href="/" class="logo-link">
                  <li>Biblo</li>
                </a>
              </div>
              <button class="burger-button" onclick="openBurgerMenu()">☰</button>     
            </div>
            <div class="burger-body">
              <a href="/" class="nav-link" onclick="openBurgerMenu()">
                <li>Home</li>
              </a>
              <p class="spacer-sm"></p>
              <a href="/library" class="nav-link" onclick="openBurgerMenu()">
                <li>Library</li>
              </a>
              <p class="spacer-sm"></p>
              <a href="/learning-resources" class="nav-link" onclick="openBurgerMenu()">
                <li>Resources</li>
              </a>
            </div>
          </div>  
      </nav>
      