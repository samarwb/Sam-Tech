<form role="form" class="form-horizontal contact_me_form" action="<?php print site_url('portal/userContact'); ?>" method="post">
    <div class="form-group">
        <label for="exampleInputName2">Name</label>
        <input type="text" class="form-control" required="required" id="exampleInputName2" placeholder="Your Name" name ="name">
    </div>
    <div class="form-group contact_me_email_wrapper">
        <label for="exampleInputEmail2">Email</label>
        <input type="email" class="form-control" required="required" id="exampleInputEmail2" placeholder="Your Email" name="email">
    </div>
    <div class="form-group contact_me_mobile_wrapper">
        <label for="exampleInputEmail2">Mobile</label>
        <input type="text" class="form-control" required="required" id="exampleInputEmail2" placeholder="Your Mobile No" name="mobile">
    </div>
    <div class="form-group contact_me_message_wrapper">
        <label for="exampleInputText">Message</label>
        <textarea  class="form-control" required="required" placeholder="Your Message" name="message"></textarea> 
    </div>
    <button type="submit" class="contact_me_submit btn btn-default btn-primary">Send Message</button>
</form>