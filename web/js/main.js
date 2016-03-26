/**
 * Created by Tanateros on 13.01.2016.
 */
$('#preview').on('click', function(){
   $('#previewModal').show();
   $('#namePreview').val($('#name').val());
   $('#emailPreview').val($('#email').val());
   $('#textPreview').val($('#text').val());
});
$('#send, #sendOk').on('click', function(){
    document.getElementById('addComment').submit();
    /**
    $.ajax({
        method: "POST",
        url: "/add",
        data: {
            name: $('#name').val(),
            email: $('#email').val(),
            text: $('#text').val()
        },
        success: function(data) {
            alert(data);
            location.reload;
        }
    });
    */
});