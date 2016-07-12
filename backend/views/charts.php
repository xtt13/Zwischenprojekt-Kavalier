<?php echo 'Geht das auch?'?>

<div class="body-wrapper">
<h3 class="headline">Statistics</h3>
<canvas id="day_of_order" data-chart-data="<?php echo htmlentities(json_encode($day_of_order)); ?>"  height="100px"></canvas>
<canvas id="hour_of_order" data-chart-data="<?php echo htmlentities(json_encode($hour_of_order)); ?>" height="100px"></canvas>
<canvas id="zip_of_order" data-chart-data="<?php echo htmlentities(json_encode($zip_of_order)); ?>" height="100px"></canvas>
</div>
