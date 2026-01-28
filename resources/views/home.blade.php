@extends('layouts.home_page.master')

@section('content')
    <style>
        :root {
            --primary-color:
                {{ $settings['theme_primary_color'] ?? '#56cc99' }}
            ;
            --secondary-color:
                {{ $settings['theme_secondary_color'] ?? '#215679' }}
            ;
            --secondary-color1:
                {{ $settings['theme_secondary_color_1'] ?? '#38a3a5' }}
            ;
            --primary-background-color:
                {{ $settings['theme_primary_background_color'] ?? '#f2f5f7' }}
            ;
            --text--secondary-color:
                {{ $settings['theme_text_secondary_color'] ?? '#5c788c' }}
            ;

        }
    </style>
    <script src="{{ asset('assets/home_page/js/jquery-1-12-4.min.js') }}"></script>

    <header class="navbar">
        <div class="container">
            <div class="navbarWrapper">
                <div class="navLogoWrapper">
                    <div class="navLogo">
                        <a href="{{ url('/') }}">
                            <img src="{{ $settings['horizontal_logo'] ?? asset('assets/landing_page_images/Logo1.svg') }}"
                                class="logo" alt="">
                        </a>

                    </div>
                </div>
                <div class="menuListWrapper">
                    <ul class="listItems">
                        <li>
                            <a href="#home">{{ __('home') }}</a>
                        </li>
                        <li>
                            <a href="#features">{{ __('features') }}</a>
                        </li>
                        <li>
                            <a href="#about-us">{{ __('about_us') }}</a>
                        </li>
                        <li>
                            <a href="#pricing">{{ __('pricing') }}</a>
                        </li>
                        @if (count($faqs))
                            <li>
                                <a href="#faq">{{ __('faqs') }}</a>
                            </li>
                        @endif
                        <li>
                            <a href="#contact-us">{{ __('contact') }}</a>
                        </li>
                        @if (count($guidances))
                            <li>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ __('guidance') }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @foreach ($guidances as $key => $guidance)
                                            <li><a class="dropdown-item" href="{{ $guidance->link }}">{{ $guidance->name }}</a></li>
                                            @if (count($guidances) > ($key + 1))
                                                <hr>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <li>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('language') }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach ($languages as $key => $language)
                                        <li><a class="dropdown-item"
                                                href="{{ url('set-language') . '/' . $language->code }}">{{ $language->name }}</a>
                                        </li>
                                        @if (count($languages) > ($key + 1))
                                            <hr>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>

                    </ul>
                    <div class="hamburg">
                        <span data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                                class="fa-solid fa-bars"></i></span>
                    </div>
                </div>

                <div class="loginBtnsWrapper">
                    <button class="commonBtn redirect-login">{{ __('login') }}</button>
                    <button class="commonBtn" id="trialBtn" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">{{ __('start_trial') }}</button>
                    {{-- <a href="{{ url('school/registration') }}" class="commonBtn">{{ __('start_trial') }}</a> --}}
                </div>
            </div>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <div class="navLogoWrapper">
                        <div class="navLogo">
                            <img src="{{ $settings['horizontal_logo'] ?? asset('assets/landing_page_images/Logo1.svg') }}"
                                alt="">
                        </div>
                    </div>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="listItems">
                        <li>
                            <a href="#home">{{ __('home') }}</a>
                        </li>
                        <li>
                            <a href="#features">{{ __('features') }}</a>
                        </li>
                        <li>
                            <a href="#about-us">{{ __('about_us') }}</a>
                        </li>
                        <li>
                            <a href="#pricing">{{ __('pricing') }}</a>
                        </li>
                        @if (count($faqs))
                            <li>
                                <a href="#faq">{{ __('faqs') }}</a>
                            </li>
                        @endif
                        <li>
                            <a href="#contact-us">{{ __('contact') }}</a>
                        </li>
                        @if (count($guidances))
                            <li>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ __('guidance') }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @foreach ($guidances as $key => $guidance)
                                            <li><a class="dropdown-item" href="{{ $guidance->link }}">{{ $guidance->name }}</a></li>
                                            @if (count($guidances) > ($key + 1))
                                                <hr>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <li>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('language') }}
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @foreach ($languages as $key => $language)
                                        <li><a class="dropdown-item"
                                                href="{{ url('set-language') . '/' . $language->code }}">{{ $language->name }}</a>
                                        </li>
                                        @if (count($languages) > ($key + 1))
                                            <hr>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>

                    </ul>

                    {{-- <div class="loginBtnsWrapper"> --}}
                        <button class="commonBtn redirect-login">{{ __('login') }}</button>
                        <button class="commonBtn" data-bs-toggle="modal" data-bs-dismiss="offcanvas"
                            data-bs-target="#staticBackdrop">{{ __('start_trial') }}</button>
                        {{--
                    </div> --}}
                </div>
            </div>
        </div>
    </header>

    <!-- navbar ends here  -->

    <div class="main">

        <section class="heroSection" id="home">
            <div class="linesBg">
                <div class="colorBg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="flex_column_start">
                                    <span class="commonTitle">{{ $settings['system_name'] ?? 'SiksaPath SaaS' }}</span>
                                    <span class="commonDesc">
                                        {{ $settings['tag_line'] }}
                                    </span>
                                    <span class="commonText">
                                        {{ $settings['hero_description'] }}</span>
                                    <div class="d-flex">
                                        <button class="commonBtn" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">{{ __('register_your_school') }}</button>
                                        @if ($isDemoSchool == 1)
                                            <a href="{{ $demoSchoolUrl ?? url('/') }}" target="_blank"
                                                class="commonBtn mx-5">{{ __('demo_school') }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 heroImgWrapper">
                                <div class="heroImg">
                                    <img src="{{ $settings['home_image'] ?? asset('assets/landing_page_images/heroImg.png') }}"
                                        alt="">
                                    <div class="topRated card">
                                        <div>
                                            <img src="{{ $settings['hero_title_2_image'] ?? asset('assets/landing_page_images/user.png') }}"
                                                alt="">
                                        </div>
                                        @if(!empty($settings['hero_title_2']))
                                            <div>
                                                <span>{{ $settings['hero_title_2'] }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    @if(!empty($settings['hero_title_1']))
                                        <div class="textWrapper">
                                            <span>{{ $settings['hero_title_1'] }}</span>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('registration_form')

        </section>
        <!-- heroSection ends here  -->

        <section class="features commonMT container" id="features">
            <div class="row">
                <div class="col-12">
                    <div class="sectionTitle">
                        <span>{{ __('explore_our_top_features') }}</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row cardWrapper">
                        @foreach ($features as $key => $feature)
                            @if ($key < 9)
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">
                                        <div>
                                            <img src="{{ asset('assets/landing_page_images/features/') }}/{{ $feature->name }}.svg"
                                                alt="">
                                        </div>
                                        <div><span>{{ __($feature->name) }}</span></div>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-12 col-md-6 col-lg-4 default-feature-list" style="display: none">
                                    <div class="card">
                                        <div>
                                            <img src="{{ asset('assets/landing_page_images/features/') }}/{{ $feature->name }}.svg"
                                                alt="">
                                        </div>
                                        <div><span>{{ __($feature->name) }}</span></div>
                                    </div>
                                </div>
                            @endif

                        @endforeach
                        <div class="col-12">
                            <button class="commonBtn view-more-feature" value="1">{{ __('view_more_features') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features ends here  -->

        {{-- @if ($settings['display_school_logos'] ?? '1')
        <section class="swiperSect container commonMT">
            <div class="row">
                <div class="col-12">
                    <div class="commonSlider">
                        <div class="slider-content owl-carousel">
                            <!-- Example slide -->
                            @foreach ($schoolSettings as $school)
                            @if (Storage::disk('public')->exists($school->getRawOriginal('data')) && $school->data)
                            <div class="swiperDataWrapper">
                                <div class="card">
                                    <img src="{{ $school->data }}" class="normalImg" alt="">
                                </div>
                            </div>
                            @endif
                            @endforeach
                            <!-- Add more swiperDataWrapper elements here -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif --}}
        <!-- swiperSect ends here  -->
        {{-- @if ($settings['display_counters'] ?? '1')
        <section class="counterSect commonMT container">
            <div class="">
                <div class="row counterBG">
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="card">
                            <div><span class="numb" data-target="{{ $counter['school'] }}">0</span><span>+</span></div>
                            <div><span class="text">{{ __('schools') }}</span></div>
                        </div>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="card">
                            <div><span class="numb" data-target="{{ $counter['teacher'] }}">0</span><span>+</span></div>
                            <div><span class="text">{{ __('teachers') }}</span></div>
                        </div>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                        <div class="card">
                            <div><span class="numb" data-target="{{ $counter['student'] }}">0</span><span>+</span></div>
                            <div><span class="text">{{ __('students') }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif --}}

        <!-- School logos section starts here -->
        @if ($settings['display_school_logos'] ?? '1')
            <input type="hidden" id="school-count" value="{{ count($allSchools) }}">
            <section class="container">
                <div class="col-12">
                    <div class="sectionTitle">
                        <span>{{ __('schools') }}</span>
                    </div>
                </div>
                <div class="row py-3">
                    <div class="owl-carousel owl-theme school-logo-owl-carousel">

                        @foreach ($allSchools as $key => $school)
                            <div class="item">
                                <div class="card p-3 d-flex justify-content-center align-items-center">
                                    <img src="{{ $school->logo }}" style="border-radius: 50%; width: 100px; height: 100px;" alt=""
                                        onerror="onErrorImage(event)">
                                    <h6 class="mt-3">{{  Str::limit($school->name, 25, ' ...') }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- School logos section ends here -->

        @foreach ($featureSections as $key => $section)
            @if (($key + 1) % 2 != 0)

                <section class="left-section-{{ $section->id }} commonMT container">
                    <div class="row">
                        <div class="col-12">
                            <div class="sectionTitle">
                                <span class="greenText">{{ $section->title }}</span>
                                <span>
                                    {{ $section->heading }}
                                </span>

                            </div>
                        </div>
                        <div class="col-12 tabsContainer " style="word-break: break-word;">
                            <div class="row">
                                <div class="col-lg-6 tabsMainWrapper" style="word-break: break-all !important;">
                                    <div class="tabsWrapper">
                                        <div class="tabs">
                                            @foreach ($section->feature_section_list as $section_feature)
                                                <div class="tab tab-{{ $section_feature->id }}-{{ $key }}">
                                                    <span>{{ $section_feature->feature }}</span>
                                                    <span>
                                                        {{ $section_feature->description }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6 contentWrapper">
                                    <div class="content-container">
                                        @foreach ($section->feature_section_list as $section_feature)
                                            <div class="content tab-{{ $section_feature->id }}-{{ $key }}">
                                                <img src="{{ $section_feature->image }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

            @else

                <section class="right-section-{{ $section->id }} right-feature-section commonMT">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="sectionTitle">
                                    <span class="greenText">{{ $section->title }}</span>
                                    <span>
                                        {{ $section->heading }}
                                    </span>

                                </div>
                            </div>
                            <div class="col-12 tabsContainer">
                                <div class="row reverseWrapper">
                                    <div class="col-lg-6 contentWrapper">
                                        <div class="content-container">
                                            @foreach ($section->feature_section_list as $section_feature)
                                                <div class="content tab-{{ $section_feature->id }}-{{ $key }}">
                                                    <img src="{{ $section_feature->image }}" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-6 tabsMainWrapper">
                                        <div class="tabsWrapper">
                                            <div class="tabs">
                                                @foreach ($section->feature_section_list as $section_feature)
                                                    <div class="tab tab-{{ $section_feature->id }}-{{ $key }}">
                                                        <span>{{ $section_feature->feature }}</span>
                                                        <span>
                                                            {{ $section_feature->description }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>

            @endif
        @endforeach

        <section class="whyBest container commonMT" id="about-us">
            <div class="row">
                <div class="col-lg-6">
                    <div class="whyBestTextWrapper">
                        <p>{{ $settings['about_us_title'] }}</p>
                        <p>{{ $settings['about_us_heading'] }}</p>
                    </div>
                    <p class="whyBestPara">
                        {{ $settings['about_us_description'] }}
                    </p>

                    <div class="listWrapper">
                        @foreach ($about_us_lists as $point)
                            <span>
                                <i class="fa-regular fa-circle-check"></i>
                                {{ $point }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="{{ $settings['about_us_image'] ?? asset('assets/landing_page_images/whyBestImg.png') }}"
                        alt="">
                </div>
            </div>
        </section>
        <!-- whyBest ends here  -->

        <section class="pricing-modern" id="pricing">
            <div class="container commonMT">
                <div class="row">
                    <div class="col-12">
                        <div class="sectionTitle text-center mb-5">
                            <span class="section-subtitle">{{ __('pricing') }}</span>
                            <h2 class="section-title">{{ __('flexible_pricing_packages') }}</h2>
                            <p class="section-description">Choose the perfect plan for your educational institution</p>
                        </div>
                    </div>
                    @if($packages->isNotEmpty())
                        <div class="col-12">
                            <!-- Currency Toggle -->
                            <div class="currency-toggle text-center mb-4">
                                <div class="toggle-wrapper">
                                    <span class="currency-label" data-currency="usd">USD ($)</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" id="currencyToggle">
                                        <span class="slider"></span>
                                    </label>
                                    <span class="currency-label" data-currency="inr">INR (₹)</span>
                                </div>
                            </div>
                            
                            <div class="pricing-grid">
                                @foreach ($packages as $index => $package)
                                    <div class="pricing-card {{ $package->highlight ? 'featured' : '' }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                        @if ($package->highlight)
                                            <div class="popular-badge">
                                                <span>{{ __('most_popular') }}</span>
                                            </div>
                                        @endif
                                        
                                        <div class="card-header">
                                            @if ($package->is_trial == 1)
                                                <div class="plan-badge free">{{ __('free') }}</div>
                                            @else
                                                @if ($package->type == 1)
                                                    <div class="plan-badge postpaid">{{ __('postpaid') }}</div>
                                                @else
                                                    <div class="plan-badge prepaid">{{ __('prepaid') }}</div>
                                                @endif
                                            @endif
                                            
                                            <h3 class="plan-name">{{ __($package->name) }}</h3>
                                            <p class="plan-description">{{ $package->description ?? 'Perfect for your needs' }}</p>
                                            
                                            <div class="price-container">
                                                @if ($package->is_trial == 1)
                                                    <div class="price">
                                                        <span class="currency">₹</span>
                                                        <span class="amount">0</span>
                                                        <span class="period">/{{ $package->days }} days</span>
                                                    </div>
                                                @elseif($package->type == 0 && $package->is_trial == 0)
                                                    <div class="price usd-price">
                                                        <span class="currency">$</span>
                                                        <span class="amount">{{ number_format($package->charges, 0) }}</span>
                                                        <span class="period">/{{ $package->days }} days</span>
                                                    </div>
                                                    <div class="price inr-price" style="display: none;">
                                                        <span class="currency">₹</span>
                                                        <span class="amount">{{ number_format($package->charges * 83, 0) }}</span>
                                                        <span class="period">/{{ $package->days }} days</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="card-body">
                                            <div class="plan-stats">
                                                @if ($package->is_trial == 1)
                                                    <div class="stat">
                                                        <span class="stat-number">{{ $settings['student_limit'] ?? 0 }}</span>
                                                        <span class="stat-label">{{ __('students') }}</span>
                                                    </div>
                                                    <div class="stat">
                                                        <span class="stat-number">{{ $settings['staff_limit'] ?? 0 }}</span>
                                                        <span class="stat-label">{{ __('staff') }}</span>
                                                    </div>
                                                @elseif($package->type == 0 && $package->is_trial == 0)
                                                    <div class="stat">
                                                        <span class="stat-number">{{ number_format($package->no_of_students, 0) }}</span>
                                                        <span class="stat-label">{{ __('students') }}</span>
                                                    </div>
                                                    <div class="stat">
                                                        <span class="stat-number">{{ number_format($package->no_of_staffs, 0) }}</span>
                                                        <span class="stat-label">{{ __('staff') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <div class="features-list">
                                                @foreach ($features->take(8) as $feature)
                                                    @if (in_array($feature->id, $package->package_feature->pluck('feature_id')->toArray()))
                                                        <div class="feature-item included">
                                                            <i class="fas fa-check"></i>
                                                            <span>{{ __($feature->name) }}</span>
                                                        </div>
                                                    @else
                                                        <div class="feature-item excluded">
                                                            <i class="fas fa-times"></i>
                                                            <span>{{ __($feature->name) }}</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                @if($package->package_feature->count() > 8)
                                                    <div class="feature-item more-features">
                                                        <i class="fas fa-plus"></i>
                                                        <span>+{{ $package->package_feature->count() - 8 }} more features</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="card-footer">
                                            <button class="cta-button {{ $package->highlight ? 'primary' : 'secondary' }}" 
                                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                <span>{{ __('get_started') }}</span>
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="col-12 text-center">
                            <div class="no-packages">
                                <i class="fas fa-box-open"></i>
                                <h3>{{ __('no_packages_available') }}</h3>
                                <p>Please check back later for available packages.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- pricing ends here  -->

        @if (isset($settings['custom_package_status']) && $settings['custom_package_status'])
            <section class="customPack container commonMT">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div>
                                <p class="title">{{ __('custom_package') }}</p>
                                <p class="desc">
                                    {{ $settings['custom_package_description'] ?? '' }}
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <a href="#contact-us" class="commonBtn text-center">{{ __('get_in_touch') }}</a>
                        </div>

                    </div>
                </div>
            </section>
        @endif

        @if (count($faqs))
            <section class="faqs commonMT" id="faq">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="sectionTitle">
                                <span>{{ __('frequently_asked_questions') }}</span>

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                @foreach ($faqs as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne-{{ $faq->id }}" aria-expanded="true"
                                                aria-controls="collapseOne-{{ $faq->id }}">
                                                <span>
                                                    {{ $faq->title }}
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="collapseOne-{{ $faq->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <span>
                                                    {!! nl2br(e($faq->description)) !!}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- faqs ends here  -->

        <section class="getInTouch commonMT" id="contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="sectionTitle">
                            <span class="greenText">{{ __('lets_get_in_touch') }}</span>
                            <span>{{ __('have_a_question_or_just_want_to_say_hi_Wed_love_to_hear_from_you') }}
                            </span>

                        </div>
                        <div class="col-12">
                            <div class="row wrapper">
                                <div class="col-lg-6">
                                    <form action="{{ url('contact') }}" method="post" role="form"
                                        class="php-email-form mb-5 create-form-with-captcha">
                                        @csrf
                                        <div class="card">
                                            <div>
                                                <input type="text" required name="name" id="name"
                                                    placeholder="{{ __('enter_your_name') }}">
                                            </div>
                                            <div>
                                                <input type="email" required name="email" id="email"
                                                    placeholder="{{ __('enter_your_email') }}">
                                            </div>
                                            <div>
                                                <textarea name="message" required id="message" cols="30" rows="6"
                                                    placeholder="{{ __('send_your_message') }}"></textarea>
                                            </div>
                                            @if (config('services.recaptcha.key') ?? '')
                                                <div>
                                                    <div class="g-recaptcha" data-sitekey={{config('services.recaptcha.key')}}>
                                                    </div>
                                                </div>
                                            @endif
                                            <div>
                                                <input type="submit" class="commonBtn" value="{{ __('send') }}">
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/landing_page_images/GetInTouchDots.png') }}"
                                                    class="sideImg dots" alt="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6 infoBox">
                                    <div class="infoWrapper">
                                        <div>
                                            <span class="icon"><i class="fa-solid fa-phone-volume"></i></span>
                                        </div>
                                        <div>
                                            <span>{{ __('phone') }}</span>
                                            <span>{{ __('mobile') }} : {{ $settings['mobile'] ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="infoWrapper">
                                        <div>
                                            <span class="icon"><i class="fa-solid fa-envelope-open-text"></i></span>
                                        </div>
                                        <div>
                                            <span>{{ __('email') }}</span>
                                            <span>{{ $settings['mail_send_from'] ?? 'example@gmail.com' }}</span>
                                        </div>
                                    </div>
                                    <div class="infoWrapper">
                                        <div>
                                            <span class="icon"><i class="fa-solid fa-location-dot"></i></span>
                                        </div>
                                        <div>
                                            <span>{{ __('location') }}</span>
                                            <span>{{ $settings['address'] ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{ asset('assets/landing_page_images/lineCircle.png') }}"
                                            class="lineCircle sideImg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="ourApp container commonMT">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ $settings['download_our_app_image'] ?? asset('assets/landing_page_images/ourApp.png') }}"
                        class="ourAppImg" alt="">
                </div>
                <div class="col-lg-6 content">
                    <div class="text">
                        <span class="title">{{ __('download_our_app_now') }}</span>
                        <span>
                            {{ $settings['download_our_app_description'] ?? '' }}
                        </span>
                    </div>
                    <div class="storeImgs">
                        <a href="{{ $settings['app_link'] ?? '' }}" target="_blank"> <img
                                src="{{ asset('assets/landing_page_images/Google play.png') }}" alt=""> </a>
                        <a href="{{ $settings['ios_app_link'] ?? ''}}" target="_blank"> <img
                                src="{{ asset('assets/landing_page_images/iOS app Store.png') }}" alt=""> </a>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection

@section('script')
    <script async src="https://www.google.com/recaptcha/api.js"></script>
    @foreach ($featureSections as $key => $section)
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const tabs = document.querySelectorAll('.left-section-{{ $section->id }} .tab');
                const contents = document.querySelectorAll('.left-section-{{ $section->id }} .content');

                function switchTab(event, tabNumber) {
                    tabs.forEach((tab) => {
                        tab.classList.remove('active');
                    });

                    event.target.classList.add('active');

                    contents.forEach((content) => {
                        content.classList.remove('active');
                    });

                    contents[tabNumber - 1].classList.add('active');
                }

                tabs.forEach((tab, index) => {
                    tab.addEventListener('click', (event) => {
                        switchTab(event, index + 1);
                    });
                });

                setTimeout(() => {
                    tabs[0].click();
                }, 1000);
            });

            document.addEventListener('DOMContentLoaded', () => {
                const tabs = document.querySelectorAll('.right-section-{{ $section->id }} .tab');
                const contents = document.querySelectorAll('.right-section-{{ $section->id }} .content');

                function switchTab(event, tabNumber) {
                    tabs.forEach((tab) => {
                        tab.classList.remove('active');
                    });

                    event.target.classList.add('active');

                    contents.forEach((content) => {
                        content.classList.remove('active');
                    });

                    contents[tabNumber - 1].classList.add('active');
                }

                tabs.forEach((tab, index) => {
                    tab.addEventListener('click', (event) => {
                        switchTab(event, index + 1);
                    });
                });

                setTimeout(() => {
                    tabs[0].click();
                }, 1000);
            });
        </script>
    @endforeach
    <script>
        @if (Session::has('success'))
            $.toast({
                text: '{{ Session::get('success') }}',
                showHideTransition: 'slide',
                icon: 'success',
                loaderBg: '#f96868',
                position: 'top-right',
                bgColor: '#20CFB5'
            });
        @endif

        @if (Session::has('error'))
            $.toast({
                text: '{{ Session::get('error') }}',
                showHideTransition: 'slide',
                icon: 'error',
                loaderBg: '#f2a654',
                position: 'top-right',
                bgColor: '#FE7C96'
            });
        @endif
        
        // Initialize modern features after DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation to pricing cards
            const pricingCards = document.querySelectorAll('.pricing-card');
            pricingCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
            
            // Add hover effects to feature cards
            const featureCards = document.querySelectorAll('.features .card');
            featureCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
@endsection