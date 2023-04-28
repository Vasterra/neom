jQuery(function ($){

    // functions
    function validateEmail(email){
        if(!email) return true
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    }
    // end functions


    // header
    $('.search-btn-js').on('click', function (){
        $('#searchform').slideDown();
    });
    $('.close-search-js').on('click', function (){
        $('#searchform').slideUp();
    });

    $('.main-page-container-js').hover(
        function (){
            $('#main-gallery-header').css('margin-top','-84px');
            $('#header').addClass('main-page');
        },
        function (){
            $('#main-gallery-header').css('margin-top','0');
            $('#header').removeClass('main-page');
        }
    );

    $('.share-modal-js').on('click', function (){
        $('.sharing-modal-js, .main-shadow').fadeIn();
    });
    $('.close-modal-js, .main-shadow').on('click', function (){
        $('.modal-wrap').fadeOut();
        $('.main-shadow').fadeOut();
        $('.copy-text-js').text('Copy Link');
    });

    $('.copy-link-buffer-js').on('click', function (){
        $('.copy-input-buffer-js').select();
        document.execCommand('copy');
        $('.copy-text-js').text('Copied');
    });
    // end header

    $("#subscribeSubmit").on('click', function (e){
        let err = 0
        $('.input-subscribe').each((index,item) => {
            $(item).parent().find('.error-span').removeClass('active')
            $(item).removeClass('error')

            if($(item).val() === '') {
                $(item).addClass('error')
                $(item).parent().find('.error-span').addClass('active')
                err++;
            }
            if($(item).val() && $(item).hasClass('input-subscribe-email') && !validateEmail($(item).val())) {
                $(item).addClass('error')
                $(item).parent().find('.error-span').removeClass('active')
                $(item).parent().find('.error-span-email').addClass('active')
                err++;
            }
        })
        if(err > 0) e.preventDefault();
    });

    const recendViewed = new Swiper('#recend-viewed', {
        slidesPerView: 4,
        spaceBetween: 25,
        navigation: {
            nextEl: '.carousel-prev-next .swiper-button-next',
            prevEl: '.carousel-prev-next .swiper-button-prev',
        },
    })


    // ===== Zoom hover
    const stekloSize = 200;

    function magnify(id, zoom){
        let el = document.getElementById(id);
        const copy = el.cloneNode(true);
        const steklo = document.createElement("div");

        steklo.setAttribute("id","steklo")
        el.appendChild(steklo);
        el.getBoundingClientRect();
        copy.style.zoom = zoom;
        steklo.appendChild(copy);

        copy.style.width = (el.offsetWidth * zoom) + "px";
        copy.style.heigth = (el.offsetHeight * zoom) + "px";
        copy.style.position = "absolute";

        el.addEventListener("mousemove", (ev) => {
            ev.preventDefault();
            ev.stopPropagation();
            const pos = getCursorPos(ev);
            steklo.style.left = - (stekloSize*2.6) + pos.x + "px";
            steklo.style.top = - (stekloSize*1.3) + pos.y + "px";

            copy.style.left = - (pos.x - el.offsetLeft) + (stekloSize/zoom)*2.6 + "px";
            copy.style.top = - (pos.y - el.offsetTop) + (stekloSize/zoom)*1.6 + "px";
        })
    }

    function getCursorPos(e) {
        var x = (window.Event) ? e.pageX : e.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
        var y = (window.Event) ? e.pageY : e.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
        return {x : x , y : y};
    }

    $('.parent-img-wrap-js').hover(function (){
        let elId = $(this).attr('id');
        magnify(elId, 1.3);
    },
    function () {
        $('#steklo').remove();
    });

    $('.accordion-item__head').on('click', function (){
        if(!$(this).hasClass('active')) {
            $(this).addClass('active');
            $(this).next().slideDown()
        } else {
            $(this).removeClass('active');
            $(this).next().slideUp()
        }
    });




    // ===== All sliders =====

    const swiperBestSellers = new Swiper('#main-best-sellers', {
        slidesPerView: 4,
        spaceBetween: 25,
        pagination: {
            el: '.main-best-sellers-pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return `<span class="dot swiper-pagination-bullet"></span>`;
            },
        },
        navigation: {
            nextEl: '.carousel-prev-next .swiper-button-next',
            prevEl: '.carousel-prev-next .swiper-button-prev',
        },
    });

    const swiperGallery = new Swiper('#main-gallery', {
        slidesPerView: 1,
        navigation: {
            nextEl: '#main-gallery .swiper-button-next',
            prevEl: '#main-gallery .swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
        },
    });

    const swiperGalleryBlocks = new Swiper('#main-gallery-blocks', {
        slidesPerView: 1,
        autoplay: {
            delay: 3000,
        },
        effect: 'flip',
        fadeEffect: {
            crossFade: true
        },
    });

    const totalGallery = new Swiper('#total-gallery-blocks', {
        slidesPerView: 1,
        navigation: {
            nextEl: '.total-gallery-navigation .swiper-button-next',
            prevEl: '.total-gallery-navigation .swiper-button-prev',
        },
        pagination: {
            el: '.total-gallery-navigation .pagination',
            clickable: true,
            renderBullet: function (index, className) {
                return `<span class="pagination-number `+ className +`">`+ (index+1) +`</span>`;
            },
        },
    });

    const productSliderThumbs = new Swiper("#productSwiper", {
        spaceBetween: 10,
        slidesPerView: 6,
        direction: "vertical",
        freeMode: true,
        watchSlidesProgress: true,
    });
    const productSlider2 = new Swiper("#productSwiper2", {
        spaceBetween: 10,
        thumbs: {
            swiper: productSliderThumbs,
        },
    });

    //    Cart Page

    $('.woocommerce-cart-form').on('change', 'input.qty', function(){
        $("[name='update_cart']").trigger("click");
    });

    $(document).on('click','.minus-js', function (){
        let el = $(this).closest('.cart-item__count').find('.cart-item-count-input-js')
        let currentVal = Number(el.val())
        if(currentVal === 1) {
            return false
        } else {
            currentVal -= 1;
            el.val(currentVal);
            $(this).parent().find('.quantity-span-js').text(el.val());
            $('.woocommerce-cart-form #cart_product_'+ $(this).closest('.cart-item').data('product') +' .input-text.qty.text').val(currentVal);
            $("[name='update_cart']").prop( 'disabled', false).trigger("click");
        }
    });
    $(document).on('click','.plus-js', function (){
        let el = $(this).closest('.cart-item__count').find('.cart-item-count-input-js')
        let currentVal = Number(el.val())
        currentVal += 1;
        el.val(currentVal);
        $(this).parent().find('.quantity-span-js').text(el.val())
        $('.woocommerce-cart-form #cart_product_'+ $(this).closest('.cart-item').data('product') +' .input-text.qty.text').val(currentVal);
        $("[name='update_cart']").prop( 'disabled', false).trigger("click");
    });

    (function topTextFadeIn(){
        if($(".yellow-top-js").css('display') === 'none') {
            $(".white-top-js").fadeOut(0);
            $(".yellow-top-js").fadeIn(1500);
        } else {
            $(".yellow-top-js").fadeOut(0);
            $(".white-top-js").fadeIn(1500);
        }
        setTimeout(function () {
            topTextFadeIn()
        }, 5000);
    })();







//==========================  Authorize forms functionality ==========================

    $('#show-login-form-js').on('click', function (){
        $('.login-modal').addClass('active');
        $('.main-shadow').fadeIn();
    });
    $('.close-login-js, .main-shadow').on('click', function (){
        $('.login-modal').removeClass('active');
        $('.main-shadow').fadeOut();
    });
    $('.login-modal-show-js').on('click', function (){
        let selector = $(this).data('modal');
        $('.login-modal__item-form').fadeOut(0);
        $(selector).fadeIn();
    });

    $('.form-input').on('input', function (){
        if($(this).hasClass('error')) {
            $(this).removeClass('error');
            $(this).parent().find('.form-errors-wrap').remove();
        }
    });
    $('.password-input-js').on('input', function (){
        if($(this).val()) {
            $(this).addClass('active');
        } else $(this).removeClass('active');
    });

    //===== Log In form =====
    $('#login-form .submit-js').on('click', function (e) {
        e.preventDefault();
        $(this).parent().find('.form-errors-wrap').remove();

        if(!$('#login-form .user_login').val()) {
            $('#login-form .user_login').addClass('error')
            return
        }
        if(!$('#login-form .user_pass').val()) {
            $('#login-form .user_pass').addClass('error')
            return
        }

        $(this).prop('disabled', true);
        var data = {
            action: 'ajaxLogin',
            ajax_login: $('#login-form .user_login').val(),
            ajax_password: $('#login-form .user_pass').val(),
        }

        $.post( myAjax.ajaxurl, data, function(response) {
            var obj = JSON.parse(response);
            if(!obj.loggedin) {
                $('#login-form .form-input').addClass('error')
                $('#login-form .user_pass').after('<div class="form-errors-wrap"><p class="m-0"><span class="form-error">'+ obj.message +'</span></p></div>');
                $('#login-form .submit-js').prop('disabled', false);
            } else {
                window.location.href = "/my-account/edit-account/";
            }
        });
    });

    //===== Forgot Password Form =====
    $('#forgot-form .form-input').on('input', function (){
        if($('.forgot-form-description-js').hasClass('d-none')) $('.forgot-form-description-js').removeClass('d-none');
    });
    $('#forgot-form .submit-js').on('click', function (e){
        e.preventDefault();
        $(this).parent().find('.form-errors-wrap').remove();

        if(!$('#forgot-form .user_login').val()) {
            $('#forgot-form .user_login').addClass('error')
            return
        }

        $(this).prop('disabled', true);
        sendCodeToEmail();
    });
    $('.resend-code-js').on('click', function(e){
        if($(this).hasClass('disabled')) {
            e.preventDefault();
        } else {
            $(this).parent().find('.form-errors-wrap').remove();

            $(this).addClass('disabled');
            setTimeout(function (){
                $('.resend-code-js').removeClass('disabled');
            }, 3000);
            sendCodeToEmail();
        }
    });

    function sendCodeToEmail() {
        var data = {
            action: 'ajaxCheckemail',
            ajax_login: $('#forgot-form .user_login').val()
        }

        $.post(myAjax.ajaxurl, data, function (response) {
            var obj = JSON.parse(response);
            if(!obj.exists) {
                $('#forgot-form .user_login').addClass('error');
                $('#forgot-form .user_login').after('<div class="form-errors-wrap mb-2"><p class="m-0"><span class="form-error">'+ obj.message +'</span></p></div>');
                $('.forgot-form-description-js').addClass('d-none');
            } else {
                $('.email-to-send-js').text($('#forgot-form .user_login').val());
                $('.login-modal__item-form').fadeOut(0);
                $('#email-verification-form').fadeIn();
                $('#num1').val(''); $('#num2').val(''); $('#num3').val(''); $('#num4').val('');
            }

            $('#forgot-form .submit-js').prop('disabled', false);
        });
    }

    //===== Send Verification Code Form =====
    $('#email-verification-form .submit-js').on('click', function (e) {
        e.preventDefault();
        if (!$('#num1').val() || !$('#num2').val() || !$('#num3').val() || !$('#num4').val()) return false

        $(this).prop('disabled', true);
        let veryfyCode = ''+$('#num1').val() + ''+$('#num2').val()+ ''+$('#num3').val()+ ''+$('#num4').val()

        var data = {
            action: 'ajaxVerifycode',
            ajax_code: veryfyCode,
            ajax_login: $('#forgot-form .user_login').val()
        }

        $.post(myAjax.ajaxurl, data, function (response){
            var obj = JSON.parse(response);
            if(obj.success) {
                $('.login-modal__item-form').fadeOut(0);
                $('#change-password-form').fadeIn();
            }
        });
    });

    $('.input-num-js').on('input', function (){
        let val = $(this).val()
        if(val !== '') {
            $(this).addClass('active');

            if(val.match(/[^0-9]/g)) {
                $(this).val(val.replace(/[^0-9]/g, ''));
            }
            if(val.length > 1) $(this).val(val.slice(1))
            let maxVal = 9
            let minVal = 0
            if(Number(val) > maxVal) $(this).val(maxVal)
            if(Number(val) < minVal) $(this).val(minVal)
            if($(this).data('index') != 4) {
                let next = Number($(this).data('index')) + 1;
                $('#num' + next).focus();
            }

        } else $(this).removeClass('active');
    });

    $('#change-password-form .submit-js').on('click', function (e) {
        e.preventDefault();
        $(this).parent().find('.form-errors-wrap').remove();

        let password = $('#change-password-form .user_pass').val();
        let passwordConfirm = $('#change-password-form .user_pass_confirm').val();
        if(password !== passwordConfirm || password === '' || passwordConfirm === '') {
            $('#change-password-form .user_pass, #change-password-form .user_pass_confirm').addClass('error');
            $('#change-password-form .user_pass_confirm').after('<div class="form-errors-wrap mb-1"><p class="m-0 lh-1"><span class="form-error">Passwords don\'t match</span></p></div>');
            return false;
        }

        $(this).prop('disabled', true);

        var data = {
            action: 'ajaxSetpassword',
            ajax_login: $('#forgot-form .user_login').val(),
            ajax_password: password,
        }

        $.post(myAjax.ajaxurl, data, function (response){
            var obj = JSON.parse(response);
            console.log(obj)
            if(obj.success) {
                $('#change-password-form .user_pass, #change-password-form .user_pass_confirm').removeClass('active').val('');
                $('.login-modal__item-form').fadeOut(0);
                $('#changed-password-success').fadeIn();
            }
            $(this).prop('disabled', false);
        });
    });

    //===== Sign Up form =====
    $('#register-form .submit-js').on('click', function (e) {
        e.preventDefault();
        $(this).parent().find('.form-errors-wrap').remove();

        if(!$('#register-form .user_login').val() || !validateEmail($('#register-form .user_login').val())) {
            if(!validateEmail($('#register-form .user_login').val())) {
                $('#register-form .user_login').after('<div class="form-errors-wrap mb-1" style="margin-top: -0.5rem;"><p class="m-0 lh-1"><span class="form-error">Please enter your email address using the format name@example.com</span></p></div>');
            }
            $('#register-form .user_login').addClass('error')
            return
        }

        let password = $('#register-form .user_pass').val();
        let passwordConfirm = $('#register-form .user_pass_confirm').val();
        if(password !== passwordConfirm || password === '' || passwordConfirm === '') {
            $('#register-form .user_pass, #register-form .user_pass_confirm').addClass('error');
            $('#register-form .user_pass_confirm').after('<div class="form-errors-wrap mb-1" style="margin-top: -1.5rem;"><p class="m-0 lh-1"><span class="form-error">Passwords don\'t match</span></p></div>');
            return false;
        }

        $(this).prop('disabled', true);
        var data = {
            action: 'ajaxRegister',
            ajax_login: $('#register-form .user_login').val(),
            ajax_password: $('#register-form .user_pass').val(),
        }

        $.post( myAjax.ajaxurl, data, function(response) {
            var obj = JSON.parse(response);
            if(!obj.loggedin) {
                $('#register-form .form-input').addClass('error')
                $('#register-form .user_pass_confirm').after('<div class="form-errors-wrap mb-1" style="margin-top: -2rem;"><p class="m-0"><span class="form-error">'+ obj.message +'</span></p></div>');
                $('#register-form .submit-js').prop('disabled', false);
            } else {
                window.location.href = "/my-account/edit-account/";
            }
        });
    });


})