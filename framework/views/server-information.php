<div class="wrap">
	<h2>Server Information</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

	<h3 class="title">Server</h3><!-- /title -->
	<table class="widefat">
		<tbody>
			<tr>
				<td>Operating System</td>
				<td><?php echo PHP_OS; ?></td>
			</tr>
			<tr>
				<td>Software</td>
				<td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
			</tr>
			<tr>
				<td>Hostname</td>
				<td><?php echo $_SERVER['SERVER_NAME']; ?></td>
			</tr>
			<tr>
				<td>IP</td>
				<td><?php echo $_SERVER['SERVER_ADDR']; ?>:<?php echo $_SERVER['SERVER_PORT']; ?></td>
			</tr>
			<tr>
				<td>Admin</td>
				<td><?php echo $_SERVER['SERVER_ADMIN']; ?></td>
			</tr>
			<tr>
				<td>Document Root</td>
				<td><?php echo $_SERVER['DOCUMENT_ROOT']; ?></td>
			</tr>
			<tr>
				<td>Date/Time</td>
				<td><?php echo date(sprintf('%s @ %s', get_option('date_format'), get_option('time_format')), current_time('timestamp')); ?></td>
			</tr>
		</tbody>
	</table><!-- /widefat -->

	<h3 class="title">PHP</h3><!-- /title -->
	<table class="widefat">
		<tbody>
			<tr>
				<td>Version</td>
				<td><?php echo PHP_VERSION; ?></td>
			</tr>
		</tbody>
	</table><!-- /widefat -->

	<h3 class="title">Database</h3><!-- /title -->
	<table class="widefat">
			</thead>
		<tbody>
			<tr>
				<td>Key</td>
				<td>Value</td>
			</tr>
		</tbody>
	</table><!-- /widefat -->
</div><!-- /wrap -->
