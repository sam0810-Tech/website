$('#contact-form').submit(function(){
    (e).preventDefault();

    $.ajax({
        url: 'sendmail.php?task=sendmail',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize()
    })
    .done(function(res){
        if(res.status == 1){
            alert(res.message);
            location.href = './about.php';
        }else{
            alert(res.message);
        }
    });
});