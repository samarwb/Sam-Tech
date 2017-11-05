$(function() {
   $('.search-panel .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#", "");
        var concept = $(this).text();
        $('.search-panel span#search_concept').text(concept);
        $('.input-group #search_param').val(param);
    });

    $(".product_image .service1-item").click(function(e) {
        var image_id = $(this).attr('image_id');
        if (image_id != undefined) {
            $('.pruduct-full-image-class').addClass('hidden');
            $('.product_view_wrapper .product-image-full_' + image_id).removeClass('hidden');
        }
        e.preventDefault();
    });

    $(".add_product_button").click(function(e) {
        $('.main_product_option_wrapper').hide();
        var image_id = $(this).attr('image_id');
        if (image_id != undefined) {
            $('.pruduct-full-image-class').addClass('hidden');
            $('.product_view_wrapper .product-image-full_' + image_id).removeClass('hidden');
        }
        e.preventDefault();
    });
    
    $(".add_to_wish_list_button").click(function(e) {
        var wish_uid = $(this).attr('product_user');
        var wish_pid = $(this).attr('product_id');
        $.ajax({
                type: "POST",
                async: true,
                url: base_url + "/product/addtomywishlist",
                data: {wish_uid: wish_uid,wish_pid:wish_pid},
                success: function(data) {
                    if (data == 'true') {
                        $('.add_to_wish_list_button').addClass('hidden');
                        $('.delete_from_wish_list_button').removeClass('hidden');
                        $('#myWishListAction .modal-body').html('Product successfully added to your wish list.');
                        $('.my_wishlist_confirm_dialog_button').trigger('click');
                    }else{
                        $('.add_to_wish_list_button').removeClass('hidden');
                        $('.delete_from_wish_list_button').addClass('hidden');
                        $('#myWishListAction .modal-body').html('Sorry! Product was not added to your wish list.');
                        $('.my_wishlist_confirm_dialog_button').trigger('click');
                    }
                }
            });
       
    });
    
    $(".delete_from_wish_list_button").click(function(e) {
        var wish_uid = $(this).attr('product_user');
        var wish_pid = $(this).attr('product_id');
        $.ajax({
                type: "POST",
                async: true,
                url: base_url + "/product/deletefrommywishlist",
                data: {wish_uid: wish_uid,wish_pid:wish_pid},
                success: function(data) {
                    if (data == 'true') {
                        $('.add_to_wish_list_button').removeClass('hidden');
                        $('.delete_from_wish_list_button').addClass('hidden');
                        $('#myWishListAction .modal-body').html('Product successfully removed to your wish list.');
                        $('.my_wishlist_confirm_dialog_button').trigger('click');
                    }else{
                        $('.add_to_wish_list_button').addClass('hidden');
                        $('.delete_from_wish_list_button').removeClass('hidden');
                        $('#myWishListAction .modal-body').html('Sorry! Product was not added to your wish list.');
                        $('.my_wishlist_confirm_dialog_button').trigger('click');
                    }
                }
            });
       
    });

    $('#inputProductYear,#editProductYear').datepicker({
        dateFormat: "dd/mm/yy",
        maxDate: 'today',
        minDate: 'today("-50Y")',
    });

    $("#product_search_textbox").autocomplete({
        source: function(request, response) {
            var search = $('#product_search_textbox').val();
            var category = $('#headerProductCategory').val();
            $.ajax({
                type: "POST",
                async: true,
                url: base_url + "/search/searchautocomplete",
                data: {search_text: search,category:category},
                dataType: "json",
                success: function(data) {
                    if (data != null) {

                        response(data);
                    }
                }
            });
        }
    });
 
    // Product type auto complete
     $("#inputProductType").autocomplete({
        source: function(request, response) {
            var product_type = $('#inputProductType').val();
            $.ajax({
                type: "POST",
                async: true,
                url: base_url + "/product/producttypesearch",
                data: {product_type: product_type},
                dataType: "json",
                success: function(data) {
                    if (data != null) {
                        response(data);
                    }
                }
            });
        }
    });
    
    // Product company auto complete
     $("#inputProductCompany").autocomplete({
        source: function(request, response) {
            var product_company = $('#inputProductCompany').val();
            $.ajax({
                type: "POST",
                async: true,
                url: base_url + "/product/productcompanysearch",
                data: {product_company: product_company},
                dataType: "json",
                success: function(data) {
                    if (data != null) {
                        response(data);
                    }
                }
            });
        }
    });
    
    // Industry type auto complete
     $("#industryType").autocomplete({
        source: function(request, response) {
            var industry_type = $('#industryType').val();
            $.ajax({
                type: "POST",
                async: true,
                url: base_url + "/product/userindustrytype",
                data: {industry_type: industry_type},
                dataType: "json",
                success: function(data) {
                    if (data != null) {
                        response(data);
                    }
                }
            });
        }
    });
    
    // Industry type auto complete
     $("#inputUserLocation").autocomplete({
        source: function(request, response) {
            var location = $('#inputUserLocation').val();
            $.ajax({
                type: "POST",
                async: true,
                url: base_url + "/user/userlocationsearch",
                data: {location: location},
                dataType: "json",
                success: function(data) {
                    if (data != null) {
                        response(data);
                    }
                }
            });
        }
    });
    
    // Product category auto complete
     $("#inputProductCategory").autocomplete({
        source: function(request, response) {
            var product_category = $('#inputProductCategory').val();
            $.ajax({
                type: "POST",
                async: true,
                url: base_url + "/product/productcetogorysearch",
                data: {product_category: product_category},
                dataType: "json",
                success: function(data) {
                    if (data != null) {
                        response(data);
                    }
                }
            });
        }
    });

    $('.search_seller_details').click(function() {
        var min_length = 0; // min caracters to display the autocomplete
        var email = $('.seller_search_text_fied').val();
        var product_user = $(this).attr('product_user');
        if (email.trim() != '') {
            $.ajax({
                url: base_url + '/user/insertguest',
                type: 'POST',
                async: true,
                data: {email: email, product_user: product_user},
                success: function(data) {
                    var product_user_details = JSON.parse(data);
                    var name = product_user_details[0].name;
                    var email = product_user_details[0].email;
                    var uid = product_user_details[0].uid;
                    var mobile = product_user_details[0].mobile;
                    $('.seller_details_wrapper').addClass('hidden');
                    $('.seller_name').html('<div class="product_info_label">Seller Name:</div></div class="product_info_value">' + name + '</div>');
                    $('.seller_location').html('<div class="product_info_label">Seller Email:</div></div class="product_info_value">' + email + '</div>');
                    $('.seller_mobile').html('<div class="product_info_label">Seller Mobile:</div></div class="product_info_value">' + mobile + '</div>');
                    $('.seller_mobile').html('<div class="product_info_label"><a class="seller_full_details btn btn-default" href="'+base_url+'/user/userpublicprofileview/'+uid+'">Seller full details</a> </div>');
                    $('.seller_all_details_wrapper').removeClass('hidden');
                }
            });
        }

    });


//    Search price slider start
    if ($('.search-filter-wrapper').is(':visible')) {
        var minVal = $('.search-filter-wrapper #minPriceInput').val() != '' ? $('.search-filter-wrapper #minPriceInput').val() : 0;
        var maxVal = $('.search-filter-wrapper #maxPriceInput').val() != '' ? $('.search-filter-wrapper #maxPriceInput').val() : 1000000;
        minVal = parseInt(minVal);
        maxVal = parseInt(maxVal);
        $(".search-filter-wrapper #mySlider").slider({
            range: true,
            min: minVal,
            max: maxVal,
            values: [minVal, maxVal],
            slide: function(event, ui) {
                $('.search-filter-wrapper #minPriceInput').val(ui.values[ 0 ]);
                $('.search-filter-wrapper #maxPriceInput').val(ui.values[ 1 ]);
            }
        });
    }
//    Search price slider end




    $('#recentCarousel').carousel({
        interval: 8000
    });

    $('.carouselRecentProduct .item').each(function() {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 4; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });
    
    $('#MyAddedCarousel').carousel({
        interval: 7000
    });

    $('.carouselMyAddedProduct .item').each(function() {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < 4; i++) {
            next = next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    });

    $('#deleteMyproduct').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('id');
        var product_name = button.data('product_name');// Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        modal.find('#product_hidden_id').val(recipient);
        modal.find('.delete_product_name').text(product_name);
    });
    
    
    $('#editMyProduct').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('id'); 
        $(this).removeData();
        if (recipient != '' || recipient != undefined) {
            $.ajax({
                url: base_url + '/admin_add_controllar/getProductDetails',
                type: 'POST',
                async: false,
                data: {product_id: recipient,type:'ajax'},
                success: function(data) {
                    var product_user_details = JSON.parse(data);
                    var product_image = product_user_details['images'];
                    var product = product_user_details['products']
                    var date = (product[0].pro_purchased_year == '')? '': new Date(Date(parseInt(product[0].pro_purchased_year)));
                    date = (date == '')? '': date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();
                    $('#editProductName').val(product[0].pro_name);
                    $('#editProductId').val(product[0].pid)
                    $('#editProductDescription').val(product[0].pro_description);
                    $('#editProductCategory').val(product[0].pro_category);
                    $('#editProductType').val(product[0].pro_type);
                    $('#editProductModel').val(product[0].pro_model);
                    $('#editProductYear').val(date);
                    $('#editProductMake').val(product[0].pro_make);
                    $('#editProduct'+product[0].pro_uses).attr("checked",true);
                    $('#editProductLocation').val(product[0].pro_location);
                    $('#editProductCompany').val(product[0].pro_company);
                    $('#editProductPrice').val(product[0].pro_price);
                    $('#inputProductImage1 .edit_product_image img').attr('src','');
                    $('#inputProductImage2 .edit_product_image img').attr('src','');
                    $('#inputProductImage3 .edit_product_image img').attr('src','');
                    $('#inputProductImageFile1,#inputProductImageFile2,#inputProductImageFile3').removeClass('hidden');
                    $('#inputProductImage1,#inputProductImage2,#inputProductImage3').addClass('hidden');
                    if(product_image.length > 0){
                        if(product_image.length > 0){
                            $('#inputProductImageFile1').addClass('hidden');
                            $('#inputProductImage1').removeClass('hidden');
                            $('#inputProductImage1 .edit_product_image img').attr('src',product_image_directory+product_image[0].file_path);
                        }
                        if(product_image.length > 1){
                            $('#inputProductImageFile2').addClass('hidden');
                            $('#inputProductImage2').removeClass('hidden');
                            $('#inputProductImage2 .edit_product_image img').attr('src',product_image_directory+product_image[1].file_path);
                        }
                        if(product_image.length > 2){
                            $('#inputProductImageFile3').addClass('hidden');
                            $('#inputProductImage3').removeClass('hidden');
                            $('#inputProductImage3 .edit_product_image img').attr('src',product_image_directory+product_image[2].file_path);
                        }
                     }
                }
            });
        }
    });
    
    $('#viewMyProduct').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var recipient = button.data('id'); // Extract info from data-* attributes
        var action_type = button.data('action');
        $(this).removeData();
        if (recipient != '' || recipient != undefined) {
            $.ajax({
                url: base_url + '/admin_add_controllar/getProductDetails',
                type: 'POST',
                async: false,
                data: {product_id: recipient,type:'ajax'},
                success: function(data) {
                    var product_user_details = JSON.parse(data);
                    var product_image = product_user_details['images'];
                    var product = product_user_details['products']
                    var date = (product[0].pro_purchased_year == '')? '': new Date(Date(parseInt(product[0].pro_purchased_year)));
                    date = (date == '')? '': date.getDate() + '/' + (date.getMonth() + 1) + '/' +  date.getFullYear();
                    $('#viewMyProduct #viewProductName').val(product[0].pro_name);
                    $('#viewMyProduct #viewProductId').val(product[0].pid)
                    $('#viewMyProduct #viewProductDescription').val(product[0].pro_description);
                    $('#viewMyProduct #viewProductCategory').val(product[0].pro_category);
                    $('#viewMyProduct #viewProductType').val(product[0].pro_type);
                    $('#viewMyProduct #viewProductModel').val(product[0].pro_model);
                    $('#viewMyProduct #viewProductYear').val(date);
                    $('#viewMyProduct #viewProductMake').val(product[0].pro_make);
                    $('#viewMyProduct #viewProduct'+product[0].pro_uses).attr("checked",true);
                    $('#viewMyProduct #viewProductLocation').val(product[0].pro_location);
                    $('#viewMyProduct #viewProductCompany').val(product[0].pro_company);
                    $('#viewMyProduct #viewProductPrice').val(product[0].pro_price);
                    $('#viewMyProduct #viewProductImage1 .edit_product_image img').attr('src','');
                    $('#viewMyProduct #viewProductImage2 .edit_product_image img').attr('src','');
                    $('#viewMyProduct #viewProductImage3 .edit_product_image img').attr('src','');
                    $('#viewMyProduct #viewProductImageFile1,#inputProductImageFile2,#inputProductImageFile3').removeClass('hidden');
                    $('#viewMyProduct #viewProductImage1,#viewProductImage2,#viewProductImage3').addClass('hidden');
                    if(product_image.length > 0){
                        if(product_image.length > 0){
                            $('#viewMyProduct #viewProductImageFile1').addClass('hidden');
                            $('#viewMyProduct #viewProductImage1').removeClass('hidden');
                            $('#viewMyProduct #viewProductImage1 .edit_product_image img').attr('src',product_image_directory+product_image[0].file_path);
                        }
                        if(product_image.length > 1){
                            $('#viewMyProduct #viewProductImageFile2').addClass('hidden');
                            $('#viewMyProduct #viewProductImage2').removeClass('hidden');
                            $('#viewMyProduct #viewProductImage2 .edit_product_image img').attr('src',product_image_directory+product_image[1].file_path);
                        }
                        if(product_image.length > 2){
                            $('#viewMyProduct #viewProductImageFile3').addClass('hidden');
                            $('#viewMyProduct #viewProductImage3').removeClass('hidden');
                            $('#viewMyProduct #viewProductImage3 .edit_product_image img').attr('src',product_image_directory+product_image[2].file_path);
                        }
                     }
                }
            });
        }
       
        $('#viewMyProduct #viewProductName,#viewMyProduct #viewProductDescription,#viewMyProduct #viewProductCategory,#viewMyProduct #viewProductType,#viewMyProduct #viewProductModel,\n\
            #viewMyProduct #viewProductYear,#viewMyProduct #viewProductused,#viewMyProduct #viewProductunused,#viewMyProduct #viewProductMake,#viewMyProduct #viewProductLocation,#viewMyProduct #viewProductCompany,#viewMyProduct #viewProductPrice').attr('disabled',true);
        $('#viewMyProduct .product_add_image_wrapper .product_image_delete,#viewMyProduct .edit_button_wrapper .edit_button_save').addClass('hidden');
      
    });
    
    $('.product_image_delete span').click(function(){
        var image_id = $(this).attr('image');
        $('.product_add_image_wrapper #inputProductImage'+image_id).addClass('hidden');
        $('.product_add_image_wrapper #inputProductImageFile'+image_id).removeClass('hidden');
    });
    
    $('.comment_wrapper .contact_us_send_button').click(function(){
        var frm = $('#contact_us_form');
        frm.unbind('submit').bind('submit',function(ev) {
            $.ajax({
                type: frm.attr('method'),
                url: base_url + '/admin_add_controllar/insertcontactus',
                data: frm.serialize(),
                success: function (data) {
                   var message = JSON.parse(data);
                   if(message.error != undefined && message.error != ''){
                       $('#contactUsModel .modal-title').empty().html('Warning');
                       $('#contactUsModel .modal-body').empty().html(message.error);
                   }else{
                       $('#contactUsModel .modal-title').empty().html('Successful');
                       $('#contactUsModel .modal-body').empty().html(message.success);
                       $('.comment_wrapper #contact_us_form input,.comment_wrapper #contact_us_form textarea').each(function(){
                             $(this).val('');
                       });
                   }
                   $('.contact_us_modal_button').trigger("click");
                }
            });
            ev.preventDefault();
            ev.stopPropagation();
            return false;
        });
    });
    
    $('#giveReviewButton,.user_recomendation #recBtn').click(function(){
        var productid = $(this).attr('product_id');
        if(productid != ''){
            $('#reviewProductId').val(productid);
        }
    });
    $("#show_user_ratings_button,#show_user_review_button").click(function() {
        $('html, body').animate({
            scrollTop: $(".product_description_Wrapper").offset().top
        }, 1500);
        $('.product_description_Wrapper .product_review_tab').trigger("click");
   });
   $(".user_review_select_option").change(function() {
        var product_id = $(this).attr('product_id');
        var rating = $(this).val();
    $.ajax({ 
        url: base_url + '/user/userreviewajax',
        type: 'POST',
        data: {product_id: product_id,rating:rating},
        success: function(data){
            $('.user_review_full_wrapper').empty();
            $('.user_review_full_wrapper').append(data);
        }});
    });
    $('#custom_carousel').on('slide.bs.carousel', function (evt) {
      $('#custom_carousel .controls li.active').removeClass('active');
      $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    });
    
    $('#registration #first_name').keyup(function (evt) {
        var text = $(this).val();
        $(this).val(text.toUpperCase());
    });
    
    $('.product_add_wrapper_tab').click(function (e) {
        var text = $(this).attr('tab');
        if(text != undefined && text == 'main'){
            $('.main_product_category_wrapper').hide();
            $('.main_product_option_wrapper').show();
            $('.main_product_year_of_purchase').hide();
            $('#inputProductCategory').val(main_product_category);
            $('#inputProductType').val(main_product_type);
            $('.product_unused_radio').attr('checked', 'checked');
            $('#inputProductUsedIn').attr('required','true');
            $('#inputProductUsedWhere').attr('required','true');
        }else{
            $('#inputProductCategory').val('');
            $('#inputProductType').val('');
            $('.main_product_category_wrapper').show();
            $('.main_product_option_wrapper').hide();
            $('.main_product_year_of_purchase').show();
            $('#inputProductUsedIn').attr('required','false');
            $('#inputProductUsedWhere').attr('required','false');
        }
    });
    
    $('#pleasLoginButton').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var text = button.data('text');
        var modal = $(this);
        modal.find('.please_login_modal_text').val(text);
        $('.please_login_modal_text').html(text);
    });
    $('#addProductModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var type = button.data('type');
        $('.product_add_wrapper_tab_'+type).trigger("click");
    });
    
    $('#deleteMyBulkList').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var list_id = button.data('list_id');
        $('#deleteMyBulkList #bulk_list_hidden_id').val(list_id);
    });
    
    $('#editMyBulkList').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var type = button.data('action');
        var list_id = button.data('list_id')
        var list_name = button.data('list_name')
        if(type == 'create'){
            $('.bulk_list_edit_container').addClass('hidden');
        }else{
            $('.bulk_list_edit_container').removeClass('hidden');
            $('#bulk_list_name').attr('readonly', true);
            $('#bulk_list_id').val(list_id);
            $('#bulk_list_name').val(list_name);
            $.ajax({
			url: base_url + "/search/getbulklistproducts",
			type : 'POST',
			data: {list_id: list_id},
                        async : false,
			success : function(data) {
                            if(data != ''){
                            var full_data = $.parseJSON(data);
                            var tag_ids = [];
                            $.each(full_data, function (index, value) {
                                var item = value.split("|");
                                $('#bulk_list_container').append('<div class="bulk_list_product">'+item[0]+'<span id='+item[1]+' class="bulk_list_delete">X</span></div>');
                                tag_ids.push(item[1]);
                                $('#bulk_list_product_id').val( tag_ids.join( "," ) );
                            });
                         }
			}
                       
		});
        }
    });
    
    $('#bulk_list_product_name').autocomplete({
	source : function(request, response) {
            var product_name = $('#bulk_list_product_name').val();
		$.ajax({
			url: base_url + "/search/bulklistsearchproduct",
			type : 'post',
			data: {search_text: product_name},
                        dataType: "json",
			success : function(data) {
				response($.map(data, function(item) {
					var code = item.split("|");
					return {
						label : code[0],
						value : code[0],
						data : item
					}
				}));
			}
		});
	},
	autoFocus : true,
	minLength : 0,
	select : function(event, ui) {
		var names = ui.item.data.split("|");
		tag_ids = [];
		tags = $('#bulk_list_product_id').val();
		if(tags != '')tag_ids = tags.split(',');
		tag_ids.push(names[1]);
		$('#bulk_list_product_id').val( tag_ids.join( "," ) );
		
		html = '' + names[0] + '';
		$('#bulk_list_container').append('<div class="bulk_list_product">'+html+'<span id='+names[1]+' class="bulk_list_delete">X</span></div>');
		$('#bulk_list_product_name').val('');
	},
	open : function() {
		$(this).removeClass("ui-corner-all").addClass("ui-corner-top");
	},
	close : function() {
		$(this).removeClass("ui-corner-top").addClass("ui-corner-all");
		$(this).val('');
	}
    });
    
    $(document).on('click', '.bulk_list_product .bulk_list_delete', function() {
	id = $(this).attr('id');
	tags = $('#bulk_list_product_id').val();
	tag_ids = tags.split(',');
	var index = tag_ids.indexOf(id);
	if (index > -1) {
		tag_ids.splice(index, 1);
		ids = tag_ids.join( "," );
		$('#bulk_list_product_id').val( ids );
	}else{
		ids = tag_ids.join( "," );
		$('#bulk_list_product_id').val( ids );
	}
	
	$(this).parent().remove();
});
    
});