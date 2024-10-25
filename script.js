let body=document.querySelector("body");
let part1 =document.querySelector(".part1");
let part2 =document.querySelector(".part2");
let searchBox = document.querySelector("input")
let searchBtn = document.querySelector("button")
let recipeCan = document.querySelector(".recipe-can")
let heading = document.querySelector(".heading")
let recName = document.querySelector("#rec-name");
let instructDetails = document.querySelector("#instruct");
let videoSrc = document.querySelector(".video");
// fuction to get recipe

const getRecipe = async (query) => {
 
  recipeCan.innerHTML = "fetching recipes..."

  const data = await fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${query}`)
  const response = await data.json();
  recipeCan.innerHTML = "";
  console.log(response);

  response.meals.forEach(meal => {
    const recipeDiv = document.createElement("div");
    recipeDiv.classList.add("recipe");
    recipeDiv.innerHTML = `
      <img src = "${meal.strMealThumb}">
      <h3>${meal.strMeal}</h3>
      <p><b>${meal.strArea}</b> Dish</p>
      <p>Belongs to <b>${meal.strCategory}</b> category</p>
    ` 
    videoSrc.innerHTML = `
    <h2>related cooking videos</h2>
    <a href="${meal.strYoutube}">${meal.strYoutube}</a>
    `
    instructDetails.innerText = `${meal.strInstructions}`

    const button = document.createElement("button");
      button.innerText = "view recipe"
      recipeDiv.appendChild(button)

      button.addEventListener("click",()=> {
        part1.style.display="none"
        body.style.backgroundColor="white";
        part2.style.display="block"
        openRecPopup(meal);
      })

    recipeCan.appendChild(recipeDiv)
  })
}


const fetchIngredients = (meal)=> {
  let ingredientsList = "";
  for(let i=1; i<=20; i++) {
    let ingredient = meal[`strIngredient${i}`];
    if(ingredient) {
      let measure = meal[`strMeasure${i}`];
      ingredientsList += `<li>${measure} ${ingredient}</li>`
    }
    else {
      break;
    }
  }
  return ingredientsList;
}

let recDetails =document.querySelector(".recDetails")

const openRecPopup =(meal) => {

  heading.innerHTML=`
  <h3>${meal.strMeal}</h3>
  `
  recDetails.innerHTML =`
    <img src = "${meal.strMealThumb}">
    <br>
    <button id= "print">print this recipe</button>
    <h2>ingredients</h2>
    <ol>${fetchIngredients(meal)}</ol>
  `
}

searchBtn.addEventListener("click",(e)=> {
  e.preventDefault();
  const searchInput = searchBox.value.trim();
  getRecipe(searchInput)

})

// code for post item x(twitter) 
let x = document.querySelector(".x");

x.addEventListener("click",()=> {
  
  window.open("https://x.com/i/flow/login")
})
