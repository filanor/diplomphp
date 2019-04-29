/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Search
4. Init Menu
5. Init Quantity


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var header = $('.header');
	var hambActive = false;
	var menuActive = false;

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	initSearch();
	initMenu();
	initQuantity();
	initTotalPrice();
	clearCart();
	delivery();


	/* 

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 100)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/* 

	3. Init Search

	*/

	function initSearch()
	{
		if($('.search').length && $('.search_panel').length)
		{
			var search = $('.search');
			var panel = $('.search_panel');

			search.on('click', function()
			{
				panel.toggleClass('active');
			});
		}
	}

	/* 

	4. Init Menu

	*/

	function initMenu()
	{
		if($('.hamburger').length)
		{
			var hamb = $('.hamburger');

			hamb.on('click', function(event)
			{
				event.stopPropagation();

				if(!menuActive)
				{
					openMenu();
					
					$(document).one('click', function cls(e)
					{
						if($(e.target).hasClass('menu_mm'))
						{
							$(document).one('click', cls);
						}
						else
						{
							closeMenu();
						}
					});
				}
				else
				{
					$('.menu').removeClass('active');
					menuActive = false;
				}
			});

			//Handle page menu
			if($('.page_menu_item').length)
			{
				var items = $('.page_menu_item');
				items.each(function()
				{
					var item = $(this);

					item.on('click', function(evt)
					{
						if(item.hasClass('has-children'))
						{
							evt.preventDefault();
							evt.stopPropagation();
							var subItem = item.find('> ul');
						    if(subItem.hasClass('active'))
						    {
						    	subItem.toggleClass('active');
								TweenMax.to(subItem, 0.3, {height:0});
						    }
						    else
						    {
						    	subItem.toggleClass('active');
						    	TweenMax.set(subItem, {height:"auto"});
								TweenMax.from(subItem, 0.3, {height:0});
						    }
						}
						else
						{
							evt.stopPropagation();
						}
					});
				});
			}
		}
	}

	function openMenu()
	{
		var fs = $('.menu');
		fs.addClass('active');
		hambActive = true;
		menuActive = true;
	}

	function closeMenu()
	{
		var fs = $('.menu');
		fs.removeClass('active');
		hambActive = false;
		menuActive = false;
	}

	/* 

	5. Init Quantity

	*/

	function initQuantity()
	{
		// Handle product quantity input
		if($('.product_quantity').length)
		{
			var incButton = $('.quantity_inc');
			var decButton = $('.quantity_dec');

			var originalVal;
			var endVal;

			incButton.on('click', function()
			{
				originalVal = $(this).parent().parent().find($('.quantity_input')).val();
				endVal = parseFloat(originalVal) + 1;
				$(this).parent().parent().find($('.quantity_input')).val(endVal);

				let price = $(this).parents('.cart_item').find($('.cart_item_price')).text();
				$(this).parents('.cart_item').find('.cart_item_total').text( price * endVal+ 'руб.');
				let id = $(this).parents('.cart_item').data('id');
				if(id) {
					changeTotal(id, endVal);
				}

			});

			decButton.on('click', function()
			{
				originalVal = $(this).parent().parent().find($('.quantity_input')).val();
				if(originalVal > 0)
				{
					endVal = parseFloat(originalVal) - 1;
					$(this).parent().parent().find($('.quantity_input')).val(endVal);
					let price = $(this).parents('.cart_item').find($('.cart_item_price')).text();
					$(this).parents('.cart_item').find('.cart_item_total').text( price * endVal + 'руб.');
					let id = $(this).parents('.cart_item').data('id');
					if(id) {
						changeTotal(id, endVal);
					}
				}
			});
		}
	}

	function changeTotal(id, endVal)
	{
		$.ajax({
			url: '../cart/change',
			method: 'GET',
			data: {id: id, qtty: endVal},
			success: function(res){
				console.log(res);
				$('.shopping_cart div span').text('(' + res + 'руб.)')
				let sum = 0,
					del = $('.delivery_option input:checked').val();

				$('.cart_item_total').each(function(indx){
					sum += parseInt($(this).text());
				})
				$('.cart_total_value-sum').text(sum + 'руб.')
				$('.cart_total_value-delivery').text(del + 'руб.')
				$('.cart_total_value-total').text(sum + +del + 'руб.')

			},
			error: function(err){
				console.log('нет');
			}
		})

	}



	// Устанавливаем начальные цены
	function initTotalPrice()
	{
		$('.cart_item_total').each(function(indx){
			let price  = $(this).parent().find($('.cart_item_price')).text(),
				qtty = $(this).parent().find($('.quantity_input')).val();
				$(this).text( (price * qtty) + 'руб.');
		});
	}


	// Доставка
	function delivery()
	{
		$('.delivery_option').on('click', function() {

			let delivery = $(this).find('input').val(),
				sum = $('.cart_total_value-sum').text();

			sum = parseInt(sum);

			$('.cart_total_value-delivery').text($(this).find('input').val() + 'руб.');
			$('.cart_total_value-total').text(+delivery + sum + 'руб.');

			$.ajax({
				url: '../cart/delivery',
				method: 'GET',
				data: {delivery: delivery},
				success: function(res){
					console.log(res)
				},
				error: function(err){
					console.log('нет');
				}
			})

		})
	}

	//Очистка корзины
	function clearCart(){
		$('.clear_cart_button').on('click', e=>{
			e.preventDefault();
			$.ajax({
				url: '../cart/clear',
				method: 'GET',
				success: function(res){
					$('.cart_item').remove();
					$('.shopping_cart div span').text('(0)');
					//$('.cart_info).empty();
					$('.cart_info').html("" +
						"<div style = \"width: 100%; text-align: center\">Корзина пока пуста :(</div>" +
						"<div class=\"button continue_shopping_button newsletter_button\" style='margin: 30px auto 50px auto;'><a href=\"/\">Продолжить покупки</a></div>" +
						"");
					console.log('да');
				},
				error: function(err){
					console.log('нет');
				}
			});
		});
	}










		// Устанавливаем начальные цены
		// $('.quantity_control').on('click', function(){
		// 	let a = $(this).parent().parent().find($('.quantity_input')).val();
		// 	console.log(a)
		// })
		//
		//
		// $('.cart_item_total').text(
		// 	$('.cart_item_total').siblings('.cart_item_quantity').children('.quantity_input').val()  * $('.cart_item_total').siblings('.cart_item_quantity').children(
		// 	'.cart_item_price').text() + 'руб'
		// );
		//
		//
		// // Узменяем цены при увелицении кол-ва
		// $('.quantity_control').on('click', ()=>{
		// 	$(this).parents('.cart_item_quantity').siblings('.cart_item_total').text($('.quantity_input').val() * $('.cart_item_price').text() + 'руб');
		// });
		//
		// // Удаление отдельного товара



});