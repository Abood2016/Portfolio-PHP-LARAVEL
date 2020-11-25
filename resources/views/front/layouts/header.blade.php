<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img width="250px" height="200px" style="border-radius: 120px" src="{{ asset('images/settings/' . $setting->image) }}" alt="" />
        <!-- Masthead Heading--><br>
        <h1 class="masthead-heading text-uppercase mb-0">{{ $setting->site_title }}</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0">{{ $setting->job_title }}</p>
    </div>
</header>