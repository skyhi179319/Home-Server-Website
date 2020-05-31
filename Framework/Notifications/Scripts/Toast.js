function DeleteToastBox(element){
    var box = document.getElementById(element);
    function Disappear(){
        box.classList.add("Toast-Box-Animation-Disappear")
    }
    Disappear();
    function RemoveBox() {
        box.remove();
    }
    setTimeout(RemoveBox,4000)
}