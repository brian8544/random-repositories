<?php 
require_once('includes/get-stats.php');
?>
	<!--
	<p><span class="description">🖥️ Total CPU's:</span> <span class="result"><?php echo $cpu_count; ?></span></p>
	-->
	<p><span class="description">🖥️ CPU Usage: </span> <span class="result"><?php echo $cpuload; ?>%</span></p>
	<p><span class="description">🐏 RAM Usage:</span> <span class="result"><?php echo $memusage; ?>%</span></p>
	<p><span class="description">💽 Disk Usage: </span> <span class="result"><?php echo $diskusage; ?>%</span></p>
	<hr>
	<p><span class="description">🌡️ RAM Used:</span> <span class="result"><?php echo $memused; ?> GB</span></p>
	<p><span class="description">🌡️ RAM Total:</span> <span class="result"><?php echo $memtotal; ?> GB</span></p>
	<p><span class="description">🌡️ RAM Available:</span> <span class="result"><?php echo $memavailable; ?> GB</span></p>
	<hr>
	<p><span class="description">💽 Disk Free:</span> <span class="result"><?php echo $diskfree; ?> GB</span></p>
	<p><span class="description">💽 Disk Used:</span> <span class="result"><?php echo $diskused; ?> GB</span></p>
	<p><span class="description">💽 Disk Total:</span> <span class="result"><?php echo $disktotal; ?> GB</span></p>
	<hr>
	<p><span class="description">🔎 Domain: </span> <span class="result"><?php echo $_SERVER['SERVER_NAME']; ?></span></p>
	<p><span class="description">📡 IP Address: </span> <span class="result"><?php echo $_SERVER['SERVER_ADDR']; ?></span></p>