<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo view</title>
	<style>
		.chan{
			background-color: green;
		}
		.le{
			background-color: blue;
		}
	</style>
</head>
<body>
	<h1> demo view </h1>
	{{-- <p>Name : {{ $info['name'] }} </p>
	<p>Name : {{ $info['age'] }} </p> --}}
	{{-- <p> Money : {{ $m }}</p> --}}
	<table width="100%" border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>MSV</th>
				<th>Name</th>
				<th>Age</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Money</th>
			</tr>
		</thead>
		<tbody>
			@php
				$total = 0;
			@endphp

			@foreach($info as $key => $item)
				@php
					$total += $item['money'];
				@endphp
				<tr class="{{ $key % 2 == 0 ? 'chan' : 'le' }}" >
					<td>
						{{ $item['msv'] }}
					</td>
					<td>
						{{ $item['name'] }}
					</td>
					<td>
						{{ $item['age'] }}
					</td>
					<td>
						{{ $item['email'] }}
					</td>
					<td>
						{{ $item['phone'] }}
					</td>
					<td>
						{{ number_format($item['money']) }}
					</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5">Total money : </td>
				<td>{{ number_format($total) }}</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>