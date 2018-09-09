function jumlah()
{
    var totalB = document.getElementById('totalBayar').value;
    var dis = document.getElementById('diskonByr').value;
    var byr = document.getElementById('bayar').value;
    var pot  = parseInt(totalB) * parseInt(dis) / parseInt(100);
    if (!isNaN(pot)) 
    {
      	var dis_pot = document.getElementById('potongan_diskon').value = pot;
    }
    else
    {
    	 var dis_pot = document.getElementById('potongan_diskon').value = 0;
    }

    var sub_total = parseInt(totalB) - parseInt(dis_pot);

    if (!isNaN(sub_total)) 
    {
      	var s_tot = document.getElementById('s_total').value = sub_total;
    }
    else
    {
    	var s_tot = document.getElementById('s_total').value = 0;
    }

    var susuk = parseInt(byr) - parseInt(s_tot);

    if (!isNaN(susuk)) 
    {
      	document.getElementById('kembali').value = susuk;
    }
    else
    {
    	document.getElementById('kembali').value = 0;
    }
}