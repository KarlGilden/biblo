<?php require 'Components/Header.php' ?>
<?php 

use App\Parsedown;

$lesson = $data["lesson"];
$iso = $data["iso"];

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
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
            Language
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="page">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button 
                class="nav-link active" 
                id="grammarguide-tab" 
                data-bs-toggle="tab" 
                data-bs-target="#grammarguide-tab-pane" 
                type="button" 
                role="tab" 
                aria-controls="grammarguide-tab-pane" 
                aria-selected="true"
            >
            Grammar Guide
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button 
                class="nav-link" 
                id="story-tab" 
                data-bs-toggle="tab" 
                data-bs-target="#story-tab-pane" 
                type="button" 
                role="tab" 
                aria-controls="story-tab-pane" 
                aria-selected="true"
            >
            Story
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active lesson-content-container" id="grammarguide-tab-pane" role="tabpanel" aria-labelledby="grammarguide-tab" tabindex="0">
            <?php 
            $Parsedown = new Parsedown();
            echo $Parsedown->text($lesson->grammarGuide);
            ?>
        </div>
        <div class="tab-pane fade lesson-content-container" id="story-tab-pane" role="tabpanel" aria-labelledby="story-tab" tabindex="0">
            <h3 class="story-title"><?= $lesson->title ?></h3>
            <div>

              <?php 
                $paragraphs = explode("\n\n", $lesson->story);
                $word_index = 0;

                for($i=0;$i<count($paragraphs);$i++){ ?>
                  <div class="paragraph" id=<?= "p" . $i ?> onMouseUp="handleSelectText()">

                    <?php 
                      $words = explode(" ", $paragraphs[$i]); 
                      for($j=0;$j<count($words);$j++){ ?>
                        <span class="word" id=<?= "w" . $word_index ?>><?= $words[$j] ?></span>
                    <?php $word_index++; } ?>

                  </div>
                <?php } ?>
                <div id="dictionary">
                    
                </div>
            </div>
        </div>
    </div>
</div>


<?php require 'Components/Footer.php' ?>
