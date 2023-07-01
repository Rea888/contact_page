/**
 * Question marks around image
 */

$(document).ready(function () {
    let imgContainer = $(".img-container");

    $("#background-img").hover(function () {
        for (let i = 1; i <= 10; i++) {
            let randomX = Math.floor(Math.random() * imgContainer.width());
            let randomY = Math.floor(Math.random() * imgContainer.height());

            $("#qm" + i).css({
                "left": randomX,
                "top": randomY
            }).fadeIn();
        }
    }, function () {
        $(".question-mark").fadeOut();
    });
});


/**
 * Disappear exclamation marks on focus
 * @type {NodeListOf<Element>}
 */

let inputFields = document.querySelectorAll('.input-field, .textarea-field');

inputFields.forEach(inputField => {
    inputField.addEventListener('focus', function () {
        this.classList.remove('error');
    });
});


/**
 * Character counter for textarea
 */

$(document).ready(function () {
    var maxChars = 500;
    var $textareaField = $('.textarea-field');

    $textareaField.each(function() {
        var length = $(this).val().length;
        var remaining = maxChars - length;
        var counterId = $(this).data('counter');
        $(counterId).html(remaining + ' / ' + maxChars);
        if(remaining <= 0){
            $(counterId).addClass('limit-reached');
        }
    });

    $textareaField.on('input', function () {
        var length = $(this).val().length;
        var remaining = maxChars - length;
        var counterId = $(this).data('counter');
        if(remaining <= 0){
            $(counterId).addClass('limit-reached');
        }else{
            $(counterId).removeClass('limit-reached');
        }
        $(counterId).html(remaining + ' / ' + maxChars);
    });
});





