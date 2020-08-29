$(document).ready(function(){
    setInterval(function(){
        displayComment();
    }, 5000);
    function displayComment(){
        $.ajax({
            url      : "getComment.php",
            method   : "post",
            success  : function(data){
                $('.heading').html("<span>Comments</span>");
                $('.content').html(data);
            }
        });
    }
    $('#commentForm').on('submit', function(event){
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url      : "comment.php",
            method   : "post",
            data     : formData,
            success  : function(data){
             $('#commentForm')[0].reset();
             //alert(data)
             //displayComment();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
});

