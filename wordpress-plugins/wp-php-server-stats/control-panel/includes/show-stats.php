<?php
if ( current_user_can( 'manage_options' ) ) {
// Check if user has administrator rights, so this script cannot be run outside of the WordPress environment. This is very important, since this information shouldn't be displayed to unauthenticated guests.
	$load = getrusage();

	if (PHP_OS_FAMILY === "Windows") {
		$wmi = new COM('WinMgmts:\\\\.');
		$cpus = $wmi->InstancesOf('Win32_Processor');
		$cpuload = 0;
		$cpu_count = 0;
		foreach ($cpus as $key => $cpu) {
			$cpuload += $cpu->LoadPercentage;
			$cpu_count++;
		}
		$res = $wmi->ExecQuery('SELECT FreePhysicalMemory,FreeVirtualMemory,TotalSwapSpaceSize,TotalVirtualMemorySize,TotalVisibleMemorySize FROM Win32_OperatingSystem');
		$mem = $res->ItemIndex(0);
		$memtotal = round($mem->TotalVisibleMemorySize / 1000000,2);
		$memavailable = round($mem->FreePhysicalMemory / 1000000,2);
		$memused = round($memtotal-$memavailable,2);
	}
	else if (PHP_OS_FAMILY === "Linux") {
		$load = sys_getloadavg();
		$cpuload = $load[0];
		$cpu_count = shell_exec('nproc');
		$free = shell_exec('free');
		$free = (string)trim($free);
		$free_arr = explode("\n", $free);
		$mem = explode(" ", $free_arr[1]);
		$mem = array_filter($mem, function($value) { return ($value !== null && $value !== false && $value !== ''); });
		$mem = array_merge($mem);
		$memtotal = round($mem[1] / 1000000,2);
		$memused = round($mem[2] / 1000000,2);
		$memfree = round($mem[3] / 1000000,2);
		$memshared = round($mem[4] / 1000000,2);
		$memcached = round($mem[5] / 1000000,2);
		$memavailable = round($mem[6] / 1000000,2);
	}
	else{
		echo 'Unsupported operating system detected, only Windows & Linux are supported';
		die();
	}

	$memusage = round(($memused/$memtotal)*100);		
	$phpload = round(memory_get_usage() / 1000000,2);
	$diskfree = round(disk_free_space(".") / 1000000000);
	$disktotal = round(disk_total_space(".") / 1000000000);
	$diskused = round($disktotal - $diskfree);
	$diskusage = round($diskused/$disktotal*100);
}
?>
<center>
<h1>
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
	
	<button class="button button-primary" onClick="window.location.reload();">Refresh Statistics</button>
</h1>
</center>
