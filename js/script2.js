let step_one_submit = document.getElementById("step_one_submit");
let step_btoc_submit = document.getElementById("step_btoc_submit");
let step_btob_submit = document.getElementById("step_btob_submit");

let client = document.getElementById("client");

let step_one = document.getElementById("step_one");
let step_btoc = document.getElementById("step_btoc");
let step_btob = document.getElementById("step_btob");

step_one_submit.addEventListener("click", function(){
    if (client = "btoc_client") {
       alert("ok");
       event.preventDefault();
    }
    else if (client.value = "btob_client"){
       alert("pas ok");
       event.preventDefault();
    }
    else{
       alert("a revoir");
       event.preventDefault();
    }
})


/*
if (client == btob_client){
        alert("1")
    } else{
        alert("2")
    }
*/
