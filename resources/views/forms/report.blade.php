<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
	Launch demo modal
</button>

<!-- Modal -->
<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
	<div class="modal-dialog modal-lg  modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Report Incident</h5>
				<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<!--form-->
				<form action="addReport" method="POST">
					<!-- 2 column grid layout with text inputs for the first and last names -->
					<div class="row mb-4">
						<div class="col">
							<div class="form-outline">
								<input type="text" id="eventtype" class="form-control" />
								<label class="form-label" for="form6Example1">Event Type</label>
							</div>
						</div>
						<div class="col">
							<div class="form-outline">
								<input type="text" id="form6Example2" class="form-control" />
								<label class="form-label" for="form6Example2">Last name</label>
							</div>
						</div>
					</div>

					<!-- Text input -->
					<div class="form-outline mb-4">
						<input type="text" id="form6Example3" class="form-control" />
						<label class="form-label" for="form6Example3">Company name</label>
					</div>

					<!-- Text input -->
					<div class="form-outline mb-4">
						<input type="text" id="form6Example4" class="form-control" />
						<label class="form-label" for="form6Example4">Address</label>
					</div>

					<!-- Email input -->
					<div class="form-outline mb-4">
						<input type="email" id="form6Example5" class="form-control" />
						<label class="form-label" for="form6Example5">Email</label>
					</div>

					<!-- Number input -->
					<div class="form-outline mb-4">
						<input type="number" id="form6Example6" class="form-control" />
						<label class="form-label" for="form6Example6">Phone</label>
					</div>

					<!-- Message input -->
					<div class="form-outline mb-4">
						<textarea class="form-control" id="form6Example7" rows="4"></textarea>
						<label class="form-label" for="form6Example7">Additional information</label>
					</div>

					<!-- Checkbox -->
					<div class="form-check d-flex justify-content-center mb-4">
						<input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
						<label class="form-check-label" for="form6Example8"> Create an account? </label>
					</div>

					<!-- Submit button -->
					<button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
				</form>
				<!--form-->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
					Close
				</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>