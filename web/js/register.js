$(() => {
    const clear = () => {
        $(".field-passport-passport_another")
            .find(".invalid-feedback")
            .html("")

        $("#passport-passport_another").removeClass('is-invalid')
        $("#passport-passport_another").removeClass('is-valid')
    }
    $("#passport-passport_type_id").on('change', function () {

        $('#register-form').yiiActiveForm(
            'validateAttribute',
            'passport-passport_expire'
        )
        if ($(this).val() == $(".hidden_input").val()) {
            $('#register-form').yiiActiveForm(
                'remove',
                'passport-passport_another'
            )

            clear();

            $('#register-form').yiiActiveForm(
                'add',
                {
                    "id": "passport-passport_another", "name": "passport_another",
                    "container": ".field-passport-passport_another",
                    "input": "#passport-passport_another",
                    "error": ".invalid-feedback",
                    "validate": function (attribute, value, messages, deferred, $form) {
                        yii.validation.required(value, messages,
                            { "message": "Поле должно быть заполненно", "skipOnEmpty": 1 });
                    }
                },
            )

            $('#register-form').yiiActiveForm(
                'validateAttribute',
                'passport-passport_another'
            )
            $(".field-passport-passport_another").removeClass('d-none');
        } else {
            $('#register-form').yiiActiveForm(
                'remove',
                'passport-passport_another'
            );
            clear()
            $(".field-passport-passport_another").addClass('d-none');

        }
    })
})