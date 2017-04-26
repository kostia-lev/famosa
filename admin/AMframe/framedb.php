<?php
$localhost = false;
if( strpos($_SERVER['SERVER_NAME'], 'remax.local') === false){
    error_reporting(0);
}else{
    $localhost = true;
}
session_name("_prd");
session_start();

class database{
        /*db connection link*/
        private $dbh;

        /**
         * @return mysqli
         */
        public function getDbh(): mysqli
        {
            return $this->dbh;
        }

        /**
         * @param mysqli $dbh
         * @return database
         */
        public function setDbh(mysqli $dbh): database
        {
            $this->dbh = $dbh;
            return $this;
        }

		function __construct(){
            global $localhost;

            if($localhost){
                $host    = "localhost";
                $dbuser  = "root";
                $dbpass  = "root";
                $dbname  = "remax";
                $this->dbh = mysqli_connect($host,$dbuser,$dbpass, $dbname);
                $this->insertrec('SET sql_mode = \'\'');
            }else{
                $host    = "localhost";
                $dbuser  = "alessi74_rfamosa";
                $dbpass  = "ziLgAL1yQUoZ";
                $dbname  = "alessi74_rfamosa45";
                $this->dbh = mysqli_connect($host,$dbuser,$dbpass, $dbname);
            }

			return $this->dbh;
		}
  //======================================================================================
		function insertrec($query){
			if(!mysqli_query($this->dbh, "$query")){
			$err1 = mysqli_errno($this->dbh);
			$err2 = mysqli_error($this->dbh);
			echo "$err1 $err2";
			exit;			
			}
			return;
		}
  //======================================================================================		
		function singlerec($query){
		{
        if (! ($result = mysqli_query($this->dbh, "$query"))) {
            $err1 = mysqli_errno($this->dbh);
            $err2 = mysqli_error($this->dbh);
            echo ("$query  $err1 $err2");
            exit;
        }
        $rw = mysqli_fetch_array ($result);
        mysqli_free_result ($result);
        return $rw;
		}
		}
		
  //======================================================================================				
		function singleasso($query){
		{
        if (! ($result = mysqli_query($this->dbh, "$query"))) {
            $err1 = mysqli_errno($this->dbh);
            $err2 = mysqli_error($this->dbh);
            echo ("$query  $err1 $err2");
            exit;
        }
        $rw = mysql_fetch_assoc($result);
        mysqli_free_result ($result);
        return $rw;
		}
		}
		
  //======================================================================================
		function get_all($query){
			$rst = mysqli_query($this->dbh, "$query");
			$result = array();
			$x=0;
			while($row=mysqli_fetch_array($rst)){
				$result[$x] = $row;
				$x++;
				}				
				return $result;
			}
	//=========
    //@todo hide from user errors of database
    function getAllinsertIdPreparedStatement(string $query, string $types, array $params){
        $preparedQuery = $this->dbh->stmt_init();
        $preparedQuery->prepare($query);

        if(count($params) && $types != ''){
            $params = $this->refValues($params);
            array_unshift($params, $types);

            if (false === call_user_func_array(array($preparedQuery, 'bind_param'), $params)) {
                $err1 = mysqli_errno($this->dbh);
                $err2 = mysqli_error($this->dbh);
                echo ("<h4>$query  $err1 $err2</h4>");
                exit;
            }
        }
        $preparedQuery->execute();
        $meta = $preparedQuery->result_metadata();
        $i = 0;

        $columns = [];
        while ($field = $meta->fetch_field()) {
            $columns[] = $field->name;
            $var = $i;
            $$var = null;
            $query_data[$var] = &$$var;
            $i++;
        }

        $return = array();

        call_user_func_array(array($preparedQuery,'bind_result'), $query_data);
        while ($preparedQuery->fetch()) {
            $tmp = [];
            for ($i=0; $i<count($query_data); $i++) {
                $tmp[$columns[$i]] = $query_data[$i] ;
            }
            $return[] = $tmp;
        }

        return $return;//$preparedQuery->get_result()->fetch_all(MYSQLI_ASSOC);
    }
	//=========
   //
        function get_all_with_images(){
		    return $this->get_all("SELECT l.id, l.randuniq, l.slug, l.types, l.prop_title, l.location, l.exp_price, l.prop_for,
                            l.covered_area, l.hall, l.bathroom, li.image FROM listings l 
                            LEFT JOIN listing_images li ON li.pid=l.id  WHERE l.post_sts=1 AND l.featured=1 ORDER BY rand() DESC limit 0, 40");
        }
  //======================================================================================
		function get_all_assoc($query){
			$rst = mysqli_query($this->dbh, "$query");
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
        if (!mysqli_query($this->dbh, "$query")) {
            $err1 = mysqli_errno($this->dbh);
            $err2 = mysqli_error($this->dbh);
            echo ("<h4>$query  $err1 $err2</h4>");
            exit;
        }
        $rwId=mysqli_insert_id($this->dbh);
        return $rwId;
    }

    function insertIdPreparedStatement(string $query, array $params) {
        $preparedQuery = $this->dbh->stmt_init();
        $preparedQuery->prepare($query);

        $params = $this->refValues($params);

        if (!call_user_func_array(array($preparedQuery, 'bind_param'), $params)) {
            $err1 = mysqli_errno($this->dbh);
            $err2 = mysqli_error($this->dbh);
            echo ("<h4>$query  $err1 $err2</h4>");
            exit;
        }
        $preparedQuery->execute();
        $rwId=mysqli_insert_id($this->dbh);
        return $rwId;
    }

    function refValues($arr){
        $refs = array();
        foreach($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }

  //======================================================================================	
  function singlecolumn ($mysql) {
        $x = 0;
        $result = mysqli_query($this->dbh, $mysql);
        $q = array() ;
        while ($row = mysqli_fetch_array ($result) ) {
            $q[$x] = $row[0];
            $x++;
        }
        mysqli_free_result ($result);
        return $q;
    }
	//======================================================================================	
	function Extract_Single($query)
    {
        $x = 0;
        $result = mysqli_query($this->dbh, "$query");
        while ( $row = mysqli_fetch_array ($result) ) {
            $q[$x] = $row[0];
            $implode[] = $q[$x] ;
            $x++;
        }
        mysqli_free_result ($result);
        return @implode(',', $implode);
    }
//======================================================================================	
	function check1column($table,$column,$v1) {
        if (! $result=mysqli_query ($this->dbh, "select * from $table where $column ='$v1'")) {
            $men = mysqli_errno($this->dbh);
            $mem = mysqli_error($this->dbh);
            echo ("<h4>$mysql  $men $mem</h4>");
            exit();
        }
        $row=mysqli_fetch_array ($result);
        mysqli_free_result ($result);
        if ($row[0])
            $var =  1;
        else
            $var =  0;
        return $var;
    }
  //======================================================================================	
       function check2column($table,$column1,$v1,$column2,$v2) {
        if (! $result=mysqli_query ($this->dbh, "select * from $table where $column2 ='$v2' and $column1='$v1'")) {
            $men = mysqli_errno($this->dbh);
            $mem = mysqli_error($this->dbh);
            echo ("<h4>$mysql  $men $mem</h4>");
            exit();
        }
        $row=mysqli_fetch_array ($result);
        mysqli_free_result ($result);
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