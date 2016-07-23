
<div class="body-wrapper">
<h3 class="headline">Statistics</h3>
<h4 class="form-headline">All Products Sold</h4>
<canvas id="all_sold_products" data-chart-data="<?php echo htmlentities(json_encode($all_sold_products)); ?>"  height="100px"></canvas>
<h4 class="form-headline">Customers age</h4>
<canvas id="customers_age" data-chart-data="<?php echo htmlentities(json_encode($customers_age)); ?>"  height="100px"></canvas>
<h4 class="form-headline">Day of Order</h4>
<canvas id="day_of_order" data-chart-data="<?php echo htmlentities(json_encode($day_of_order)); ?>"  height="100px"></canvas>
<h4 class="form-headline">Orders per Hour</h4>
<canvas id="hour_of_order" data-chart-data="<?php echo htmlentities(json_encode($hour_of_order)); ?>" height="100px"></canvas>
<h4 class="form-headline">ZIP of Order</h4>
<canvas id="zip_of_order" data-chart-data="<?php echo htmlentities(json_encode($zip_of_order)); ?>" height="100px"></canvas>
<h4 class="form-headline">Most Sold Products</h4>
<canvas id="sold_products" data-chart-data="<?php echo htmlentities(json_encode($sold_products)); ?>" height="100px"></canvas>
<h4 class="form-headline">Payment</h4>
<canvas id="order_payment" data-chart-data="<?php echo htmlentities(json_encode($order_payment)); ?>" height="100px"></canvas>

</div>

<script src="bower_components/jquery/dist/jquery.js"></script>
<script src="bower_components/Chart.js/dist/Chart.min.js"></script>
<script src="charts.js"></script>
