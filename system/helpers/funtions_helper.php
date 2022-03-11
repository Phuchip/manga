<?php
function setHref($alias,$id,$chapter=null)
{
    if($chapter == null){
        $url = '/'.$alias.'-'.$id;
    }else{
        $url= '/'.$alias.'/chap-'.$chapter.'-'.$id.'.html';
    }
    return $url;
}
function dayFormat($time){
    return date('d-m-Y',$time);
}
function timeFormat($time){
    return date('H:i d-m-Y',$time);
}
function timming($time){
    if($time > time()){
        return false;
    }
    $time = date('Y-m-d H:i:s',$time);
    return time_elapsed_string($time);
}
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
}
?>