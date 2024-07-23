<div id="footer" class="bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
            <img src="{{ asset('images/logo-black.png')}}" alt="Logo" class="mb-3" style="max-width: 70px;border-radius:10px;">
                <h5>About Us</h5>
                <p>Welcome to My Travel Blog, your go-to source for travel inspiration, tips, and guides. Join us as we explore the world one adventure at a time.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-light">Home</a></li>
                    <li><a href="{{ route('travel') }}" class="text-light">Destinations</a></li>
                    <li><a href="{{ route('blogs') }}" class="text-light">Blog</a></li>
                    <li><a href="{{ route('aboutme') }}" class="text-light">About Us</a></li>
                    <li><a href="{{ route('login') }}" class="text-light">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Contact Us</h5>
                <p>Email: contact@mytravelblog.com</p>
                <p>Phone: +1 (234) 567-890</p>
                <p>Address: 123 Travel Street, Wanderlust City, 45678</p>
                <p>Follow Us:</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="{{ route('home') }}" class="text-light"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="{{ route('home') }}" class="text-light"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="{{ route('home') }}" class="text-light"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="{{ route('home') }}" class="text-light"><i class="fab fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 My Travel Blog. All Rights Reserved.</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="{{ route('home') }}" class="text-light">Terms of Use</a></li>
                    <li class="list-inline-item"><a href="{{ route('home') }}" class="text-light">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="{{ route('home') }}" class="text-light">Sitemap</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
