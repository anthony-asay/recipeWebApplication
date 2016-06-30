<script type="text/javascript" src="<?php echo base_url('public'); ?>/js/dom.js"></script>
<div id="left">
<?php foreach ($items as $item): ?>

        <h3><?php echo $item->name_item; ?></h3>
        <div class="main">
                <?php echo $item->synopsis; ?>
        </div>
        <h4>Rate it</h4>
          <div class="stars">
            <input class="star star-5" id="star5<?php echo $item->id;?>" type="radio" name="<?php echo $item->name_item;?>"/>
            <label class="star star-5" for="star5<?php echo $item->id;?>"></label>
            <input class="star star-4" id="star4<?php echo $item->id;?>" type="radio" name="<?php echo $item->name_item;?>"/>
            <label class="star star-4" for="star4<?php echo $item->id;?>"></label>
            <input class="star star-3" id="star3<?php echo $item->id;?>" type="radio" name="<?php echo $item->name_item;?>"/>
            <label class="star star-3" for="star3<?php echo $item->id;?>"></label>
            <input class="star star-2" id="star2<?php echo $item->id;?>" type="radio" name="<?php echo $item->name_item;?>"/>
            <label class="star star-2" for="star2<?php echo $item->id;?>"></label>
            <input class="star star-1" id="star1<?php echo $item->id;?>" type="radio" name="<?php echo $item->name_item;?>"/>
            <label class="star star-1" for="star1<?php echo $item->id;?>"></label>
        </div>
        <p><a href="<?php echo site_url('welcome/newView/'.$item->slug); ?> disabled">View article</a></p>

<?php endforeach; ?>
  </div>
  <div>
    <div id="right">
      <div class="now" id="one"><h1>1</h1>click me</div>
      <div class="hello" id="two"><h1>2</h1>click me</div>
      <div class="now" id="three"><h1>3</h1>click me</div>
      <div class="hello" id="four"><h1>4</h1>click me</div>
      <input type='button' value='Hide 1' onclick="showMe('one')">
      <input type='button' value='Hide 2' onclick="showMe('two')">
      <input type='button' value='Hide 3' onclick="showMe('three')">
      <input type='button' value='Hide 4' onclick="showMe('four')">
      <input type='button' value='color 1' onclick="changeColor('one')">
      <input type='button' value='color 2' onclick="changeColor('two')">
      <input type='button' value='color 3' onclick="changeColor('three')">
      <input type='button' value='color 4' onclick="changeColor('four')">
    </div>
  </div>
  <button class="btn" onclick="loadLoginForm()">Return to Login</button>
<div id="userStats"></div>