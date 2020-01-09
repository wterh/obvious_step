<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Filtering any income data
function clear ($value) {
    $pattern = [
        "'",'"',';','}',']',')','{','[','(',':','+','-','*',' +',"'+",'"+','==',"\x27","\x22","\x60","\\t","\\n",
        "\\r","*","%","<",">","?","!",'<?',"select","update","insert","drop","delete","from","where","and","not",
        "in","from","where","and","not","\\","`","~","set","values","use","create","database","character","collate",
        "grant","show","describe",'alert','javascript','eval','system','exec',"-1'",'unexisting',' AND','..АЇ','’',
        "",'sleep(','../','.ini','А®','....','${@','^(#','/.\\',"' --",'union','then','case','when',"; --"," 1=1",
        'information_schema','chr(','::','char','xmltype','elt','pg_','waitfor','delay','dbms_','receive_','dual',
        '0x','cast','xp_cmd','mode',"?'",'?"','benchmark','md5','rlike','analyse','extract','procedure','|','||(',')||',
        '#”>>>><<','/?,#',"' ; ",'HTTP-EQUIV','http','boot','.ini','.js','.php','/**/','boolean','row'
    ];
    $value = str_ireplace($pattern, '', $value);
    $value = preg_replace("/[\r\n]{3,}/i", "\r\n\r\n", $value);
    $value = stripslashes($value);
    return $value;
}

foreach ($_POST as $key => $post) {
    $_POST[$key] = filter_data($post);
}

foreach ($_GET as $key => $get) {
    $_GET[$key] = filter_data($get);
}

foreach ($_REQUEST as $key => $request) {
    $_REQUEST[$key] = filter_data($request);
}