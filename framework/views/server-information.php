<div class="wrap">
	<h2>Server Information</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

	<table class="widefat" style="margin:0 0 20px;">
		<thead>
			<tr>
				<th><strong>Server</strong></th>
				<th>&nbsp;</th>
			</tr>
		</thead>
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
				<td><?php echo sprintf('%s:%s', $_SERVER['SERVER_ADDR'], $_SERVER['SERVER_PORT']); ?></td>
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

	<table class="widefat" style="margin:0 0 20px;">
		<thead>
			<tr>
				<th><strong>PHP</strong></th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Version</td>
				<td><?php echo PHP_VERSION; ?></td>
			</tr>
			<tr>
				<td>Memory Limit</td>
				<td><?php echo ini_get('memory_limit') ? ini_get('memory_limit') : 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Max Post Size</td>
				<td><?php echo ini_get('post_max_size') ? ini_get('post_max_size') : 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Max Upload Size</td>
				<td><?php echo ini_get('upload_max_filesize') ? ini_get('upload_max_filesize') : 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Max Execution Time</td>
				<td><?php echo ini_get('max_execution_time') ? ini_get('max_execution_time') : 'N/A'; ?></td>
			</tr>
		</tbody>
	</table><!-- /widefat -->

	<table class="widefat" style="margin:0 0 20px;">
		<thead>
			<tr>
				<th><strong>MySQL</strong></th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Version</td>
				<td><?php echo $wpdb->get_var("SELECT VERSION() AS version"); ?></td>
			</tr>
			<tr>
				<td>Data Usage</td>
				<td>
					<?php
					$data = '';
					$tables = $wpdb->get_results('SHOW TABLE STATUS');
					foreach ($tables as $table) { $data += $table->Data_length; }
					echo $data ? sprintf('%s bytes', $data) : 'N/A';
					?>
				</td>
			</tr>
			<tr>
				<td>Max Allowed Connections</td>
				<td>
					<?php
					$query = $wpdb->get_row("SHOW VARIABLES LIKE 'max_connections'");
					$value = $query->Value;
					echo $value ? $value : 'N/A';
					?>
				</td>
			</tr>

		</tbody>
	</table><!-- /widefat -->
</div><!-- /wrap -->
