const SearchBar = document.querySelector(".users .search input"), 
SearchBtn = document.querySelector(".users .search button"),
UserList = document.querySelector(".users .users-list");
SearchBtn.onclick = () => {
    SearchBar.classList.toggle("active");
    SearchBar.focus();
    SearchBtn.classList.toggle("active");
}
SearchBar.onkeyup = ()=>{
    let SearchTerm = SearchBar.value;
    if(SearchTerm!=""){
        SearchBar.classList.add("active");
    } else{
        SearchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                UserList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type" , "application/x-www-form-urlencoded");
    xhr.send("SearchTerm=" + SearchTerm);
}
window.addEventListener("load" , ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if(!SearchBar.classList.contains("active")){
                    UserList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
});
//setInterval(() => {
    //console.log('Intervalo');
    
//}, 5000);