<a class="clear">New Bid(s).</a>
		@if(count($datas) > 0)
		<a id="order-notf-clear" data-href="{{ route('order-notf-clear') }}" class="clear" href="javascript:;">
			Clear All
		</a>
		<ul>
		@foreach($datas as $data)
			<li>
				<a href="{{ route('admin-auction-show',$data->order_id) }}"> <i class="fas fa-newspaper"></i> You Have a new Bid.</a>
			</li>
		@endforeach

		</ul>

		@else 

		<a class="clear" href="javascript:;">
			No New Bids.
		</a>

		@endif