$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 0
                }
            },
            messages: {
                name: {
                    required: "vamos lá, não esqueça de nos informar seu nome.",
                    minlength: "seu nome deve consistir em pelo menos 2 caracteres"
                },
                subject: {
                    required: "vamos lá, você tem um assunto, não é?",
                    minlength: "seu assunto deve possuir em pelo menos 4 caracteres"
                },
                number: {
                    required: "Vamos lá, você tem um número, não é?",
                    minlength: "seu número precisa ter pelo menos 11 caracteres (contando com o cód de área)"
                },
                email: {
                    required: "Ops! acho que esqueceu de nos informar seu email!!"
                },
                message: {
                    required: "hum ... sim, não esqueça que você pode colocar alguma preferência sua aqui.",
                    minlength: "Isso é tudo? realmente?"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"contact_process.php",
                    success: function() {
                        $('#contactForm :input').attr('disabled', 'disabled');
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $(this).find(':input').attr('disabled', 'disabled');
                            $(this).find('label').css('cursor','default');
                            $('#success').fadeIn()
                            $('.modal').modal('hide');
		                	$('#success').modal('show');
                        })
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})