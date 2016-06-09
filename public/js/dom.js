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