</div>
</div>

<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery/jquery.countdown.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/popper/popper.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery/moment.js"></script>
<script src="<?php echo base_url(); ?>vendor/jquery/moment-timezone-with-data.js"></script>
<script  src="<?php echo base_url(); ?>vendor/jquery/jquery-2.0.3.js"></script>
<script  src="<?php echo base_url(); ?>vendor/jquery/jquery.countdownTimer.js"></script>


<script type="text/javascript">
var nextYear = moment.tz("<?=$datas[0]->fim?>", "America/Sao_Paulo");
$('#clock1').countdown(nextYear.toDate(), function(event) {
  $(this).html(event.strftime('%D dias %H:%M:%S'));
});
</script>

<script type="text/javascript">
var nextYear = moment.tz("<?=$datas[1]->fim?>", "America/Sao_Paulo");
$('#clock2').countdown(nextYear.toDate(), function(event) {
  $(this).html(event.strftime('%D dias %H:%M:%S'));
});
</script>

<script type="text/javascript">
var nextYear = moment.tz("<?=$datas[2]->fim?>", "America/Sao_Paulo");
$('#clock3').countdown(nextYear.toDate(), function(event) {
  $(this).html(event.strftime('%D dias %H:%M:%S'));
});
</script>

<script type="text/javascript">
var nextYear = moment.tz("<?=$datas[3]->fim?>", "America/Sao_Paulo");
$('#clock5').countdown(nextYear.toDate(), function(event) {
  $(this).html(event.strftime('%D dias %H:%M:%S'));
});
</script>

<script type="text/javascript">
var div = document.getElementById("clock4");
    div.textContent = "---";
    var text = div.textContent;
</script>

<script type="text/javascript">
var div = document.getElementById("clock11");
    div.textContent = "---";
    var text = div.textContent;
</script>

</body>

</html>
