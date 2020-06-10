<template>
  <div class="site-wrap" id="home-section">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-3 col-xl-4 d-block">
            <h1 class="mb-0 site-logo">
              <a href="#" class="text-black h2 mb-0">
                Sastha Sastha
                <span class="text-primary">.</span>
              </a>
            </h1>
          </div>

          <div class="col-12 col-md-9 col-xl-8 main-menu">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block ml-0 pl-0">
                <li>
                  <router-link to="/" data-target="#">Home</router-link>
                </li>
                <li>
                  <router-link to="program-services" data-target="#">Features</router-link>
                </li>
                <li class="has-children">
                  <router-link :to="{name:'about-us'}">About Us</router-link>
                  <ul class="dropdown arrow-top">
                    <li>
                      <a href="#" data-target="#" class="nav-link">
                        <span class="text-primary">More Free Templates</span>
                      </a>
                    </li>
                    <li>
                      <a href="#our-team-section" data-target="#" class="nav-link">Our Team</a>
                    </li>
                    <li class="has-children">
                      <a href="#">More Links</a>
                      <ul class="dropdown">
                        <li>
                          <a href="#">Menu One</a>
                        </li>
                        <li>
                          <a href="#">Menu Two</a>
                        </li>
                        <li>
                          <a href="#">Menu Three</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  <router-link to="testimonials" data-target="#">Testimonials</router-link>
                </li>
                <li>
                  <router-link to="gallery" data-target="#">Gallery</router-link>
                </li>
                <li>
                  <router-link to="contact-us" data-target="#">Contact Us</router-link>
                </li>
                <li>
                  <router-link to="login">Login</router-link>
                </li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-md-9 d-inline-block d-lg-none ml-md-0">
            <a href="#" class="site-menu-toggle js-menu-toggle text-black float-right">
              <span class="icon-menu h3"></span>
            </a>
          </div>
        </div>
      </div>
    </header>
  </div>
</template>

<script>
export default {
  name: "Header"
};
</script>

<style scoped></style>
