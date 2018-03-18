<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
  window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
  ]); ?>
</script>
