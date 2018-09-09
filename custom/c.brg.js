$(document).ready(function(){

   $(document).on('click', '#hpsBrg', function(e){
    
    var barCode = $(this).data('id');
    deleteBarang(barCode);
    e.preventDefault();
  });

});

function deleteBarang(barCode){

    swal({
      title: 'Hapus?',
      text: "Yakin Ingin Menghapus Data Barang ini ??",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!',
      showLoaderOnConfirm: true,
        
      preConfirm: function() {
        return new Promise(function(resolve) {
             
           $.ajax({
            url: 'controller/barang/hps_barang.php',
            type: 'POST',
            data: 'delete='+barCode,
            dataType: 'json'
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
            location.reload();
           })
           .fail(function(){
            swal('Oops...', 'Ada yang salah dengan ajax !', 'error');
           });
        });
        },
      allowOutsideClick: false        
    }); 

}

  function hitung()
{
    var hrgBeli = document.getElementById('harga_beli').value;
    var hrgJual = document.getElementById('harga_jual').value;
    var htg  = parseInt(hrgJual) - parseInt(hrgBeli);
    if (!isNaN(htg)) 
    {
      document.getElementById('profit').value = htg;
    }
}

function validasi_brg(form)
{
    if (form.nm_barang.value == "") 
    {
      alert("Nama Barang harus di isi !");
      form.nm_barang.focus();
      return (false);
    }
    if(form.satuan.value == "")
    {
        alert("Anda harus memilih satuan !");
        return (false);
    }
    if(form.stok.value == "")
    {
        alert("Stock harus di isi !");
        form.stok.focus();
        return (false);
    }
    if(form.harga_beli.value == "")
    {
        alert("Harga Beli harus di isi !");
        form.harga_beli.focus();
        return (false);
    }
    if(form.harga_jual.value == "")
    {
        alert("Harga Jual harus di isi !");
        form.harga_jual.focus();
        return (false);
    }

    return (true);
}
