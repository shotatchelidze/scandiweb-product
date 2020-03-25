
$(document).ready(function() {
    
    $("#disk").on("click",function(){
        $(".divtoshow").hide();
        $(".sizebox").show();
        var sizeValue = $('#disk').val();
        $('#default').val(sizeValue);
        $('#type').val(sizeValue);
        
        var sizeText = $('#disk').text();
        $('#default').text(sizeText);
    })
    $("#furniture").on("click",function(){
        $(".divtoshow").hide();
        $(".dimensionsbox").show();
        var furnitureValue = $('#furniture').val();
        $('#default').val(furnitureValue);
        $('#type').val(furnitureValue);
        
        var furnitureText = $('#furniture').text();
        $('#default').text(furnitureText)
    })
    $("#book").on("click",function(){
        $(".divtoshow").hide();
        $(".weightbox").show();
        var weightValue = $('#book').val();
        $('#default').val(weightValue);
        $('#type').val(weightValue);
        
        var weightText = $('#book').text();
        $('#default').text(weightText)
    })
});

function selectAll(){
    var items = document.getElementsByName('productRecords[]');
    for(var i = 0; i < items.length; i++){
        if(items[i].type=='checkbox'){
            items[i].checked = true;
        }
    }
}

function UnSelectAll(){
    var items=document.getElementsByName('productRecords[]');
    for(var i = 0; i < items.length; i++){
        if(items[i].type=='checkbox'){
            items[i].checked = false;
        }
    }
}	
