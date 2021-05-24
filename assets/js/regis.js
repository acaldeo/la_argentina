
function eMsg(params){
	alert("Error: L"+params+"+");
}//end eMsg

//login
$(document).on('submit', '#form-login', function(event) {
	event.preventDefault();
	/* Act on the event */
	var un = $('#un').val();
	var up = $('#up').val();

	$.ajax({
			url: 'data/login_user.php',
			type: 'post',
			dataType: 'json',
			data: {
				un:un,
				up:up
			},
			success: function (data) {
				console.log(data);
				if(data.logged == true){
					window.location = data.url;
				}else{
					alert(data.msg);
					$('#un').focus();
				}
			},
			error: function(){
				alert('Error: L17+');
			}
		});
});
//all proveedores
function showAllproveedor()
{
	$.ajax({
			url: 'data/all_proveedor.php',
			success: function (data) {
				$('#all-proveedor').html(data);
			},
			error: function(){
				alert('Error: L43+');
			}
		});
}//end showAllProveedor
showAllproveedor();
$('#add-new-proveedor').click(function(event) {
	/* Act on the event */
	$('#modal-proveedor').find('.modal-title').text('Agregar Proveedor');
	$('#modal-proveedor').modal('show');
	$('#submit-proveedor').val('add');
});
//add proveedor
$(document).on('submit', '#form-proveedor', function(event) {
	event.preventDefault();
	/* Act on the event */
	var Pname = $('#proveedor-name').val();
	var Pdireccion = $('#proveedor-direccion').val();
	var Plocalidad = $('#proveedor-localidad').val();
	var Pprovincia = $('#proveedor-provincia').val();
	var Ptelefono = $('#proveedor-telefono').val();
	var Pmail = $('#proveedor-email').val();
	var Pcuit = $('#proveedor-cuit').val();
	var Pcbu = $('#proveedor-cbu').val();
	
    if($('#submit-proveedor').val() == "add"){
    	// console.log('add ra');
    	
	    $.ajax({
	    		url: 'data/add_proveedor.php',
	    		type: 'post',
	    		dataType: 'json',
	    		data: {
	    			Pname:Pname,
	    			Pdireccion:Pdireccion,
	    			Plocalidad:Plocalidad,
	    			Pprovincia:Pprovincia,
	    			Ptelefono:Ptelefono,
	    			Pmail:Pmail,
	    			Pcuit:Pcuit,
	    			Pcbu:Pcbu
	    			
	    		},
	    		success: function (data) {
	    			console.log(data);
	    			if(data.valid == true){
	    				$('#modal-message').find('#msg-body').text(data.msg);
	    				$('#modal-proveedor').modal('hide');
	    				showAllproveedor();
	    				$('#modal-message').modal('show');
	    				$('#submit-proveedor').val('null');
	    			}
	    		},
	    		error: function(){
	    			eMsg('71');
	    		}//
	    	});
    }//end if == "add"
});
function editModalProveedor(proveedor_id){
	// $('#submit-proveedor').val('add');
	
	$.ajax({
			url: 'data/get_proveedor.php',
			type: 'post',
			dataType: 'json',
			data: {

				proveedor_id:proveedor_id
			},

			success: function (data) {
				//console.log("success!!")
				console.log(data);
				$('#submit-proveedor').val(data.event);
				$('#proveedor-id').val(data.id);
				$('#proveedor-name').val(data.name);
				$('#proveedor-direccion').val(data.domicilio);
				$('#proveedor-localidad').val(data.localidad);
				$('#proveedor-provincia').val(data.provincia);
				$('#proveedor-telefono').val(data.telefono);
				$('#proveedor-email').val(data.email);
				$('#proveedor-cuit').val(data.cuit);
				$('#proveedor-cbu').val(data.cbu);
				$('#modal-proveedor').find('.modal-title').text("Editar proveedor");
				$('#modal-proveedor').modal('show');
				$('.modal-header').css('background-color', '#eb9316');
				$('.modal-header').css('color', 'white');

				
				
			},
			error: function(){
				//console.log("Entro!!!!!");
				alert('Error: L57+');

			}
		});
}//end editModal
$(document).on('submit', '#form-proveedor', function(event) {
	event.preventDefault();
	/* Act on the event */
	var submit = $('#submit-proveedor').val();
	var proveedor_id = $('#proveedor-id').val();
	var Pname = $('#proveedor-name').val();
	var Pdireccion = $('#proveedor-direccion').val();
	var Plocalidad = $('#proveedor-localidad').val();
	var Pprovincia = $('#proveedor-provincia').val();
	var Ptelefono = $('#proveedor-telefono').val();
	var Pmail = $('#proveedor-email').val();
	var Pcuit = $('#proveedor-cuit').val();
	var Pcbu = $('#proveedor-cbu').val();
	
	if(submit  == "edit"){
		$.ajax({
				url: 'data/edit_proveedor.php',
				type: 'post',
				dataType: 'json',
				data: {
					proveedor_id:proveedor_id,
					Pname:Pname,
	    			Pdireccion:Pdireccion,
	    			Plocalidad:Plocalidad,
	    			Pprovincia:Pprovincia,
	    			Ptelefono:Ptelefono,
	    			Pmail:Pmail,
	    			Pcuit:Pcuit,
	    			Pcbu:Pcbu
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == true){
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-proveedor').modal('hide');
						showAllproveedor();
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg('128');
				}
			});
	}//end submit
});
function editModalStock(stock_id){
	// $('#submit-proveedor').val('add');
	console.log(stock_id);
	$.ajax({
			url: 'data/get_stockById.php',
			type: 'post',
			dataType: 'json',
			data: {

				stock_id:stock_id
			},

			success: function (data) {
				//console.log("success!!")
				//console.log(data);
				$('#submit-stock').val(data.event);
				$('#stock-id').val(data.stock_id);
				$('#item-id').val(data.item_id);
				$('#qty').val(data.stock_qty);
				$('#min').val(data.stock_min);
				$('#max').val(data.stock_max);
				$('#modal-stock').find('.modal-title').text("Editar stock");
				$('#modal-stock').modal('show');
				$('.modal-header').css('background-color', '#eb9316');
				$('.modal-header').css('color', 'white');

				
				
			},
			error: function(){
				//console.log("Entro!!!!!");
				alert('Error: L57+');

			}
		});
}//end editModalStock
$(document).on('submit', '#form-stock', function(event) {
	event.preventDefault();
	/* Act on the event*/ 
	var submit = $('#submit-stock').val();
	var Sproducto = $('#item-id').val();
	var stock_id = $('#stock-id').val();
	var Scantidad = $('#qty').val();
	var Sminimo = $('#min').val();
	var Smaximo = $('#max').val();
	var Scomprado = $('#purc').val();
	
	if(submit  == "edit"){
		$.ajax({
				url: 'data/edit_stock.php',
				type: 'post',
				dataType: 'json',
				data: {
					Sproducto:Sproducto,
					stock_id:stock_id,
					Scantidad:Scantidad,
	    			Sminimo:Sminimo,
	    			Smaximo:Smaximo,
	    			Scomprado:Scomprado

				},
				success: function (data) {
					 //console.log(data);
					if(data.valid == true){
						$('#modal-stock').modal('hide');
						showAllStockList();
						console.log("paso +++++");
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg('129');
				}
			});
	}//end submit
});
//all item
function showAllItem()
{
	$.ajax({
			url: 'data/all_item.php',
			success: function (data) {
				$('#all-item').html(data);
			},
			error: function(){
				alert('Error: L42+');
			}
		});
}//end showAllItem
showAllItem();

$('#add-new-item').click(function(event) {
	/* Act on the event */
	$('#modal-item').find('.modal-title').text('Agregar producto');
	$('#modal-item').modal('show');
	$('#submit-item').val('add');
});

$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	/* Act on the event */
	var iName = $('#item-name').val();
	var iPurchase = $('#item-purchase').val();
	var iPrice = $('#item-precio').val();
	var iIva = $('#item-iva').val();
	var icode = $('#code').val();
	var iProv = $('#item-prov').val();
	/*var qty = $('#quantity').val();
	var min = $('#min').val();
	var max = $('#max').val();*/
	
	
	if($('#submit-item').val() == "add"){
    	 console.log('add ra');
    
	    $.ajax({
	    		url: 'data/add_item.php',
	    		type: 'post',
	    		dataType: 'json',
	    		data: {
	    			iName:iName,
	    			iPurchase:iPurchase,
	    			iPrice:iPrice,
	    			iIva:iIva,
	    			icode:icode,
	    			iProv:iProv/*,
	    			qty:qty,
	    			min:min,
	    			max:max*/
	    			
	    		},
	    		success: function (data) {
	    			console.log(data);
	    			if(data.valid == true){
	    				$('#modal-message').find('#msg-body').text(data.msg);
	    				$('#modal-item').modal('hide');
	    				showAllItem();
	    				$('#modal-message').modal('show');
	    				$('#submit-item').val('null');
	    			}
	    		},
	    		error: function(){
	    			eMsg('70');
	    		}//
	    	});
    }//end if == "add"
});
//llama a modal para aumentar costo de producto
function aumentarPrecio(item_id,item_name,item_price){
	$('#item-price').val(item_price);
	$('#item-id').val(item_id);
	$("#modal-itemP").modal("show");
	$("#modal-itemP").find('.modal-title').text('Aumentar Precio' + " -> " + item_name);
	$('.modal-header').css('background-color', '#265a88');
	$('.modal-header').css('color', 'white');
	
}// end aumentarPrecio

$(document).on('submit', '#form-precio', function(event) {
	event.preventDefault();
	/* Act on the event */

	var submit = $('#submit-precio').val();
	var item_id = $('#item-id').val();
	var precio =  parseFloat($('#item-price').val()); 
	var iPorcentaje = $('#item-porcentaje').val();
	var porcentaje = (iPorcentaje/ 100) * precio;
	var iPrecio = precio + porcentaje;
	if(submit  == "edit"){
		//alert('Estoy aca!');	
		$.ajax({
				url: 'data/edit_precio.php',
				type: 'post',
				dataType: 'json',
				data: {
					item_id:item_id,
	    			iPrecio:iPrecio
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == true){
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-itemP').modal('hide');
						showAllItem();
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg('127');
				}
			});
	}//end submit
});

function editModal(item_id){
	// $('#submit-item').val('add');
	$.ajax({
			url: 'data/get_item.php',
			type: 'post',
			dataType: 'json',
			data: {
				item_id:item_id
			},
			success: function (data) {
				//console.log(data.price);
				$('#submit-item').val(data.event);
				$('#item-id').val(data.id);
				$('#item-name').val(data.name);
				$('#item-purchase').val(data.purchase);
				$("#item-precio").val(data.price);
				$('#item-iva').val(data.iva);
				//$('#item-id').val(data.id);
				$('#code').val(data.code);
				$('#supplier').val(data.supplier);
				$('#modal-item').find('.modal-title').text("Editar producto");
				$('#modal-item').modal('show');
				$('.modal-header').css('background-color', '#eb9316');
				$('.modal-header').css('color', 'white');

				
			},
			error: function(){
				console.log(data.name);
				alert('Error: L56+');
			}
		});
}//end editModal


//save edit modal
$(document).on('submit', '#form-item', function(event) {
	event.preventDefault();
	/* Act on the event */
	var submit = $('#submit-item').val();
	var item_id = $('#item-id').val();
	var iName = $('#item-name').val();
	var iPurchase = $('#item-purchase').val();
	var iPrice = $('#item-precio').val();
	var iIva = $('#item-iva').val();
	var icode = $('#code').val();
	var iProv = $('#item-prov').val();
	
	
	if(submit  == "edit"){
		$.ajax({
				url: 'data/edit_item.php',
				type: 'post',
				dataType: 'json',
				data: {
					item_id:item_id,
					iName:iName,
	    			iPurchase:iPurchase,
	    			iPrice:iPrice,
	    			iIva:iIva,
	    			icode:icode,
	    			iProv:iProv
				},
				success: function (data) {
					// console.log(data);
					if(data.valid == true){
						$('#modal-message').find('#msg-body').text(data.msg);
						$('#modal-item').modal('hide');
						showAllItem();
						$('#modal-message').modal('show');
					}
				},
				error: function(){
					eMsg('127');
				}
			});
	}//end submit
});

function showAllStockList(){
	$.ajax({
			url: 'data/all_stocklist.php',
			type: 'post',
			success: function (data) {
				$('#all-stocklist').html(data);
			},
			error: function(){
				eMsg('152');
			}
		});
}//end showAllStockList
showAllStockList();

// $('#del-stock').on('click', '.selector', function(event) {
// 	event.preventDefault();
// 	/* Act on the event */
// 	// $('input[type=checkbox]:checked').each(function(index) {
//  //        //where the magic begins wahaha. ge ahak.
//  // 		console.log($(this).val())
//  //    });
//  	console.log('sad');
// });
$('#del-stock').click(function(event) {
	/* Act on the event */
	var check = 0;
	 $('input[type=checkbox]:checked').each(function(index) {
		check++;        
    });
	 if(check == 0){
	 	alert('Seleccione Registro!');
	 }else{
	 	$('#confirm-yes').val('del');
	 	$('#confirm-type').val('expired');
	 	$('#pago').val('null');
	 	$('#pago').hide();
		$('#modal-confirmation').modal('show');
	}//end if check == 0
});

$('.del-expired').click(function(event) {
	/* Act on the event */
	if($('#confirm-type').val() == "expired"){
			var finish = false;
		$('input[type=checkbox]:checked').each(function(index) {
			// console.log($(this).val());
			finish = true;
			var stock_id = $(this).val();
			$.ajax({
					url: 'data/del_expired.php',
					type: 'post',
					dataType: 'json',
					data: {
						stock_id:stock_id
					},
					success: function (data) {
						showAllStockList();
					},
					error: function(){
						eMsg('195');
					}
				});
	    });
		if(finish == true){
			$('#modal-confirmation').modal('hide');
			$('#modal-message').find('#msg-body').text('Eliminado correctamente!')
			$('#modal-message').modal('show');
		}//end finish
		
	}//end if
});

$('#add-stock').click(function(event) {
	/* Act on the event */
	$('#modal-stock').find('.modal-title').text('Nuevo stock');
	$('#modal-stock').modal('show');

});

//form stock
var fuck = 0;
$(document).on('submit', '#form-stock', function(event) {
	event.preventDefault();
	/* Act on the event */
    var item_id = $('#item-id').val();
    var qty = $('#qty').val();
    var min = $('#min').val();
    var max = $('#max').val();
    var purc = $('#purc').val();
    fuck++;
    // alert(fuck);
    if($('#submit-stock').val() == "add"){
	    $.ajax({
	    		url: 'data/add_fuck.php',
	    		type: 'post',
	    		// dataType: 'json',
	    		data: {
	    			item_id:item_id,
	    			qty:qty,
	    			min:min,
	    			max:max,
	    			purc:purc
	    		},
	    		success: function (data) {
	    			//console.log(data);
	    			// console.log('stock');
	    			// if(data.valid == true){
	    				$('#modal-stock').modal('hide');
	 		   			showAllStockList();
	    				$('#modal-message').find('#msg-body').text('Producto agregado correctamente!!');
	    				$('#modal-message').modal('show');
	    			// }
	    		},
	    		error: function(){
	    			eMsg('233');
	    		}
	    	});
	}

});
$('#add-stock-carne').click(function(event) {
	/* Act on the event */
	$('#modal-stock').find('.modal-title').text('Nuevo stock');
	$('#modal-stock').modal('show');
});

//form stock
var fuck = 0;
$(document).on('submit', '#form-stock-carne', function(event) {
	event.preventDefault();
	/* Act on the event */
    var item_id = $('#item-id').val();
    var qty = $('#qty').val();
    var min = $('#min').val();
    var max = $('#max').val();
	var cost = $('#costo').val();
    var purc = $('#purc').val();
    fuck++;
    // alert(fuck);
    if($('#submit-stock').val() == "add"){
	    $.ajax({
	    		url: 'data/add_fuck_carne.php',
	    		type: 'post',
	    		// dataType: 'json',
	    		data: {
	    			item_id:item_id,
	    			qty:qty,
	    			min:min,
	    			max:max,
					cost:cost,
	    			purc:purc
	    		},
	    		success: function (data) {
	    			//console.log(data);
	    			// console.log('stock');
	    			// if(data.valid == true){
	    				$('#modal-stock').modal('hide');
	 		   			showAllStockList();
	    				$('#modal-message').find('#msg-body').text('Producto agregado correctamente!!');
	    				$('#modal-message').modal('show');
	    			// }
	    		},
	    		error: function(){
	    			eMsg('233');
	    		}
	    	});
	}

});

//all expired
function showAllExpired(){
	$.ajax({
			url: 'data/all_expired.php',
			type: 'post',
			// data: {},
			success: function (data) {
				$('#all-expired').html(data);
			},
			error: function(){
				eMsg('260');
			}
		});
}//end showAllExpired
showAllExpired();

//all stock
function showAllStocks(){
	$.ajax({
			url: 'data/all_stock.php',
			type: 'post',
			success: function (data) {
				$('#all-stock').html(data);
			},
			error: function(){
				eMsg('275');
			}
		});
}//end showAllStocks
showAllStocks();

//stock report print
$('#stock-report').click(function(event) {
	/* Act on the event */
	// window.open('print.php?datePick=<?php echo $datePick; ?>','name','width=auto,height=auto');
	window.open('data/print.php','name','width=auto,height=auto');
});

function showOrder(){
	$.ajax({
			url: 'data/order.php',
			type: 'post',
			success: function (data) {
				$('#order').html(data);
			},
			error: function(){
				eMsg('297');
			}
		});
}//end showOrder
showOrder();
function toCartDirecto(stock_id, qty,precio, item_id){
	
	var stock_id  = stock_id;
	var qty = qty;
	var	item_id = item_id;
	var cartQty = 1;
	var precio = precio;
	var newStockQty = qty - cartQty;
	if (newStockQty < 0) {
		alert('El articulo no es suficiente!!!!!');
	}else{
		$.ajax({
				url: 'data/add_cart.php',
				type: 'post',
				dataType: 'json',
				data: {
					stock_id:stock_id,
					item_id:item_id,
					cqty:cartQty,
					nqty:newStockQty,
					precio:precio 
				},
				success: function (data) {
					//console.log(data.cantidad);
					//console.log(data.datos);

					showOrder();
				},
				error:function(){
					eMsg('331');
				}
			});
	}
	
}//end toCartDirecto
function toCartDirectoCarne(stock_id, stock_qty,item_price, item_id){
	
	var stock_id  = stock_id;
	var qty = stock_qty;
	var item_id = item_id;
	var precio = item_price;
	//console.log("se ejecuto");
		$.ajax({
				url: 'data/add_cart_carne.php',
				type: 'post',
				dataType: 'json',
				data: {
					stock_id:stock_id,
					item_id:item_id,
					qty:qty,
					precio:precio 
				},
				success: function (data) {
					//console.log(data.cantidad);
					//console.log(data.datos);
					
					showOrder();
					$('#modal-to-cart-carne').modal('hide');
					$(document.getElementById('form-toCart-carne').reset());
					//$('#modal-to-cart-carne').find('#cart-precio').val('');
					
				},
				error:function(){
					
					eMsg('331CN');
				}
			});
	
	
}//end toCartDirectoCarne
//add to cart
function toCart(stock_id, qty, item_id,$precio){
	
	$('#stock-id').val(stock_id);
	$('#item-id').val(item_id);
	$('#item-qty').val(qty);
	$('#item-precio').val($precio); //precio con iva incluido
	$('#modal-to-cart').modal('show');
	$('#cart-qty').focus();
	$('#cart-qty').val('2');

	
}//end toCart

$(document).on('submit', '#form-toCart', function(event) {
	event.preventDefault();
	// Act on the event 
	var stock_id = $('#stock-id').val();
	var item_id = $('#item-id').val();
	var qty = $('#item-qty').val();
	var cartQty = $('#cart-qty').val();//add to cart
	var precio = $('#item-precio').val(); //precio con iva incluido
	
	var newStockQty = qty - cartQty;
	if(newStockQty < 0){
		alert('El artículo no es suficiente!');
	}else{
		// alert('Enough!');
		
		$.ajax({
				url: 'data/add_cart.php',
				type: 'post',
				data: {
					stock_id:stock_id,
					item_id:item_id,
					cqty:cartQty,
					nqty:newStockQty,
					precio:precio
				},
				success: function (data) {
					//console.log(data);
					showOrder();
					$('#modal-to-cart').modal('hide');
				},
				error:function(){
					eMsg('331');
				}
			});
	}//end if !qty
});

//del from cart
function delCart(stock_id, qty, cart_id){
	$.ajax({
			url: 'data/del_cart.php',
			type: 'post',
			data: {
				stock_id:stock_id,
				cart_id:cart_id,
				qty:qty
			},
			success: function (data) {
				//console.log(data);
				showOrder();
			},
			error: function(){
				eMsg('354');
			}
		});
}//end delCart

//order form
$(document).on('submit', '#form-order', function(event) {
	event.preventDefault();
	/* Act on the event */
	var custName = $('#customer-name').val();
	var tender = $('#tendered').val();
	var totalOrder = $('#totalOrder').val();
	var change = tender - totalOrder;

	if(change < 0){
		alert('Datos insuficientes!');
	}else{
		//good vibes
		$.ajax({
				url: 'data/add_transaction.php',
				type: 'post',
				// dataType: 'json',
				data: {
					custName:custName,
					tender:tender,
					totalOrder:totalOrder,
					change:change
				},
				success: function (data) {
					console.log(data);
				},
				error: function(){
					eMsg('385');
				}
			});
	}//end change < 0
	
});//form order


function confirm_cart($total){
	$('#confirm-type').val('confirmCart');
	$('#total').val($total);
	$('#modal-confirmation').modal('show');
	$('#pago').focus();
}//end confirm_cart

$('#confirm-yes').click(function(event) {
	/* Act on the event */
	var event =  $('#confirm-yes').val();
	var choice = $('#confirm-type').val();
	var costo = $('#total').val();
	var pago = $('#pago').val();
	var vuelto = (pago -costo).toFixed(2);
	
	if (pago == "") {
		
		alert('Ingresar Monto');

	}else{
		if(choice == 'confirmCart'){
			$.ajax({
					url: 'data/confirm_order.php',
					type: 'post',
					dataType: 'json',
					data:{
						click:'yes'
					},
					success: function (data) {
						 console.log(data);
						if(data.valid == true){
							//$('#confirm-type').val('');
							$('#modal-confirmation').modal('hide');
							showOrder();
							$('#modal-message').find('#msg-body').text(data.msg);
							$('#modal-message').find('#etiqueta').text('Vuelto: ' + " $ " + vuelto).css('font-size', '18px');
							//$('#modal-message').find('#vuelto').text(vuelto);
							$('#modal-message').modal('show');
						}
					},
					error: function(){
						eMsg(445);
					}
				});
		}
	}
	
});


function showAllSales(){
	var date = $('#dailyDate').val();
	dailySales(date);
}//end showAllSales
showAllSales();

function dailySales(date){
	$.ajax({
			url: 'data/all_sales.php?date='+date,
			type: 'get',
			data: {
				date:date
			},
			success: function (data) {
				$('#all-sales').html(data);
			},
			error:function(){
				eMsg(474);
			}
		});	
}


$(document).on('change', '#dailyDate', function(event) {
	event.preventDefault();
	/* Act on the event */
	var date = $('#dailyDate').val();
	if(date == '' || date == null){
		$('#printBut').hide();
	}else{
		$('#printBut').show();
	}
	dailySales(date);

});

$('#printBut').click(function(event) {
	/* Act on the event */
	var date = $('#dailyDate').val();
	window.open('data/print-sales.php?date='+date,'name','width=600,height=400');	
});

$('#add-new-item').click(function(event) {
	/* Act on the event */
	$('#form-item').trigger("reset");
	$('.modal-header').css('background-color', '#28a745');
	$('.modal-header').css('color', 'white');
});
$('#add-stock').click(function(event) {
	/* Act on the event */
	$('#form-stock').trigger("reset");
	$('.modal-header').css('background-color', '#28a745');
	$('.modal-header').css('color', 'white');

});
$('#add-new-proveedor').click(function(event) {
	/* Act on the event */
	$('#form-proveedor').trigger("reset");
	$('.modal-header').css('background-color', '#28a745');
	$('.modal-header').css('color', 'white');
	
});
$('#add-new-compra').click(function(event) {
	/* Act on the event */
	$('#form-compra').trigger("reset");
	$('.modal-header').css('background-color', '#28a745');
	$('.modal-header').css('color', 'white');
	
});
//comienza procesamiento lectura de lector de codigo de barras
function validar(e) {

  tecla = (document.all) ? e.keyCode : e.which;
  var codigo = $('#codigo-scanner').val().trim();
  if (tecla==13) {
  		if (codigo == "") {//modal vender carne
			$('#modal-to-cart-carne').modal('show');
			$('#modal-to-cart').find('#cart-precio').focus();
			$(document).on('submit', '#form-toCart-carne', function(event) {
				event.preventDefault();
				var codigoCn = $('#cart-item-id').val().trim();
				var precio = $('#cart-precio').val()
				console.log("entran datos");
				//if($('#submit-carne')){	
					$.ajax({
						url: 'data/get_stock_carne.php',
						type: 'post',
						dataType: 'json',
						data: {
							
							codigo:codigoCn
						},
		
						success: function (data) {
							console.log(data.datos);
							//console.log("salen datos");
							var stock_id = data.stockid;
							var stock_qty = data.stockcantidad ;
							var item_id = data.itemid;
							var item_price = precio;

							$('#modal-to-cart-carne').modal('hide');
							$(document.getElementById('form-toCart-carne').reset());
							//var item_iva = data.itemiva/100;
							//var price = item_price * item_iva;
							//var precio = parseFloat(price) + parseFloat(item_price); 					
							
							//toCartDirectoCarne(stock_id, stock_qty,item_price, item_id);
							
						},
						error: function(){
							//console.log("Entro!!!!!");
							alert('Error: L100CN+');
		
						}
				
					});		
				//}//termina if #submit-carne
			});//termina $(document).on		
  		}else{
	  		$.ajax({
				url: 'data/get_stock.php',
				type: 'post',
				dataType: 'json',
				data: {

					codigo:codigo
				},

				success: function (data) {
					//console.log(data.itemprice);
					var stock_id = data.stockid;
					var stock_qty = data.stockcantidad;
					var item_id = data.itemid;
					var item_price = data.itemprice;
					var item_iva = data.itemiva/100;
					var price = item_price * item_iva;
					var precio = parseFloat(price) + parseFloat(item_price); 					
				toCartDirecto(stock_id, stock_qty,precio, item_id);
					
				},
				error: function(){
					//console.log("Entro!!!!!");
					alert('Error: L100+');

				}
			});
  		}
	}
}
function showAllCompra()
{
	$.ajax({
			url: 'data/all-compras.php',
			success: function (data) {
				$('#all-compras').html(data);
			},
			error: function(){
				alert('Error: L83+');
			}
		});
}//end showAllItem
showAllCompra();
$('#add-new-compra').click(function(event) {
	/* Act on the event */
	$('#modal-compra').find('.modal-title').text('Agregar Compra');
	$('#modal-compra').modal('show');
	$('#submit-compra').val('add');
});
//add proveedor
$(document).on('submit', '#form-compra', function(event) {
	event.preventDefault();
	/* Act on the event */
	var Vproveedor = $('#venta-prov').val();
	var Vproducto = $('#venta-item').val();
	var Vcantidad = $('#qty').val();
	var Vcompra = $('#purc').val();
	
	
    if($('#submit-compra').val() == "add"){
    	// console.log('add ra');
    	
	    $.ajax({
	    		url: 'data/add_compra.php',
	    		type: 'post',
	    		dataType: 'json',
	    		data: {
	    			Vproveedor:Vproveedor,
	    			Vproducto:Vproducto,
	    			Vcantidad:Vcantidad,
	    			Vcompra:Vcompra
	    			
	    		},
	    		success: function (data) {
	    			console.log(data);
	    			if(data.valid == true){
	    				$('#modal-message').find('#msg-body').text(data.msg);
	    				$('#modal-compra').modal('hide');
	    				showAllCompra();
	    				$('#modal-message').modal('show');
	    				$('#submit-compra').val('null');
	    			}
	    		},
	    		error: function(){
	    			eMsg('72');
	    		}//
	    	});
    }//end if == "add"
});
