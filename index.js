fetch('./php/grocery.php')
        .then(response => response.json())
        .then(data => {
            const shoppingListEl = document.getElementById("shopping-list")

            data.forEach(row => {
                let newEl = document.createElement("li")
                let newA = document.createElement("a")
                newA.innerHTML = '<a href="./php/delete_item.php?id=' + row.grocery_id +  '"><i class="bx bx-trash" ></i></a>'
                
                newEl.textContent = row.grocery_item
    
                newEl.append(newA)
                shoppingListEl.append(newEl)
            })
           
    
            
        })
        .catch(error => console.error('Error fetching data:', error));