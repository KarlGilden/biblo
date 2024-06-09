<?php require 'Components/Header.php' ?>
<?php 

use App\Parsedown;

$lesson = $data["lesson"];
$iso = $data["iso"];

?>

<div class="page">
  <div class="lesson-container">
    <ul class="" id="lesson-tabs">
          <button 
              class="tab-button active" 
              id="grammarguide-tab-btn" 
              data-to="grammarguide-tab"
              onclick="handleTabChange(this)"
          >
          Grammar Guide
          </button>
          <button 
              class="tab-button" 
              id="story-tab-btn" 
              data-to="story-tab"
              onclick="handleTabChange(this)"
          >
          Story
          </button>
    </ul>
    <div class="lesson-content-container" id="lesson-tab-content">

      <div class="lesson-content active" id="grammarguide-tab">
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

      <div class="lesson-content" id="story-tab">
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
