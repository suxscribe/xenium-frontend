<?

add_filter('wpcf7_autop_or_not', '__return_false'); //zrx disable adding <p> to lines
add_filter('wpcf7_form_elements', function ($content) {
  //zrx add data atribbutes to inputs

  // $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content); //zrx make sure to add wpcf7-form-control-wrap to your form code for this cf7 shit to work

  $phoneInput = strpos($content, 'name="form-phone"');
  if ($phoneInput !== false) {
    // $content = substr_replace( $content, ' placeholder=" "  ', $str_pos, 0 ); //data-inputmask="\'mask\': \'+7 999-999-99-99\'" // moved to js
  }

  // textarea dynamic height on input
  $formMessage = strpos($content, 'name="form-message"');
  if ($formMessage !== false) {
    // $content = substr_replace($content, '  oninput="this.parentNode.dataset.value = this.value" ', $formMessage, 0);
  }
  // hide file field
  $formFile = strpos($content, 'name="form-file"');
  if ($formFile !== false) {
    $content = substr_replace($content, ' hidden="hidden" ', $formFile, 0);
  }

  return $content;
});

add_filter('wp_mail_smtp_custom_options', function ($phpmailer) {
  $phpmailer->SMTPOptions = array(
    'ssl' => array(
      'verify_peer'       => false,
      'verify_peer_name'  => false,
      'allow_self_signed' => true
    )
  );

  return $phpmailer;
});
