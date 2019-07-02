<form id="contact-form" method="post">
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <input class="form-control" type="text" name="firstname" placeholder="First Name" value="" required />
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <input class="form-control" type="text" name="lastname" placeholder="Last Name" value="" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email" value="" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="form-group">
                <input class="form-control" id="phoneNumber" type="text" name="phone" placeholder="Phone Number"/>
            </div>
        </div>
        <div class="col-md">
            <div class="form-group">
                <select class="form-control" name="state" required>
                    <option value="" disabled selected>State*</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">Your Contact Preference</div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-4"> <label class="checkbox-inline"><input type="radio" name="contact-by" value="Phone" class="form-check-input"> Phone</label></div>
                <div class="col-4"><label class="checkbox-inline"><input type="radio" name="contact-by" value="Email" class="form-check-input"> Email</label></div>
                <div class="col-4"><label class="checkbox-inline"><input type="radio" name="contact-by" value="Both" class="form-check-input" checked="checked"> Both</label></div>
            </div>
        </div>
    </div>

    <input type="hidden" name="utm_source" value="<?php echo $_GET['utm_source']; ?>">
    <input type="hidden" name="utm_medium" value="<?php echo $_GET['utm_medium']; ?>">
    <input type="hidden" name="utm_campaign" value="<?php echo $_GET['utm_campaign']; ?>">
    <input type="hidden" name="utm_term" value="<?php echo $_GET['utm_term']; ?>">
    <input type="hidden" name="utm_content" value="<?php echo $_GET['utm_content']; ?>">

    <div class="form-group">
        <textarea placeholder="To the extent that you are comfortable, please tell us about your experience with Dr. Tyndall. We are 100% committed to your privacy and are here to fight for you." required type="text" id="Message" name="message" class="form-control" rows="5"></textarea>
    </div>
    <!-- Google reCAPTCHA box -->
    <!-- <div class="g-recaptcha" id="recaptcha" data-sitekey="6LfIxasUAAAAAEpFMs0AS9vZnHz5jbVefbScN7mJ" aria-required="true" style="margin:0 0 10px 0; overflow: hidden"></div> -->
   <div class="g-recaptcha" id="recaptcha" data-sitekey="6LdNqaYUAAAAAOVFiJ2pfqQrQ-1BB-qGhIRcDUqv" aria-required="true" style="margin:0 0 10px 0; overflow: hidden"></div>
    <div class="text-center">
        <button class="btn sub-button card-1 v1" type="submit" id="btn-validate" name="submit">SUBMIT YOUR QUESTION</button>
    </div>
</form>
<style>
    .g-recaptcha.error {
        border: solid 2px #c64848;
        padding: .2em;
        width: 19em;
    }
</style>