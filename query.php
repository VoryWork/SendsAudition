<?php
$config = json_decode(file_get_contents("db.db"),true);
$time = $config[$_GET["msid"]]["time"];
$class = $config[$_GET["msid"]]["class"];
$count = 0;
foreach ($config as $name => $data){
    if ($data["time"]< $time && $data["class"] == $class){
        $count += 1;
    }
}
if ($count == 0){echo "轮到你面试了!";}
else{echo "你前面还有 ".$count." 个人排队";}
?>