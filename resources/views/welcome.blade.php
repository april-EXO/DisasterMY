<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	@include('layouts.header')


</head>

<body>
	@include('mapview')
	<!-- Button trigger modal -->
	<div class="d-grid gap-2 col-3 p-5 mx-auto">
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
			Report Incident
		</button>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Report Incident</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<!--form-->
					<form>
						<!-- 2 column grid layout with text inputs for the first and last names -->
						<div class="row mb-4">
							<div class="col">
								<div class="form-outline">
									<div class="form-floating">
										<select class="form-select" id="event" aria-label="event">
											<option value="" selected disabled>Select</option>
											<option value="flood"> Flood </option>
											<option value="landslide"> Landslide </option>
											<option value="forestfire"> Forest Fire </option>
											<option value="others"> Others </option>
										</select>
										<label for="event">Event Type</label>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="form-floating">
									<input type="other" class="form-control" id="other">
									<label for="floatingInput">Other:</label>
								</div>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col">
								<div class="form-outline">
									<div class="form-floating">
										<input type="date" class="form-control" id="date">
										<label for="floatingInput">Date</label>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="form-floating">
									<input type="time" class="form-control" id="time">
									<label for="floatingInput">Time</label>
								</div>
							</div>
						</div>

						<!-- Message input -->
						<div class="form-outline mb-4">
							<textarea class="form-control" id="form6Example7" rows="4"></textarea>
							<label class="form-label" for="form6Example7">Select location</label>
						</div>

						<!-- Message input -->
						<div class="form-outline mb-4">
							<textarea class="form-control" id="form6Example7" rows="4"></textarea>
							<label class="form-label" for="form6Example7">Additional information</label>
						</div>

						<div class="d-grid gap-2 col-6 mx-auto">
							<!-- Submit button -->
							<button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
						</div>
					</form>
					<!--form-->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@include('layouts.footer')