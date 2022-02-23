function entryChange(){
    radio = document.getElementsByName('type') 

    if(radio[0].checked) {
        document.getElementById('switch_to_schedule').style.display = "";
        document.getElementById('switch_to_task').style.display = "none";
        document.getElementById('switch_to_project').style.display = "none";
    }else if(radio[1].checked) {
        document.getElementById('switch_to_schedule').style.display = "none";
        document.getElementById('switch_to_task').style.display = "";
        document.getElementById('switch_to_project').style.display = "none";
    }else if(radio[2].checked) {
        document.getElementById('switch_to_schedule').style.display = "none";
        document.getElementById('switch_to_task').style.display = "none";
        document.getElementById('switch_to_project').style.display = "";
    }
}

window.onload = entryChange;