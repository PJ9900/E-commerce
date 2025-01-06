/*=====================================================
Template Name   : Fameo
Description     : Furniture Store HTML5 Template
Author          : LunarTemp
Version         : 1.0
=======================================================*/

(function ($) {
    "use strict";

    // preloader
    $(window).on("load", function () {
        $(".preloader").fadeOut("slow");
    });

    // navbar fixed top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".navbar").addClass("fixed-top");
        } else {
            $(".navbar").removeClass("fixed-top");
        }
    });

    // category all
    $(".category-btn").on("click", function () {
        $(".main-category").toggle();
    });

    // header Search
    if ($(".search-box-outer").length) {
        $(".search-box-outer").on("click", function () {
            $("body").addClass("search-active");
        });
        $(".close-search").on("click", function () {
            $("body").removeClass("search-active");
        });
    }

    // multi level dropdown menu
    $(".dropdown-menu a.dropdown-toggle").on("click", function (e) {
        if (!$(this).next().hasClass("show")) {
            $(this)
                .parents(".dropdown-menu")
                .first()
                .find(".show")
                .removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass("show");

        $(this)
            .parents("li.nav-item.dropdown.show")
            .on("hidden.bs.dropdown", function (e) {
                $(".dropdown-submenu .show").removeClass("show");
            });
        return false;
    });

    // navbar dropdown-right
    $(window).resize(function () {
        let ndr = $(".navbar-nav .nav-item.dropdown").slice(-2);
        if ($(window).width() > 991 && $(window).width() < 1199) {
            ndr.addClass("dropdown-right");
        } else {
            ndr.removeClass("dropdown-right");
        }
    });

    // data-background
    $(document).on("ready", function () {
        $("[data-background]").each(function () {
            $(this).css(
                "background-image",
                "url(" + $(this).attr("data-background") + ")"
            );
        });
    });

    // wow init
    new WOW().init();

    // hero slider
    $(".hero-slider").owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        margin: 0,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        items: 1,
        navText: [
            "<i class='far fa-angle-left'></i>",
            "<i class='far fa-angle-right'></i>",
        ],

        onInitialized: function (event) {
            var $firstAnimatingElements = $(".hero-slider .owl-item")
                .eq(event.item.index)
                .find("[data-animation]");
            doAnimations($firstAnimatingElements);
        },

        onChanged: function (event) {
            var $firstAnimatingElements = $(".hero-slider .owl-item")
                .eq(event.item.index)
                .find("[data-animation]");
            doAnimations($firstAnimatingElements);
        },
    });

    //hero slider do animations
    function doAnimations(elements) {
        var animationEndEvents =
            "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data("delay");
            var $animationDuration = $this.data("duration");
            var $animationType = "animated " + $this.data("animation");
            $this.css({
                "animation-delay": $animationDelay,
                "-webkit-animation-delay": $animationDelay,
                "animation-duration": $animationDuration,
                "-webkit-animation-duration": $animationDuration,
            });
            $this.addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
        });
    }

    // product slider
    $(".product-slider").owlCarousel({
        items: 5,
        loop: true,
        margin: 15,
        smartSpeed: 400,
        nav: true,
        autoplay: false,
        autoplayHoverPause: true,
        dots: false,
        navText: [
            "<i class='far fa-angle-left'></i>",
            "<i class='far fa-angle-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
            1200: {
                items: 5,
            },
        },
    });

    // product slider 2
    $(".product-slider2").owlCarousel({
        items: 3,
        loop: true,
        margin: 20,
        smartSpeed: 400,
        nav: true,
        autoplay: false,
        autoplayHoverPause: true,
        dots: false,
        navText: [
            "<i class='far fa-angle-left'></i>",
            "<i class='far fa-angle-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
            1200: {
                items: 3,
            },
        },
    });

    // deal slider
    $(".deal-slider").owlCarousel({
        items: 1,
        loop: true,
        margin: 15,
        smartSpeed: 400,
        nav: false,
        dots: true,
        autoplayHoverPause: true,
        autoplay: false,
        navText: [
            "<i class='far fa-angle-left'></i>",
            "<i class='far fa-angle-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });

    // testimonial slider
    $(".testimonial-slider").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
            1400: {
                items: 4,
            },
        },
    });

    // brand slider
    $(".brand-slider").owlCarousel({
        loop: true,
        margin: 40,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 6,
            },
        },
    });

    // category slider
    $(".category-slider").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        autoplay: false,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 4,
            },
            1200: {
                items: 6,
            },
            1400: {
                items: 6,
            },
        },
    });

    // instagram-slider
    $(".instagram-slider").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });

    // fun fact counter
    $(".counter").countTo();
    $(".counter-box").appear(
        function () {
            $(".counter").countTo();
        },
        {
            accY: -100,
        }
    );

    // magnific popup init
    $(".popup-gallery").magnificPopup({
        delegate: ".popup-img",
        type: "image",
        gallery: {
            enabled: true,
        },
    });

    $(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });

    // scroll to top
    $(window).scroll(function () {
        if (
            document.body.scrollTop > 100 ||
            document.documentElement.scrollTop > 100
        ) {
            $("#scroll-top").addClass("active");
        } else {
            $("#scroll-top").removeClass("active");
        }
    });

    $("#scroll-top").on("click", function () {
        $("html, body").animate({ scrollTop: 0 }, 1500);
        return false;
    });

    // countdown
    $("[data-countdown]").each(function () {
        let finalDate = $(this).data("countdown");
        $(this).countdown(finalDate, function (event) {
            $(this).html(
                event.strftime(
                    '<div class="row"><div class="col countdown-item"><h2>%-D</h2><h5>Day%!d</h5></div><div class="col countdown-item"><h2>%H</h2><h5>Hours</h5></div><div class="col countdown-item"><h2>%M</h2><h5>Minutes</h5></div><div class="col countdown-item"><h2>%S</h2><h5>Seconds</h5></div></div>'
                )
            );
        });
    });

    // copywrite date
    let date = new Date().getFullYear();
    $("#date").html(date);

    // nice select
    $(".select").niceSelect();

    // price range slider
    if ($(".price-range").length) {
        $(".price-range").slider({
            range: true,
            min: 0,
            max: 5000,
            values: [500, 2000],
            slide: function (event, ui) {
                $("#price-amount").val(
                    "$" + ui.values[0] + " - $" + ui.values[1]
                );
            },
        });
        $("#price-amount").val(
            "$" +
                $(".price-range").slider("values", 0) +
                " - $" +
                $(".price-range").slider("values", 1)
        );
    }

    //cart quantity
    // $(".plus-btn").on("click", function () {
    //     var i = $(this).closest(".shop-cart-qty").children(".quantity").get(0).value++,
    //         c = $(this).closest(".shop-cart-qty").children(".minus-btn");
    //     i > 0 && c.removeAttr("disabled");
    // }),
    // $(".minus-btn").on("click", function () {
    //     2 == $(this).closest(".shop-cart-qty").children(".quantity").get(0).value-- && $(this).attr("disabled", "disabled");
    // })

    // // flexslider
    // if ($('.flexslider-thumbnails').length) {
    //     $('.flexslider-thumbnails').flexslider({
    //         animation: "slide",
    //         controlNav: "thumbnails",
    //     });
    // }

    // Function to update the subtotal for each product based on quantity
    function updateSubtotal(row) {
        var quantity = parseInt(row.find(".quantity").val());
        var price = parseFloat(
            row.find(".item-price").text().replace("₹", "").trim()
        );
        var subtotal = quantity * price;

        // Update the subtotal text
        row.find(".item-subtotal").text("₹" + subtotal.toFixed(2)); // Format to 2 decimal places
    }

    // Increase quantity
    $(".plus-btn").on("click", function () {
        var row = $(this).closest("tr"); // Get the closest row
        var quantityInput = row.find(".quantity");

        // Increase the quantity by 1
        var currentQuantity = parseInt(quantityInput.val());
        quantityInput.val(currentQuantity + 1);

        // Enable the minus button if quantity is greater than 1
        if (currentQuantity + 1 > 1) {
            row.find(".minus-btn").removeAttr("disabled");
        }

        // Update subtotal
        updateSubtotal(row);
    });

    // Decrease quantity
    $(".minus-btn").on("click", function () {
        var row = $(this).closest("tr"); // Get the closest row
        var quantityInput = row.find(".quantity");

        // Decrease the quantity by 1
        var currentQuantity = parseInt(quantityInput.val());
        if (currentQuantity > 1) {
            quantityInput.val(currentQuantity - 1);
        }

        // Disable the minus button if quantity is 1
        if (parseInt(quantityInput.val()) <= 1) {
            row.find(".minus-btn").attr("disabled", "disabled");
        }

        // Update subtotal
        updateSubtotal(row);
    });

    // end here to update cart quantity

    // updating the cart summary starts from here

    const discountPercentage = 10; // 10% discount
    const shippingCost = 0; // Free shipping (set to 0, update if shipping rules are different)
    const taxRate = 0.18; // 18% tax rate

    // Function to update cart summary

    function updateCartSummary() {
        let subtotal = 0;
        let discount = 0;

        // Loop through all the items in the cart
        $("tr[data-product-id]").each(function () {
            let quantity = parseInt($(this).find(".quantity").val());
            let price = parseFloat(
                $(this).find(".item-price").text().replace("₹", "").trim()
            );

            // Calculate subtotal per item
            let itemSubtotal = quantity * price;

            // // Apply gst
            // let itemDiscount = itemSubtotal * taxRate;

            // Add to the total subtotal and discount
            subtotal += itemSubtotal;
            // discount += itemDiscount;
        });

        // Calculate taxes (5% of the subtotal after discount)
        let taxes = subtotal * taxRate;

        // Total is subtotal - discount + taxes + shipping
        let total = subtotal + taxes;

        // Update the cart summary in the DOM
        $("#cart-subtotal").text("₹" + subtotal.toFixed(2));
        $("#cart-subtotal-1").val(subtotal.toFixed(2));

        // $("#cart-discount").text("₹" + discount.toFixed(2));
        $("#cart-taxes").text("₹" + taxes.toFixed(2));
        $("#cart-taxes-1").val(taxes.toFixed(2));

        // If shipping is free, display "Free", otherwise show shipping cost
        if (shippingCost === 0) {
            $("#cart-shipping").text("Free");
        } else {
            $("#cart-shipping").text("₹" + shippingCost.toFixed(2));
        }

        // Update the total
        $("#cart-total").text("₹" + total.toFixed(2));
        $("#cart-total-1").val(total.toFixed(2));
    }

    // Function to handle quantity change and recalculate the summary
    $(".plus-btn").on("click", function () {
        var row = $(this).closest("tr");
        var quantityInput = row.find(".quantity");
        var currentQuantity = parseInt(quantityInput.val());
        quantityInput.val(currentQuantity);

        // Update cart summary after quantity change
        updateCartSummary();
    });

    $(".minus-btn").on("click", function () {
        var row = $(this).closest("tr");
        var quantityInput = row.find(".quantity");
        var currentQuantity = parseInt(quantityInput.val());
        if (currentQuantity > 1) {
            quantityInput.val(currentQuantity);
        }

        // Update cart summary after quantity change
        updateCartSummary();
    });

    // Call the function to initialize the cart summary on page load
    updateCartSummary();

    // updating the cart summary ends from here

    // bootstrap tooltip enable
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-tooltip="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // profile image btn
    $(".profile-img-btn").on("click", function () {
        $(".profile-img-file").click();
    });

    // message bottom scroll
    if ($(".message-content-info").length) {
        $(function () {
            var chatbox = $(".message-content-info");
            var chatheight = chatbox[0].scrollHeight;
            chatbox.scrollTop(chatheight);
        });
    }

    // modal popup banner
    $(window).on("load", function () {
        setTimeout(function () {
            $("#popup-banner").modal("show");
        }, 3000);
    });

    // invoice print
    $(".invoice-print-btn").click(function () {
        $(".invoice-print-btn").hide();
        $(".invoice-container").removeClass("not-print");
        window.print();
        $(".invoice-container").addClass("not-print");
        $(".invoice-print-btn").show();
    });
})(jQuery);
