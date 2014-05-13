<!doctype html>
<html>
	<head>
		<style type="text/css">
			body { 
			    font-size: 75%;
			    font-family: Verdana, Tahoma, Arial, "Helvetica Neue", Helvetica, Sans-Serif;
			    color: #232323;
			    background-color: white;
			    padding: 3px;
			    margin: 0;
			}

			a {
				color: #0033CC;
				text-decoration: none
			}

			table {
				width: 100%;
				border-collapse: collapse;
			}

			td {
				padding: 0.4em;
				vertical-align: top;
			}

			th {
				background-color: #0A6CCE;
				text-align: left;
				padding: 0.4em;
				color: #FEFEFE;
				vertical-align: top;
			}

			tr {
				background: #fefefe;
			}

			pre {
				font-size: 110%;
				font-family: Consolas, Monaco, monospace;
				background-color: #ffffcc;
				overflow: scroll;
				padding: 1em;
				width: 100%;
			}
		</style>
	</head>
	<body>
		<h1>Error log</h1>
		<h2>{{count($errors)}} errors</h2>

		<p>
			<a href="/">Back to site</a>
			|
			<a href="/exceptions/flush">Remove all errors</a>
		</p>

		<table>
			<thead>
				<tr>
					<th>Type</th>
					<th>Error</th>
					<th>User</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($errors as $error): ?>
					<tr>
						<td><?php echo $error->type; ?></td>
						<td>
							<?php echo $error->message; ?>.
							<a href="/exceptions/<?php echo $error->id; ?>">Details</a>
						</td>
						<td><?php echo $error->user; ?></td>
						<td><?php echo $error->datetime; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</body>
</html>