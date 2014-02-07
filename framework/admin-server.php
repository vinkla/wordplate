<?php
/**
 * OS
 * Server
 * Server Hostname
 * Server IP:Port
 * Server Document Root
 * Server Admin
 * Server Load
 * Server Date/Time
 *
 * MySQL
 * Database Index Disk Usage
 * Database Data Disk Usage
 * MYSQL Maximum Packet Size
 * MYSQL Maximum No. Connection
 *
 * PHP version
 * PHP Memory Limit
 * PHP Max Upload Size
 * PHP Max Post Size
 * PHP Max Script Execute Time
 */
add_action('admin_menu', function()
{
	add_submenu_page(
		'options-general.php',
		'Server Information',
		'Server Information',
		'update_core',
		'server-information',
		'server_information'
	);
});

function server_information()
{
?>
<div class="wrap">
	<h2>Server Information</h2>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

	<h3 class="title">Server</h3><!-- /title -->
	<table class="widefat">
		<thead>
			<tr>
				<th>Key</th>
				<th>Value</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Key</td>
				<td>Value</td>
			</tr>
		</tbody>
	</table><!-- /widefat -->

	<h3 class="title">PHP</h3><!-- /title -->
	<table class="widefat">
		<thead>
			<tr>
				<th>Key</th>
				<th>Value</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Key</td>
				<td>Value</td>
			</tr>
		</tbody>
	</table><!-- /widefat -->

	<h3 class="title">Database</h3><!-- /title -->
	<table class="widefat">
		<thead>
			<tr>
				<th>Key</th>
				<th>Value</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Key</td>
				<td>Value</td>
			</tr>
		</tbody>
	</table><!-- /widefat -->
</div><!-- /wrap -->
<?php
}
