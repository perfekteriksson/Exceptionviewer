<?php
function remove_namespace($type) {
	$strr = strrchr($type, '\\');
	if(empty($strr)) {
		return $type;
	}
	return substr($strr, 1);
}

function get_path($error) {
	$context = json_decode($error->context, true);
	return $context['REQUEST_URI'];
}
?>
<!doctype html>
<html>
	<head>
		<meta name="robots" content="noindex,nofollow" />
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
					<th>URL</th>
					<th>Error</th>
					<th>User</th>
					<th>Date</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($errors as $error)
					<tr>
						<td>
							<span title="{{ $error->type }}">
								{{ remove_namespace($error->type) }}
							</span>
						</td>
						<td>
							{{ get_path($error )}}
						</td>
						<td>
							{{ $error->message }}
							<a href="/exceptions/{{ $error->id }}">Details</a>
						</td>
						<td>{{ $error->user }}</td>
						<td>{{ $error->datetime }}</td>
						<td><a href="/exceptions/delete/{{ $error->id }}">Delete</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</body>
</html>