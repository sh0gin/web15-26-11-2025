$(() => {
    const clear = () => {
        $(".field-passport-passport_another")
            .find(".invalid-feedback")
            .html("")

        $("#passport-passport_another").removeClass('is-invalid')
        $("#passport-passport_another").removeClass('is-valid')
    }

    $("#passport-passport_type_id").on('change', function () {

        $('#passport-form').yiiActiveForm(
            'validateAttribute',
            'passport-passport_expire'
        )
        console.log($(this).val());
        if ($(this).val() == 4) {
            $('#passport-form').yiiActiveForm(
                'remove',
                'passport-passport_another'
            )

            clear();

            $('#passport-form').yiiActiveForm(
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

            $('#passport-form').yiiActiveForm(
                'validateAttribute',
                'passport-passport_another'
            )
            $(".field-passport-passport_another").removeClass('d-none');
        } else {
            $('#passport-form').yiiActiveForm(
                'remove',
                'passport-passport_another'
            );
            clear()
            $(".field-passport-passport_another").addClass('d-none');

        }
    })
})