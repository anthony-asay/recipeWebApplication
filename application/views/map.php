<html>
<head>
  <title>Test</title>
  <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('public'); ?>/css/main.css">
</head>
<script>
    var xmlhttp = new XMLHttpRequest();
    var url = "<?php echo base_url('public'); ?>/js/myJSONs.txt";
    var myArray;
    var arraySt = [];

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var myArr = JSON.parse(xmlhttp.responseText);
            myArray = myArr;
            myFunction(myArr);
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();

    function myFunction(arr) {
        var out = "";
        var i;
        for(i = 0; i < arr.length; i++) {
            out += '<h1>' + arr[i].nameFirst + ' ' + 
            arr[i].nameLast + '</h1><input type="button" id="'+i+'" value="Delete JSON" onclick="deleteJson('+i+')"><br>';
        }
        document.getElementById("JSONLeft").innerHTML = out;
    }

    function displayStorage() {
        var arr = [];
        arr = JSON.parse(localStorage.getItem('session'));
        var out = "";
        var i;
        for(i = 0; i < arr.length; i++) {
            out += '<h1>' + arr[i].nameFirst + ' ' + 
            arr[i].nameLast + '</h1><input type="button" id="'+i+'" value="Delete JSON" onclick="deleteJsonStorage('+i+')"><br>';
        }
        document.getElementById("JSONRight").innerHTML = out;
    }

    function deleteJsonStorage(id)
    {
      var arrayElement = id;
      var arr = [];
      var arr = JSON.parse(localStorage.getItem('session'));
      arr.splice(arrayElement, 1);      
      localStorage.setItem('session', JSON.stringify(arr));
      displayStorage();
    }

    function deleteJson(id)
    {
      //get element number of object in the array
      var arrayElement = id;
      console.log(arrayElement);
      //remove object
      myArray.splice(arrayElement, 1);
      //save array to file
      var arrayText = JSON.stringify(myArray);
      console.log(myArray);
      myFunction(myArray);
      var param = "array="+arrayText;
      xmlhttp.open("POST", "<?php echo site_url('welcome/addJson') ?>", true);
      xmlhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
      xmlhttp.send(param);
      readJsonFile();
    }

    function readJsonFile()
    {
      var myArr = JSON.parse(xmlhttp.responseText);
      myArray = myArr;
      myFunction(myArr);
      xmlhttp.open("GET", url, true);
      xmlhttp.send();
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

    function showMeClass(classI)
    {
      var display = document.getElementsByClassName(classI).style.display;
      if(display == 'none')
      {
       document.getElementsByClassName(classI).style.display = "inline-block";
       
      }
      else
      {
        document.getElementsByClassName(classI).style.display = "none";
      }
    }

    function myOtherFunction() {
      var first = document.getElementById("first").value;
      var last = document.getElementById("last").value;
      document.getElementById("first").value = '';
      document.getElementById("last").value = '';
      var object = {'nameFirst': first, 'nameLast': last};
      myArray.push(object);
      var arrayText = JSON.stringify(myArray);
      console.log(object);
      console.log(myArray);
      console.log(arrayText);
      console.log(url);
      myFunction(myArray);
      var param = "array="+arrayText;
      xmlhttp.open("POST", "<?php echo site_url('welcome/addJson') ?>", true);
      //xmlhttp.open("POST", "<?php echo base_url('public'); ?>/addJson", true);
      xmlhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
      xmlhttp.send(param);
      // $.ajax({
      //       url: '<?php echo site_url("welcome/addJson") ?>',
      //       type: 'POST',
      //       dataType: 'json',
      //       data: {json: arrayText},
      //       success: function () {alert("Thanks!"); },
      //       failure: function() {alert("Error!");}
      //   });
    }

    function SaveToStorage()
    {
        var a = [];
        // Parse the serialized data back into an aray of objects
        a = JSON.parse(localStorage.getItem('session'));
        if(a == null)
        {
          a = myArray;
        }
        var first = document.getElementById("firstSt").value;
        var last = document.getElementById("lastSt").value;
        document.getElementById("firstSt").value = '';
        document.getElementById("lastSt").value = '';
        var data = {'nameFirst': first, 'nameLast': last};
        console.log(a);
        // Push the new data (whether it be an object or anything else) onto the array
        a.push(data);
        // Alert the array value
        alert(a);  // Should be something like [Object array]
        // Re-serialize the array back into a string and store it in localStorage
        localStorage.setItem('session', JSON.stringify(a));
    }
    </script>
<body>
    
    <div id="left">
      <h1>JSONs from text file</h1>
      <div id="JSONLeft"></div>
      First Name:<input type="text" id="first" name="first" value=''>
      Last Name:<input type="text" id="last" name="last" value=''>
      <input type='button' value='Add Json' onclick="myOtherFunction()">
  </div>

  <div id="right">
    <h1>JSONs from local storage</h1>
    <div id="JSONRight"></div>
      First Name:<input type="text" id="firstSt" name="firstSt" value=''>
      Last Name:<input type="text" id="lastSt" name="lastSt" value=''>
      <input type='button' value='Add Json to local storage' onclick="SaveToStorage()">
    <input type="button" value="Display JSONs from local storage" onclick="displayStorage()">
  </div>

  <div class="stars">
    <input class="star star-5" id="star-5" type="radio" name="star"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star"/>
    <label class="star star-1" for="star-1"></label>
</div>
<?php foreach ($items as $item): ?>

        <h3><?php echo $item['name_item']; ?></h3>
        <div class="main">
                <?php echo $item['synopsis']; ?>
        </div>
        <p><a href="<?php echo site_url('welcome/newView/'.$item['slug']); ?>">View article</a></p>

<?php endforeach; ?>

<div>
  <div class="now" id="one"><h1>1</h1></div>
  <div class="hello" id="two"><h1>2</h1></div>
  <div class="now" id="three"><h1>3</h1></div>
  <div class="hello" id="four"><h1>4</h1></div>
  <input type='button' value='Hide Class' onclick="showMeClass('hello')">
  <input type='button' value='Hide Class' onclick="showMeClass('now')">
  <input type='button' value='Hide 1' onclick="showMe('one')">
  <input type='button' value='Hide 2' onclick="showMe('two')">
  <input type='button' value='Hide 3' onclick="showMe('three')">
  <input type='button' value='Hide 4' onclick="showMe('four')">
</div>

</body>
</html>