<table class="table table-bordered table-striped mb-0">
    <thead>
      <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody id='render_list'>
        @forelse ($reservations as $reservation)
        <tr>
            <td>{{@$reservation->start_date ? date('d M, Y', strtotime(@$reservation->start_date)) : ''}}</td>
            <td>{{$reservation->end_date ? date('d M, Y', strtotime(@$reservation->end_date)) : ''}}</td>
            <td>{{@$reservation->total_price}}</td>
          </tr>
        @empty
        <tr id="no_data">
            <td colspan="3">
                <p class="text-center">No reservation found</p>
            </td>
        </tr>
        @endforelse
    </tbody>
  </table>
