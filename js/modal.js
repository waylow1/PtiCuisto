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

console.log(AllRecipes);

var tab1 = [];
var tab2 = [];
var tab3 = [];

recipeInputStartDish.addEventListener("click", function () {
  AllRecipes.forEach(function (recipe, i) {
    if (recipe["CA_ID"] == 1) {
      tab1[i] = recipe;
    }
  });
  window.location.href="?action=Filter";
});

recipeInputDish.addEventListener("click", function () {
  AllRecipes.forEach(function (recipe, i) {
    if (recipe["CA_ID"] == 2) {
      tab2[i] = recipe;
    }
  });
  window.location.href="?action=Filter";
});

recipeInputDessert.addEventListener("click", function () {
  AllRecipes.forEach(function (recipe, i) {
    if (recipe["CA_ID"] == 3) {
      tab[i] = recipe;
    }
  });
  window.location.href="?action=Filter";
});

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
    recipeInput.value = "";
    window.location.href="?action=Filter";
  }
});
