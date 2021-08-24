@extends('layouts.app')
@section('title', 'Home - ')
@section('content')

@include('components.navbar')

<div class="container-fluid p-0">
    <!-- About-->
    <section class="resume-section" id="about">
        <div class="resume-section-content">
            <h1 class="mb-0">
                Place Your
                <span class="text-primary">Order</span>
            </h1>
            <hr class="myline" />
            <div class="container">
                <div class="row">
                    <div class="col-md-4 pad4">
                        <a class="js-scroll-trigger" href="#Your_Bussiness_Legal_Companion">
                            <img src="{{ asset('images/Your_Bussiness_Legal_Companion/book11.jpg') }}" alt="Book 1" class="img img-thumbnail books">
                            <br />
                            <br />
                            <center><h4 class="tdnone">Buy Your Business Legal Companion</h4></center>
                        </a>
                    </div>
                    <div class="col-md-4 pad4">
                        <a class="js-scroll-trigger" href="#Your_Business_And_The_Law">
                            <img src="{{ asset('images/Your_Business_And_The_Law/book1.jpg') }}" alt="Book 1" class="img img-thumbnail books">
                            <br />
                            <br />
                            <center><h4 class="tdnone">Buy Your Business and the Law</h4></center>
                        </a>
                    </div>
                    <div class="col-md-4 pad4">
                        <a class="js-scroll-trigger" href="#Your_Business_And_The_Law_and_Your_Bussiness_Legal_Companion">
                            <img src="{{ asset('images/all_books.png') }}" alt="Book 1" class="img img-thumbnail books">
                            <br />
                            <br />
                            <center><h4 class="tdnone">Buy Both Books</h4></center>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="m-0" />

    <section class="resume-section" id="Your_Bussiness_Legal_Companion">
        <div class="resume-section-content">
            <h3 class="mb-5">Your Business Legal Companion</h3>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('images/Your_Bussiness_Legal_Companion/book11.jpg') }}" alt="Book 1" class="img img-thumbnail books_parent">
                        <br/>
                        <div class="container-fluid pad-0">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/Your_Bussiness_Legal_Companion/book1.jpg') }}" alt="Book 1" class="img img-thumbnail books_child">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('images/Your_Bussiness_Legal_Companion/book2.jpg') }}" alt="Book 1" class="img img-thumbnail books_child">
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('images/Your_Bussiness_Legal_Companion/book3.jpg') }}" alt="Book 1" class="img img-thumbnail books_child">
                                </div>
                            </div>
                        </div>

                        <hr/>

                        <form action="/payment" method="POST">
                            @csrf
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2">Buy This Book</legend>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control name" id="name" placeholder="Full Name..." name="name" required>
                                    <input type="hidden" name="book" value="Your_Bussiness_Legal_Companion" required/>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control email" id="email" placeholder="Email..." name="email" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="quantity">Address:</label>
                                    <input type="text" class="form-control address" id="address" placeholder="Enter your address here" name="address" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="quantity">Number of Copies:</label>
                                    <input type="number" class="form-control quantity" id="quantity" placeholder="10" name="quantity" value="1" required>
                                </div>
                                <br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="locationwithin" value="Lagos" name="location" checked="">
                                    <label class="form-check-label" for="locationwithin">Within Lagos</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="locationwithout" value="Not Lagos" name="location">
                                    <label class="form-check-label" for="locationwithout">Outside Lagos</label>
                                </div>
                                <hr />
                                <button class="btn btn-primary" type="submit" style="width: 100%;">Place Order</button>
                            </fieldset>
                        </form>

                    </div>
                    <div class="col-md-7">
                        Your Business Legal Companion is a book born out of the author&#39;s quest to provide a
                        compendium of legal knowledge for running businesses or organizations in Nigeria.
                        <hr class="myline" />
                        It provides easy-to-understand details about the different types of legal structures/platforms that are
                        available in Nigerian law for the execution of ideas and the actualization of the dreams or
                        aspirations of individuals or groups. It provides clear understanding of the provisions of the new,
                        Companies and Allied Matters Act, 2020.
                        <hr class="myline" />
                        In this book, you will learn about:
                        <ul>
                            <li>Corporations</li>
                            <li>Company registration requirements and modalities</li>
                            <li>How a foreign company can operate in Nigeria</li>
                            <li>Family business formation and dynamics</li>
                            <li>Sole Proprietorship</li>
                            <li>Non-governmental Organizations, religious organizations and other Non-profits</li>
                            <li>Partnerships types formations, managements, dissolution or terminations</li>
                        </ul>
                        <hr class="myline" />
                        This is an essential business manual for business owners, entrepreneurs, business managers, in-
                        house lawyers, company secretaries and would-be entrepreneurs.
                        <br />
                        <br />
                        Price- <strike>N</strike>{{ number_format(config('app.book1_cost'), 2) }}
                        <br /><br />
                        Delivery cost within Lagos:
                        <br /> - before September 10, {{ date('Y') }}- <span style="color: red; font-style: bold;">FREE</span>
                        <br /> - after September 10, {{ date('Y') }}- <strike>N</strike>{{ number_format(config('app.book1_lagos_cost'), 2) }}
                        <br/><br />
                        Delivery outside Lagos- <strike>N</strike>{{ number_format(config('app.book1_not_lagos_cost'), 2) }}
                        <br/><br/>
                        Buy your copy here….
                        <br/>
                        <hr />
                        All books paid for will be delivered to addresses within Lagos in one week and addresses in
                        Nigeria but outside Lagos within 2 weeks.

                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="m-0" />




    <section class="resume-section" id="Your_Business_And_The_Law">
        <div class="resume-section-content">
            <h3 class="mb-5">Your Business And The Law</h3>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('images/Your_Business_And_The_Law/book1.jpg') }}" alt="Book 1" class="img img-thumbnail books_parent">
                        <br/>
                        <div class="container-fluid pad-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ asset('images/Your_Business_And_The_Law/book3.jpg') }}" alt="Book 1" class="img img-thumbnail books_child" style="object-fit: contain;">
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('images/Your_Business_And_The_Law/book4.jpg') }}" alt="Book 1" class="img img-thumbnail books_child" style="object-fit: contain;">
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('images/Your_Business_And_The_Law/book1.jpg') }}" alt="Book 1" class="img img-thumbnail books_child">
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ asset('images/Your_Business_And_The_Law/book2.jpg') }}" alt="Book 1" class="img img-thumbnail books_child">
                                </div>
                            </div>
                        </div>

                        <hr/>

                        <form action="/payment" method="POST">
                            @csrf
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2">Buy This Book</legend>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control name" id="name" placeholder="Full Name..." name="name" required>
                                    <input type="hidden" name="book" value="Your_Business_And_The_Law" required/>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control email" id="email" placeholder="Email..." name="email" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="quantity">Address:</label>
                                    <input type="text" class="form-control address" id="address" placeholder="Enter your address here" name="address" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="quantity">Number of Copies:</label>
                                    <input type="number" class="form-control quantity" id="quantity" placeholder="10" name="quantity" value="1" required>
                                </div>
                                <br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="locationwithin" value="Lagos" name="location" checked="">
                                    <label class="form-check-label" for="locationwithin">Within Lagos</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="locationwithout" value="Not Lagos" name="location">
                                    <label class="form-check-label" for="locationwithout">Outside Lagos</label>
                                </div>
                                <hr />
                                <button class="btn btn-primary" type="submit" style="width: 100%;">Place Order</button>
                            </fieldset>
                        </form>

                    </div>
                    <div class="col-md-7">
                        Your Business and the Law: How to avoid trouble running your own business is a legal and
                        operational manual for all types of organizations. It is a detailed resource on salient subjects that
                        can aid business operations in Nigeria.
                        <hr class="myline" />
                        Readers of this book will find it to be an easy-to-understand directory for addressing the legal
                        concerns of business owners, managers, and corporate bodies. It is also a compedium of legal
                        guidance for business that helps its readers understand the necessary steps they may need to take
                        to ensure that their risk is minimized as they work to properly harness opportunities.
                        <hr class="myline" />
                        Some of the things that you will learn from this book include:
                        <ul>
                            <li>How a Contractual Agreement is created</li>
                            <li>How to take advantage of your Intellectual Properties</li>
                            <li>How a foreign company can operate in Nigeria</li>
                            <li>Taxation and how to ensure you do not run afoul of the Law</li>
                            <li>How to deal with regularory bodies in Nigeria like NAFDAC, DPR, SON and more</li>
                            <li>Obtaining Business Permits, and</li>
                            <li>The Role of Government in Business</li>
                        </ul>
                        <hr class="myline" />
                        This is an essential business manual for business owners, entrepreneurs, business managers, in-
                        house lawyers, company secretaries and would-be entrepreneurs.
                        <br />
                        <br />
                        Price- <strike>N</strike>{{ number_format(config('app.book2_cost'), 2) }}
                        <br /><br />
                        Delivery cost within Lagos:
                        <br /> - before September 10, {{ date('Y') }}- <span style="color: red; font-style: bold;">FREE</span>
                        <br /> - after September 10, {{ date('Y') }}- <strike>N</strike>{{ number_format(config('app.book2_lagos_cost'), 2) }}
                        <br/><br />
                        Delivery outside Lagos- <strike>N</strike>{{ number_format(config('app.book2_not_lagos_cost'), 2) }}
                        <br/><br/>
                        Buy your copy here….
                        <br/>
                        <hr />
                        All books paid for will be delivered to addresses within Lagos in one week and addresses in
                        Nigeria but outside Lagos within 2 weeks.

                    </div>
                </div>
            </div>
        </div>
    </section>







    <section class="resume-section" id="Your_Business_And_The_Law_and_Your_Bussiness_Legal_Companion">
        <div class="resume-section-content">
            <h3 class="mb-5">Your Business And The Law With Your Bussiness Legal Companion</h3>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <img src="{{ asset('images/all_books.png') }}" alt="Book 1" class="img img-thumbnail books_parent">
                        <br/>
                        <div class="container-fluid pad-0">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ asset('images/Your_Business_And_The_Law/book1.jpg') }}" alt="Book 1" class="img img-thumbnail books_child">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('images/Your_Bussiness_Legal_Companion/book4.png') }}" alt="Book 1" class="img img-thumbnail books_child">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('images/Your_Business_And_The_Law/book2.jpg') }}" alt="Book 1" class="img img-thumbnail books_child">
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('images/Your_Bussiness_Legal_Companion/book11.jpg') }}" alt="Book 1" class="img img-thumbnail books_child">
                                </div>
                            </div>
                        </div>

                        <hr/>

                        <form action="/payment" method="POST">
                            @csrf
                            <fieldset class="form-group border p-3">
                                <legend class="w-auto px-2">Buy Both Books</legend>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control name" id="name" placeholder="Full Name..." name="name" required>
                                    <input type="hidden" name="book" value="all_books" required/>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control email" id="email" placeholder="Email..." name="email" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="quantity">Address:</label>
                                    <input type="text" class="form-control address" id="address" placeholder="Enter your address here" name="address" required>
                                </div>
                                <br />
                                <div class="form-group">
                                    <label for="quantity">Number of Copies (each):</label>
                                    <input type="number" class="form-control quantity" id="quantity" placeholder="10" name="quantity" value="1" required>
                                </div>
                                <br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="locationwithin" value="Lagos" name="location" checked="">
                                    <label class="form-check-label" for="locationwithin">Within Lagos</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="locationwithout" value="Not Lagos" name="location">
                                    <label class="form-check-label" for="locationwithout">Outside Lagos</label>
                                </div>
                                <hr />
                                <button class="btn btn-primary" type="submit" style="width: 100%;">Place Order</button>
                            </fieldset>
                        </form>

                    </div>
                    <div class="col-md-7">
                        Your Business and the Law: How to avoid trouble running your own business is a legal and
                        operational manual for all types of organizations. It is a detailed resource on salient subjects that
                        can aid business operations in Nigeria.
                        <br /><br />
                        Your Business Legal Companion is a book born out of the author&#39;s quest to provide a
                        compendium of legal knowledge for running businesses or organizations in Nigeria.
                        <hr class="myline" />
                        Readers of this book will find it to be an easy-to-understand directory for addressing the legal
                        concerns of business owners, managers, and corporate bodies. It is also a compedium of legal
                        guidance for business that helps its readers understand the necessary steps they may need to take
                        to ensure that their risk is minimized as they work to properly harness opportunities.
                        <br /><br />
                        It provides easy-to-understand details about the different types of legal structures/platforms that are
                        available in Nigerian law for the execution of ideas and the actualization of the dreams or
                        aspirations of individuals or groups. It provides clear understanding of the provisions of the new,
                        Companies and Allied Matters Act, 2020.
                        <hr class="myline" />
                        Price- <strike>N</strike>{{ number_format(config('app.book_all_cost'), 2) }}
                        <br /><br />
                        Delivery cost within Lagos:
                        <br /> - before September 10, {{ date('Y') }}- <span style="color: red; font-style: bold;">FREE</span>
                        <br /> - after September 10, {{ date('Y') }}- <strike>N</strike>{{ number_format(config('app.book2_lagos_cost'), 2) }}
                        <br/><br />
                        Delivery outside Lagos- <strike>N</strike>{{ number_format(config('app.book2_not_lagos_cost'), 2) }}
                        <br/><br/>
                        Buy your copy here….
                        <br/>
                        <hr />
                        All books paid for will be delivered to addresses within Lagos in one week and addresses in
                        Nigeria but outside Lagos within 2 weeks.

                    </div>
                </div>
            </div>
        </div>
    </section>






</div>
@endsection
