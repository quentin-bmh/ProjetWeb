<?php
session_start();
session_unset();
echo "<script>alert('Vous vous êtes déconnecté de la session')</script>";
echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 0);</script>"; // Redirection après 3 secondes
echo "<script>window.location.href = 'index.php';</script>";
?>
