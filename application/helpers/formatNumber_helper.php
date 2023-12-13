<?php

function formatToIDR($amount)
{
  $fmt = new NumberFormatter("id_ID", NumberFormatter::CURRENCY);
  return $fmt->formatCurrency($amount, "IDR");
}