<table class="table table-bordered table-striped mb-0">
    <thead>
      <tr>
        <th>Date</th>
        <th>Vacancy</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($vacancies as $vacancy)
        <tr>
            <td>{{@$vacancy->vdate ? date('d M, Y', strtotime(@$vacancy->vdate)) : ''}}</td>
            <td>{{$vacancy->vacancy}}</td>
            <td>{{@$vacancy->price}}</td>
          </tr>
        @empty
        <tr id="no_data">
            <td colspan="3">
                <p class="text-center">No data found</p>
            </td>
        </tr>
        @endforelse
    </tbody>
  </table>
