window.onload = function test() {
    var Maximize_button = document.getElementById("DisableProgramMaximizeButton");
    Maximize_button.disabled = true;
}
function MinimizeProgram() {
    var Program = document.getElementById("Full-Program");
    var Program_Header = document.getElementById("Program-Header");
    var Side_Menu = document.getElementById("SidePanel-Menu");
    var Window_Content = document.getElementById("Content-Window");
    var Minimize_button = document.getElementById("DisableProgramMinimizeButton");
    var Maximize_button = document.getElementById("DisableProgramMaximizeButton");

    function Minimize(){
        Program.classList.remove("Program-Animation-Minimize")
    }
    function Event(){
        Program.classList.add("Program-Animation-Minimize")
        Program.style.height = "26px";
        Program.style.width = "90px";
        Program_Header.style.backgroundColor = "black";
        Program_Header.style.color = "whitesmoke";
        Program_Header.style.borderBottomRightRadius = "16px";
        Side_Menu.style.display = "none";
        Window_Content.style.display = "none";
        Minimize_button.disabled = true;
        Maximize_button.disabled = false;
    }
    Event();
    setTimeout(Minimize,4000);
}
function MaximizeProgram() {
    var Program = document.getElementById("Full-Program");
    var Program_Header = document.getElementById("Program-Header");
    var Side_Menu = document.getElementById("SidePanel-Menu");
    var Window_Content = document.getElementById("Content-Window");
    var Minimize_button = document.getElementById("DisableProgramMinimizeButton");
    var Maximize_button = document.getElementById("DisableProgramMaximizeButton");

    function Maximize(){
        Program.classList.remove("Program-Animation-Maximize")
    }
    function Event(){
        Program.classList.add("Program-Animation-Maximize")
        Program_Header.style.backgroundColor = "whitesmoke";
        Program_Header.style.color = "black";
        Program_Header.style.borderBottomRightRadius = "0px";
        Minimize_button.disabled = false;
        Maximize_button.disabled = true;
        function SideMenu(){
            Side_Menu.style.display = "block";
        }
        // Make A Smoother Transition
        function WindowContent(){
            Window_Content.style.display = "block";
        }
        // Show Sidemenu Earlier
        setTimeout(SideMenu,2250)
        // Show Window Content Later
        setTimeout(WindowContent,3250)
        // Fixed Height And Width
        Program.style.height = "300px";
        Program.style.width = "872px";
    }
    Event();
    setTimeout(Maximize,4000);
}
function DeleteBox(element){
    var SideMenu = document.getElementById(element);
    function Disappear(){
        SideMenu.classList.add("Menu-Close-Animation-Disappear")
    }
    Disappear();
    function RemoveBox() {
        SideMenu.remove();
    }
    setTimeout(RemoveBox,4000)
}