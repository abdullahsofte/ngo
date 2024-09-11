@extends('layouts.website')
@section('web-content')

<section id="product-background" class="product-background d-flex" style="background-image: url('{{ asset($backimage->bgimage_other) }}')">
	<div class="container align-self-center">
			<div class="row">
					<div class="col-lg-6 offset-lg-3 col-12">
							<nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '';">
								<ol class="breadcrumb justify-content-center">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home </a></li>
									<span>&nbsp;/&nbsp;</span>
									<li class="breadcrumb-item active" aria-current="page"> Error </li>
								</ol>
							</nav>
					</div>
			</div>
	</div>
</section>

<section id="news-details" class="news-details section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12">
				<h2 class="fs-2 fw-bold text-center text-uppercase text-white"><span>Nothing Found</span></h2>
			</div>
		</div>
	</div>
</section>

@endsection