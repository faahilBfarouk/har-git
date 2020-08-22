<?php

if($this->session->flashdata("message"))
{
  echo "
  <div class='alert alert-success'>
    ".$this->session->flashdata("message")."
  </div>
  ";
}
?>