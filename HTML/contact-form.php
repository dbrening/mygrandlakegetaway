<?php
/**
 * Grand Lake Getaway — enquiry handler
 *
 * Receives the booking and contact forms and emails them to the owner.
 * Returns a short HTML fragment which the page shows under the submit button.
 *
 * SECURITY NOTE
 * The version that shipped with the template built the From: header directly
 * from whatever the visitor typed into the email field, cleaned only with
 * strip_tags() and stripslashes(). Neither of those removes carriage returns
 * or newlines, so a submitted value like
 *
 *     someone@example.com\r\nBcc: a@x.com,b@y.com,...
 *
 * would inject extra mail headers and turn the form into an open relay for
 * spam. This version validates the address, refuses anything containing a
 * line break, and never puts visitor input into a header unvalidated.
 */

// ---------------------------------------------------------------------------
// Settings
// ---------------------------------------------------------------------------

/** Where enquiries are delivered. */
$owner_email = 'mygrandlakegetaway@gmail.com';

/**
 * The address the mail is sent FROM. This must be a mailbox on your own
 * domain, or most mail providers will reject or spam-folder the message —
 * you cannot send "from" a visitor's Gmail address and expect it to arrive.
 * The visitor's real address goes in Reply-To instead, so hitting reply in
 * your inbox still writes back to them.
 */
$from_email = 'website@mygrandlakegetaway.com';

$subject_prefix = '[Grand Lake Getaway] ';

// ---------------------------------------------------------------------------
// Helpers
// ---------------------------------------------------------------------------

/** Collapse anything that could break out of a mail header onto a new line. */
function gl_header_safe($value)
{
	return trim(str_replace(array("\r", "\n", "%0a", "%0d", "\0"), ' ', $value));
}

/** Clean a value for display inside the email body. */
function gl_clean($value)
{
	if (!is_scalar($value)) {
		return '';
	}
	return trim(strip_tags((string) $value));
}

function gl_fail($messages)
{
	echo '<span class="form-errors">' . implode('<br>', array_map('htmlspecialchars', (array) $messages)) . '</span>';
	exit;
}

// ---------------------------------------------------------------------------
// Guard clauses
// ---------------------------------------------------------------------------

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	gl_fail('This form must be submitted from the website.');
}

// Honeypot. The "website" field is positioned off-screen, so a person never
// fills it in. Automated spam almost always does. Pretend it worked.
if (!empty($_POST['website'])) {
	echo 'Thank you, your message has been sent.';
	exit;
}

$errors = array();

$sender_name  = gl_clean(isset($_POST['name']) ? $_POST['name'] : '');
$sender_email = gl_clean(isset($_POST['email']) ? $_POST['email'] : '');
$message_body = gl_clean(isset($_POST['message']) ? $_POST['message'] : '');
$subject_in   = gl_clean(isset($_POST['subject']) ? $_POST['subject'] : '');

if ($sender_name === '') {
	$errors[] = 'Please tell us your name.';
}

if ($sender_email === '' || !filter_var($sender_email, FILTER_VALIDATE_EMAIL)) {
	$errors[] = 'Please enter a valid email address so we can reply.';
} elseif ($sender_email !== gl_header_safe($sender_email)) {
	// Belt and braces: a validated address cannot contain a line break, but
	// never put anything into a header without checking.
	$errors[] = 'Please enter a valid email address so we can reply.';
}

// Very light sanity check on dates, when the booking form sent them.
$checkin  = gl_clean(isset($_POST['checkin']) ? $_POST['checkin'] : '');
$checkout = gl_clean(isset($_POST['checkout']) ? $_POST['checkout'] : '');

if ($checkin !== '' && $checkout !== '' && strtotime($checkout) <= strtotime($checkin)) {
	$errors[] = 'The check-out date needs to be after the check-in date.';
}

if ($errors) {
	gl_fail($errors);
}

// ---------------------------------------------------------------------------
// Build the message
// ---------------------------------------------------------------------------

// Friendly labels, so the email reads like an enquiry rather than a form dump.
$labels = array(
	'checkin'  => 'Check in',
	'checkout' => 'Check out',
	'adults'   => 'Adults',
	'children' => 'Children',
	'phone'    => 'Phone',
	'heard'    => 'Found us via',
);

$is_booking = ($checkin !== '' || $checkout !== '');
$subject = $subject_prefix . ($is_booking ? 'Booking enquiry' : 'Website message');

if ($subject_in !== '') {
	$subject = $subject_prefix . $subject_in;
}

$subject = gl_header_safe($subject);

$rows = array();
$rows[] = array('From', $sender_name . ' &lt;' . htmlspecialchars($sender_email) . '&gt;');

// Ordered fields first, then anything else the form happened to send.
foreach ($labels as $key => $label) {
	if (isset($_POST[$key]) && gl_clean($_POST[$key]) !== '') {
		$rows[] = array($label, htmlspecialchars(gl_clean($_POST[$key])));
	}
}

$skip = array('name', 'email', 'message', 'subject', 'website', 'contact_submit');
foreach ($_POST as $key => $value) {
	if (in_array($key, $skip, true) || isset($labels[$key])) {
		continue;
	}
	$value = gl_clean($value);
	if ($value !== '') {
		$rows[] = array(htmlspecialchars(gl_clean($key)), htmlspecialchars($value));
	}
}

if ($checkin !== '' && $checkout !== '') {
	$nights = (int) round((strtotime($checkout) - strtotime($checkin)) / 86400);
	if ($nights > 0) {
		$rows[] = array('Nights', $nights);
	}
}

$html = '<html><body style="font-family:Arial,sans-serif;font-size:15px;color:#3a3630">';
$html .= '<h2 style="font-size:18px">' . ($is_booking ? 'New booking enquiry' : 'New website message') . '</h2>';
$html .= '<table cellpadding="6" cellspacing="0" border="0">';
foreach ($rows as $row) {
	$html .= '<tr><td style="color:#585149">' . $row[0] . '</td><td><strong>' . $row[1] . '</strong></td></tr>';
}
$html .= '</table>';

if ($message_body !== '') {
	$html .= '<h3 style="font-size:15px;margin-top:24px">Message</h3>';
	$html .= '<p>' . nl2br(htmlspecialchars($message_body)) . '</p>';
}

$html .= '<hr style="border:0;border-top:1px solid #ddd;margin-top:24px">';
$html .= '<p style="font-size:12px;color:#888">Sent from mygrandlakegetaway.com';
if (!empty($_SERVER['REMOTE_ADDR'])) {
	$html .= ' &middot; ' . htmlspecialchars($_SERVER['REMOTE_ADDR']);
}
$html .= '</p></body></html>';

// ---------------------------------------------------------------------------
// Send
// ---------------------------------------------------------------------------

$headers   = array();
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/html; charset=UTF-8';
$headers[] = 'From: Grand Lake Getaway <' . gl_header_safe($from_email) . '>';
$headers[] = 'Reply-To: ' . gl_header_safe($sender_email);

if (@mail($owner_email, $subject, $html, implode("\r\n", $headers))) {
	echo 'Thank you &mdash; your enquiry is on its way. We usually reply the same day.';
} else {
	gl_fail('Sorry, the message could not be sent just now. Please call us on (303) 919-3238 or email mygrandlakegetaway@gmail.com directly.');
}
