$(document).ready(function () {

    jQuery.validator.addMethod("regex", function (value, element, param) { return value.match(new RegExp("^" + param + "$")); });
    var ALPHA_REGEX = "[a-zA-Z]*";

    jQuery.validator.addMethod(
        'Uppercase',
        function (value) {
            return /[A-Z]/.test(value);
        },
        'Your password must contain at least one Uppercase Character.'
    );
    jQuery.validator.addMethod(
        'Lowercase',
        function (value) {
            return /[a-z]/.test(value);
        },
        'Your password must contain at least one Lowercase Character.'
    );
    jQuery.validator.addMethod(
        'Specialcharacter',
        function (value) {
            return /[!@#$%^&*()_-]/.test(value);
        },
        'Your password must contain at least one Special Character.'
    );
    jQuery.validator.addMethod(
        'Onedigit',
        function (value) {
            return /[0-9]/.test(value);
        },
        'Your password must contain at least one digit.'
    );

    $('form').validate({
        rules: {
            'user_profile[first_name]': {
                required: true,
                minlength: 3,
                regex: ALPHA_REGEX,
            },
            'user_profile[last_name]': {
                required: true,
                minlength: 3,
                regex: ALPHA_REGEX,
            },
            email: {
                required: true,
            },
            'user_profile[contact_number]': {
                required: true,
                digits: true,
                maxlength: 12,
                minlength: 10,
            },
            'user_profile[address]': {
                required: true,
                minlength: 3,
                regex: ALPHA_REGEX,
            },


            'user_profile[image]':
            {
                required: true,

            },
            password: {

                required: true,
                Uppercase: true,
                Lowercase: true,
                Specialcharacter: true,
                Onedigit: true,
                maxlength: 18,
                minlength: 8,


            },
            confirm_password: {
                required: true,
                equalTo: "#password",
            },
            property_title: {
                required: true,
            },
            property_description: {
                required: true,
            },
            property_category: {
                required: true,
            },
            property_description: {
                required: true,
            },
            property_image: {
                required: true,
            },
            property_tags: {
                required: true,
            },

        },

        messages: {
            'user_profile[first_name]':
            {
                required: "** Please enter your first name  **",
                minlength: "**Minimum length of firstname should be 3**",
                regex: "**Please enter characters only**",


            },
            'user_profile[last_name]':
            {
                required: "**Please enter your last name**",
                minlength: "**Minimum length of lastname should be 3**",
                regex: "**Please enter characters only**",


            },
            email: "**Please enter email-id including . and @**",

            'user_profile[contact_number]': {
                required: "**Please enter your phone number**",
                digits: "**Please enter digits only**",
                maxlength: "**Maximum length of phone number should be 12 digits**",
                minlength: "**Minimum length of phone number should be 10 digits**",
            },
            'user_profile[address]': {
                required: " **  Please enter your address ** ",
                minlength: "**Minimum length of address should be 3**",
                regex: "**Please enter characters only**",
            },

            'user_profile[image]': {
                required: "**Please select a image**",

            },
            password:
            {
                required: "**Please enter Password**",
                maxlength: "**Maximum length of Password should be 18 digits**",
                minlength: "**Minimum length of Password should be 8 digits**",
            },
            confirm_password:
            {
                required: "**Please re-enter password to confirm**",
                equalTo: "**Password do not match**",
            },
            property_title: {
                required: "**Please enter property title",
            },
            property_description: {
                required: "Please enter property description",
            },
            property_category: {
                required: "Please enter property category",
            },
            property_image: {
                required: "Please Select image",
            },
            property_tags: {
                required: "Please enter property tags",
            },
    
        },
        // submitHandler:function(form){
        //     $("#myform").on("submit",function(form)
        //     {
        //         if(!$("#done").prop("checked"))
        //         {
        //             $("#agree_chk_error").show();
        //             return false;
        //         }
        //         else
        //         {
        //             $("#agree_chk_error").hide();
        //         }
        //     })
        // }
   

    })
}); 