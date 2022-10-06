$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

// Select 2 initiate
$('select.select2').select2();

function phoneFormat(input) {
    // Strip all characters from the input except digits
    input = input.replace(/\D/g,'');
    
    // Trim the remaining input to ten characters, to preserve phone number format
    input = input.substring(0,10);

    // Based upon the length of the string, we add formatting as necessary
    var size = input.length;
    if(size == 0){
            input = input;
    }else if(size < 4){
            input = '('+input;
    }else if(size < 7){
            input = '('+input.substring(0,3)+') '+input.substring(3,6);
    }else{
            input = '('+input.substring(0,3)+') '+input.substring(3,6)+' - '+input.substring(6,10);
    }
    return input; 
}

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

$(function() {
    $('.formatted-phone').keyup(function(evt) {
        console.log(evt);
        // var phoneNumber = document.getElementById('phoneNumber');
        // var charCode = (evt.which) ? evt.which : evt.keyCode;
        // phoneNumber.value = phoneFormat(phoneNumber.value);
        
        $(this).val(phoneFormat($(this).val()))
    });

    if ($('.formatted-phone').length) {
        $('.formatted-phone').val(phoneFormat($('.formatted-phone').val()))
    }
})