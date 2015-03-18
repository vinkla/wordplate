<div class="wrap">
	<h2>Server Information</h2>
	<p>Server settings information like operating system, IP address, Hostname, date/time configuration, PHP version, MySQL data usage and much more.</p>

	<table class="widefat" style="margin:0 0 20px;">
		<thead>
			<tr>
				<th width="30%"><strong>Server</strong></th>
				<th width="70%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Operating System</td>
				<td><?php echo PHP_OS; ?></td>
			</tr>
			<tr>
				<td>Software</td>
				<td><?php echo $_SERVER['SERVER_SOFTWARE'] ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Hostname</td>
				<td><?php echo $_SERVER['SERVER_NAME'] ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>IP</td>
				<td><?php echo sprintf('%s:%s', $_SERVER['SERVER_ADDR'], $_SERVER['SERVER_PORT']) ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Admin</td>
				<td><?php echo $_SERVER['SERVER_ADMIN'] ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Document Root</td>
				<td><?php echo $_SERVER['DOCUMENT_ROOT'] ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Date/Time</td>
				<td><?php echo date(sprintf('%s @ %s', get_option('date_format'), get_option('time_format')), current_time('timestamp')) ?: 'N/A'; ?></td>
			</tr>
		</tbody>
	</table><!-- /widefat -->

	<table class="widefat" style="margin:0 0 20px;">
		<thead>
			<tr>
				<th width="30%"><strong>PHP</strong></th>
				<th width="70%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Version</td>
				<td><?php echo PHP_VERSION; ?></td>
			</tr>
			<tr>
				<td>Memory Limit</td>
				<td><?php echo ini_get('memory_limit') ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Max Post Size</td>
				<td><?php echo ini_get('post_max_size') ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Max Upload Size</td>
				<td><?php echo ini_get('upload_max_filesize') ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Max Execution Time</td>
				<td><?php echo ini_get('max_execution_time') ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Max Input Time</td>
				<td><?php echo ini_get('max_input_time') ?: 'N/A'; ?></td>
			</tr>
			<tr>
				<td>Display Errors</td>
				<td><?php echo (ini_get('display_errors') ? 'On' : 'Off') ?: 'N/A'; ?></td>
			</tr>
		</tbody>
	</table><!-- /widefat -->

	<table class="widefat" style="margin:0 0 20px;">
		<thead>
			<tr>
				<th width="30%"><strong>MySQL</strong></th>
				<th width="70%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Version</td>
				<td><?php echo $wpdb->get_var('SELECT VERSION() AS version'); ?></td>
			</tr>
			<tr>
				<td>Data Usage</td>
				<td>
					<?php
                    $data = '';
                    $tables = $wpdb->get_results('SHOW TABLE STATUS');
                    foreach ($tables as $table) {
                        $data += $table->Data_length;
                    }
                    echo format_bytes($data) ?: 'N/A';
                    ?>
				</td>
			</tr>
			<tr>
				<td>Maximum No. Connections</td>
				<td>
					<?php
                    $query = $wpdb->get_row("SHOW VARIABLES LIKE 'max_connections'");
                    $value = $query->Value;
                    echo $value ?: 'N/A';
                    ?>
				</td>
			</tr>
			<tr>
				<td>Maximum Packet Size</td>
				<td>
					<?php
                    $query = $wpdb->get_row("SHOW VARIABLES LIKE 'max_allowed_packet'");
                    $value = $query->Value;
                    echo format_bytes($value) ?: 'N/A';
                    ?>
				</td>
			</tr>
		</tbody>
	</table><!-- /widefat -->
</div><!-- /wrap -->
