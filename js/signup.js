const form = document.querySelector(".signup form ") , 
ContinueBtn = form.querySelector(".button input"),
ErrorText = form.querySelector(".error-txt");
form.onsubmit = (event)=>{
    event.preventDefault();
}
ContinueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST" , "php/signup.php" , true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Success"){
                    location.href = "users.php";
                } else{
                    ErrorText.textContent = data;
                    ErrorText.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}