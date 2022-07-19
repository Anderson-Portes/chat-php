const form = document.querySelector(".typing-area"),
InputField = form.querySelector(".input-field"),
SendBtn = form.querySelector("button"),
ChatBox = document.querySelector(".chat-box");
form.onsubmit = (event)=>{
    event.preventDefault();
}
SendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST" , "php/insert-chat.php" , true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
               InputField.value = "";
               scrollToBottom();
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
    chat();
}
ChatBox.onmouseenter = ()=>{
    ChatBox.classList.add("active");
}
ChatBox.onmouseleave = ()=>{
    ChatBox.classList.remove("active");
}
window.addEventListener("load" , ()=>{
    chat();
});
setInterval(() => {
chat();    
}, 3000);
function chat(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                ChatBox.innerHTML = data;
                if(!ChatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
function scrollToBottom(){
    ChatBox.scrollTop = ChatBox.scrollHeight;
}
