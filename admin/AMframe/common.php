<?php
class common extends database {
	function drop_down($array,$getval,$getname){
		$list = "";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= "<input type='radio' id='$getname' name='$getname' value='$astrn' checked>$array[$astrn] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			else	
				$list .= " <input type='radio' id='$getname' name='$getname' value='$astrn'>$array[$astrn]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		return $list;
	}
	//========================================================================	
	function dropdown($array,$getval,$getname){
		$list = "<option name='' value='0'>--select--</option>";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= "<option value='$astrn' selected>$array[$astrn]</option>";
			else	
				$list .= "<option value='$astrn'>$array[$astrn]</option>";
		}
		return $list;
	}
	function dropdown_array_view($array,$getval){
		$ret = $array[$getval];
		return $ret;
	}
	//========================================================================	
	function drop_down_view($array,$getval){
		$list = "";
		for($astrn=1; $astrn<count($array); $astrn++){
			if($astrn == $getval)
				$list .= $array[$astrn];
		}
		return $list;
	}
	function counting_days(){
		$start = '2015-01-01';
		$end = date("Y/m/d");
		$diff = (strtotime($end)- strtotime($start))/24/3600; 
		
		return $diff;
	}
	//========================================================================	
	function drop_down_mail($array,$getval){
		$list = $array[$getval];
		return $list;
	}
	//========================================================================	
	function first_letter($string){
		$expr = '/(?<=\s|^)[a-z]/i';
		preg_match_all($expr, $string, $matches);
		$result = implode('', $matches[0]);
		$result = strtoupper($result);
		return $result;
	}
	//========================================================================	
	function int_val($string){
		$ret = preg_replace("/[^0-9]/","",$string);
		return $ret;
	}
	//=======================================================================
	function character($string){
		$ret = preg_replace('/[^A-Za-z]/', '', $string);
		return $ret;
	}
	//=======================================================================
	function user_profile_id($getid){
		$array = array("","00000","0000","000","00","0");
		$charval = preg_replace('/[^A-Za-z]/', '', $getid);
		$getrec = database::singlerec("select user_profileid from register where user_profileid like '%$charval%' order by user_profileid desc");
		$userprofileid = $getrec['user_profileid'];
		if($userprofileid=="")
			$userprofileid=$getid;

		$intval = preg_replace("/[^0-9]/","",$userprofileid);
		$incval = bcadd($intval,1,0);
		$stlen = strlen($incval);
		$zero = $array[$stlen];
		$ret = $charval.$zero.$incval;
		return $ret;
	}
	//========================================================================	
	function hidecontrols($string){
		if($string == "Admin")
			$ret = "";
		else
			$ret = "<style>.btn-default{display:none;} .cntrhid{display:none;}</style>";
		
		return $ret;
	}
	function datetimestamp($getdate){
		$DateArr = @split("/",$getdate);
		@list($bkDate,$bkMonth,$bkYear) = $DateArr;
		$ret = @mktime(0,0,0,$bkMonth,$bkDate,$bkYear);
		return $ret;
	}
	function expired_dt($call_dt,$tot_month){
		if($call_dt !=""){
			$DateArr = @split("/",$call_dt);
			@list($bkDate,$bkMonth,$bkYear) = $DateArr;
			$ret = @mktime(0,0,0,$bkMonth+$tot_month,$bkDate,$bkYear);
			$ret = date("d/m/Y",$ret);
		}
		else{
			$ret = "";
		}
		return $ret;
	}
	function opt_num(){
		$ret = mt_rand(100000, 999999);
		return $ret;
	}
	function email($from,$to,$subject,$message){
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: <'.$from.'>' . "\r\n";
		@mail($to, $subject, $message, $headers);
	}
	function signup_mail($from,$to,$url){
		$subject = "Conferma il tuo account";
		$message = "
		<html>
	    <body>
	    <div align='center'>
	    	<table border='0' cellpadding='5' cellspacing='5' width='100%'>
	    		<tbody>
	    			<td style='text-align: left;' valign='top'>
	    			    Gentile agente, grazie per la tua richiesta di registrazione<br>
	    				Clicca sul seguente link per attivare il tuo account:
	    				<br><br>
	    				<a target='_blank' href='$url'>Clicca qui per attivare account</a>
	    				<br><br>
	    				Ti ricordiamo che l'account deve ancora essere vagliato e attivato dal nostro broker di riferimento.
	    				<br>
	    				Cordiali saluti.
	    			</td>
	    		</tr>
	    		</tbody>
	    	</table>
	    </div>
	    
	    </body>
	    </html>
		";

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: <'.$from.'>' . "\r\n";
		@mail($to, $subject, $message, $headers);
	}
	function month_days($fromdate){
		/* $DateArr = @explode("-",$fromdate);
		list($dtYear,$dtMonth,$dtDay) = $DateArr;
		$frmdate = $dtYear."-".$dtMonth."-".$dtDay; */
		$todate = date("Y-m-d");
		
		$date1 = strtotime($fromdate);
		$date2 = strtotime($todate);
		$months = 0;
		while (strtotime('+1 MONTH', $date1) < $date2) {
			$months++;
			$date1 = strtotime('+1 MONTH', $date1);
		}
		$ret = $months.' month,'. ($date2 - $date1) / (60*60*24) .' days'; 
		return $ret;
	}
	function timeconvert($from_time,$to_time){
	   $hours=intval($DepartureTime / 3600);
	   $mins=intval($DepartureTime / 60) % 60;
	   $secs=$DepartureTime % 60;
	   $trvaltime=sprintf("%d:%02d:%02d",$hours, $mins, $secs);
	}
	function randuniq(){
		$str='';
		$str.=substr(str_shuffle("01234123456789123489abcdeefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);
		$str.=substr(rand(0,time()),0,4);
		return $str;
	}
}
?>