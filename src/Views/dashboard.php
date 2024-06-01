<h1>Dashboard</h1>

<?php for($i=0;$i<count($data);$i++){ ?>
    <div>
        <h2><?php echo $data[$i]["title"] ?></h2>
        <p><?php echo $data[$i]["description"] ?></p>
        <p><?php echo $data[$i]["iso"] ?></p>
    </div>
<?php } ?>