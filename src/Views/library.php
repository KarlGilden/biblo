<?php require 'Components/Header.php' ?>
<?php 
  $collections = $data["collections"];
  $lessons = $data["lessons"];
  $iso = $data["iso"];

  $titles = [];
  $titles["mi"] = "Haere mai!";
  $titles["tl"] = "Mabuhay!";
  $titles["af"] = "Welkom!";

?>
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
            <h3 class="lesson-card-title">Nothing to see here</h3>
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

<?php require 'Components/Footer.php' ?>
