$('.chat-btn').click(function (e) { 
    var wish ="wish";
    var id = e.currentTarget.parentElement.parentElement.parentElement.querySelector('.img-container input').value;

    $.ajax({
        url:'includes/add_to_wishlist.php',
        method:'POST',
        data:{wish:wish,id:id},
        success:function(response){
             $(".nav-icons .first_heart").text(response);
            alert("the product addedd successfully");
        }
    });
});


$('.add-to-wishlist').click(function (e) { 
    var single ="single";
    var id = e.currentTarget.parentElement.querySelector('input').value;

    $.ajax({
        url:'includes/add_to_wishlist.php',
        method:'POST',
        data:{single:single,id:id},
        success:function(response){
             $(".nav-icons .first_heart").text(response);
            alert("the product addedd successfully");
        }
    });
});