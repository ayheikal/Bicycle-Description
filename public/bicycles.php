<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>
<?php
$parser=new ParseCSV(PRIVATE_PATH.'/used_bicycles.csv');
$bikes=$parser->getData();
?>
<div id="main">

  <div id="page">
    <div class="intro">
      <img class="inset" src="<?php echo url_for('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
      <h2>Our Inventory of Used Bicycles</h2>
      <p>Choose the bike you love.</p>
      <p>We will deliver it to your door and let you try it before you buy it.</p>
    </div>

    <table id="inventory">
      <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Year</th>
        <th>Category</th>
        <th>Gender</th>
        <th>Color</th>
        <th>Weight</th>
        <th>Condition</th>
        <th>Price</th>
      </tr>

        <?php foreach ($bikes as $args){
            $bike=new Bicycle($args);
        ?>
      <tr>
        <td><?php echo h($bike->getBrand());?></td>
        <td><?php echo $bike->getModel();?></td>
        <td><?php echo $bike->getYear();?></td>
        <td><?php echo $bike->getCategory();?></td>
        <td><?php echo $bike->getGender();?></td>
        <td><?php echo $bike->getColor();?></td>
        <td><?php echo $bike->get_weight_kg().'/ '.$bike->get_weight_lbs();?></td>
        <td><?php echo h($bike->get_bicycle_condition());?></td>
        <td><?php echo h($bike->getPrice().' $');?></td>
      </tr>
        <?php }?>

    </table>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
