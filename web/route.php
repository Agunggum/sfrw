<?php
if ( ! 'web') exit('No direct script access allowed');
/*
  *route berfungsi untuk memanage halaman dan konten
*/      
if(routeget('')==ROUTE){
return Indexcontroller::index();
}else

{
require_once view('pagenotfound'); // not found page redirect
}

/* End of file route.php */
/* Location: ./web/route.php */
