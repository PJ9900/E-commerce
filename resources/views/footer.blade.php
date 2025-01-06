  <!-- footer area -->
  <footer class="footer-area ft-bg">
      <div class="footer-widget">
          <div class="container">
              <div class="row footer-widget-wrapper pt-50 ">
                  <div class="col-md-6 col-lg-3">
                      <div class="footer-widget-box about-us">
                          <a href="{{route('index')}}" class="footer-logo">
                              <img src="{{asset('assets/img/logo/Home_Core_Logo_page.jpg')}}" alt="">
                          </a>
                          <p class="mb-3">
                              We are many variations of the passages available but the majoro have suffered alteration
                              injected.
                          </p>
                          <div class="footer-social">
                              <a href="#"><i class="fab fa-facebook-f"></i></a>
                              <a href="#"><i class="fab fa-x-twitter"></i></a>
                              <a href="#"><i class="fab fa-linkedin-in"></i></a>
                              <a href="#"><i class="fab fa-youtube"></i></a>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-2">
                      <div class="footer-widget-box list">
                          <h4 class="footer-widget-title">Quick Links</h4>
                          <ul class="footer-list">
                              <li><a href="{{route('about')}}">About Us</a></li>
                              <li><a href="{{route('contact')}}">Contact Us</a></li>
                              <li><a href="{{route('blog')}}">News & Blogs</a></li>
                              <li><a href="{{route('gallery')}}">Gallery</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-2">
                      <div class="footer-widget-box list">
                          <h4 class="footer-widget-title">Support</h4>
                          <ul class="footer-list">

                              <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                              <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                              <li><a href="{{route('terms')}}">Legal Desclaimer</a></li>
                              <li><a href="{{route('return')}}">Returns Policy</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-2">
                      <div class="footer-widget-box list">
                          <h4 class="footer-widget-title">Categories</h4>
                          <ul class="footer-list">
                              @foreach ($footer as $item)
                              <li><a
                                      href="{{route('categories.shop',['slug' => $item->slug])}}">{{$item->tcat_name}}</a>
                              </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                      <div class="footer-widget-box list">
                          <h4 class="footer-widget-title">Address</h4>

                          <ul class="footer-contact">
                              <li><a href="tel:+21236547898"><i class="far fa-phone"></i>+2 123 654 7898</a></li>
                              <li><a href="#"><i class="far fa-envelope"></i><span class="__cf_email__"
                                          data-cfemail="71181f171e311409101c011d145f121e1c">[email&#160;protected]</span></a>
                              </li>
                              <li><i class="far fa-map-marker-alt"></i>25/B Milford Road, New York</li>

                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="copyright">
          <div class="container">
              <div class="copyright-wrap">
                  <div class="row">
                      <div class="col-12 col-lg-12 align-self-center">

                          <p class="copyright-text text-center">Copyright © 2024 <b>Homecore</b> All rights reserved
                              &amp; Design &amp; Developed By<a class="text-danger"
                                  href="https://wedigitalindia.com/">&nbsp;WeDigital India
                              </a></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- footer area end -->

  <!-- scroll-top -->
  <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
  <!-- scroll-top end -->

  <!-- modal quick shop-->
  <div class="modal quickview fade" id="quickview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="quickview" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                      class="far fa-xmark"></i></button>
              <div class="modal-body">
                  {{-- <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <img src="{{asset('assets/img/product/04.png')}}" alt="#">
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <div class="quickview-content">
                      <h4 class="quickview-title">Simple Denim Chair</h4>
                      <div class="quickview-rating">
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star-half-alt"></i>
                          <i class="far fa-star"></i>
                          <span class="rating-count"> (4 Customer Reviews)</span>
                      </div>
                      <div class="quickview-price">
                          <h5><del>$860</del><span>$740</span></h5>
                      </div>
                      <ul class="quickview-list">
                          <li>Brand:<span>Ricordi</span></li>
                          <li>Category:<span>Living Room</span></li>
                          <li>Stock:<span class="stock">Available</span></li>
                          <li>Code:<span>789FGSA</span></li>
                      </ul>
                      <div class="quickview-cart">
                          <a href="#" class="theme-btn">Add to cart</a>
                      </div>
                      <div class="quickview-social">
                          <span>Share:</span>
                          <a href="#"><i class="fab fa-facebook-f"></i></a>
                          <a href="#"><i class="fab fa-x-twitter"></i></a>
                          <a href="#"><i class="fab fa-pinterest-p"></i></a>
                          <a href="#"><i class="fab fa-instagram"></i></a>
                          <a href="#"><i class="fab fa-linkedin-in"></i></a>
                      </div>
                  </div>
              </div>
          </div> --}}
      </div>
  </div>
  </div>
  </div>
  <!-- modal quick shop end -->

  <!-- js -->
  <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
  <script src="{{asset('assets/js/modernizr.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.appear.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/counter-up.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{asset('assets/js/countdown.min.js')}}"></script>
  <script src="{{asset('assets/js/wow.min.js')}}"></script>
  <script src="{{asset('assets/js/flex-slider.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script>
$(document).ready(function() {

    $(document).on('click', '.myQuickView', function() {
        // Get product data from the clicked link's data attributes
        var productId = $(this).data('id');
        var productName = $(this).data('name');
        var productDescription = $(this).data('description');
        var productPrice = $(this).data('price');
        var productImage = $(this).data('image');
        var productSlug = $(this).data('slug');
        var discountedPrice = ((productPrice * 0.2) + productPrice);
        $('.modal-body').html(`<div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <img src="${productImage}" alt="#">
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h4 class="quickview-title">${productName}</h4>
                            <div class="quickview-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                                <span class="rating-count"> (4 Customer Reviews)</span>
                            </div>
                            <div class="quickview-price">
                                <h5><span>&#8377; ${productPrice}</span></h5>
                            </div>
                            <div class="shop-single-cs">
                            <div class="row">
                                <input type="text" hidden name="prod_id" id="prod_id" value="${productId}" >
                                <div class="">
                                    <div class="shop-single-size">
                                        <h6>Quantity</h6>
                                        <div class="shop-cart-qty">
                                            <button class="minus-btn-1"><i class="fal fa-minus"></i></button>
                                            <input class="quantity" type="text" value="1" disabled="">
                                            <button class="plus-btn-1"><i class="fal fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-6">
                                    <div class="shop-single-size">
                                        <h6>Size</h6>
                                        <select class="form-select select">
                                            <option value="">Choose Size</option>
                                            <option value="xm">Extra Small</option>
                                            <option value="sm">Small</option>
                                            <option value="m">Medium</option>
                                            <option value="xl">Extra Large</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="shop-single-size shop-single-color">
                                        <h6>color</h6>
                                        <select class="form-select select_color shop-checkbox-list color">
                                            <option value="">Choose Color</option>
                                            <option value="Red">Red</option>
                                            <option value="Blue">Blue</option>
                                            <option value="Black">Black</option>
                                            <option value="White">White</option>
                                            <option value="Orange">Orange</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                            </div>
                             </div>
                            <ul class="quickview-list">
                                <li>Stock:<span class="stock">Available</span></li>
                            </ul>
                            <div class="quickview-cart">
                                <a href="#" style="width: 132px; border-radius: 4px;" value="${productId}" class="addToCartFunctionality product-cart-btn theme-btn" >Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`);

    });

    
    function updateWishlistCount() {

    fetch('/get-wishlist-count')  
        .then(response => response.json())
        .then(data => {
            document.getElementById('wishlist-count').textContent = data.wishlistCount;
        })
        .catch(error => console.log(error));
    }



    $('.myWishlistCheck').click(function(event) {
        event.preventDefault();

        var itemId = $(this).attr('value');

        $.ajax({
            url: '{{ route("add.wishlist") }}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                item_id: itemId
            },
            success: function(response) {
                if (response.success) {
                    $('.nav-right-list').load(document.URL + ' .nav-right-list');
                    alert(response.message);
                    updateWishlistCount();
                    console.log('Updated Wishlist:', response.wishlist);
                } else {
                    alert('An error occurred while adding the item to the wishlist.');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred while processing your request.');
            }
        });
    });

    // Increase quantity
    $(document).on('click', '.plus-btn-1', function() {
        var quantityInput = $(this).closest('.shop-cart-qty').find('.quantity');
        var currentQuantity = parseInt(quantityInput.val());
        var newQuantity = currentQuantity + 1;
        quantityInput.val(newQuantity);

    });

    // Decrease quantity
    $(document).on('click', '.minus-btn-1', function() {
        var quantityInput = $(this).closest('.shop-cart-qty').find('.quantity');
        var currentQuantity = parseInt(quantityInput.val());

        // Prevent quantity from going below 1
        if (currentQuantity > 1) {
            var newQuantity = currentQuantity - 1;
            quantityInput.val(newQuantity);
        }
    });


    function updateCartCount() {
    fetch('/get-cart-count')   
        .then(response => response.json())
        .then(data => {
            document.getElementById('cart-count').textContent = data.cartCount;
        })
        .catch(error => console.log(error));
    }



    // add to cdoe here
    $(document).on('click', '.addToCartFunctionality', function(event) {
        event.preventDefault();
        // for getting quantity of product
        var value = $('.quantity').val();
        var itemId = $('#prod_id').val();
        var selectedSize = $('.select').val();
        var selectedColor = $('.select_color').val();
        var qty = value;
        console.log(itemId + ' ' + value + ' ' + selectedSize + ' ' + selectedColor)
        if (!selectedSize || !selectedColor) {
            alert("Please select both size and color!");
            return;
        }

        $.ajax({
            url: '{{ route("add.cart") }}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                item_id: itemId,
                size: selectedSize,
                color: selectedColor,
                qty: qty
            },
            success: function(response) {
                if (response.success) {
                    if (response.exist) {
                        alert('Product is already exist');
                        return;
                    } else {
                        var path = window.location.pathname;
                        var lastPart = path.split('/').pop();
                        if (lastPart == 'wishlist') {
                            $.ajax({
                                url: '{{ route("remove.wishlist") }}',
                                type: 'POST',
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr(
                                        'content'),
                                    item_id: itemId
                                },
                                success: function(response) {
                                    if (response.success) {
                                        // alert(response.message);
                                        $('#exist_wishlist_products').load(
                                            document.URL +
                                            ' #exist_wishlist_products');
                                        // location.reload();
                                        // console.log('deleted wishlist:', response.wishlist); 
                                    } else {
                                        alert(
                                            'An error occurred while deleting the item to the wishlist.');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log(xhr.responseText);
                                    alert(
                                        'An error occurred while processing your request.');
                                }
                            });
                        } else {
                            alert(response.message);
                            console.log('Updated Wishlist:', response.addtocart);

                        }
                       
                        updateCartCount();
                        $('#quickview').modal(
                        'hide'); // Replace 'myModal' with your modal's ID
                    }
                } else {
                    alert('An error occurred while adding the item to the cart.');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred while processing your request.');
            }
        });
    })

    // update quantity of product 
    $(document).on('click', '.updateQty', function(e) {
        e.preventDefault();

        var row = $(this).closest('tr');
        var updatedQty = row.find('input.quantity').val();
        var product_size = row.find('.updated_size').text().replace('Size:', '').trim();
        var product_color = row.find('.updated_color').text().replace('Color:', '').trim();
        var productId = row.data('product-id');

        console.log(updatedQty + '  ' + productId);

        $.ajax({
            url: '{{ route("update.qty") }}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                item_id: productId,
                size: product_size,
                color: product_color,
                qty: updatedQty
            },
            success: function(response) {
                if (response.success) {
                    // alert(response.message);
                    console.log('Updated Qty:', response.addtocart);

                } else {
                    alert('An error occurred while updating the qty.');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred while processing your request.');
            }
        });

    })

    $('.remove_from_wishlist').click(function(event) {
        event.preventDefault();

        var itemId = $(this).attr('data-id');

        $.ajax({
            url: '{{ route("remove.wishlist") }}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                item_id: itemId
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    // location.reload();
                    // $('#exist_wishlist_products').load(document.URL +  ' #exist_wishlist_products');
                    console.log('deleted wishlist:', response.wishlist);
                } else {
                    alert('An error occurred while deleting the item to the wishlist.');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred while processing your request.');
            }
        });

    })


    $('.shop-cart-remove').click(function(event) {
        event.preventDefault();

        var itemId = $(this).attr('value');

        $.ajax({
            url: '{{ route("remove.addtocart") }}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                item_id: itemId
            },
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    location.reload();
                    // $('#cartTable').load(document.URL +  ' #cartTable');
                    // $('#cart_summary_data').load(document.URL +  ' #cart_summary_data');
                    console.log('updated cart :', response.addtocart);
                } else {
                    alert('An error occurred while deleting the item to the wishlist.');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('An error occurred while processing your request.');
            }

        });

    })

    // When any radio button is clicked
    $('input[name="shipping"]').on('change', function() {
        // Get the value of the clicked radio button
        var selectedValue = $(this).val();

        if (selectedValue == 'shipping_same') {
            $('#Accordion_shipping').hide();
        } else {
            $('#Accordion_shipping').show();
        }

    });

});
  </script>

  </body>

  </html>