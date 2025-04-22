<!--Mobile Menu-->
<div class="mobile-nav-wrapper" role="navigation">
    <div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
    <ul id="MobileNav" class="mobile-nav">
        <li class="lvl1 parent megamenu"><a href="{{ route('home') }}">Home</a>
        </li>
        <li class="lvl1 parent megamenu"><a href="{{ route('shop') }}">Shop</a>
        </li>
        <li class="lvl1 parent megamenu"><a href="{{ route('about') }}">About</a>
        </li>
        <li class="lvl1 parent dropdown"><a href="{{ route('contact') }}">Contact</a>
        </li>
        <li class="lvl1 parent dropdown"><a href="{{ route('faq') }}">FAQs</a>
        </li>
        <li class="lvl1"><a href="{{ asset('#') }}"><b>Buy Now!</b></a></li>
    </ul>
</div>
<!--End Mobile Menu-->
