<tr>
    <td>{{@$reservation->start_date ? date('d M, Y', strtotime(@$reservation->start_date)) : ''}}</td>
    <td>{{$reservation->end_date ? date('d M, Y', strtotime(@$reservation->end_date)) : ''}}</td>
    <td>{{@$reservation->total_price}}</td>
  </tr>
