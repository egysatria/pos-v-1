$(document).ready(function(){
	$(document).on('click', '#btnLogout', function(e){
	   swalLogout();
  });
});

function swalLogout(){
	 swal({
	      title: 'Logout?',
	      text: "Yakin ingin Logout ?",
	      type: 'warning',
	      showCancelButton: true,
	      confirmButtonColor: '#3085d6',
	      cancelButtonColor: '#d33',
	      confirmButtonText: 'Ya, Logout!',
	      showLoaderOnConfirm: false,
	        
	      preConfirm: function() {
	        return new Promise(function(resolve) {
	             
	           $.ajax({
	            url: 'controller/auth/logout.php',
	           })
	           .done(function(){
	            window.location.href="auth/login.php";
	           })
	           .fail(function(){
	            swal('Oops...', 'Ada yang salah dengan ajax !', 'error');
	           });
	        });
	    },
	    allowOutsideClick: false        
	 }); 
};