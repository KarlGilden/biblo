<?php require 'Components/Header.php' ?>

<div class="page-wrapper">
  <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Biblo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href=<?php echo "/library/$iso" ?>>Library</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
              ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/library/mi">Māori</a></li>
              <li><a class="dropdown-item" href="/library/tl">Tagalog</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->

  <nav class="navbar">
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
      <a href="/library" class="nav-link">
        <li>Library</li>
      </a>
      <p class="spacer-sm"></p>
      <a href="/resources" class="nav-link">
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
      <div id="burger-menu" class="burger-menu menu-closed">
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
          <a href="/resources" class="nav-link" onclick="openBurgerMenu()">
            <li>Resources</li>
          </a>
        </div>
      </div>  
  </nav>

  <div class="page hero-section">
    <div class="hero-text">
      <h1 class="hero-title">Learn to read <span class="text-highlight">Te Reo Māori</span> through stories</h1>
      
      <p class="spacer-sm"></p>

      <p>Start reading immediately with our graded stories accompanied by easy to understand grammar explanations.</p>
      
      <p class="spacer-sm"></p>

      <div class="hero-buttons">
        <a href="/library/mi">
          <button class="hero-button btn-highlight">Start reading</button>
        </a>
        <p class="spacer-sm"></p>
        <button class="hero-button">Learn more</button>
      </div>

      <p class="spacer-sm"></p>

      <div>
        <p>Other languages: <a href="/library/af">Afrikaans</a>, <a href="/library/tl">Tagalog</a></p>
      </div>
    </div>
  </div>
</div>



<?php require 'Components/Footer.php' ?>
