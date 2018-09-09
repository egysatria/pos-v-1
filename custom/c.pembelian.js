/*
 *Function untuk pembelian
 */
$(document).ready(function(){
	$('#kd_barcode').keyup(function(){
		var kdBarcode = $(this).val();
		if(kdBarcode != '')
		{
			$.ajax({
				url : "controller/pembelian/cari_barang.php",
				method : 'POST',
				data : {kdBarcode:kdBarcode},
				dataType : 'json',
				success:function(data)
				{
					$('#daftarBarang').fadeIn();
					$('#daftarBarang').html(data);
				}
			});
		}
		else
		{
			$('#daftarBarang').fadeOut();
		}
	});

	$(document).on('click', 'li', function(){
		$('#kd_barcode').val($(this).text());
		$('#daftarBarang').fadeOut();
	});

	$('#bayar').keyup(function(){
		var bayar = $(this).val();
		if (bayar != '') 
		{
			var total = parseInt($('#totalBayar').val());
			var bayar = parseInt($('#bayar').val());
			var tot_byr = bayar-total;
			$('#kembali').val(tot_byr);
		}
		else
		{
			$('#kembali').val(0);
		}
	});
});