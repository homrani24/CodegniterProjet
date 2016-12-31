
<script src="<?php echo base_url(); ?>/assets/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/fancybox/fancybox.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/fancybox/helpers/jquery.fancybox-thumbs.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.flexslider-min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/masonry.pkgd.min.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/jquery.fractionslider.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/ion.rangeSlider.min.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/main.js">"></script>

<script>
"use strict";
// Range Slider
$(document).ready(function () {
	var $range_cost = $("#range_cost");
	$range_cost.ionRangeSlider({
	    type: "double",
	    grid: true,
	    min: 0,
	    max: 20000,
	    from: 200,
	    to: 14000,
	    prefix: "$",
	});
	$range_cost.on("change", function () {
	    var $this = $(this),
	        value = $this.prop("value").split(";");

	    $('#range_cost_ttl').html("$" + value[0] + " - $" + value[1]);
	});
	var $range_year = $("#range_year");
	$range_year.ionRangeSlider({
	    type: "double",
	    grid: true,
	    min: 1990,
	    max: 2016,
	    from: 2013,
	    to: 2016,
	});
	$range_year.on("change", function () {
	    var $this = $(this),
	        value = $this.prop("value").split(";");

	    $('#range_year_ttl').html(value[0] + " - " + value[1]);
	});
});
</script>

</body>
</html>