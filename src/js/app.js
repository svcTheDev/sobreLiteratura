// alert('holaaa?');

let a;
console.log(a);

let create = document.querySelector("#create");
let author = document.querySelector("#author");

create.addEventListener('click', saveInfo) 


    function saveInfo (e) {
    e.preventDefault();
    let title = document.querySelector("#title").value;
    
    author.value = title;

    a = 1;
}

console.log(a);
