<?php
// date
// untuk menampilkan tanggal dengan format tertentu
// echo date("l, d-M-Y");

//time
// unix timestamp / EPOCH time
// detik yg sudah berlalu sejak januari 1970
//  echo time()
// echo date("d M Y", time()+60*60*24*1000);

// mktime
// membuat sendiri detik 
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
// echo date("l", mktime(0,0,0,3,25,2006));

// strtotime
echo date("l", strtotime("25 mart 2006"));






?>