<?php
function maskEmail($email)
{
  list($username, $domain) = explode('@', $email);
  $maskedUsername = substr($username, 0, 3) . str_repeat('*', 4);
  $maskedEmail = $maskedUsername . '@' . $domain;
  return $maskedEmail;
}
