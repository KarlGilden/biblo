<?php require 'Components/Header.php' ?>
<?php 
  $collections = $data["collections"];
  $lessons = $data["lessons"];
  $iso = $data["iso"];

  $titles = [];
  $titles["mi"] = "Kia Ora!";
  $titles["tl"] = "Kumusta!";

?>

<div class="page-wrapper">
  <nav class="navbar navbar-expand-lg bg-body-tertiary color-nav">
    <div class="container-fluid  ">
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
            <a class="nav-link active" aria-current="page" href=<?php echo "/library/" . $iso ?>>Library</a>
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
  </nav>

  <div class="page">
    <div class="page-header">
      <h1 class="page-title"><?php echo $titles[$iso] ?></h1>
    </div>

    <?php if(count($collections) == 0){ ?>
      <div class="lesson-library-container">
        <h2 class="lesson-container-title">Nothing to see here</h2>
      </div>
    <?php } ?>

    <?php for($i=0;$i<count($collections);$i++){ ?>

      <div class="lesson-library-container">
        <div class="lesson-container-header">
          <h2 class="lesson-container-title"><?php echo $collections[$i]->title ?></h2>
        </div>

        <div class="lesson-carousel">

          <?php if(count($lessons) == 0){ ?>
            <div class="lesson-card">
              <h3 class="lesson-card-title">Nothing to see here</h3>
            </div>
          <?php } ?>

          <?php for($j=0;$j<count($lessons);$j++){ 
            if($lessons[$j]->collectionId == $collections[$i]->id){ ?>
            <a class="lesson-card-link" href=<?php echo "/lesson/" . $lessons[$j]->iso . "/" . $lessons[$j]->id?>>
              <div class="lesson-card">
                <div class="lesson-card-hero"></div>
                <div class="lesson-card-footer">
                  <h3 class="lesson-card-title"><?php echo $lessons[$j]->title ?></h3>
                </div>
              </div>
            </a>

          <?php }} ?>
        </div>
        
      </div>

    <?php } ?>

  </div>
</div>



<?php require 'Components/Footer.php' ?>
