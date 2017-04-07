<?php
error_reporting(0);
session_name("_prd");
session_start();

class database{	
		function database(){
			$host    = "localhost";
			$dbuser  = "alessi74_rfamosa";
			$dbpass  = "ziLgAL1yQUoZ";
			$dbname  = "alessi74_rfamosa45";
			$dbh = mysql_connect($host,$dbuser,$dbpass);
			mysql_select_db($dbname);
			return $dbh;
			
			/* $host    = "localhost";
			$dbuser  = "getcover_jose";
			$dbpass  = "jose@#123";
			$dbname  = "getcover_josephin";
			$dbh = mysql_connect($host,$dbuser,$dbpass);
			mysql_select_db($dbname);
			return $dbh; */
		}
  //======================================================================================
		function insertrec($query){
			
			if(!mysql_query("$query")){
			$err1 = mysql_errno();
			$err2 = mysql_error();
			echo "$err1 $err2";
			exit;			
			}
			return;
		}
  //======================================================================================		
		function singlerec($query){
		{
        if (! ($result = mysql_query("$query"))) {
            $err1 = mysql_errno();
            $err2 = mysql_error();
            echo ("$query  $err1 $err2");
            exit;
        }
        $rw = mysql_fetch_array ($result);
        mysql_free_result ($result);
        return $rw;
		}
		}
		
  //======================================================================================				
		function singleasso($query){
		{
        if (! ($result = mysql_query("$query"))) {
            $err1 = mysql_errno();
            $err2 = mysql_error();
            echo ("$query  $err1 $err2");
            exit;
        }
        $rw = mysql_fetch_assoc($result);
        mysql_free_result ($result);
        return $rw;
		}
		}
		
  //======================================================================================
		function get_all($query){
			$rst = mysql_query("$query");
			$result = array();
			$x=0;
			while($row=mysql_fetch_array($rst)){
				$result[$x] = $row;
				$x++;
				}				
				return $result;
			}
  //======================================================================================
		function get_all_assoc($query){
			$rst = mysql_query("$query");
			$result = array();
			$x=0;
			while($row=mysql_fetch_assoc($rst)){
				$result[$x] = $row;
				$x++;
				}				
				return $result;
			}
  //======================================================================================
		function insertid($query) {
        if (!mysql_query ("$query")) {
            $err1 = mysql_errno();
            $err2 = mysql_error();
            echo ("<h4>$query  $err1 $err2</h4>");
            exit;
        }
        $rwId=mysql_insert_id();
        return $rwId;
    }
  //======================================================================================	
  function singlecolumn ($mysql) {
        $x = 0;
        $result = mysql_query($mysql);
        $q = array() ;
        while ($row = mysql_fetch_array ($result) ) {
            $q[$x] = $row[0];
            $x++;
        }
        mysql_free_result ($result);
        return $q;
    }
	//======================================================================================	
	function Extract_Single($query)
    {
        $x = 0;
        $result = mysql_query($query);
        while ( $row = mysql_fetch_array ($result) ) {
            $q[$x] = $row[0];
            $implode[] = $q[$x] ;
            $x++;
        }
        mysql_free_result ($result);
        return @implode(',', $implode);
    }
//======================================================================================	
	function check1column($table,$column,$v1) {
        if (! $result=mysql_query ("select * from $table where $column ='$v1'")) {
            $men = mysql_errno();
            $mem = mysql_error();
            echo ("<h4>$mysql  $men $mem</h4>");
            exit();
        }
        $row=mysql_fetch_array ($result);
        mysql_free_result ($result);
        if ($row[0])
            $var =  1;
        else
            $var =  0;
        return $var;
    }
  //======================================================================================	
       function check2column($table,$column1,$v1,$column2,$v2) {
        if (! $result=mysql_query ("select * from $table where $column2 ='$v2' and $column1='$v1'")) {
            $men = mysql_errno();
            $mem = mysql_error();
            echo ("<h4>$mysql  $men $mem</h4>");
            exit();
        }
        $row=mysql_fetch_array ($result);
        mysql_free_result ($result);
        if ($row[0])
            $var =  1;
        else
            $var =  0;
        return $var;
    }
    //======================================================================================
	/* Pagination */
    //==========================================================================================================
    function page_break($db_object,$return_content,$adjacents,$total_pages,$limit,$targetpage,$page) {
        if ($page == 0) $page = 1;
        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total_pages/$limit);
        $lpm1 = $lastpage - 1;
        $targetpage = $targetpage."page";
        $pagination = "";
        if($lastpage > 1) {
            $pagination .= "<div class=\"pagination\">";
            if ($page > 1)
                $pagination.= "<a href=\"$targetpage=$prev\">&laquo; previous</a>";
            else
                $pagination.= "<span class=\"disabled\">&laquo; previous</span>";
            if ($lastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage=$counter\">$counter</a>";
                }
            }
            elseif($lastpage > 5 + ($adjacents * 2)) {
                if($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage=$counter\">$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage=$lastpage\">$lastpage</a>";
                }
                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination.= "<a href=\"$targetpage=1\">1</a>";
                    //$pagination.= "<a href=\"$targetpage=2\">2</a>";
                    $pagination.= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage=$counter\">$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage=$lastpage\">$lastpage</a>";
                }
                //close to end; only hide early pages
                else {
                    $pagination.= "<a href=\"$targetpage=1\">1</a>";
                    $pagination.= "<a href=\"$targetpage=2\">2</a>";
                    $pagination.= "...";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage=$counter\">$counter</a>";
                    }
                }
            }
            if ($page < $counter - 1)
                $pagination.= "<a href=\"$targetpage=$next\">next &raquo;</a>";
            else
                $pagination.= "<span class=\"disabled\">next &raquo;</span>";
            $pagination.= "</div>\n";
        }
        $return_content=str_replace ( "<{pagination}>", $pagination, $return_content);
        return $return_content;
    }
	//========================================================================	
}

	$GT_vadmin = 1;
//========================================================================
while(list($key,$value)=@each($_POST)) {
	$$key=$value;
}

while(list($key,$value)=@each($_GET)) {
    $$key=$value;
}	
?>