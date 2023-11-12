const md1 = document.getElementById("md1");
const md2 = document.getElementById("md2");
const md3 = document.getElementById("md3");

const modal1 = document.getElementById("filterModal1");
const modal2 = document.getElementById("filterModal2");
const modal3 = document.getElementById("filterModal3");

const modalTitle1 = document.getElementById("filterModalLabel1");
const modalTitle2 = document.getElementById("filterModalLabel2");
const modalTitle3 = document.getElementById("filterModalLabel3");

const category = document.getElementById("Category");
const title = document.getElementById("Title");
const ingredients = document.getElementById("Ingredients");

var recipeInputStartDish = document.getElementById("recipeInputStartDish");
var recipeInputDish = document.getElementById("recipeInputDish");
var recipeInputDessert = document.getElementById("recipeInputDessert");


var tab1 = [];
var tab2 = [];
var tab3 = [];


var recipeInput = document.getElementById("recipeInput");
var recipeList = document.getElementById("recipeListForTitle");

AllRecipes.forEach(function (recipe) {
  var option = document.createElement("option");
  option.value = recipe.RE_TITLE;
  recipeList.appendChild(option);
});

recipeInput.addEventListener("keydown", function (event) {
  if (event.key === "Enter" && recipeInput.value.trim() !== "") {
    var inputValue = recipeInput.value.toLowerCase();
    recipeInput.value = "";
    var isRecipeExists = AllRecipes.some(function (recipe) {
      return recipe.RE_TITLE.toLowerCase() === inputValue;
    });
  }
  if (isRecipeExists) {
    window.location.href="?action=Filter";
  }
});


recipeInputStartDish.addEventListener("click", function () {
  var filteredRecipes = AllRecipes.filter(function (recipe) {
    return recipe["CA_ID"] == 1;
  });
  redirectToFilterPage(filteredRecipes);
});

recipeInputDish.addEventListener("click", function () {
  var filteredRecipes = AllRecipes.filter(function (recipe) {
    return recipe["CA_ID"] == 2;
  });
  redirectToFilterPage(filteredRecipes);
});

recipeInputDessert.addEventListener("click", function () {
  var filteredRecipes = AllRecipes.filter(function (recipe) {
    return recipe["CA_ID"] == 3;
  });
  redirectToFilterPage(filteredRecipes);
});

function redirectToFilterPage(filteredRecipes) {
  var encodedRecipes = encodeURIComponent(JSON.stringify(filteredRecipes));
  window.location.href = "?filteredRecipes=" + encodedRecipes;
}