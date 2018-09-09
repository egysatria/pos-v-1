$(document).ready(function(){

  $(document).on('click', '#hpsKar', function(e){
    
    var kdKar = $(this).data('id');
    hapusKaryawan(kdKar);
    e.preventDefault();
  });

});

function hapusKaryawan(kdKar){

    swal({
      title: 'Are you sure?',
      text: "Yakin anda ingin menghapus data ini ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!',
      showLoaderOnConfirm: true,
        
      preConfirm: function() {
        return new Promise(function(resolve) {
             
           $.ajax({
            url: 'controller/karyawan/hps_karyawan.php',
            type: 'POST',
            data: 'delete='+kdKar,
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

function validasiKaryawan(form)
{
	if (form.nama_karyawan.value == "") 
    {
      alert("Nama Karyawan harus di isi !");
      form.nama_karyawan.focus();
      return (false);
    }
    if(form.tgl_lahir.value == "")
    {
        alert("Anda harus mengisi tanggal lahir !");
        form.tgl_lahir.focus();
        return (false);
    }
    if(form.alamat.value == "")
    {
        alert("Alamat harus di isi !");
        form.alamat.focus();
        return (false);
    }
    if(form.no_telp.value == "")
    {
        alert("No Telepon harus di isi !");
        form.no_telp.focus();
        return (false);
    }
    if(form.jabatan.value == "")
    {
        alert("Jabatan harus di isi !");
        return (false);
    }
    if(form.email.value == "")
    {
        alert("Email harus di isi !");
        form.email.focus();
        return (false);
    }
    if(form.username.value == "")
    {
        alert("Username harus di isi !");
        form.username.focus();
        return (false);
    }
    if(form.password.value == "")
    {
        alert("Password harus di isi !");
        form.password.focus();
        return (false);
    }

    return (true);
}