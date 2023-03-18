<!DOCTYPE html>
<?php $cg = '' ?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latest Movie Downloader</title>
	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Google+Sans:300,400,800">
	<link rel="stylesheet" href="devices.css">
	<link rel="stylesheet" href="albums.css">
	<!-- jQuery library -->
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
	<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary navbar bg-dark" data-bs-theme="dark" style="z-index: 1040;">
		<div class="container-fluid"> <a class="navbar-brand" href="/albums.php">Albums Viewer</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse  justify-content-end" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item"> <a class="nav-link active" aria-current="page" href="/albums.php">Home</a> </li>
					<li class="nav-item"> <a class="nav-link" href="javascript:validate()">Data updater</a> </li>
					<li class="nav-item"> <a class="nav-link" href="#">API tester</a> </li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="tabArea">
		<nav id="tabber" class="tabNav">
			<div class="nav fixed-top nav-tabs nav-fill justify-content-center bg-dark pt-2 ps-5 pe-5" id="nav-tab" role="tablist" style="margin-top: 55px; ">
				<button class="nav-link active" id="nav-allLaunguages-tab" data-bs-toggle="tab" data-bs-target="#nav-allLaunguages" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All launguages</button>
				<button class="nav-link" id="nav-english-tab" data-bs-toggle="tab" data-bs-target="#nav-english" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">English</button>
				<button class="nav-link" id="nav-tamil-tab" data-bs-toggle="tab" data-bs-target="#nav-tamil" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">தமிழ்</button>
				<button class="nav-link" id="nav-telugu-tab" data-bs-toggle="tab" data-bs-target="#nav-telugu" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">తెలుగు</button>
				<button class="nav-link" id="nav-hindi-tab" data-bs-toggle="tab" data-bs-target="#nav-hindi" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">हिंदी</button>
				<button class="nav-link" id="nav-kannada-tab" data-bs-toggle="tab" data-bs-target="#nav-kannada" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">ಕನ್ನಡ</button>
				<button class="nav-link" id="nav-malayalam-tab" data-bs-toggle="tab" data-bs-target="#nav-malayalam" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">മലയാളം</button>
			</div>
		</nav>
		<div class="tab-content" id="nav-tabContent tabber">
			<div class="tab-pane fade show active" id="nav-allLaunguages" role="tabpanel" aria-labelledby="nav-allLaunguages-tab" tabindex="0">
				<div id="All" class="row showcase justify-content-center"> </div>
			</div>
			<div class="tab-pane fade text-center" id="nav-english" role="tabpanel" aria-labelledby="nav-english-tab" tabindex="0">
				<div id="Eng" class="row showcase justify-content-center"> </div>
			</div>
			<div class="tab-pane fade" id="nav-tamil" role="tabpanel" aria-labelledby="nav-tamil-tab" tabindex="0">
				<div id="Tam" class="row showcase justify-content-center"> </div>
			</div>
			<div class="tab-pane fade" id="nav-telugu" role="tabpanel" aria-labelledby="nav-telugu-tab" tabindex="0">
				<div id="Tel" class="row showcase justify-content-center"> </div>
			</div>
			<div class="tab-pane fade" id="nav-hindi" role="tabpanel" aria-labelledby="nav-hindi-tab" tabindex="0">
				<div id="Hin" class="row showcase justify-content-center"> </div>
			</div>
			<div class="tab-pane fade" id="nav-kannada" role="tabpanel" aria-labelledby="nav-kannada-tab" tabindex="0">
				<div id="Kan" class="row showcase justify-content-center"> </div>
			</div>
			<div class="tab-pane fade" id="nav-malayalam" role="tabpanel" aria-labelledby="nav-malayalam-tab" tabindex="0">
				<div id="Mal" class="row showcase justify-content-center"> </div>
			</div><!-- <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div> -->
		</div>
	</div><!-- tabArea end div -->
	<?php
	// include 'src/mail/mail.php';
	?>
	<div class="cnt" style="padding-top: 100px;">
		<div id="statBox" class="container">
			<h4 class='text-center mb-3'>Status of the task</h4>
			<div class="progress">
				<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<div id='progmsg' class="mt-3"></div>
		</div>
		<div id="statBox" class="container-fluid">
			<h4 id="progms"></h4>
		</div>
	</div>
	</div>
	<!-- cnt div end -->
	<!-- Modal -->
	<div id="downloadViewer" class="modal col-6 col-md-12 col-xs-12">
		<div class="modal-dialog modal-fullscreen force-fullscreen">
			<div class="modal-content">
				<!-- <div class="modal-header">
					<h5 class="modal-title">Downloader</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div> -->
				<div class="modal-body text-center" id="dContent">
					<div class="row align-items-center">
						<div class="col">
							<div class="device device-imac device-purple ">
								<div class="device-frame">
									<div id="carExInd" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
										<div class="carousel-indicators" style="display:flex">
											<button type="button" data-bs-target="#carExInd" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
											<button type="button" data-bs-target="#carExInd" data-bs-slide-to="1" aria-label="Slide 2"></button>
											<button type="button" data-bs-target="#carExInd" data-bs-slide-to="2" aria-label="Slide 3"></button>
										</div>
										<div class="carousel-inner">
											<div class="carousel-item active"> <img src="images/bg-07.jpg" class="d-block w-100" alt="image1"> </div>
											<div class="carousel-item"> <img src="images/bg-08.jpg" class="d-block w-100" alt="image2"> </div>
											<div class="carousel-item"> <img src="images/bg-09.jpg" class="d-block w-100" alt="image3"> </div>
										</div>
									</div>
								</div>
								<div class="device-stripe"></div>
								<div class="device-header"></div>
								<div class="device-sensors"></div>
								<div class="device-btns"></div>
								<div class="device-power"></div>
								<div class="device-home"></div>
							</div>
						</div>
						<div class="col downlinks">
							<h4 id="movieTitle" style="text-shadow: 2px 2px black;">Enkilum Chandrike (2023) Malayalam Proper HQ PreDVD - [1080p & 720p - x264 - 2.5GB - 1.4GB & 900MB | x264 - 700MB - 400MB & 250MB] - HQ Clean Audio</h4>
							<!--accrdian writing js dynamic with download links  -->
							<div class="accordion accordion-flush" id="downloadAccordian"> </div>
						</div>
					</div>
					<!-- <p>The modal body is where all the text, images, and links go.</p> -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
			</div>
		</div>
	</div>
	<!-- live toast -->
	<div class="toast-container position-fixed bottom-0 end-0 p-3 pb-5">
		<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-header">
				<!-- <img src="/images/bg-07.jpg" class="rounded me-2" alt="..."> -->
				<strong class="me-auto">Hello</strong>
				<small>1 second ago</small>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
			</div>
			<div class="toast-body" style="color: rgba(33, 37, 41, 0.75)">
				Hello, world! This is a toast message.
			</div>
		</div>
	</div><!--toast end -->
	<footer class="container-fluid text-center sticky" style="z-index: 10; position: fixed; text-align: center;bottom: 0;left: 0;margin-bottom: 0;width: 100%; background-color: black;padding-top: 8px; color: silver;">
		<p style="color: silver; font-size: 10px;">Copyrights to Robot Technologies</p>
	</footer>
	<div style="display: none;">
		<p id="count">1</p>
		<p id="total">100</p>
	</div>
	<div class="modal" id="spinnerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-fullscreen force-fullscreen">
			<div class="modal-content">

				<div class="modal-body d-flex justify-content-center align-items-center">

					<div class="spinner-grow" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
					<div class="ps-2">preparing for launching... </div>

				</div>
			</div>
		</div>
		<!-- base scripts -->
		<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fetch-jsonp/1.0.6/fetch-jsonp.min.js"></script>
		<script src="albums.js"></script>
</body>

</html>