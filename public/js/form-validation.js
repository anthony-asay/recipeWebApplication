function VerifyName(id, id2)
{
    var inputText = document.getElementById(id);
    var message = document.getElementById(id2);
    if(inputText.value.length < 3)
    {
        var message = document.getElementById(id2);
        message.innerHTML = "Item must be at least 3 characters long.";
        message.style.display = "block";
        inputText.style.borderColor = "red";
    }
    else
    {
        var message = document.getElementById(id2);
        message.innerHTML = "";
        message.style.display = "none";
        inputText.style.borderColor = "green";
        nameValue = inputText.value;
        enableRegister();
    }
}

function VerifyIngredient(input, message, type)
{
    var inputEl = document.getElementById(input);
    if (inputEl.value.length >= 3)
    {
        var messageEl = document.getElementById(message);
        var typeEl = document.getElementById(type);
        var ingredient = {id_type: typeEl.value, name: inputEl.value};
        var ingredientJSON = JSON.stringify(ingredient);
        var param = "ingredient="+ingredientJSON;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() 
        {
            if (xhttp.readyState == 4 && xhttp.status == 200) 
            {
                var text = xhttp.responseText;
                if(text === "exists")
                {
                    inputEl.style.borderColor = "red";
                    messageEl.innerHTML = "Ingredient already exists.";
                    messageEl.style.display = "block";
                }
                else
                {
                    inputEl.style.borderColor = "green";
                    messageEl.style.display = "none";
                    enableItem("buttonAdd");
                }
            }
        };
        xhttp.open("POST", "index.php/recipe/VerifyIngredient", true);
        xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhttp.send(param);
    }
}

function enableItem(id)
{
    document.getElementById(id).disabled = false;
}

function addIngredient(input, message, type)
{
    var inputEl = document.getElementById(input);
    if (inputEl.value.length >= 3)
    {
        var messageEl = document.getElementById(message);
        var typeEl = document.getElementById(type);
        var ingredient = {id_type: typeEl.value, name: inputEl.value};
        var ingredientJSON = JSON.stringify(ingredient);
        var param = "ingredient="+ingredientJSON;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() 
        {
            if (xhttp.readyState == 4 && xhttp.status == 200) 
            {
                var text = xhttp.responseText;
                if(text)
                {
                    inputEl.style.borderColor = "green";
                    inputEl.value = "";
                    messageEl.innerHTML = text+" was added.";
                    messageEl.style.display = "block";
                    messageEl.style.color = "green";
                    document.getElementById('removeId').click();
                }
                else
                {
                    inputEl.style.borderColor = "red";
                    messageEl.innerHTML = "There was an error.";
                    messageEl.style.display = "block";
                }
            }
        };
        xhttp.open("POST", "index.php/recipe/AddIngredient", true);
        xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
        xhttp.send(param);
    }
}

function getIngredients(type, list)
{
    var ingType = document.getElementById(type);
    var param = "type="+ingType.value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                var ingList = JSON.parse(text);
                var count = ingList.length;
                var number = 0;
                var select = document.getElementById(list);
                while (select.firstChild) {
                    select.removeChild(select.firstChild);
                }
                var blank = document.createElement('OPTION');
                blank.text = "-";
                select.appendChild(blank);
                while(number < count)
                {
                    var option = document.createElement('OPTION');
                    option.value = ingList[number].id;
                    option.text = ingList[number].name;
                    select.appendChild(option);
                    console.log(ingList[number]);
                    number++;
                }
                //console.log(JSON.parse(text));
            }
        }
    };
    xhttp.open("POST", "index.php/recipe/getIngredients", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send(param);
}

function add(id)
{
    console.log(id);
}

function addIngInput(id)
{
    console.log(id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                var list = document.getElementById(id);
                var li = document.createElement('LI');
                li.innerHTML = text;
                list.appendChild(li);
                li.className = "animated slideInDown";
            }
        }
    };
    xhttp.open("POST", "index.php/recipe/addIngredientInput", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send();
}

function removeIngInput(id)
{
    var child = id.parentNode.parentNode;
    child.className = "animated fadeOut";
    child.addEventListener('webkitAnimationEnd', function( event ) {
        child.parentNode.removeChild(child);
        document.getElementById('buttonIngForm').disabled = false;
    }, false );
    
}

function addIngForm(id, button)
{
    console.log(id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (xhttp.readyState == 4 && xhttp.status == 200) 
        {
            var text = xhttp.responseText;
            if(text)
            {
                var list = document.getElementById(id);
                var li = document.createElement('LI');
                li.innerHTML = text;
                list.appendChild(li);
                li.className = "animated slideInDown";
                button.disabled = true;
            }
        }
    };
    xhttp.open("POST", "index.php/recipe/addIngForm", true);
    xhttp.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
    xhttp.send();
}

function enableRecipeSubmit()
{
    var name = document.getElementById('nameRecipe');
    var type = document.getElementById('typeRecipe');
    var steps = document.getElementById('stepsRecipe');

    if((name.value != '') && (type.value != "") && (steps != ''))
    {
        document.getElementById('buttonRecipe').disabled = false;
    }
}

function VerifyRecipe(id, id2)
{
    var inputText = document.getElementById(id);
    var message = document.getElementById(id2);
    if(inputText.value.length < 4)
    {
        var message = document.getElementById(id2);
        message.innerHTML = "Recipe name must be more than 4 characters long";
        message.style.display = "block";
        inputText.style.borderColor = "red";
    }
    else
    {
        var message = document.getElementById(id2);
        message.innerHTML = "";
        message.style.display = "none";
        inputText.style.borderColor = "green";
        nameValue = inputText.value;
        enableRegister();
    }
}

function addRecipe(name, message, type, steps, list)
{
    var nameRecipe = document.getElementById(name);
    var typeRecipe = document.getElementById(type);
    var stepsRecipe = document.getElementById(steps);
    var ingList = document.getElementById(list);

    var recipe = {name: nameRecipe.value, }
}