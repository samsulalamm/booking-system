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
							<h2>Set Vacancy</h2>
						</div>
						<form id="vacancy_form">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<span class="form-label">Vacancy Date</span>
										<input class="form-control" type="date" min="{{date('Y-m-d')}}" name="vdate">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<span class="form-label">Vacancy</span>
										<input class="form-control" type="number" name="vacancy">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<span class="form-label">Price</span>
										<input class="form-control" type="number" name="price">
									</div>
								</div>
							</div>

							<div class="form-btn">
								<button type="submit" class="submit-btn">Save</button>
							</div>
						</form>
					</div>
				</div>

                <div class="text-right" style="margin-top: 20px;">
                    <a href="{{url('/')}}" class="btn btn-primary btn-lg">Set Reservation</a>
                </div>
                    <h3>Vacancy List</h3>
                <div class="row table-wrapper-scroll-y my-custom-scrollbar"  id='render_list'>
                    @include('render-vacancy')
                </div>

			</div>
		</div>
	</div>
</body>

@include('scripts.functions')
</html>
