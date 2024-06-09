<?php require 'Components/Header.php' ?>
<?php 

use App\Parsedown;

$lesson = $data["lesson"];
$iso = $data["iso"];

?>

<div class="page">
  <div class="lesson-container">
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
    <div class="tab-content lesson-content-container" id="myTabContent">

      <div class="tab-pane fade show active lesson-content" id="grammarguide-tab-pane" role="tabpanel" aria-labelledby="grammarguide-tab" tabindex="0">
          <?php 
          $Parsedown = new Parsedown();
          echo $Parsedown->text($lesson->grammarGuide);
          ?>
          <br>
          <button 
              class="btn btn-primary"
              type="button"
              onClick="triggerButtonPressById('story-tab')"
            >To the story</button>
      </div>

      <div class="tab-pane fade lesson-content" id="story-tab-pane" role="tabpanel" aria-labelledby="story-tab" tabindex="0">
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

          <div id="dictionary" class="dictionary">
            <p id="dictionary-original">Select a word to start</p>
            <input id="dictionary-input" type="text">
          </div>

        </div>
          
      </div>
    </div>
  </div>
</div>

<?php require 'Components/Footer.php' ?>
