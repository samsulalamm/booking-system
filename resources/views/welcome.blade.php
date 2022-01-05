<!DOCTYPE html>
<html lang="en">
@include('scripts.header-files')
<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h2>Reserve your Room</h2>
						</div>
						<form id="reservation_form">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Arrival date</span>
										<input class="form-control start-date" type="date" min="{{date('Y-m-d')}}" name="start_date">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Departure date</span>
										<input class="form-control end-date" type="date" min="{{date('Y-m-d')}}" name="end_date">
									</div>
								</div>
							</div>
							<div class="form-btn">
								<button type="submit" class="submit-btn">Check availability</button>
							</div>
						</form>
					</div>
				</div>

                <div class="text-right" style="margin-top: 20px;">
                    <a href="{{url('/set-vacancy')}}" class="btn btn-primary btn-lg">Set Vacancy</a>
                </div>
                    <h3>Reservation History</h3>
                <div class="row table-wrapper-scroll-y my-custom-scrollbar">
                    @include('render-reservation-history')
                </div>

			</div>
		</div>
	</div>
</body>
    @include('scripts.functions')
</html>
