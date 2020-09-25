

(function(){
    $('.form-one-submit').on('submit', function() {
        $('.button-one-submit').attr('disabled', 'true');
        $('.loading').show();
        $('.button-group').hide();
    })
})();
