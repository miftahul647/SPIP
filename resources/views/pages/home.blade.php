@extends('layouts.app')

@section('title')
	Jardik Hompage
@endsection

@section('content')
	<!-- News Section -->
	<section class="owl-carousel home-carousel">
		<div class="slider-item" style="background-image: url('images/bg3.jpg')">
			<div class="overlay">
				<div class="container">
					<div class="row slider-text align-items-center">
							<div class="col-md-6">
									<h1 class="title">Diklat Penyuluh Anti Korupsi</h1>
									<h6 class="description">
											Lorem ipsum dolor sit amet consectetur adipisicing elit.
											Laudantium, vel ducimus aut ratione et harum voluptatibus eum,
									</h6>

									<a href="" class="btn btn-primary-aclc">Selengkapnya</a>
							</div>
							<div class="col-md-6">
									<img src="images/bg3.jpg" class="d-none d-sm-none d-md-block" alt="" />
							</div>
					</div>
				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url('images/bg2.jpg')">
				<div class="overlay">
						<div class="container">
								<div class="row slider-text align-items-center">
										<div class="col-md-6">
												<h1 class="title">
														Paksi Bengkulu Sebarkan Semangat Antikorupsi di Panti Asuhan
												</h1>
												<h6 class="description">
														Lorem ipsum dolor sit amet consectetur adipisicing elit.
														Laudantium, vel ducimus aut ratione et harum voluptatibus eum,
												</h6>

												<a href="" class="btn btn-primary-aclc">Selengkapnya</a>
										</div>
										<div class="col-md-6 col-md-6 col-sm-12">
												<img src="images/bg2.jpg" class="d-none d-sm-none d-md-block" alt="" />
										</div>
								</div>
						</div>
				</div>
		</div>

		<div class="slider-item" style="background-image: url('images/bg3.jpg')">
				<div class="overlay">
						<div class="container">
								<div class="row slider-text align-items-center">
										<div class="col-md-6">
												<h1 class="title">Diklat Penyuluh Anti Korupsi</h1>
												<h6 class="description">
														Lorem ipsum dolor sit amet consectetur adipisicing elit.
														Laudantium, vel ducimus aut ratione et harum voluptatibus eum,
												</h6>

												<a href="" class="btn btn-primary-aclc">Selengkapnya</a>
										</div>
										<div class="col-md-6">
												<img src="images/bg3.jpg" class="d-none d-sm-none d-md-block" alt="" />
										</div>
								</div>
						</div>
				</div>
		</div>
	</section>

	<!-- Topic Section -->
	<section class="section-topic">
			<div class="container">
					<div class="row">
							<div class="col-lg-12">
									<h3 class="sect-title title mb-5">Our Topics</h3>
							</div>
					</div>
					<div class="row">
							<div class="col-lg-3 col-md-6">
									<div class="topic-item">
											<img src="images/statistics.png" alt="" />
											<h5>Statistics</h5>
									</div>
							</div>
							<div class="col-lg-3 col-md-6">
									<div class="topic-item">
											<img src="https://data-app.kpk.go.id/storage/portal/topic.svg" alt="" />
											<h5>Regulasi PAK</h5>
									</div>
							</div>
							<div class="col-lg-3 col-md-6">
									<div class="topic-item">
											<img src="images/college.png" alt="" />
											<h5>Informasi Sekolah</h5>
									</div>
							</div>
							<div class="col-lg-3 col-md-6">
									<div class="topic-item">
											<img src="images/report.png" alt="" />
											<h5>Laporan Sekolah</h5>
									</div>
							</div>
					</div>
			</div>
	</section>

	<!-- Information Section -->
	<section class="section-information">
			<div class="container">
					<div class="row">
							<div class="col-lg-12 mb-5">
									<h3 class="sect-title title">Informasi Umum</h3>
									<h5 class="text-center">
											Informasi ini memberikan gambaran perkembangan implementasi PAK
									</h5>
							</div>
					</div>
					<div class="row d-flex justify-content-center">
							<div class="col-lg-4">
									<div class="info-item">
											<div class="text">
													<h5 class="text-center">Regulasi PAK</h5>
													<h2 class="mb-5 text-center">69,57 %</h2>
													<div class="total mb-3">
															<div>Total Pemda</div>
															<div>548</div>
													</div>
													<div class="total">
															<div class="jumlah">
																	Jumlah pemda yang sudah memiliki regulasi PAK
															</div>
															<div>380</div>
													</div>
											</div>
									</div>
							</div>
							<div class="col-lg-4">
									<div class="info-item">
											<div class="text">
													<h5 class="text-center">Akun Sekolah</h5>
													<h2 class="mb-5 text-center">15, 12 %</h2>
													<div class="total mb-3">
															<div>Total Sekolah</div>
															<div>222.827</div>
													</div>
													<div class="total">
															<div class="jumlah">
																	Jumlah sekolah yang sudah memiliki akun di Jaga
															</div>
															<div>33.698</div>
													</div>
											</div>
									</div>
							</div>
							<div class="col-lg-4">
									<div class="info-item">
											<div class="text">
													<h5 class="text-center">Laporan Sekolah</h5>
													<h2 class="mb-5 text-center">1,69%</h2>
													<div class="total mb-3">
															<div>Total Sekolah</div>
															<div>222.827</div>
													</div>
													<div class="total">
															<div class="jumlah">
																	Jumlah sekolah yang sudah lapor implementasi PAK
															</div>
															<div>3.762</div>
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
	</section>

	<!-- jumlah sekolah -->
	<div class="sect-data-sekolah">
			<div class="container box">
					<div class="row">
							<div class="text-center title">
									<div class="col-lg-12">
											<h3 class="sect-title mb-5">Informasi Jumlah sekolah</h3>
									</div>
							</div>
					</div>
					<div class="row d-flex justify-content-center">
							<div class="col-lg-2 col-md-6">
									<div class="sekolah-item text-center">
											<h3 class="">SD</h3>
											<div class="number">150.878</div>
									</div>
							</div>

							<div class="col-lg-2 col-md-6">
									<div class="sekolah-item text-center">
											<h3>SMP</h3>
											<div class="number">150.878</div>
									</div>
							</div>

							<div class="col-lg-2 col-md-6">
									<div class="sekolah-item text-center">
											<h3>SMA</h3>
											<div class="number">150.878</div>
									</div>
							</div>

							<div class="col-lg-2 col-md-6">
									<div class="sekolah-item text-center">
											<h3>SMK</h3>
											<div class="number">150.878</div>
									</div>
							</div>

							<div class="col-lg-2 col-md-6">
									<div class="sekolah-item text-center">
											<h3>SLB</h3>
											<div class="number">150.878</div>
									</div>
							</div>
					</div>
			</div>
	</div>

	<!-- FAQ -->
	<section id="faq" class="faq mt-5">
			<div class="container">
					<div class="row">
							<div class="col-lg-12">
									<div class="box">
											<h3 class="title">FAQ</h3>
									</div>
							</div>
					</div>
					<div class="row mt-5">
							<div class="col-md-4 text-center" style="height: 700px">
									<img src="images/Stars.png" alt="" class="img-fluid" />
							</div>
							<div class="col-md-8">
									<div class="accordion accordion-flush" id="accordionFlushExample">
											<div class="accordion-item">
													<h2 class="accordion-header" id="flush-headingOne">
															<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
																	data-bs-target="#flush-collapseOne" aria-expanded="false"
																	aria-controls="flush-collapseOne">
																	Molestie phasellus donec nibh nulla molestie. Elementum vel
																	facilisis risus eget habitant pretium, quis bibendum?
															</button>
													</h2>
													<div id="flush-collapseOne" class="accordion-collapse collapse show"
															aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
															<div class="accordion-body">
																	Lorem ipsum dolor sit amet consectetur adipisicing elit.
																	Tempore dolorem quia debitis, iure mollitia quod nihil id ut
																	corrupti voluptatibus ratione doloremque facere numquam.
																	Ratione sit est praesentium voluptate provident.
															</div>
													</div>
											</div>
											<div class="accordion-item">
													<h2 class="accordion-header" id="flush-headingTwo">
															<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
																	data-bs-target="#flush-collapseTwo" aria-expanded="false"
																	aria-controls="flush-collapseTwo">
																	Molestie phasellus donec nibh nulla molestie. Elementum vel
																	facilisis risus eget habitant pretium, quis bibendum?
															</button>
													</h2>
													<div id="flush-collapseTwo" class="accordion-collapse collapse"
															aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
															<div class="accordion-body">
																	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
																	Cumque, ea eius. Dolorem sequi ipsam officia error
																	distinctio, ea impedit eius fugit beatae vel. Aut quo quae
																	totam enim libero deleniti.
															</div>
													</div>
											</div>
											<div class="accordion-item">
													<h2 class="accordion-header" id="flush-headingThree">
															<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
																	data-bs-target="#flush-collapseThree" aria-expanded="false"
																	aria-controls="flush-collapseThree">
																	Molestie phasellus donec nibh nulla molestie. Elementum vel
																	facilisis risus eget habitant pretium, quis bibendum?
															</button>
													</h2>
													<div id="flush-collapseThree" class="accordion-collapse collapse"
															aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
															<div class="accordion-body">
																	Lorem ipsum dolor sit amet consectetur adipisicing elit.
																	Delectus, reprehenderit? Reiciendis enim, molestiae possimus
																	incidunt ipsa voluptatem distinctio. Voluptates ab placeat,
																	quia quasi voluptatem facilis labore soluta esse eum qui!
															</div>
													</div>
											</div>
											<div class="accordion-item">
													<h2 class="accordion-header" id="flush-headingFour">
															<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
																	data-bs-target="#flush-collapseFour" aria-expanded="false"
																	aria-controls="flush-collapseFour">
																	Apa saja ciri-ciri korupsi Pre-Modern, Modern dan Post
																	Modern?
															</button>
													</h2>
													<div id="flush-collapseFour" class="accordion-collapse collapse"
															aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
															<div class="accordion-body">
																	Korupsi pre-modern adalah bentuk korupsi yang paling
																	primitif, misalnya pemberian suap oleh pencari layanan dan
																	pemerasan oleh pihak yang berkuasa dalam relasi
																	klien-patron. Jenis korupsi seperti ini secara umum terjadi
																	di sistem ekonomi yang sederhana, integritas masyarakat
																	masih rendah dan permisif terhadap tindakan korup, dan tata
																	Kelola urusan publik masih mengandalkan jaringan nepotisme
																	primordial. Pada sistem ekonomi dan politik yang mulai
																	kompleks, korupsi yang muncul mulai mengalami modernisasi,
																	yaitu dengan menunggangi prosedur birokrasi, di mana
																	penyelenggara negara melakukan penyalahgunaan wewenang untuk
																	kepentingan pribadi dan kelompok. Sementara pada masyarakat
																	maju, korupsi jenis post-modern seringkali berwajah legal,
																	tidak merugikan keuangan negara namun secara substantif
																	merugikan kepentingan bersama (kerugian ekonomi dan
																	sosiologis).
															</div>
													</div>
											</div>
											<div class="accordion-item">
													<h2 class="accordion-header" id="flush-headingFive">
															<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
																	data-bs-target="#flush-collapseFive" aria-expanded="false"
																	aria-controls="flush-collapseFive">
																	Bagaimana pola kerja KPK dengan menggunakan Trisula?
															</button>
													</h2>
													<div id="flush-collapseFive" class="accordion-collapse collapse"
															aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
															<div class="accordion-body">
																	Pola kerja Trisula merupakan sinergi dari upaya pencegahan,
																	pendidikan dan penindakan. Pola pertama dilakukan dengan
																	menindaklanjuti resume penindakan oleh pencegahan dan
																	pendidikan. Pola lainnya bisa dilakukan mulai dari hasil
																	penelitian dan pemetaan celah korupsi menjadi input untuk
																	case building penindakan.
															</div>
													</div>
											</div>
									</div>
							</div>
					</div>
			</div>
	</section>
@endsection
