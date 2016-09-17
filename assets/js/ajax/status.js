$(function() {
    function post_status(){
        var formdata = {};
        var processor = $("#post-status-form").attr("action");
        formdata["content"] = $("#status-content").val();
        return $.ajax({
            url: processor,
            type: "post",
            data: formdata
        });
    }

    $("#post-status").on('click', function(e){
        e.preventDefault();
        $("#post-status-form-spinner").removeClass('hide');
        
        $.when( post_status() ).done(function(data){
            var ht = '<div class="post box-container" id="post-"' + data.post.id + '"><div class="row"><div class="post-heading"><div class="post-author col-xs-6">You!</div><div class="post-date col-xs-6">Just now</div></div></div>' + '<div class="post-content">' + data.post.content + '</div></div>';
            $("#status-updates").append(ht);
            $("#post-status-form-spinner").addClass('hide');
        });
    })
    

});

