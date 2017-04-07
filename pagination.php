<?php

if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
	exit('Accesso non consentito') ;
}

 function limitation($itemPerPage){
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		$page = (int)$_GET['page'];
	} else {
		$page = 1;
	}
	$offset = ($page - 1) * $itemPerPage;
	return " LIMIT $offset, $itemPerPage";
}
 function getPagingQuery1($sql, $itemPerPage = 20){
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		$page = (int)$_GET['page'];
	} else {
		$page = 1;
	}
	// start fetching from this row number
	$offset = ($page - 1) * $itemPerPage;
	//echo $sql."LIMIT $offset,$itemPerPage";
	return $sql . " LIMIT $offset, $itemPerPage";	
}
function getPagingLink1($sql, $itemPerPage = 20,$strGet){
	$first=isset($first)?$first:'';
	$prev=isset($prev)?$prev:'';
	$next=isset($next)?$next:'';
	$last=isset($last)?$last:'';
	$result        = mysql_query($sql) or  die(mysql_error());
	$pagingLink    = '';
	$totalResults  = mysql_num_rows($result);	
	$totalPages    = ceil($totalResults / $itemPerPage);
	// how many link pages to show
	$numLinks      = 4;
	// create the paging links only if we have more than one page of results
	if ($totalPages > 1){
		$pself = preg_replace("/.php/", "", $_SERVER['PHP_SELF']);
		$self = 'http://' . $_SERVER['HTTP_HOST'] . $pself ;
		if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
			$pageNumber = (int)$_GET['page'];
		} else {
			$pageNumber = 1;
		}
		
		// print 'previous' link only if we're not
		// on page one
		if ($pageNumber > 1) {
			$page = $pageNumber - 1;
			if ($page > 1) {
				$prev = "<li><a href='$self?page=$page'>Indietro</a></li>";
			} else {
				$prev = "<li><a href='$self'> Indietro</a></li>";
			}	
				
			$first = "<li><a href='$self'>Prima</a></li>";
		}
		// print 'next' link only if we're not
		// on the last page
		if ($pageNumber < $totalPages) {
			$page = $pageNumber + 1;
			$next = "<li><a href='$self?page=$page'>Avanti</a></li>";
			$last = "<li><a href='$self?page=$totalPages'>Indietro</a></li>";
		}
		$start = $pageNumber - ($pageNumber % $numLinks) + 1;
		$end   = $start + $numLinks - 1;		
		
		$end   = min($totalPages, $end);
		
		$pagingLink = array();
		for($page = $start; $page <= $end; $page++)	{
			if ($page == $pageNumber) {
			    
				$pagingLink[] = "<li class='active'><a href='#'>$page</a></li>";   // no need to create a link to current page
			} else {
				if ($page == 1) {
				  
					$pagingLink[] = "<li><a href='$self'>$page</a></li>";
				} else {	
				 
					$pagingLink[] = "<li><a href='$self?page=$page'>$page</a></li>";
				}	
			}
		}
		
		$pagingLink = implode('  ', $pagingLink);
		
		// return the page navigation link
		$pagingLink = "<ul class=\"pagination remove-margin-pagination pull-right\" id=\"pagination-flickr\">". $first . $prev . $pagingLink . $next . $last ."</ul>";
	}
	return $pagingLink;
}
 ?>