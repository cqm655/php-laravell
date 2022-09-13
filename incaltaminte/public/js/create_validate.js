const brand=document.getElementById("brand");
const model=document.getElementById("model");
const size=document.getElementById("size");
const color=document.getElementById("color");
const type=document.getElementById("type");
const price=document.getElementById("price");
const file=document.getElementById("file");
const submit = document.getElementById("submit");

let brandOk= false;

brand.addEventListener("keyup", () => {
    brand.classList.add("border");
    if(brand.value.length >= 2 && brand.value.length <30){
            brandOk = true;
            if( brand.classList.contains("border-danger")){
                brand.classList.remove("border-danger");
            } else {
                brand.classList.add("border-success");
            }

    } else {
        brandOk = false;
        if(brand.classList.contains("border-success")){
            brand.classList.remove("border-success");
        } else {
            brand.classList.add("border-danger");
        }

    }
    console.log(brandOk);
})

