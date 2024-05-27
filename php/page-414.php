<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HB
 */

get_header();
// global $post;

?>
        
        <section class="inner-wrapper contact-wrapper"> 
              <div class="container-fluid">
                <div class="page-title-wrapper">
                  <h2 class="page-title">CONTACT US</h2>
                </div>
                <div  class="contact-form">
                    <?php echo do_shortcode('[contact-form-7 id="590a1bc" title="Contact Us"]'); ?>
                  <!-- <span class="required-label">Required fields *</span>
                  <div class="form-group">
                    <div class="input-group">
                      <select class="form-select" required>
                        <option selected disabled>Title<sup class="required-start">*</sup></option>
                        <option>Mr</option>
                        <option>Ms</option>
                        <option>Transgender</option>
                      </select>
                      <div class="invalid-messsge">Please check your Title</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input class="form-control" type="text" id="firstName" placeholder="First Name">
                      <label for="firstName" class="form-label">First Name<sup class="required-start">*</sup></label>
                      <div class="invalid-messsge">Please check your First name</div>
                    </div>
                    <div class="input-group">
                      <input class="form-control" type="text" id="lastName" placeholder="Last Name">
                      <label for="lastName" class="form-label">Last Name<sup class="required-start">*</sup></label>
                      <div class="invalid-messsge">Please check your Last name</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input class="form-control" type="tel" id="phoneNumber" placeholder="Phone number">
                      <label for="phoneNumber" class="form-label">Phone number<sup class="required-start">*</sup></label>
                      <div class="invalid-messsge">Please check your Phone number</div>
                    </div>
                    <div class="input-group">
                      <input class="form-control" type="email" id="email" placeholder="Email">
                      <label for="email" class="form-label">Email<sup class="required-start">*</sup></label>
                      <div class="invalid-messsge">Please check your Email</div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <textarea class="form-control textarea-control" type="tel" id="phoneNumber" placeholder="Type your message here"></textarea>
                      <label for="phoneNumber" class="form-label">Message<sup class="required-start">*</sup></label>
                      <div class="invalid-messsge">Please check your Message</div>
                    </div>
                  </div>
                  <div class="button-block">
                    <button type="button" class="btn btn-primary btn-medium ml-auto">Send</button>
                  </div> -->
                </div>
              </div>
            </section>

<?php
// get_sidebar();
get_footer();
