function eMsg(params){
	alert("Error: L"+params+"+");
}//end eMsg


function showAllStockCarne(){
	$.ajax({
			url: 'data/all-stockCarne.php',
			type: 'post',
			success: function (data) {
				$('#all-stockCarne').html(data);
			},
			error: function(){
				eMsg('275CN');
			}
		});
}//end showAllStocks
showAllStockCarne();

$('#add-stock-carne').click(function(event) {
	/* Act on the event */
	$('#modal-stock-carne').find('.modal-title').text('Nuevo stock');
	$('.modal-header').css('background-color', '#28a745');
	$('.modal-header').css('color', 'white');
	$('#modal-stock-carne').modal('show');

});

//form stock
var fuck = 0;
$(document).on('submit', '#form-stock-carne', function(event) {
	event.preventDefault();
	/* Act on the event */
    var item_id = $('#item-id').val();
    //var proveedor_id = $('#proveedor-id').val();
    fuck++;
    // alert(fuck);
    if($('#submit-stock').val() == "add"){
	    $.ajax({
	    		url: 'data/add_fuck_carne.php',
	    		type: 'post',
	    		// dataType: 'json',
	    		data: {
	    			item_id:item_id,
	    			//proveedor_id:proveedor_id
	    			
	    		},
	    		success: function (data) {
	    			//console.log(data);
	    			// console.log('stock');
	    			// if(data.valid == true){
	    				$('#modal-stock_carne').modal('hide');
						showAllStockCarne();
	    				$('#modal-message').find('#msg-body').text('Producto agregado correctamente!!');
	    				$('#modal-message').modal('show');
	    			// }
	    		},
	    		error: function(){
	    			eMsg('234CN');
	    		}
	    	});
	}

});

//llama a modal compra de cane
function compraCarne(stock_id,proveedor_id,item_name,item_id, item_code){
	$('#proveedor').val(proveedor_id);
	$('#stock-id').val(stock_id);
	$('#item-id').val(item_id);
	$('#item-code').val(item_code);
	$("#modal-compraCarne").modal("show");
	$("#modal-compraCarne").find('.modal-title').text('Comprar' + " -> " + categoria_desc);
	$('.modal-header').css('background-color', '#265a88');
	$('.modal-header').css('color', 'white');
	
}// end aumentarPrecio

$(document).on('submit', '#form-compra', function(event) {
	event.preventDefault();
	/* Act on the event */
	
	var submit = $('#submit-compra').val();
	var prov = $('#proveedor').val();
	var stock_id = $('#stock-id').val();
	var item_id = $('#item-id').val();
	var item_code = $('#item-code').val();
	var qty = $('#compra-cantidad').val();
	var precio =  parseFloat($('#compra-costo').val()); 
	if(submit  == "add"){
		//alert('Estoy aca!');	
		$.ajax({
				url: 'data/add_fuck_compra_carne.php',
				type: 'post',
				//dataType: 'json',
				data: {
					stock_id:stock_id,
	    			prov:prov,
					qty:qty,
					item_id:item_id,
					item_code:item_code,
					precio:-precio
				},
				success: function (data) {
					// console.log(data);
					
					$('#modal-compraCarne').modal('hide');
					showAllStockCarne();
					$('#modal-message').find('#msg-body').text('Compra realizada!!');
					$('#modal-message').modal('show');
				},
				error: function(){
					eMsg('127CN');
				}
			});
	}//end submit
});
function showAllCompraCarne(){
	$.ajax({
			url: 'data/all-compraCarne.php',
			type: 'post',
			success: function (data) {
				$('#all-compraCarne').html(data);
			},
			error: function(){
				eMsg('276CN');
			}
		});
}//end showAllStocks
showAllCompraCarne();