
<html>
<head>
  <title>Test</title>
</head>
<body>
  <div>
    <div id="id01"></div>
    <script>
    var xmlhttp = new XMLHttpRequest();
    var url = "<?php echo base_url('public'); ?>/js/myJSONS.txt";
    var myArray;

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
        document.getElementById("id01").innerHTML = out;
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
      myFunction(myArray);
      var param = "array="+arrayText;
      xmlhttp.open("POST", "<?php echo site_url('welcome/addJson') ?>", true);
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
    </script>

  </div>
  <div>
      First Name:<input type="text" id="first" name="first" value=''>
      Last Name:<input type="text" id="last" name="last" value=''>
      <input type='button' value='Add Json' onclick="myOtherFunction()">
  </div>

</body>
</html>