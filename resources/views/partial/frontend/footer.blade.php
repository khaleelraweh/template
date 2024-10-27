  <!-- footer start -->
  <footer class="fo-footer">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-centered">
                  <img src="{{ asset('frontend/assets/images/red-logo.png') }}" alt="logo">
                  <p class="footer-content"> {{ $siteSettings['site_name']->value ?? '' }} </p>
                  <ul class="social-icon-footer">


                      @if ($siteSettings['site_facebook']->value)
                          <li>
                              <a href="{{ $siteSettings['site_facebook']->value }}" target="_blank">
                                  <i class="fa fa-facebook" aria-hidden="true"></i>
                              </a>
                          </li>
                      @endif

                      @if ($siteSettings['site_twitter']->value)
                          <li>
                              <a href="{{ $siteSettings['site_twitter']->value }}" target="_blank">
                                  <i class="fa fa-twitter" aria-hidden="true"></i>
                              </a>
                          </li>
                      @endif

                      @if ($siteSettings['site_dribbble']->value)
                          <li>
                              <a href="{{ $siteSettings['site_dribbble']->value }}" target="_blank">
                                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                              </a>
                          </li>
                      @endif


                      @if ($siteSettings['site_pinterest']->value)
                          <li>
                              <a href="{{ $siteSettings['site_pinterest']->value }}" target="_blank">
                                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                              </a>
                          </li>
                      @endif





                      @if ($siteSettings['site_git_scm']->value)
                          <li>
                              <a href="{{ $siteSettings['site_git_scm']->value }}" target="_blank">
                                  <i class="fa fa-git" aria-hidden="true"></i>
                              </a>
                          </li>
                      @endif


                  </ul>
              </div>
          </div>
      </div>
  </footer>
  <!-- footer end -->
