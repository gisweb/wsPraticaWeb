<?php
class utils {
    static function now(){
        return date('d/m/Y h:i:s', time());
    }
    static function debug($file,$data,$mode='a+'){
        $now=self::now();
        $f=fopen($file,$mode);
	ob_start();
        echo "------- DEBUG DEL $now -------\n";
	print_r($data);
	$result=ob_get_contents();
	ob_end_clean();
	fwrite($f,$result."\n-------------------------\n");
	fclose($f);
    }
    static function checkValues($arr){
        $res=Array();
        foreach($arr as $key=>$val) $res[$key]=(strlen($val)==0)?(null):($val);
        return $res;
    }
    static function checkValidation($encStr){
        return strlen($encStr)>0;
    }
    static function encrypt($n,$key){
        
    }
    static function decrypt(){
        
    }
}
    
?>