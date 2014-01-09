<?php
$mmedia = new model_media();
$count['tv'] = $mmedia->count('tv');
$count['radio'] = $mmedia->count('radio');
$count['vod'] = $mmedia->count('vod');

$total = $count['tv'] + $count['radio'] + $count['vod'];

$tv = abs($count['tv']*100/$total);
$radio = abs($count['radio']*100/$total);
$vod = abs($count['vod']*100/$total);

?>

<div class="well-lg" style="background-color: #ffffff">
    <h3>Set Top Box Media Information</h3>
    <a href="" class="btn btn-success">TV <span class="badge"><?php echo $count['tv']; ?></span></a>
    <a href="" class="btn btn-info">Radio <span class="badge"><?php echo $count['radio']; ?></span></a>
    <a href="" class="btn btn-warning">Video on Demand <span class="badge"><?php echo $count['vod']; ?></span></a>

    <h3>Media Usage</h3>
    <div class="progress">
        <div class="progress-bar progress-bar-success" style="width: <?php echo ($tv==0)?1:(($tv==100)?98:$tv); ?>%">
            <span class="sr-only"><?php echo $tv; ?>%</span>
        </div>
        <div class="progress-bar progress-bar-info" style="width: <?php echo ($radio==0)?1:(($radio==100)?98:$radio); ?>%">
            <span class="sr-only"><?php echo $radio; ?>%</span>
        </div>
        <div class="progress-bar progress-bar-warning" style="width: <?php echo ($vod==0)?1:(($vod==100)?98:$vod); ?>%">
            <span class="sr-only"><?php echo $vod; ?>%</span>
        </div>
    </div>

</div>