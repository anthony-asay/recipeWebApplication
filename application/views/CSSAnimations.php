<!-- <html>
<head>
  <title>Test</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/main.css">
</head> -->
<script>
    
    function getRandomColor() 
    {
      var letters = '0123456789ABCDEF'.split('');
      var color = '#';
      for (var i = 0; i < 6; i++ ) {
          color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }


    function showMe(id)
    {
      var display = document.getElementById(id).style.display;
      if(display == 'none')
      {
        document.getElementById(id).style.display = "inline-block";
      }
      else
      {
        document.getElementById(id).style.display = "none";
      }

    }

    function changeColor(id)
    {
      document.getElementById(id).style.background = getRandomColor();
      document.getElementById(id).style.color = getRandomColor();
    }

    function showMeClass(classI)
    {
      var display = document.getElementsByClassName(classI).style;
      console.log(display);
      if(display == 'none')
      {
       document.getElementsByClassName(classI).style.display = "inline-block";
       
      }
      else
      {
        document.getElementsByClassName(classI).style.display = "none";
      }
    }

    function blowUp(id)
    {
      var element = document.getElementById(id);
      element.className += "animated bounce";
      element.addEventListener('webkitAnimationEnd', function( event ) {
      var brother = element.nextElementSibling; 
      element.style.display = "none"; 
      console.log(brother);
      brother.className += "animated rotateIn";
      //view.innerHTML = html;
      }, false );
    }

    function fadeOut(id)
    {
      var element = document.getElementById(id);
      element.className += "animated fadeOut";
      element.addEventListener('webkitAnimationEnd', function( event ) {
      var brother = element.nextElementSibling; 
      element.style.display = "none"; 
      console.log(brother);
      brother.className += "animated fadeIn";
      //view.innerHTML = html;
      }, false );
    }
    </script>
<body>
    <div id="left">
      <ul>
<?php foreach ($items as $item): ?>
  <li id="item<?php echo $item->id;?>" class="">
      <div>
        <h3><?php echo $item->name_item; ?></h3>
        <div class="main">
                <?php echo $item->synopsis; ?>
        </div>
        <div id="butto<?php echo $item->id;?>" class="blowUp">Click Me</div>
        <div id="otto<?php echo $item->id;?>" class="fa">Click Me</div>
        <script type="text/javascript">
        document.getElementById("butto<?php echo $item->id;?>").addEventListener("click", function(){
            blowUp("item<?php echo $item->id;?>");
        });

         document.getElementById("otto<?php echo $item->id;?>").addEventListener("click", function(){
            fadeOut("item<?php echo $item->id;?>");
        });
        </script>
        
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
      </div>
      </li>
<?php endforeach; ?>
    </ul>
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

</body>
</html>