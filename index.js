import { initializeApp } from  "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js"
import { getDatabase, ref, push, onValue, remove } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-database.js"

const appSettings = {
    databaseURL: "https://playground-59650-default-rtdb.firebaseio.com/"
}
const app = initializeApp(appSettings)
const database = getDatabase(app)
const shoppingListInDB = ref(database, "Cart")

const inputEl = document.getElementById("inp-el")
const btn = document.getElementById("btn")
const shoppingListEl = document.getElementById("shopping-list")


btn.addEventListener("click", () => {
    const inputValue = inputEl.value
    push(shoppingListInDB,inputValue )

    clearInputField()


})

onValue(shoppingListInDB, (snapshot) => {
    if(snapshot.exists()){
        let cartArray = Object.entries(snapshot.val())
  
        clearShoppingListEl()

        for(let i = 0; i < cartArray.length; i++){
            let currentItem = cartArray[i]
            let currentItemID = currentItem[0]
            let currentItemValue = currentItem[1]
            appendItemToShoppingList(currentItem)
        }
    } else{
        shoppingListEl.innerHTML = "No Items...yet"
    }
    
})

function clearInputField(){
    inputEl.value = ""
}
function clearShoppingListEl(){
    shoppingListEl.innerHTML = ""
}
function appendItemToShoppingList(value){

    let itemID = value[0]
    let itemValue = value[1]
    let newEl = document.createElement("li")
    newEl.textContent = itemValue

    newEl.addEventListener("click",() => {
        let exactLocationOfItem = ref(database, `Cart/${itemID}`)
        remove(exactLocationOfItem)
    })
    shoppingListEl.append(newEl)

}