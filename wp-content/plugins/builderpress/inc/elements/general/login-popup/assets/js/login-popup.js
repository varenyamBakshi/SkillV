(function ($) {
    "use strict";

    $(document).ready(function () {
        bp_element_login_popup.init();
    });

    var bp_element_login_popup = {

        init: function () {
            this.login_popup();
            this.login_error();
            this.register_popup();
        },

        /**
         *   click account
         */
        infor_user:function(){
            if($(window).width() <= 1024) {
                $('.mobile-sidebar .bp-element-login-popup .login-links>a').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');
                var thim_log_out = $('.bp-element-login-popup .login-links').find('.logout');
                thim_log_out.on('click', function () {
                    $('.user-info').toggleClass('open-user-infor');
                });
            }

            // click angle down
            var user_infor = $('.mobile-sidebar .bp-element-login-popup .login-links').find('.user-info').hide();
            var angle_down = $('.mobile-sidebar .bp-element-login-popup .login-links').find('.icon-toggle');
            angle_down.on('click',function () {
                if(user_infor.is(':hidden') === true){
                    user_infor.slideDown('normal');
                    $(this).html('<i class="fa fa-angle-up"></i>');
                }else{
                    user_infor.slideUp('normal');
                    $(this).html('<i class="fa fa-angle-down"></i>');
                }
            });
        },

        /**
         * Register popup
         */
        register_popup: function() {
            $('#popupRegisterForm').submit(function (event) {
                event.preventDefault();
                var form = $(this),
                    wp_submit = form.find('#popupRegisterSubmit').val(),
                    redirect_to = form.find("input[name=redirect_to]").val();

                form.addClass('loading');
                form.find('.message').slideDown().remove();

                var data = {
                    action           : 'builderpress_register_ajax',
                    data             : form.serialize() + '&wp-submit=' + wp_submit,
                    register_security: $("#register_security").val()
                };

                $.ajax({
                    type    : 'POST',
                    url     : ajaxurl,
                    data    : data,
                    success : function (response) {
                        form.removeClass('loading');
                        form.append(response.data.message);
                        if (response.success === true) {
                            window.location.href = redirect_to;
                        }
                    }
                });
            });
        },
        /**
         * Login popup form
         */
        login_popup: function () {

            $('.login-popup').on('click', '.display-box', function (e) {
                e.preventDefault();

                var classbox = $(this).attr('data-display');

                $('.login-popup' + classbox).addClass('active').siblings().removeClass('active');
            });

            $('.login-links .login').magnificPopup({
                type: 'inline',
                fixedContentPos: true,
                removalDelay: 500, //delay removal by X to allow out-animation
                callbacks: {
                    beforeOpen: function () {
                        this.st.mainClass = this.st.el.attr('data-effect');

                    },
                    open: function () {
                        var classactive = this.st.el.attr('data-active');
                        $('.login-popup' + classactive).addClass('active').siblings().removeClass('active');
                    }
                },
                midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
            });
            $('.login-links .register').magnificPopup({
                type: 'inline',
                fixedContentPos: true,
                removalDelay: 500, //delay removal by X to allow out-animation
                callbacks: {
                    beforeOpen: function () {
                        this.st.mainClass = this.st.el.attr('data-effect');

                    },
                    open: function () {
                        var classactive = this.st.el.attr('data-active');
                        $('.login-popup' + classactive).addClass('active').siblings().removeClass('active');
                    }
                },
                midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
            });


            $('#bp-popup-login #loginform').submit(function (event) {
                var form = $(this),
                    input_username = form.find('#bp_login_name').val(),
                    input_password = form.find('#bp_login_pass').val(),
                    redirect_to = form.find('input[name="redirect_to"]').val();

                if (input_username === '' || input_password === '') {
                    return;
                }

                form.addClass('loading');
                form.find('.message').slideDown().remove();

                var data = {
                    action: 'builderpress_login_popup_ajax',
                    username: input_username,
                    password: input_password,
                    redirect_to: redirect_to,
                    remember: form.find('#rememberme').val()
                };

                $.post(ajaxurl, data, function (res) {
                    try {
                        var response = JSON.parse(res);
                        form.removeClass('loading');
                        form.append(response.message);
                        if (response.code == '1') {
                            if (response.redirect) {
                                window.location.href = response.redirect;
                            } else {
                                location.reload();
                            }
                        }
                    } catch (e) {
                        return false;
                    }
                });

                //event.preventDefault();
                return false;
            });

            $(function ($) {
                $('#bp_login_name, #bp_login_name_ac').attr('placeholder', login_popup_js.login);
                $('#bp_login_pass, #bp_login_pass_ac').attr('placeholder', login_popup_js.password);
            });

        },
        /**
         * Notifications error for form
         */
        login_error: function () {

            // Validate login submit
            $('.login-popup form#loginform').submit(function (event) {
                var elem = $(this),
                    input_username = elem.find('#bp_login_name, #bp_login_name_ac'),
                    input_pass = elem.find('#bp_login_pass, #bp_login_pass_ac');

                if (input_username.length > 0 && input_username.val() === '') {
                    input_username.addClass('invalid');
                    event.preventDefault();
                }

                if (input_pass.length > 0 && input_pass.val() === '') {
                    input_pass.addClass('invalid');
                    event.preventDefault();
                }
            });

            //Register form untispam
            $('.login-popup form#registerform').submit(function (event) {
                var elem = $(this),
                    input_username = elem.find('#user_login_register'),
                    input_email = elem.find('#user_email'),
                    input_pass = elem.find('#password'),
                    input_rppass = elem.find('#repeat_password');

                var email_valid = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;

                if (input_username.length > 0 && input_username.val() === '') {
                    input_username.addClass('invalid');
                    event.preventDefault();
                }

                if (input_email.length > 0 && (input_email.val() === '' || !email_valid.test(input_email.val()))) {
                    input_email.addClass('invalid');
                    event.preventDefault();
                }

                if (input_pass.val() !== input_rppass.val() || input_pass.val() === '') {
                    input_pass.addClass('invalid');
                    input_rppass.addClass('invalid');
                    event.preventDefault();
                }
            });

            // Validate lostpassword submit
            $('.login-popup form#lostpasswordform').submit(function (event) {
                var elem = $(this),
                    input_username = elem.find('#user_login_lostpass');

                if (input_username.length > 0 && input_username.val() === '') {
                    input_username.addClass('invalid');
                    event.preventDefault();
                }
            });

            // Remove class invalid
            $('.login-popup #bp_login_name, .login-popup #bp_login_pass, .login-popup #user_login_lostpass, .login-popup #user_login_register, .login-popup #bp_login_name_ac, .login-popup #bp_login_pass_ac').on('focus', function () {
                $(this).removeClass('invalid');
            });

        },

    };

})(jQuery);