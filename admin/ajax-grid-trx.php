








<?php
/* Database connection start */
include "koneksi.php";
/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id_trx',
    1 => 'nama_client', 
	2 => 'nama_website',
	3 => 'email',
	4 => 'tgl_trx',
	5 => 'total'
);



 

// getting total number records without any search
$sql = "SELECT id_trx, nama_client, nama_website, email, tgl_trx, total";
$sql.=" FROM trx ";

$query=mysqli_query($conn, $sql) or die("ajaxin-grid-trx.php: get trx");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT id_trx, nama_client, nama_website, email, tgl_trx, total";
	$sql.=" FROM trx ";
	$sql.=" WHERE id_trx LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR nama_client LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nama_website LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR email LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tgl_trx LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR total LIKE '".$requestData['search']['value']."%' ";

	$query=mysqli_query($conn, $sql) or die("ajax-grid-trx.php: get trx");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-trx.php: get trx"); // again run query with limit
	
} else {	

	$sql = "SELECT id_trx, nama_client, nama_website, email, tgl_trx, total";
	$sql.=" FROM trx ";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("ajaxin-grid-trx.php: get trx");   
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 




	$nestedData[] = $row["id_trx"];
    $nestedData[] = $row["nama_client"];
	$nestedData[] = $row["nama_website"];
	$nestedData[] = $row["email"];
	$nestedData[] = $row["tgl_trx"];
	$nestedData[] = $row["total"];
	
    $nestedData[] = '<td><center>
    					<a href="detail.php?aksi=edit&id_trx='.$row['id_trx'].'"  data-toggle="tooltip" title="View Detail" class="btn btn-sm btn-success"> <i class="glyphicon glyphicon-search"></i> </a>
                     

	                 </center></td>';		
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
