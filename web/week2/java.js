function alt() {
    alert("Clicked!");
}

function change() {
    const color = document.getElementById("color").value;
    const div = document.getElementById("one");

    div.style.backgroundColor = color;
}


$(document).ready(function(){
    $("#button2").click(function(){
        var col = $("#color2").val();
        $("#two").css("background-color", col)
        });
            
        $("#fade").click(function(){
        $("#three").fadeToggle("slow");
        });
});
