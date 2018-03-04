<?php
//$model = new Model2();

defined('DRIVER') or define('DRIVER','mysql');
defined('HOST') or define('HOST','localhost');
defined('DATABASE_NAME') or define('DATABASE_NAME','legal');
defined('USER_NAME') or define('USER_NAME','root');
defined('PASSWORD') or define('PASSWORD','');
defined('URL_SITE') or define('URL_SITE','http://localhost/legal/');

function version($path)
{
    if (file_exists($file = $_SERVER['DOCUMENT_ROOT'] .'/legal/'. $path)) {
        $mtime = filemtime($file);
//        $mtime = filectime($file);
        $ext = substr($file,strrpos($file,'.')) ;
        return str_replace($ext,'-'.hash('md5',$mtime),$path) . $ext;
    }
    return $path;
}

function print_r_debug_die($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}

function print_r_debug($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function safe_input($data){
    $data = trim($data);
    $data = addslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function pagination($url,$pageindex,$countpost,$class="practice-v3-paginat"){
    ob_start();
    ?>
    <div class="<?= $class ?>">
        <ul class="pagination">

            <?php if ($pageindex == 1){ ?>
                <li class="active"> <a href="javascript:void(0);">1</a></li>
            <?php }else{ ?>
                <li> <a href="<?= $url ?><?= $pageindex-1 ?>">قبلی</a></li>
                <li> <a href="<?= $url ?>1">1</a></li>
            <?php } ?>
            <li> <a href="javascript:void(0);"> ... </a></li>
            <?php for($i=$pageindex-3;$i <= $pageindex+3;$i++){ ?>
                <?php if($i <= 1) continue; ?>
                <?php if( $i >= $countpost ) continue; ?>
                <?php if($i == $pageindex) { ?>
                    <li class="active"><a href="javascript:void(0);"><?= $i ?></a></li>
                <?php } else{ ?>
                    <li class=""><a href="<?= $url ?><?= $i ?>"><?= $i ?></a></li>

            <?php } } ?>
            <li> <a href="javascript:void(0);"> ... </a></li>
            <?php if ($pageindex == $countpost){ ?>
                <li class="active"> <a href="javascript:void(0);"><?= $countpost ?></a></li>
            <?php } else{ ?>
                <li class=""> <a href="<?= $url ?><?= $countpost ?>"><?= $countpost ?></a></li>

            <?php } if ($pageindex != $countpost){ ?>
                <li> <a href="<?= $url ?><?= $pageindex+1 ?>"><!--<i class="fa fa-long-arrow-right"></i>-->بعدی</a></li>
            <?php } ?>
        </ul>
    </div>
    <?php
    $output = ob_get_clean();
    return $output;
}