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
		<h1>{{$error->message}}</h1>
		<p>
			<strong>Type: </strong>{{$error->type}}<br />
			<strong>Message: </strong>{{$error->message}}<br />
			<strong>File: </strong>{{$error->file}}:{{$error->line}}<br />
			<strong>Line: </strong>{{$error->line}}<br />
			<strong>Url: </strong>{{$error->url}}<br />
			<strong>User: </strong>{{$error->user}}<br />
		</p>
	
		<pre>{{$error->stacktrace}}</pre>

		<p>
			Logged on {{$error->datetime}}
		</p>

		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Value</th>
				</tr>
			</thead>
			<tbody>
				@foreach($context as $key => $value)
					<tr>
						<td>{{$key}}</td>
						<td>
							@if(is_array($value)
								<pre><?php print_r($value); ?></pre>
							@else
								{{$value}}
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</body>
</html>